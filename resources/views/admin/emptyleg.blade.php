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
    <div class="page-content accessoslo-emptyleg-charter">
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
                                    <form>
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Contact Person">
                                    </form>
                                </div>
                            </div>
                        </div>                        
                        <div class="header-list"> 
                            <div class="row">
                              <div class="label-table contact">Contact Person</div>
                              <div class="label-table email">email</div>
                              <div class="label-table phone">phone</div>
                              <div class="label-table departure">departure</div>
                              <div class="label-table destination">destination</div>
                              <div class="label-table end_date">requested</div>
                              <div class="label-table status">status</div>
                              <div class="label-table action">action</div>
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
                                      <div class="label-table contact">{{$data->contact_person}}</div>
                                      <div class="label-table email">{{$data->email}}</div>
                                      <div class="label-table phone">{{$data->phone}}</div>
                                      <div class="label-table departure">{{$data->departure}}</div>
                                      <div class="label-table destination">{{$data->destination}}</div>
                                      <div class="label-table end_date">{{$data->updated_at}}</div>
                                      <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                      <div class="label-table action"><a class="btn btn-gray details" data-source="{{$data}}">View Details</a></div>
                                    </div>
                                </div>                               
                            </div>
                            @endforeach         
                            {{$datas->links()}}     
                        </div>
                    </div><!-- content-box -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-handling-request" id="modal-details" tabindex="-1" role="dialog" aria-labelledby="modal-handling-requestLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>Emptyleg Request</p>
                </div>
                <div class="modal-body">
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">CONTACT PERSON:</label>
                                    <input type="text" name="person" id="person" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">COMPANY</label>
                                    <input type="text" name="company" id="company" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="tel" name="phone" id="phone" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Departure</label>
                                    <input type="text" name="departure" id="departure" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Destination</label>
                                    <input type="text" name="destination" id="destination" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="text" name="date" id="end_date" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">End Time</label>
                                    <input type="text" name="time" id="end_time" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Partner Name</label>
                                    <input type="text" name="partner_name" id="partner_name" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Aircraft Type</label>
                                    <input type="text" name="aircraft" id="aircraft" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Price</label>
                                    <input type="text" name="price" id="price" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group">
                                    <label for="">Payment ID</label>
                                    <input type="text" name="payment_id" id="payment_id" class="form-control" disabled>
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
<script>jQuery(function(){new Accessoslo.Controllers.AdminEmptylegBooking();});</script>
@endsection