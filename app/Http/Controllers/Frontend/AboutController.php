<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Core\PostPages;
use App\Models\Core\Partners;
use App\Models\Core\PartnerReviews;
use App\Models\Core\PageSettings;

class AboutController extends Controller
{
    public function contact() {
        $page = PageSettings::where('id', '19')->first();
        return view('pages.about.contact-us', [
            "title" => "Home",
            "page" => "accessoslo-contact-us accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function ourTeam() {
        $page = PageSettings::where('id', '21')->first();
        return view('pages.about.about', [
            "title" => "Home",
            "page" => "accessoslo-meet-dedicated accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function ourPartners() {
        $partner = PageSettings::where('id', '23')->first();
        $datas = Partners::orderBy('updated_at', 'desc')->paginate(3);
        $counts = Partners::count();
        return view('pages.about.partners', compact('datas', 'counts', 'partner'), [
            "title" => "Home",
            "page" => "accessoslo-partners"
        ]);
    }

    public function singlePartner(Request $request) {   
        $data = Partners::where('id', $request->id)->first();
        $reviews = PartnerReviews::where('partner_name', $data->partner_name)->paginate(6);
        $counts = PartnerReviews::where('partner_name', $data->partner_name)->count();
        return view('pages.about.single-partner', compact('data', 'reviews', 'counts'), [
            "title" => "PARTNERS",
            "page" => "accessoslo-single-partner"           
        ]);
    }

    public function whyUs() {
        $page = PageSettings::where('id', '20')->first();
        return view('pages.about.whyus', [
            "title" => "Home",
            "page" => "accessoslo-passenger-charter accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function safety() {
        $page = PageSettings::where('id', '22')->first();
        return view('pages.about.safety', [
            "title" => "Home",
            "page" => "accessoslo-passenger-charter accessoslo-template-2",
            "data" => $page
        ]);
    }

    public function latestNews() {
        $news = PageSettings::where('id', '23')->first();
        $datas = PostPages::where('status', 'published')->paginate(3);
        $page = PageSettings::where('id', '38')->first();
        return view('pages.about.latestnews', compact('datas', 'news'), [
            "title" => "Home",
            "page" => "accessoslo-latest-news accessoslo-template-2",
            'data' => $page
        ]);
    }

    public function latestNewsByID($id) {
        $data = PostPages::where('id', $id)->first();
        $posts = PostPages::where('status', 'published')->paginate(4);
        return view('pages.about.single-latestnews', compact('data', 'posts'), [
            "title" => "Home",
            "page" => "accessoslo-latest-news accessoslo-template-2"
        ]);
    }
}