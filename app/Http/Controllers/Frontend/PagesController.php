<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Core\User;
use App\Models\Core\Profile;
use App\Models\Core\Partners;
use App\Models\Core\EmptyLegBooking;
use App\Models\Core\EmptyLegUserBooking;
use App\Models\Core\BookingCharters;
use App\Models\Core\CargoBooking;
use App\Models\Core\BookingMeet;
use App\Models\Core\BookingLimousine;
use App\Models\Core\HandlingRequest;
use App\Models\Core\AirpassengerTax;
use App\Models\Core\BookingTravels;
use App\Models\Core\PageSettings;
use App\Models\Core\AircraftCars;
use App\Models\Core\PostPages;

class PagesController extends Controller
{
    public function index() {
        $datas = EmptyLegBooking::where('end_date', '==', "04/30/2015")->orderBy('updated_at', 'desc')->paginate(5);
        $counts = EmptyLegBooking::where('end_date', '==', "04/30/2015")->count();
        $date = date("Y/m/d");
        $departure = "";
        $destination = "";
        return view('pages.home', compact('datas', 'counts', 'date', 'departure', 'destination'), [
            "title" => "Home",
            "page" => "accessoslo-home"
        ]);
    }

    public function emptyLegSearchResult (Request $request) {        
        $datas = EmptyLegBooking::where('end_date', '>=', $request->date)->where('departure', $request->departure)->where('destination', $request->destination)->orderBy('updated_at', 'desc')->paginate(3);
        $counts = EmptyLegBooking::where('end_date', '>=', $request->date)->where('departure', $request->departure)->where('destination', $request->destination)->count();
        $date = $request->date;
        $departure = $request->departure;
        $destination = $request->destination;
        return view('pages.home', compact('datas', 'counts', 'date', 'departure', 'destination'), [
            "title" => "Home",
            "page" => "accessoslo-home"
        ]);
    }

