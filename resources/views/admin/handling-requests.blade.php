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
    <div class="page-content accessoslo-handling-request">
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
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Company">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table date">DATE</div>
                                <div class="label-table airport">airport</div>
                                <div class="label-table company">Company</div>
                                <div class="label-table aircraft">AIRCRAFT REG. / TYPE</div>                                
                                <div class="label-table flight">FLIGHT TYPE</div>
                                <div class="label-table status">STATUS</div>
                                <div class="label-table actions">ACTIONS</div>
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
                                        <div class="label-table date">{{$data->inbound_date}}</div>
                                        <div class="label-table airport">{{$data->airport}}</div>
                                        <div class="label-table company">{{$data->company}}</div>
                                        <div class="label-table aircraft">{{$data->aircraft}}</div>                                        
                                        <div class="label-table flight">{{$data->flight_type}}</div>
                                        <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
                                        <div class="label-table actions toggle" data-info="{{$data}}"><span><i class="fa fa-caret-up"></i></span></div>
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
                                                        <input type="text" class="form-control" value="{{$data->person}}" readonly>
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
                                            <div class="label-sub-item full-name">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <a class="btn btn-gray comments" data-source="{{$data}}">View Details</a>
                                                    </div>
                                                </div>                                                
                                            </div>                                                                          
                                        </div>
                                    </div>
                                    <div class="header-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item contact-information">Flight Information</div>                                   
                                            <div class="label-sub-item actions">action</div>
                                        </div>
                                    </div>
                                    <div class="list-sub-item">
                                        <div class="row">  
                                            <div class="label-sub-item cost">                                               
                                                <div class="form-group">                                                                                                
                                                    <label for="">AIRCRAFT TYPE</label>
                                                    <select name="aircraft" id="aircraft{{$data->id}}" class="select">
                                                        <option disabled selected value>Aircraft/Car</option>
                                                        @foreach($aircrafts as $aircraft)                                                       
                                                        <option value="{{$aircraft->type}}">{{$aircraft->type}}</option>
                                                        @endforeach
                                                    </select>                                                                                               
                                                </div>                                                         
                                            </div>                              
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <label for="">ESTIMATE FLIGHT COST</label>                                                 
                                                        <input type="text" class="form-control estimate_cost" name="estimate_cost" id="estimate_cost{{$data->id}}">                                                        
                                                        <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        @if(auth()->user()->role_id == 0)
                                                        <label for="">ADDITIONAL FEE</label>                                                        
                                                        <input type="text" class="form-control additional_fee" name="additional_fee" id="additional_fee{{$data->id}}">                                                                                                               
                                                        <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="form-group">
                                                    <div class="input-group">                                                     
                                                        <label for="">TOTAL COST</label>                                                        
                                                        <input type="text" class="form-control total_cost" name="total_cost" id="total_cost{{$data->id}}" readonly>                                                                                                               
                                                        <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="label-sub-item cost">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a class="btn btn-block btn-gray save" data-save="{{$data}}">Save</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">          
                                                        <a class="btn btn-block btn-green send" data-send="{{$data}}">Send</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($data->status == "paid")
                                    <div class="header-sub-item">
                                        <div class="row">
                                            <div class="label-sub-item contact-information">BONUS POINTS GIVEN FOR THIS SERVICE</div>                                                                               
                                        </div>
                                    </div>
                                    <div class="list-sub-item">
                                        <div class="row">                                                                
                                            <div class="label-sub-item bonus_input">
                                                <div class="form-group">
                                                    <div class="input-group" style="width: 111%;">
                                                        <label for="">TOTAL BONUS PONTS</label>                                                 
                                                        <input type="text" class="form-control total_bonus" name="total_bonus" id="total_bonus{{$data->id}}">                                                        
                                                    </div>
                                                </div>
                                            </div>                                           
                                            <div class="label-sub-item bonus_button">                                                         
                                                <a class="btn btn-block btn-green send_bonus" data-send="{{$data}}">Send</a>                                                  
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div> 
                            </div>
                            @endforeach
                            {{$datas->links()}}
                        </div><!-- items-list -->
                    </div><!-- content-box -->
                    <div class="modal fade modal-handling-request" id="modal-handling-request" tabindex="-1" role="dialog" aria-labelledby="modal-handling-requestLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <p>HANDLING REQUEST</p>
                                    <h4>FANTASYLAB</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">AIRPORT</label>
                                                    <input type="text" name="airport" id="airport" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">COMPANY</label>
                                                    <input type="text" name="company" id="company" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">AIRCRAFT REG. / TYPE</label>
                                                    <div class="row">
                                                        <div class="special-blocks">
                                                            <div class="col-xs-12 col-sm-5">
                                                                <input type="text" name="crew_config1" id="crew_config1" class="form-control">
                                                            </div>
                                                            <div class="col-xs-12 col-sm-2">
                                                                <span class="special">/</span>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5">
                                                                <input type="text" name="crew_config2" id="crew_config2" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CREW CONFIG</label>
                                                    <input type="text" name="aircraft" id="aircraft"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">FLIGHT TYPE</label>
                                                    <input type="text" name="flight_type" id="flight_type" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">HOTAC</label>
                                                    <input type="text" name="hotac" id="hotac" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CATERING:</label>
                                                    <input type="text" name="catering" id="catering" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CONTACT PERSON:</label>
                                                    <input type="text" name="person" id="person" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="row-modal">
                                                <h5>INBOUND:</h5>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">FLIGHT NO.</label>
                                                            <input type="text" name="inbound_flight" id="inbound_flight" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">DATE:</label>
                                                            <input type="text" name="inbound_date" id="inbound_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">ORIG. / DEST.</label>
                                                            <input type="text" name="inbound_orig" id="inbound_orig" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">CAPTAIN:</label>
                                                            <input type="text" name="inbound_captain" id="inbound_captain" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">STA / STD (UTC):</label>
                                                            <input type="text" name="inbound_utc" id="inbound_utc" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">PAX:</label>
                                                            <input type="text" name="inbound_pax" id="inbound_pax" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="row-modal">
                                                <h5>OUTBOUND:</h5>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">FLIGHT NO.</label>
                                                            <input type="text" name="outbound_flight" id="outbound_flight" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">DATE:</label>
                                                            <input type="text" name="outbound_date" id="outbound_date" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">ORIG. / DEST.</label>
                                                            <input type="text" name="outbound_orig" id="outbound_orig" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">CAPTAIN:</label>
                                                            <input type="text" name="outbound_captain" id="outbound_captain" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">STA / STD (UTC):</label>
                                                            <input type="text" name="outbound_utc" id="outbound_utc" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">PAX:</label>
                                                            <input type="text" name="outbound_pax" id="outbound_pax" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="form-group">
                                                    <label for="">COMMENTS:</label>
                                                    <textarea name="comments" id="comments" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a id="close" class="btn btn-block btn-yellow">CLOSE DETAILS</a>
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
<script>jQuery(function(){new Accessoslo.Controllers.AdminHandling();});</script>
@endsection