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
    <div class="page-content accessoslo-executive-charter">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <input type="text" name="datepicker" id="datepicker" class="form-control date-input" placeholder="02/05/18  -  03/05/18">
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
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Booking Number, Contact Person">
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        <div class="header-list"> 
                            <div class="row">
                                <div class="label-table booking-id">Booking No.</div>
                                <div class="label-table departure">Departure</div>
                                <div class="label-table destination">Destination</div>
                                <div class="label-table date">Date</div>
                                <div class="label-table travelers">Travelers</div>
                                <div class="label-table flight">Flight Type</div>
                                <div class="label-table contact">Contact person</div>
                                <div class="label-table status">Status</div>
                                <div class="label-table toggle">TOGGLE</div>
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
                                        <div class="label-table departure">{{$data->departure}}</div>
                                        <div class="label-table destination">{{$data->destination}}</div>
                                        <div class="label-table date">{{$data->date}}</div>
                                        <div class="label-table travelers">{{$data->travellers}}</div>
                                        <div class="label-table flight">{{$data->flight_type}}</div>
                                        <div class="label-table contact">{{$data->contact_person}}</div>
                                        @if(Auth::User()->role_id == "1")
                                            @if($data->status == "sent")
                                                <?php $estimates_ = $data->total_estimations; $estimates = (int)$estimates_;?>
                                                @if($estimates >= 2)
                                                <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                                @elseif($data->partner_name == $partner_name)
                                                <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                                @else
                                                <div class="label-table status awaiting"><span>awaiting</span></div>
                                                @endif
                                            @else
                                            <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>    
                                            @endif
                                        @else
                                        <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                        @endif
                                        <div class="label-table toggle" data-info="{{$data}}"><span><i class="fa fa-caret-up"></i></span></div>
                                    </div>
                                </div>
                                <div id="item{{$data->id}}" class="collapse info-item">
                                    <div class="header-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item contact-information">Contact Information</div>                                   
                                            <div class="label-sub-item actions">action</div>
                                        </div>
                                    </div>
                                    <div class="list-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item full-name">
                                                <div class="form-group">
                                                    <label for="">FULL NAME</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$data->contact_person}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item full-name">
                                                <div class="form-group">
                                                    <label for="">PHONE</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$data->phone}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item full-name">
                                                <div class="form-group">
                                                    <label for="">EMAIL</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$data->email}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item full-name">
                                                <div class="form-group">
                                                    <label for="">COMPANY</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="{{$data->company}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::User()->role_id == "1")
                                            @if ($data->additional_service != null)
                                            <div class="label-sub-item full-name">
                                                <a class="btn btn-block btn-gray view-info" data-id="{{$data->id}}" data-source="{{$data->additional_service}}">View Additional Info</a>
                                            </div>
                                            @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="header-sub-item flight-estimations">
                                        <div class="row">
                                            <div class="label-sub-item contact-information">Flight Information</div>                                   
                                            <div class="label-sub-item actions">action</div>
                                        </div>
                                    </div>
                                    @if(auth()->user()->role_id == 1)
                                    <div class="list-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <label for="">AIRCRAFT TYPE</label>
                                                    <select name="aircraft" id="aircraft{{$data->id}}" class="select">
                                                        <option disabled selected value>Aircraft</option>
                                                        @foreach($aircrafts as $aircraft)
                                                        <option value="{{$aircraft->type}}">{{$aircraft->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">TOTAL COST in EUR</label>
                                                        <input type="text" class="form-control estimate_cost" name="estimate_cost" id="estimate_cost{{$data->id}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @if(auth()->user()->role_id == 0)
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ADDITIONAL FEE</label>
                                                        <input type="text" class="form-control additional_fee" name="additional_fee" id="additional_fee{{$data->id}}" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">TOTAL COST</label>
                                                        <input type="text" class="form-control total_cost" name="total_cost" id="total_cost{{$data->id}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="label-sub-item button-list" id="buttons{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-gray save" data-id="{{$data->id}}">Save Draft</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-green send" data-id="{{$data->id}}">Send</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item button-list is-status" id="status{{$data->id}}">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6 status {{$data->status}}">
                                                        <span> {{$data->status}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if(auth()->user()->role_id == 0)
                                    <?php $is_existed = in_array($data->id, $estimated_ids);?>
                                    @if($is_existed == "1")
                                    @foreach($estimated_requests as $sel)
                                    @if($sel['id'] == $data->id)
                                    @for($i = 0; $i < $sel['count']; $i ++)
                                    <div class="list-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">PARTNER</label>
                                                        <input type="text" class="form-control partner_name" name="partner_name" id="partner_name{{$data->id}}{{$i}}" placeholder="Partner Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <label for="">AIRCRAFT TYPE</label>
                                                    <select name="aircraft" id="aircraft{{$data->id}}{{$i}}" class="select">
                                                        <option disabled selected value>Aircraft</option>
                                                        @foreach($aircrafts as $aircraft)
                                                        <option value="{{$aircraft->type}}">{{$aircraft->type}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost admin-cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ESTIMATE FLIGHT COST</label>
                                                        <input type="text" class="form-control estimate_cost" name="estimate_cost" id="estimate_cost{{$data->id}}{{$i}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost admin-cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ADDITIONAL FEE</label>
                                                        <input type="text" class="form-control additional_fee" name="additional_fee" id="additional_fee{{$data->id}}{{$i}}" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost admin-cost total_cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">TOTAL COST</label>
                                                        <input type="text" class="form-control total_cost" name="total_cost" id="total_cost{{$data->id}}{{$i}}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($data->additional_service != null)
                                            <div class="label-sub-item admin-button-list" id="buttons{{$data->id}}{{$i}}">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-4">
                                                        <a class="btn btn-block btn-gray admin-view-info" id="info{{$data->id}}{{$i}}" data-source="{{$data->additional_service}}">Info</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <a class="btn btn-block btn-gray save" id="save{{$data->id}}{{$i}}">Save Draft</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-4">
                                                        <a class="btn btn-block btn-green send" id="send{{$data->id}}{{$i}}" data-id="{{$data->id}}">Send</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item button-list is-status" id="status{{$data->id}}{{$i}}">
                                                <div class="status {{$data->status}}">
                                                    <span> {{$data->status}} </span>
                                                </div>
                                            </div>
                                            @else
                                            <div class="label-sub-item button-list" id="buttons{{$data->id}}{{$i}}">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-gray save" id="save{{$data->id}}{{$i}}">Save Draft</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-green send" id="send{{$data->id}}{{$i}}" data-id="{{$data->id}}">Send</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item button-list is-status" id="status{{$data->id}}{{$i}}">
                                                <div class="status {{$data->status}}">
                                                    <span> {{$data->status}} </span>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    @endfor
                                    @endif
                                    @endforeach
                                    @else
                                    <div class="list-sub-item">
                                        <div class="row">  
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">PARTNER</label>
                                                        <input type="text" class="form-control partner_name" name="partner_name" id="partner_name{{$data->id}}" placeholder="Partner Name">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <label for="">AIRCRAFT TYPE</label>
                                                    <select name="aircraft" id="aircraft{{$data->id}}" class="select" data-aircraft="{{$aircrafts}}">
                                                        <option disabled selected value>Aircraft</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ESTIMATE FLIGHT COST</label>
                                                        <input type="text" class="form-control estimate_cost" name="estimate_cost" id="estimate_cost{{$data->id}}">
                                                    </div>
                                                </div>
                                            </div>
                                            @if(auth()->user()->role_id == 0)
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ADDITIONAL FEE</label>
                                                        <input type="text" class="form-control additional_fee" name="additional_fee" id="additional_fee{{$data->id}}" value="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">TOTAL COST</label>
                                                        <input type="text" class="form-control total_cost" name="total_cost" id="total_cost{{$data->id}}" readonly>                                                                                                                
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            <div class="label-sub-item button-list">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-gray save" data-id="{{$data->id}}" id="save{{$data->id}}">Save Draft</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-green send" data-id="{{$data->id}}" id="send{{$data->id}}">Send</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div><!-- content-box -->
                </div>
            </div>
        </div>
        <div class="modal fade modal-additional-service" id="modal-additional-service" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                <form id="additional-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>Additional Information</p>
                    </div>
                    <div class="modal-body">
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="">FROM CUSTOMER</label>
                                        <textarea name="customer_additional_text" id="customer_additional_text" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        @if(Auth::User()->role_id == "0")
                                        <label for="">FROM PARTNER</label>
                                        @else
                                        <label for="">WRITE FEEDBACK</label>
                                        @endif
                                        <textarea id="partner_additional_text" name="partner_additional_text" class="form-control" placeholder="Write your feedback here..." required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        @if(Auth::User()->role_id == "1")
                        <a id="send_feedback_accessoslo" data-id="" class="btn btn-block btn-yellow">send feedback to access oslo</a>
                        @else
                        <a id="send_feedback_customer" data-id="" class="btn btn-block btn-yellow">send feedback to customer</a>
                        @endif
                    </div>
                </form>
                </div>
            </div>
        </div>        
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/sweetalert.min.js"></script>
@include('sweet::alert')
<script>
    var startDate = "{{$send_startDate}}";
    var endDate = "{{$send_endDate}}";
    var partner_name = "{{$partner_name}}";
    var origin_additional_fee = "{{$additional_fee}}";
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminExecutive();});</script>
@endsection