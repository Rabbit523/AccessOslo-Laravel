@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <img src="/assets/img/bg/executive-charter.jpg" alt="" class="img-responsive">
            <div class="container wrapper-content">
                <div class="col-xs-12">
                    @if ($data->status == "published")
                    {!! $data->page_title !!}
                    @else
                    <h1>Why us</h1>
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
                            <h3>A SOLUTION THAT SUITS YOU</h3>
                            <h4 class="text-justify">We will find the right solution that suits your needs. We have staff with over 40 years of experience in  commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to professional pilots keeping in mind the safety aspect.</h4>
                            <p class="text-justify">No mission is to small. We take care of small groups from 10 passengers up to 400 passengers. Every journey can be customized. What about doing something special out of your corporate event? For example a red carpet to the aircraft, your company logos on each seat, a small gathering in our VIP-lounge before departure? Or perhaps an «in air band». Everything is possible. </p>
                            <p><b><a href="">Ask us for a free quote for your next event.  </b></a></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection