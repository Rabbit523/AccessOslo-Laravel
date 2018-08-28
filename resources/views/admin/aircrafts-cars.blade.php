@extends('layouts.private') @section('title', 'Hjem') @section('content')
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
                                      <input type="text" name="search" id="search" class="form-control search-form" placeholder="Search by partner, aircraft type, car type">
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="header-list">
                          <div class="row">
                              <div class="label-table image">Image</div>
                              <div class="label-table parnter">Partner</div>
                              <div class="label-table type">Aircraft / Car </div>
                              <div class="label-table capacity">Max Capacity</div>
                              <div class="label-table action">Action</div>                            
                          </div>
                      </div>
                      <div class="items-list">
                        @foreach($aircrafts as $aircraft)
                        <div class="item">
                          <div class="row">
                            <div class="label-table image"><img src="{{$aircraft->img}}"></img></div>
                              <div class="label-table parnter">{{$aircraft->partner_name}}</div>
                              <div class="label-table type">{{$aircraft->type}}</div>
                              <div class="label-table capacity">{{$aircraft->capacity}}</div>
                              <div class="label-table action"><a class="edit" data-source="{{$aircraft}}">Edit</a></div>   
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
              <p id="is_new">NEW AIRCRAFT/CAR</p>
              <p id="is_edit">EDIT AIRCRAFT/CAR</p>                   
          </div>
          <div class="modal-body">
            <form id="modal-form">
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                      <div class="form-group">
                        <label for="">PARTNER NAME</label>
                        <input type="text" name="partner_name" id="partner_name" class="form-control" required>
                      </div>
                  </div>                             
                </div>
              </div>
              <div class="row-modal">
                <div class="row">
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">AIRCRAFT / CAR TYPE</label>
                      <input type="text" name="aircraft" id="aircraft" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                      <label for="">MAX CAPACITY</label>
                      <input type="text" name="capacity" id="capacity" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="row-modal">                    
                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="">UPLOAD IMAGES</label>
                    </div>
                    <div class="upload-image">                          
                        <div class="content">
                            <form action="/" enctype="multipart/form-data" method="POST" class="no-margin">
                              <div class="dropzone" id="image-uploader" name="imageFileUploader">
                                <div class="fallback">
                                    <input name="file" type="file" multiple/>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>        
                    <div id="preview">
                        <div class="modal_img">
                          <img class="img_src" src="" id="img0"><a class="delete" id="delete1">delete</a></img>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img1"><a class="delete" id="delete2">delete</a></img>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img2"><a class="delete" id="delete3">delete</a></img>
                        </div>
                        <div class="modal_img">
                          <img class="img_src" src="" id="img3"><a class="delete" id="delete4">delete</a></img>
                        </div>
                        <div class="modal_img style5">
                          <img class="img_src" src="" id="img4"><a class="delete" id="delete5">delete</a></img>
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
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminAircraftCars();});</script>
@endsection