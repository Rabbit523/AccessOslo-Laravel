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
                        <h1>Meet & Greet</h1>
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
                    <div class="box box-right">                    
                        <form id="flight_form" method="POST" action="{{ URL::to('services/paypal') }}">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">CONTACT PERSON</label>
                                        <input type="text" placeholder="Nohman Janjua" id="contact_person" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="tel" id="meet_phone" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">EMAIL</label>
                                        <input type="email" placeholder="nohman@janjua.net" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">COMPANY NAME</label>
                                        <input type="text" placeholder="FantasyLab" id="company" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">FLIGHT NUMBER</label>
                                        <input type="text" placeholder="NO3394CO" id="flight_number" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">AIRLINE</label>
                                        <input type="text" placeholder="Qatar Airways" id="airline" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">DATE OF TRAVEL</label>
                                        <input type="text" placeholder="(dd/mm/yyyy)" id="meet_datepicker" class="form-control date" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label for="">TIME OF ARRIVAL</label>
                                        <input type="text" placeholder="(hh:mm)" id="timepicker" class="form-control time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="">LUGGAGE</label>
                                        <input type="text" placeholder="5 luggages" id="luggage" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="">TRAVELERS</label>
                                        <input type="text" placeholder="5 travelers" id="travelers" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <label for="">BOOKING REFERENCE</label>                                      
                                        <input type="text" placeholder="NO49303ES" id="booking_reference" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label>MEET 6 GREET SERVICE</label>                                      
                                        <select id="meet_service" class="form-control" required>
                                            <option disabled selected value>Select Service</option>
                                            <option value="Check-In Service">Check-In Service</option>
                                            <option value="Check-In Service or Group of 9 people or m...">Check-In Service or Group of 9 people or m...</option>
                                            <option value="Meet & Greet ARRIVAL">Meet & Greet ARRIVAL</option>
                                            <option value="Meet & Greet DEPARTURE">Meet & Greet DEPARTURE</option>
                                            <option value="Meet & Greet TRANSFER/Connection flights a...">Meet & Greet TRANSFER/Connection flights a...</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label>OPTION PRODUCT</label>                                        
                                        <select name="product" id="product" class="form-control" required>
                                            <option disabled selected value>Select product</option>
                                            <option value="Lounge access when departing from OSL">Lounge access when departing from OSL</option>
                                            <option value="LIMOUSINE SERVICE to / from Oslo airport(OSL)">LIMOUSINE SERVICE to / from Oslo airport(OSL)</option>
                                            <option value="NO Thanks, we do not want any additional products">NO Thanks, we do not want any additional products</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label>CONNECTION FLIGHT: <br>
                                            DEPARTURE TIME FROM (OSL)</label>                                       
                                        <input type="text" id="departure_timepicker" class="form-control time" placeholder="(hh:mm)" required>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <label>CONNECTION FLIGHT: <br>
                                            FLIGHT NUMBER</label>                             
                                        <input type="text" id="flight_no" class="form-control time" placeholder="JS323NO" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label>COMMENTS</label>
                                        <textarea class="form-control" id="comments" placeholder="Write your comments"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 text-left">
                                    <label id="price"></label>
                                </div>
                                <input type="hidden" name="item" value="Meet & Greet">
                                <input type="hidden" name="type" value="meet">
                                <input id="item_number" type="hidden" name="item_number">
                                <input id="amount" type="hidden" name="amount">
                                <div class="col-xs-6 text-right">
                                    <button id="book" class="btn btn-yellow" style="display:none;">Book & Pay</button>
                                    <button id="request" class="btn btn-yellow" style="display:none;">Send Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//jonthornton.github.io/jquery-timepicker/jquery.timepicker.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MeetGreet();});</script>
@endsection