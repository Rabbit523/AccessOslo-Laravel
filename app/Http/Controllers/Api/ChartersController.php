<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\Core\AirCharters;

class ChartersController extends ApiController {

  public function create(Request $request) {
    return $this->json(
      AirCharters::create($request)
    );
  }

  public function createEmptyleg(Request $request) {
    return $this->json(
      AirCharters::createEmptyleg($request)
    );
  }

  public function updateEmptyleg(Request $request) {
    return $this->json(
      AirCharters::updateEmptyleg($request)
    );
  }

  public function bookingEmptyleg(Request $request) {
    return $this->json(
      AirCharters::bookingEmptyleg($request)
    );
  }

  public function cargo_booking(Request $request) {
    return $this->json(
      AirCharters::cargo_booking($request)
    );
  }

  public function getAdminDashboard() {
    return $this->json(
      AirCharters::getAdminDashboard()
    );
  }

  public function searchDashboard (Request $request) {
    return $this->json(
      AirCharters::searchDashboard($request)
    );
  }

  public function getAllBookings($type) {
    return $this->json(
      AirCharters::getAllBookings($type)
    );
  }

  public function deleteEmptyleg(Request $request) {
    return $this->json(
      AirCharters::deleteEmptyleg($request)
    );
  }

  public function getCargoBookings() {
    return $this->json(
      AirCharters::getCargoBookings()
    );
  }

  public function badgeStatus(Request $request) {
    return $this->json(
      AirCharters::badgeStatus($request)
    );
  }

  public function getNotice(Request $request) {
    return $this->json(
      AirCharters::getNotice($request)
    );
  }

  public function setNotice(Request $request) {
    return $this->json(
      AirCharters::setNotice($request)
    );
  }

  public function getEmptyNotice(Request $request) {
    return $this->json(
      AirCharters::getEmptyNotice($request)
    );
  }
  
  public function setEmptyNotice(Request $request) {
    return $this->json(
      AirCharters::setEmptyNotice($request)
    );
  }

  public function badgeSet(Request $request) {
    return $this->json(
      AirCharters::badgeSet($request)
    );
  }

  public function saveCharters(Request $request) {
    return $this->json(
      AirCharters::saveCharters($request)
    );
  }

  
  public function sendCharters(Request $request) {
    return $this->json(
      AirCharters::sendCharters($request)
    );
  }

  public function getCharters(Request $request) {
    return $this->json(
      AirCharters::getCharters($request)
    );
  }

  public function deleteCharters(Request $request) {
    return $this->json(
      AirCharters::deleteCharters($request)
    );
  }

  public function saveReview(Request $request) {
    return $this->json(
      AirCharters::saveReview($request)
    );
  }

  public function updateReview(Request $request) {
    return $this->json(
      AirCharters::updateReview($request)
    );
  }

  public function getReview(Request $request) {
    return $this->json(
      AirCharters::getReview($request)
    );
  }

  public function getPartnerReview(Request $request) {
    return $this->json(
      AirCharters::getPartnerReview($request)
    );
  }

  public function deleteEstimation(Request $request) {
    return $this->json(
      AirCharters::deleteEstimation($request)
    );
  }

  public function SendAdditionFeedback(Request $request) {
    return $this->json(
      AirCharters::SendAdditionFeedback($request)
    );
  }
  public function GetAdditionFeedback(Request $request) {
    return $this->json(
      AirCharters::GetAdditionFeedback($request)
    );
  }
  public function SendAdditionFeedbackToCustomer(Request $request) {
    return $this->json(
      AirCharters::SendAdditionFeedbackToCustomer($request)
    );
  }
}

