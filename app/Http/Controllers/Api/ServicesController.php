<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Core\AirportServices;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ServicesController extends ApiController {

  public function limousineBooking(Request $request) {
    return $this->json(
      AirportServices::limousineBooking($request)
    );
  }

  public function deleteLimousine(Request $request) {
    return $this->json(
      AirportServices::deleteLimousine($request)
    );
  }

  public function meetBooking(Request $request) {
    return $this->json(
      AirportServices::meetBooking($request)
    );
  }

  public function getAllMeets() {
    return $this->json(
      AirportServices::getAllMeets()
    );
  }

  public function getLimousines() {
    return $this->json(
      AirportServices::getAllLimousines()
    );
  }

  public function handlingRequest(Request $request) {
    return $this->json(
      AirportServices::handlingRequest($request)
    );
  }

  public function deleteHandling(Request $request) {
    return $this->json(
      AirportServices::deleteHandling($request)
    );
  }

  public function deleteMeet(Request $request) {
    return $this->json(
      AirportServices::deleteMeet($request)
    );
  }

  public function getHandlingRequests() {
    return $this->json(
      AirportServices::getHandlingRequests()
    );
  }

  public function getAllPassengers() {
    return $this->json(
      AirportServices::getAllPassengers()
    );
  }

  public function passengerTax(Request $request) {
    return $this->json(
      AirportServices::passengerTax($request)
    );
  }  

  public function bookingTravels(Request $request) {
    return $this->json(
      AirportServices::bookingTravels($request)
    );
  }  

  public function getAllTravels($type) {
    return $this->json(
      AirportServices::getAllTravels($type)
    );
  }  

  public function addBannerImage (Request $request) {
    return $this->json(
      AirportServices::addBannerImage($request)
    );
  }  

  public function addPageImage (Request $request) {
    return $this->json(
      AirportServices::addPageImage($request)
    );
  } 

  public function addPostImage (Request $request) {
    return $this->json(
      AirportServices::addPostImage($request)
    );
  } 
  
  public function savePosts (Request $request) {
    return $this->json(
      AirportServices::savePosts($request)
    );
  }

  public function updatePosts (Request $request) {
    return $this->json(
      AirportServices::updatePosts($request)
    );
  }

  public function publishPosts (Request $request) {
    return $this->json(
      AirportServices::publishPosts($request)
    );
  }

  public function deletePosts (Request $request) {
    return $this->json(
      AirportServices::deletePosts($request)
    );
  }

  public function createPage (Request $request) {
    return $this->json(
      AirportServices::createPage($request)
    );
  }  

  public function savePage (Request $request) {
    return $this->json(
      AirportServices::savePage($request)
    );
  }  

  public function deletePage (Request $request) {
    return $this->json(
      AirportServices::deletePage($request)
    );
  }  

  public function publishPage (Request $request) {
    return $this->json(
      AirportServices::publishPage($request)
    );
  }  

  public function securityQuestions (Request $request) {
    return $this->json(
      AirportServices::securityQuestions($request)
    );
  }
  
  public function createAircraft (Request $request) {
    return $this->json(
      AirportServices::createAircraft($request)
    );
  }

  public function updateAircraft (Request $request) {
    return $this->json(
      AirportServices::updateAircraft($request)
    );
  }

  public function AircraftImageUpload (Request $request) {
    return $this->json(
      AirportServices::AircraftImageUpload($request)
    );
  }

  public function getAircraftImage (Request $request) {
    return $this->json(
      AirportServices::getAircraftImage($request)
    );
  }

  public function deleteAircraftImage (Request $request) {
    return $this->json(
      AirportServices::deleteAircraftImage($request)
    );
  }

  public function saveExtraBonus(Request $request) {
    return $this->json(
      AirportServices::saveExtraBonus($request)
    );
  }
}

