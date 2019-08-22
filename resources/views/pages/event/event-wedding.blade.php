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
                    <h2> Wedding </h2>
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
                    <?php $flag = isset($sub_banner);?>
                    @if($flag == 1)
                    <div class="sub_banner" style="background-image: url('{{$sub_banner->path}}')"></div>
                    @else
                    <div class="aux-img" style="height: 300px; background: #b9b8b8;"></div>
                    @endif
                    <div class="box box-right">
                        <h4>Contact our VIP coordinator Ms. Aina Kise to get started</h4>
                        <p>Phone: +47 466 22 999</p>
                        <p>Email: ak@accessoslo.no</p>
                    </div>
                    @if($count != 0)
                    <div class="slide" id="slide">
                        <ul>
                            @foreach($slides as $image)
                            <li data-bg="{{$image->path}}" style="width: 100%; height: 405px;"></li>
                            @endforeach
                        </ul>
                    </div>
                    @else
                    <div class="aux-img" style="height: 405px; background: #b9b8b8;"></div>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-12">
                    <div class="message-form">
                        <h2>Our staff is ready to assist you. How may we help?</h2>
                        <form id="form_contr">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">First name</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Last name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone number</label>
                                        <input type="tel" name="phone" id="mobile-number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-btns">
                                <a id="send" class="btn btn-yellow confirm">Send Message</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="ContactSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h2 style="color: #c29834; font-size: 26px;">Thank you <br> for your request.</h2>
                <p>Our crew will get in touch with you in a short time.</p><br>
                <a id="close_success" class="btn btn-border-gold">Close</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/jquery.slide.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.EventWedding();});</script>
@endsection
