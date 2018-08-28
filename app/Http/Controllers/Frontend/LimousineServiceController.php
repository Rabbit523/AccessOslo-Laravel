<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LimousineServiceController extends Controller
{

    public function sClass() {
        return view('pages.limousine-service.s-class', [
            "title" => "Home",
            "page" => "accessoslo-executive-charter accessoslo-template-2"
        ]);
    }

    public function vClass() {
        return view('pages.limousine-service.v-class', [
            "title" => "Home",
            "page" => "accessoslo-business-helicopter accessoslo-template-2"
        ]);
    }
}