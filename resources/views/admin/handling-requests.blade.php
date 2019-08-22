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
    <div class="page-content accessoslo-handling-request">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-6">
                                    <input type="text" name="datepicker" id="datepicker" class="form-control date-input" placeholder="05/02/18  -  05/03/18">
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
                                <div class="label-table aircraft">AIRCRAFT REG</div>                                
                                <div class="label-table flight">FLIGHT TYPE</div>
                                <div class="label-table attach">Attached Doc</div>                                
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
                                        <div class="label-table attach">
                                            @if($data->attach_doc != null)
                                            <a id="download_doc" href="{{$data->attach_doc}}" download><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="arrow-to-bottom" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-arrow-to-bottom fa-w-12 fa-2x"><path fill="currentColor" d="M348.5 264l-148 148.5c-4.7 4.7-12.3 4.7-17 0L35.5 264c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0l115.4 116V44c0-6.6 5.4-12 12-12h10c6.6 0 12 5.4 12 12v311.9L324.4 240c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.6 4.7 12.2 0 16.9zM384 468v-8c0-6.6-5.4-12-12-12H12c-6.6 0-12 5.4-12 12v8c0 6.6 5.4 12 12 12h360c6.6 0 12-5.4 12-12z"></path></svg></a>
                                            @else
                                                NONE                                            
                                            @endif
                                        </div>                                        
                                        <div class="label-table actions"><a class="btn btn-gray comments" data-source="{{$data}}">View Details</a></div>
                                    </div>
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
                                                    <input type="text" name="airport" id="airport" class="form-control" disabled>
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
                                                    <label for="">AIRCRAFT REG. / TYPE</label>
                                                    <div class="row">
                                                        <div class="special-blocks">
                                                            <div class="col-xs-12 col-sm-5">
                                                                <input type="text" name="crew_config1" id="crew_config1" class="form-control" disabled>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-2">
                                                                <span class="special">/</span>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-5">
                                                                <input type="text" name="crew_config2" id="crew_config2" class="form-control" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CREW CONFIG</label>
                                                    <input type="text" name="aircraft" id="aircraft"  class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">                    
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">FLIGHT TYPE</label>
                                                    <input type="text" name="flight_type" id="flight_type" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">HOTAC</label>
                                                    <input type="text" name="hotac" id="hotac" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-modal">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CATERING</label>
                                                    <input type="text" name="catering" id="catering" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <div class="form-group">
                                                    <label for="">CONTACT PERSON</label>
                                                    <input type="text" name="person" id="person" class="form-control" disabled>
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
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="row-modal">
                                                <h5>INBOUND:</h5>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">FLIGHT NO</label>
                                                            <input type="text" name="inbound_flight" id="inbound_flight" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">DATE</label>
                                                            <input type="text" name="inbound_date" id="inbound_date" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">ORIGIN</label>
                                                            <input type="text" name="inbound_orig" id="inbound_orig" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">STA (UTC)</label>
                                                            <input type="text" name="inbound_utc" id="inbound_utc" class="form-control" disabled>
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
                                                            <label for="">FLIGHT NO</label>
                                                            <input type="text" name="outbound_flight" id="outbound_flight" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">DATE</label>
                                                            <input type="text" name="outbound_date" id="outbound_date" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">DESTINATION</label>
                                                            <input type="text" name="outbound_orig" id="outbound_orig" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                           
                                            <div class="row-modal">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label for="">STD (UTC)</label>
                                                            <input type="text" name="outbound_utc" id="outbound_utc" class="form-control" disabled>
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
                                                    <label for="">COMMENTS</label>
                                                    <textarea name="comments" id="comments" class="form-control" disabled></textarea>
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
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminHandling();});</script>
@endsection