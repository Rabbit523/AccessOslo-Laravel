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

use App\Mail\UserRegister;
use Twilio\Rest\Client;
use Session;

class Users
{
  private static $twililo_sid = "";
  private static $bcc = ["nohman@fantasylab.no"];

  public static function authenticate($email, $password) {
      $data = ["error" => "Wrong Crendetials"];
      if (Auth::attempt(['email' => $email, 'password' => $password])) {
          $data = ["user" => Auth::user(), "redirect" => route("dashboard")]; 
      }
      return $data;        
  }

  public static function register(Request $request) {
     $userData = [
        'gender' => $request->input('gender'),
        'first_name' => $request->input('first_name'),
        'last_name' => $request->input('last_name'),
        'country' => $request->input('country'),
        'city' => $request->input('city'),
        'email' => $request->input('email'),
        'phone' => $request->input('phone'),    
        'password' => bcrypt($request->input('password')),
        'profile_complete' => "false",
        'bonus' => '0',
        'role_id' => '2'    
    ];
    return User::create($userData);
  }

  public static function requestSms(Request $request) {
    $from = "+4759446972";
    $sid    = "ACfc3efe382ed96fb025b7689c4bf54241";
    $token  = "a34af2c4c2de7a8fb71f1e4c739b29d0";
    $twilio = new Client($sid, $token);
    $code = rand(100000,999999);
    
    $message = $twilio->messages->create(
      $request->phone,
      array("from" => $from, "body" => "Your verification number is ". $code ."From AccessOslo")
    );
    return $code;
  }

  public static function verifyCode(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    $user->verification_code = $request->input('code');
    $user->save();
    return $user;
  }

  public static function contactMail(Request $request) {
    return $request->all();
  }

  public static function changePassword(Request $request) {
    $response['error'] = "The old password does not matched!";
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
      'password' => bcrypt($password),
      'profile_complete' => 'false',
      'role_id' => '2'        
    ];
    
    $user = User::create($userData);
    Mail::to($user->email)
    ->send(new UserRegister($password, $user->first_name, $user->last_name));
    
    Auth::login($user, true);
    return $user; 
  }

  public static function createPartner(Request $request) {
    $userData = [
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),      
      'phone' => $request->input('phone'),  
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
      'role_id' => '1'        
    ];
    $user = User::create($userData);
    $partnerData = [
      'user_id' => $user->id,
      'partner_name' => $request->input('partner_name'),
      'contact_person' => $request->input('contact_person'),
      'phone' => $request->input('phone'),  
      'email' => $request->input('email'),
      'post_box' => $request->input('post_box'),  
      'site_url' => $request->input('site_url'),
      'last_audit' => $request->input('last_audit'),
      'coverage' => $request->input('coverage'),
      'average_flight' => $request->input('average_flight'),
      'operate_since' => $request->input('operate_since'),
      'valid' => $request->input('valid'),
      'permission' => $request->input('permission'),
    ];
    return Partners::create($partnerData); 
  }

  public static function find(Request $request) {
    $user = User::where('email', $request->input('email'))->first();
    if($user) {
     return "success";
    } else {
      return "error";
    }
  }

  public static function saveProfile(Request $request) {
    $user = User::where('id', $request->input('id'))->first();
    $user->first_name = $request->input('first_name');
    $user->last_name = $request->input('last_name');
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

  public static function addProfile(Request $request) {
    $user =  User::where('email', $request->input("email"))->first();
    $user->country = $request->input('addInfo_country');
    $user->city = $request->input('addInfo_city');
    $user->profile_complete = "true";
    $user->bonus = 56;
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
    $profile->user_id = $request->input('user_id');
    $profile->gender = $request->input('gender');
    $profile->first_name = $request->input('first_name');
    $profile->last_name = $request->input('last_name');
    $profile->email = $request->input('email');
    $profile->date_birth = $request->input('date_birth');
    $profile->company = $request->input('company');
    $profile->job = $request->input('job');
    $profile->home_phone = $request->input('home_phone');
    $profile->mobile_phone = $request->input('mobile_phone');
    $profile->business_phone = $request->input('business_phone');
    $profile->mobile_type = $request->input('mobile_type');
    $profile->addInfo_address1 = $request->input('addInfo_address1');
    $profile->addInfo_address2 = $request->input('addInfo_address2');
    $profile->addInfo_city = $request->input('addInfo_city');
    $profile->addInfo_region = $request->input('addInfo_region');
    $profile->addInfo_country = $request->input('addInfo_code');
    $profile->addInfo_country = $request->input('addInfo_country');
    $profile->billInfo_address1 = $request->input('billInfo_address1');
    $profile->billInfo_address2 = $request->input('billInfo_address2');
    $profile->billInfo_city = $request->input('billInfo_city');
    $profile->billInfo_region = $request->input('billInfo_region');
    $profile->billInfo_code = $request->input('billInfo_code');
    $profile->billInfo_country = $request->input('billInfo_country');
    $profile->save();
    return $profile;
  }

  public static function savePassenger(Request $request) {
    return Passengers::create($request->all());
  }

  public static function getPassengers(Request $request) {
    return Passengers::where('user_id', $request->input('id'))->get();
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