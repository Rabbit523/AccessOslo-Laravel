@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
  @if($counts != 0)
  <section class="introduction">
      <div class="container wrapper-content">
          <div class="col-xs-12">              
              <div class="margin_title">
                <h1>upcoming requests</h1>
                <p>View your upcoming requests.</p>
              </div>              
          </div>
      </div>
  </section>
  @elseif($counts == 0)
  <section class="introduction_no">
    <div class="container wrapper-content">
        <div class="col-xs-12">              
            <div class="title">
            <h1>upcoming requests</h1>
            <p>You currently have no upcoming requests</p>
            <p>Make a new request today.</p>
            <a class="btn btn-yellow new_request">New Request</a>
            </div>              
        </div>
    </div>
  </section>
  @endif
  
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                  <div class="top-box row">
                      <div class="col-xs-12 col-sm-3 result-box">
                          {{$counts}} Results Found
                      </div>
                      <div class="col-xs-12 col-sm-9">
                          <div class="options-box">
                              <div class="status">
                                  <div class="form-group">
                                      <select name="charters" id="charters" class="form-control">
                                          <option disabled selected value>Select Charters</option>
                                          <option value="executive">Executive Aircraft Charter</option>
                                          <option value="group">Group Aircraft Charters</option>
                                          <option value="helicopter">Helicopter Aircraft Charters</option>
                                          <option value="emptyleg">Empty Leg Aircraft Charters</option>
                                          <option value="limousine">Limousine Transport</option>
                                          <option value="handling">Handling Request</option>
                                          <option value="meet">Meet & Greet</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="status">
                                  <div class="form-group">
                                      <select name="estimations" id="estimations" class="form-control">
                                          <option disabled selected value>Estimations</option>
                                          <option value="awaiting">Awaiting Estimation</option>
                                          <option value="sent">Sent Estimation</option>
                                          <option value="paid">Paid Estimation</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="money-box">
                                    <div class="form-group">                                       
                                        <input type="text" name="currency" id="currency" class="form-control" style="width: 100px; height: 36px;" readonly> 
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
                  @if($counts != 0)
                  <div class="list-items">
                    <div class="charters">                     
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
                                      @if($charter->booking_type == "executive")
                                      <h3>Executive Aircraft Charter</h3>
                                      @endif
                                      @if($charter->booking_type == "group")
                                      <h3>Group Aircraft Charter</h3>
                                      @endif
                                      @if($charter->booking_type == "helicopter")
                                      <h3>Helicopter Aircraft Charter</h3>
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
                                          @if($charter->status == "awaiting")
                                          <h5>Awaiting Estimation</h5>                                        
                                          @elseif($charter->status == "sent" || $charter->status == "paid")
                                          <h5 class="cost" data-val="{{$charter->total_cost}}">€{{$charter->total_cost}}</h5>
                                          @endif
                                          <p>Booking NO: {{$charter->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          @if($charter->status == "awaiting")
                                          <a class="btn btn-purple view_details" data-source="{{$charter}}" data-type="{{$charter->booking_type}}" >View details</a>
                                          <a class="btn btn-red cancel_request" data-source="{{$charter}}" data-type="{{$charter->booking_type}}" >Cancel Request</a>
                                          @elseif($charter->status == "sent")
                                          <a class="btn btn-green confirm_pay" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Confirm & Pay</a>
                                          @elseif($charter->status == "paid")
                                          <a class="btn btn-purple booking_receipt" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Booking Receipt</a>
                                          <a class="btn btn-yellow write_review" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Write Review</a>
                                          @endif
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
                                    @if($charter->status == "awaiting")
                                    <h5>Awaiting Estimation</h5>                                        
                                    @elseif($charter->status == "sent" || $charter->status == "paid")
                                    <h5 class="cost" data-val="{{$charter->total_cost}}">€{{$charter->total_cost}}</h5>
                                    @endif
                                    <p>Booking NO: {{$charter->id}}</p>
                                </div>                               
                            </div>
                             <div class="box-button">
                                @if($charter->status == "awaiting")
                                <a class="btn btn-purple view_details" data-source="{{$charter}}" data-type="{{$charter->booking_type}}" >View details</a>
                                <a class="btn btn-red cancel_request" data-source="{{$charter}}" data-type="{{$charter->booking_type}}" >Cancel Request</a>
                                @elseif($charter->status == "sent")
                                <a class="btn btn-green confirm_pay" data-source="{{$charter}}" data-type="{{$charter->booking_type}}" style="margin-top:55px;">Confirm & Pay</a>
                                @elseif($charter->status == "paid")
                                <a class="btn btn-purple booking_receipt" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Booking Receipt</a>
                                <a class="btn btn-yellow write_review" data-source="{{$charter}}" data-type="{{$charter->booking_type}}">Write Review</a>
                                @endif
                            </div>
                        </div>                         
                      @endif
                      @endforeach     
                      {{$charters->links()}}
                    </div>
                    <div class="handlings">                     
                      @foreach($handlings as $handling)
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
                                      <h3>Handling Request</h3>                                
                                      <h4>{{$handling->airport}}</h4>
                                      <ul class="list">
                                          <li>25th April 2018</li>
                                          <li>10:45 P.M.</li>
                                          <li>{{$handling->partner_name}}</li>
                                          <li>{{$handling->aircraft}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          @if($handling->status == "awaiting")
                                          <h5>Awaiting Estimation</h5>                                        
                                          @elseif($handling->status == "sent" || $handling->status == "paid")
                                          <h5 class="cost" data-val="{{$handling->total_cost}}">€{{$handling->total_cost}}</h5>
                                          @endif
                                          <p>Booking NO: {{$handling->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          @if($handling->status == "awaiting")
                                          <a class="btn btn-purple handling_view" data-source="{{$handling}}" data-type="handling">View details</a>
                                          <a class="btn btn-red cancel_request" data-source="{{$handling}}" data-type="handling">Cancel Request</a>
                                          @elseif($handling->status == "sent")
                                          <a class="btn btn-green confirm_pay" data-source="{{$handling}}" data-type="handling">Confirm & Pay</a>
                                          @elseif($handling->status == "paid")
                                          <a class="btn btn-purple handling_view" data-source="{{$handling}}" data-type="handling">Booking Receipt</a>
                                          <a class="btn btn-yellow write_review" data-source="{{$handling}}" data-type="handling">Write Review</a>
                                          @endif
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
                            <h3>Handling Request</h3>                                
                            <h4>{{$handling->airport}}</h4>
                            <div class="list">
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-calendar" aria-hidden="true"></i></span><span>25th April 2018</span></div>                                          
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-plane" aria-hidden="true"></i></span><span>{{$handling->aircraft}}<span></div>
                                <div><span style="padding-right:10px;color:#c29834;"><img src="/assets/img/login-portal/jet-group.png" style="width:35px;"></img></span><span>{{$handling->partner_name}}</span></div>
                            </div>                         
                            <div class="clearfix"></div>
                            <div class="box-status">
                                @if($handling->status == "awaiting")
                                <h5>Awaiting Estimation</h5>                                        
                                @elseif($handling->status == "sent" || $handling->status == "paid")
                                <h5 class="cost" data-val="{{$handling->total_cost}}">€{{$handling->total_cost}}</h5>
                                @endif
                                <p>Booking NO: {{$handling->id}}</p>
                            </div>                            
                          </div>
                          <div class="box-button">
                            @if($handling->status == "awaiting")
                            <a class="btn btn-purple handling_view" data-source="{{$handling}}" data-type="handling">View details</a>
                            <a class="btn btn-red cancel_request" data-source="{{$handling}}" data-type="handling">Cancel Request</a>
                            @elseif($handling->status == "sent")
                            <a class="btn btn-green confirm_pay" data-source="{{$handling}}" data-type="handling">Confirm & Pay</a>
                            @elseif($handling->status == "paid")
                            <a class="btn btn-purple handling_view" data-source="{{$handling}}" data-type="handling">Booking Receipt</a>
                            <a class="btn btn-yellow write_review" data-source="{{$handling}}" data-type="handling">Write Review</a>
                            @endif
                          </div>
                      </div>
                      @endif               
                      @endforeach  
                      {{$handlings->links()}}  
                    </div>
                    <div class="limousines">
                      @foreach($limousines as $limousine)
                      @if($display_mode == "mode1")
                      <div class="row limousines">
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
                                      <h3>Limousine Transport</h3>                                
                                      <h4>{{$limousine->from_address}} to {{$limousine->to_address}}</h4>
                                      <ul class="list">
                                          <li>{{$limousine->date}}</li>
                                          <li>10:45 P.M.</li>
                                          <li>{{$limousine->partner_name}}</li>
                                          <li>{{$limousine->aircraft}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          @if($limousine->status == "awaiting")
                                          <h5>Awaiting Estimation</h5>                                        
                                          @elseif($limousine->status == "sent" || $limousine->status == "paid")
                                          <h5 class="cost" data-val="{{$limousine->total_cost}}">€{{$limousine->total_cost}}</h5>
                                          @endif
                                          <p>Booking NO: {{$limousine->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          @if($limousine->status == "awaiting")
                                          <a class="btn btn-purple limousine_view" data-source="{{$limousine}}" data-type="limousine">View details</a>
                                          <a class="btn btn-red cancel_request" data-source="{{$limousine}}" data-type="limousine">Cancel Request</a>
                                          @elseif($limousine->status == "sent")
                                          <a class="btn btn-green confirm_pay" data-source="{{$limousine}}" data-type="limousine">Confirm & Pay</a>
                                          @elseif($limousine->status == "paid")
                                          <a class="btn btn-purple limousine_view" data-source="{{$limousine}}" data-type="limousine">Booking Receipt</a>
                                          <a class="btn btn-yellow write_review" data-source="{{$limousine}}" data-type="limousine">Write Review</a>
                                          @endif
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
                            <h3>Limousine Transport</h3>                                
                            <h4>{{$limousine->from_address}} to {{$limousine->to_address}}</h4>
                            <div class="list">
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-calendar" aria-hidden="true"></i></span><span>{{$limousine->date}}</span></div>                                          
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-plane" aria-hidden="true"></i></span><span>{{$limousine->aircraft}}<span></div>
                                <div><span style="padding-right:10px;color:#c29834;"><img src="/assets/img/login-portal/jet-group.png" style="width:35px;"></img></span><span>{{$limousine->partner_name}}</span></div>
                            </div>                                 
                            <div class="clearfix"></div>
                            <div class="box-status">
                                @if($limousine->status == "awaiting")
                                <h5>Awaiting Estimation</h5>                                        
                                @elseif($limousine->status == "sent" || $limousine->status == "paid")
                                <h5 class="cost" data-val="{{$limousine->total_cost}}">€{{$limousine->total_cost}}</h5>
                                @endif
                                <p>Booking NO: {{$limousine->id}}</p>
                            </div>
                          </div>
                          <div class="box-button">
                            @if($limousine->status == "awaiting")
                            <a class="btn btn-purple limousine_view" data-source="{{$limousine}}" data-type="limousine">View details</a>
                            <a class="btn btn-red cancel_request" data-source="{{$limousine}}" data-type="limousine">Cancel Request</a>
                            @elseif($limousine->status == "sent")
                            <a class="btn btn-green confirm_pay" data-source="{{$limousine}}" data-type="limousine">Confirm & Pay</a>
                            @elseif($limousine->status == "paid")
                            <a class="btn btn-purple limousine_view" data-source="{{$limousine}}" data-type="limousine">Booking Receipt</a>
                            <a class="btn btn-yellow write_review" data-source="{{$limousine}}" data-type="limousine">Write Review</a>
                            @endif
                          </div>
                      </div>
                      @endif                       
                      @endforeach       
                      {{$limousines->links()}}     
                    </div>
                    <div class="meets">
                      @foreach($meets as $meet)
                      @if($display_mode == "mode1")
                      <div class="row meets">
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
                                      <h3>Meet & Greet - Option Product</h3>                                
                                      <h4>{{$meet->meet_service}}</h4>
                                      <ul class="list">
                                          <li>{{$meet->date}}</li>
                                          <li>{{$meet->time}}</li>
                                          <li>{{$meet->airline}}</li>
                                          <li>{{$meet->aircraft}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          @if($meet->status == "awaiting")
                                          <h5>Awaiting Estimation</h5>                                        
                                          @elseif($meet->status == "sent" || $meet->status == "paid")
                                          <h5 class="cost" data-val="{{$meet->total_cost}}">€{{$meet->total_cost}}</h5>
                                          @endif
                                          <p>Booking NO: {{$meet->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          @if($meet->status == "awaiting")
                                          <a class="btn btn-purple meet_view" data-source="{{$meet}}" data-type="meet">View details</a>
                                          <a class="btn btn-red cancel_request" data-source="{{$meet}}" data-type="meet">Cancel Request</a>
                                          @elseif($meet->status == "sent")
                                          <a class="btn btn-green confirm_pay" data-source="{{$meet}}" data-type="meet">Confirm & Pay</a>
                                          @elseif($meet->status == "paid")
                                          <a class="btn btn-purple meet_view" data-source="{{$meet}}" data-type="meet">Booking Receipt</a>
                                          <a class="btn btn-yellow write_review" data-source="{{$meet}}" data-type="meet">Write Review</a>
                                          @endif
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
                            <h3>Meet & Greet - Option Product</h3>                                
                            <h4>{{$meet->meet_service}}</h4>
                            <div class="list">
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-calendar" aria-hidden="true"></i></span><span>{{$meet->date}}</span></div>                                          
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-clock-o" aria-hidden="true"></i></span><span>{{$meet->time}}<span></div>
                                <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-plane" aria-hidden="true"></i></span><span>{{$meet->aircraft}}<span></div>
                                <div><span style="padding-right:10px;color:#c29834;"><img src="/assets/img/login-portal/jet-group.png" style="width:35px;"></img></span><span>{{$meet->airline}}</span></div>
                            </div>    
                            <div class="clearfix"></div>
                            <div class="box-status">
                                @if($meet->status == "awaiting")
                                <h5>Awaiting Estimation</h5>                                        
                                @elseif($meet->status == "sent" || $meet->status == "paid")
                                <h5 class="cost" data-val="{{$meet->total_cost}}">€{{$meet->total_cost}}</h5>
                                @endif
                                <p>Booking NO: {{$meet->id}}</p>
                            </div>
                        </div>
                        <div class="box-button">
                            @if($meet->status == "awaiting")
                            <a class="btn btn-purple meet_view" data-source="{{$meet}}" data-type="meet">View details</a>
                            <a class="btn btn-red cancel_request" data-source="{{$meet}}" data-type="meet">Cancel Request</a>
                            @elseif($meet->status == "sent")
                            <a class="btn btn-green confirm_pay" data-source="{{$meet}}" data-type="meet">Confirm & Pay</a>
                            @elseif($meet->status == "paid")
                            <a class="btn btn-purple meet_view" data-source="{{$meet}}" data-type="meet">Booking Receipt</a>
                            <a class="btn btn-yellow write_review" data-source="{{$meet}}" data-type="meet">Write Review</a>
                            @endif
                        </div>
                      </div>                  
                      @endif   
                      @endforeach       
                      {{$meets->links()}} 
                    </div>  
                    <div class="emptylegs">
                        @foreach($emptylegs as $emptyleg)
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
                                        <h3>Emptyleg Aircraft Charter</h3>                                   
                                        <h4>{{$emptyleg->departure}}
                                            <span>to</span> {{$emptyleg->destination}}</h4>
                                        <ul class="list">
                                            <li>{{$emptyleg->end_date}}</li>                                          
                                            <li>{{$emptyleg->end_time}}</li>                                          
                                            <li>{{$emptyleg->partner_name}}</li>
                                            <li>{{$emptyleg->aircraft}}</li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <div class="box-left">                         
                                            @if($emptyleg->currency == "EUR")                                                 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="0">€{{$emptyleg->price}}</h5>                                       
                                            @elseif($emptyleg->currency == "USD")
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="1">${{$emptyleg->price}}</h5> 
                                            @elseif($emptyleg->currency == "CAD")
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="2">${{$emptyleg->price}}</h5> 
                                            @elseif($emptyleg->currency == "AUD") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="3">${{$emptyleg->price}}</h5> 
                                            @elseif($emptyleg->currency == "CNY")
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="4">¥{{$emptyleg->price}}</h5> 
                                            @elseif($emptyleg->currency == "JPY") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="5">¥{{$emptyleg->price}}</h5> 
                                            @elseif($emptyleg->currency == "DKK")
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="6">kr{{$emptyleg->price}}</h5>
                                            @elseif($emptyleg->currency == "NOK") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="7">kr{{$emptyleg->price}}</h5>
                                            @elseif($emptyleg->currency == "GBP") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="8">£{{$emptyleg->price}}</h5>  
                                            @endif
                                            <p>Booking NO: {{$emptyleg->id}}</p>
                                        </div>
                                        <div class="box-right">
                                            @if($emptyleg->status == "awaiting")
                                            <a class="btn btn-green confirm_pay" data-source="{{$emptyleg}}" data-type="empty">Confirm & Pay</a>                                                                                
                                            @elseif($emptyleg->status == "sent")
                                            <a class="btn btn-purple empty_view" data-source="{{$emptyleg}}" data-type="empty">View details</a>
                                            @elseif($emptyleg->status == "paid")
                                            <a class="btn btn-purple empty_view" data-source="{{$emptyleg}}" data-type="empty">Booking Receipt</a>
                                            <a class="btn btn-yellow write_review" data-source="{{$emptyleg}}" data-type="empty">Write Review</a>
                                            @endif
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
                                <h3>Emptyleg Aircraft Charter</h3>                        
                                <h4>{{$emptyleg->departure}} <span>to</span> </h4>                                    
                                <h4>{{$emptyleg->destination}}</h4>
                                <div class="list">
                                    <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-calendar" aria-hidden="true"></i></span><span>{{$emptyleg->end_date}}</span></div> 
                                    <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-clock-o" aria-hidden="true"></i></span><span>{{$emptyleg->end_time}}</span></div>                                          
                                    <div><span style="padding-right:10px;color: #c29834;"><i class="fa fa-plane" aria-hidden="true"></i></span><span>{{$emptyleg->aircraft}}<span></div>
                                    <div><span style="padding-right:10px;color:#c29834;"><img src="/assets/img/login-portal/jet-group.png" style="width:35px;"></img></span><span>{{$emptyleg->partner_name}}</span></div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="box-status">
                                    @if($emptyleg->currency == "EUR")                                                 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="0">€{{$emptyleg->price}}</h5>                                       
                                    @elseif($emptyleg->currency == "USD")
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="1">${{$emptyleg->price}}</h5> 
                                    @elseif($emptyleg->currency == "CAD")
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="2">${{$emptyleg->price}}</h5> 
                                    @elseif($emptyleg->currency == "AUD") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="3">${{$emptyleg->price}}</h5> 
                                    @elseif($emptyleg->currency == "CNY")
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="4">¥{{$emptyleg->price}}</h5> 
                                    @elseif($emptyleg->currency == "JPY") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="5">¥{{$emptyleg->price}}</h5> 
                                    @elseif($emptyleg->currency == "DKK")
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="6">kr{{$emptyleg->price}}</h5>
                                    @elseif($emptyleg->currency == "NOK") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="7">kr{{$emptyleg->price}}</h5>
                                    @elseif($emptyleg->currency == "GBP") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="8">£{{$emptyleg->price}}</h5>  
                                    @endif
                                    <p>Booking NO: {{$emptyleg->id}}</p>
                                </div>                                                 
                                <div class="box-button">
                                @if($emptyleg->status == "awaiting")
                                <a class="btn btn-green confirm_pay" data-source="{{$emptyleg}}" data-type="empty">Confirm & Pay</a>                                                                                
                                @elseif($emptyleg->status == "sent")
                                <a class="btn btn-purple empty_view" data-source="{{$emptyleg}}" data-type="empty">View details</a>
                                @elseif($emptyleg->status == "paid")
                                <a class="btn btn-purple empty_view" data-source="{{$emptyleg}}" data-type="empty">Booking Receipt</a>
                                <a class="btn btn-yellow write_review" data-source="{{$emptyleg}}" data-type="empty">Write Review</a>
                                @endif                          
                                </div>
                            </div>
                        </div>                         
                        @endif
                        @endforeach       
                        {{$emptylegs->links()}}     
                    </div>          
                  </div>  
                  @endif              
              </div>
          </div>
      </div>
  </section>
</div>

<!-- Cancel request -->
<div class="modal fade" id="cancelRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                  <img src="/assets/img/close-black.png" alt="">
              </span>
          </button>
          <img src="/assets/img/bg/modal/cancel-request.png" class="img-responsive center-block main-img" alt="">
          <div class="box">
              <h4>ARE YOU SURE YOU WANT TO CANCEL?</h4>

              <div class="wrapper-btns text-center">
                  <a class="btn btn-red cancel" data-toggle="modal">Cancel Request</a>
                  <a class="btn btn-purple back" data-dismiss="modal">No, go back</a>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- Write a review -->
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
<!-- View Details -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">        
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4><span id="title1"></span><br></h4>
                          <h4 id="title2"></h4>
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
                                #002043NO</p>
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
<!-- Confirm & Pay -->
<div class="modal fade" id="confirmRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">
            <form id="flight_form" method="POST" action="{{ URL::to('services/paypal') }}">                        
              {{ csrf_field() }}
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4>CONFIRM<br>
                          CONFIRMATION</h4>                          
                      </div>
                      <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_created_date"></p>
                            <span id="confirm_created_time"></span>
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
                            <p id="confirm_charter_type"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b id="confirm_from">From Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_departure"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b id="confirm_to">To Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_destination"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b id="last_tag">Passengers</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="confirm_travelers"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="confirm_contact_person"></span>
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
                                #002043NO</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="confirm_price"></span>
                        </div>
                        <input id="item" type="hidden" name="item">
                        <input id="item_number" type="hidden" name="item_number">
                        <input id="amount" type="hidden" name="amount">                        
                        <input id="type" type="hidden" name="type">
                    </div>
                </div>
              <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
              <div class="paypal_div">
                <button class="btn btn-green paypal">Confirm & Pay</a>
              </div>
            </form>
          </div>
      </div>
  </div>
</div>
<!--Handling View Details -->
<div class="modal fade" id="HandlingViewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4><span id="handling_title1"></span><br></h4>
                          <h4 id="handling_title2"></h4>
                      </div>
                      <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_created_date"></p>
                            <span id="handling_created_time"></span>
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
                            <p>Handling Request</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_travel_date"></p>
                        </div>
                    </div>      
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_airport"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Partner Name</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_parnter_name"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Aircraft</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="handling_aircraft"></p>
                        </div>
                    </div>                                  
                </div>
                <div class="user-info">
                    <p>
                        <span id="handling_contact_person"></span>
                        If you have any questions regarding your booking, feel free to call us
                        <a href="">H24 +47 92 222 999</a> or send us en email at
                        <a href="">contact@accessoslo.no</a> with the booking number above.</p>
                    <img src="/assets/img/icon-hands.png" class="img-responsive center-block" alt="">
                </div>
                <div class="total-box"  >
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p>
                                <b>Total amount</b>
                                #002043NO</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="handling_price"></span>
                        </div>
                    </div>
                </div>
              <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
          </div>
      </div>
  </div>
</div>

<!--Limousine View Details -->
<div class="modal fade" id="LimousineViewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4><span id="limousine_title1"></span><br></h4>
                          <h4 id="limousine_title2"></h4>
                      </div>
                      <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_created_date"></p>
                            <span id="limousine_created_time"></span>
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
                            <p>Limousine Transport</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>From Address</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_from_address"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>To Address</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_to_address"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Type of Car</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_type_car"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="limousine_contact_person"></span>
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
                                #002043NO</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="limousine_price"></span>
                        </div>
                    </div>
                </div>
              <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
          </div>
      </div>
  </div>
</div>

<!--Meet View Details -->
<div class="modal fade" id="MeetViewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4><span id="meet_title1"></span><br></h4>
                          <h4 id="meet_title2"></h4>
                      </div>
                      <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_created_date"></p>
                            <span id="meet_created_time"></span>
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
                            <p>Meet & Greet</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Time</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_travel_time"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Flight number</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_flight_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Luggage</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_luggage"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travelers</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_travelers"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="meet_contact_person"></span>
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
                                #002043NO</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="meet_price"></span>
                        </div>
                    </div>
                </div>
              <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
          </div>
      </div>
  </div>
</div>

<!--Emptyleg View Details -->
<div class="modal fade" id="EmptylegViewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="box">
              <div class="header">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 text-left">
                          <h4><span id="empty_title1"></span><br></h4>
                          <h4 id="empty_title2"></h4>
                      </div>
                      <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_created_date"></p>
                            <span id="empty_created_time"></span>
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
                            <p>Emptyleg Charter</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Booking No</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_booking_no"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travel Time</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_travel_time"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>From Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_from_airport"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>To Airport</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_to_airport"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Aircraft</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="empty_aircraft"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="empty_contact_person"></span>
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
                                #002043NO</p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="empty_price"></span>
                        </div>
                    </div>
                </div>
              <img src="/assets/img/logo.jpg" class="img-responsive center-block" alt="" class="logo-modal">
          </div>
      </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    var type = "{{$types}}";
    var count = "{{$counts}}";
    var display_mode = "{{$display_mode}}";
</script>
<script src="/js/main.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script src="/js/vendor/jquery.star-rating-svg.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberUpcomingRequest();});</script>
@endsection

