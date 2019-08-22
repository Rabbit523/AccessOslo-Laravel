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
                <a class="btn btn-yellow contact_us" href="/contact">Contact Us</a>
            </div>              
        </div>
    </div>
  </section>
  @endif
  @if($counts != 0)
  <section class="content-box">
      <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1 search-box">
                <form action="/member-emptyleg-search" method="get">
                    <div class="col-xs-12 col-sm-3">
                        <div class="airport dropdown form-group">
                            <input class="form-control" name="departure" id="emptyleg_departure" type="text" data-provide="typeahead" placeholder="From Airport" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="airport dropdown form-group">
                            <input class="form-control" name="destination" id="emptyleg_destination" type="text" data-provide="typeahead" placeholder="To Airport" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <input type="text" id="emptyleg_date" name="date" class="form-control" placeholder="Date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <input type="text" id="emptyleg_time" name="time" class="form-control" placeholder="Local time of departure">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <input type="submit" class="form-control" value="Search">
                        </div>
                    </div>
                </form>
            </div>
          </div>
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                <div class="top-box row">
                    <div class="col-xs-12 col-sm-4 result-box">
                         {{$counts}} Results Found
                    </div>                    
                </div>
                <div class="list-items">
                    <?php $img_arr = [];?>
                    @foreach($datas as $key=>$data)
                    @foreach($aircrafts as $sel)
                    @foreach($images as $image)
                    @if($data->aircraft == $sel->type)
                    @if($image->parent_id == $sel->id)
                    <?php array_push($img_arr, $image->url);?>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                    <?php $count_img = count($img_arr);?>
                    <div class="row">
                        <div class="col-xs-12">                            
                            <div class="item">
                                <div class="col-xs-12 col-sm-4 slider-box">
                                    <div class="slide" id="slide{{$key}}">
                                        <ul>
                                            @if($count_img != 0)
                                            @foreach($img_arr as $image)
                                            <li data-bg="{{$image}}" style="width: 314px; height: 212px;"></li>
                                            @endforeach
                                            @else
                                            <li data-bg="/assets/img/default-img.jpg" style="width: 314px; height: 212px; background: url('/assets/img/default-img.jpg') 50% 50% / cover;"></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-8 info-box">
                                    <h4>{{$data->departure}} <span>to</span> {{$data->destination}}</h4>
                                    <ul class="list">
                                        <li><span>Aircraft Type: </span>{{$data->aircraft}}</li>
                                        <li><span>Partner: </span>{{$data->partner_name}}</li>
                                        <li><span>Passengers: </span>{{$data->seats}}</li>
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
                                        <p>Available on {{$data->day}}. {{$data->month}} {{$data->year}}</p>
                                    </div>
                                    <div class="box-right">
                                        <a class="btn btn-yellow flight_details" data-source="{{$data}}">Flight details</a>
                                        <accessoslo-member-emptyleg></accessoslo-member-emptyleg>
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
</div>
@endsection

@section('scripts')
@include('sweet::alert')
<script src="/js/vendor/wickedpicker.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/currencySelect.js"></script>
<script src="/js/vendor/jquery.slide.js"></script>
<script>
    var count = "{{$counts}}";
    for (var i = 0; i < count; i ++) {
        if ($("#slide"+i+">ul>li").length == 1) {
            $('#slide'+i).slide({isShowDots: false, isShowArrow: false});
        } else {
            $('#slide'+i).slide({isShowDots: false});
        }
    }
</script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberEmptyLeg();});</script>
@endsection