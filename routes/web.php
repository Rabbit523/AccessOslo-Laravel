<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('web')->group(function () {
  Route::middleware('checkLocale')->group(function () {
    Route::get('/', 'Frontend\PagesController@index')->name("home");
    Route::get('/terms', 'Frontend\PagesController@terms')->name("terms");
    Route::get('/emptyleg-search-result', 'Frontend\PagesController@emptyLegSearchResult')->name("empty-result");  
    Route::get('/executive-charter', 'Frontend\AirCharterController@executive')->name("executive");
    Route::get('/group-charter', 'Frontend\AirCharterController@group')->name("group-charter");
    Route::get('/cargo-charter', 'Frontend\AirCharterController@cargo')->name("cargo-charter");
    Route::get('/helicopter-charter', 'Frontend\AirCharterController@helicopter')->name("helicopter-charter");
    Route::get('/empty-leg-flights', 'Frontend\AirCharterController@emptylegFlights')->name('empty-leg-flight');
    Route::get('/meet-greet', 'Frontend\ServicesController@meetAndGreet')->name("meet-greet");
    Route::get('/airport-limo', 'Frontend\ServicesController@limousineTransport')->name("limousine-transport");
    Route::get('/handling-request', 'Frontend\ServicesController@handling')->name("handling-request");
    Route::get('/oslo-fbo', 'Frontend\FBOController@osloFbo')->name("oslo-fbo");
    Route::get('/sandefjord-fbo', 'Frontend\FBOController@sandejordFbo')->name("sandejord-fbo");
    Route::get('/flight-supervision', 'Frontend\FBOController@supervision')->name("supervision");
    Route::get('/vip-catering', 'Frontend\FBOController@vipCatering')->name("vip-catering");
    Route::get('/air-passenger-tax', 'Frontend\FBOController@airPassengerTax')->name("air-passenger-tax");
    Route::get('/destination-oslo', 'Frontend\TravelController@privateTravel')->name("destination-oslo");
    Route::get('/ground-transport', 'Frontend\TravelController@groundTransport')->name("ground-transport");
    Route::get('/destination-bergen', 'Frontend\TravelController@destinationBergen')->name("destination-bergen");
    Route::get('/tromso', 'Frontend\TravelController@destinationTromso')->name("tromso");
    Route::get('/travel/event-travel', 'Frontend\TravelController@eventTravel')->name("event-travel");
    Route::get('/meetings', 'Frontend\TravelController@eventMeeting')->name("event-meeting");
    Route::get('/incentives', 'Frontend\TravelController@eventIncentive')->name("event-incentive");
    Route::get('/conference', 'Frontend\TravelController@eventConference')->name("event-conference");
    Route::get('/events', 'Frontend\TravelController@eventEvent')->name("event-event");
    Route::get('/weddings', 'Frontend\TravelController@eventWedding')->name("event-wedding");
    Route::get('/login', 'Frontend\LoyaltyController@login')->name("login");  
    Route::get('/login-redirect', 'Frontend\LoyaltyController@loginRedirect')->name("login-redirect");
    Route::get('/signup', 'Frontend\LoyaltyController@signup')->name("signup");
    Route::get('/contact', 'Frontend\AboutController@contact')->name("contact-us");  
    Route::get('/partners', 'Frontend\AboutController@ourPartners')->name("our-partners");
    Route::get('/single-partner/{id}', 'Frontend\AboutController@singlePartner')->name("single-partner");
    Route::get('/why-accessoslo', 'Frontend\AboutController@whyUs')->name("why-us");  
    Route::get('/news', 'Frontend\AboutController@latestNews')->name("latest-news");
    Route::get('/news/{title}', 'Frontend\AboutController@latestNewsByTitle')->name("single-latest-news");

    Route::post('/users/authenticate', 'Api\UsersController@authenticate');
    Route::post('/users/register', 'Api\UsersController@register');
    Route::post('/users/request-sms', 'Api\UsersController@requestSms');
    Route::post('/users/verify-code', 'Api\UsersController@verifyCode');
    Route::post('/users/contact-mail', 'Api\UsersController@contactMail');
    Route::post('/users/password-change', 'Api\UsersController@changePassword');
    Route::post('/users/get-customer', 'Api\UsersController@getCustomer');
    Route::post('/users/delete-customer', 'Api\UsersController@deleteCustomer');
    Route::post('/users/new-partner', 'Api\UsersController@createPartner');
    Route::post('/users/edit-partner', 'Api\UsersController@updatePartner');
    Route::post('/users/partner_logo_img', 'Api\UsersController@partner_logo_img');
    Route::post('/users/delete-partner', 'Api\UsersController@deletePartner');
    Route::get('/users/get-partner', 'Api\UsersController@getPartner');
    Route::post('/users/start_signup', 'Frontend\LoyaltyController@start_signup');
    Route::post('users/get-customerprofile', 'Api\UsersController@getCustomerProfile');
    Route::post('users/create', 'Api\UsersController@create');
    Route::post('users/find', 'Api\UsersController@find');  
    Route::post('users/reset-password', 'Api\UsersController@resetPassword');
    Route::post('reset_pwd', 'Api\UsersController@reset_Password');
    Route::get('reset_password/{token}','Frontend\LoyaltyController@reset_password_page');
    Route::post('users/save-passenger', 'Api\UsersController@savePassenger');
    Route::post('users/give-bonus', 'Api\UsersController@giveBonus');
    Route::post('users/check-bonus', 'Api\UsersController@checkBonus');
    Route::post('/charters/delete-emptyleg', 'Api\ChartersController@deleteEmptyleg');
    Route::post('/charters/create-emptyleg', 'Api\ChartersController@createEmptyleg');
    Route::post('/charters/update-emptyleg', 'Api\ChartersController@updateEmptyleg');
    Route::post('/charters/booking-emptyleg', 'Api\ChartersController@bookingEmptyleg');
    Route::post('/charters/badge-status', 'Api\ChartersController@badgeStatus');
    Route::post('charters/get-notice', 'Api\ChartersController@getNotice');
    Route::post('/charters/set-notice', 'Api\ChartersController@setNotice');
    Route::post('/charters/get-empty-notice', 'Api\ChartersController@getEmptyNotice');
    Route::post('/charters/set-empty-notice', 'Api\ChartersController@setEmptyNotice');
    Route::post('/charters/badge-set', 'Api\ChartersController@badgeSet');
    Route::post('/charters/save-charters', 'Api\ChartersController@saveCharters');
    Route::post('/charters/send-charters', 'Api\ChartersController@sendCharters');
    Route::post('/charters/get-charters', 'Api\ChartersController@getCharters');
    Route::post('/charters/delete-charters', 'Api\ChartersController@deleteCharters');
    Route::post('/charters/save-review', 'Api\ChartersController@saveReview');
    Route::post('/charters/get-review', 'Api\ChartersController@getReview');
    Route::post('/charters/get-partner-review', 'Api\ChartersController@getPartnerReview');
    Route::post('/charters/update-review', 'Api\ChartersController@updateReview');
    Route::post('/charters/create', 'Api\ChartersController@create');
    Route::post('/charters/delete-estimation', 'Api\ChartersController@deleteEstimation');
    Route::post('/charters/send-addition-feedback', 'Api\ChartersController@SendAdditionFeedback');
    Route::post('/charters/get-addition-feedback', 'Api\ChartersController@GetAdditionFeedback');
    Route::post('/charters/send-addition-feedback-customer', 'Api\ChartersController@SendAdditionFeedbackToCustomer');
    Route::post('services/delete-limousine', 'Api\ServicesController@deleteLimousine');
    Route::post('services/delete-handling', 'Api\ServicesController@deleteHandling');
    Route::post('services/delete-meet', 'Api\ServicesController@deleteMeet');
    Route::post('services/limousine-booking', 'Api\ServicesController@limousineBooking');
    Route::post('services/meet-booking', 'Api\ServicesController@meetBooking');
    Route::post('services/extra-bonus', 'Api\ServicesController@saveExtraBonus');
    Route::post('stores/delete-page', 'Api\ServicesController@deletePage');
    Route::post('stores/security-question', 'Api\ServicesController@securityQuestions');
    Route::post('stores/create-aircraft', 'Api\ServicesController@createAircraft');
    Route::post('stores/update-aircraft', 'Api\ServicesController@updateAircraft');
    Route::post('stores/delete-aircraft', 'Api\ServicesController@deleteAircraft');
    Route::post('stores/delete-aircraft-image', 'Api\ServicesController@deleteAircraftImage');
    Route::post('stores/delete-post', 'Api\ServicesController@deletePosts');
    Route::post('stores/subImage-page', 'Api\ServicesController@subImagePage');
    Route::post('stores/handling-document', 'Api\ServicesController@handlingDocument');
    Route::post('stores/get-aircraft-image', 'Api\ServicesController@getAircraftImage');  
    Route::post('stores/save-member-avatar', 'Api\ServicesController@MemberAvatar');
    Route::post('services/paypal', 'PaymentController@payWithpaypal');
    Route::get ('status', 'PaymentController@getPaymentStatus');
    Route::post('newsletter', 'NewsletterController@store');
    Route::post("/site-lang", 'Frontend\PagesController@updateLang');

    Route::get('/member/dashboard', 'Frontend\MembersController@dashboard')->name("member-dashboard");
    Route::get('/member/make-request', 'Frontend\MembersController@makeRequest')->name("member-make-request");
    Route::get('/member/upcoming-request', 'Frontend\MembersController@upcomingRequest')->name("member-upcoming-request");
    Route::get('/member/upcoming-request-type', 'Frontend\MembersController@upcomingTypeRequest')->name("member-upcoming-request");  
    Route::get('/member/empty-leg', 'Frontend\MembersController@emptyLeg')->name("member-empty-leg");
    Route::get('/member-emptyleg-search', 'Frontend\MembersController@emptyLegSearch')->name("member-empty-leg-search");
    Route::get('/member/profile-settings', 'Frontend\MembersController@profileSettings')->name("member-profile-settings");
    Route::get('/member/passenger-settings', 'Frontend\MembersController@passengerSettings')->name("member-passenger-settings");
    Route::get('/member/manage-account', 'Frontend\MembersController@manageAccount')->name("member-manage-account");
    Route::get('/member/logout', 'Frontend\MembersController@logout')->name("member-logout");

    Route::get('/dashboard', 'Frontend\PagesController@dashboard')->name("dashboard");
    Route::get('/admin/executive-search-charter', 'Frontend\PagesController@executiveSearchCharter')->name("executive-charter");
    Route::get('/admin/executive-charter', 'Frontend\PagesController@executiveCharter')->name("executive-charter");
    Route::get('/admin/group-charter', 'Frontend\PagesController@groupCharter')->name("group-charter");
    Route::get('/admin/group-search-charter', 'Frontend\PagesController@groupSearchCharter')->name("group-charter");
    Route::get('/admin/helicopter-charter', 'Frontend\PagesController@helicopterCharter')->name("helicopter-charter");
    Route::get('/admin/helicopter-search-charter', 'Frontend\PagesController@helicopterSearchCharter')->name("helicopter-charter");
    Route::get('/admin/cargo-charter', 'Frontend\PagesController@cargoCharter')->name("cargo-charter");
    Route::get('/admin/cargo-search-charter', 'Frontend\PagesController@cargoSearchCharter')->name("cargo-charter");
    Route::get('/admin/meet-greet', 'Frontend\PagesController@meetGreet')->name("meet-greet");
    Route::get('/admin/meet-search-charter', 'Frontend\PagesController@meetSearchCharter')->name("cargo-charter");
    Route::get('/admin/airport-limousine', 'Frontend\PagesController@airportLimousine')->name("airport-limousine");
    Route::get('/admin/airport-search-limousine', 'Frontend\PagesController@airportSearchLimousine')->name("airport-limousine");
    Route::get('/admin/handling-requests', 'Frontend\PagesController@handlingRequests')->name("handling-requests");
    Route::get('/admin/handling-requests-search', 'Frontend\PagesController@handlingSearchRequests')->name("handling-requests");
    Route::get('/admin/air-passenger', 'Frontend\PagesController@airPassenger')->name("air-passenger");
    Route::get('/admin/air-search-passenger', 'Frontend\PagesController@airSearchPassenger')->name("air-passenger");
    Route::get('/admin/emptyleg', 'Frontend\PagesController@emptyLegBooking')->name("emptyleg-charter");
    Route::get('/admin/emptyleg-search-charter', 'Frontend\PagesController@emptylegSearchBooking')->name("emptyleg-charter");
    Route::get('/admin/empty-leg', 'Frontend\PagesController@emptyLeg')->name("empty-leg");
    Route::get('/admin/empty-leg-search', 'Frontend\PagesController@emptyLegSearch')->name("empty-leg");
    Route::get('/admin/customers', 'Frontend\PagesController@customers')->name("customers");
    Route::get('/admin/single-customer/{id?}', 'Frontend\PagesController@singleCustomer')->name("single-customer");
    Route::get('/admin/partners', 'Frontend\PagesController@partners')->name("partners");  
    Route::get('/admin/partners-search', 'Frontend\PagesController@partnersSearch')->name("partners-search");
    Route::get('/admin/pages', 'Frontend\PagesController@pages')->name("pages");
    Route::get('/admin/single-page/{id?}', 'Frontend\PagesController@singlePage')->name("single-page");
    Route::get('/admin/posts', 'Frontend\PagesController@posts')->name("posts");
    Route::get('/admin/single-post/{id?}', 'Frontend\PagesController@singlePost')->name("single-post");
    Route::get('/admin/aircrafts', 'Frontend\PagesController@aircrafts')->name("aircrafts");
    Route::post('admin/aircraft-image', 'Api\ServicesController@AircraftImageUpload');
    Route::get('/admin/aircrafts-search', 'Frontend\PagesController@aircraftsSearch')->name("aircrafts");
    Route::get('/admin/settings', 'Frontend\PagesController@settings')->name("settings");
    Route::get('/admin/logout', 'Frontend\PagesController@logout')->name("logout");
  });
});
