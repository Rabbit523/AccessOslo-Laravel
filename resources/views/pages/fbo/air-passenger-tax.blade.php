@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
  <section class="introduction">
    <div class="container">
        <div class="row flex-box">
            <div class="col-xs-12 col-sm-4">
                <div class="box">
                @if ($data->status == "published")
                    {!! $data->page_title !!}
                    {!! $data->page_content !!}
                @else
                    <h1>Air Passenger Tax</h1>
                    <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</p>
                    <span class="share"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="slider">
                    <img src="/assets/img/slider.jpg" class="img-responsive" alt="">
                </div>
            </div>
        </div>
    </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-left">
                    @if ($data->status == "published")
                        {!! $data->extra_content !!}
                    @else
                      <h3>Norwegian Air Passenger Tax</h3>
                      <p>From 1st of June 2016, the Norwegian government implemented a mandatory <span class="tax-bold">Air Passenger Tax</span> on all flights leaving Norwegian airports with passengers. </p>
                      <p>As there is only Norwegian companies that are able to report these taxes, all foreign companies are required to sign up with a Norwegian representative.</p>
                      <p>Access Oslo is registered as a representative by the Tax Administration Norway (Skatteetaten) and we would be happy to handle the tax reporting on your behalf.</p>
                      <p>The tax amount is NOK 80 per passenger for departures from Norwegian airports.</p>
                      <p>For more information or to register for the Air Passenger Tax please contact us at <a href="mailto:accounting@accessoslo.no">accounting@accessoslo.no</a> or fill out the form on the right side.</p>
                      <p>To read the information provided from Tax Administration Norway in detail, please click on the buttons below to be redirected;</p>
                    @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-right">
                    <accessoslo-airpassenger></accessoslo-airpassenger>
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
<script src="/js/vendor/countrySelect.min.js"></script>
<script src="/ng/directives/air-passenger/air-passenger.js"></script>
@endsection