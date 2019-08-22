@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
<div class="page-container">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-box">
                        <h1>{{$title}}</h1>     
                        <a class="btn btn-gray create">Create New</a>               
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
    <div class="page-content accessoslo-aircraft-cars">
      <div class="container-fluid">
          <div class="row">
              <div class="col-xs-12 col-sm-12">
                  <div class="content-box">
                      <div class="form-box">
                          <div class="row">
                              <div class="col-xs-12">
                                  <form>
                                      <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by partner, aircraft type">
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="header-list">
                          <div class="row">
                              <div class="label-table image">Image</div>
                              <div class="label-table parnter">Partner</div>
                              <div class="label-table type">Aircraft </div>
                              <div class="label-table capacity">Seat Capacity</div>
                              <div class="label-table action">Action</div>                            
                          </div>
                      </div>
                      <div class="items-list">
                        @foreach($aircrafts as $aircraft)
                        <div class="item">
                          <div class="row">                            
                            <div class="label-table image"><img src="{{$aircraft->img}}"></div>
                              <div class="label-table parnter">{{$aircraft->partner_name}}</div>
                              <div class="label-table type">{{$aircraft->type}}</div>
                              <div class="label-table capacity">{{$aircraft->capacity}}</div>
                              <div class="label-table action"><a class="edit" data-source="{{$aircraft}}">Edit</a><a class="delete" style="padding-left: 15px;" data-delete="{{$aircraft->id}}">Delete</a></div>   
                            </div>
                        </div>
                        @endforeach
                        {{$aircrafts->links()}}
                      </div>
                  </div><!-- content-box -->
              </div>
          </div>
      </div>
    <div class="modal fade modal-aircraft-cars" id="modal-aircrafts" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              <p id="is_new">NEW AIRCRAFT</p>
              <p id="is_edit">EDIT AIRCRAFT</p>                   
          </div>
          <div class="modal-body">
            <form id="modal-form">
              @if(Auth::User()->role_id == "0")
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                      <div class="form-group">
                        <label for="">PARTNER NAME</label>
                        <select name="partner_name" id="partner_name" class="form-control" required>
                          <option disabled selected value>Partners</option>
                          @foreach($partners as $partner)
                          <option value="{{$partner->partner_name}}">{{$partner->partner_name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>                             
                </div>
              </div>
              @endif
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">AIRCRAFT TYPE</label>
                      <input type="text" name="aircraft" id="aircraft" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">SEAT CAPACITY</label>
                      <input type="text" name="capacity" id="capacity" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">MAX RANGE (NM/KM)</label>
                      <input type="text" name="max_range" id="max_range" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="">WIFI</label>
                        <label class="switch">
                            <input type="checkbox" id="wifi" name="wifi">
                            <span class="slider"></span>
                        </label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">YEAR OF MANUFACTURE</label>
                      <input type="text" name="manufacture" id="manufacture" class="form-control date-own" required>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="">Flight Attendant</label>
                        <label class="switch">
                            <input type="checkbox" id="flight_attendant" name="flight_attendant">
                            <span class="slider"></span>
                        </label>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="row-modal">                    
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <div class="upload-btn-wrapper">
                        <div class="btn" id="banner_img">UPLOAD IMAGES</div>
                        <input id="file_upload" type="file" accept="image/*">
                      </div>
                    </div>                    
                    <div id="preview">
                        <div class="modal_img">
                          <img class="img_src" src="" id="img0"><a class="delete" id="delete1">delete</a>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img1"><a class="delete" id="delete2">delete</a>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img2"><a class="delete" id="delete3">delete</a>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img3"><a class="delete" id="delete4">delete</a>
                        </div>
                        <div class="modal_img style5">
                          <img class="img_src" src="" id="img4"><a class="delete" id="delete5">delete</a>
                        </div>
                    </div>          
                  </div>                                
                </div>
            </div>                      
          </div>
          <div class="modal-footer">
            <a id="add" class="btn btn-block btn-green">Create</a>
            <a id="save" class="btn btn-block btn-green">SAVE</a>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
  var partner_name = "{{$partner_name}}";
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminAircraftCars();});</script>
@endsection