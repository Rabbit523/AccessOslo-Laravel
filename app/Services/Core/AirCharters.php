<?php

namespace App\Services\Core;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\Core\BookingCharters;
use App\Models\Core\CargoBooking;
use App\Models\Core\BookingMeet;
use App\Models\Core\BookingLimousine;
use App\Models\Core\HandlingRequest;
use App\Models\Core\AirpassengerTax;
use App\Models\Core\BookingTravels;
use App\Models\Core\EmptyLegBooking;
use App\Models\Core\EmptyLegUserBooking;
use App\Models\Core\AircraftCars;
use App\Models\Core\Charters;
use App\Models\Core\PartnerReviews;
use App\Models\Core\Partners;
use App\Models\Core\User;
use App\Models\Core\Profile;

use App\Mail\BookingConfirmation;
use App\Mail\BookingEstimation;
use App\Mail\BookingCargoConfirmation;
use App\Mail\BookingCargoEstimation;
use App\Mail\EmptyLegConfirmation;
use App\Mail\MeetEstimation;
use App\Mail\HandlingRequestEstimation;
use App\Mail\BookingTravelEstimation;
use App\Mail\UserRegister;
use App\Mail\AirCharterMail;
use App\Mail\CargoCharterMail;
use App\Mail\SendFeedback;

use Twilio\Rest\Client;

use Alert;

class AirCharters
{
  public static function create(Request $request) {
    $data = [
      "departure"=>$request->departure, 
      "destination"=> $request->destination,
      "date"=> $request->date,
      "time"=> $request->time,
      "return_date"=> $request->return_date,
      "return_time"=> $request->return_time,
      "travellers"=> $request->travellers,
      "flight_type"=> $request->flight_type,
      "bonus"=> $request->bonus,
      "contact_person"=> $request->contact_person,
      "phone"=> $request->phone,
      "email"=> $request->email,
      "company"=> $request->company,
      "booking_type"=> $request->booking_type,
      "additional_service"=> $request->additional_service
    ];
    
    if (User::where('email', $request->input('email'))->first()) {
      $charter = BookingCharters::create($data);
      $charter['is_added'] = "1";
      $charter['member_notice'] = "1";
      $charter['status'] = "awaiting";
      $charter['total_estimations'] = "0";
      $charter->save();

      $user = User::where('email', $request->input('email'))->first();
      Mail::to("admin@fantasylab.io")->send(new AirCharterMail($charter, $user->gender));
      Mail::to("contact@accessoslo.no")->send(new AirCharterMail($charter, $user->gender));
      $partners = Partners::get();
      foreach($partners as $partner) {
        Mail::to($partner->email)->send(new AirCharterMail($charter, $user->gender));
      }
      return $charter;
    } else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
  }

  public static function createEmptyleg(Request $request) {
    $users = User::where('role_id', '2')->get();
    $emptyleg = EmptyLegBooking::create($request->all());
    foreach($users as $user) {
      $user->emptyleg_flight_notice += 1;
      $user->save();
    }
    return $emptyleg;
  }

  public static function updateEmptyleg(Request $request) {
    $data = $request->all();
    $emptyleg = EmptyLegBooking::where('id', $data['id'])->first();
    $emptyleg['aircraft'] = $data['aircraft'];
    $emptyleg['currency'] = $data['currency'];
    $emptyleg['day'] = $data['day'];
    $emptyleg['departure'] = $data['departure'];
    $emptyleg['destination'] = $data['destination'];    
    $emptyleg['end_date'] = $data['end_date'];
    $emptyleg['end_time'] = $data['end_time'];
    $emptyleg['flight_no'] = $data['flight_no'];
    $emptyleg['month'] = $data['month'];
    $emptyleg['partner_name'] = $data['partner_name'];
    $emptyleg['price'] = $data['price'];
    $emptyleg['seats'] = $data['seats'];
    $emptyleg['year'] = $data['year'];
    $emptyleg->save();
    return $emptyleg;
  }

