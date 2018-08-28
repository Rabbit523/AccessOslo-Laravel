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

use App\Mail\BookingConfirmation;
use App\Mail\BookingEstimation;
use App\Mail\BookingCargoConfirmation;
use App\Mail\BookingCargoEstimation;
use App\Mail\EmptyLegConfirmation;
use App\Mail\MeetEstimation;
use App\Mail\LimousineEstimation;
use App\Mail\HandlingRequestEstimation;
use App\Mail\BookingTravelEstimation;

class AirCharters
{
  public static function create(Request $request) { 
    $charter = BookingCharters::create($request->all());
    $charter['date'] = date("d/m/Y", strtotime($request->date));
    $charter['is_added'] = "1";
    $charter['member_notice'] = "1";
    $charter['status'] = "awaiting";
    $charter->save();

    $str = $request->input('contact_person');
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      if ($str == trim($str) && strpos($str, ' ') !== false) {
        $name = explode(" ", $str);
        $userData = [
          'first_name' => $name[0],
          'last_name' => $name[1],
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      } else {
        $userData = [
          'first_name' => "",
          'last_name' => $str,
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      }
      $user = User::create($userData);
      Mail::to($user->email)
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }    
    Mail::to($charter->email)
    ->send(new BookingConfirmation($charter));
    return $charter;
  }

  public static function createEmptyleg(Request $request) {
    return EmptyLegBooking::create($request->all());
  }

  public static function updateEmptyleg(Request $request) {
    $data = $request->all();
    $emptyleg = EmptyLegBooking::where('flight_no', $data['flight_no'])->first();
    $emptyleg['aircraft'] = $data['aircraft'];
    $emptyleg['currency'] = $data['currency'];
    $emptyleg['day'] = $data['day'];
    $emptyleg['departure'] = $data['departure'];
    $emptyleg['destination'] = $data['destination'];
    $emptyleg['email'] = $data['email'];
    $emptyleg['end_date'] = $data['end_date'];
    $emptyleg['end_time'] = $data['end_time'];
    $emptyleg['flight_no'] = $data['flight_no'];
    $emptyleg['month'] = $data['month'];
    $emptyleg['partner_name'] = $data['partner_name'];
    $emptyleg['phone'] = $data['phone'];
    $emptyleg['price'] = $data['price'];
    $emptyleg['seats'] = $data['seats'];
    $emptyleg['year'] = $data['year'];
    $emptyleg->save();
    return $emptyleg;
  }

  public static function bookingEmptyleg(Request $request) {
    $emptyleg = EmptyLegUserBooking::create($request->all());
   
    $str = $request->contact_person;
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      if ($str == trim($str) && strpos($str, ' ') !== false) {
        $name = explode(" ", $str);        
        $userData = [
          'gender' => $request->gender,
          'first_name' => $name[0],
          'last_name' => $name[1],
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      } else {        
        $userData = [
          'gender' => $request->gender,
          'first_name' => "",
          'last_name' => $str,
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      }
      $user = User::create($userData);
      Mail::to($user->email)   
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }

    Mail::to($emptyleg->email)
    ->send(new EmptyLegConfirmation($emptyleg));
    return $emptyleg;
  }

  public static function cargo_booking(Request $request) {
    $cargo = CargoBooking::create($request->all());
    $cargo['is_added'] = "1";
    $cargo['member_notice'] = "1";
    $cargo['status'] = "awaiting";
    $cargo->save();

    $name = split(" ", $request->input('contact_person'));
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      $userData = [
        'first_name' => $name[0],
        'last_name' => $name[1],
        'email'=> $request->input('email'),
        'phone'=> $request->input('phone'),
        'password' => bcrypt($password),
        'profile_complete' => 'false',
        'role_id' => '2'      
      ];
      $user = User::create($userData);
      Mail::to($user->email)
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }

    Mail::to($cargo->email)
    ->send(new BookingCargoConfirmation($cargo));
    return $cargo;
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
            "private_badge" => BookingTravels::where('travel_type', 'private')->where('is_added', '1')->count(),           
            "event_badge" => BookingTravels::where('travel_type', 'group')->where('is_added', '1')->count(),
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
    if($request->input('type') == "private") {
      $charters = BookingTravels::where('travel_type', 'private')->where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "event") {
      $charters = BookingTravels::where('travel_type', 'group')->where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_added'] = '0';
        $charter->save();
      }      
    }
    if($request->input('type') == "emptyleg") {
      $charters = EmptyLegUserBooking::where('is_added', '1')->get();
      foreach($charters as $charter) {
        $charter['is_add'] = '0';
        $charter->save();
      }      
    }
    return $charters;
  }

  public static function getNotice (Request $request) {
    $charter_notice = BookingCharters::where('email', $request->input('email'))->where('member_notice', '1')->count();
    $limousine_notice = BookingLimousine::where('email', $request->input('email'))->where('member_notice', '1')->count();
    $meet_notice = BookingMeet::where('email', $request->input('email'))->where('member_notice', '1')->count();
    $handling_notice = HandlingRequest::where('email', $request->input('email'))->where('member_notice', '1')->count();
    $emptyleg_notice = EmptyLegUserBooking::where('email', $request->input('email'))->where('member_notice', '1')->count();
    $count = $charter_notice + $limousine_notice + $meet_notice + $handling_notice + $emptyleg_notice;
    return $count;
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
    $handlings = HandlingRequest::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($handlings as $handling) {
      $handling['member_notice'] = '0';
      $handling->save();
    } 
    $emptylegs = EmptyLegUserBooking::where('email', $request->input('email'))->where('member_notice', '1')->get();
    foreach($emptylegs as $emptyleg) {
      $emptyleg['member_notice'] = '0';
      $emptyleg->save();
    } 
    return "success";
  }

