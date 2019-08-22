<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

use App\Models\Core\Charters;
use App\Models\Core\BookingCharters;
use App\Models\Core\BookingLimousine;
use App\Models\Core\BookingMeet;
use App\Models\Core\HandlingRequest;
use App\Models\Core\EmptyLegUserBooking;
use App\Models\Core\EmptyLegBooking;
use App\Models\Core\User;

use App\Mail\LimousineConfirmation;
use App\Mail\MeetConfirmation;
use App\Mail\BookingCargoConfirmation;
use App\Mail\BookingConfirmation;
use App\Mail\EmptyLegConfirmation;
use App\Mail\BookingTravel;
use App\Mail\UserRegister;
use App\Mail\PassengerTax;
use App\Mail\PassengerTaxCustomer;
use App\Mail\HandlingRequestConfirmation;

use Redirect;
use Session;
use URL;
use Alert;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct() {
        $paypal_conf = \Config::get('paypal');   
        $this->apiContext = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));        
        $this->apiContext->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request) {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
     
        $item_1 = new Item();
        $item_1->setName($request->item)->setCurrency('EUR')->setQuantity(1)->setPrice($request->amount);
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        
        $amount = new Amount();
        $amount->setCurrency('EUR')->setTotal($request->amount);
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($item_list)->setDescription('Your transaction description');
        
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnURL(URL::to('status'))->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)->setTransactions(array($transaction));
        
        try {
            $payment->create($this->apiContext);
        } catch(\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                Session::put('error', 'Connection timeout');
                return Redirect::to('/');
            } else {
                Session::put('error', 'Same error occur, sorry for inconvenient');
                return Redirect::to('/');
            }
        }        
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        //save data for processing data for the database
        Session::put('type', $request->type);
        Session::put('booking_id', $request->item_number);
        Session::put('amount', $request->amount);
        Session::put('paypal_payment_id', $payment->getId());
        Session::save();

        //redirect to paypal
        if (isset($request->redirect_origin)) {
            return $redirect_url;
        } else {
            if (isset($redirect_url)) {
                return Redirect::away($redirect_url);
            } 
    
            return Redirect::to('/');
        }        
    }

    public function getPaymentStatus(Request $request) {    
        $payment_id = Session::get('paypal_payment_id');        
        $booking_type = Session::get('type');
        $amount = Session::get('amount');
        $booking_id = Session::get('booking_id');
        Session::forget('paypal_payment_id');
        
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            // notificationMsg('error','payment failed');
            return Redirect::back();
        } 
        
        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            
            if ($booking_type == "charters") {
                $estimate = Charters::where('id', $booking_id)->first();
                $estimate->status = 'paid';
                $estimate->save();
                $estimates = Charters::get();
                foreach($estimates as $sel) {
                    if ($sel->charter_id == $estimate->charter_id) {
                        if ($sel->id != $estimate->id) {
                            Charters::where('id', $sel->id)->delete();
                        }
                    }
                }
                $charter = BookingCharters::where('id', $estimate->charter_id)->first();
                $charter->total_cost = $estimate->total_cost;
                $charter->aircraft = $estimate->aircraft;
                $charter->partner_name = $estimate->partner_name;
                $charter->is_added = "1";
                $charter->status = "paid";                
                $charter->payment_id = rand((int)1000000000,(int)9999999999);
                $charter->save();
                Mail::to($charter->email)->send(new BookingConfirmation($charter));
                Mail::to("contact@accessoslo.no")->send(new BookingConfirmation($charter));
                Mail::to("admin@fantasylab.io")->send(new BookingConfirmation($charter));
                if (Auth::check()) {
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request');
                } else {
                    $user = User::where('email', $charter->email)->first();
                    Auth::login($user);   
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request');
                }
            } else if ($booking_type == "meet") {
                $meet = BookingMeet::where('id', $booking_id)->first();
                $meet->status = "paid";
                $meet->is_added = "1";
                $meet->total_cost = $amount;
                $meet->payment_id = rand((int)1000000000,(int)9999999999);
                $meet->save();
                Mail::to($meet->email)->send(new MeetConfirmation($meet));
                Mail::to("contact@accessoslo.no")->send(new MeetConfirmation($meet));
                Mail::to("admin@fantasylab.io")->send(new MeetConfirmation($meet));
                if (Auth::check()) {
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=meet&status=all-status&show_mode=mode1');
                } else {
                    $user = User::where('email', $meet->email)->first();
                    Auth::login($user);
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=meet&status=all-status&show_mode=mode1');
                }
            } else if ($booking_type == "limousine") {
                $limousine = BookingLimousine::where('id', $booking_id)->first();
                $limousine->total_cost = $amount;
                $limousine->status = "paid";                
                $limousine->is_added = "1";
                $limousine->payment_id = rand((int)1000000000,(int)9999999999);
                $limousine->save();
                Mail::to($limousine->email)->send(new LimousineConfirmation($limousine));
                Mail::to("admin@fantasylab.io")->send(new LimousineConfirmation($limousine));
                Mail::to("contact@accessoslo.no")->send(new LimousineConfirmation($limousine));
                if (Auth::check()) {
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=limousine&status=all-status&show_mode=mode1');
                } else {
                    $user = User::where('email', $limousine->email)->first();
                    Auth::login($user);
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=limousine&status=all-status&show_mode=mode1');                    
                }
            } else if ($booking_type == "empty") {
                $empty = EmptyLegUserBooking::where('id', $booking_id)->first();
                $empty->status = "paid";
                $empty->is_added = "1";
                $empty->payment_id = rand((int)1000000000,(int)9999999999);
                $empty->save();
                EmptyLegBooking::where('id', $empty->charter_id)->delete();
                Mail::to($empty->email)->send(new EmptyLegConfirmation($empty));
                Mail::to("contact@accessoslo.no")->send(new EmptyLegConfirmation($empty));
                Mail::to("admin@fantasylab.io")->send(new EmptyLegConfirmation($empty));
                if (Auth::check()) {
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=emptyleg&status=all-status&show_mode=mode1');
                } else {
                    $user = User::where('email', $empty->email)->first();
                    Auth::login($user);
                    Alert::success('Paid success!')->autoclose(5000);
                    return Redirect::to('/member/upcoming-request-type?charter=emptyleg&status=all-status&show_mode=mode1');
                }
            }
        } else {
            if ($booking_type == "meet") {
                Alert::error('Something went wrong', 'Oops!')->autoclose(5000);
                BookingMeet::where('id', $booking_id)->delete();
            } else if ($booking_type == "limousine") {
                Alert::error('Something went wrong', 'Oops!')->autoclose(5000);
                BookingLimousine::where('id', $booking_id)->delete();
            } else if ($booking_type == "empty") {
                Alert::error('Something went wrong', 'Oops!')->autoclose(5000);
                EmptyLegUserBooking::where('id', $booking_id)->first();
            }
            return Redirect::back();
        }        
    }

    public function setReviewStatus() {
        $nextday = strtotime(date('Y-m-d', strtotime(' +1 day')));
        $charters = BookingCharters::where('booking_type', 'executive')->where('status', 'paid')->get();
        foreach ($charters as $charter) {
            if ($charter->flight_type == "One Way") {
                if (strtotime($charter->date) == $nextday) {
                    $charter->is_review = "true";
                    $charter->save();
                }
            } else {
                if (strtotime($charter->return_date) == $nextday) {
                    $charter->is_review = "true";
                    $charter->save();
                }
            }
        }
        $meets = BookingMeet::where('status', 'paid')->get();
        foreach ($meets as $meet) {
            if (strtotime($meet->date) == $nextday) {
                $meet->is_review = "true";
                $meet->save();
            }
        }
        $limousines = BookingLimousine::where('status', 'paid')->get();
        foreach ($limousines as $limousine) {
            if ($limousine->type_flight == "One Way") {
                if (strtotime($limousine->date) == $nextday) {
                    $limousine->is_review = "true";
                    $limousine->save(); 
                }  
            } else {
                if (strtotime($limousine->return_date) == $nextday) {
                    $limousine->is_review = "true";
                    $limousine->save();
                }
            }
        }
        $emptys = EmptylegUserBooking::where('status', 'paid')->get();
        foreach($emptys as $empty) {
            if (strtotime($empty->end_date) == $nextday) {
                $empty->is_review = "true";
                $empty->save();
            }
        }
    }
}
