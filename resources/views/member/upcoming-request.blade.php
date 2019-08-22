@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">    
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
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                  <div class="top-box row">
                      <div class="col-xs-12 col-sm-3 result-box">
                          @if($counts > 1)
                          <label>{{$counts}} Results Found</label>
                          <button class="btn filter-btn"><span class="filter-btn-title">Filter</span><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sliders-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-sliders-v fa-w-14 fa-lg"><path fill="currentColor" d="M160 168v-48c0-13.3-10.7-24-24-24H96V8c0-4.4-3.6-8-8-8H72c-4.4 0-8 3.6-8 8v88H24c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v312c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V192h40c13.3 0 24-10.7 24-24zm-32-8H32v-32h96v32zm152 160h-40V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v312h-40c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v88c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-88h40c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm-8 64h-96v-32h96v32zm152-224h-40V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v152h-40c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v248c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V256h40c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm-8 64h-96v-32h96v32z" class=""></path></svg></button>
                          @else
                          <label>{{$counts}} Result Found</label>
                          <button class="btn filter-btn"><span class="filter-btn-title">Filter</span><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="sliders-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-sliders-v fa-w-14 fa-lg"><path fill="currentColor" d="M160 168v-48c0-13.3-10.7-24-24-24H96V8c0-4.4-3.6-8-8-8H72c-4.4 0-8 3.6-8 8v88H24c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v312c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V192h40c13.3 0 24-10.7 24-24zm-32-8H32v-32h96v32zm152 160h-40V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v312h-40c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v88c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8v-88h40c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm-8 64h-96v-32h96v32zm152-224h-40V8c0-4.4-3.6-8-8-8h-16c-4.4 0-8 3.6-8 8v152h-40c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h40v248c0 4.4 3.6 8 8 8h16c4.4 0 8-3.6 8-8V256h40c13.3 0 24-10.7 24-24v-48c0-13.3-10.7-24-24-24zm-8 64h-96v-32h96v32z" class=""></path></svg></button>
                          @endif
                      </div>
                      <div class="col-xs-12 col-sm-9">
                          <div class="options-box">
                              <!-- select booking request type -->
                              <div class="status">
                                  <div class="form-group">
                                      <label>Type of Request</label>
                                      <select name="charters" id="charters" class="form-control">
                                          <option disabled selected value>--- Select ---</option>
                                          <option @if($types == "charters") {{ 'selected' }} @endif value="charters">Show all requests</option>
                                          <option @if($types == "executive") {{ 'selected' }} @endif value="executive">Executive Charter</option>
                                          <option @if($types == "emptyleg") {{ 'selected' }} @endif value="emptyleg">Empty Leg Flights</option>
                                          <option @if($types == "limousine") {{ 'selected' }} @endif value="limousine">Airport Limo</option>                                          
                                          <option @if($types == "meet") {{ 'selected' }} @endif value="meet">Meet & Greet</option>
                                      </select>
                                  </div>
                              </div>
                              <!-- select estimation  -->
                              <div class="status">
                                  <div class="form-group">
                                        <label>Status</label>
                                        <select name="estimations" id="estimations" class="form-control">
                                            <option disabled selected value>--- Select ---</option>
                                            <option @if($status == "all-status") {{ 'selected' }} @endif value="all-status">Upcoming Requests</option>
                                            <option @if($status == "awaiting") {{ 'selected' }} @endif value="awaiting">Awaiting Estimation</option>
                                            <option @if($status == "sent") {{ 'selected' }} @endif value="sent">Estimation Received</option>
                                            <option @if($status == "paid") {{ 'selected' }} @endif value="paid">Request History</option>
                                        </select>
                                  </div>
                              </div>
                              <!-- change the currency  -->
                              <div class="money-box">
                                    <div class="form-group">
                                        <label>currency</label>
                                        <input type="text" name="currency" id="currency" class="form-control" style="width: 100px; height: 36px;" readonly> 
                                    </div>
                              </div>
                              <!-- display mode - there are horizontal mode and vertical mode -->
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
                  @if($counts == 0)                    
                  <div class="row">                    
                        <div class="col-xs-12 col-sm-12 alert-box">
                            <h3 class="no_results_alert"></h3>
                        </div>                        
                  </div>
                  <!-- check if there is any bookings of current user -->
                  @elseif($counts != 0)
                  <div class="list-items">
                    <!-- show executive, helicopter, group, cargo charter request lists -->
                    <div class="charters">
                        @foreach($charters as $key=>$value)
                            @if($value->status == 'paid')
                                <?php $img_arr = [];?>
                                @foreach($images as $image)
                                    @foreach($aircrafts as $sel)
                                        @if($value->aircraft == $sel->type && $image->parent_id == $sel->id)
                                        <?php array_push($img_arr, $image->url);?>
                                        @endif
                                    @endforeach
                                @endforeach
                                <?php $c_arr = count($img_arr);?>
                                @if($display_mode == "mode1")
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="col-xs-12 col-sm-4 slider-box">                                      
                                                    <div class="slide" id="slide000{{$key}}">
                                                        <ul>
                                                            @if($c_arr != 0)
                                                            @foreach($img_arr as $image)
                                                            <li data-bg="{{$image}}" style="width: 314px; height: 205px;"></li>
                                                            @endforeach
                                                            @else
                                                            <li data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 205px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 info-box">
                                                    <div class="info-title">
                                                        <h3>Executive Aircraft Charter</h3>
                                                    </div>                                      
                                                    <div class="departure-locations">
                                                        <div class="desktop">
                                                            <h4>{{$value->departure}}
                                                                <span>to</span> {{$value->destination}}
                                                            </h4>
                                                        </div>
                                                        <div class="mobile">
                                                            <hr>
                                                            <h4>{{$value->departure}}</h4>
                                                            <div class="link">to</div> 
                                                            <h4>{{$value->destination}}</h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <ul class="list">
                                                        <li><span>Departure Date: </span>{{$value->date}}</li>
                                                        <li><span>Local time of departure: </span>{{$value->time}}</li>
                                                        <li><span>Travelers: </span>{{$value->travellers}}</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div class="box-left">
                                                        <h5 class="cost" data-val="{{$value->total_cost}}">€{{$value->total_cost}}</h5>
                                                        <p>VAT exculded. Booking NO: {{$value->id}}</p>
                                                    </div>
                                                    <div class="box-right">
                                                        <a class="btn btn-yellow booking_receipt" data-source="{{$value}}" data-type="{{$value->booking_type}}">Receipt</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($display_mode == "mode2")
                                    <div class="col-view">
                                        <div class="image-box">
                                            <div class="slide" id="slide001{{$key}}">
                                                <ul>
                                                    @if($c_arr != 0)
                                                    @foreach($img_arr as $image)
                                                    <li data-bg="{{$image}}" style="width: 301px; height: 206px;"></li>
                                                    @endforeach
                                                    @else
                                                    <li data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="detail-box">
                                            <h3>Executive Aircraft Charter</h3>
                                            <h4>{{$value->departure}} <span>to</span> </h4>                                    
                                            <h4>{{$value->destination}}</h4>                                
                                            <div class="list">                                
                                                <div><span>Departure Date: </span>{{$value->date}}</div>
                                                <div><span>Local time of departure: </span>{{$value->time}}</div>
                                                <div><span>Travelers: </span>{{$value->travellers}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="box-status">
                                                <h5 class="cost" data-val="{{$value->total_cost}}">€{{$value->total_cost}}</h5>
                                                <p>VAT excluded. Booking NO: {{$value->id}}</p>
                                            </div>
                                            <div class="box-button">
                                                <div class="pay_form"><a class="btn btn-yellow booking_receipt" data-source="{{$value}}" data-type="{{$value->booking_type}}">Receipt</a></div>
                                            </div>
                                        </div>                            
                                    </div>
                                @endif
                            @elseif($value->status == 'sent')
                                <?php $executive_sent_imgs=array(); $selected_estimation = array();?>
                                @foreach ($estimations as $estimate)
                                    @if($estimate->charter_id == $value->id && $estimate->status == "sent")
                                        <?php array_push($selected_estimation, $estimate); ?>
                                        @foreach($aircrafts as $sel)
                                            @foreach($images as $image)
                                                @if($estimate->aircraft == $sel->type && $image->parent_id == $sel->id)
                                                    <?php 
                                                        if(!array_key_exists($estimate->aircraft, $executive_sent_imgs) ){
                                                            $executive_sent_imgs[$estimate->aircraft] = [];
                                                        }
                                                        array_push($executive_sent_imgs[$estimate->aircraft], $image->url);
                                                    ?>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                @endforeach
                                <?php $selected_estimation = json_encode($selected_estimation);?>
                                @if($display_mode == "mode1")
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="col-xs-12 col-sm-4 slider-box">                                      
                                                    <div data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 205px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 info-box">
                                                    <div class="info-title">
                                                        <h3>Executive Aircraft Charter</h3>                                                    
                                                        <a class="cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" ><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-lg"><path fill="currentColor" d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z" class=""></path></svg></a>
                                                    </div>
                                                    <div class="departure-locations">
                                                        <div class="desktop">
                                                            <h4>{{$value->departure}}
                                                                <span>to</span> {{$value->destination}}
                                                            </h4>
                                                        </div>
                                                        <div class="mobile">
                                                            <hr>
                                                            <h4>{{$value->departure}}</h4>
                                                            <div class="link">to</div> 
                                                            <h4>{{$value->destination}}</h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <ul class="list">
                                                        <li><span>Departure Date: </span>{{$value->date}}</li>
                                                        <li><span>Local time of departure: </span>{{$value->time}}</li>
                                                        <li><span>Travelers: </span>{{$value->travellers}}</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div class="box-left">
                                                        <h5 data-val="{{$value->total_estimations}}">Recevied Estimations: {{$value->total_estimations}}</h5>
                                                        <p>Booking NO: {{$value->id}}</p>
                                                    </div>
                                                    <div class="box-right">
                                                        <a class="btn btn-yellow view_estimations" data-toggle="collapse" data-target="#info-estimation{{$value->id}}" data-type="{{$value->booking_type}}" data-estimations="{{$selected_estimation}}">View Estimations<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="caret-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="svg-inline--fa fa-caret-up fa-w-10 fa-lg"><path fill="currentColor" d="M288.662 352H31.338c-17.818 0-26.741-21.543-14.142-34.142l128.662-128.662c7.81-7.81 20.474-7.81 28.284 0l128.662 128.662c12.6 12.599 3.676 34.142-14.142 34.142z" class=""></path></svg></a>
                                                    </div>
                                                    <div class="mobile-flight-detail">
                                                        <div class="container toggle" data-toggle="collapse" data-target=".panel{{$value->id}}"><span>View Details</span><span class="caret" data-toggle="collapse" data-target=".panel{{$value->id}}"><i class="fa fa-caret-up"></i></span></div>
                                                        <div class="collapse in panel{{$value->id}}" id="panel">
                                                        <div><span class="panel-title">Departure Date: </span><span class="panel-data">{{$value->date}}</span></div>
                                                        <div><span class="panel-title">Local time of departure: </span><span class="panel-data">{{$value->time}}</span></div>
                                                        <div><span class="panel-title">Travelers: </span><span class="panel-data">{{$value->travellers}}</span></div>
                                                        <button class="cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" >CANCEL</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse" id="info-estimation{{$value->id}}">
                                        @foreach ($estimations as $estimate)
                                        @if($estimate->charter_id == $value->id && $estimate->status == "sent")
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="item">
                                                    <div class="col-xs-12 col-sm-4 slider-box">
                                                        <div class="slide" id="estimate_slide{{$value->id}}{{$estimate->id}}">
                                                            <ul>
                                                                @foreach($executive_sent_imgs[$estimate->aircraft] as $image)
                                                                <li data-bg="{{$image}}" style="width: 314px; height: 205px;"></li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-8 info-box">
                                                        <div class="info-title">
                                                            <h3>{{$estimate->partner_name}}</h3>
                                                        </div>
                                                        <div class="departure-locations">
                                                            <div class="desktop">
                                                                <h4>{{$value->departure}}
                                                                    <span>to</span> {{$value->destination}}
                                                                </h4>
                                                            </div>
                                                            <div class="mobile">
                                                                <hr>
                                                                <h4>{{$value->departure}}</h4>
                                                                <div class="link">to</div> 
                                                                <h4>{{$value->destination}}</h4>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                        <ul class="list">
                                                            <li><span>Aircraft Type: </span>{{$estimate->aircraft}}</li>
                                                            <li><span>Max Capacity: </span>{{$estimate->capacity}}</li>
                                                        </ul>
                                                        <div class="clearfix"></div>
                                                        <div class="box-left">
                                                            <h5 class="cost" data-val="{{$estimate->total_cost}}">€{{$estimate->total_cost}}</h5>
                                                            <p>VAT excluded.</p>
                                                        </div>
                                                        <div class="box-right">
                                                            <a class="btn btn-yellow charter_data" data-estimate="{{$estimate}}" data-source="{{$value}}">Review & Book</a>
                                                            <accessoslo-member-modal></accessoslo-member-modal>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                @elseif($display_mode == "mode2")
                                    <div class="col-view">
                                        <div class="image-box">
                                            <div class="slide" id="slide001{{$key}}">
                                                <ul>
                                                    @if($c_arr != 0)
                                                    @foreach($img_arr as $image)
                                                    <li data-bg="{{$image}}" style="width: 301px; height: 206px;"></li>
                                                    @endforeach
                                                    @else
                                                    <li data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="detail-box">
                                            <h3>Executive Aircraft Charter</h3>
                                            <h4>{{$value->departure}} <span>to</span> </h4>                                    
                                            <h4>{{$value->destination}}</h4>                                
                                            <div class="list">                                
                                                <div><span>Departure Date: </span>{{$value->date}}</div>
                                                <div><span>Local time of departure: </span>{{$value->time}}</div>
                                                <div><span>Travelers: </span>{{$value->travellers}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="box-status">
                                                <h5 class="cost" data-val="{{$value->total_cost}}">€{{$value->total_cost}}.</h5>
                                                <p>VAT excluded. Booking NO: {{$value->id}}</p>
                                            </div>
                                            <div class="box-button">
                                                <div class="pay_group">
                                                    <div class="pay_form">
                                                        <a class="btn btn-red cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" >Cancel</a>
                                                    </div>
                                                    <div class="pay_form">
                                                        <form method="POST" action="/services/paypal">
                                                            {{ csrf_field() }}
                                                            @if($value->booking_type == "executive")
                                                            <input value="Executive Charter" type="hidden" name="item">
                                                            @endif
                                                            @if($value->booking_type == "group")
                                                            <input value="Group Charter" type="hidden" name="item">
                                                            @endif
                                                            @if($value->booking_type == "helicopter")
                                                            <input value="Helicopter Charter" type="hidden" name="item">
                                                            @endif
                                                            <input value="{{$value->id}}" type="hidden" name="item_number">
                                                            <input value="{{$value->total_cost}}" type="hidden" name="amount">
                                                            <input value="{{$value->booking_type}}" type="hidden" name="type">
                                                            <button type="submit" class="btn btn-green confirm_pay">Confirm & Pay</button>
                                                        </form>
                                                    </div>                                        
                                                </div>
                                            </div>
                                        </div>                            
                                    </div>
                                @endif
                            @elseif($value->status == 'awaiting')
                                @if($display_mode == "mode1")
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="col-xs-12 col-sm-4 slider-box">                                      
                                                    <div data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 205px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-8 info-box">
                                                    <div class="info-title">
                                                        <h3>Executive Aircraft Charter</h3>
                                                        <a class="cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" ><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-lg"><path fill="currentColor" d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z" class=""></path></svg></a>
                                                    </div>                                      
                                                    <div class="departure-locations">
                                                        <div class="desktop">
                                                            <h4>{{$value->departure}}
                                                                <span>to</span> {{$value->destination}}
                                                            </h4>
                                                        </div>
                                                        <div class="mobile">
                                                            <hr>
                                                            <h4>{{$value->departure}}</h4>
                                                            <div class="link">to</div> 
                                                            <h4>{{$value->destination}}</h4>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <ul class="list">
                                                        <li><span>Departure Date: </span>{{$value->date}}</li>
                                                        <li><span>Local time of departure: </span>{{$value->time}}</li>
                                                        <li><span>Travelers: </span>{{$value->travellers}}</li>
                                                    </ul>
                                                    <div class="clearfix"></div>
                                                    <div class="box-left">
                                                        <h5>Awaiting Estimation</h5>
                                                        <p>Booking NO: {{$value->id}}</p>
                                                    </div>
                                                    <div class="box-right">
                                                        <a class="btn btn-yellow view_details" data-source="{{$value}}" data-type="{{$value->booking_type}}" >View details</a>
                                                    </div>
                                                    <div class="mobile-flight-detail">
                                                        <div class="container toggle" data-toggle="collapse" data-target=".panel{{$value->id}}"><span>View Details</span><span class="caret" data-toggle="collapse" data-target=".panel{{$value->id}}"><i class="fa fa-caret-up"></i></span></div>
                                                        <div class="collapse in panel{{$value->id}}" id="panel">
                                                        <div><span class="panel-title">Departure Date: </span><span class="panel-data">{{$value->date}}</span></div>
                                                        <div><span class="panel-title">Local time of departure: </span><span class="panel-data">{{$value->time}}</span></div>
                                                        <div><span class="panel-title">Travelers: </span><span class="panel-data">{{$value->travellers}}</span></div>
                                                        <button class="cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" >CANCEL</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($display_mode == "mode2")
                                    <div class="col-view">
                                        <div class="image-box">
                                            <div data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></div>
                                        </div>
                                        <div class="detail-box">
                                            <h3>Executive Aircraft Charter</h3>
                                            <h4>{{$value->departure}} <span>to</span> </h4>                                    
                                            <h4>{{$value->destination}}</h4>                                
                                            <div class="list">                                
                                                <div><span>Departure Date: </span>{{$value->date}}</div>
                                                <div><span>Local time of departure: </span>{{$value->time}}</div>
                                                <div><span>Travelers: </span>{{$value->travellers}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="box-status">
                                                <h5>Awaiting Estimation</h5>
                                                <p>Booking NO: {{$value->id}}</p>
                                            </div>
                                            <div class="box-button">
                                                <div class="pay_form"><a class="btn btn-red cancel_request" data-source="{{$value}}" data-type="{{$value->booking_type}}" >Cancel</a></div>
                                                <div class="pay_form"><a class="btn btn-yellow view_details" data-source="{{$value}}" data-type="{{$value->booking_type}}" >View details</a></div>
                                            </div>
                                        </div>                            
                                    </div>
                                @endif
                            @endif
                        @endforeach
                        {{$charters->links()}}
                    </div>
                    <!-- show limousine transport requests -->
                    <div class="limousines">
                      <?php $img_arr = [];?>
                      @foreach($limousines as $key=>$limousine)
                      @foreach($images as $image)
                      @if($image->parent_id == $limousine->aircraft)
                      <?php array_push($img_arr, $image->url);?>
                      @endif
                      @endforeach                      
                      <?php $c_arr = count($img_arr);?>
                      @if($display_mode == "mode1")
                      <div class="row limousines">
                          <div class="col-xs-12">
                              <div class="item">
                                  <div class="col-xs-12 col-sm-4 slider-box">
                                    <div class="slide" id="slide010{{$key}}">
                                        <ul>
                                            @if($c_arr != 0)
                                            @foreach($img_arr as $image)
                                            <li data-bg="{{$image}}" style="width: 314px; height: 205px;"></li>
                                            @endforeach
                                            @else
                                            <li data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 205px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                            @endif
                                        </ul>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-8 info-box">
                                      <div class="info-title">
                                        <h3>Limousine Transport</h3>
                                      </div>
                                      <div class="departure-locations">
                                        <div class="desktop">
                                            <h4>{{$limousine->from_address}}
                                                <span>to</span> {{$limousine->to_address}}
                                            </h4>
                                        </div>
                                        <div class="mobile">
                                            <hr>
                                            <h4>{{$limousine->from_address}}</h4>
                                            <div class="link">to</div> 
                                            <h4>{{$limousine->to_address}}</h4>
                                            <hr>
                                        </div>
                                      </div>
                                      <ul class="list">
                                          <li><span>Date: </span>{{$limousine->date}}</li>
                                          <li><span>Travelers: </span>{{$limousine->travelers}}</li>
                                          <li><span>Luggage: </span>{{$limousine->luggage}}</li>
                                          <li><span>Car Type: </span>{{$limousine->type_car}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          <h5 class="cost" data-val="{{$limousine->total_cost}}">€{{$limousine->total_cost}}</h5>
                                          <p>VAT excluded. Booking NO: {{$limousine->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          <a class="btn btn-yellow limousine_view" data-source="{{$limousine}}" data-type="limousine">Receipt</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>   
                      @elseif($display_mode == "mode2")
                      <div class="col-view">
                          <div class="image-box">
                            <div class="slide" id="slide011{{$key}}">
                                <ul>
                                    @if($c_arr != 0)
                                    @foreach($img_arr as $image)
                                    <li data-bg="{{$image}}" style="width: 301px; height: 206px;"></li>
                                    @endforeach
                                    @else
                                    <li data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                    @endif
                                </ul>
                            </div>
                          </div>
                          <div class="detail-box">
                            <h3>Limousine Transport</h3>                                
                            <h4>{{$limousine->from_address}} to {{$limousine->to_address}}</h4>
                            <div class="list">
                                <div><span>Date: </span>{{$limousine->date}}</div>                                          
                                <div><span>Travelers: </span>{{$limousine->travelers}}</div>
                                <div><span>Luggage: </span>{{$limousine->luggage}}</div>
                                <div><span>Car Type: </span>{{$limousine->type_car}}</div>
                            </div>                                 
                            <div class="clearfix"></div>
                            <div class="box-status">
                                <h5 class="cost" data-val="{{$limousine->total_cost}}">€{{$limousine->total_cost}}</h5>
                                <p>VAT excluded. Booking NO: {{$limousine->id}}</p>
                            </div>
                            <div class="box-button" style="display:flex;">
                                <div class="pay_form"><a class="btn btn-yellow limousine_view" data-source="{{$limousine}}" data-type="limousine">Receipt</a></div>
                            </div>
                          </div>                          
                      </div>
                      @endif                       
                      @endforeach       
                      {{$limousines->links()}}     
                    </div>
                    <!-- show meet booking requests -->
                    <div class="meets">
                      <?php $img_arr = [];?>
                      @foreach($meets as $key=>$meet)
                      @foreach($images as $image)
                      @if($image->parent_id == $meet->aircraft)
                      <?php array_push($img_arr, $image->url);?>
                      @endif
                      @endforeach                      
                      <?php $c_arr = count($img_arr);?>
                      @if($display_mode == "mode1")
                      <div class="row meets">
                          <div class="col-xs-12">
                              <div class="item">
                                  <div class="col-xs-12 col-sm-4 slider-box">
                                    <div class="slide" id="slide100{{$key}}">
                                        <ul>
                                            @if($c_arr != 0)
                                            @foreach($img_arr as $image)
                                            <li data-bg="{{$image}}" style="width: 314px; height: 154px;"></li>
                                            @endforeach
                                            @else
                                            <li data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 154px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                            @endif
                                        </ul>
                                    </div>
                                  </div>
                                  <div class="col-xs-12 col-sm-8 info-box">
                                      <div class="info-title">
                                        <h3>Meet & Greet 
                                            @if ($meet->is_departure == "true" && $meet->is_arrival == "true")
                                            - Arrival & Departure
                                            @elseif ($meet->is_arrival == "true")
                                            - Arrival
                                            @elseif ($meet->is_departure == "true")
                                            - Departure
                                            @endif
                                        </h3>
                                        @if($meet->status != "paid")
                                        <a class="cancel_request" data-source="{{$meet}}" data-type="meet"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-lg"><path fill="currentColor" d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z" class=""></path></svg></a>
                                        @endif
                                      </div>
                                      <ul class="list">
                                          <li><span>Date: </span>{{$meet->in_date}}</li>
                                          <li><span>Local time of departure: </span>{{$meet->in_time}}</li>
                                          <li><span>Airline: </span>{{$meet->in_airline}}</li>
                                      </ul>
                                      <div class="clearfix"></div>
                                      <div class="box-left">
                                          <h5 class="cost" data-val="{{$meet->total_cost}}">€{{$meet->total_cost}}</h5>
                                          <p>VAT excluded. Booking NO: {{$meet->id}}</p>
                                      </div>
                                      <div class="box-right">
                                          <a class="btn btn-yellow meet_view" data-source="{{$meet}}" data-type="meet">Receipt</a>
                                          @if ($meet->is_review == "true")
                                          <a class="btn btn-yellow-light write_review" data-source="{{$meet}}" data-type="meet">Write Review</a>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>     
                      @elseif($display_mode == "mode2")
                      <div class="col-view">
                        <div class="image-box">
                            <div class="slide" id="slide101{{$key}}">
                                <ul>
                                    @if($c_arr != 0)
                                    @foreach($img_arr as $image)
                                    <li data-bg="{{$image}}" style="width: 301px; height: 206px;"></li>
                                    @endforeach
                                    @else
                                    <li data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="detail-box">
                            <h3>Meet & Greet 
                                @if ($meet->is_departure == "true" && $meet->is_arrival == "true")
                                - Arrival & Departure
                                @elseif ($meet->is_arrival == "true")
                                - Arrival
                                @elseif ($meet->is_departure == "true")
                                - Departure
                                @endif
                            </h3>
                            <h4>{{$meet->meet_service}}</h4>
                            <div class="list">
                                <div><span >Date: </span>{{$meet->in_date}}</div>
                                <div><span >Local time of departure: </span>{{$meet->in_time}}</div>
                                <div><span>Airline: </span>{{$meet->in_airline}}</div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="box-status">
                                <h5 class="cost" data-val="{{$meet->total_cost}}">€{{$meet->total_cost}}</h5>
                                <p>VAT excluded. Booking NO: {{$meet->id}}</p>
                            </div>
                            <div class="box-button" style="display: flex;">
                                <div class="pay_form"><a class="btn btn-yellow meet_view" data-source="{{$meet}}" data-type="meet">Receipt</a></div>
                                @if ($meet->is_review == "true")
                                <div class="pay_form"><a class="btn btn-yellow-light write_review" data-source="{{$meet}}" data-type="meet">Write Review</a></div>
                                @endif
                            </div>
                        </div>                        
                      </div>                  
                      @endif   
                      @endforeach       
                      {{$meets->links()}} 
                    </div>
                    <!-- show emptyleg charter requests -->
                    <div class="emptylegs">
                        <?php $img_arr = [];?>
                        @foreach($emptylegs as $key=>$emptyleg)                        
                        @foreach($images as $image)
                        @foreach($aircrafts as $sel)
                        @if($emptyleg->aircraft == $sel->type && $image->parent_id == $sel->id)
                        <?php array_push($img_arr, $image->url);?>
                        @endif
                        @endforeach
                        @endforeach
                        <?php $c_arr = count($img_arr);?>
                        @if($display_mode == "mode1")
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="item">
                                    <div class="col-xs-12 col-sm-4 slider-box">
                                        <div class="slide" id="slide110{{$key}}">
                                            <ul>
                                                @if($c_arr != 0)
                                                @foreach($img_arr as $image)
                                                <li data-bg="{{$image}}" style="width: 314px; height: 205px;"></li>
                                                @endforeach
                                                @else
                                                <li data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 205px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-8 info-box">
                                        <div class="info-title">
                                            <h3>Empty Leg Aircraft Charter</h3>
                                            @if($emptyleg->status != "paid")
                                            <a class="cancel_request" data-source="{{$emptyleg}}" data-type="empty"><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="trash-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-trash-alt fa-w-14 fa-lg"><path fill="currentColor" d="M296 432h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zm-160 0h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8zM440 64H336l-33.6-44.8A48 48 0 0 0 264 0h-80a48 48 0 0 0-38.4 19.2L112 64H8a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h24v368a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V96h24a8 8 0 0 0 8-8V72a8 8 0 0 0-8-8zM171.2 38.4A16.1 16.1 0 0 1 184 32h80a16.1 16.1 0 0 1 12.8 6.4L296 64H152zM384 464a16 16 0 0 1-16 16H80a16 16 0 0 1-16-16V96h320zm-168-32h16a8 8 0 0 0 8-8V152a8 8 0 0 0-8-8h-16a8 8 0 0 0-8 8v272a8 8 0 0 0 8 8z" class=""></path></svg></a>
                                            @endif
                                        </div>
                                        <div class="departure-locations">
                                            <div class="desktop">
                                                <h4>{{$emptyleg->departure}}
                                                    <span>to</span> {{$emptyleg->destination}}
                                                </h4>
                                            </div>
                                            <div class="mobile">
                                                <hr>
                                                <h4>{{$emptyleg->departure}}</h4>
                                                <div class="link">to</div> 
                                                <h4>{{$emptyleg->destination}}</h4>
                                                <hr>
                                            </div>
                                        </div>
                                        <ul class="list">
                                            <li><span>Aircraft Type: </span>{{$emptyleg->aircraft}}</li>
                                            <li><span>Partner: </span>{{$emptyleg->partner_name}}</li>
                                            <li><span>Date: </span>{{$emptyleg->end_date}}</li>
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
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="6">kr {{$emptyleg->price}}</h5>
                                            @elseif($emptyleg->currency == "NOK") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="7">kr {{$emptyleg->price}}</h5>
                                            @elseif($emptyleg->currency == "GBP") 
                                            <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="8">£{{$emptyleg->price}}</h5>
                                            @endif
                                            <p>VAT excluded. Booking NO: {{$emptyleg->id}}</p>
                                        </div>
                                        <div class="box-right">
                                            @if($emptyleg->status == "awaiting")
                                            <div class="pay_group">                                                
                                                <div class="pay_form">
                                                    <form method="POST" action="/services/paypal">
                                                        {{ csrf_field() }}
                                                        <input value="Emptyleg Charter" type="hidden" name="item">
                                                        <input value="{{$emptyleg->id}}" type="hidden" name="item_number">
                                                        <input value="{{$emptyleg->price}}" type="hidden" name="amount">
                                                        <input value="empty" type="hidden" name="type">
                                                        <button type="submit" class="btn btn-green confirm_pay">Confirm & Pay</button>
                                                    </form>
                                                </div>
                                            </div>
                                            @elseif($emptyleg->status == "sent")                                            
                                            <a class="btn btn-yellow empty_view" data-source="{{$emptyleg}}" data-type="empty">View details</a>                                            
                                            @elseif($emptyleg->status == "paid")
                                            <a class="btn btn-yellow empty_view" data-source="{{$emptyleg}}" data-type="empty">Receipt</a>
                                            @if ($emptyleg->is_review == "true")
                                            <a class="btn btn-yellow-light write_review" data-source="{{$emptyleg}}" data-type="empty">Write Review</a>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        @elseif($display_mode == "mode2")                      
                        <div class="col-view">
                            <div class="image-box">
                                <div class="slide" id="slide111{{$key}}">
                                    <ul>
                                        @if($c_arr != 0)
                                        @foreach($img_arr as $image)
                                        <li data-bg="{{$image}}" style="width: 301px; height: 206px;"></li>
                                        @endforeach
                                        @else
                                        <li data-bg="/assets/img/default-img.jpg" style="width: 301px; height: 206px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="detail-box">
                                <h3>Empty Leg Aircraft Charter</h3>                        
                                <h4>{{$emptyleg->departure}} <span>to</span> </h4>
                                <h4>{{$emptyleg->destination}}</h4>
                                <div class="list">
                                    <div><span>Aircraft Type: </span>{{$emptyleg->aircraft}}</div>                                  
                                    <div><span>Partner: </span>{{$emptyleg->partner_name}}</div>
                                    <div><span>Date: </span>{{$emptyleg->end_date}}</div>
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
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="6">kr {{$emptyleg->price}}</h5>
                                    @elseif($emptyleg->currency == "NOK") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="7">kr {{$emptyleg->price}}</h5>
                                    @elseif($emptyleg->currency == "GBP") 
                                    <h5 class="cost" data-val="{{$emptyleg->price}}" data-symbol="8">£{{$emptyleg->price}}</h5>  
                                    @endif
                                    <p>VAT excluded. Booking NO: {{$emptyleg->id}}</p>
                                </div>                                                 
                                <div class="box-button" style="display: flex;">
                                    @if($emptyleg->status == "awaiting")                                    
                                    <div class="pay_group">
                                        <div class="pay_form">
                                            <a class="btn btn-red cancel_request" data-source="{{$emptyleg}}" data-type="empty">Cancel</a>
                                        </div>
                                        <div class="pay_form">
                                            <form method="POST" action="/services/paypal">
                                                {{ csrf_field() }}
                                                <input value="Emptyleg Charter" type="hidden" name="item">
                                                <input value="{{$emptyleg->id}}" type="hidden" name="item_number">
                                                <input value="{{$emptyleg->price}}" type="hidden" name="amount">
                                                <input value="empty" type="hidden" name="type">
                                                <a type="submit" class="btn btn-green confirm_pay">Confirm & Pay</a>
                                            </form>
                                        </div>                                        
                                    </div>
                                    @elseif($emptyleg->status == "sent")                                    
                                    <div class="pay_form"><a class="btn btn-red cancel_request" data-source="{{$emptyleg}}" data-type="empty">Cancel</a></div>
                                    <div class="pay_form"><a class="btn btn-yellow empty_view" data-source="{{$emptyleg}}" data-type="empty">View details</a></div>                                    
                                    @elseif($emptyleg->status == "paid")
                                    <div class="pay_form"><a class="btn btn-yellow empty_view" data-source="{{$emptyleg}}" data-type="empty">Receipt</a></div>
                                    @if ($emptyleg->is_review == "true")
                                    <div class="pay_form"><a class="btn btn-yellow-light write_review" data-source="{{$emptyleg}}" data-type="empty">Write Review</a></div>
                                    @endif
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

<!-- Cancel -->
<div class="modal fade" id="cancelRequest" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">
                  <img src="/assets/img/close-black.png" alt="">
              </span>
          </button>          
          <div class="box">
              <h4>Cancel your Request</h4>
              <p> Are you sure you want to cancel your upcoming request?
              <div class="wrapper-btns text-center">
                  <a class="btn btn-red cancel" data-toggle="modal">Cancel</a>
                  <a class="btn btn-yellow back" data-dismiss="modal">No, go back</a>
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
                            <b>Travel Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_travel_date"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Type of Travel</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_type_travel"></p>
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
                    <div class="row is_return">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Return From Address</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_return_from_address"></p>
                        </div>
                    </div>
                    <div class="row is_return">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Return To Address</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_return_to_address"></p>
                        </div>
                    </div>
                    <div class="row is_return">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Return Date</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_return_date"></p>
                        </div>
                    </div>
                    <div class="row is_return">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Return Time</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_return_time"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Contact Person</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_contact_person"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Phone</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_phone"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Email</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_email"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Company</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="limousine_company"></p>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="limousine_contact_person"></span>
                        If you have any questions regarding your booking, feel free to call us
                        <a href="">H24 +47 92 222 999</a> or send us en email at
                        <a href="">contact@accessoslo.no</a> with the booking number above.</p>                    
                </div>
                <div class="total-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p><b>Total amount</b></p>
                            <p id="limousine_payment_id"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="limousine_price"></span>
                        </div>
                    </div>
                </div>              
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
                            <b>Service:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_service"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Contact Person:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_person"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Phone:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_phone"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Email:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_email"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Company:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_company"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <b>Travelers:</b>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <p id="meet_travelers"></p>
                        </div>
                    </div>
                    <div class="inbound-box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <p class="text_flight_type"><b>Inbound:</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Airline:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_airline"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Date of Arrival:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_date"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Time of Arrival:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_time"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Luggage:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_luggage"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Booking Reference:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_booking_reference"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Connection Flight:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_in_connect_flight_number"></p>
                            </div>
                        </div>
                    </div>
                    <div class="outbound-box">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <p class="text_flight_type"><b>Outbound:</b></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Airline:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_airline"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Date of Arrival:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_date"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Time of Arrival:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_time"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Luggage:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_luggage"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Booking Reference:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_booking_reference"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 text-left">
                                <b>Connection Flight:</b>
                            </div>
                            <div class="col-xs-12 col-sm-6 text-right">
                                <p id="meet_out_connect_flight_number"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-info">
                    <p>
                        <span id="meet_contact_person"></span>
                        If you have any questions regarding your booking, feel free to call us
                        <a href="">H24 +47 92 222 999</a> or send us en email at
                        <a href="">contact@accessoslo.no</a> with the booking number above.</p>                    
                </div>
                <div class="total-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p>
                                <b>Total amount</b>
                            </p>
                            <p id="meet_booking_no"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="meet_price"></span>
                        </div>
                    </div>
                </div>              
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
                </div>
                <div class="total-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p>
                                <b>Total amount</b>
                            </p>
                            <p id="empty_booking_no_footer"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="empty_price"></span>
                        </div>
                    </div>
                </div>              
          </div>
      </div>
  </div>
</div>
<!-- Booking Receipt-->
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
                </div>
                <div class="total-box">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 text-left">
                            <p>
                                <b>Total amount</b>
                            </p>
                            <p id="invoice_no"></p>
                        </div>
                        <div class="col-xs-12 col-sm-6 text-right">
                            <span id="price"></span>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/main.js"></script>
<script src="/js/vendor/jquery.star-rating-svg.js"></script>
<script src="/js/vendor/jquery.slide.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script src="/js/accessoslo.js"></script>
<script src="https://rawgit.com/myforce/angularjs-dropdown-multiselect/master/src/angularjs-dropdown-multiselect.js"></script>
<script>
    // get current booking type, number of requests and current display mode    
    var status = "{{$status}}";
    var type = "{{$types}}";
    var count = "{{$counts}}";
    var display_mode = "{{$display_mode}}";
    // get each type of requests count
    var charter_count = "{{$charters_counts}}";
    var meet_count = "{{$meets_counts}}";
    var limousine_count = "{{$limousines_counts}}";
    var emptyleg_count = "{{$emptylegs_counts}}";
    
    // slideshow for the right charters
    for (i = 0; i < limousine_count; i ++) {
        if ($("#slide010"+i+">ul>li").length == 1) {
            $('#slide010'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide010'+i).slide({isShowDots: false});}
        if ($("#slide011"+i+">ul>li").length == 1) {
            $('#slide011'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide011'+i).slide({isShowDots: false});}        
    }
    for (i = 0; i < meet_count; i ++) {
        if ($("#slide100"+i+">ul>li").length == 1) {
            $('#slide100'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide100'+i).slide({isShowDots: false});}
        if ($("#slide101"+i+">ul>li").length == 1) {
            $('#slide101'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide101'+i).slide({isShowDots: false});}
    }
    for (i = 0; i < emptyleg_count; i ++) {
        if ($("#slide110"+i+">ul>li").length == 1) {
            $('#slide110'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide110'+i).slide({isShowDots: false});}
        if ($("#slide111"+i+">ul>li").length == 1) {
            $('#slide111'+i).slide({isShowDots: false, isShowArrow: false});
        } else {$('#slide111'+i).slide({isShowDots: false});}
    }
</script>
@include('sweet::alert')
<script>jQuery(function(){new Accessoslo.Controllers.MemberUpcomingRequest();});</script>
@endsection

