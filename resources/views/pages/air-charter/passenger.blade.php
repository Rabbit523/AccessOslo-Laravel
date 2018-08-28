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
                        <h2> PASSENGER AIRCRAFT CHARTER </h2>
                    @endif
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-top">
                            @if ($data->status == "published")
                                {!! $data->page_content !!}
                            @else 
                            <h3 style="font-family: Gotham; color: rgb(194, 152, 52); margin-bottom: 20px; font-size: 22px; text-transform: uppercase;">A SOLUTION THAT SUITS YOU</h3>
                            <h4 class="text-justify" style="font-family: Gotham; line-height: 1.2; color: rgb(108, 108, 108); margin-bottom: 20px;">We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4>
                            <h1><p class="text-justify" style="margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible.</p><p style="margin-bottom: 30px; color: rgb(95, 96, 98); font-family: Gotham-book; font-size: 12px; line-height: 24px;"><span style="font-weight: 700;"><a href="http://localhost/air-charter/passenger-charter" style="color: rgb(194, 152, 52);">Ask us for a free quote for your next event.</a></span></p></h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection
