<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\PageSettings;
class FBOController extends Controller
{

    public function osloFbo() {
        $page = PageSettings::where('id', '9')->first();
        return view('pages.fbo.oslo-fbo', [
            "title" => "Home",
            "page" => "accessoslo-fbo-services",
            "data" => $page
        ]);
    }

    public function sandejordFbo() {
        $page = PageSettings::where('id', '10')->first();
        return view('pages.fbo.sandejord-fbo', [
            "title" => "Home",
            "page" => "accessoslo-sandefjord-fbo",
            "data" => $page            
        ]);
    }
    
    public function servicesFbo() {
        $page = PageSettings::where('id', '11')->first();
        return view('pages.fbo.fbo-services', [
            "title" => "Home",
            "page" => "accessoslo-fbo-services",
            "data" => $page            
        ]);
    }

    public function supervision() {
        $page = PageSettings::where('id', '12')->first();
        return view('pages.fbo.supervision', [
            "title" => "Home",
            "page" => "accessoslo-partners accessoslo-template-2",
            "data" => $page            
        ]);
    }

    public function vipCatering($handle = null) {
        $page = PageSettings::where('id', '13')->first();
        return view('pages.fbo.vip-catering', [
            "title" => "Home",
            "page" => "accessoslo-single-partner accessoslo-template-2",
            "data" => $page            
        ]);
    }

    public function airPassengerTax() {
        $page = PageSettings::where('id', '14')->first();
        return view('pages.fbo.air-passenger-tax', [
            "title" => "Home",
            "page" => "accessoslo-air-passenger-tax",
            "ngApp" => "accessosloApp",
            "data" => $page            
        ]);
    }
}