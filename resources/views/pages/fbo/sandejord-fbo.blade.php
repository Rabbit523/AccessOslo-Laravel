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
    <img src="{{$data->banner_img}}" alt="" class="img-responsive">
    <div class="container wrapper-content">
        <div class="col-xs-12">
            @if($data->status == "published")
                @if($lang == "nb")
                {!! $data->nb_page_title !!}
                @else
                {!! $data->en_page_title !!}
                @endif
            @else
                <h2> SANDEJORD FBO </h2>
            @endif
        </div>
    </div>
  </section>
  <section class="wrapper-content">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-8 box-left box-content">
                  <div class="box">
                      @if ($data->status == "published")
                        @if ($lang == "nb")
                        {!! $data->nb_page_content !!}
                        @else
                        {!! $data->en_page_content !!}
                        @endif
                      @else
                      <h2>DRIVING DIRECTIONS FOR OSLO AIRPORT</h2>
                      <h3>Lorem ipsum dolor sit amet consectetur ipsum dolor remi. This is just a dummy tekst.</h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>

                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially </p>
                      @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                  <div class="box-right">
                      <div id="map"></div>
                  </div>
              </div>

              <div class="col-xs-12">
                  <div class="box" style="background: #fff; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15); padding: 30px; margin-bottom: 30px;">
                    <h2 style="color: #c29834; font-size: 26px;">Sandefjord Torp Airport TRF - ENTO</h2>
                    <h3 style="color: #48539b; font-size: 20px;">HRS of operation (LT)</h3>
                    <ul class="list-unstyled" style="font-family: Gotham-Book;">
                    <li>Airport: <span style="float:right;">06:15-23:00</span></li>
                    <li>Customs: <span style="float:right;">06:15-23:00</span></li>
                    <li>Immigration: <span style="float:right;">06:15-23:00</span></li>
                    <li>Fuelling: <span style="float:right;">06:15-23:00</span></li>
                    <li>Met office: <span style="float:right;">H24</span></li>
                    <li>FBO-Terminal: <span style="float:right;">H24</span></li>
                </ul>

                    <hr>

                    <h3 style="color: #48539b; font-size: 20px;">Airport Facilities</h3>
                    <ul class="list-unstyled" style="font-family: Gotham-Book;">
                      <li>Airport elevation: <span style="float:right;">131 ft</span></li>
                      <li>Fire &amp; Rescure: <span style="float:right;">CAT 7</span></li>
                      <li>Fuel type: <span style="float:right;">JET A1 / 100LL</span></li>
                      <li>De-ice: <span style="float:right;">Freq: 119,125 Mhz</span></li>
                      <li>Hangar: <span style="float:right;">Limited space / upon request</span></li>
                      <li>Met Office: <span style="float:right;">Tel: +47 64 81 90 00</span></li>
                      <li>RWY surfaces: <span style="float:right;">CONC + ASPH</span></li>
                      <li>RWY 18/36: <span style="float:right;">2809 x 45 meters</span></li>
                    </ul>

                    <hr>

                    <h3 style="color: #48539b; font-size: 20px;">Fuel</h3>
                    <p style="font-family: Gotham-Book;">WFS, Shell, AirBP and Fuel releases accepted. Fuel on invoice. Contact us for daily prices</p>

                    <hr>

                    <h3 style="color: #48539b; font-size: 20px;">Insurance</h3>
                    <p style="font-family: Gotham-Book;">Access Oslo Executive Handling has a very good aviation liability insurance covering 10 mill USD from Willis. On request we are able to set the amount to a specified coverage.</p>
                    <a style="color: #c29834; font-family: Gotham-Book;" href="/assets/pdf/insurance-proof.pdf" target="_blank">Click here to see the insurance proof</a>
                    <h3 style="color: #48539b; font-size: 20px;">Airport information Leaflet</h3>
                    <a style="color: #c29834; font-family: Gotham-Book;" href="/assets/pdf/ENTO-Airport-Information.pdf" target="_blank">Download our Airport Information Leaflet here</a>
                  </div>
              </div>

              <div class="col-xs-12 col-sm-6">
                <div class="box" style="background: #fff; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);margin-bottom: 30px;">
                  <div class="image-box lounges-boxes">
                      <img class="img-responsive" src="/assets/img/vip-lounge-torp.jpg" alt="">
                  </div>
                  <div class="white-box lounges" style="padding: 30px;">
                      <h3 style="font-size: 26px; color: #c29834;">VIP Lounge <br>Sandefjord Torp Airport</h3>
                      <p style="font-family: Gotham-Book; line-height: 24px;">State of the art VIP terminal in our own premises at Torp Airport. Quiet and new furniture. All facilities such as VIP area, VIP-lounge with TV, music and comfortable couches. Board room for up to 12 persons makes this a perfect place for business meetings.</p>
                  </div>
                </div>
              </div>

              <div class="col-xs-12 col-sm-6">
                <div class="box" style="background: #fff; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);margin-bottom: 30px;">
                  <div class="image-box lounges-boxes">
                      <img class="img-responsive" src="/assets/img/vip-lounge-torp.jpg" alt="">
                  </div>
                  <div class="white-box lounges" style="padding: 30px;">
                      <h3 style="font-size: 26px; color: #c29834;">VIP Lounge <br>Sandefjord Torp Airport</h3>
                      <p style="font-family: Gotham-Book; line-height: 24px;">State of the art VIP terminal in our own premises at Torp Airport. Quiet and new furniture. All facilities such as VIP area, VIP-lounge with TV, music and comfortable couches. Board room for up to 12 persons makes this a perfect place for business meetings.</p>
                  </div>
                </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script>
function initMap() {
    var uluru = {lat: 60.196170, lng: 11.071767};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(uluru.lat,uluru.lng)
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&callback=initMap"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Sandejord();});</script>
@endsection
