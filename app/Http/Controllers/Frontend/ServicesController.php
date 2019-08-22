<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\PageSettings;
use App\Models\Core\AircraftCars;
class ServicesController extends Controller
{
    public function meetAndGreet() {
        $page = PageSettings::where('id', '6')->first();
        return view('pages.services.meet-greet', [
            "title" => "Home",
            "page" => "accessoslo-meet-and-greet accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function limousineTransport() {
        $page = PageSettings::where('id', '7')->first();
        return view('pages.services.limousine-transport', [
            "title" => "Home",
            "page" => "accessoslo-limousine-transport accessoslo-template-1",
            "data" => $page
        ]);
    }

    public function handling() {
        $page = PageSettings::where('id', '8')->first();
        $aircrafts = AircraftCars::get();
        return view('pages.services.handling-request', compact('aircrafts'), [
            "title" => "Home",
            "page" => "accessoslo-handling-request accessoslo-template-2",
            "data" => $page
        ]);
    }
}