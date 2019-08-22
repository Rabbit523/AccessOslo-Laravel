@extends('layouts.member_public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container wrapper-content">
          <div class="col-xs-12">
              <h1>MANAGE YOUR ACCOUNT</h1>
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">                  
                  <div class="row">
                      <div class="col-xs-12 col-sm-6 box-left">
                          <h3>Change your password</h3>
                          <p>Please create a password that is 8 to 16 characters in length with at least one lowercase letter and one number.</p>
                          <form name="password_form" id="password_form">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Current Password</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="password" name="current_password" id="current_password" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">New Password</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="password" name="new_password" id="new_password" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 text-right">
                                      <label for="">Confirm new Password</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-6">
                                      <div class="form-group">
                                          <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-6 col-sm-offset-6">
                                      <a id="changePassword" class="btn btn-yellow btn-block">Change password</a>
                                  </div>
                              </div>
                          </form>
                      </div>                      
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberManageAccount();});</script>
@endsection