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
                                <div class="label-table date">Date of traveler</div>
                                <div class="label-table service">Service</div>
                                <div class="label-table status">Status</div>
                                <div class="label-table action">Action</div>
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
                                        <div class="label-table contact">{{$data->contact_person}}</div>                                        
                                        <div class="label-table email">{{$data->email}}</div>
                                        <div class="label-table phone">{{$data->phone}}</div>
                                        <div class="label-table date">{{$data->date}}</div>
                                        <div class="label-table service">{{$data->meet_service}}</div>
                                        <div class="label-table status {{$data->status}}"><span>{{$data->status}}</span></div>
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
                        <p class="contact-info"><span id="contact_person"></span><span id="email"></span><span id="phone"></span></p>
                    </div>
                    <div class="modal-body">
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>DATE OF TRAVEL</h5>
                                    <p>The current date for Meet & Greet Service</p>
                                    <strong id="date"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>MEET & GREET SERVICE</h5>
                                    <p>Selected Meet & Greet Service</p>
                                    <strong id="meet_service"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>PASSENGER’S NAME</h5>
                                    <p>Name of one of the travelers / main person</p>
                                    <strong>Mr. Firstname Lastname</strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-modal">                    
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>OPTION PRODUCT</h5>
                                    <p>Products that can be purchased at additional cost</p>
                                    <strong id="product"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>LUGGAGE</h5>
                                    <p>Total number of luggage</p>
                                    <strong id="luggage"></strong>
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
                                    <h5>FLIGHT NUMBER </h5>
                                    <p>Number of the flight which travelers take</p>
                                    <strong id="flight_number"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>AIRLINE</h5>
                                    <p>Selected airline of travelers</p>
                                    <strong id="airline"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>TIME OF ARRIVAL</h5>
                                    <p>Selected Arrival/Departure time at/from OSL</p>
                                    <strong id="time"></strong>
                                </div>
                            </div>
                        </div>
                        <div class="row-modal">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <h5>BOOKING REFERENCE</h5>
                                    <p>Your booking reference issued by the airline</p>
                                    <strong id="booking_reference"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>CONNECTION FLIGHT- DEPARTURE TIME FROM (OSL)</h5>
                                    <p>Applicable if connection flight at OSL</p>
                                    <strong id="departure_time"></strong>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <h5>CONNECTION FLIGHT (FLIGHT NUMBER)</h5>
                                    <p>Applicable if connection flight at OSL</p>
                                    <strong id="connect_flight_number"></strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h5>COMMENTS</h5>
                        <p>Further details from traveler</p>
                        <strong id="comments"></strong>
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