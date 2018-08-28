@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-8">
                  <div class="slider">
                      <img src="/assets/img/bg/fbo-services.jpg" class="img-responsive" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                      @if ($data->status == "published")
                      {!!$data->page_title!!}
                      @else
                      <h1><span>FBO</span> Services </h1>
                      <span class="share">
                          <i class="fa fa-share-alt" aria-hidden="true"></i>
                      </span>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="wrapper-content">
      <div class="container">
          <div class="services-group">
              <div class="title">
                  <h2>Passengers</h2>
              </div>
              <div class="clearfix"></div>
              <div class="row grid">
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-1.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>VIP transport</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-2.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>VIP Lounge</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-3.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Direct Boarding</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-3.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Board to board</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-4.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Border control</h3>                             
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/services-5.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Vip Catering</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-6.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Aircraft Charter</h3>                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="services-group">
              <div class="title">
                  <h2>Crew</h2>
              </div>
              <div class="clearfix"></div>
              <div class="row grid">
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-1.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Crew transport</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-8.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>slot coordintaion</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-3.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Border Control</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-9.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Crew lounge</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-10.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Accomodation</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-11.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>BRIEFING ROOM</h3>                              
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/service-12.jpg" class="center-block img-responsive" alt="">
                          </figure>
                          <div class="box-top text-center">
                              <h3>Earn crew points with access loyalty program</h3>                              
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection