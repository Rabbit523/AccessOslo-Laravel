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
                <div class="row">         
                    <div class="col-xs-12">
                        <h3>Access Oslo News</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        @foreach($datas as $data)
                        <div class="box box-top post_link" data-title="{{$data->en_post_title}}">                            
                            <div class="post-image">
                                @if($data->post_img)
                                <img class="post_img" src="{{$data->post_img}}">
                                @else
                                <img class="post_img" src="/assets/img/default-blog-image.jpg">
                                @endif
                            </div>
                            <div class="text_area">
                                <p class="date">Published: {{$data->published_date}}</p>
                                @if ($lang == "nb")
                                    <h4>{!!$data->nb_post_title!!}</h4>
                                @else
                                    <h4>{!!$data->en_post_title!!}</h4>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        {{$datas->links()}}
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection

@section('scripts')
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.News();});</script>
@endsection