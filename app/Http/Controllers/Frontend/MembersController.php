<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
use App\Models\Core\PageSettings;

class MembersController extends Controller
{
  
  public function dashboard() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '25')->first();
    return view('member.dashboard', [
        "title" => "Home",
        "page" => "accessoslo-dashboard",
        "data" => $page
    ]);
  }

  public function makeRequest() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '40')->first();
    return view('member.make-request', [
        "title" => "Home",
        "page" => "accessoslo-make-new-request",
        "data" => $page
    ]);
  }

  public function upcomingRequest() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '26')->first();
    $user = Auth::user();
    $charters = BookingCharters::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
    $counts = BookingCharters::where("email", $user->email)->count();
    $emptylegs = EmptyLegUserBooking::where("email", "admin")->paginate(3);
    $limousines = BookingLimousine::where("email", "admin")->paginate(3);
    $handlings = HandlingRequest::where("email", "admin")->paginate(3);
    $meets = BookingMeet::where("email","admin")->paginate(3);
    $types = "charters";
    if ($counts == 0) {
      $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
      $counts = EmptyLegUserBooking::where("email", $user->email)->count();
      $types = "emptyleg";
      if ($counts == 0) {        
        $limousines = BookingLimousine::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
        $counts = BookingLimousine::where("email", $user->email)->count();
        $types = "limousine";
        if ($counts == 0) {          
          $handlings = HandlingRequest::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
          $counts = HandlingRequest::where("email", $user->email)->count();
          $types = "handling";
          if ($counts == 0) {
            $meets = BookingMeet::where("email",$user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
            $counts = BookingMeet::where("email", $user->email)->count();
            $types = "meet";
          }
        }
      }
    }   
    
    $display_mode = "mode1";
    return view('member.upcoming-request', compact('charters', 'emptylegs', 'limousines', 'handlings', 'meets', 'counts', 'types', 'display_mode'), [
        "title" => "Home",
        "page" => "accessoslo-upcoming-request",
        "data" => $page
    ]);
  }

  public function upcomingTypeRequest(Request $request) {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '26')->first();
    $user = Auth::user();
    $types = $request->charter;
    $status = $request->status;
    $display_mode = $request->show_mode;
    if ($types == "charters") {
      $charters = BookingCharters::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
      $counts = BookingCharters::where("email", $user->email)->where("member_notice", "1")->count();
      $emptylegs = EmptyLegBooking::where("email", "admin")->paginate(3);
      $limousines = BookingLimousine::where("email", "admin")->paginate(3);
      $handlings = HandlingRequest::where("email", "admin")->paginate(3);
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "executive" || $types == "group" || $types == "helicopter") {
      if ($types == "executive") {
        if ($status != 'all-status') {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->where('status', $status)->count();
        } else {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->count();
        }
      } else if ($types == "group") {
        if ($status != 'all-status') {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "group")->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "group")->where('status', $status)->count();
        } else {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "group")->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "group")->count();
        }
      } else if ($types == "helicopter") {
        if ($status != 'all-status') {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "helicopter")->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "helicopter")->where('status', $status)->count();
        } else {
          $charters = BookingCharters::where("email", $user->email)->where("booking_type", "helicopter")->orderBy('updated_at', 'desc')->paginate(3);
          $counts = BookingCharters::where("email", $user->email)->where("booking_type", "helicopter")->count();
        }
      } 
      $emptylegs = BookingCharters::where("email", "admin")->paginate(3);
      $limousines = BookingCharters::where("email", "admin")->paginate(3);
      $handlings = BookingCharters::where("email", "admin")->paginate(3);
      $meets = BookingCharters::where("email", "admin")->paginate(3);      
    } else if ($types == "emptyleg") {
      $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where("member_notice", "1")->orderBy('updated_at', 'desc')->paginate(3);
      $counts = EmptyLegUserBooking::where("email", $user->email)->count();
      $handlings = HandlingRequest::where("email", "admin")->paginate(3);
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $limousines = BookingCharters::where("email", "admin")->paginate(3);    
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "limousine") {
      if ($status != 'all-status') {
        $limousines = BookingLimousine::where("email", $user->email)->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = BookingLimousine::where("email", $user->email)->where('status', $status)->count();
      } else {
        $limousines = BookingLimousine::where("email", $user->email)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = BookingLimousine::where("email", $user->email)->count();
      }
      $handlings = HandlingRequest::where("email", "admin")->paginate(3);
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $emptylegs = EmptyLegBooking::where("email", "admin")->paginate(3);      
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "handling") {
      if ($status != 'all-status') {
        $handlings = HandlingRequest::where("email", $user->email)->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = HandlingRequest::where("email", $user->email)->where('status', $status)->count();
      } else {
        $handlings = HandlingRequest::where("email", $user->email)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = HandlingRequest::where("email", $user->email)->count();
      }
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $emptylegs = EmptyLegBooking::where("email", "admin")->paginate(3);
      $limousines = BookingLimousine::where("email", "admin")->paginate(3);
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "meet") {
      if ($status != 'all-status') {
        $meets = BookingMeet::where("email",$user->email)->where('status', $status)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = BookingMeet::where("email", $user->email)->where('status', $status)->count();   
      } else {
        $meets = BookingMeet::where("email",$user->email)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = BookingMeet::where("email", $user->email)->count();   
      }
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $emptylegs = EmptyLegBooking::where("email", "admin")->paginate(3);
      $limousines = BookingLimousine::where("email", "admin")->paginate(3);
      $handlings = HandlingRequest::where("email", "admin")->paginate(3);
    }
    return view('member.upcoming-request', compact('charters', 'emptylegs','limousines', 'handlings', 'meets', 'counts', 'types', 'display_mode'), [
        "title" => "Home",
        "page" => "accessoslo-upcoming-request",
        "data" => $page
    ]);
  }

  public function requestHistory() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '27')->first();
    $user = Auth::user();
    $charters = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->where("status", "paid")->orderBy('updated_at', 'desc')->paginate(3);
    $counts = BookingCharters::where("email", $user->email)->where("booking_type", "executive")->where("status", "paid")->count();
    $charter_type = "executive";
    $display_mode = "mode1";
    return view('member.request-history', compact('charters', 'counts', 'charter_type', 'display_mode'), [
      "title" => "Home",
      "page" => " accessoslo-upcoming-request",
      "data" => $page
    ]);
  }
  
  public function requestTypeHistory(Request $request) {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '27')->first();
    $user = Auth::user();
    $charter_type = $request->type;
    $display_mode = $request->display_mode;
    if ($charter_type == "executive" || $charter_type == "group" || $charter_type == "helicopter") {
      $charters = BookingCharters::where("email", $user->email)->where("booking_type", $charter_type)->where("status", "paid")->orderBy('updated_at', 'desc')->paginate(3);
      $counts = BookingCharters::where("email", $user->email)->where("booking_type", $charter_type)->where("status", "paid")->count();
      return view('member.request-history', compact('charters', 'counts', 'charter_type', 'display_mode'), [
        "title" => "Home",
        "page" => " accessoslo-upcoming-request",
        "data" => $page
      ]);
    }
  }

  public function emptyLeg() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '29')->first();
    $datas = EmptyLegBooking::paginate(3);
    $counts = EmptyLegBooking::count();
    return view('member.empty-leg', compact('datas', 'counts'), [
        "title" => "Home",
        "page" => " accessoslo-empty-leg",
        "data" => $page
    ]);
  }

  public function profileSettings() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '30')->first();
    return view('member.profile-settings', [
        "title" => "Home",
        "page" => " accessoslo-profile-settings",
        "data" => $page
    ]);
  }

  public function passengerSettings() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '31')->first();
    return view('member.passenger-settings', [
        "title" => "Home",
        "page" => " accessoslo-passenger-settings",
        "data" => $page
    ]);
  }

  public function manageAccount() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '32')->first();
    return view('member.manage-account', [
        "title" => "Home",
        "page" => " accessoslo-manage-account",
        "data" => $page
    ]);
  }

  public function logout() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    Auth::logout();
    return redirect()->route('home');
  }

}