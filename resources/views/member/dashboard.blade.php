@extends('layouts.member_public')
@section('title', $data->meta_title)
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container wrapper-items">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <h1>Greetings, {{auth()->user()->first_name}}!</h1>
              <div class="row">
                  <div class="col-xs-12 col-sm-3">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3 id="charter_count"></h3>
                                  <h2>UPCOMING<br>EXECUTIVE CHARTER</h2>
                                  <a href="/member/upcoming-request-type?charter=executive&status=all-status&show_mode=mode1" class="btn btn-border-gold">View</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3 id="empty_count"></h3>
                                  <h2>UPCOMING<br>EMPTY LEG FLIGHTS</h2>
                                  <a href="/member/upcoming-request-type?charter=emptyleg&status=all-status&show_mode=mode1" class="btn btn-border-gold">View</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3 id="transport_count"></h3>
                                  <h2>UPCOMING<br>TRANSPORT</h2>
                                  <a href="/member/upcoming-request-type?charter=limousine&status=all-status&show_mode=mode1" class="btn btn-border-gold">View</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-3">
                      <div class="box text-center">
                          <div class="wrapper">
                              <figure>
                                  <img src="/assets/img/login-portal/icon1.png" class="img-responsive center-block" alt="">
                              </figure>
                              <div>
                                  <h3 id="meet_count"></h3>
                                  <h2>UPCOMING<br>MEET & GREET</h2>
                                  <a href="/member/upcoming-request-type?charter=meet&status=all-status&show_mode=mode1" class="btn btn-border-gold">View</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- <div class="col-xs-12 col-sm-4">
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
                  </div> -->
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberDashboard();});</script>
@endsection
