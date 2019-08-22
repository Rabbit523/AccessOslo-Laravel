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
                <div class="col-xs-12 col-sm-4">
                    <?php $str_name = $data->partner_name; $len = strlen($str_name);?>
                    @if($data->type != 'norway')
                    <div class="box">
                        <h1><span>{{$data->partner_name}}</span></h1>
                        <p>{{$data->description}}</p>
                        <span class="share">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </span>
                    </div>
                    @else
                    <div class="norway-box">
                        <h1><span>{{$data->partner_name}}</span></h1>
                        <p>{{$data->description}}</p>
                    </div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="slider">
                        @if($data['sub_img'] != null)
                        <img src="{{$data->sub_img}}" class="img-responsive" alt="">
                        @else
                        <img src="/assets/img/bg/single-partner.jpg" class="img-responsive" alt="">
                        @endif                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="wrapper-content">
        <div class="container">
            @if ($data->type != 'norway')
            <div class="features-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">                         
                            <div class="info-box">
                                <h2>{{$data->last_audit}}</h2>
                                <p>LAST AUDIT PERFORMED BY ACCESS OSLO</p>
                                <a href="">What does this mean?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">                          
                            <div class="info-box">
                                <h2>50M USD COVERAGE</h2>
                                <p>NSURANCE DOCUMENTATION AND COVERAGE</p>
                                <a href="">What does this mean?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">                          
                            <div class="info-box">
                                <h2>VALID AOC</h2>
                                <p>AIR OPERATOR’S CERTIFICATE</p>
                                <a href="">What does this mean?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">                         
                            <div class="info-box">
                                <h2>50M USD COVERAGE</h2>
                                <p>INSURANCE DOCUMENTATION AND COVERAGE</p>
                                <a href="">What does this mean?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item ranking">                          
                            <div class="info-box">
                                <div class="ranking-box">
                                <div class="avg_rate"></div>
                                </div>
                                <h2 class="rate_text"></h2>
                                <p>SAFETY FOCUS AND SAFETY RECORD</p>
                                <a href="">What does this mean?</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="item">                          
                            <div class="info-box">
                                <h2>{{$data->operate_since}}</h2>
                                <p>OPERATIVE SINCE</p>
                                <a href="">Go to Royal Jet website</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="norway-description">
                {!! $data->norway_description !!}
            </div>
            @endif
            <div class="review-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="box-right" style="display: inline-block;">
                            @if ($counts != 0)
                            <h3>Recent customer reviews</h3>
                            @elseif ($counts == 0)
                            <h3>No recent customer reviews</h3>
                            @endif
                            @foreach($reviews as $review)
                            <div class="col-lg-4">
                                <div class="box">
                                    <div class="header-box">
                                        <figure>
                                            <img src="/assets/img/user-review.jpg" class="img-responsive" alt="">
                                        </figure>
                                        <div>
                                            <div>
                                                <label>{{$review->customer_name}}</label>
                                                <div class="ranking-box">
                                                    <div class="total_rate" data-initialRating="<?=$review->total_rate?>"></div>
                                                </div>
                                            </div>
                                            <h5>“Extraordinary flight experience”</h5>
                                        </div>
                                    </div>
                                    <div class="info-content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and scrambled.</p>
                                        <a class="btn btn-border-gold">Show more</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{$reviews->links()}}                      
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
    var id = {{$data->id}};
</script>
<script src="/js/vendor/jquery.star-rating-svg.js"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.SinglePartner();});</script>
@endsection