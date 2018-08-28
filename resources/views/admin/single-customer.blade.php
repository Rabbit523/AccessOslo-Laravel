@extends('layouts.private') @section('title', 'Hjem') @section('content')
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
    <div class="page-content accessoslo-single-post">
        <div class="container-fluid">
            <div class="content-box">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="module">
                            <div class="title">
                                <h6>TOTAL BONUS POINTS</h6>
                            </div>
                            <div class="content type-default">
                                <div class="bonus_input">
                                    <input type="text" class="total_bonus" name="total_bonus" id="total_bonus{{$user->id}}">
                                </div>
                                <div class="bonus_button">  
                                    <a class="btn btn-block btn-green give_bonus" >GIVE POINTS</a>
                                </div>         
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="module">
                                    <div class="title">
                                        <h6>BASIC INFORMATION</h6>
                                    </div>
                                    <div class="content type-default">
                                        <p>{{$user->gender}}. {{$user->first_name}} {{$user->last_name}} <br>
                                        {{$user->email}} <br>
                                        {{$user->mobile_phone}} <br>
                                       {{$user->date_birth}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="module">
                                    <div class="title">
                                        <h6>CONTACT INFORMATION</h6>
                                    </div>
                                    <div class="content type-default">
                                        <p>{{$user->company}} <br>
                                        {{$user->job}} <br>
                                        H: ({{$user->home_phone}}), M: ({{$user->mobile_phone}}), B: ({{$user->business_phone}}) <br>
                                        {{$user->mobile_type}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="module">
                                    <div class="title">
                                        <h6>ADDRESS INFORMATION</h6>
                                    </div>
                                    <div class="content type-default">
                                        <p>Address1 line1: {{$user->addInfo_address1}} <br>
                                        Address1 line2: {{$user->addInfo_address2}}<br>
                                        City/Town: {{$user->addInfo_city}} <br>
                                        Region: {{$user->addInfo_region}} <br>
                                        Postcode: {{$user->addInfo_code}} <br>
                                        Country: {{$user->addInfo_country}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="module">
                                    <div class="title">
                                        <h6>BILLING INFORMATION</h6>
                                    </div>
                                    <div class="content type-default">
                                        <p>Address1 line1: {{$user->billInfo_address1}} <br>
                                        Address1 line2: {{$user->billInfo_address2}}<br>
                                        City/Town: {{$user->billInfo_city}} <br>
                                        Region: {{$user->billInfo_region}} <br>
                                        Postcode: {{$user->billInfo_code}} <br>
                                        Country: {{$user->billInfo_country}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="module">
                                    <div class="title">
                                        <h6>PASSENGER INFORMATION</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-custom">
                                            <div class="content type-default">
                                                <p>Title <br>
                                                First name <br>
                                                Last name <br>
                                                Passport number <br>
                                                Passport issue date <br>
                                                Passport expiry date <br>
                                                Date of birth <br>
                                                Nationality</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-custom">
                                            <div class="content type-default">
                                                <p>Title <br>
                                                First name <br>
                                                Last name <br>
                                                Passport number <br>
                                                Passport issue date <br>
                                                Passport expiry date <br>
                                                Date of birth <br>
                                                Nationality</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-custom">
                                            <div class="content type-default">
                                                <p>Title <br>
                                                First name <br>
                                                Last name <br>
                                                Passport number <br>
                                                Passport issue date <br>
                                                Passport expiry date <br>
                                                Date of birth <br>
                                                Nationality</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-custom">
                                            <div class="content type-default">
                                                <p>Title <br>
                                                First name <br>
                                                Last name <br>
                                                Passport number <br>
                                                Passport issue date <br>
                                                Passport expiry date <br>
                                                Date of birth <br>
                                                Nationality</p>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-custom">
                                            <div class="content type-default">
                                                <p>Title <br>
                                                First name <br>
                                                Last name <br>
                                                Passport number <br>
                                                Passport issue date <br>
                                                Passport expiry date <br>
                                                Date of birth <br>
                                                Nationality</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12 col-sm-12">
                                <div class="module">
                                    <div class="title">
                                        <h6>PASSENGER INFORMATION</h6>
                                    </div>
                                    <div class="content type-default">
                                        <p>No passengers added yet</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- content-box -->
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    var user_email = "{{$user->email}}";
</script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminSingleCustomer();});</script>
@endsection