  public static function bookingEmptyleg(Request $request) {
    if (User::where('email', $request->input('email'))->first()) {
      $emptyleg = EmptyLegUserBooking::create($request->all());
      Mail::to($emptyleg->email)->send(new EmptyLegConfirmation($emptyleg));
      return $emptyleg;
    } else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
  }

  public static function cargo_booking(Request $request) {
    if (User::where('email', $request->input('email'))->first()) {
      $cargo = CargoBooking::create($request->all());
      $cargo['is_added'] = "1";
      $cargo['member_notice'] = "1";
      $cargo['status'] = "awaiting";
      $cargo->save(); 
      Mail::to("admin@fantasylab.io")->send(new CargoCharterMail($cargo));
      Mail::to("contact@accessoslo.no")->send(new CargoCharterMail($cargo));
      return $cargo;
    } else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
  }
  
  public static function getAdminDashboard() {  
    return ["executive" => BookingCharters::where('booking_type', 'executive')->count(),
            "executive_badge" => BookingCharters::where('booking_type', 'executive')->where('is_added', '1')->count(),
            "group" => BookingCharters::where('booking_type', 'group')->count(),
            "group_badge" => BookingCharters::where('booking_type', 'group')->where('is_added', '1')->count(),
            "helicopter" => BookingCharters::where('booking_type', 'helicopter')->count(),
            "helicopter_badge" => BookingCharters::where('booking_type', 'helicopter')->where('is_added', '1')->count(),
            "cargo" => CargoBooking::get()->count(),
            "cargo_badge" => CargoBooking::where('is_added', '1')->count(),
            "meet" => BookingMeet::get()->count(),
            "meet_badge" => BookingMeet::where('is_added', '1')->count(),
            "limousine" => BookingLimousine::get()->count(),
            "limousine_badge" => BookingLimousine::where('is_added', '1')->count(),
            "handling" => HandlingRequest::get()->count(),
            "handling_badge" => HandlingRequest::where('is_added', '1')->count(),
            "airpassenger" => AirpassengerTax::get()->count(),
            "passenger_badge" => AirpassengerTax::where('is_added', '1')->count(),
            "private" => BookingTravels::where('travel_type', 'private')->count(),
            "private_badge" => BookingTravels::where('travel_type', 'private')->where('is_added', '1')->count(),
            "event" => BookingTravels::where('travel_type', 'group')->count(),
            "event_badge" => BookingTravels::where('travel_type', 'group')->where('is_added', '1')->count(),
            "emptyleg" => EmptyLegUserBooking::get()->count(),
            "emptyleg_badge" => EmptyLegUserBooking::where('is_added', '1')->count()];
  }

  public static function searchDashboard(Request $request) {
    $startDate_array = explode("/", $request->input('startDate')); 
    $endDate_array = explode("/", $request->input('endDate')); 
    $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";
    $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
  
    return ["executive" => BookingCharters::where('booking_type', 'executive')->whereBetween('updated_at', [$startDate, $endDate])->count(),
            "group" => BookingCharters::where('booking_type', 'group')->whereBetween('updated_at', [$startDate, $endDate])->count(),
            "helicopter" => BookingCharters::where('booking_type', 'helicopter')->whereBetween('updated_at', [$startDate, $endDate])->count(),
            "cargo" => CargoBooking::whereBetween('updated_at', [$startDate, $endDate])->count(),
            "meet" => BookingMeet::whereBetween('updated_at', [$startDate, $endDate])->count(),
            "limousine" => BookingLimousine::whereBetween('updated_at', [$startDate, $endDate])->count(),
            "handling" => HandlingRequest::whereBetween('updated_at', [$startDate, $endDate])->count(),
            "airpassenger" => AirpassengerTax::whereBetween('updated_at', [$startDate, $endDate])->count(),
            "private" => BookingTravels::where('travel_type', 'private')->whereBetween('updated_at', [$startDate, $endDate])->count(),
            "event" => BookingTravels::where('travel_type', 'event')->whereBetween('updated_at', [$startDate, $endDate])->count()];
  }

  public static function deleteEmptyleg(Request $request) {
    return EmptyLegBooking::where('id', $request->input("id"))->delete(); 
  }

  public static function badgeStatus(Request $request) {
    return [
            "executive_badge" => BookingCharters::where('booking_type', 'executive')->where('is_added', '1')->count(),
            "group_badge" => BookingCharters::where('booking_type', 'group')->where('is_added', '1')->count(),
            "helicopter_badge" => BookingCharters::where('booking_type', 'helicopter')->where('is_added', '1')->count(),
            "cargo_badge" => CargoBooking::where('is_added', '1')->count(),
            "meet_badge" => BookingMeet::where('is_added', '1')->count(),
            "limousine_badge" => BookingLimousine::where('is_added', '1')->count(),
            "handling_badge" => HandlingRequest::where('is_added', '1')->count(),
            "passenger_badge" => AirpassengerTax::where('is_added', '1')->count(),
            "emptyleg_badge" => EmptyLegUserBooking::where('is_added', '1')->count()];
  }

  public static function badgeSet(Request $request) {
    if($request->input('type') == "executive") {
      $charters = BookingCharters::where('booking_type', 'executive')->where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "group") {
      $charters = BookingCharters::where('booking_type', 'group')->where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "helicopter") {
      $charters = BookingCharters::where('booking_type', 'helicopter')->where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "cargo") {
      $charters = CargoBooking::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "meet") {
      $charters = BookingMeet::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "limousine") {
      $charters = BookingLimousine::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "handling") {
      $charters = HandlingRequest::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "passenger") {
      $charters = AirpassengerTax::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    } 
    if($request->input('type') == "emptyleg") {
      $charters = EmptyLegUserBooking::where('is_add', '1')->get();
      foreach($charters as $charter) {
        $charter['is_add'] = '0';
        $charter->save();
      }      
    }
    return $charters;
  }

  public static function getNotice (Request $request) {
    $email = $request->email;
    $charter_notice = BookingCharters::where('email', $email)->where('member_notice', '1')->count();
    $limousine_notice = BookingLimousine::where('email', $email)->where('member_notice', '1')->count();
    $meet_notice = BookingMeet::where('email', $email)->where('member_notice', '1')->count();
    $member_notice = $charter_notice + $limousine_notice + $meet_notice;    
    
    $today = strtotime(date("Y-m-d"));
    $excutive_count = BookingCharters::where("email", $email)->where("booking_type", "executive")->orderBy('updated_at', 'desc')->count();
    $limousine_count = BookingLimousine::where("email", $email)->orderBy('updated_at', 'desc')->count();
    $meet_count = BookingMeet::where("email",$email)->orderBy('updated_at', 'desc')->count();
    $empty_count = EmptyLegUserBooking::where("email", $email)->orderBy('updated_at', 'desc')->count();

    return ['member_notice'=>$member_notice, 'charter_count'=>$excutive_count, 'empty_count'=>$empty_count, 'transport_count'=>$limousine_count, 'meet_count'=>$meet_count];
  }

  public static function setNotice (Request $request) {
    $charters = BookingCharters::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($charters as $charter) {
      $charter['member_notice'] = '0';
      $charter->save();
    }    
    $limousines = BookingLimousine::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($limousines as $limousine) {
      $limousine['member_notice'] = '0';
      $limousine->save();
    }   
    $meets = BookingMeet::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($meets as $meet) {
      $meet['member_notice'] = '0';
      $meet->save();
    }    
    $emptylegs = EmptyLegUserBooking::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($emptylegs as $emptyleg) {
      $emptyleg['member_notice'] = '0';
      $emptyleg->save();
    } 
    return "success";
  }  

  public static function GetAdditionFeedback(Request $request) {
    $charter = Charters::where('charter_type', $request->charter_type)->where('charter_id', $request->charter_id)->where('partner_name', $request->partner_name)->first();
    if (isset($charter)) {
      return ["type" => "success", "data" => $charter->additional_reply];
    } else {
      return ["type" => "error", "data" => null]; 
    }
  }

  public static function SendAdditionFeedback(Request $request) {
    $charter = Charters::where('charter_id', $request->charter_id)->where('partner_name', $request->partner_name)->first();
    if (isset($charter)) {
      $charter->additional_reply = $request->additional_reply;
      $charter->charter_type = $request->charter_type;
      $charter->save();
    } else {
      Charters::create($request->all());
    }
    return "success";
  }

