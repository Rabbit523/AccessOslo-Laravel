<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Core\PageSettings;

class LoyaltyController extends Controller
{

    public function signup() {      
        $page = PageSettings::where('id', '37')->first();
        return view('pages.loyalty.signup', [
            "title" => "Home",
            "page" => "accessoslo-become-member",
            "ngApp" => "accessosloJoin",
            'data' => $page
        ]);
    }

    public function login() {
        $redirect = "no redirect";
        $page = PageSettings::where('id', '36')->first();
        return view('pages.loyalty.login', compact('redirect'), [
            "title" => "Home",
            "page" => "accessoslo-login",
            'data'=> $page
        ]);
    }
    
    public function loginRedirect(Request $request) {
        $redirect = $request->redirect;
        $page = PageSettings::where('id', '36')->first();
        return view('pages.loyalty.login', compact('redirect'), [
            "title" => "Home",
            "page" => "accessoslo-login",
            'data'=> $page
        ]);
    }
}