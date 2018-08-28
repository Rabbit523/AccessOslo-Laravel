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
                      <img src="/assets/img/bg/driving-directions.jpg" class="img-responsive" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                  @if ($data->status == "published")
                      {!!$data->page_title!!}
                  @else
                      <h1><span>Sandefjord</span> FBO (TRF/ENTO)</h1>
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
          <div class="row">
              <div class="col-xs-12 col-sm-8 box-left">
                  <div class="box">
                      @if ($data->status == "published")
                      {!! $data->page_content !!}
                      @else
                      <h2>DRIVING DIRECTIONS FOR OSLO AIRPORT</h2>
                      <h3>Lorem ipsum dolor sit amet consectetur ipsum dolor remi. This is just a dummy tekst.</h3>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br><br>

                      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially </p>
                      @endif
                      <a href="" class="btn btn-border-gold">How to get there</a>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-4">
                  <div class="box-right">
                      <img src="/assets/img/map-driving.jpg" class="img-responsive center-block" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection