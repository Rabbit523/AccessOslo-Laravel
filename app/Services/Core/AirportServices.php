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
use App\Models\Core\PageSlideImages;
use App\Models\Core\Member;

use App\Mail\LimousineConfirmation;
use App\Mail\MeetConfirmation;
use App\Mail\BookingTravel;
use App\Mail\UserRegister;
use App\Mail\PassengerTax;
use App\Mail\PassengerTaxCustomer;
use App\Mail\HandlingRequestConfirmation;
use App\Mail\MeetGreetMail;
use App\Mail\LimoEmail;
use App\Mail\HandlingAlertMail;
use App\Mail\PassengerTaxAlertMail;
use App\Mail\InvoiceRequestMail;
use Alert;

class AirportServices
{
  public static function meetBooking (Request $request) {    
    if (User::where('email', $request->input('email'))->first()) {
      $meet = BookingMeet::create($request->all());
      $meet['member_notice'] = "1";
      $meet['is_added'] = "1";
      $meet->status = "awaiting";
      $meet->save();
      Mail::to("contact@accessoslo.no")->send(new MeetGreetMail($meet));
      Mail::to("contact@accessoslo.no")->send(new MeetGreetMail($meet));
      return ["booking" => $meet, "redirect" => route("member-dashboard")];
    } else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
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
    if (User::where('email', $request->input('email'))->first()) {
      $limousine = BookingLimousine::create($request->all());    
      $limousine->member_notice = "1";
      $limousine->status = "awaiting";
      $limousine->save();
      Mail::to("contact@accessoslo.no")->send(new LimoEmail($limousine));
      return $limousine;
    } else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
  }
  
  public static function deleteLimousine (Request $request) {
    BookingLimousine::where('id', $request->input('target'))->delete();
    return ['data' => 'limousine'];
  }

  public static function handlingRequest (Request $request) {
    if (User::where('email', $request->input('email'))->first()) {
      $handling = HandlingRequest::create($request->all());
      $handling->is_added = "1";
      $handling->member_notice = "1";
      $handling->status = "awaiting";
      $handling->save();
      Mail::to("admin@fantasylab.io")->send(new HandlingAlertMail($handling));
      Mail::to("ops@accessoslo.no")->send(new HandlingAlertMail($handling));
      Mail::to("marketing@fantasylab.io")->send(new HandlingAlertMail($handling));
      return ["booking" => $handling, "redirect" => route("member-dashboard")];
    }  else {
      Alert::error('User not found!', 'Please create your account first.')->autoclose(5000);
      return ["type" => "error", "data" => 'failed. register first!'];
    }
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
      Mail::to($user->email)->send(new UserRegister($password, $user->first_name, $user->last_name));
      Mail::to("admin@fantasylab.io")->send(new PassengerTaxAlertMail($passenger));
      Mail::to("contact@accessoslo.no")->send(new PassengerTaxAlertMail($passenger));
    }
    Mail::to("admin@fantasylab.io")->send(new PassengerTaxAlertMail($passenger));
    Mail::to("contact@accessoslo.no")->send(new PassengerTaxAlertMail($passenger));

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

