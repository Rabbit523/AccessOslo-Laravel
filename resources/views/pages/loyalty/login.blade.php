@extends('layouts.public')
@section('title', $data->meta_title)
@section('content')
<div class="wrapper-general">
        <section class="form-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                        <div class="row box">
                            <div class="col-xs-12 col-sm-7 box-left item-box">
                                <h1 class="login_title">@lang('header.login_to')</h1>
                                <form id="login-form">
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" class="form-control user" placeholder="Email address" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control pass" placeholder="Password" required>
                                    </div>
                                    <div class="wrapper-btns row">
                                        <div class="col-xs-12 col-sm-6">
                                            <a id="login-button" type="submit" class="btn btn-yellow">@lang('header.sign_in')</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 text-right">
                                            <a id="reset-password" class="link">@lang('header.forgot_password')</a>
                                        </div>
                                    </div>
                                </form>
                                <form id="reset-email-form">
                                    <div class="form-group">
                                        <input type="email" id="reset-email" class="form-control user" placeholder="Email address" required>
                                    </div>
                                    <div class="wrapper-btns row">
                                        <div class="col-xs-12 col-sm-6">
                                            <a id="email-send" type="submit" class="btn btn-yellow">RESET</a>
                                        </div>
                                    </div>
                                </form>
                                @if ($token !="")
                                @if(session('error'))
                                    <p class="error_message">{{session('error')}}</p>
                                @endif
                                <form id="reset-password-form" action="{{ url('reset_pwd') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group">
                                        <input type="password" class="form-control pass" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control pass" name="confirm_password" placeholder="Retype Password" required>
                                    </div>
                                    <div class="wrapper-btns row">
                                        <div class="col-xs-12 col-sm-6">
                                            <input type="submit" class="btn btn-yellow" value="RESET">
                                        </div>
                                    </div>
                                </form>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-5 box-right item-box">
                                <h2>@lang('header.become_member')</h2>
                                <ul>
                                    <li>Book your flight with us and earn bonus points.</li>
                                    <li>1 % bonus on all flights which you can use for future flights or donate.</li>
                                    <li>Get discounts and invitations to our partners VIP events.</li>
                                    <a href="{{url('/signup')}}" class="btn btn-white">@lang('header.sign_up')</a>
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
    var token = "{{$token}}";
</script>
@include('sweet::alert')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Login();});</script>
@endsection
