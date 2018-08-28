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
                  <h2>Manage Account</h2>
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
                      <div class="col-xs-12 col-sm-6 box-right">
                          <h3>Security Questions</h3>
                          <p>Please create two securty questions incase you loose your password or have forgotten your password.</p>
                          <form id="security_form">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-4 text-right">
                                      <label for="">Question #1</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-8">
                                      <div class="form-group">
                                          <select name="question1" id="question1" class="form-control" required>
                                              <option disabled selected value>Choose a security question</option>
                                              <option value="question1">Question 1</option>
                                              <option value="question2">Question 2</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-8 col-sm-offset-4">
                                      <div class="form-group">
                                          <input type="password" name="pwd_que1" id="pwd_que1" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-4 text-right">
                                      <label for="">Question #2</label>
                                  </div>
                                  <div class="col-xs-12 col-sm-8">
                                      <div class="form-group">
                                          <select name="question2" id="question2" class="form-control" required>
                                              <option disabled selected value>Choose a security question</option>
                                              <option value="question1">Question 1 </option>
                                              <option value="question2">Question 2</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-8 col-sm-offset-4">
                                      <div class="form-group">
                                          <input type="password" name="pwd_que2" id="pwd_que2" class="form-control" required>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-xs-12 col-sm-8 col-sm-offset-4">
                                      <a id="save" class="btn btn-yellow btn-block">Save security questions</a>
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
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.MemberManageAccount();});</script>
@endsection