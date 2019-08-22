@extends('layouts.public') @section('title', 'Access Oslo - Executive Handling & FBO') @section('content')
<div class="wrapper-general">
    <section class="introduction">
        <img src="/assets/img/bg/home.jpg" alt="" class="img-responsive home-page-background">
        <div class="container wrapper-tabs">
            <div class="row full-sized">
                <div class="col-xs-12">
                    <div class="book_tab">
                        <div>
                            <label class="container" id="executive_tab">Executive Charter<input type="radio" name="book_type" value="executive" checked/><span class="checkmark"></span></label>
                        </div>
                        <div>
                            <label class="container" id="limo_tab">Airport Limo<input type="radio" name="book_type" value="limo"/><span class="checkmark"></span></label>
                        </div>
                        <div>
                            <label class="container" id="empty_tab">Empty Leg Flights<input type="radio" name="book_type" value="empty" id="empty_check"/><span class="checkmark"></span></label>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div id="bookFlight" class="tab-pane fade in active">
                            <form name="flight_form" id="flight_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="airport dropdown form-group">
                                            <label>FROM AIRPORT</label>
                                            <input class="form-control" name="flight_departure" id="flight_departure" type="text" data-provide="typeahead" placeholder="From Airport" required>
                                        </div>                                            
                                    </div>
                                    <div class="col-xs-12 col-sm-3">                                            
                                        <div class="airport dropdown form-group">
                                            <label>TO AIRPORT</label>
                                            <input class="form-control" name="flight_destination" id="flight_destination" type="text" data-provide="typeahead" placeholder="To Airport" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="form-group">
                                            <label>DEPARTURE DATE</label>
                                            <input type="text" id="flight_date" name="flight_date" class="form-control daterange-class" placeholder="From/To Date" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="form-group">
                                            <label>DEPARTURE TIME</label>
                                            <input type="text" id="flight_time" name="flight_time" class="form-control" placeholder="Local time of departure" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10"></div>
                                    <div class="col-xs-12 col-sm-2">
                                        <div class="form-group">
                                            <input type="submit" id="flight_proceed" class="form-control" value="Search Flights">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="bookTransport" class="tab-pane fade">
                            <accessoslo-home-limousine></accessoslo-home-limousine>
                        </div>
                        <div id="emptyLegs" class="tab-pane fade">
                            <form name="emptyleg_form" id="emptyleg_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="airport dropdown form-group">
                                            <label>DEPARTURE AIRPORT</label>
                                            <input class="form-control" name="emptyleg_departure" id="emptyleg_departure" type="text" data-provide="typeahead" placeholder="From Airport" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="airport dropdown form-group">
                                            <label>DESTINATION AIRPORT</label>
                                            <input class="form-control" name="emptyleg_destination" id="emptyleg_destination" type="text" data-provide="typeahead" placeholder="To Airport" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="form-group">
                                            <label>DEPARTURE DATE</label>
                                            <input type="text" id="emptyleg_date" name="emptyleg_date" class="form-control" placeholder="Date">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="form-group">
                                            <label>DEPARTURE TIME</label>
                                            <input type="text" id="emptyleg_time" name="emptyleg_time" class="form-control" placeholder="Local time of departure">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-10"></div>
                                    <div class="col-xs-12 col-sm-2">
                                        <div class="form-group">
                                            <input type="submit" id="emptyleg_search" class="form-control" value="Search Flights">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row small-sized">
                <div class="tab-content">
                    <div id="bookFlight" class="hide-content">
                        <div class="container toggle" id="executive_tab" data-toggle="collapse" data-target="#flight-panel"><span>Executive Charter</span><span class="caret" data-toggle="collapse" data-target="#flight-panel"><i class="fa fa-caret-up"></i></span></div>
                        <div class="collapse in" id="flight-panel">
                            <form name="mobile_flight_form" id="mobile_flight_form">
                                <div class="airport dropdown form-group">
                                    <label>FROM AIRPORT</label>
                                    <input class="form-control" name="mobile_flight_departure" id="mobile_flight_departure" type="text" data-provide="typeahead" placeholder="From Airport" required>
                                </div>
                                <div class="airport dropdown form-group">
                                    <label>TO AIRPORT</label>
                                    <input class="form-control" name="mobile_flight_destination" id="mobile_flight_destination" type="text" data-provide="typeahead" placeholder="To Airport" required>
                                </div>
                                <div class="form-group">
                                    <label>DEPARTURE DATE</label>
                                    <input type="text" id="mobile_flight_date" name="mobile_flight_date" class="form-control daterange-class" placeholder="From/To Date" required>
                                </div>
                                <div class="form-group">
                                    <label>DEPARTURE TIME</label>
                                    <input type="text" id="mobile_flight_time" name="mobile_flight_time" class="form-control" placeholder="Local time of departure" required>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="mobile_flight_proceed" class="form-control btn-submit" value="Search Flights">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="bookTransport" class="hide-content">
                        <div class="container toggle" id="limo_tab" data-toggle="collapse" data-target="#transport-panel"><span>Airport Limo</span><span class="caret" data-toggle="collapse" data-target="#transport-panel"><i class="fa fa-caret-up"></i></span></div>
                        <div class="collapse" id="transport-panel">
                            <accessoslo-mobile-home-limousine></accessoslo-mobile-home-limousine>
                        </div>
                    </div>
                    <div id="emptyLegs">
                        <div class="container toggle" id="empty_tab" data-toggle="collapse" data-target="#emptyleg-panel"><span>Empty Leg Flights</span><span class="caret" data-toggle="collapse" data-target="#emptyleg-panel"><i class="fa fa-caret-up"></i></span></div>
                        <div class="collapse" id="emptyleg-panel">
                            <form name="mobile_emptyleg_form" id="mobile_emptyleg_form">
                                <div class="airport dropdown form-group">
                                    <label>DEPARTURE AIRPORT</label>
                                    <input class="form-control" name="mobile_emptyleg_departure" id="mobile_emptyleg_departure" type="text" data-provide="typeahead" placeholder="From Airport" required>
                                </div>
                                <div class="airport dropdown form-group">
                                    <label>DESTINATION AIRPORT</label>
                                    <input class="form-control" name="mobile_emptyleg_destination" id="mobile_emptyleg_destination" type="text" data-provide="typeahead" placeholder="To Airport" required>
                                </div>
                                <div class="form-group">
                                    <label>DEPARTURE DATE</label>
                                    <input type="text" id="mobile_emptyleg_date" name="mobile_emptyleg_date" class="form-control" placeholder="Date">
                                </div>
                                <div class="form-group">
                                    <label>DEPARTURE TIME</label>
                                    <input type="text" id="mobile_emptyleg_time" name="mobile_emptyleg_time" class="form-control" placeholder="Local time of departure">
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="mobile_emptyleg_search" class="form-control btn-submit" value="Search Flights">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if($type == "empty")
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
                                        <accessoslo-home-emptyleg details="{{$data}}"></accessoslo-home-emptyleg>
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
    @else
    <section class="content-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 alert-box">
                    <h3>No results found for EmptyLeg Charter</h3>
                </div>
            </div>
        </div>
    </section>
    @endif
    @endif
    @if ($type == "other")
    <section class="content-box">
        <div class="container">
            <div class="row">
                <div class="body-row">
                    <div class="body-type1">
                        <div class="mobile-item item" id="airport-limo" style="background-image: url(/assets/img/home/airport-limo-small.jpg);">
                            <div class="info-box">
                                <h2>AIRPORT LIMO</h2>
                                <p>Book your next transport to and from the airport with us.</p>
                            </div>
                        </div>
                        <div class="mobile-item item" id="meet-greet" style="background-image: url(/assets/img/home/meet-and-greet-small.jpg);">
                            <div class="info-box">
                                <h2>Meet & Greet</h2>
                                <p>We provide VIP Meet & Greet services at all Norwegian airports.</p>
                            </div>
                        </div>
                    </div>
                    <div class="body-type2">
                        <div class="mobile-item item" id="destination-oslo" style="background-image: url(/assets/img/home/destination-management-small.jpg);">
                            <div class="info-box">
                                <h2>DESTINATION MANAGEMENT</h2>
                                <p>Let's take care or your entire journey from beginning to end.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-row">
                    <div class="body-type1">
                        <div class="mobile-item item" id="executive-charter" style="background-image: url(/assets/img/home/air-charter-small.jpg);">
                            <div class="info-box">
                                <h2>AIR Charter</h2>
                                <p>Book your next transport to and from the airport with us.</p>
                            </div>
                        </div>
                    </div>
                    <div class="body-type3">
                        <div class="mobile-item item" id="partners" style="background-image: url(/assets/img/home/sky-high-small.jpg);">
                            <div class="info-box">
                                <h2>Our Partners</h2>
                                <p>Book your next transport to and from the airport with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="body-row">
                    <div class="body-type4">
                        <div class="mobile-item item" id="news" style="background-image: url(/assets/img/home/latest-news-small.jpg);">
                            <div class="info-box">
                                <h2>Latest News</h2>
                                <p>Let's take care or your entire journey from beginning to end.</p>
                            </div>
                        </div>
                    </div>
                    <div class="body-type3">
                        <div class="mobile-item item" id="why-accessoslo" style="background-image: url(/assets/img/home/why-accessoslo.jpg);">
                            <div class="info-box">
                                <h2>Why AccessOslo</h2>
                                <p>Book your next transport to and from the airport with us.</p>
                            </div>
                        </div>
                        <div class="mobile-item item" id="contact" style="background-image: url(/assets/img/contact-banner.jpg);">
                            <div class="info-box">
                                <h2>Contact US</h2>
                                <p>Book your next transport to and from the airport with us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
        
    <div id="AccessModal" class="modal fade charter-modal" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="modal-header">
                    <h4 class="modal-title">Get a Charter Quote Today</h4>
                    <p>Get a free charter quote from our partners.</p>
                    <p>Fill out the form and receive your quote within one hour.</p>
                </div>
                <div class="modal-body">
                    <form id="charter_modal_form">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option disabled selected value>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Company</label>
                                    <input type="text" id="company" class="form-control" placeholder="Company">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Passengers</label>
                                    <input type="text" id="flight_passengers" name="flight_passengers" class="form-control" placeholder="Passengers" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="tel" id="charter_tel" class="form-control" placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control email" placeholder="Email" required>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <a id="confirm" class="btn btn-yellow confirm">CONFIRM</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="BookSuccessMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="step thanks text-center">
                    <h2 style="color: #c29834; font-size: 26px;">Thank you <br> for your request.</h2>
                    <p><b>Status: <span style="color: red;">Pending</span></b></p><br>
                    <p>Our partner operators is giving you the best price available and you will receive a quote shortly.</p><br>
                    <p>Our crew will get in touch with you in a short time.</p><br>
                    <a class="btn btn-border-gold" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="BookSuccessMessage_new" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="step thanks text-center">
                    <h2 style="color: #c29834; font-size: 26px;">Thank you <br> for your request.</h2>
                    <p><b>Status: <span style="color: red;">Pending</span></b></p><br>
                    <p>Our partner operators is giving you the best price available and you will receive a quote shortly.</p><br>
                    <p>Our crew will get in touch with you in a short time.</p><br>
                    <a class="btn btn-border-gold" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPzXAXjAyEIcluDJSMgRRBffUCrbNq1Bc&libraries=places"></script>
<script>
    var date = "{{$date}}";
    var departure = "{{$departure}}";
    var destination = "{{$destination}}";
    var counts = "{{$counts}}";
    var time = "{{$time}}";
    var type = "{{$type}}";
</script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script data-require="lodash.js@*" data-semver="3.5.0" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Home();});</script>
@endsection
