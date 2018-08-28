<?php

namespace App\Services\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use App\Models\Core\BookingCharters;
use App\Models\Core\BookingMeet;
use App\Models\Core\BookingLimousine;
use App\Models\Core\HandlingRequest;
use App\Models\Core\AirpassengerTax;
use App\Models\Core\BookingTravels;
use App\Models\Core\PageSettings;
use App\Models\Core\SecurityQuestions;
use App\Models\Core\AircraftCars;
use App\Models\Core\AircraftImage;
use App\Models\Core\PostPages;
use App\Models\Core\User;

use App\Mail\LimousineConfirmation;
use App\Mail\MeetConfirmation;
use App\Mail\BookingTravel;
use App\Mail\UserRegister;
use App\Mail\PassengerTax;
use App\Mail\PassengerTaxCustomer;
use App\Mail\HandlingRequestConfirmation;

class AirportServices
{
  public static function meetBooking (Request $request) {
    $meet = BookingMeet::create($request->all());
    $meet->is_added = "1";
    $meet['member_notice'] = "1";
    $meet->status = "awaiting";
    $meet->save();
    
    $str = $request->input('contact_person');
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      if ($str == trim($str) && strpos($str, ' ') !== false) { 
        $name = explode(" ", $str);
        $userData = [
          'first_name' => $name[0],
          'last_name' => $name[1],
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'
        ];
      } else {
        $userData = [
          'first_name' => "",
          'last_name' => $str,
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'
        ];
      }
      $user = User::create($userData);
      Mail::to($user->email)
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }
    
