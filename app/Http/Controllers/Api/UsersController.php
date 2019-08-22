<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Services\Core\Users;
use App\Models\Core\User;
use App\Mail\ResetPasswordSuccessMail;

class UsersController extends ApiController {

  public function authenticate (Request $request) {
    return $this->json(
        Users::authenticate($request->input("email"), $request->input("password"))
    );
  }

  public function register (Request $request) {
    return $this->json(
      Users::register($request)
    );
  }

  public function saveProfile (Request $request) {
    return $this->json(
      Users::saveProfile($request)
    );
  }

  public function requestSms (Request $request) {
    return $this->json(
      Users::requestSms($request)
    );
  }
  
  public function verifyCode (Request $request) {
    return $this->json(
      Users::verifyCode($request)
    );
  }

  public function changePassword (Request $request) {
    return $this->json(
      Users::changePassword($request)
    );
  }

  public function getCustomer (Request $request) {
    return $this->json(
      Users::getCustomer($request)
    );
  }

  public function deleteCustomer (Request $request) {
    return $this->json(
      Users::deleteCustomer($request)
    );
  }

  public function getCustomerProfile (Request $request) {
    return $this->json(
      Users::getCustomerProfile($request)
    );
  }

  public function giveBonus (Request $request) {
    return $this->json(
      Users::giveBonus($request)
    );
  }

  public function checkBonus (Request $request) {
    return $this->json(
      Users::checkBonus($request)
    );
  }

  public function addProfile (Request $request) {
    return $this->json(
      Users::addProfile($request)
    );
  }

  public function updateProfile (Request $request) {
    return $this->json(
      Users::updateProfile($request)
    );
  }

  public function contactMail (Request $request) {
    return $this->json(
      Users::contactMail($request)
    );
  }

  public function create (Request $request) {
    return $this->json(
      Users::create($request)
    );
  }

  public function createPartner (Request $request) {
    return $this->json(
      Users::createPartner($request)
    );
  }

  public function updatePartner (Request $request) {
    return $this->json(
      Users::updatePartner($request)
    );
  }

  public function partner_logo_img(Request $request) {
    return $this->json(
      Users::PartnerLogoUpload($request)
    );
  }

  public function deletePartner (Request $request) {    
    return $this->json(
      Users::deletePartner($request)
    );
  }

  public function getPartner (Request $request) {
    return $this->json(
      Users::getPartner($request)
    );
  }
  public function find (Request $request) {
    return $this->json(
      Users::find($request)
    );
  }

  public function resetPassword (Request $request) {
    return $this->json(
      Users::resetPassword($request)
    );
  }

  public function reset_Password (Request $request) {    
    if($request->password == $request->confirm_password){
      $user = User::where('remember_token',$request->token)->first();
      $count = User::where('remember_token',$request->token)->count();
      if($count > 0){        
        if (strlen($request->password) <= '8') {
          return redirect()->back()->with('error','Password must be over 8 characters.');
        } else if (!preg_match("#[0-9]+#",$request->password)) {
          return redirect()->back()->with('error','Password must contain 1 number.');
        } else if (!preg_match("#[A-Z]+#",$request->password)) {
          return redirect()->back()->with('error','Password must contain 1 capital letter.');
        } else if (!preg_match("#[a-z]+#",$request->password)) {
          return redirect()->back()->with('error','Password must contain 1 lowercase letter.');
        } else {
          $user->password = Hash::make($request->password);
          $user->save();
          Mail::to($user->email)->send(new ResetPasswordSuccessMail($user->first_name));
          return redirect('/login')->with('success','Your password has been updated.');
        }
      }
    }else{
      return redirect()->back()->with('error','The password did not match. Please try again.');
    }
  }

  public function getPartners (){
    return $this->json(Users::getPartners());
  }

  public function getCustomers (){
    return $this->json(Users::getCustomers());
  }

  public function savePassenger (Request $request) {
    return $this->json(
      Users::savePassenger($request)
    );
  }

  public function getPassengers (Request $request) {
    return $this->json(
      Users::getPassengers($request)
    );
  }

  public function deletePassenger (Request $request) {
    return $this->json(
      Users::deletePassenger($request)
    );
  }

  public function addProfileImage (Request $request) {
    return $this->json(
      Users::addProfileImage($request)
    );
  }
}

