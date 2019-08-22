<?php $lang = app()->getLocale();?>
@extends('layouts.public')
@if ($lang == "nb")
@section('title', $partner->nb_meta_title)
@section('description', $partner->nb_meta_description)
@else
@section('title', $partner->en_meta_title)
@section('description', $partner->en_meta_description)
@endif
@section('content')
<div class="wrapper-general">
    <section class="introduction">
        <img src="{{$partner->banner_img}}" alt="" class="img-responsive">
        <div class="container wrapper-content">
            <div class="col-xs-12">
                @if($partner->status == "published")
                    @if($lang == "nb")
                    {!! $partner->nb_page_title !!}
                    @else
                    {!! $partner->en_page_title !!}
                    @endif
                @else
                    <h2> PARTNERS </h2>
                @endif
            </div>
        </div>
    </section>
    <section class="wrapper-content">
        <div class="container">
            @if($a_count !=0)
            <div class="partners-group">
                <div class="title">
                    <h2>Air Charter</h2>
                </div>
                <div class="clearfix"></div>
                <div class="row grid">
                    @foreach($datas as $data)
                    @if($data->type =="aircharter")
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">
                            <figure>
                                @if($data['main_img'] != null)                                    
                                <img src="{{$data->main_img}}" class="center-block img-responsive" alt="">
                                @else 
                                <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                                @endif
                            </figure>
                            <div class="box-top">
                                <h3>{{$data->partner_name}}</h3>
                                <p>{{$data->description}}</p>
                                <a class="btn btn-border-gold view_details" id="{{$data->id}}">View partner</a>
                            </div>                                
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @if($h_count !=0)
            <div class="partners-group">
                <div class="title">
                    <h2>Norway Partners</h2>
                </div>
                <div class="clearfix"></div>
                <div class="row grid">
                    @foreach($datas as $data)
                    @if($data->type =="norway")
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">
                            <figure>
                                <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                            </figure>
                            <div class="box-top">
                                <h3>{{$data->partner_name}}</h3>
                                <p>{{$data->description}}</p>
                                <a class="btn btn-border-gold view_details" id="{{$data->id}}">View Partner</a>
                            </div>                                
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection

@section('scripts')
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Partners();});</script>
@endsection
