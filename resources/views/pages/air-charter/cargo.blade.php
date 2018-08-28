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
                <h1>Cargo & Special Charter</h1>
                @endif
            </div>
        </div>
    </section>
    <section class="content-box">
        <div class="container">
            <div class="row wrapper-box flex-box">
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-left">
                    @if ($data->status == "published")
                        {!! $data->page_content !!}
                    @else
                        <h3>NEED TO LAND OUTSIDE AN AIRFIELD? </h3>

                        <p>
                            <strong>Helicopter is a fast, safe and efficient tool for transport. Helicopter suits best for 1-6 passengers</strong> <br><br>

                            We will find the right solution that suits your needs. We have staff with over 40 years of experience in commercial aviation, managing flights and making sure everything runs safely, smooth and efficient. Experience runs from ground handlers to rofessional pilots keeping in mind the safety aspect. <br><br>

                            Fly away to your cabin, go hunting or just for sightseeing? We have a solution for your need. Our partners operate safe, single and twin engine turbine helicopters with experienced crew onboard. Making sure you have a safe journey. <br><br>

                            Please <a href="">contact us</a> for a free quote.
                        </p>
                    @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="box box-right">
                      <accessoslo-cargocharter></accessoslo-cargocharter>
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
<script src="/ng/directives/cargo-charter/cargo-charter.js"></script>
@endsection