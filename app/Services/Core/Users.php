<?php

namespace App\Services\Core;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

use App\Models\Core\User;
use App\Models\Core\Partners;
use App\Models\Core\Profile;
use App\Models\Core\Passengers;
use App\Models\Core\PageSettings;
use App\Models\Core\PostPages;
use App\Mail\UserRegister;
use App\Mail\ResetPassword;
use App\Mail\WelcomeUser;
use App\Mail\ContactUs;
use App\Mail\NewsletterMail;

use Twilio\Rest\Client;
use Newsletter;
use Alert;
class Users
{
  public static function authenticate($email, $password) {
    $data = ["error" => "Wrong Crendetials"];
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
      $data = ["user" => Auth::user(), "redirect" => route("dashboard")]; 
    }
    return $data;
  }

  public static function register(Request $request) {
    $count = User::where('email', $request->email)->count();
    if ($count > 0 ) {
      return ["result"=>"User Email is already existed!"];
    } else {
      $ccount = User::where('phone', $request->phone)->count();
      if ($ccount > 0) {
        return ["result" => "phone number is already existed!"];
      } else {
        return ["result"=>"success", "phone"=> $request->phone, "email"=> $request->email];
      }
    }
  }

  public static function requestSms(Request $request) {
    $from = "+4759446972";
    $sid    = "ACfc3efe382ed96fb025b7689c4bf54241";
    $token  = "a34af2c4c2de7a8fb71f1e4c739b29d0";
    $twilio = new Client($sid, $token);
    $code = rand(100000,999999);
    
    $count = User::where('phone', $request->phone)->count();
    if ($count > 1) { 
      return ['type'=>"phone number has already used once!"];
    } else {
      $twilio->messages->create(
        $request->phone,
        array("from" => $from, "body" => "Your verification code is: ". $code ."Flying Regards, Access Oslo.")
      );
      return ['type'=>"success", 'data' => $code];
    }
  }

  public static function verifyCode(Request $request) {    
    $userData = [
      'gender' => $request->input('gender'),
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),
      'country' => $request->input('country'),
      'city' => $request->input('city'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'password' => bcrypt($request->input('password')),
      'verification_code' => $request->input('code'),
      'profile_complete' => "false",
      'bonus' => '0',
      'role_id' => '2'
    ];
    $user = User::create($userData);
    Mail::to($user->email)
    ->send(new WelcomeUser($user->first_name));
    return $user;
  }

  public static function contactMail(Request $request) {    
    Mail::to("admin@fantasylab.io")
    ->send(new ContactUs(
      $request->input('first_name'), 
      $request->input('last_name'), 
      $request->input('email'), 
      $request->input('phone'), 
      $request->input('message'), 
      $request->input('type')));
    Mail::to("contact@accessoslo.no")
    ->send(new ContactUs(
      $request->input('first_name'), 
      $request->input('last_name'), 
      $request->input('email'), 
      $request->input('phone'), 
      $request->input('message'), 
      $request->input('type')));
    return ['success' => 'success'];
  }

  public static function changePassword(Request $request) {
    $user = User::where('id', $request->input("user_id"))->first();
    if (Hash::check($request->input("old_password"), $user->password)) {       
        $user->password = bcrypt($request->input("new_password"));
        $user->save();
        return ['success' => 'success'];
    } else {   
      return ['success' => 'error'];   
    }
  }

  public static function create(Request $request) {
    $password = rand(10000000,99999999);
    $userData = [
      'gender' => $request->input('gender'),
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),
      'email' => $request->input('email'),
      'phone' => $request->input('phone'),
      'company' => $request->input('company'),
      'password' => bcrypt($password),
      'profile_complete' => 'false',
      'role_id' => '2'
    ];
    
    $user = User::create($userData);
    Mail::to($user->email)
    ->send(new UserRegister($password, $user->first_name, $user->email));
    
    Auth::login($user, true);
    return $user; 
  }

  public static function PartnerLogoUpload(Request $request) {
    if ($request->file('file')->isValid()){ 
      $url = url("/assets/uploads/users") ."/" . $request->file->store('', 'users');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];      
      return $path;
    } else {
        return ["error" => "No image attached"];
    }
  }

  public static function createPartner(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    if (isset($user)) {
      $partner = Partners::where('user_id', $user->id)->first();
      if (!isset($partner)) {
        $partnerData = [
          'user_id' => $user->id,
          'partner_name' => $request->input('partner_name'),
          'contact_person' => $request->input('contact_person'),
          'phone' => $request->input('phone'),  
          'email' => $request->input('email'),
          'last_audit' => $request->input('last_audit'),
          'coverage' => $request->input('coverage'),
          'average_flight' => $request->input('average_flight'),
          'operate_since' => $request->input('operate_since'),
          'additional_fee' => $request->input('additional_fee'),
          'valid' => $request->input('valid'),
          'permission' => $request->input('permission'),
          'type' => $request->input('type'),
          'description' => $request->input('description'),
          'main_img' => $request->input('main_img'),
          'sub_img' => $request->input('sub_img'),
          'norway_description' => $request->input('norway_description')
        ];
        return Partners::create($partnerData);
      } else {
        return ['success' => "successed", "error" => "Email is invalid. The partner is already existed."];
      }     
    } else {
      $userData = [
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),      
        'phone' => $request->input('phone'),  
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
        'role_id' => '1',
        'partner_permission' => $request->input('permission')
      ];
      $user = User::create($userData);
      $partnerData = [
        'user_id' => $user->id,
        'partner_name' => $request->input('partner_name'),
        'contact_person' => $request->input('contact_person'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'last_audit' => $request->input('last_audit'),
        'coverage' => $request->input('coverage'),
        'average_flight' => $request->input('average_flight'),
        'operate_since' => $request->input('operate_since'),
        'additional_fee' => $request->input('additional_fee'),
        'valid' => $request->input('valid'),
        'permission' => $request->input('permission'),
        'type' => $request->input('type'),
        'description' => $request->input('description'),
        'main_img' => $request->input('main_img'),
        'sub_img' => $request->input('sub_img'),
        'norway_description' => $request->input('norway_description')
      ];
      return Partners::create($partnerData);
    }    
  }

  public static function updatePartner(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    if ($user) {
      $user['password'] = bcrypt($request->input('password'));
      $user['partner_permission'] = $request->input('permission');
      $user['first_name'] = $request->input('first_name');
      $user['last_name'] = $request->input('last_name');      
      $user['phone'] = $request->input('phone');
      $user['email'] = $request->input('email');
      $user['role_id'] = '1';
      $user->save();
      $partner = Partners::where('user_id', $user->id)->first();
      if (isset($partner)) {
        $partner['user_id'] = $user->id;
        if (isset($request->partner_name)) { $partner['partner_name'] = $request->input('partner_name'); }
        if (isset($request->phone)) { $partner['phone'] = $request->input('phone'); }
        if (isset($request->email)) { $partner['email'] = $request->input('email'); }
        if (isset($request->last_audit)) { $partner['last_audit'] = $request->input('last_audit'); }
        if (isset($request->coverage)) { $partner['coverage'] = $request->input('coverage'); }
        if (isset($request->average_flight)) { $partner['average_flight'] = $request->input('average_flight'); }
        if (isset($request->operate_since)) { $partner['operate_since'] = $request->input('operate_since'); }
        if (isset($request->additional_fee)) { $partner['additional_fee'] = $request->input('additional_fee'); }
        if (isset($request->valid)) { $partner['valid'] = $request->input('valid'); }
        if (isset($request->permission)) { $partner['permission'] = $request->input('permission'); }
        if (isset($request->type)) { $partner['type'] = $request->input('type'); }
        if (isset($request->description)) { $partner['description'] = $request->input('description'); }
        if (isset($request->main_img)) { $partner['main_img'] = $request->input('main_img'); }
        if (isset($request->sub_img)) { $partner['sub_img'] = $request->input('sub_img'); }
        if (isset($request->norway_description)) { $partner['norway_description'] = $request->input('norway_description'); }
        $partner->save();
        return $partner;
      } else {
        return ['success' => "successed", "error" => "This user isn't partner!"];
      }
    } else {
      return ['success' => "successed", "error" => "email is not existed!"];
    }
  }

  public static function deletePartner(Request $request) {
    $partner = Partners::where('id', $request->id)->first();
    User::where('id', $partner['user_id'])->delete();
    Partners::where('id', $request->id)->delete();
    return "true";
  }

  public static function getPartner(Request $request) {
    return Partners::get();
  }

  public static function find(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    if($user) {
      Alert::success('Success', 'Please check your email. If your user exist you will receive a reset password link.')->autoclose(2000);
      return "success";
    } else {
      Alert::error('Sorry', 'This email address does not exist!')->autoclose(2000);
      return "error";
    }
  }
  
  public static function resetPassword(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    
    Mail::to($user->email)
    ->send(new ResetPassword($user->remember_token, $user->first_name));
    Alert::success('Success','Please check your email. If your user exist you will receive a reset password link.')->autoclose(5000);
    return "success";
  }

  public static function saveProfile(Request $request) {
    $user = User::where('id', $request->input('id'))->first();
    $previous_name = $user->first_name." ".$user->last_name;
    if (isset($request->first_name)) {
      $user->first_name = $request->input('first_name');
      if (isset($request->last_name)) {
        $user->last_name = $request->input('last_name');
        $pages = PageSettings::where('author', $previous_name)->get();
        foreach($pages as $page) {
          $page->author = $request->first_name." ".$request->last_name;
          $page->save();
        }
        $posts = PostPages::where('author', $previous_name)->get();
        foreach($posts as $post) {
          $post->author = $request->first_name." ".$request->last_name;
          $post->save();
        }
      }  
    }
    $user->phone = $request->input('phone');
    $user->email = $request->input('email');
    $user->save();
    return $user;
  }

  public static function getCustomerProfile(Request $request) {
    $user = User::where('id', $request->input('id'))->first();
    if ($user['profile_complete'] == "true") {
      return "true";
    } else {
      return "false";
    }
  }

  public static function getCustomer(Request $request) {
    $user = Profile::where('user_id', $request->input("id"))->first();
    return $user;
  }
  
  public static function deleteCustomer(Request $request) {
    $user = User::where('id', $request->input("id"))->delete();
    return "success";
  }

  public static function addProfile(Request $request) {
    $user =  User::where('email', $request->input("email"))->first();
    $user->gender = $request->input('gender');
    $user->profile_complete = "true";
    $user->save();
    return Profile::create($request->all());
  }

  public static function giveBonus(Request $request) {
    $user =  User::where('email', $request->input("email"))->first();
    $user->bonus = $user->bonus + $request->input('bonus');
    $user->save();
    return $user;
  }

  public static function checkBonus(Request $request) {
    $user =  User::where('email', $request->input("email"))->first();
    $data = ["id"=> $request->input('id'), "bonus"=> $user->bonus];
    return $data;
  }

  public static function updateProfile(Request $request) {
    $profile = Profile::where('user_id', $request->input('user_id'))->first();
    $user =  User::where('email', $request->input("email"))->first();
    $user->gender = $request->input('gender');
    $user->save();
    if (isset($request->gender)) {
      $profile->gender = $request->input('gender');
    }
    if (isset($request->first_name)) {
      $profile->first_name = $request->input('first_name');
    }
    if (isset($request->last_name)) {
      $profile->last_name = $request->input('last_name');
    }
    if (isset($request->email)) {
      $profile->email = $request->input('email');
    }
    if (isset($request->date_birth)) {
      $profile->date_birth = $request->input('date_birth');
    }
    if (isset($request->company)) {
      $profile->company = $request->input('company');
    }
    if (isset($request->home_phone)) {
      $profile->home_phone = $request->input('home_phone');
    }
    if (isset($request->addInfo_address1)) {
      $profile->addInfo_address1 = $request->input('addInfo_address1');
    }
    if (isset($request->addInfo_address2)) {
      $profile->addInfo_address2 = $request->input('addInfo_address2');
    }
    if (isset($request->addInfo_city)) {
      $profile->addInfo_city = $request->input('addInfo_city');
    }
    if (isset($request->addInfo_region)) {
      $profile->addInfo_region = $request->input('addInfo_region');
    }
    if (isset($request->addInfo_code)) {
      $profile->addInfo_code = $request->input('addInfo_code');
    }
    if (isset($request->addInfo_country)) {
      $profile->addInfo_country = $request->input('addInfo_country');
    }
    if (isset($request->billInfo_address1)) {
      $profile->billInfo_address1 = $request->input('billInfo_address1');
    }
    if (isset($request->billInfo_address2)) {
      $profile->billInfo_address2 = $request->input('billInfo_address2');
    }
    if (isset($request->billInfo_city)) {
      $profile->billInfo_city = $request->input('billInfo_city');
    }
    if (isset($request->billInfo_region)) {
      $profile->billInfo_region = $request->input('billInfo_region');
    }
    if (isset($request->billInfo_code)) {
      $profile->billInfo_code = $request->input('billInfo_code');
    }
    if (isset($request->billInfo_country)) {
      $profile->billInfo_country = $request->input('billInfo_country');
    }
    if (isset($request->billInfo_company)) {
      $profile->billInfo_company = $request->input('billInfo_company');
    }
    if (isset($request->sms_notification)) {
      $profile->sms_notification = $request->input('sms_notification');
    }
    $profile->save();
    if ($request->newsletter == true) {      
      if ( ! Newsletter::isSubscribed($request->email) ) {
          Newsletter::subscribe($request->email);
          $message = "You have successfully been registered to our newsletter. Stay tuned!";
          Mail::to($request->email)->send(new NewsletterMail($message));
      }
      $message = "This email is already registered to our newsletter.";
      Mail::to($request->email)->send(new NewsletterMail($message));
    }
    return $profile;
  }

  public static function savePassenger(Request $request) {
    $passenger = Passengers::where('user_id', $request->user_id)->where('passport_no', $request->passport_no)->first();
    if (isset($passenger)) {
      return ['type' => "error", 'data' => null];
    } else {
      $passenger = Passengers::create($request->all());
      return ['type' => "success", 'data' => $passenger];
    }   
  }

  public static function getPassengers(Request $request) {
    if (isset($request->id)) {
      return Passengers::where('user_id', $request->input('id'))->get();
    } else {
      $user = User::where('email', $request->email)->first();
      return Passengers::where('user_id', $user->id)->get();
    }
  }

  public static function deletePassenger(Request $request) {
    return Passengers::where('id', $request->input('id'))->delete();
  }

  public static function addProfileImage (Request $request) {
    if ($request->file('file')->isValid()){ 
      $url = url("/assets/uploads/users") ."/" . $request->file->store('', 'users');
      $arr = explode("/", $url);
      $path = "/".$arr[3]."/".$arr[4]."/".$arr[5]."/".$arr[6];
      $user =  User::where('id', $request->input('id'))->first();
      $user->img = $path;
      $user->save();
      return $url;
    } else {
        return ["error" => "No image attached"];
    }
  }
}