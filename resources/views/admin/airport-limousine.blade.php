@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
<div class="page-container">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-box">
                        <h1 style="font-size: 2em;">{{$title}}</h1>                    
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
    <div class="page-content accessoslo-airport-limousine">
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
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Booking Number, Contact Person">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table booking-id">Booking No.</div>
                                <div class="label-table date">Date</div>
                                <div class="label-table contact">Contact Person</div>
                                <div class="label-table from-address">From Address</div>
                                <div class="label-table to-address">To Address</div>
                                <div class="label-table type-car">Type of Car</div>
                                <div class="label-table status">status</div>
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
                                        <div class="label-table booking-id">#00{{$data->id}}</div>
                                        <div class="label-table date">{{$data->date}}</div>
                                        <div class="label-table contact">{{$data->contact_person}}</div>
                                        <div class="label-table from-address">{{$data->from_address}}</div>
                                        <div class="label-table to-address">{{$data->to_address}}</div>
                                        <div class="label-table type-car">{{$data->type_car}}</div>
                                        <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                        <div class="label-table toggle"><a class="btn btn-gray comments" data-source="{{$data}}">View Details</a></div>
                                    </div>
                                </div>                               
                            </div>
                            @endforeach
                            {{$datas->links()}}
                        </div><!-- items-list -->
                    </div><!-- content-box -->
                    <div class="modal fade modal-airport-limousine" id="modal-limousine" tabindex="-1" role="dialog" aria-labelledby="modal-limousineLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xs" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4>Airport Limousine</h4>
                                    <div class="status"><span id="status"></span></div>
                                </div>
                                <div class="modal-body">
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>BOOKING NO.</h5>
                                                <p id="id"></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>SERVICE</h5>
                                                <p id="type_flight"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>Date</h5>
                                                <p id="date"></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>CONTACT PERSON</h5>
                                                <p id="contact_person"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>FROM ADDRESS </h5>
                                                <p id="from_address"></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>PHONE</h5>
                                                <p id="phone"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>TO ADDRESS</h5>
                                                <p id="to_address"></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>EMAIL</h5>
                                                <p id="email"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>TYPE OF CAR</h5>
                                                <p id="type_car"></p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <h5>COMPANY NAME</h5>
                                                <p id="company"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <h5>COMMENTS</h5>
                                                <p id="comments"></p>
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
</div>
@endsection

@section('scripts')
<script>
    var startDate = "{{$send_startDate}}";
    var endDate = "{{$send_endDate}}";
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminLimousine();});</script>
@endsection