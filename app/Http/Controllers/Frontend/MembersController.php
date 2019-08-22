<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Core\Charters;
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
use App\Models\Core\AircraftCars;
use App\Models\Core\AircraftImage;

class MembersController extends Controller
{
  
  public function dashboard() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '25')->first();
    return view('member.dashboard', compact('count'), [
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
    $today = date('m/d/Y');
    $estimations = Charters::where('charter_type', 'executive charter')->get();
    $charters = BookingCharters::where("email", $user->email)
      ->where('booking_type', 'executive')
      ->where(function($query) use ($today) {
        $query->where('return_date', '!=', null)
              ->where('return_date', '>=', $today)
      ->orWhere(function($query1) use ($today) {
        $query1->where('return_date', '=', null)
              ->where('date', '>=', $today);
      });
    })->orderBy('updated_at', 'desc')->paginate(100);
    $charters_counts = count($charters);
    $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where('end_date', '>=', $today)->orderBy('updated_at', 'desc')->paginate(100);
    $emptylegs_counts = count($emptylegs);
    BookingLimousine::where('status', '!=', 'paid')->delete();
    $limousines = BookingLimousine::where("email", $user->email)
      ->where('status', 'paid')
      ->where(function($query) use ($today) {
        $query->where('return_date', '!=', null)
              ->where('return_date', '>=', $today)
      ->orWhere(function($query1) use ($today) {
        $query1->where('return_date', '=', null)
              ->where('date', '>=', $today);
      });
    })->orderBy('updated_at', 'desc')->paginate(100);
    $limousines_counts = count($limousines);
    $meets = BookingMeet::where("email",$user->email)->where('status', 'paid')->where('in_date', '>=', $today)->orderBy('updated_at', 'desc')->paginate(100);
    $meets_counts = count($meets);
    $counts = $emptylegs_counts + $charters_counts + $limousines_counts + $meets_counts;
    $types = "charters"; 
    $status = "all-status";
    $images = AircraftImage::get();
    $aircrafts = AircraftCars::get();
    $display_mode = "mode1";
    return view('member.upcoming-request', compact('charters', 'emptylegs', 'limousines', 'handlings', 'meets', 'counts', 'images', 'types', 'display_mode', 'status', 'charters_counts', 'emptylegs_counts', 'limousines_counts', 'meets_counts', 'estimations', 'aircrafts'), [
        "title" => "Home",
        "page" => "accessoslo-upcoming-request",
        "data" => $page
    ]);
  }

  public function upcomingTypeRequest(Request $request) {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $today = date('m/d/Y');
    $page = PageSettings::where('id', '26')->first();
    $user = Auth::user();
    $types = $request->charter;
    $status = $request->status;
    $display_mode = $request->show_mode;
    $images = AircraftImage::get();
    $aircrafts = AircraftCars::get();
    $charters_counts = 0;
    $limousines_counts = 0;
    $meets_counts = 0;
    $emptylegs_counts = 0;
    $estimations = Charters::where('charter_type', 'executive charter')->get();
    if ($types == "charters") {
      $charters = BookingCharters::where("email", $user->email)
        ->where('booking_type', 'executive')
        ->where(function($query) use ($today) {
          $query->where('return_date', '!=', null)
                ->where('return_date', '>=', $today)
        ->orWhere(function($query1) use ($today) {
          $query1->where('return_date', '=', null)
                ->where('date', '>=', $today);
        });
      })->orderBy('updated_at', 'desc')->paginate(100);
      $charters_counts = count($charters);
      $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where('status', 'paid')->where('end_date', '>=', $today)->orderBy('updated_at', 'desc')->paginate(100);
      $emptylegs_counts = count($emptylegs);
      BookingLimousine::where('status', '!=', 'paid')->delete();
      $limousines = BookingLimousine::where("email", $user->email)
        ->where('status', 'paid')
        ->where(function($query) use ($today) {
          $query->where('return_date', '!=', null)
                ->where('return_date', '>=', $today)
        ->orWhere(function($query1) use ($today) {
          $query1->where('return_date', '=', null)
                ->where('date', '>=', $today);
        });
      })->orderBy('updated_at', 'desc')->paginate(100);
      $limousines_counts = count($limousines);
      $meets = BookingMeet::where("email",$user->email)->where('in_date', '>=', $today)->where('status', 'paid')->orderBy('updated_at', 'desc')->paginate(100);
      $meets_counts = count($meets);
      $counts = $emptylegs_counts + $charters_counts + $limousines_counts + $meets_counts;
    } else if ($types == "executive") {
      if ($status == "all-status") {
        $charters = BookingCharters::where("email", $user->email)
          ->where('booking_type', 'executive')
          ->where(function($query) use ($today) {
            $query->where('return_date', '!=', null)
                  ->where('return_date', '>=', $today)
          ->orWhere(function($query1) use ($today) {
            $query1->where('return_date', '=', null)
                  ->where('date', '>=', $today);
          });
        })->orderBy('updated_at', 'desc')->paginate(100);
      } else {
        $charters = BookingCharters::where("email", $user->email)
          ->where('booking_type', 'executive')->where('status', $status)
          ->where(function($query) use ($today) {
            $query->where('return_date', '!=', null)
                  ->where('return_date', '>=', $today)
          ->orWhere(function($query1) use ($today) {
            $query1->where('return_date', '=', null)
                  ->where('date', '>=', $today);
          });
        })->orderBy('updated_at', 'desc')->paginate(100);
      }
      $charters_counts = $counts = count($charters);
      $emptylegs = BookingCharters::where("email", "admin")->paginate(3);
      $limousines = BookingCharters::where("email", "admin")->paginate(3);      
      $meets = BookingCharters::where("email", "admin")->paginate(3);      
    } else if ($types == "emptyleg") {
      EmptyLegUserBooking::where('status', '!=', 'paid')->delete();
      if ($status == 'all-status') {
        $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where('status', 'paid')->where('end_date', '>=', $today)->orderBy('updated_at', 'desc')->paginate(3);
        $emptylegs_counts = $counts = count($emptylegs);
      } else if ($status == "paid") {
        $emptylegs = EmptyLegUserBooking::where("email", $user->email)->where('status', 'paid')->orderBy('updated_at', 'desc')->paginate(3);
        $emptylegs_counts = $counts = count($emptylegs);
      }
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $limousines = BookingCharters::where("email", "admin")->paginate(3);    
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "limousine") {
      BookingLimousine::where('status', '!=', 'paid')->delete();
      if ($status == "all-status") {
        $limousines = BookingLimousine::where("email", $user->email)
          ->where('status', 'paid')
          ->where(function($query) use ($today) {
          $query->where('return_date', '!=', null)
                ->where('return_date', '>=', $today)
          ->orWhere(function($query1) use ($today) {
            $query1->where('return_date', '=', null)
                  ->where('date', '>=', $today);
          });
        })->orderBy('updated_at', 'desc')->paginate(100);
        $limousines_counts = $counts = count($limousines);
      } else if ($status == "paid") {
        $limousines = BookingLimousine::where("email", $user->email)
          ->where('status', 'paid')->orderBy('updated_at', 'desc')->paginate(100);
        $limousines_counts = $counts = count($limousines);
      }
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $emptylegs = EmptyLegUserBooking::where("email", "admin")->paginate(3);      
      $meets = BookingMeet::where("email","admin")->paginate(3);
    } else if ($types == "meet") {
      BookingMeet::where('status', '!=', 'paid')->delete();
      if ($status == 'all-status') {
        $meets = BookingMeet::where("email",$user->email)->where('status', 'paid')->where('in_date', '>=', $today)->orderBy('updated_at', 'desc')->paginate(3);
        $meets_counts = $counts = count($meets);
      } else if ($status == "paid") {
        $meets = BookingMeet::where("email",$user->email)->where('status', 'paid')->orderBy('updated_at', 'desc')->paginate(3);
        $meets_counts = $counts = count($meets);
      }
      $charters = BookingCharters::where("email", "admin")->paginate(3);
      $emptylegs = EmptyLegUserBooking::where("email", "admin")->paginate(3);
      $limousines = BookingLimousine::where("email", "admin")->paginate(3);      
    }
    return view('member.upcoming-request', compact('charters', 'emptylegs','limousines', 'meets', 'counts', 'types', 'images', 'display_mode', 'status', 'charters_counts', 'emptylegs_counts', 'limousines_counts', 'meets_counts', 'estimations', 'aircrafts'), [
        "title" => "Home",
        "page" => "accessoslo-upcoming-request",
        "data" => $page
    ]);
  }

  public function emptyLeg() {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '29')->first();
    $today = date('m/d/Y');
    $datas = EmptyLegBooking::where('end_date', '>=', $today)->paginate(3);
    $counts = EmptyLegBooking::where('end_date', '>=', $today)->count();
    $images = AircraftImage::get();
    $aircrafts = AircraftCars::get();
    return view('member.empty-leg', compact('datas', 'counts', 'images', 'aircrafts'), [
        "title" => "Home",
        "page" => " accessoslo-empty-leg",
        "data" => $page
    ]);
  }

  public function emptyLegSearch(Request $request) {
    if(!Auth::check()){
      return redirect()->route('home');
    }
    $page = PageSettings::where('id', '29')->first();
    $today = date('m/d/Y');
    $date = $request->date." ".$request->time;
    $datas = EmptyLegBooking::where('end_date', '>=', $today)->where('departure', $request->departure)->where('destination', $request->destination)->orderBy('updated_at', 'desc')->paginate(3);
    if (isset($request->date)) {
        if (isset($request->time)) {
            $datas = EmptyLegBooking::where('end_date', '>=', $date)->where('departure', $request->departure)->where('destination', $request->destination)->orderBy('updated_at', 'desc')->paginate(3);
        } else {
            $datas = EmptyLegBooking::where('end_date', '>=', $request->date)->where('departure', $request->departure)->where('destination', $request->destination)->orderBy('updated_at', 'desc')->paginate(3);
        }
    }
    $counts = count($datas);
    $images = AircraftImage::get();
    $aircrafts = AircraftCars::get();
    return view('member.empty-leg', compact('datas', 'counts', 'images', 'aircrafts'), [
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