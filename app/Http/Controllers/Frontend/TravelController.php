<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\PageSettings;
use App\Models\Core\PageSlideImages;

class TravelController extends Controller
{
    public function groundTransport() {
        $page = PageSettings::where('id', '41')->first();
        $slides = PageSlideImages::where('page_id', '41')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '41')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '41')->where('is_sub_banner', 'true')->first();  
        return view('pages.travel.ground-transport', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function privateTravel() {
        $page = PageSettings::where('id', '15')->first();
        $slides = PageSlideImages::where('page_id', '15')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '15')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '15')->where('is_sub_banner', 'true')->first();  
        return view('pages.travel.private-travel', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
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

    public function destinationBergen() {
        $page = PageSettings::where('id', '42')->first();
        $slides = PageSlideImages::where('page_id', '42')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '42')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '42')->where('is_sub_banner', 'true')->first();        
        return view('pages.travel.destination-bergen', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function destinationTromso() {
        $page = PageSettings::where('id', '43')->first();
        $slides = PageSlideImages::where('page_id', '43')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '43')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '43')->where('is_sub_banner', 'true')->first();
        return view('pages.travel.destination-tromso', compact('slides', 'count', 'sub_banner'),[
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function eventMeeting() {
        $page = PageSettings::where('id', '44')->first();
        $slides = PageSlideImages::where('page_id', '44')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '44')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '44')->where('is_sub_banner', 'true')->first();  
        return view('pages.event.event-meeting', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function eventIncentive() {
        $page = PageSettings::where('id', '45')->first();
        $slides = PageSlideImages::where('page_id', '45')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '45')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '45')->where('is_sub_banner', 'true')->first();
        return view('pages.event.event-incentive', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function eventConference() {
        $page = PageSettings::where('id', '46')->first();
        $slides = PageSlideImages::where('page_id', '46')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '46')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '46')->where('is_sub_banner', 'true')->first();
        return view('pages.event.event-conference', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }
    public function eventEvent() {
        $page = PageSettings::where('id', '47')->first();
        $slides = PageSlideImages::where('page_id', '47')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '47')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '47')->where('is_sub_banner', 'true')->first();
        return view('pages.event.event-event', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function eventWedding() {
        $page = PageSettings::where('id', '48')->first();
        $slides = PageSlideImages::where('page_id', '48')->where('is_sub_banner', null)->get();
        $count = PageSlideImages::where('page_id', '48')->where('is_sub_banner', null)->count();
        $sub_banner = PageSlideImages::where('page_id', '48')->where('is_sub_banner', 'true')->first();
        return view('pages.event.event-wedding', compact('slides', 'count', 'sub_banner'), [
            "title" => "Home",
            "page" => "accessoslo-destination-bergen accessoslo-template-2",
            "data" => $page
        ]);
    }
}