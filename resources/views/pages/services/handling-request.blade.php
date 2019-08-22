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
                    <h2> HANDLING REQUEST </h2>
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
                      <h3>OPERATIONS CONTACT</h3>
                      <p><strong>Access Oslo AS</strong></p>
                      <p><strong>Headquarters: </strong> <br>
                          Hans Gaarders Veg, 2060 <br>
                          Gardermoen, Norway </p>
                      <p><strong> Post Address: </strong> <br>
                      PO Box 34  <br>
                      Snarøya, Norway  <br></p>

                      <p>
                          <strong>Phone: </strong> <br>
                          H24 +47 91 222 999
                      </p>

                      <p>
                          <strong>General Inquiries: </strong> <br>
                          contact@accessoslo.com
                      </p>

                      <p><strong>Operations:</strong> <br>
                      ops@accessoslo.com</p>
                      @endif
                  </div>
                  <div class="aux-img">
                      <img src="/assets/img/aux-img.jpg" class="img-responsive center-block" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-right aircraft_type" data-aircrafts="{{$aircrafts}}">
                    <accessoslo-handlingrequest></accessoslo-handlingrequest>
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
<script src="/ng/directives/handling-request/handling-request.js"></script>
@endsection
