<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Services\Core\Users;

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

  public function find (Request $request) {
    return $this->json(
      Users::find($request)
    );
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

  public function start_signup (Request $request) {    
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect('/member/profile-settings'); 
    }    
  }
}

