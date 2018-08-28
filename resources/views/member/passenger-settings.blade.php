@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
  <section class="introduction">      
      <div class="container wrapper-content">
          <div class="col-xs-12">
              <h1>Add new passengers</h1>
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 box-left">
                          <h2>Passenger Settings</h2>
                          <h3>Add new passenger</h3>
                          <p>Please add the information about the people you travel with. Add as many as you may need.</p>
                          <form name="input_form" id="input-form">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Gender</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <select name="gender" id="gender" class="form-control" required>
                                              <option disabled selected value>Gender</option>
                                              <option value="Mr">Mr</option>
                                              <option value="Mrs">Mrs</option>
                                              <option value="Miss">Miss</option>
                                              <option value="Sir">Sir</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">First name</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="firstname" id="first_name" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Last name</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="lastname" id="last_name" class="form-control" required>
                                      </div>
                                  </div>
                              </div>                                                                           
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Date of birth</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="text" name="birth" id="birth" class="form-control" placeholder="dd/mm/yyyy" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Nationality</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                    <div class="input-group">
                                        <div class="form-group">
                                            <input id="nationality" type="text" name="nationality" class="form-control" required>                                        
                                        </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 col-sm-offset-6">
                                      <a id="add_passenger" class="btn btn-yellow btn-block">Add passenger</a>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <accessoslo-passenger></accessoslo-passenger>                      
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/vendor/countrySelect.min.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberPassengerSettings();});</script>
@endsection