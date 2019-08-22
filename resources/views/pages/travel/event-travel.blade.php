<?php $lang = app()->getLocale();?>
@extends('layouts.public')
@if ($lang == "nb")
@section('title', $data->nb_meta_title)
@section('description', $data->nb_meta_description)
@else
@section('title', $data->en_meta_title)
@section('description', $data->en_meta_description)
@endif
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                      @if ($data->status == "published")
                            @if($lang == "nb")
                            {!! $data->nb_page_title !!}
                            @else
                            {!! $data->en_page_title !!}
                            @endif
                      @else
                      <h1>Event & Group travel</h1>
                      <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</p>
                      <span class="share"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                      @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="slider">
                      <img src="{{$data->banner_img}}" class="img-responsive" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-left">
                    @if ($data->status == "published")
                        @if($lang == "nb")
                        {!! $data->nb_page_content !!}
                        @else
                        {!! $data->en_page_content !!}
                        @endif
                    @else
                      <h3>WHY EVENT & GROUP TRAVEL?</h3>
                      <ul>
                          <li>Point-to-Point Travel</li>
                          <li>Fly when you want to fly</li>
                          <li>Land at airports closer to your destination</li>
                          <li>Save valuable time – Avoid lengthy check-in process</li>
                          <li>Privacy - Get the entire aircraft to yourselves – or share it with friends
                          and colleagues</li>
                          <li>Enjoy personal privacy – work or relaxation</li>
                      </ul>
                    @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-right">
                    <accessoslo-eventtravel></accessoslo-eventtravel>
                  </div>
                  <div class="aux-img" style="margin-top: 30px;">
                      <img src="/assets/img/dmc-banner-11.jpg" class="img-responsive center-block" alt="" style="margin-top: 30px; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);">
                  </div>
                  <div class="aux-img" style="margin-top: 30px;">
                      <img src="/assets/img/dmc-banner-33.jpg" class="img-responsive center-block" alt="" style="margin-top: 30px; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);">
                  </div>
                  <div class="aux-img" style="margin-top: 30px;">
                      <img src="/assets/img/dmc-banner-22.jpg" class="img-responsive center-block" alt="" style="margin-top: 30px; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);">
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
@include('sweet::alert')
<script src="/ng/directives/event-travel/event-travel.js"></script>
@endsection
