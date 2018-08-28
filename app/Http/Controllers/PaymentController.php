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

use App\Models\Core\BookingCharters;
use App\Models\Core\BookingLimousine;
use App\Models\Core\BookingMeet;
use App\Models\Core\HandlingRequest;
use App\Models\Core\EmptyLegUserBooking;
use App\Models\Core\User;

use App\Mail\LimousineConfirmation;
use App\Mail\MeetConfirmation;
use App\Mail\BookingTravel;
use App\Mail\UserRegister;
use App\Mail\PassengerTax;
use App\Mail\PassengerTaxCustomer;
use App\Mail\HandlingRequestConfirmation;

use Redirect;
use Session;
use URL;

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

        Session::put('type', $request->type);
        Session::put('booking_id', $request->item_number);
        Session::put('amount', $request->amount);
        Session::put('paypal_payment_id', $payment->getId());
        Session::save();
        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        } 
        
        Session::put('error', 'Unknon error occurred');
        return Redirect::to('/');
    }

    public function getPaymentStatus(Request $request) {
        $payment_id = Session::get('paypal_payment_id');
        $booking_type = Session::get('type');
        $amount = Session::get('amount');
        $booking_id = Session::get('booking_id');
        Session::forget('paypal_payment_id');
        
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            // notificationMsg('error','payment failed');
            Session::put('error', 'Payment failed');
            return Redirect::back();
        } 
        
        $payment = Payment::get($payment_id, $this->apiContext);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() == 'approved') {
            Session::put('succss', 'Payment success');
            
            if ($booking_type == "charters") {
                $charter = BookingCharters::where('id', $booking_id)->first();
                $charter->status = "paid";
                $charter->member_notice = "0";
                $charter->save();
                if (Auth::check()) {
                    return Redirect::to('/member/request-history');
                } else {
                    $user = User::where('email', $charter->email)->first();
                    Auth::login($user);   
                    return Redirect::to('/member/request-history');
                }
            } else if ($booking_type == "meet") {
                $meet = BookingMeet::where('id', $booking_id)->first();                
                $meet->status = "paid";
                $meet->member_notice = "0";
                $meet->save();
                if (Auth::check()) {
                    return Redirect::to('/member/request-history');
                } else {
                    $user = User::where('email', $meet->email)->first();
                    Auth::login($user);   
                    return Redirect::to('/member/request-history');
                }
            } else if ($booking_type == "limousine") {
                $limousine = BookingLimousine::where('id', $booking_id)->first();
                $limousine->total_cost = $amount;
                $limousine->status = "paid";
                $limousine->member_notice = "0";
                $limousine->save();
                if (Auth::check()) {
                    return Redirect::to('/member/request-history');
                } else {
                    $user = User::where('email', $limousine->email)->first();
                    Auth::login($user);   
                    return Redirect::to('/member/request-history');                    
                }
            } else if ($booking_type == "handling") {
                $handling = HandlingRequest::where('id', $booking_id)->first();
                $handling->status = "paid";
                $handling->member_notice = "0";
                $handling->save();
                if (Auth::check()) {
                    return Redirect::to('/member/request-history');
                } else {
                    $user = User::where('email', $handling->email)->first();
                    Auth::login($user);   
                    return Redirect::to('/member/request-history');
                }
            } else if ($booking_type == "empty") {
                $empty = EmptyLegUserBooking::where('id', $booking_id)->first();
                $empty->status = "paid";
                $empty->price = $amount;
                $empty->currency = "EUR";
                $empty->member_notice = "0";
                $empty->save();
                if (Auth::check()) {
                    return Redirect::to('/member/request-history');
                } else {
                    $user = User::where('email', $empty->email)->first();
                    Auth::login($user);   
                    return Redirect::to('/member/request-history');
                }
            }
        } else {
            Session::put('error', 'Payment failed');
            return Redirect::back();
        }        
    }
}
