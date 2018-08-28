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
    <div class="page-content accessoslo-private-travel">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <input type="text" name="datepicker" id="datepicker" class="form-control date-input" placeholder="05/02/18  -  05/03/18">
                                </div>
                            </div>
                        </div>
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table title">Title</div>
                                <div class="label-table first-name">First Name</div>
                                <div class="label-table last-name">Last Name</div>
                                <div class="label-table phone">Phone</div>
                                <div class="label-table email">Email</div>
                                <div class="label-table comments">Comments</div>
                                <div class="label-table toggle">actions</div>
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
                                        <div class="label-table title">{{$data->gender}}</div>
                                        <div class="label-table first-name">{{$data->first_name}}</div>
                                        <div class="label-table last-name">{{$data->last_name}}</div>
                                        <div class="label-table phone">{{$data->phone}}</div>
                                        <div class="label-table email">{{$data->email}}</div>    
                                        <div class="label-table comments"><a class="view_comments" data-source="{{$data}}">View Comments</a></div>                                   
                                        <div class="label-table toggle" data-info="{{$data}}"><span><i class="fa fa-caret-up"></i></span></div>
                                    </div>
                                </div>
                                <div id="item{{$data->id}}" class="collapse info-item">
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
                                </div>
                            </div>
                            @endforeach
                            {{$datas->links()}}
                        </div><!-- items-list -->
                    </div><!-- content-box -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-comment" id="modal-comment" tabindex="-1" role="dialog" aria-labelledby="modal-commentLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p id="name"></p>
                    <h4>Comments</h4>
                </div>
                <div class="modal-body">
                    <div class="row-modal">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="comment-box">
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
@endsection

@section('scripts')
<script>
    var startDate = "{{$send_startDate}}";
    var endDate = "{{$send_endDate}}";
</script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminPrivate();});</script>
@endsection