@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
<div class="page-container">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-box">
                        <h1>{{$title}}</h1>  
                        <a type="button" class="btn btn-gray" id="addNew">New Partner</a>                       
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
    <div class="page-content accessoslo-partners" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <form >
                                        <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by Contact Person, Company">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table partner-name">Partner name</div>
                                <div class="label-table partner-type">Partner Type</div>
                                <div class="label-table contact">Contact person</div>                           
                                <div class="label-table last-audit">Last Audit</div>
                                <div class="label-table permission">Average Flight</div>
                                <div class="label-table action">info</div>
                            </div>
                        </div>
                        <div class="items-list">
                        @if($counts == 0)
                        <h4>There is nothing!</h4>
                        @endif 
                        @foreach($datas as $data)
                            <div class="item">
                                <div class="row">
                                    <div class="label-table partner-name">{{$data->partner_name}}</div>
                                    <div class="label-table partner-type">
                                        @if($data['type'] == "aircharter")
                                        Air Charter
                                        @else
                                        Norway Partner
                                        @endif
                                    </div>
                                    <div class="label-table contact">{{$data->contact_person}}</div>                                   
                                    <div class="label-table last-audit">{{$data->last_audit}}</div>
                                    <div class="label-table permission">{{$data->average_flight}}</div>
                                    <div class="label-table action">
                                        <a class="delete" data-id="{{$data->id}}" style="padding-right: 10px;">Delete</a>
                                        <a class="more_details" data-source="{{$data}}">More details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{$datas->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-partners" id="modal-partners" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>                        
                        <p id="type-create">Create</p>
                        <h4 id="new-partner-name">NEW PARTNER</h4>
                        <p id="type-edit">EDIT PARTNER</p>
                        <h4 id="edit-partner-name"></h4>
                    </div>
                    <div class="modal-body">
                        <form name="partner_form" id="partner_form">
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">PARTNER NAME</label>
                                            <input type="text" name="partner_name" id="partner_name" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">CONTACT PERSON</label>
                                            <input type="text" name="contact_person" id="contact_person" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">                    
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">PHONE</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">EMAIL</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">                    
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">LAST AUDIT</label>
                                            <input type="text" name="last_audit" id="partner_datepicker" class="form-control date" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Insurance Coverage (USD) </label>
                                            <input type="text" name="coverage" id="coverage" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Average Flight Crew Experience (flight hours)</label>
                                            <input type="text" name="avg_flight" id="avg_flight" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="" style="padding-top: 18px;">OPERATIVE SINCE</label>
                                            <input type="text" class="form-control date-own" id="operate_since" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">ADDITIONAL FEE (%)</label>
                                            <input type="text" class="form-control" id="additional_fee" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Main Image</label>
                                            <input id="main_image_upload" type="file" class="form-control" multiple accept="image/*">
                                            <input type="hidden" id="main_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">VALID AOC</label>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="custom-radio">
                                                        <label class="radio-inline">
                                                            <input type="radio" name="optionvalidaoc" value="yes" checked="checked">Yes<span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="custom-radio">
                                                        <label class="radio-inline">
                                                            <input type="radio"name="optionvalidaoc" value="no">No<span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">EMPTY LEG PERMISSION</label>
                                            <label class="switch">
                                                <input type="checkbox" id="permission" name="permission">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">CATEGORY</label>
                                            <select name="category" id="category" class="form-control" required>
                                                <option disabled selected value>Select Type</option>
                                                <option value="aircharter">Air Charter</option>
                                                <option value="norway">Norway Partners</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">Sub Image</label>
                                            <input id="file_upload" type="file" class="form-control" multiple accept="image/*">
                                            <input type="hidden" id="sub_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-modal norway_description">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="">Norway Partner Description</label>
                                            <div id="norway_description" name="norway_description" required></div>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="row-modal">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">PASSWORD</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="">RE-TYPE PASSWORD</label>
                                            <input type="password" name="re_password" id="repassword" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" id="save" class="btn btn-block btn-green" value="SAVE PARTNER">
                            <input type="submit" id="update" class="btn btn-block btn-green" value="UPDATE PARTNER">                            
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminPartners();});</script>
@endsection