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
                    <h2> MEET GREET </h2>
                @endif
            </div>
        </div>
    </section>
    <section class="content-box">
        <div class="container">
            <div class="row flex-box">
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-left">
                    @if ($data->status == "published")
                        @if($lang == "nb")
                        {!! $data->nb_page_content !!}
                        @else
                        {!! $data->en_page_content !!}
                        @endif
                    @else
                        <h3>MEET & GREET AIRPORT SERVICE</h3>
                        <p><strong>Our mission is to make the experience at the airport as easy, efficient and stress free for the customer as possible. <br><br>

                        The service is available at departure, arrival and when connecting flights at Oslo Airport.</strong></p>

                        <h3>MEET & GREET - CHECK-IN</h3>

                        <p>Be greeted by our Concierge when you arrive at the airport, and get personalized service with the check-in process and your luggage.</p>

                        <h3>MEET & GREET - DEPARTURE</h3>

                        <p>Be greeted by our Concierge when you arrive at the airport. <br><br>

                        We meet you at the entrance door, and escort you all the way through the airport and out to the gate where your flight departs from.</p>

                        <h3> MEET & GREET - TRANSFER</h3>

                        <p>Be greeted by our Concierge when you arrive at OSL. <br><br>

                        We will meet you at the gate, and escort you all the way through the airport and out to the new gate where your next flight departs from.If you need to go through check-in again, or you need to drop off your bag, we will ofcourse assist you with this.
                        </p>

                        <h3>MEET & GREET - ARRIVAL</h3>

                        <p>Be greeted by our Concierge when you arrive at OSL.

                        Our Concierge will meet you at the gate and escort you to the arrival hall and out of the terminal building. We also assist with the retrieval of your luggage from the baggage belts​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​.
                        </p>
                    @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <accessoslo-meetgreet-payment></accessoslo-meetgreet-payment>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script data-require="lodash.js@*" data-semver="3.5.0" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.js"></script>
@include('sweet::alert')
@endsection
