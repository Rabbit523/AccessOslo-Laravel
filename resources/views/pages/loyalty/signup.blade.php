@extends('layouts.public') 
@section('title', $data->meta_title)  
@section('content')
<div class="wrapper-general">
    <section class="form-box">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                    <div class="box">
                        <div class="step step-1">
                            <h1>Become a member</h1>
                            <div class="timeline">
                                <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                                <span>
                                    <img src="/assets/img/icon-air.png" alt="">
                                </span>
                                <p class="text-left active">Contact Details</p>
                                <p class="text-right">Flight Details</p>
                            </div>
                            <form name="join_form" id="step1_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-3">
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
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="form-group">
                                            <input id="first_name" name="first_name" type="text" class="form-control user" placeholder="First Name" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="form-group">
                                            <input id="last_name" name="last_name" type="text" class="form-control user" placeholder="Last name" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input id="country" name="country" type="text" class="form-control world" placeholder="Country" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input id="city" name="city" type="text" class="form-control world" placeholder="City" required>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="flewn" id="flewn">I have flewn before</label>  
                                        </div>
                                        <div class="checkbox agree_check">
                                            <label><input type="checkbox" name="agree" id="agree"> I have read and I agree to<a href="">Terms of Service</a></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-left">
                                    <a id="continue" class="btn btn-yellow">Continue</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-2" style="display: none;">
                            <h1>Become a member</h1>
                            <div class="timeline">
                                <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                                <span>
                                    <img src="/assets/img/icon-air.png" alt="">
                                </span>
                                <p class="text-left active">Contact Details</p>
                                <p class="text-right active">Flight Details</p>
                            </div>
                            <form name="step2_form" id="step2_form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" id="email" name="email" class="form-control email" placeholder="Email Address" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="tel" id="phone" name="phone" class="form-control phone" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="password" id="password" name="password" class="form-control pass" placeholder="Password" required>                                            
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <input type="password" id="retype_password" name="retype_password" class="form-control pass" placeholder="Retype Password" required>                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="offer" value="offer" name="offer" >I wish to receive Access Oslo emails with special offers and more.</label>                                            
                                        </div>
                                        <small>We promise to respect your privacy and not share your details.
                                            <br> Look at our
                                            <a href="">privacy policy</a> for more details.</small>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-left">
                                    <a id="register" class="btn btn-yellow">Register</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-3" style="display: none;">
                            <h1>Become a member</h1>
                            <div class="timeline">
                                <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                                <span>
                                    <img src="/assets/img/icon-air.png" alt="">
                                </span>
                                <p class="text-left active">Contact Details</p>
                                <p class="text-right active">Flight Details</p>
                            </div>
                            <form name="step3_form" id="step3_form">
                                <div class="verify-box text-center">
                                    <h2>Verify Your Account</h2>
                                    <p>Please enter your mobile number to verify your account</p>                                
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                                            <div class="input-group">                                                
                                                <div class="form-group">
                                                    <input id="mobile-number" name="mobile-number" type="tel" class="form-control" placeholder="e.g. 70212345" required  title="The invaild phoneNumber">
                                                </div>                                                                                                     
                                            </div>                
                                        </div>
                                    </div>                                
                                </div>
                                <div class="wrapper-btns text-center">
                                    <a id="request_sms" class="btn btn-yellow">Request sms verification</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-4" style="display: none;">
                            <form name="step4_form" id="step4_form">
                                <h1>Become a member</h1>
                                <div class="timeline">
                                    <img src="/assets/img/timeline.png" class="img-responsive" alt="">
                                    <span>
                                        <img src="/assets/img/icon-air.png" alt="">
                                    </span>
                                    <p class="text-left active">Contact Details</p>
                                    <p class="text-right active">Flight Details</p>
                                </div>
                                <div class="sms-box text-center">
                                    <h2>SMS Sent Successfully</h2>
                                    <p>We have just sent a text message to: </p>
                                            
                                    <b id="send_phonenumber">321213</b>
                                    
                                    <p>You should receive it within the next 10 minutes. <br><br>
                                    
                                    To verify you account please enter the code you have received in the SMS message</p>
                                    <div class="box-code">
                                        <input type="text" id="first" name="first" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="second" name="second" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="third" name="third" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="fourth" name="fourth" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="fifth" name="fifth" class="form-control code" maxlength="1" required title="x">
                                        <input type="text" id="sixth" name="sixth" class="form-control code" maxlength="1" required title="x">
                                    </div>
                                </div>
                                <div class="wrapper-btns text-center">
                                    <a class="btn btn-yellow" id="verify">Verify</a>
                                    <div class="clearfix"></div>
                                    <a class="link" id="reSMS">I didn't receive an SMS</a>
                                </div>
                            </form>
                        </div>
                        <div class="step step-5" style="display: none;">
                            <h1>WELCOME TO ACCESS OSLO</h1>
                            <form name="step5_form" id="step5_form" method="post" action="{{ url('/users/start_signup') }}">
                                {{csrf_field()}}
                                <h2>How did you hear about us?</h2>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="radio">
                                        <label><input type="radio" value="advertisement" name="optradio">Advertisement</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="email_last" name="optradio">Email</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="post_mail" name="optradio">Post Mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="radio">
                                            <label><input type="radio" value="search_engine" name="optradio">Search Engine</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" value="referrals" name="optradio">Referrals</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" value="news" name="optradio">News</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="wrapper-btns text-center">
                                    <input type="hidden" id="hidden_email" name="email">
                                    <input type="hidden" id="hidden_pwd" name="password">
                                    <input type="submit" id="start" class="btn btn-yellow" value="Start using loyalty program">
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
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/js/accessoslo.js"></script>

<script>jQuery(function(){new Accessoslo.Controllers.SignUp();});</script>
@endsection