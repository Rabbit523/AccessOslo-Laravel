<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->group(function () {
    Route::get('/', 'Api\ApiController@index')->name("accessoslo-api");
    Route::post('users/create', 'Api\UsersController@create');    
    Route::post('users/find', 'Api\UsersController@find');
    Route::post('users/save-profile', 'Api\UsersController@saveProfile');
    Route::post('users/change-password', 'Api\UsersController@changePassword');
    Route::post('users/get-passengers', 'Api\UsersController@getPassengers');
    Route::post('users/delete-passenger', 'Api\UsersController@deletePassenger');
    Route::post('users/get-profile-image', 'Api\UsersController@addProfileImage');
    Route::post('users/get-customer', 'Api\UsersController@getCustomer');
    Route::post('users/add-profile', 'Api\UsersController@addProfile');
    Route::post('users/update-profile', 'Api\UsersController@updateProfile');    
    Route::post('services/passenger-tax', 'Api\ServicesController@passengerTax');
    Route::post('services/booking-travels', 'Api\ServicesController@bookingTravels');
    Route::post('services/limousine-booking', 'Api\ServicesController@limousineBooking');
    Route::post('services/handling-request', 'Api\ServicesController@handlingRequest');
    Route::get('services/get-allMeets', 'Api\ServicesController@getAllMeets');
    Route::get('services/get-limousines', 'Api\ServicesController@getLimousines');
    Route::get('services/get-handling-request', 'Api\ServicesController@getHandlingRequests');
    Route::get('services/get-all-passengers', 'Api\ServicesController@getAllPassengers');
    Route::get('services/get-allTravels/{type?}', 'Api\ServicesController@getAllTravels');
    Route::post('charters/create', 'Api\ChartersController@create');
    Route::post('charters/cargo-booking', 'Api\ChartersController@cargo_booking');
    Route::post('charters/searchdashboard', 'Api\ChartersController@searchDashboard');
    Route::get('charters/get-admindashboard', 'Api\ChartersController@getAdminDashboard');  
    Route::post('charters/get-notice', 'Api\ChartersController@getNotice');
    Route::post('stores/get-banner-image', 'Api\ServicesController@addBannerImage');
    Route::post('stores/get-page-image', 'Api\ServicesController@addPageImage');
    Route::post('stores/get-post-image', 'Api\ServicesController@addPostImage');
    Route::post('stores/save-post', 'Api\ServicesController@savePosts');
    Route::post('stores/update-post', 'Api\ServicesController@updatePosts');
    Route::post('stores/publish-post', 'Api\ServicesController@publishPosts');
    Route::post('stores/create-page', 'Api\ServicesController@createPage');
    Route::post('stores/save-page', 'Api\ServicesController@savePage');
    Route::post('stores/publish-page', 'Api\ServicesController@publishPage');
});