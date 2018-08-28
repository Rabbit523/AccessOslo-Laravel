@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <img src="/assets/img/bg/executive-charter.jpg" alt="" class="img-responsive">
            <div class="container wrapper-content">
                <div class="col-xs-12">
                    @if($data->status == "published")
                        {!! $data->page_title !!}            
                    @else
                        <h2> EXECUTIVE CHARTER </h2>
                    @endif
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-top">
                        @if($data->status == "published")
                            {!! $data->page_content !!}            
                        @else
                            <h3>EXPERIENCE THE LUXURY AND EFFECTIVENESS OF PRIVATE AIR TRAVEL</h3>
                            <h4>Get an instant charter quote and up to date market prices for your journey. Our focus is to provide you with the most cost effective aircraft charter service that matches your needs.</h4>
                            <p>Our aviation partners have the highest standard quality, technology and maintenance programs that ensure you a safe, economical, and on time operation.</p>
                        @endif                            
                        </div>
                    </div>
                </div>
                <div class="row wrapper-box">
                    <div class="col-xs-12 col-sm-6">
                        <div class="box box-left">
                        @if($data->status == "published")
                            {!! $data->extra_content !!}            
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
                        <div class="box box-right">
                            <accessoslo-executivecharter></accessoslo-executivecharter>                           
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
<script src="/ng/directives/executive-charter/executive.js"></script>
@endsection