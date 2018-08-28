@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('content')
<div class="wrapper-general">
        <section class="form-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="row box">
                            <div class="col-xs-12 col-sm-8 box-left item-box">
                                <h1>ACCESS LOYALTY PROGRAM</h1>
                                <form id="login-form">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control user" placeholder="Email address" required>                                                                  
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control pass" placeholder="Password" required>                                        
                                    </div>                                    
                                    <div class="wrapper-btns row">
                                        <div class="col-xs-12 col-sm-6">
                                            <a id="login-button" type="submit" class="btn btn-yellow">Login</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right">
                                            <a href="{{url('/loyalty-program/login')}}" class="link">Forgot your password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-sm-4 box-right item-box">
                                <h2>BECOME A MEMBER</h2>
                                <ul>
                                    <li>Instant Price Estimates</li>
                                    <li>No Membership Fees</li>
                                    <li>Empty Leg & Charter Requests</li>
                                    <li>Bonus Points Program</li>
                                    <li>News & Special Offers</li>
                                    <a href="{{url('/loyalty-program/signup')}}" class="btn btn-white">Join</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script>
    var redirect = "{{$redirect}}";
</script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Login();});</script>
@endsection