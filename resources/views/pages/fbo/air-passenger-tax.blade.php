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
                    <h2> AIR PASSENGER TAX </h2>
                @endif
            </div>
        </div>
    </section>
  <section class="content-box">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-left">
                    @if ($data->status == "published")
                        @if ($lang == "nb")
                        {!! $data->nb_page_content !!}
                        @else
                        {!! $data->en_page_content !!}
                        @endif
                    @else
                      <h3>Norwegian Air Passenger Tax</h3>
                      <p>From 1st of June 2016, the Norwegian government implemented a mandatory <span class="tax-bold">Air Passenger Tax</span> on all flights leaving Norwegian airports with passengers. </p>
                      <p>As there is only Norwegian companies that are able to report these taxes, all foreign companies are required to sign up with a Norwegian representative.</p>
                      <p>Access Oslo is registered as a representative by the Tax Administration Norway (Skatteetaten) and we would be happy to handle the tax reporting on your behalf.</p>
                      <p>The tax amount is NOK 80 per passenger for departures from Norwegian airports.</p>
                      <p>For more information or to register for the Air Passenger Tax please contact us at <a href="mailto:accounting@accessoslo.no">accounting@accessoslo.no</a> or fill out the form on the right side.</p>
                      <p>To read the information provided from Tax Administration Norway in detail, please click on the buttons below to be redirected;</p>
                    @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-right">
                    <accessoslo-airpassenger></accessoslo-airpassenger>
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
<script src="/ng/directives/air-passenger/air-passenger.js"></script>
@endsection
