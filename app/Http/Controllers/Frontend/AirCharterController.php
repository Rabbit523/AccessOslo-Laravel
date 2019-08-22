<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\PageSettings;
use App\Models\Core\EmptyLegBooking;
class AirCharterController extends Controller
{    
    public function executive() {
        $page = PageSettings::where('id', '2')->first();
        return view('pages.air-charter.executive', [
            "title" => "Home",
            "page" => "accessoslo-executive-charter accessoslo-template-2",
            "data" => $page,
            "ngApp" => "accessosloApp"                      
        ]);
    }

    public function group() {
        $page = PageSettings::where('id', '3')->first();
        return view('pages.air-charter.group', [
            "title" => "Home",
            "page" => "accessoslo-group-charter accessoslo-template-2",
            "data" => $page,
            "ngApp" => "accessosloApp"           
        ]);
    }

    public function cargo() {
        $page = PageSettings::where('id', '4')->first();
        return view('pages.air-charter.cargo', [
            "title" => "Home",
            "page" => "accessoslo-cargo-special-charter accessoslo-template-2",
            "data" => $page,
            "ngApp" => "accessosloApp"           
        ]);
    }

    public function helicopter() {
        $page = PageSettings::where('id', '5')->first();
        return view('pages.air-charter.helicopter', [
            "title" => "Home",
            "page" => "accessoslo-helicopter-charter accessoslo-template-2",
            "data" => $page,
            "ngApp" => "accessosloApp"           
        ]);
    }

    public function emptylegFlights() {
        $datas = EmptyLegBooking::where('end_date', '>=', date("m/d/Y"))->orderBy('updated_at', 'desc')->paginate(3);
        $counts = EmptyLegBooking::where('end_date', '>=', date("m/d/Y"))->count();
        $date = date("m/d?Y");
        $departure = "";
        $destination = "";
        $time = "";
        $type = "empty";
        return view('pages.home', compact('datas', 'counts', 'date', 'departure', 'destination', 'time', 'type'), [
            "title" => "Home",
            "page" => "accessoslo-home"
        ]);
    }
}