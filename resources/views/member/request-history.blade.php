@extends('layouts.member_public') 
@section('title', $data->meta_title)  
@section('content')
<div class="wrapper-general">
  @if($counts != 0)
  <section class="introduction">      
      <div class="container wrapper-content">
          <div class="col-xs-12">
              <div class="margin_title">
                <h1>Request history</h1>
                <p>View your Request history.</p>
              </div>
          </div>
      </div>
  </section>
  @elseif($counts == 0)
  <section class="introduction_no">
    <div class="container wrapper-content">
        <div class="col-xs-12">              
            <div class="title">
                <h1>Request history</h1>
                <p>You currently have no history of requests</p>
                <p>Make a new request today.</p>
                <a class="btn btn-yellow new_request">New Request</a>
            </div>              
        </div>
    </div>
  </section>
  @endif
  @if($counts != 0)
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                  <div class="top-box row">
                      <div class="col-xs-12 col-sm-4 result-box">
                          {{$counts}} Results Found
                      </div>
                      <div class="col-xs-12 col-sm-8">
                          <div class="options-box">
                              <div class="status">
                                  <div class="form-group">
                                      <select name="charters" id="charters" class="form-control">
                                          <option disabled selected value>Select Charter</option>
                                          <option value="executive">Executive Charter</option>
                                          <option value="group">Group Charter</option>
                                          <option value="helicopter">Helicopter Charter</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="money-box">
                                    <div class="form-group">                                       
                                        <input id="currency" type="text" name="currency" id="currency" class="form-control" style="width: 100px; height: 36px;" readonly> 
                                    </div>
                              </div>
                              <div class="display-box">
                                  <div class="item item1">
                                      <img src="/assets/img/login-portal/display-1.png" class="img-responsive" id="display1" alt="">
                                  </div>
                                  <div class="item item2">
                                      <img src="/assets/img/login-portal/display-2.png" class="img-responsive" id="display2" alt="">
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="list-items">
                      @foreach($charters as $charter)
                      @if($display_mode == "mode1")
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="item">
                                  <div class="col-xs-12 col-sm-4 slider-box">
                                      <a href="javascript:void(0)" class="arrow arrow-prev">
                                          <i class="fa fa-angle-left" aria-hidden="true"></i>
                                      </a>
                                      <img src="/assets/img/login-portal/airplane.jpg" alt="" class="img-responsive center-block">
                                      <a href="javascript:void(0)" class="arrow arrow-next">
                                          <i class="fa fa-angle-right" aria-hidden="true"></i>
                                      </a>
                                  </div>
                                  <div class="col-xs-12 col-sm-8 info-box">
                                      @if ($charter_type == "executive") 
                                      <h3>Executive Charter</h3>
                                      @elseif ($charter_type == "group") 
                                      <h3>Group Charter</h3>
                                      @elseif ($charter_type == "helicopter")
                                      <h3>Helicopter Charter</h3> 
                                      @endif
                                      <h4>{{$charter->departure}}
                                          <span>to</span> {{$charter->destination}}</h4>
                                      <ul class="list">
                                          <li>{{$charter->date}}</li>                                          
                                          <li>{{$charter->partner_name}}</li>
                                          <li>{{$charter->aircraft}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          <h5 class="cost" data-val="{{$charter->total_cost}}">€{{$charter->total_cost}}</h5>                                  
                                          <p>Booking NO: {{$charter->id}}</p>
                                      </div>
                                      <div class="box-right">                                       
                                          <a class="btn btn-purple booking_receipt" data-source="{{$charter}}">Booking Receipt</a>
                                          <a class="btn btn-yellow-light write_review" data-source="{{$charter}}">Write review</a>                                          
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @elseif($display_mode == "mode2")        
                       <div class="col-view">
                            <div class="image-box">
                                <a href="javascript:void(0)" class="arrow arrow-prev">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                </a>
                                <img src="/assets/img/login-portal/airplane.jpg" alt="" class="img-responsive center-block">
                                <a href="javascript:void(0)" class="arrow arrow-next">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                </a>
                            </div>
                            <div class="detail-box">
                                @if($charter->booking_type == "executive")
                                <h3>Executive Aircraft Charter</h3>
                                @endif
                                @if($charter->booking_type == "group")
                                <h3>Group Aircraft Charter</h3>
                                @endif
                                @if($charter->booking_type == "helicopter")
                                <h3>Helicopter Aircraft Charter</h3>
                                @endif
                                <h4>{{$charter->departure}} <span>to</span> </h4>                                    
                                <h4>{{$charter->destination}}</h4>
                                <div class="list">
                                    <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-calendar" aria-hidden="true"></i></span><span>{{$charter->date}}</span></div>                                          
                                    <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-plane" aria-hidden="true"></i></span><span>{{$charter->aircraft}}<span></div>
                                    <div><span style="padding-right:10px;color:#c29834;"><img src="/assets/img/login-portal/jet-group.png" style="width:35px;"></img></span><span>{{$charter->partner_name}}</span></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box-status">                                                                       
                                    <h5 class="cost" data-val="{{$charter->total_cost}}">€{{$charter->total_cost}}</h5>                              
                                    <p>Booking NO: {{$charter->id}}</p>
                                </div>                               
                            </div>
                             <div class="box-button">                             
                                <a class="btn btn-purple booking_receipt" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Booking Receipt</a>
                                <a class="btn btn-yellow write_review" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Write Review</a>                              
                            </div>
                        </div>   
                      @endif
                      @endforeach    
                      {{$charters->links()}}            
                  </div>                           
              </div>
          </div>
      </div>
  </section>
  @endif
  <div class="modal fade" id="bookingReceipt" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="box">
                <div class="header">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <h4>
                                <span>Booking</span>
                                <br> Receipt</h4>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="created_date"></p>
                            <span id="created_time"></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="info-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Service</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="charter_type"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>From Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="departure"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>To Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="destination"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Passengers</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="travelers"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="contact_person"></span>
                        If you have any questions regarding your booking, feel free to call us
                        <a href="">H24 +47 92 222 999</a> or send us en email at
                        <a href="">contact@accessoslo.no</a> with the booking number above.</p>
                    <img src="/assets/img/icon-hands.png" class="img-responsive center-block" alt="">
                </div>
                <div class="total-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p>
                                <b>Total amount</b>
                                <p id="invoice_no"></p></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="price"></span>
                        </div>
                    </div>
                </div>
                <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
            </div>
        </div>
    </div>
  </div>
  <div class="modal fade" id="writeReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">
                    <img src="/assets/img/close-black.png" alt="">
                </span>
            </button>
            <div class="box">  
                <h4><span>WRITE A REVIEW ABOUT YOUR FLIGHT EXPERIENCE WITH</span></h4>
                <h4 class="title"></h4>             
                <div class="form-group total-ranking">
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="">Your total review of your flight experience</label>
                            <div class="clearfix"></div>
                            <div class="ranking-box total">
                                <div class="flight_experience"></div>
                            </div>
                            <a class="clickReview">Click to review</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <label for="">Login to make a review</label>
                            <input type="text" class="form-control highlight" placeholder="Summarize your trip or highlight an interesting detail">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <label for="">Your review</label>
                            <textarea class="form-control atmosphere" placeholder="Tell others about your experience: your meal, atmosphere, service?"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <label for="">Click to select a testimonial</label>
                            <div class="list-items-rankings">
                                <div class="item">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>How would you rank this flight?</p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="ranking-box rank">
                                                <div class="testimonial"></div>
                                            </div>
                                            <a class="clickReview">Click to review</a>
                                        </div>
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <label for="">Send in your review</label>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">I confirm that this review is based on my own experience and is my sincere opinion
                                    about this flight experience that I have no personal or business affiliation with
                                    this business, and I have not been offered any incentive or payment from the Company
                                    to write this review. I understand that Access Oslo has a zero tolerance for fake
                                    reviews.
                                    <a href="">Find out more</a>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="submit-btn">
                    <input type="submit" class="btn btn-yellow-light send_review" value="Send in your review">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    var display_mode = "{{$display_mode}}";    
    var charters = "{{$charter_type}}";
</script>
<script src="/js/main.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script src="/js/vendor/jquery.star-rating-svg.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberRequestHistory();});</script>
@endsection