@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
    <section class="introduction">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="box">
                        @if ($data->status == "published")
                        {!! $data->page_title!!}
                        @else
                        <h1><span>General</span> Contact information</h1>
                        <span class="share">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div id="map"></div>
                </div>
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
                                <p>You are welcome to visit our office - please call ahead to ensure the 
                                    appropriate staff member will be available to meet you.  <br><br>
                                    
                                    <b>Access Oslo AS.</b> Martin Linges vei 25. 1364 Fornebu, Norway</p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <figure>
                                    <img src="/assets/img/call_us2.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h2>Call Us</h2>
                                <p>You are welcome to visit our office - please call ahead to ensure the 
                                        appropriate staff member will be available to meet you. <br><br>
                                    <a href=""><b>H24</b> +47 91 222 999</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-3">
                                <figure>
                                    <img src="/assets/img/send_email2.png" class="img-responsive" alt="">
                                </figure>
                            </div>
                            <div class="col-xs-12 col-sm-9">
                                <h2>Send an email</h2>
                                <p>You are welcome to visit our office - please call ahead to ensure the 
                                        appropriate staff member will be available to meet you.  <br><br>
                                        
                                        <a href=""><b>contact@accessoslo.no</b></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="box-right">
                        <h2>OUR STAFF IS READY TO ASSIST YOU. <br> HOW MAY WE HELP?</h2>
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
                                        <label for="">Last name*</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control" equired>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email Address*</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone number*</label>
                                        <input type="tel" name="phone" id="mobile-number" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Message*</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper-btns">
                                <a id="send" class="btn btn-yellow">Send Message</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
<script>
function initMap() {
    var uluru = {lat: 60.196170, lng: 11.071767};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: new google.maps.LatLng(uluru.lat,uluru.lng)
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&callback=initMap">
</script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.ContactUs();});</script>
@endsection