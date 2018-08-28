@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <img src="/assets/img/bg/dashboard.jpg" alt="" class="img-responsive">
      <div class="container wrapper-items">
          <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-3">
              <h1>Greetings, {{auth()->user()->first_name}}!</h1>
              <div class="row">
                  <div class="col-xs-12 col-sm-4">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3 id="upcoming_notice"></h3>
                                  <h2>UPCOMING REQUESTS</h2>
                                  <a href="/member/upcoming-request" class="btn btn-border-gold">View request</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3>{{auth()->user()->bonus}}</h3>
                                  <h2>AVAILABLE BONUS POINTS</h2>
                                  <a href="/member/profile-settings" class="btn btn-border-gold">Redeem Points</a>
                              </div>
                          </div>
                      </div>
                  </div>                  
              </div>
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-6 box-left">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-7 info-box">
                              <h2><span>Access</span> <br> rewards</h2>
                              <p>Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum.</p>
                              <a href="" class="btn btn-border-gold">Learn more</a>
                          </div>
                          <div class="col-xs-12 col-sm-5">
                              <figure>
                                  <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6 box-right">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-5">
                              <figure>
                                  <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                          <div class="col-xs-12 col-sm-7 info-box">
                              <h2><span>Booking</span> <br> Request</h2>
                              <p>Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum.</p>
                              <a href="" class="btn btn-border-gold">View Request</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 box-left">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-6 info-box">
                              <h2><span>Empty leg</span> <br> Flights</h2>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              Lorem Ipsum has been the industry's standard dummy. </p>
                              <a href="" class="btn btn-border-gold">View flights</a>
                          </div>
                          <div class="col-xs-12 col-sm-6 none-padding-left">
                              <figure>
                                  <img src="http://via.placeholder.com/830x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-6 box-left">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-7 info-box">
                              <h2><span>OVERVIEW OF</span> <br> YOUR INVOICES</h2>
                              <p>Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum.</p>
                              <a href="" class="btn btn-border-gold">VIEW FLIGHTS</a>
                          </div>
                          <div class="col-xs-12 col-sm-5">
                              <figure>
                                  <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6 box-right">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-5">
                              <figure>
                                  <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                          <div class="col-xs-12 col-sm-7 info-box">
                              <h2><span>YOUR FEEDBACK</span> <br> MEANS A LOT</h2>
                              <p>Lorem Ipsum is simply dummy text of the
                              printing and typesetting industry. Lorem Ipsum.</p>
                              <a href="" class="btn btn-border-gold">Send a feedback</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-xs-12 box-left">
                  <div class="item">
                      <div class="row">
                          <div class="col-xs-12 col-sm-6 info-box">
                              <h2><span>ADMINISTER</span> <br> YOUR ACCOUNT</h2>
                              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                              Lorem Ipsum has been the industry's standard dummy. </p>
                              <a href="" class="btn btn-border-gold">My profile</a>
                          </div>
                          <div class="col-xs-12 col-sm-6 none-padding-left">
                              <figure>
                                  <img src="http://via.placeholder.com/830x380" class="img-responsive" alt="">
                              </figure>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberDashboard();});</script>
@endsection