    public function dashboard() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        return view('admin.dashboard', [
            "title" => "Dashboard",
            "page" => "accessoslo-admin"
        ]);
    }

    public function executiveSearchCharter(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $executive_badge = BookingCharters::where('booking_type', 'executive')->where('is_added', '1')->count();       
        $aircrafts = AircraftCars::get();
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = BookingCharters::where('booking_type', 'executive')->where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('id', $search)->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'executive')->where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'executive')->where('contact_person', 'LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {
                $datas = BookingCharters::where('booking_type', 'executive')->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'executive')->whereBetween('updated_at', [$startDate, $endDate])->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'executive')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'executive')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->count();     
            }       
        }
        return view('admin.executive-charter', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "Executive Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function executiveCharter() {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $datas = BookingCharters::where('booking_type', 'executive')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingCharters::count();       
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.executive-charter', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "Executive Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function groupCharter() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingCharters::where('booking_type', 'group')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingCharters::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.group-charter', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "Group Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function groupSearchCharter(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = BookingCharters::where('booking_type', 'group')->where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('id', $search)->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'group')->where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'group')->where('contact_person', 'LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {
                $datas = BookingCharters::where('booking_type', 'group')->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'group')->whereBetween('updated_at', [$startDate, $endDate])->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'group')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'group')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->count();     
            }     
        }      
        return view('admin.group-charter', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "Group Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function helicopterCharter() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingCharters::where('booking_type', 'helicopter')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingCharters::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.helicopter-charter', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "Helicopter Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function helicopterSearchCharter(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();       
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = BookingCharters::where('booking_type', 'helicopter')->where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('id', $search)->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'helicopter')->where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'helicopter')->where('contact_person','LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {
                $datas = BookingCharters::where('booking_type', 'helicopter')->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'helicopter')->whereBetween('updated_at', [$startDate, $endDate])->count();         
            } else {
                $datas = BookingCharters::where('booking_type', 'helicopter')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingCharters::where('booking_type', 'helicopter')->where('status', $status)->whereBetween('updated_at', [$startDate, $endDate])->count();     
            } 
        }          
        return view('admin.helicopter-charter', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "Helicopter Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function cargoCharter() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = CargoBooking::orderBy('updated_at', 'desc')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = CargoBooking::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.cargo-charter', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "Cargo & Special Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function cargoSearchCharter(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = CargoBooking::where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = CargoBooking::where('id', $search)->count();         
            } else {
                $datas = CargoBooking::where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = CargoBooking::where('contact_person', 'LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {  
                $datas = CargoBooking::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = CargoBooking::whereBetween('updated_at', [$startDate, $endDate])->count();
            } else {
                $datas = CargoBooking::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = CargoBooking::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->count();
            }      
        }
        return view('admin.cargo-charter', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "Cargo & Special Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function meetGreet() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingMeet::orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingMeet::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.meet-greet', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "MEET & GREET",
            "page" => "accessoslo-admin"
        ]);
    }

    public function meetSearchCharter(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = BookingMeet::where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingMeet::where('id', $search)->count();         
            } else {
                $datas = BookingMeet::where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingMeet::where('contact_person', 'LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {
                $datas = BookingMeet::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingMeet::whereBetween('updated_at', [$startDate, $endDate])->count();       
            } else {
                $datas = BookingMeet::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingMeet::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->count();   
            }     
        }          
        return view('admin.meet-greet', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "MEET & GREET",
            "page" => "accessoslo-admin"
        ]);
    }

    public function airportLimousine() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingLimousine::orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingLimousine::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.airport-limousine', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "BOOK AIRPORT LIMOUSINE",
            "page" => "accessoslo-admin"
        ]);
    }

    public function airportSearchLimousine(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {
            if (is_numeric ($search)) {
                $datas = BookingLimousine::where('id', $search)->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingLimousine::where('id', $search)->count();         
            } else {
                $datas = BookingLimousine::where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
                $counts = BookingLimousine::where('contact_person', 'LIKE', '%'.$search.'%')->count();  
            }
        } else {
            if ($status == "all-status") {  
                $datas = BookingLimousine::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = BookingLimousine::whereBetween('updated_at', [$startDate, $endDate])->count();  
            } else {
                $datas = BookingLimousine::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = BookingLimousine::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->count();   
            }     
        }   
        return view('admin.airport-limousine', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "BOOK AIRPORT LIMOUSINE",
            "page" => "accessoslo-admin"
        ]);
    }

    public function handlingRequests() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = HandlingRequest::orderBy('updated_at', 'desc')->paginate(10);
        $counts = HandlingRequest::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.handling-requests', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "HANDLING REQUEST",
            "page" => "accessoslo-admin"
        ]);
    }

    public function handlingSearchRequests(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $status = $request->status;
        $search = $request->search;
        
        if ($search != "search") {        
            $datas = HandlingRequest::where('company', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
            $counts = HandlingRequest::where('company', 'LIKE', '%'.$search.'%')->count();             
        } else {
            if ($status == "all-status") {  
                $datas = HandlingRequest::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = HandlingRequest::whereBetween('updated_at', [$startDate, $endDate])->count();
            } else {
                $datas = HandlingRequest::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->orderBy('updated_at', 'desc')->paginate(12);  
                $counts = HandlingRequest::whereBetween('updated_at', [$startDate, $endDate])->where('status', $status)->count();
            }     
        }
        $aircrafts = AircraftCars::get();
        return view('admin.handling-requests', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "HANDLING REQUEST",
            "page" => "accessoslo-admin"
        ]);
    }

    public function airPassenger() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = AirpassengerTax::orderBy('updated_at', 'desc')->paginate(10);
        $counts = AirpassengerTax::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        return view('admin.air-passenger', compact('datas', 'send_startDate', 'send_endDate', 'counts'), [
            "title" => "AIR PASSENGER TAX",
            "page" => "accessoslo-admin"
        ]);
    }

    public function airSearchPassenger(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";  
        $search = $request->search;
        
        if ($search != "search") {        
            $datas = AirpassengerTax::where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
            $counts = AirpassengerTax::where('contact_person', 'LIKE', '%'.$search.'%')->count();             
        } else {
            $datas = AirpassengerTax::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12);  
            $counts = AirpassengerTax::whereBetween('updated_at', [$startDate, $endDate])->count();
        }        
        return view('admin.air-passenger', compact('datas','send_startDate','send_endDate', 'counts'), [
            "title" => "AIR PASSENGER TAX",
            "page" => "accessoslo-admin"
        ]);
    }

    public function privateTravel() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingTravels::where('travel_type', 'private')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingTravels::where('travel_type', 'private')->count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.private-travel', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "Destination Oslo",
            "page" => "accessoslo-admin"
        ]);
    }

    public function privateSearchTravel(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();
    
        $datas = BookingTravels::where('travel_type', 'private')->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12); 
        $counts = BookingTravels::where('travel_type', 'private')->whereBetween('updated_at', [$startDate, $endDate])->count();    
        return view('admin.private-travel', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "Destination Oslo",
            "page" => "accessoslo-admin"
        ]);
    }

    public function groupTravel() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = BookingTravels::where('travel_type', 'group')->orderBy('updated_at', 'desc')->paginate(10);
        $counts = BookingTravels::where('travel_type', 'group')->count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");
        $aircrafts = AircraftCars::get();
        return view('admin.group-travel', compact('datas', 'send_startDate', 'send_endDate', 'counts', 'aircrafts'), [
            "title" => "EVENT & GROUP TRAVEL",
            "page" => "accessoslo-admin"
        ]);
    }

    public function groupSearchTravel(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";
        $aircrafts = AircraftCars::get();

        $datas = BookingTravels::where('travel_type', 'group')->whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12); 
        $counts = BookingTravels::where('travel_type', 'group')->whereBetween('updated_at', [$startDate, $endDate])->count();

        return view('admin.group-travel', compact('datas','send_startDate','send_endDate', 'counts', 'aircrafts'), [
            "title" => "EVENT & GROUP TRAVEL",
            "page" => "accessoslo-admin"
        ]);
    }

    public function emptyLegBooking() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = EmptyLegUserBooking::orderBy('updated_at', 'desc')->paginate(10);
        $counts = EmptyLegUserBooking::count();
        $send_startDate = date("m/d/Y");
        $send_endDate = date("m/d/Y");

        return view('admin.emptyleg', compact('datas', 'send_startDate', 'send_endDate', 'counts'), [
            "title" => "Emptyleg Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function emptylegSearchBooking(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $send_startDate = $request->startDate;
        $send_endDate = $request->endDate;
        $startDate_array = explode("/", $send_startDate); 
        $endDate_array = explode("/", $send_endDate);
        $startDate = "$startDate_array[2]-$startDate_array[0]-$startDate_array[1]"." 00:00:00";     
        $endDate = "$endDate_array[2]-$endDate_array[0]-$endDate_array[1]"." 23:59:59";  
        $search = $request->search;
        if ($search != "search") {        
            $datas = EmptyLegUserBooking::where('contact_person', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(12);
            $counts = EmptyLegUserBooking::where('contact_person', 'LIKE', '%'.$search.'%')->count();             
        } else {
            $datas = EmptyLegUserBooking::whereBetween('updated_at', [$startDate, $endDate])->orderBy('updated_at', 'desc')->paginate(12); 
            $counts = EmptyLegUserBooking::whereBetween('updated_at', [$startDate, $endDate])->count();
        }
        return view('admin.emptyleg', compact('datas','send_startDate','send_endDate', 'counts'), [
            "title" => "Emptyleg Charter",
            "page" => "accessoslo-admin"
        ]);
    }

    public function emptyLeg() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = EmptyLegBooking::orderBy('updated_at', 'desc')->paginate(8);
        $counts = EmptyLegBooking::count();
        return view('admin.empty-leg', compact('datas', 'counts'), [
            "title" => "EMPTY LEG FLIGHT",
            "page" => "accessoslo-admin"
        ]);
    }

    public function emptyLegSearch(Request $request) {
        if(!Auth::check()){
            return json_encode(Auth::check());
        }
        $search = $request->search;
        if (is_numeric ($search)) {
            $datas = EmptyLegBooking::where('seats', $search)->orderBy('updated_at', 'desc')->paginate(8);
            $counts = EmptyLegBooking::where('seats', $search)->count();
        } else {
            $datas = EmptyLegBooking::orWhere('partner_name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('partner_name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('flight_no', 'LIKE', '%'.$search.'%')
                                    ->orWhere('end_date', 'LIKE', '%'.$search.'%')
                                    ->orWhere('end_time', 'LIKE', '%'.$search.'%')
                                    ->orWhere('aircraft', 'LIKE', '%'.$search.'%')
                                    ->orWhere('departure', 'LIKE', '%'.$search.'%')
                                    ->orWhere('destination', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(8);
            $counts = EmptyLegBooking::orWhere('partner_name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('partner_name', 'LIKE', '%'.$search.'%')
                                    ->orWhere('flight_no', 'LIKE', '%'.$search.'%')
                                    ->orWhere('end_date', 'LIKE', '%'.$search.'%')
                                    ->orWhere('end_time', 'LIKE', '%'.$search.'%')
                                    ->orWhere('aircraft', 'LIKE', '%'.$search.'%')
                                    ->orWhere('departure', 'LIKE', '%'.$search.'%')
                                    ->orWhere('destination', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->count();
        }
        return view('admin.empty-leg', compact('datas', 'counts'), [
            "title" => "EMPTY LEG FLIGHT",
            "page" => "accessoslo-admin"
        ]);
    }

    public function customers() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
      
        $users = User::where('role_id', '2')->orderBy('updated_at', 'desc')->paginate(8);
        $counts = User::count();
        return view('admin.customers', compact('users', 'counts'), [
            "title" => "CUSTOMERS",
            "page" => "accessoslo-admin"
        ]);
    }

    public function singleCustomer($id) {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $user = Profile::where('user_id',$id)->first();
        return view('admin.single-customer', compact('user'), [
            "title" => "SINGLE CUSTOMER",
            "page" => "accessoslo-admin"
        ]);
    }

    public function partners() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = Partners::orderBy('updated_at', 'desc')->paginate(8);
        $counts = Partners::count();
        return view('admin.partners', compact('datas', 'counts'), [
            "title" => "PARTNERS",
            "page" => "accessoslo-admin"           
        ]);
    }

    public function partnersSearch(Request $request) {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $search = $request->search;
        $datas = Partners::orWhere('contact_person', 'LIKE', '%'.$search.'%')->orWhere('partner_name', 'LIKE', '%'.$search.'%')->orderBy('updated_at', 'desc')->paginate(8);
        $counts = Partners::orWhere('contact_person', 'LIKE', '%'.$search.'%')->orWhere('partner_name', 'LIKE', '%'.$search.'%')->count();
        return view('admin.partners', compact('datas', 'counts'), [
            "title" => "PARTNERS",
            "page" => "accessoslo-admin"           
        ]);
    }

    public function pages() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = PageSettings::paginate(10);
        return view('admin.pages', compact('datas'), [
            "title" => "PAGES",
            "page" => "accessoslo-admin"
        ]);
    }

    public function singlePage($id) {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $data = PageSettings::where('id', $id)->first();
        return view('admin.single-page', compact('data'), [
            "title" => "EDIT PAGE",
            "page" => "accessoslo-admin"
        ]);
    }

    public function posts() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $datas = PostPages::paginate(10);
        return view('admin.posts', compact('datas'), [
            "title" => "POSTS",
            "page" => "accessoslo-admin"
        ]);
    }

    public function singlePost($id) {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        if ($id == "new") {
            $data = PostPages::where('id', '0')->first();
            $type = "new";
        } else {
            $data = PostPages::where('id', $id)->first();
            $type = "edit";
        }
        return view('admin.single-post', compact('data', 'type'), [
            "title" => "EDIT POST",
            "page" => "accessoslo-admin"
        ]);
    }

    public function aircraftsCars() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $aircrafts = AircraftCars::paginate(7);
        return view('admin.aircrafts-cars', compact('aircrafts'), [
            "title" => "AIRCRAFTS & CARS",
            "page" => "accessoslo-admin"
        ]);
    }

    public function aircraftsCarsSearch(Request $request) {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        $search = $request->search;
        $aircrafts = AircraftCars::orWhere('partner_name', 'LIKE', '%'.$search.'%')->orWhere('type', 'LIKE', '%'.$search.'%')->paginate(7);
        return view('admin.aircrafts-cars', compact('aircrafts'), [
            "title" => "AIRCRAFTS & CARS",
            "page" => "accessoslo-admin"
        ]);
    }

    public function settings() {
        if(!Auth::check()){
            return redirect()->route('home');
        }
        return view('admin.setting', [
            "title" => "settings",
            "page" => "accessoslo-admin"
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