    Mail::to($meet->email)
    ->send(new MeetConfirmation($meet));
    return ["booking" => $meet, "redirect" => route("member-dashboard")];
  }

  public static function deleteMeet (Request $request) {
    BookingMeet::where('id', $request->input('target'))->delete();
    return ['data' => 'meet'];
  }

  public static function getAllMeets () {
    return BookingMeet::all();
  }

  public static function getAllLimousines () {
    return BookingLimousine::all();
  }

  public static function getHandlingRequests () {
    return HandlingRequest::all();
  }

  public static function getAllPassengers () {
    return AirpassengerTax::all();
  }

  public static function getAllTravels ($type) {
    return BookingTravels::where('travel_type', $type)->get();
  }

  public static function limousineBooking (Request $request) {
    $limousine = BookingLimousine::create($request->all());
    $limousine->is_added = "1";
    $limousine->member_notice = "1";
    $limousine->status = "awaiting";
    $limousine->save();

    $str = $request->input('contact_person');
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      if ($str == trim($str) && strpos($str, ' ') !== false) {
        $name = explode(" ", $str);
        $userData = [
          'first_name' => $name[0],
          'last_name' => $name[1],
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      } else {
        $userData = [
          'first_name' => "",
          'last_name' => $str,
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'      
        ];
      }     
      $user = User::create($userData);      
      Mail::to($user->email)
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }
    return $limousine;
  }
  
  public static function deleteLimousine (Request $request) {
    BookingLimousine::where('id', $request->input('target'))->delete();
    return ['data' => 'limousine'];
  }

  public static function handlingRequest (Request $request) {
    $handling = HandlingRequest::create($request->all());
    $handling->is_added = "1";
    $handling->member_notice = "1";
    $handling->status = "awaiting";
    $handling->save();

    $password = rand(10000000,99999999);
    
    if (!User::where('email', $request->input('email'))->first()) {
      $userData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email'=> $request->input('email'),
        'phone'=> $request->input('phone'),
        'password' => bcrypt($password),
        'profile_complete' => 'false',
        'role_id' => '2'      
      ];
      $user = User::create($userData);
      Mail::to($user->email)
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }

    Mail::to($handling->email)
    ->send(new HandlingRequestConfirmation($handling));

    return ["booking" => $handling, "redirect" => route("member-dashboard")];
  }

  public static function deleteHandling (Request $request) {
    HandlingRequest::where('id', $request->input('target'))->delete();
    return ['data' => 'handling'];
  }

  public static function passengerTax (Request $request) {
    $passenger = AirpassengerTax::create($request->all());
    $passenger->is_added = "1";
    $passenger->member_notice = "1";
    $passenger->save();

    $str = $request->input('contact_person');    
    $password = rand(10000000,99999999);
    if (!User::where('email', $request->input('email'))->first()) {
      if ($str == trim($str) && strpos($str, ' ') !== false) {
        $name = explode(" ", $str);
        $userData = [
          'first_name' => $name[0],
          'last_name' => $name[1],
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'
        ];
      } else {
        $userData = [
          'first_name' => "",
          'last_name' => $str,
          'email'=> $request->input('email'),
          'phone'=> $request->input('phone'),
          'password' => bcrypt($password),
          'profile_complete' => 'false',
          'role_id' => '2'
        ];
      }
      $user = User::create($userData);
      Mail::to($user->email)      
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }
    Mail::to($passenger->email)    
    ->send(new PassengerTaxCustomer($passenger));

    return ["passengerTax" => $passenger];
  }

  public static function bookingTravels (Request $request) {
    $travel = BookingTravels::create($request->all());
    $travel->is_added = "1";
    $travel->member_notice = "1";
    $travel->status = "awaiting";
    $travel->save();

    $password = rand(10000000,99999999);
    
    if (!User::where('email', $request->input('email'))->first()) {
      $userData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'email'=> $request->input('email'),
        'phone'=> $request->input('phone'),
        'password' => bcrypt($password),
        'profile_complete' => 'false',
        'role_id' => '2'      
      ];
      $user = User::create($userData);
      Mail::to($user->email)      
      ->send(new UserRegister($password, $user->first_name, $user->last_name));
    }

    Mail::to("$travel->email")   
    ->send(new BookingTravel($travel));
    return ["Travel" => $travel];
  }

  public static function addBannerImage (Request $request) {
    if ($request->file('file')->isValid()){ 
      $page = PageSettings::where('id', $request->input('id'))->first();
      $url = url("/assets/uploads/pages") ."/" . $request->file->store('', 'pages');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $page->banner_img = $path;
      $page->save();
      return $page->banner_img;
    }else{
        return ["error" => "No image attached"];
    }
  }

  public static function addPageImage (Request $request) {
    if ($request->file('file')->isValid()){ 
      $post = PostPages::where('id', $request->input('id'))->first();
      $url = url("/assets/uploads/posts") ."/" . $request->file->store('', 'posts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $post->post_img = $path;
      $post->save();
      return $post->post_img;
    }else{
        return ["error" => "No image attached"];
    }
  }

  public static function addPostImage (Request $request) {
    if ($request->file('file')->isValid()){ 
      $post = PostPages::where('id', $request->input('id'))->first();
      $url = url("/assets/uploads/posts") ."/" . $request->file->store('', 'posts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $post->single_img = $path;
      $post->save();
      return $post->single_img;
    }else{
        return ["error" => "No image attached"];
    }
  }

  public static function savePosts (Request $request) {  
    return PostPages::create($request->all());
  }

  public static function deletePosts (Request $request) {  
    return PostPages::where('id', $request->input('id'))->delete();
  }

  public static function updatePosts (Request $request) {  
    $data = $request->all();
    $post = PostPages::where('id', $data['id'])->first();
    $post->post_title = $data['post_title'];
    $post->meta_title = $data['meta_title'];
    $post->post_description = $data['post_description'];
    $post->meta_description = $data['meta_description'];
    if ($post->status != "published") {
      $post->status = $data['status'];
      $post->published_date = $data['published_date'];
    }    
    $post->author = $data['author'];
    $post->save();
    return $post;
  }

  public static function publishPosts (Request $request) {  
    $post = PostPages::where('id', $request->input('id'))->first();
    $post->status = $request->input('status');
    $post->published_date = date("Y.m.d");
    $post->save();
    return $post;
  }

  public static function createPage (Request $request) {
    $page = PageSettings::create($request->all());
    return $page->id;
  }

  public static function savePage (Request $request) { 
    $page = PageSettings::where('id', $request->input('id'))->first();
    $page->author = $request->input('author');
    $page->page_title = $request->input('page_title');
    $page->page_title_plain = $request->input('page_title_plain');
    $page->page_content = $request->input('page_content');
    $page->extra_content = $request->input('extra_content');
    $page->meta_title = $request->input('meta_title');
    $page->meta_description = $request->input('meta_description');
    if (!$page->banner_img) {
      $page->banner_img = $request->input('banner_img'); 
    }
    if ($page->status != "published") {
      $page->published_date = "saved";
      $page->status = "saved";
    }    
    $page->save();
    return $page;
  }

  public static function publishPage (Request $request) {
    $page = PageSettings::where('id', $request->input('id'))->first();
    $page->page_title = $request->input('page_title');
    $page->page_title_plain = $request->input('page_title_plain');
    $page->page_content = $request->input('page_content');
    $page->extra_content = $request->input('extra_content');
    $page->meta_title = $request->input('meta_title');
    $page->meta_description = $request->input('meta_description');
    $page->status = "published";
    $page->published_date = date('Y.m.d h:i:sa');
    $page->save();
    return $page;
  }

  public static function deletePage (Request $request) {
    $page = PageSettings::where('id', $request->input('value'))->first();
    $page->delete();
    return ["dest"=> "delete page", "value"=>"success"];
  }

  public static function securityQuestions (Request $request) {
       return SecurityQuestions::create($request->all());
  }

  public static function createAircraft (Request $request) {
    return AircraftCars::create($request->all());
  }

  public static function updateAircraft (Request $request) {
    $aircrafts =  AircraftCars::where('id', $request->input('id'))->first();
    $aircrafts->partner_name = $request->input('partner_name');
    $aircrafts->type = $request->input('type');
    $aircrafts->capacity = $request->input('capacity');
    $aircrafts->save();
    return $aircrafts;
  }

  public static function AircraftImageUpload (Request $request) {
    if ($request->file('file')->isValid()){ 
      $url = url("/assets/uploads/aircrafts") ."/" . $request->file->store('', 'aircrafts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $aircrafts = AircraftCars::where('id', $request->input('id'))->first();
      $aircrafts->img = $path;
      $aircrafts->save();
      $image = AircraftImage::create(["parent_id" => $request->input('id'), "url" => $url]);
      return $url;
    }else{
        return ["error" => "No image attached"];
    }
  }

  public static function deleteAircraftImage (Request $request) {
    $image = AircraftImage::where("url", $request->input('url'))->delete();
    return ["success" => "No image attached"]; 
  }

  public static function getAircraftImage (Request $request) {
    return ["urls" => AircraftImage::where("parent_id", $request->input('id'))->get(), "counts" => AircraftImage::where("parent_id", $request->input('id'))->count()];
  }

  public static function saveExtraBonus (Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    $user->bonus = $user->bonus + $request->input('extra_bonus');
    $user->save();
    return $user;
  }
}