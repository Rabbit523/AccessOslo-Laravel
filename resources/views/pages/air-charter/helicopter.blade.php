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
                @if ($lang == "nb")
                    {!! $data->nb_page_title !!}
                    @else
                    {!! $data->en_page_title !!}
                    @endif
                @else
                <h1>Helicopter Charter</h1>
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
                        <h3>NEED TO LAND OUTSIDE AN AIRFIELD? </h3>
                        <h4>Helicopter is a fast, safe and efficient tool for transport. Helicopter suits best for 1-6 passengers</h4>
                        <p>We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to rofessional pilots keeping in mind the safety aspect. <br><br>
                        Fly away to your cabin, go hunting or just for sightseeing? We have a solution for your need. Our partners operate safe, single and twin engine turbine helicopters with experienced crew onboard. Making sure you have a safe journey. <br><br>
                        Please <a href="">contact</a> us for a free quote. </p>
                    @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-right">
                       <accessoslo-helicoptercharter></accessoslo-helicoptercharter>
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
<script src="/ng/directives/helicopter-charter/helicopter-charter.js"></script>
@endsection
