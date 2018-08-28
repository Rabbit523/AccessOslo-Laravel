@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                      @if ($data->status == "published")
                      {!! $data->page_title !!}
                      {!! $data->page_content !!}
                      @else
                      <h1>Event & Group travel</h1>
                      <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</p>
                      <span class="share"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                      @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="slider">
                      <img src="/assets/img/slider.jpg" class="img-responsive" alt="">
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
                      {!! $data->extra_content !!}
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
<script src="/ng/directives/event-travel/event-travel.js"></script>
@endsection