  public static function SendAdditionFeedbackToCustomer(Request $request) {
    $booking_charter = BookingCharters::where('id', $request->charter_id)->first();
    Mail::to($booking_charter->email) ->send(new SendFeedback($request->text, $booking_charter->additional_service));
    return "success";
  }

  public static function saveCharters(Request $request) {
    if ($request->type == "adminPartner") {
      $charter = Charters::where('id', $request->id)->first();
      if (isset($charter)) {
        $charter->estimate_cost = $request->estimate_cost;
        $charter->additional_fee = $request->additional_fee;
        $charter->total_cost = $request->total_cost;
        $charter->save();
        Alert::success('You have saved successfully!')->autoclose(5000);
        return $charter;
      } else {
        $charter = Charters::create($request->all());
        $aircraft = AircraftCars::where('type', $charter->aircraft)->first();
        $charter->capacity = $aircraft->capacity;
        $charter->save();
        Alert::success('You have saved successfully!')->autoclose(5000);
        return $charter;
      }
    } else {
      $charter = Charters::where('charter_type', $request->charter_type)->where('charter_id', $request->charter_id)->where('partner_name', $request->partner_name)->first();
      if (isset($charter)) {
        $charter->estimate_cost = $request->estimate_cost;
        $charter->additional_fee = $request->additional_fee;
        $charter->total_cost = $request->total_cost;
        $charter->aircraft = $request->aircraft;
        $aircraft = AircraftCars::where('type', $charter->aircraft)->first();
        $charter->capacity = $aircraft->capacity;
        $charter->save();
        Alert::success('You have saved successfully!')->autoclose(5000);
        return $charter;
      } else {
        $charter = Charters::create($request->all());
        $aircraft = AircraftCars::where('type', $charter->aircraft)->first();
        $charter->capacity = $aircraft->capacity;
        $charter->save();
        Alert::success('You have saved successfully!')->autoclose(5000);
        return $charter;
      }
    }    
  }

  public static function sendCharters(Request $request) {
    $from = "+4759446972";
    $sid    = "ACfc3efe382ed96fb025b7689c4bf54241";
    $token  = "a34af2c4c2de7a8fb71f1e4c739b29d0";
    $twilio = new Client($sid, $token);
    
    if ($request->input('charter_type') == 'executive charter') {
      $charter = Charters::where('charter_id', $request->charter_id)->where('partner_name', $request->partner_name)->first();
      if (isset($charter)) {
        $charter->estimate_cost = $request->estimate_cost;
        $charter->additional_fee = $request->additional_fee;
        $charter->total_cost = $request->total_cost;
        $charter->aircraft = $request->aircraft;
        $charter->status = "sent";
        $charter->save();
      } else {
        $charter = Charters::create($request->all());
        $aircraft = AircraftCars::where('type', $charter->aircraft)->first();
        $charter->capacity = $aircraft->capacity;
        $charter->status = "sent";
        $charter->save();
      }
      $booking_charter = BookingCharters::where('id', $request->input('charter_id'))->first();
      $booking_charter->total_cost = $request->input('total_cost');
      $booking_charter->aircraft  = $request->input('aircraft');
      $booking_charter->partner_name  = $request->input('partner_name');
      $booking_charter->status  = "sent";
      $booking_charter->member_notice  = '1';
      $booking_charter->total_estimations = (int)$booking_charter->total_estimations + 1;
      $booking_charter->save();
      Mail::to($booking_charter->email)
      ->send(new BookingEstimation($booking_charter));
      Alert::success('Your estimates have been sent successfully to customer.')->autoclose(5000);
      $profile = Profile::where('email', $booking_charter->email)->first(); 
      if (isset($profile)) {
        if ($profile->sms_notification == "true") {
          $message = $twilio->messages->create(
            $profile->home_phone,
            array("from" => $from, "body" => "Hi, You have received a new estimation for executive charter flight. Please check your email or login to Access Oslo.")
          );
        }        
      }
      return $booking_charter;
    } else if ($request->input('charter_type') == 'cargo charter'){
      $cargo_charter = CargoBooking::where('id', $request->input('booking_no'))->first();
      $cargo_charter->total_cost = $request->input('total_cost');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $cargo_charter->aircraft  = $aircraft->id;
      $cargo_charter->partner_name  = $aircraft->partner_name;
      $cargo_charter->status  = "sent";
      $cargo_charter->member_notice  = "1";      
      $cargo_charter->save();
      Mail::to($cargo_charter->email)
      ->send(new BookingCargoEstimation($cargo_charter));
      Alert::success('Your estimates have been sent successfully to customer.')->autoclose(5000);
      return $cargo_charter;
    } else if ($request->input('charter_type') == 'meet charter') {
      $meet = BookingMeet::where('id', $request->input('booking_no'))->first();
      $meet->total_cost = $request->input('total_cost');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $meet->aircraft  = $aircraft->id;
      $meet->partner_name  = $aircraft->partner_name;
      $meet->status  = "sent";
      $meet->member_notice  = "1";      
      $meet->save();
      Mail::to($meet->email)
      ->send(new MeetEstimation($meet));
      Alert::success('Your estimates have been sent successfully to customer.')->autoclose(5000);
      return $meet;
    } else if ($request->input('charter_type') == 'destination oslo' || $request->input('charter_type') == 'event and group') {
      $destination = BookingTravels::where('id', $request->input('booking_no'))->first();
      $destination->total_cost = $request->input('total_cost');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $destination->aircraft_type  = $aircraft->id;
      $destination->partner_name  = $aircraft->partner_name;
      $destination->status  = "sent";
      $destination->member_notice  = "1";      
      $destination->save();
      Mail::to($destination->email)
      ->send(new BookingTravelEstimation($destination));
      Alert::success('Your estimates have been sent successfully to customer.')->autoclose(5000);
      return $destination;   
    }
  }

