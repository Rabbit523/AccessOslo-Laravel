<?php
    $user_lastname = auth()->user()->last_name;
    $user_lastcharacter  = $user_lastname[0];
    $user_bonus = auth()->user()->bonus;
?>
<header>
    <nav class="navbar navbar-accessoslo">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                    aria-controls="navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand-box" href="{{url('/')}}">
                    <img src="/assets/img/logo.jpg" alt="accessoslo" class="img-responsive">
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav box-left">
                    <li><a href="">Access rewards <span class="gold notification">{{$user_bonus}}</span> </a></li>
                    <li class="dropdown">                       
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requests <span class="notification green member_notice" style="display:none;"></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/member/make-request')}}">Make New Request</a>
                            </li>
                            <li>
                                <a href="{{url('/member/upcoming-request')}}">Upcoming Requests <span class="notification green member_notice" style="display:none;"></span></a>
                            </li>
                            <li>
                                <a href="{{url('/member/request-history')}}">Request History</a>
                            </li>
                        </ul>
                    </li>                    
                    <li>
                        <a href="{{url('/member/empty-leg')}}">Empty Leg Flights</a>
                    </li>                   
                </ul>
                <ul class="nav navbar-nav navbar-right" id="dashboard_list" >
                    <li class="dropdown">
                        <a href="{{url('/dashboard')}}" class="dropdown-toggle btn btn-yellow btn-dashboard" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Dashboard</span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#">{{auth()->user()->first_name}} {{$user_lastcharacter}}.</a>
                            </li>
                            <li>
                                <a href="{{url('/member/profile-settings')}}">Profile Settings</a>
                            </li>
                            <li>
                                <a href="{{url('/member/passenger-settings')}}">Passenger Settings</a>
                            </li>
                            <li>
                                <a href="{{url('/member/manage-account')}}">Manage Account</a>
                            </li>                          
                            <li>
                                <a href="{{url('/member/logout')}}">Log out</a>
                            </li>
                        </ul>
                    </li>
                </ul>        
            </div>
        </div>
    </nav>
</header>