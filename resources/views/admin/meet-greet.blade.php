@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
<div class="page-container">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-box">
                        <h1>{{$title}}</h1>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="info-user">
                        <p class="name-user">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</p>
                        @if(auth()->user()->img !=" ")
                        <span class="avatar"><img src="{{auth()->user()->img}}" class="img-responsive center-block" alt=""></span>
                        @else
                        <span class="avatar"><img src="/assets/img/admin/avatar.svg" class="img-responsive center-block" alt=""></span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="page-content accessoslo-meet-greet">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <input type="text" name="datepicker" id="datepicker" class="form-control date-input" placeholder="05/02/18  -  05/03/18">
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <select name="status" id="status">
                                        <option disabled selected value>Estimations</option>
                                        <option value="awaiting">Awaiting Estimation</option>
                                        <option value="sent">Sent Estimation</option>
                                        <option value="paid">Paid Estimation</option>
                                    </select>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <form >
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Booking Number, Contact Person, Company">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table booking-id">Booking No.</div>
                                <div class="label-table contact">Contact person</div>                                
                                <div class="label-table email">Email</div>
                                <div class="label-table phone">Phone</div>
                                <div class="label-table date">Travelers</div>                                
                                <div class="label-table status">Status</div>
                                <div class="label-table toggle">Action</div>
                            </div>
                        </div>
                        <div class="items-list">
                            @if($counts == 0)
                            <h4>There is nothing!</h4>
                            @endif  
                            @foreach($datas as $data)
                            <div class="item">
                                <div class="item-toggle collapsed" data-toggle="collapse" data-target="#item{{$data->id}}" aria-expanded="false">
                                    <div class="row">
                                        <div class="label-table booking-id">#{{$data->id}}</div>
                                        <div class="label-table contact">{{$data->contact_person}}</div>
                                        <div class="label-table email">{{$data->email}}</div>
                                        <div class="label-table phone">{{$data->phone}}</div>
                                        <div class="label-table date">{{$data->travelers}}</div>
                                        <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                        <div class="label-table toggle"><a class="btn btn-gray comments" data-source="{{$data}}">View Details</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            {{$datas->links()}}
                        </div><!-- items-list -->
                        </div><!-- content-box -->
                    </div>
                </div>
            <div>
        </div>
        <div class="modal fade modal-meet-greet" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="modal-1Label" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p class="booking-id"></p>
                        <p class="company"></p>
                        <p class="contact-info"><span id="contact_person"></span><span id="email"></span><span id="phone"></span><span id="company"></span></p>
                    </div>
                    <div class="modal-body">
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>FLIGHT NUMBER </h5>
                                    <strong id="flight_number"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>AIRLINE</h5>
                                    <strong id="airline"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>TRAVELERS</h5>
                                    <p>Number of people traveling</p>
                                    <strong id="travelers"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>DATE OF TRAVEL</h5>
                                    <strong id="date"></strong>
                                </div> 
                                <div class="col-xs-12 col-sm-4">
                                    <h5>TIME OF ARRIVAL</h5>
                                    <strong id="time"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>OPTION PRODUCT</h5>
                                    <strong id="product"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>LUGGAGE</h5>
                                    <strong id="luggage"></strong>
                                </div>                                
                                <div class="col-xs-12 col-sm-4">
                                    <h5>BOOKING REFERENCE</h5>
                                    <strong id="booking_reference"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>CONNECT FLIGHT NUMBER</h5>
                                    <strong id="connect_flight_number"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <h5>COMMENTS</h5>
                                    <strong id="comments"></strong>
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
<script>
    var startDate = "{{$send_startDate}}";
    var endDate = "{{$send_endDate}}";
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminMeet();});</script>
@endsection