    // Mail::to("$travel->email")
    // ->send(new BookingTravel($travel));
    return ["Travel" => $travel, "redirect" => route("member-dashboard")];
  }

  public static function addBannerImage (Request $request) {
    if ($request->file('file')->isValid()){
      $url = url("/assets/uploads/pages") ."/" . $request->file->store('', 'pages');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      return $path;
    }else{
      return ["error" => "No image attached"];
    }
  }

  public static function addPageImage (Request $request) {
    if ($request->file('file')->isValid()){ 
      $url = url("/assets/uploads/posts") ."/" . $request->file->store('', 'posts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      return $path;
    }else{
      return ["error" => "No image attached"];
    }
  }

  public static function addPostImage (Request $request) {
    if ($request->file('file')->isValid()){
      $url = url("/assets/uploads/posts") ."/" . $request->file->store('', 'posts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      return $path;
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
    $post = PostPages::where('id', $request->id)->first();
    if (isset($request->post_img)) {
      $post->post_img = $request->post_img;
    }
    if (isset($request->single_img)) {
      $post->single_img = $request->single_img;
    }
    if (isset($request->en_post_title)) {
      $post->en_post_title = $request->en_post_title;
    }
    if (isset($request->en_post_description)) {
      $post->en_post_description = $request->en_post_description;
    }
    if (isset($request->en_meta_title)) {
      $post->en_meta_title = $request->en_meta_title;
    }
    if (isset($request->en_meta_description)) {
      $post->en_meta_description = $request->en_meta_description;
    }
    if (isset($request->nb_post_title)) {
      $post->nb_post_title = $request->nb_post_title;
    }
    if (isset($request->nb_post_description)) {
      $post->nb_post_description = $request->nb_post_description;
    }
    if (isset($request->nb_meta_title)) {
      $post->nb_meta_title = $request->nb_meta_title;
    }
    if (isset($request->nb_meta_description)) {
      $post->nb_meta_description = $request->nb_meta_description;
    }
    if ($post->status != "published") {
      $post->published_date = "saved";
      $post->status = "saved";
    }
    $post->author = $request->author;
    $post->save();
    return $post;
  }

  public static function publishPosts (Request $request) {
    $post = PostPages::where('id', $request->id)->first();
    if (isset($request->post_img)) {
      $post->post_img = $request->post_img;
    }
    if (isset($request->single_img)) {
      $post->single_img = $request->single_img;
    }
    if (isset($request->en_post_title)) {
      $post->en_post_title = $request->en_post_title;
    }
    if (isset($request->en_post_description)) {
      $post->en_post_description = $request->en_post_description;
    }
    if (isset($request->en_meta_title)) {
      $post->en_meta_title = $request->en_meta_title;
    }
    if (isset($request->en_meta_description)) {
      $post->en_meta_description = $request->en_meta_description;
    }
    if (isset($request->nb_post_title)) {
      $post->nb_post_title = $request->nb_post_title;
    }
    if (isset($request->nb_post_description)) {
      $post->nb_post_description = $request->nb_post_description;
    }
    if (isset($request->nb_meta_title)) {
      $post->nb_meta_title = $request->nb_meta_title;
    }
    if (isset($request->nb_meta_description)) {
      $post->nb_meta_description = $request->nb_meta_description;
    }
    if ($post->status != "published") {
      $post->published_date = "saved";
      $post->status = "saved";
    }
    $post->status = $request->input('status');
    $post->published_date = date("Y.m.d");
    $post->author = $request->author;
    $post->save();
    return $post;
  }

  public static function createPage (Request $request) {
    $page = PageSettings::create($request->all());
    return $page;
  }

  public static function savePage (Request $request) { 
    $page = PageSettings::where('id', $request->input('id'))->first();
    $page->author = $request->input('author');
    $page->page_title_plain = $request->input('page_title_plain');
    if (isset($request->banner_img)) {
      $page->banner_img = $request->banner_img;
    }
    if (isset($request->en_page_title)) {
      $page->en_page_title = $request->en_page_title;
    }
    if (isset($request->en_page_content)) {
      $page->en_page_content = $request->en_page_content;
    }
    if (isset($request->en_meta_title)) {
      $page->en_meta_title = $request->en_meta_title;
    }
    if (isset($request->en_meta_description)) {
      $page->en_meta_description = $request->en_meta_description;
    }
    if (isset($request->nb_page_title)) {
      $page->nb_page_title = $request->nb_page_title;
    }
    if (isset($request->nb_page_content)) {
      $page->nb_page_content = $request->nb_page_content;
    }
    if (isset($request->nb_meta_title)) {
      $page->nb_meta_title = $request->nb_meta_title;
    }
    if (isset($request->nb_meta_description)) {
      $page->nb_meta_description = $request->nb_meta_description;
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
    $page->author = $request->input('author');
    $page->page_title_plain = $request->input('page_title_plain');
    if (isset($request->banner_img)) {
      $page->banner_img = $request->banner_img;
    }
    if (isset($request->en_page_title)) {
      $page->en_page_title = $request->en_page_title;
    }
    if (isset($request->en_page_content)) {
      $page->en_page_content = $request->en_page_content;
    }
    if (isset($request->en_meta_title)) {
      $page->en_meta_title = $request->en_meta_title;
    }
    if (isset($request->en_meta_description)) {
      $page->en_meta_description = $request->en_meta_description;
    }
    if (isset($request->nb_page_title)) {
      $page->nb_page_title = $request->nb_page_title;
    }
    if (isset($request->nb_page_content)) {
      $page->nb_page_content = $request->nb_page_content;
    }
    if (isset($request->nb_meta_title)) {
      $page->nb_meta_title = $request->nb_meta_title;
    }
    if (isset($request->nb_meta_description)) {
      $page->nb_meta_description = $request->nb_meta_description;
    }
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

  public static function deleteAircraft (Request $request) {    
    $aircraft =  AircraftCars::where('id', $request->id)->delete();
    return ["success" => "remove aircraft is successed"]; 
  }

  public static function updateAircraft (Request $request) {
    $aircrafts =  AircraftCars::where('id', $request->input('id'))->first();
    $aircrafts->partner_name = $request->input('partner_name');
    $aircrafts->type = $request->input('type');
    $aircrafts->capacity = $request->input('capacity');
    $aircrafts->max_range = $request->input('max_range');
    $aircrafts->wifi = $request->input('wifi');
    $aircrafts->manufacture = $request->input('manufacture');
    $aircrafts->flight_attendant = $request->input('flight_attendant');
    $aircrafts->save();
    return $aircrafts;
  }

  public static function AircraftImageUpload (Request $request) {
    if ($request->file('file')->isValid()){ 
      $url = url("/assets/uploads/aircrafts") ."/" . $request->file->store('', 'aircrafts');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      
      $count = AircraftImage::where("parent_id" , $request->input('id'))->count();
      if ($count < 5) {
        $aircrafts = AircraftCars::where('id', $request->input('id'))->first();
        $aircrafts->img = $path;
        $aircrafts->save();
        $image = AircraftImage::create(["parent_id" => $request->input('id'), "url" => $path]);
        return ["type" => "success", "url" => $url];
      } else {
        return ["type" => "failed", "url" => ""];
      }      
    }else{
        return ["error" => "No image attached"];
    }
  }

  public static function deleteAircraftImage (Request $request) {
    $image = AircraftImage::where("url", $request->input('url'))->first();
    $parent_id = $image->parent_id;
    $image->delete();
    $new_image = AircraftImage::where("parent_id", $parent_id)->first();
    $aircraft = AircraftCars::where('id', $parent_id)->first();
    $aircraft->img = $new_image->url;
    $aircraft->save();
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

  public static function SlideImageUpload (Request $request) {    
    $uploads_dir = "./assets/uploads/pages/";
    if (isset($request->image)) {      
      $img = str_replace('data:image/jpeg;base64,', '', $request->image);
      $data = base64_decode($img);
      $name = rand(00000000, 99999999).time();
      $file = $uploads_dir . $name . '.png';
      file_put_contents($file, $data);
      $url = url("/assets/uploads/pages") ."/" . $name;
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $data = [
        'page_id' => $request->page_id,
        'path' => $path. '.png'
      ];
      PageSlideImages::create($data);
      $count = PageSlideImages::where('page_id', $request->page_id)->where('is_sub_banner', null)->count();
      if ($count == $request->length) {
        return ["success" => "finish"];
      } else {
        return ["success" => "successed"];
      }     
    }    
  }

  public static function getPageSlideImages(Request $request) {    
    $slides = PageSlideImages::where('page_id', $request->id)->where('is_sub_banner', null)->get();
    $count = PageSlideImages::where('page_id', $request->id)->where('is_sub_banner', null)->count();
    return ['images' => $slides, 'count' => $count];
  }

  public static function PageSlideImageDelete(Request $request) {    
    PageSlideImages::where('id', $request->id)->delete();    
    return ['success' => "successed"];
  }

  public static function subImagePage(Request $request) {
    if ($request->file('file')->isValid()){
			$url = url("/assets/uploads/pages") ."/" . $request->file->store('', 'pages');
			$arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $original_path = PageSlideImages::where('is_sub_banner', 'true')->where('page_id', $request->id)->first();
      if (isset($original_path)) {
        $original_path->path = $path;
        $original_path->save();
      } else {
        $data = [
          'page_id' => $request->id,
          'path' => $path,
          'is_sub_banner' => "true"
        ];
        PageSlideImages::create($data);
      }      
      return ["success" => "success"];
		} else {
      return ["error" => "No image attached"];
		}
  }

  public static function handlingDocument(Request $request) {
    if ($request->file('file')->isValid()){      			
      $file = $request->file('file');
      $url = url("/assets/uploads/documents") ."/" . $request->file->store('', 'documents');
			$arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      return ['path' => $path];
    } else {
      return ["error" => "No doc file attached"];
    }
  }

  public static function MemberAvatar(Request $request) {    
    if(!isset($_FILES['file_upload'])) {
      return ["error" => "No doc file attached"];
    }
    $uploads_dir = "./assets/uploads/users/";
    $target_file = $uploads_dir .$_FILES['file_upload']['name'];
    move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file);

    $url = url("/assets/uploads/users") ."/" . $_FILES['file_upload']['name'];
    $arr = explode("/", $url);
    $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
    
    return $path;
  }

  public static function invoiceRequest(Request $request) {
    $request_data = $request->all();
    Mail::to("contact@accessoslo.no")->send(new InvoiceRequestMail($request_data));
    Mail::to("admin@fantasylab.io")->send(new InvoiceRequestMail($request_data));
  }

  public static function AddNewMember(Request $request) {
    $member = Member::create($request->all());
    return $member;
  }

  public static function GetMembers() {
    $members = Member::get();
    return $members;
  }

  public static function UpdateMember(Request $request) {
    $member = Member::where('id', $request->id)->first();
    $member->name = $request->name;
    $member->email = $request->email;
    $member->description = $request->description;
    $member->position = $request->position;
    $member->avatar = $request->avatar;
    $member->save();
    $members = Member::get();
    return $members;
  }

  public static function DeleteMember(Request $request) {
    Member::where('id', $request->id)->delete();
    $members = Member::get();
    return $members;
  }

  public static function DeleteAvatar(Request $request) {
    $member = Member::where('id', $request->id)->first();
    \File::delete($request->avatar);
    $member->avatar = null;
    $member->save();
    $members = Member::get();
    return $members;
  }
}