  public static function deleteEstimation(Request $request) {
    $charter = Charters::where('id', $request->id)->delete();
    $booking_charter = BookingCharters::where('id', $charter->charter_id)->first();
    $booking_charter->total_estimations = $booking_charter->total_estimations - 1;
    $booking_charter->save();
    return ['success' => 'removed'];
  }
  
  public static function getCharters(Request $request) {
    if (Auth::User()->role_id == "0") {
      return ["charters" => Charters::where('charter_type', $request->input('charter_type'))->where('charter_id', $request->input('id'))->get(), "id" => $request->input("id"), "partner_name" => $request->input("partner_name")];
    } else {
      $partner = Partners::where('contact_person', Auth::User()->first_name." ".Auth::User()->last_name)->first();
      $partner_name = $partner->partner_name;
      return ["charters" => Charters::where('charter_type', $request->input('charter_type'))->where('charter_id', $request->input('id'))->where('partner_name', $partner_name)->first(), "id" => $request->input("id")];
    }    
  }

  public static function deleteCharters(Request $request) {
    $charter = BookingCharters::where('id', $request->input('target'))->first();
    $charter->delete();    
    return ['data' => $request->input('type')];
  }

  public static function saveReview(Request $request) {
    return PartnerReviews::create($request->all());
  }

  public static function getReview(Request $request) {
    return PartnerReviews::where('data_id', $request->input('data_id'))->first();
  }

  public static function updateReview(Request $request) {
    $review = PartnerReviews::where('data_id', $request->input('data_id'))->first();
    $review->total_rate = $request->input('total_rate');
    $review->highlight = $request->input('highlight');
    $review->atmosphere = $request->input('atmosphere');
    $review->testimonial = $request->input('testimonial');
    $review->save();
    return $review;
  }

  public static function getPartnerReview(Request $request) {
    $partner = Partners::where('id', $request->input('id'))->first();
    $reviews = PartnerReviews::where('partner_name', $partner->partner_name)->get();
    $count = PartnerReviews::where('partner_name', $partner->partner_name)->count();
    $rates = 0;
    foreach ($reviews as $review) {
      $rates += $review->total_rate;
    }
    if ($count != 0){
      return $rates / $count;
    } else {
      return "error";
    }    
  }
}