@extends('layouts.public') @section('title', 'Access Oslo | Home') @section('content')
<div class="wrapper-general">
        <section class="introduction">
            <img src="/assets/img/bg/home.jpg" alt="" class="img-responsive">     
            <div class="container wrapper-tabs">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <ul class="nav nav-tabs">                        
                            <li class="active"><a data-toggle="tab" href="#bookFlight">Book Air Charter</a></li>
                            <li><a data-toggle="tab" href="#bookTransport">Book Limousine</a></li>
                            <li><a data-toggle="tab" href="#emptyLegs">Empty legs Flights</a></li>
                        </ul>
                                
                        <div class="tab-content">             
                            <div id="bookFlight" class="tab-pane fade in active">
                                <div class="row">
                                    <form name="flight_form" id="flight_form">
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="booking_type" name="booking_type" class="form-control" placeholder="Booking Type" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="flight_departure" name="flight_departure" class="form-control" placeholder="From Airport" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="flight_destination" name="flight_destination" class="form-control" placeholder="To Airport" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="flight_time" name="flight_time" class="form-control" placeholder="Departure Time" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="flight_passengers" name="flight_passengers" class="form-control" placeholder="Passengers" required>
                                            </div>
                                        </div>                                                                              
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="submit" id="flight_proceed" class="form-control" value="PROCEED">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="bookTransport" class="tab-pane fade">
                                <div class="row">
                                    <form name="transport_form" id="transport_form">
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="transport_departure" name="transport_departure" class="form-control" placeholder="From Address" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="transport_destination" name="transport_destination" class="form-control" placeholder="To Address" required>
                                            </div>
                                        </div>                                     
                                         <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <select name="flight_type" class="form-control" id="transport_service" style="padding-top:2px !important;" required>
                                                    <option disabled selected value>Type of Service</option>
                                                    <option value="One Way">OneWay</option>
                                                    <option value="Round Way">RoundWay</option>
                                                </select>                                                
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">                                                
                                                <select name="type_car" id="type_car" class="form-control" style="padding-top:2px !important;" required>
                                                    <option disabled selected value>Type of Car</option>
                                                    <option value="Mercedes S Class (1-3 seats)">Mercedes S Class (1-3 seats)</option>
                                                    <option value="Mercedes Van (4-8 seats)">Mercedes Van (4-8 seats)</option>
                                                    <option value="Mercedes Sprinter (8 – 16 seats)">Mercedes Sprinter (8 – 16 seats)</option>
                                                    <option value="Bus (16 + seats)">Bus (16 + seats)</option>
                                                </select>                                                
                                            </div>
                                        </div>      
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="transport_date" name="transport_date" class="form-control" placeholder="Date" required>
                                            </div>
                                        </div>                                       
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="submit" id="transport_proceed" class="form-control" value="PROCEED">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="emptyLegs" class="tab-pane fade">
                                <div class="row">
                                    <form name="emptyleg_form" id="emptyleg_form">
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="emptyleg_departure" name="emptyleg_departure" class="form-control" placeholder="From Airport" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="emptyleg_destination" name="emptyleg_destination" class="form-control" placeholder="To Airport" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="emptyleg_date" name="emptyleg_date" class="form-control" placeholder="Date" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="emptyleg_aircraft" name="emptyleg_aircraft" class="form-control" placeholder="Aircraft Type" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="text" id="emptyleg_passengers" name="emptyleg_passengers" class="form-control" placeholder="Passengers" required>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-2">
                                            <div class="form-group">
                                                <input type="submit" id="emptyleg_search" class="form-control" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </section>  
        @if($counts !=0)
        <section id="searchResults">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <div class="top-box row">
                            <div class="col-xs-12 col-sm-4 result-box">                               
                                {{$counts}} Results Found                                
                            </div>                    
                        </div>
                        <div class="list-items">
                            @foreach($datas as $data)
                            <div class="row">
                                <div class="col-xs-12">                            
                                    <div class="item">
                                        <div class="col-xs-12 col-sm-4 slider-box">
                                            <a href="javascript:void(0)" class="arrow arrow-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                                <img src="/assets/img/login-portal/airplane.jpg" alt="" class="img-responsive center-block">
                                            <a href="javascript:void(0)" class="arrow arrow-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        </div>
                                        <div class="col-xs-12 col-sm-8 info-box">
                                            <h4>{{$data->departure}} <span>to</span> {{$data->destination}}</h4>
                                            <ul class="list">
                                                <li>{{$data->aircraft}}</li>
                                                <li>{{$data->partner_name}}</li>
                                                <li>{{$data->seats}} Passengers</li>
                                            </ul>
                                            <div class="clearfix"></div>
                                            <div class="box-left">
                                                @if($data->currency == "GBP")
                                                <h5>£{{$data->price}}</h5>
                                                @elseif($data->currency == "EUR")
                                                <h5>€{{$data->price}}</h5>  
                                                @elseif($data->currency == "USD" || $data->currency == "AUD" || $data->currency == "CAD")
                                                <h5>${{$data->price}}</h5>  
                                                @elseif($data->currency == "CNY" || $data->currency == "JPY")
                                                <h5>¥{{$data->price}}</h5>   
                                                @elseif($data->currency == "NOK" || $data->currency == "DKK")
                                                <h5>Kr{{$data->price}}</h5>                                        
                                                @endif                                        
                                                <p>Available until {{$data->day}}. {{$data->month}} {{$data->year}}</p>
                                            </div>
                                            <div class="box-right">
                                                <a class="btn btn-yellow flight_details" data-source="{{$data}}">Flight details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{$datas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif
        @if($counts !=0)
        <section class="search-box-after">
        @elseif($counts == 0)
        <section class="content-box">
        @endif
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 box-left">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 info-box">
                                    <h2><span>AIRPORT</span> <br> TRANSPORT</h2>
                                    <p>Lorem Ipsum is simply dummy text of the 
                                    printing and typesetting industry. Lorem Ipsum.</p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <figure>
                                        <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 box-right">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <figure>
                                        <img src="http://via.placeholder.com/300x380" class="img-responsive" alt="">
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-7 info-box">
                                    <h2><span>Meet &</span> <br> Greet</h2>
                                    <p>Lorem Ipsum is simply dummy text of the 
                                    printing and typesetting industry. Lorem Ipsum.</p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 box-left">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 info-box">
                                    <h2><span>Latest News</span> <br> From our blog</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                                    Lorem Ipsum has been the industry's standard dummy. </p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                                <div class="col-xs-12 col-sm-6 none-padding-left">
                                    <figure>
                                        <img src="http://via.placeholder.com/830x380" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 box-left">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 info-box">
                                    <h2><span>AIR</span> <br> Charter</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <figure>
                                        <img src="http://via.placeholder.com/300x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 box-right">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure>
                                        <img src="http://via.placeholder.com/780x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 box-left">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-7 info-box">
                                    <h2><span>VIP</span> <br> Lounges</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <figure>
                                        <img src="http://via.placeholder.com/300x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 box-right">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure>
                                        <img src="http://via.placeholder.com/780x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix hidden-sm"></div>
                    <div class="col-xs-12 col-sm-6 col-md-6 box-left">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12">
                                    <figure>
                                        <img src="http://via.placeholder.com/780x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 box-right">
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-12 col-sm-5">
                                    <figure>
                                        <img src="http://via.placeholder.com/300x670" class="img-responsive" alt="">
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-7 info-box">
                                    <h2><span>The</span> <br> dedicated team</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. Lorem Ipsum has been the industry's standard dummy.</p>
                                    <a href="" class="btn btn-border-gold">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>  

        <div id="AccessModal" class="modal fade charter-modal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-header">
                        <img src="/assets/img/icon-modal.png" class="img-responsive center-block" alt="">
                        <h4 class="modal-title">BOOK AIRCHARTER BOARDING</h4>
                        <div class="timeline">
                            <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                            <span><img src="/assets/img/icon-air.png" alt=""></span>
                            <p class="text-left active">Contact Details</p>
                            <p class="text-right">Flight Details</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="charter_modal_form">                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-2">
                                    <div class="form-group">
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option disabled selected value>Mr</option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mrs">Mrs</option>
                                            <option value="Miss">Miss</option>
                                            <option value="Sir">Sir</option>
                                        </select>                                        
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="form-group">
                                        <input type="text" id="first_name" class="form-control" placeholder="First Name" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="form-group">
                                        <input type="text" id="last_name" class="form-control" placeholder="Last name" required>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="text" id="company" class="form-control" placeholder="Company" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="tel" id="charter_tel" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="email" id="email" class="form-control email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>   
                            <div class="text-center">
                                <a id="confirm" class="btn btn-purple">CONFIRM <img src="assets/img/arrow-right.png" alt=""></a>
                                <small>You will receive a booking confirmation by email. </small>
                            </div>
                        </form>
                    </div>
                </div>
        
            </div>
        </div>
        <div id="AccessModal" class="modal fade limousine-modal" role="dialog">
            <div class="modal-dialog">
            <!-- Modal content-->
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-header">
                        <img src="/assets/img/icon-modal.png" class="img-responsive center-block" alt="">
                        <h4 class="modal-title">BOOK LIMOUSINE TRANSPORT</h4>
                        <div class="timeline">
                            <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                            <span><img src="/assets/img/icon-air.png" alt=""></span>
                            <p class="text-left active">Contact Details</p>
                            <p class="text-right">Flight Details</p>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form id="limousine_modal_form">                            
                            <div class="row">                                
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" id="contact_person" class="form-control" placeholder="Contact Person" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" id="limousine_company" class="form-control" placeholder="Company name" required>
                                    </div>
                                </div>
                            </div>  
                            <div class="row">                              
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="tel" id="limousine_tel" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="email" id="limousine_email" class="form-control email" placeholder="Email" required>
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" id="comments" class="form-control" placeholder="Comments" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a id="book" class="btn btn-purple">Book & Pay <img src="assets/img/arrow-right.png" alt=""></a>
                                <small>You will receive a booking confirmation by email. </small>
                            </div>
                        </form>
                    </div>
                </div>
        
            </div>
        </div>
        <div class="modal fade modal-empty-leg" id="modal-empty-leg" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3>VIEW EMPTY LEG</h3>             
                    </div>
                    <div class="modal-body">
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 slider-box">
                                    <a href="javascript:void(0)" class="arrow arrow-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                                        <img src="/assets/img/login-portal/airplane.jpg" alt="" class="img-responsive minus-margin">
                                    <a href="javascript:void(0)" class="arrow arrow-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-xs-12 col-sm-6 info-box">
                                    <div class="col-sm-12">
                                        <label for="">FROM AIRPORT</label>
                                        <h4 id="from_airport_modal"></h4>
                                    </div>                                
                                    <div class="col-sm-12">
                                        <label for="">TO AIRPORT</label>
                                        <h4 id="to_airport_modal"></h4>
                                    </div>  
                                    <div class="col-sm-12 price-box">
                                        <h5 id="price_modal"></h5>
                                        <p id="status_modal">Available until</p>
                                    </div> 
                                </div>                        
                            </div>
                        </div>
                        <div class="row-modal">
                            <div class="row modal_back">
                                <div class="detail_info">                            
                                    <div id="modal_date">
                                        <span><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        <span id="modal_date_li"></span>
                                    </div>
                                    <div id="modal_time">
                                        <span><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        <span id="modal_time_li"></span>
                                    </div>
                                    <div id="modal_aircraft">
                                        <span><i class="fa fa-plane" aria-hidden="true"></i></span>
                                        <span id="modal_aircraft_li"></span>
                                    </div>
                                    <div id="modal_partner">
                                        <span id="modal_img"><img src="/assets/img/login-portal/jet-group.png" alt="" class="img-responsive"></img></span>
                                        <span id="modal_partner_li"></span>                               
                                    </div>
                                    <div id="modal_passenger">
                                        <span><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <span id="modal_passenger_li"></span>
                                    </div>                            
                                </div>
                            </div>
                        </div>      
                        <div class="row-modal">
                            <div class="row">
                                <div class="request_section">                           
                                    <div class="request_body">
                                        <form id="request_form">
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="col-xs-12 col-sm-3">
                                                    <div class="form-group">        
                                                        <label for="">GENDER</label>                               
                                                        <select name="emptyleg_Mr" id="emptyleg_Mr" class="form-control" required>
                                                            <option disabled selected value></option>
                                                            <option value="Mr">Mr</option>
                                                            <option value="Mrs">Mrs</option>
                                                            <option value="Miss">Miss</option>
                                                            <option value="Sir">Sir</option>                                                
                                                        </select>                                            
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-4">
                                                    <div class="form-group">
                                                        <label for="">CONTACT PERSON</label>  
                                                        <input type="text" name="emptyleg_contact" id="emptyleg_contact" class="form-control firstname" required>                    
                                                    </div>                                            
                                                </div>
                                                <div class="col-xs-12 col-sm-5">
                                                    <div class="form-group">
                                                        <label for="">PHONE</label>  
                                                        <input type="tel" name="emptyleg_tel" id="emptyleg_tel" class="form-control" required>                   
                                                    </div>                                            
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="col-xs-12 col-sm-7">
                                                    <div class="form-group">        
                                                        <label for="">EMAIL</label>                                 
                                                        <input type="email" name="emptyleg_email" id="emptyleg_email" class="form-control email"  required>                              
                                                    </div>
                                                </div>                                    
                                                <div class="col-xs-12 col-sm-5">
                                                    <div class="form-group">           
                                                        <label for="">COMPANY NAME</label>                                    
                                                        <input type="text" name="emptyleg_company" id="emptyleg_company" class="form-control company"  required>                   
                                                    </div>
                                                </div>
                                            </div>                                    
                                            <div class="col-xs-12 col-sm-12">
                                                <div class="col-xs-12 col-sm-4" style="float:right;">
                                                    <input type="hidden" name="amount" id="paypal_amount">
                                                    <button type="submit" class="btn btn-yellow request">MAKE REQUEST</button>
                                                </div>
                                            </div>                                    
                                        </div>
                                    </div>
                                </div>                               
                            </div>
                        </div>          
                    </div>           
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&libraries=places&callback=initMap"></script>
<script>
    function initMap() {     
        var from_address = document.getElementById('transport_departure');
        var from_auto = new google.maps.places.Autocomplete(from_address, {types: ['address']});   
        var from_zipcode = "";
        from_auto.addListener('place_changed', fillInFromAddress);
        function fillInFromAddress() {
            // Get the place details from the autocomplete object.
            var location = from_auto.getPlace();        
            geocoder = new google.maps.Geocoder();

            lat = location['geometry']['location'].lat();
            lng = location['geometry']['location'].lng();
            var latlng = new google.maps.LatLng(lat,lng);
            
            geocoder.geocode({'latLng': latlng}, function(results) {
                for(i=0; i < results.length; i++){
                    for(var j=0;j < results[i].address_components.length; j++){
                        for(var k=0; k < results[i].address_components[j].types.length; k++){
                            if(results[i].address_components[j].types[k] == "postal_code"){
                                from_zipcode = results[i].address_components[j].short_name;  
                                console.log(from_zipcode);                                                             		
                            }
                        }
                    }
                }
            });
        }           
        var to_address = document.getElementById('transport_destination');
        var to_auto = new google.maps.places.Autocomplete(to_address, {types: ['address']});  
        var to_zipcode = "";
        to_auto.addListener('place_changed', fillInFromAddress);
        function fillInFromAddress() {
            // Get the place details from the autocomplete object.
            var location = to_auto.getPlace();        
            geocoder = new google.maps.Geocoder();

            lat = location['geometry']['location'].lat();
            lng = location['geometry']['location'].lng();
            var latlng = new google.maps.LatLng(lat,lng);
            
            geocoder.geocode({'latLng': latlng}, function(results) {
                for(i=0; i < results.length; i++){
                    for(var j=0;j < results[i].address_components.length; j++){
                        for(var k=0; k < results[i].address_components[j].types.length; k++){
                            if(results[i].address_components[j].types[k] == "postal_code"){
                                to_zipcode = results[i].address_components[j].short_name;  
                                console.log(to_zipcode);                                                             		
                            }
                        }
                    }
                }
            });
        }            
    }; 
</script>
<script>
    var date = "{{$date}}";
    var departure = "{{$departure}}";
    var destination = "{{$destination}}";
    var counts = "{{$counts}}";
</script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Home();});</script>
@endsection