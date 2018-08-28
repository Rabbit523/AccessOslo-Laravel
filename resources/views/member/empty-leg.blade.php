@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
  @if($counts != 0)
  <section class="introduction">
      <div class="container wrapper-content">
          <div class="col-xs-12">
              <div class="margin_title">
                <h1>EMPTY LEG CHARTER FLIGHTS</h1>
                <p>View your Empty Leg Flights.</p>
              </div>
          </div>
      </div>
  </section>
  @elseif($counts == 0)
  <section class="introduction_no">
    <div class="container wrapper-content">
        <div class="col-xs-12">              
            <div class="title">
                <h1>EMPTY LEG CHARTER FLIGHTS</h1>
                <p>We currently have no empty leg charter flights available.</p>
                <p>Please contact us for more information.</p>
                <a class="btn btn-yellow contact_us">Contact Us</a>
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
  </section>
  @endif
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
                                                <select name="Mr" id="Mr" class="form-control" required>
                                                    <option disabled selected value>Gender</option>
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
                                                <input type="text" name="contact_person" id="contact_person" class="form-control firstname" placeholder="Nohman Janjua" required>                    
                                            </div>                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="form-group">
                                                <label for="">PHONE</label>  
                                                <input type="tel" name="phone" id="phone" class="form-control" required>                   
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="col-xs-12 col-sm-7">
                                            <div class="form-group">        
                                                <label for="">EMAIL</label>                                 
                                                <input type="email" name="email" id="email" class="form-control email"  placeholder="nohman@janjua.net" required>                              
                                            </div>
                                        </div>                                    
                                        <div class="col-xs-12 col-sm-5">
                                            <div class="form-group">           
                                                <label for="">COMPANY NAME</label>                                    
                                                <input type="text" name="company" id="company" class="form-control company"  placeholder="FantasyLab" required>                   
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="col-xs-12 col-sm-4" style="float:right;">
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
<script src="https://static.bambora.com/checkout-sdk-web/latest/checkout-sdk-web.min.js"></script>
<script src="https://ssl.ditonlinebetalingssystem.dk/integration/ewindow/paymentwindow.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberEmptyLeg();});</script>
@endsection