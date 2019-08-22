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
                        <div class="top-info">
                            <div class="col-xs-7 date">
                                <p><span><b>Published: </b><span>{{$data->published_date}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b>Last updated: </b><span>{{$data->updated_at}}</span></span></p>
                            </div>
                            <!-- <div class="col-xs-5">
                                <div class="link">
                                    <a class="fb-share-button" data-href="https://accessoslo.fantasylab.io" data-layout="button"></a>
                                    <a class="twitter-share" target="_blank" href="https://twitter.com/intent/tweet?original_referer=https://accessoslo.fantasylab.io"><i class="fa fa-twitter-square"></i><span>Share<span></a>
                                    <a class="linkedin-share" href="https://www.linkedin.com/sharing/share-offsite/?url=https://accessoslo.fantasylab.io" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin-square"></i><span>Share</span></a>                                    
                                    <a class="mail" href="mailto:contact@accessoslo.no" target="_blank"><i class="fa fa-envelope-square"></i><span>Mail</span></a>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">                       
                        <div class="detail_box">                            
                            <div class="info_title">
                                @if ($lang == "nb")
                                <h2>{!!$data->nb_post_title!!}<h2>
                                @else
                                <h2>{!!$data->en_post_title!!}<h2>
                                @endif
                            </div>    
                            <div class="info_image">
                                @if($data->single_img)
                                <img style="width: 100%;" src="{{$data->single_img}}">
                                @else
                                <img class="post_img" src="/assets/img/default-blog-image.jpg">
                                @endif
                            </div>
                            <div class="info_post_description">
                                @if ($lang == "nb")
                                    {!!$data->nb_post_description!!}
                                @else
                                    {!!$data->en_post_description!!}
                                @endif
                            </div>                                     
                        </div>                 
                        <div class="posts">
                            @foreach($posts as $post)
                            <div class="col-xs-3">
                                @if($post->post_img)
                                <img src="{{$post->post_img}}">
                                @else
                                <img src="/assets/img/default-blog-image.jpg">
                                @endif
                                <div class="gallery-posts">
                                    <p class="post_date"><b>Published:</b> {{$post->published_date}}</p>
                                    <a class="post_title" id="selected_post{{$post->id}}" data-title="{{$post->en_post_title}}"><p style="padding-left: 20px;">
                                        @if ($lang == "nb")
                                        {{$post->nb_post_title}}
                                        @else
                                        {{$post->en_post_title}}
                                        @endif
                                    </p></a>
                                </div>
                            </div>
                            @endforeach
                        </div>    
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://connect.facebook.net/en_US/sdk.js"></script>
<script type="text/javascript" src="//platform.linkedin.com/in.js"></script>
<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.SingleNews();});</script>
@endsection