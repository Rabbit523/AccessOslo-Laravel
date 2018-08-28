<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\PageSettings;
class TravelController extends Controller
{
    public function privateTravel() {
        $page = PageSettings::where('id', '15')->first();
        return view('pages.travel.private-travel', [
            "title" => "Home",
            "page" => "accessoslo-private-travel accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function eventTravel() {
        $page = PageSettings::where('id', '16')->first();
        return view('pages.travel.event-travel', [
            "title" => "Home",
            "page" => "accessoslo-event-group-travel accessoslo-template-2",
            "data" => $page
        ]);
    }
}