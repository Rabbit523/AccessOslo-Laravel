@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <img src="/assets/img/bg/limousine-transport.jpg" alt="" class="img-responsive">
            <div class="container wrapper-content">
                <div class="col-xs-12">
                    @if ($data->status == "published")
                    {!! $data->page_title !!}
                    @else
                    <h1>Limousine transport</h1>
                    @endif
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="box box-left">
                            @if ($data->status == "published")
                            {!! $data->page_content !!}
                            @else
                            <h3>We can pick you up</h3>
                            <h4>Wherever you are - we can pick you up in our BMW-7 series, Mercedes S-class or Mercedes Viano executive. </h4>
                            <p>Safe, smooth and on time VIP-transport wen you need it. Just give us a call, send in information by the form below or drop us an email.  <br><br>
                            We are here for you 24/7. </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="box box-right">
                            <h3>Book limousine transport</h3>
                            <p>You will receive a bookin confirmation by email.</p>
                            <form id="input_form" method="POST" action="{{ URL::to('services/paypal') }}">                        
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="">Contact Person</label>
                                            <input type="text" name="contact_person" id="contact_person" placeholder="Nohman Janjua" class="form-control" required>                                           
                                        </div>
                                    </div>              
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="">Phone</label>
                                            <input type="tel" name="phone" id="mobile-number" class="form-control" required>                                      
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" placeholder="nohman@janjua.net" class="form-control" required>                            
                                        </div>
                                    </div>                                    
                                </div> 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Company</label>
                                            <input type="text" name="company" id="company" placeholder="Fantasylab" class="form-control" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group"> 
                                                <label for="">Date</label>                                                 
                                                <input type="text" name="datepicker" id="datepicker" class="form-control date" placeholder="(mm/dd/yyyy)" required>   
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" style="margin-top:27px;" type="button"><i class="fa fa-calendar" aria-hidden="true"></i></button>
                                                </span>                                                                              
                                            </div>
                                        </div>
                                    </div>                                                          
                                </div>                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Driving Zone</label>
                                            <select name="type_zone" id="type_zone" class="form-control" required>
                                                <option disabled selected value>Select Zone</option>
                                                <option value="OsloToOSL">From Oslo to OSL</option>
                                                <option value="OSLToOslo">From OSL to Oslo</option>
                                                <option value="AskerToOSL">From Asker Centrum to OSL</option>
                                                <option value="OSLToAsker">From OSL to Asker Centrum</option>
                                            </select>                                  
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Type Car</label>
                                            <select name="type_car" id="type_car" class="form-control" required>
                                                <option disabled selected value>Type of Car</option>
                                                <option value="S-klasse">Mercedes S Class(1-3seats)</option>
                                                <option value="Viano">Mercedes Van(4-8seats)</option>
                                                <option value="Minibuss">Mercedes Sprinter(8–16seats)</option>                                                
                                            </select>                                         
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">                                    
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">From Address</label>
                                            <input type="text" name="from_address" id="from_address" class="form-control" onFocus="geolocate()" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">To Address</label>
                                            <input type="text" name="to_address" id="to_address" class="form-control" onFocus="geolocate()"required>                                     
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">comments</label>
                                            <input type="text" name="comments" id="comments" class="form-control" placeholder="Comments">
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="radio">
                                            <label class="radio-inline"><input type="radio" name="optradio" value="Round Way" required>Round Trip</label>
                                            <label class="radio-inline"><input type="radio" name="optradio" value="One Way" required>One Way</label>               
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-left">
                                        <label id="price"></label>
                                    </div>
                                </div>
                                <input id="amount" type="text" name="amount" style="display:none;">
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <button id="booking-button" class="btn btn-yellow">Book & Pay</button>
                                    </div>
                                </div>                            
                                <div id="map">
                                    <table id="address" style="display:none;">
                                        <tr>
                                            <td class="label">Street address</td>
                                            <td class="slimField"><input class="field" id="street_number"
                                                disabled="true"></input></td>
                                            <td class="wideField" colspan="2"><input class="field" id="route"
                                                disabled="true"></input></td>
                                        </tr>
                                        <tr>
                                            <td class="label">City</td>                                           
                                            <td class="wideField" colspan="3"><input class="field" id="locality"
                                                disabled="true"></input></td>
                                        </tr>
                                        <tr>
                                            <td class="label">State</td>
                                            <td class="slimField"><input class="field"
                                                id="administrative_area_level_1" disabled="true"></input></td>
                                            <td class="label">Zip code</td>
                                            <td class="wideField"><input class="field" id="postal_code"
                                                disabled="true"></input></td>
                                        </tr>
                                        <tr>
                                            <td class="label">Country</td>
                                            <td class="wideField" colspan="3"><input class="field"
                                                id="country" disabled="true"></input></td>
                                        </tr>
                                    </table>
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
    var toAddress, fromAddress;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    function initAutocomplete() {
        fromAddress = new google.maps.places.Autocomplete((document.getElementById('from_address')),{types: ['geocode']});
        toAddress = new google.maps.places.Autocomplete((document.getElementById('to_address')),{types: ['geocode']});
        fromAddress.addListener('place_changed', fillInAddress);
        toAddress.addListener('place_changed', fillInToAddress);
    }
    function fillInAddress() {       
        var place = fromAddress.getPlace();
        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
    function fillInToAddress() {       
        var place = toAddress.getPlace();
        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                fromAddress.setBounds(circle.getBounds());
            });
        }
    }   
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&libraries=places&callback=initAutocomplete" async defer></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.limousineTransport();});</script>
@endsection