  public static function saveCharters(Request $request) {
    $charter = Charters::where('charter_type', $request->input('charter_type'))->where('charter_id', $request->input('charter_id'))->first();
    if ($charter) {
      if ($request->input('aircraft') !=''){ $charter->aircraft = $request->input('aircraft');}
      if ($request->input('additional_fee') !=''){ $charter->additional_fee = $request->input('additional_fee');}
      if ($request->input('estimate_cost') !=''){ $charter->estimate_cost = $request->input('estimate_cost');}
      if ($request->input('total_cost') !=''){ $charter->total_cost = $request->input('total_cost');} else {
        if ($request->input('additional_fee') == '') {
          if ($request->input('estimate_cost') != '') {
            $charter->total_cost = intval($charter->additional_fee) + intval($request->input('estimate_cost'));
          } 
        } else if ($request->input('estimate_cost') == '') {
          if ($request->input('additional_fee') != '') {
            $charter->total_cost = $charter->estimate_cost + $request->input('additional_fee');
          } 
        }
      }
      $charter->contact_person = $request->input('contact_person');
      $charter->email = $request->input('email');
      $charter->author = $request->input('author');
      $charter->charter_type = $request->input('charter_type');
      $charter->save();
      return $charter;
    } else {
      return Charters::create($request->all());
    }
  }

  public static function sendCharters(Request $request) {
    if ($request->input('charter_type') == 'executive charter' || $request->input('charter_type') == 'group charter' || $request->input('charter_type') == 'helicopter charter') {
      $booking_charter = BookingCharters::where('id', $request->input('booking_no'))->first();
      $booking_charter->total_cost = $request->input('total_cost');
      $booking_charter->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $booking_charter->partner_name  = $aircraft->partner_name;
      $booking_charter->status  = "sent";
      $booking_charter->member_notice  = '1';
      $booking_charter->save();
      Mail::to($booking_charter->email)
      ->send(new BookingEstimation($booking_charter));
      return $booking_charter;
    } else if ($request->input('charter_type') == 'cargo charter'){
      $cargo_charter = CargoBooking::where('id', $request->input('booking_no'))->first();
      $cargo_charter->total_cost = $request->input('total_cost');
      $cargo_charter->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $cargo_charter->partner_name  = $aircraft->partner_name;
      $cargo_charter->status  = "sent";
      $cargo_charter->member_notice  = "1";
      $cargo_charter->save();
      Mail::to($cargo_charter->email)
      ->send(new BookingCargoEstimation($cargo_charter));
      return $cargo_charter;
    } else if ($request->input('charter_type') == 'meet charter') {
      $meet = BookingMeet::where('id', $request->input('booking_no'))->first();
      $meet->total_cost = $request->input('total_cost');
      $meet->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $meet->partner_name  = $aircraft->partner_name;
      $meet->status  = "sent";
      $meet->member_notice  = "1";
      $meet->save();
      Mail::to($meet->email)
      ->send(new MeetEstimation($meet));      
      return $meet;
    } else if ($request->input('charter_type') == 'limousine transport') {
      $limousine = BookingLimousine::where('id', $request->input('booking_no'))->first();
      $limousine->total_cost = $request->input('total_cost');
      $limousine->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $limousine->partner_name  = $aircraft->partner_name;
      $limousine->status  = "sent";
      $limousine->member_notice  = "1";
      $limousine->save();
      Mail::to($limousine->email)
      ->send(new LimousineEstimation($limousine));      
      return $limousine;
    } else if ($request->input('charter_type') == 'handling request') {
      $handling = HandlingRequest::where('id', $request->input('booking_no'))->first();
      $handling->total_cost = $request->input('total_cost');
      $handling->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $handling->partner_name  = $aircraft->partner_name;
      $handling->status  = "sent";
      $handling->member_notice  = "1";
      $handling->save();
      Mail::to($handling->email)
      ->send(new HandlingRequestEstimation($handling));
      return $handling;          
    } else if ($request->input('charter_type') == 'destination oslo' || $request->input('charter_type') == 'event and group') {
      $destination = BookingTravels::where('id', $request->input('booking_no'))->first();
      $destination->total_cost = $request->input('total_cost');
      $destination->aircraft  = $request->input('aircraft');
      $aircraft = AircraftCars::where('type', $request->input('aircraft'))->first();
      $destination->partner_name  = $aircraft->partner_name;
      $destination->status  = "sent";
      $destination->member_notice  = "1";
      $destination->save();
      Mail::to($destination->email)
      ->send(new BookingTravelEstimation($destination));
      return $destination;   
    }
  }

  public static function getCharters(Request $request) {
    return ["charters" => Charters::where('charter_type', $request->input('charter_type'))->where('charter_id', $request->input('id'))->first(), "id" => $request->input("id")];
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