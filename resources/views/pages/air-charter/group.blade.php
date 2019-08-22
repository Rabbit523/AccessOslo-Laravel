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
            @if ($lang == "nb")
                {!! $data->nb_page_title !!}
                @else
                {!! $data->en_page_title !!}
                @endif
            @else
            <h2> GROUP CHARTER </h2>
          @endif
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row wrapper-box">
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-left">
                  @if($data->status == "published")
                    @if ($lang == "nb")
                    {!! $data->nb_page_content !!}
                    @else
                    {!! $data->en_page_content !!}
                    @endif
                  @else
                      <h3>WHY CHARTER AN AIRCRAFT?</h3>
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
                      <accessoslo-groupcharter></accessoslo-groupcharter>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
@include('sweet::alert')
<script src="/ng/directives/group-charter/group-charter.js"></script>
@endsection
