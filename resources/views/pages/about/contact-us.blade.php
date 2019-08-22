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
                    <h2> CONTACT US </h2>
                @endif
            </div>
        </div>
    </section>
    <section class="wrapper-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 box-left">
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <figure>
                                    <img src="/assets/img/visit_us2.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h2>Visit us</h2>
                                <p><b>Access Oslo AS Main office:</b><br>Hans Gaarders Veg 95,<br> 2060 Gardermoen, Norway </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <figure>
                                    <img src="/assets/img/airport.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h2>FBO ENGM (OSL) </h2>
                                <p>
                                  <b>GA-Terminal OSL West</b><br>
                                  Hans Gaardersveg 95,<br> 2060 Gardermoen, Norway<br>
                                  <a href="tel:+4791222999">H24 +47 91 222 999</a><br>
                                  <a href="mailto:ops@accessoslo.no">ops@accessoslo.no</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <figure>
                                    <img src="/assets/img/airport.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h2>FBO ENTO (TRF) </h2>
                                <p>
                                  <b>GA-Terminal Sandefjord Torp</b><br>
                                  Hangarveien 9,<br> 3241 Sandefjord, Norway <br>
                                  <a href="tel:+4791222999">H24 +47 91 222 999</a><br>
                                  <a href="tel:+4790643274">H24 +47 906 43 274</a><br>
                                  <a href="mailto:ops@accessoslo.no">ops@accessoslo.no</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="box-right">
                        <h2>Our staff is ready to assist you.<br> How may we help?</h2>
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
                                    <div class="form-group message-box">
                                        <label for="">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-btns">
                                <a id="send" class="btn btn-yellow form">Send Message</a>
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
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.ContactUs();});</script>
@endsection
