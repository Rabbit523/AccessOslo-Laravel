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
                @if ($data->status == "published")
                    @if($lang == "nb")
                    {!! $data->nb_page_title !!}
                    @else
                    {!! $data->en_page_title !!}
                    @endif
                @else
                <h1>Limousine transport</h1>
                @endif
            </div>
        </div>
    </section>
    <section class="content-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-left box-description">
                        @if ($data->status == "published")
                            @if ($lang == "nb")
                            {!! $data->nb_page_content !!}
                            @else
                            {!! $data->en_page_content !!}
                            @endif
                        @else
                        <h3>We can pick you up</h3>
                        <h4>Wherever you are - we can pick you up in our BMW-7 series, Mercedes S-class or Mercedes Viano executive. </h4>
                        <p>Safe, smooth and on time VIP-transport wen you need it. Just give us a call, send in information by the form below or drop us an email.  <br><br>
                        We are here for you 24/7. </p>
                        @endif
                    </div>
                </div>
                <accessoslo-limo-payment></accessoslo-limo-payment>
                <div class="col-xs-12" style="padding-left: 0; padding-right: 0;">
                    <div class="col-xs-12 col-md-5ths">
                    <div class="box" style="margin-top: 30px;">
                        <img src="/assets/img/mercedes-s-class.png" class="img-responsive center-block" alt="">
                        <h3>Mercedes <br>S-Class</h3>
                        <p><b>2</b> <br>passengers</p>
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-5ths">
                    <div class="box" style="margin-top: 30px;">
                        <img src="/assets/img/tesla-x.jpg" class="img-responsive center-block" alt="">
                        <h3>Tesla <br>Model X</h3>
                        <p><b>2 - 5</b> <br>passengers</p>
                    </div>
                    </div>

                    <div class="col-xs-12 col-md-5ths">
                    <div class="box" style="margin-top: 30px;">
                        <img src="/assets/img/mercedes-v-class.png" class="img-responsive center-block" alt="">
                        <h3>Mercedes Viano & V-Class</h3>
                        <p><b>2-8</b> <br>passengers</p>
                    </div>
                    </div>
                    <div class="col-xs-12 col-md-5ths">
                    <div class="box" style="margin-top: 30px;">
                        <img src="/assets/img/mercedes-sprinter.png" class="img-responsive center-block" alt="">
                        <h3>Mercedes Sprinter</h3>
                        <p><b>Up to 16</b> passengers</p>
                    </div>
                    </div>

                    <div class="col-xs-12 col-md-5ths">
                    <div class="box" style="margin-top: 30px;">
                        <img src="/assets/img/vip-bus.png" class="img-responsive center-block" alt="">
                        <h3>VIP <br>Coach</h3>
                        <p><b>From 16</b> passengers</p>
                    </div>
                    </div>
                </div>
                <div class="col-xs-12 hidden-xs">
                    <div class="aux-img">
                        <img src="/assets/img/limo-second-banner.jpg" class="img-responsive center-block" alt="" style="margin-top: 30px; box-shadow: 0px 0px 15px 0px rgba(61, 47, 12, 0.15);">
                    </div>
                </div>
            </div>
        </div>           
    </section>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&libraries=places"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script data-require="lodash.js@*" data-semver="3.5.0" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.js"></script>
@include('sweet::alert')
@endsection
