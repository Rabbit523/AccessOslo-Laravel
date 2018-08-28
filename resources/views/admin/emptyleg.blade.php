@extends('layouts.private') @section('title', 'Hjem') @section('content')
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
                              <div class="label-table gender">Gender</div>  
                              <div class="label-table contact">Contact person</div>                                
                              <div class="label-table company">Company</div>
                              <div class="label-table phone">Phone</div>    
                              <div class="label-table email">email</div>                              
                              <div class="label-table status">status</div>                                                                                                                  
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
                                      <div class="label-table gender">{{$data->gender}}</div>
                                      <div class="label-table contact">{{$data->contact_person}}</div>
                                      <div class="label-table company">{{$data->company}}</div>
                                      <div class="label-table phone">{{$data->phone}}</div>
                                      <div class="label-table email">{{$data->email}}</div>
                                      <div class="label-table status {{$data->status}}"><span>{{$data->status}}<span></div>                                                                                                             
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