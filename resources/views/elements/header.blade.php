<header>
@desktop
@if(Request::segment(1) == 'news' || Request::segment(1) == 'signup' || Request::segment(1) == 'login' || Request::segment(1) == 'reset_password')
<nav class="navbar navbar-accessoslo" id="sticky_navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(!auth()->user())
        <a class="brand-box" href="{{url('/')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user())
        @if(auth()->user()->role_id == 0)
        <a class="brand-box" href="{{url('/dashboard')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 1)
        <a class="brand-box" href="{{url('/admin/executive-charter')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 2)
        <a class="brand-box" href="{{url('/member/dashboard')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @endif
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav box-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.destination_mangement')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/destination-oslo')}}">@lang('header.destination_oslo')</a>
                    </li> 
                    <li>
                        <a href="{{url('/destination-bergen')}}">@lang('header.destination_bergen')</a>
                    </li>
                    <li>
                        <a href="{{url('/tromso')}}">@lang('header.destination_tromso')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Events/MICE
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                <li>
                        <a href="{{url('/meetings')}}">@lang('header.meeting')</a>
                    </li> 
                    <li>
                        <a href="{{url('/incentives')}}">@lang('header.incentives')</a>
                    </li>
                    <li>
                        <a href="{{url('/conference')}}">@lang('header.conference')</a>
                    </li>
                    <li>
                        <a href="{{url('/events')}}">@lang('header.events')</a>
                    </li>
                    <li>
                        <a href="{{url('/weddings')}}">@lang('header.weddings')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.air_charter')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/executive-charter')}}">@lang('header.executive_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/group-charter')}}">@lang('header.group_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/helicopter-charter')}}">@lang('header.helicopter_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/cargo-charter')}}">@lang('header.cargo_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/empty-leg-flights')}}">@lang('header.empty_flight')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.airport_service')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/meet-greet')}}">@lang('header.meet_greet')</a>
                    </li>
                    <li>
                        <a href="{{url('/airport-limo')}}">@lang('header.airport_limo')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.fbo_handling')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/oslo-fbo')}}">@lang('header.oslo_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/sandefjord-fbo')}}">@lang('header.sandefjord_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/flight-supervision')}}">@lang('header.flight_super')</a>
                    </li>
                    <li>
                        <a href="{{url('/vip-catering')}}">@lang('header.vip_catering')</a>
                    </li>
                    <li>
                        <a href="{{url('/air-passenger-tax')}}">@lang('header.passenger_tax')</a>
                    </li>
                    <li>
                        <a href="{{url('/handling-request')}}">@lang('header.handling_request')</a>
                    </li>
                </ul>
            </li>                
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.about')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/contact')}}">@lang('header.contact_us')</a>
                    </li>
                    <li>
                        <a href="{{url('/why-accessoslo')}}">@lang('header.why_access')</a>
                    </li>
                    <li>
                        <a href="{{url('/partners')}}">@lang('header.our_partner')</a>
                    </li>
                    <li>
                        <a href="{{url('/news')}}">@lang('header.latest_news')</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!auth()->user())
                <li><a href="{{route('login')}}" class="login">@lang('header.login')</a></li>
            @endif
            @if(!auth()->user())
                <li><a class="btn btn-yellow" href="{{url('/signup')}}">@lang('header.signup')</a></li>
            @endif
            @if(auth()->user())
                @if(auth()->user()->role_id == 0 || auth()->user()->role_id == 1)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/dashboard')}}">@lang('header.dashboard')</a>
                @endif
                @if(auth()->user()->role_id == 2)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/member/dashboard')}}">@lang('header.dashboard')</a>
                @endif
            @endif                   
        </ul>
    </div>        
</nav>
@else
<nav class="navbar navbar-accessoslo-transparent" id="sticky_navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(!auth()->user())
        <a class="brand-box" href="{{url('/')}}">
            <img src="/assets/img/accessoslo-white-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user())
        @if(auth()->user()->role_id == 0)
        <a class="brand-box" href="{{url('/dashboard')}}">
            <img src="/assets/img/accessoslo-white-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 1)
        <a class="brand-box" href="{{url('/admin/executive-charter')}}">
            <img src="/assets/img/accessoslo-white-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 2)
        <a class="brand-box" href="{{url('/member/dashboard')}}">
            <img src="/assets/img/accessoslo-white-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @endif
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav box-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.destination_mangement')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/destination-oslo')}}">@lang('header.destination_oslo')</a>
                    </li> 
                    <li>
                        <a href="{{url('/destination-bergen')}}">@lang('header.destination_bergen')</a>
                    </li>
                    <li>
                        <a href="{{url('/tromso')}}">@lang('header.destination_tromso')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.events_mice')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/meetings')}}">@lang('header.meeting')</a>
                    </li> 
                    <li>
                        <a href="{{url('/incentives')}}">@lang('header.incentives')</a>
                    </li>
                    <li>
                        <a href="{{url('/conference')}}">@lang('header.conference')</a>
                    </li>
                    <li>
                        <a href="{{url('/events')}}">@lang('header.events')</a>
                    </li>
                    <li>
                        <a href="{{url('/weddings')}}">@lang('header.weddings')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>                                                      
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.air_charter')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/executive-charter')}}">@lang('header.executive_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/group-charter')}}">@lang('header.group_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/helicopter-charter')}}">@lang('header.helicopter_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/cargo-charter')}}">@lang('header.cargo_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/empty-leg-flights')}}">@lang('header.empty_flight')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.airport_service')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/meet-greet')}}">@lang('header.meet_greet')</a>
                    </li>
                    <li>
                        <a href="{{url('/airport-limo')}}">@lang('header.airport_limo')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.fbo_handling')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/oslo-fbo')}}">@lang('header.oslo_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/sandefjord-fbo')}}">@lang('header.sandefjord_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/flight-supervision')}}">@lang('header.flight_super')</a>
                    </li>
                    <li>
                        <a href="{{url('/vip-catering')}}">@lang('header.vip_catering')</a>
                    </li>
                    <li>
                        <a href="{{url('/air-passenger-tax')}}">@lang('header.passenger_tax')</a>
                    </li>
                    <li>
                        <a href="{{url('/handling-request')}}">@lang('header.handling_request')</a>
                    </li>
                </ul>
            </li>                
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.about')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/contact')}}">@lang('header.contact_us')</a>
                    </li>
                    <li>
                        <a href="{{url('/why-accessoslo')}}">@lang('header.why_access')</a>
                    </li>
                    <li>
                        <a href="{{url('/partners')}}">@lang('header.our_partner')</a>
                    </li>
                    <li>
                        <a href="{{url('/news')}}">@lang('header.latest_news')</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!auth()->user())
                <li><a href="{{route('login')}}" class="login">@lang('header.login')</a></li>
            @endif
            @if(!auth()->user())
                <li><a class="btn btn-yellow" href="{{url('/signup')}}">@lang('header.signup')</a></li>
            @endif
            @if(auth()->user())
                @if(auth()->user()->role_id == 0 || auth()->user()->role_id == 1)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/dashboard')}}">@lang('header.dashboard')</a>
                @endif
                @if(auth()->user()->role_id == 2)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/member/dashboard')}}">@lang('header.dashboard')</a>
                @endif
            @endif
        </ul>
    </div>
</nav>
@endif
@elsedesktop
<nav class="navbar navbar-accessoslo" id="sticky_navbar">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
            aria-controls="navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        @if(!auth()->user())
        <a class="brand-box" href="{{url('/')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user())
        @if(auth()->user()->role_id == 0)
        <a class="brand-box" href="{{url('/dashboard')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 1)
        <a class="brand-box" href="{{url('/admin/executive-charter')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @if(auth()->user()->role_id == 2)
        <a class="brand-box" href="{{url('/member/dashboard')}}">
            <img src="/assets/img/accessoslo-gray-logo.svg" alt="accessoslo" class="img-responsive">
        </a>
        @endif
        @endif
    </div>
    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav box-left">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.destination_mangement')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/destination-oslo')}}">@lang('header.destination_oslo')</a>
                    </li> 
                    <li>
                        <a href="{{url('/destination-bergen')}}">@lang('header.destination_bergen')</a>
                    </li>
                    <li>
                        <a href="{{url('/tromso')}}">@lang('header.destination_tromso')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>      
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.events_mice')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/meetings')}}">@lang('header.meeting')</a>
                    </li> 
                    <li>
                        <a href="{{url('/incentives')}}">@lang('header.incentives')</a>
                    </li>
                    <li>
                        <a href="{{url('/conference')}}">@lang('header.conference')</a>
                    </li>
                    <li>
                        <a href="{{url('/events')}}">@lang('header.events')</a>
                    </li>
                    <li>
                        <a href="{{url('/weddings')}}">@lang('header.weddings')</a>
                    </li>
                    <li>
                        <a href="{{url('/ground-transport')}}">@lang('header.ground_transport')</a>
                    </li>  
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.air_charter')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/executive-charter')}}">@lang('header.executive_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/group-charter')}}">@lang('header.group_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/helicopter-charter')}}">@lang('header.helicopter_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/cargo-charter')}}">@lang('header.cargo_charter')</a>
                    </li>
                    <li>
                        <a href="{{url('/empty-leg-flights')}}">@lang('header.empty_flight')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.airport_service')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/meet-greet')}}">@lang('header.meet_greet')</a>
                    </li>
                    <li>
                        <a href="{{url('/airport-limo')}}">@lang('header.airport_limo')</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.fbo_handling')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/oslo-fbo')}}">@lang('header.oslo_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/sandefjord-fbo')}}">@lang('header.sandefjord_fbo')</a>
                    </li>
                    <li>
                        <a href="{{url('/flight-supervision')}}">@lang('header.flight_super')</a>
                    </li>
                    <li>
                        <a href="{{url('/vip-catering')}}">@lang('header.vip_catering')</a>
                    </li>
                    <li>
                        <a href="{{url('/air-passenger-tax')}}">@lang('header.passenger_tax')</a>
                    </li>
                    <li>
                        <a href="{{url('/handling-request')}}">@lang('header.handling_request')</a>
                    </li>
                </ul>
            </li>                
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('header.about')
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="{{url('/contact')}}">@lang('header.contact_us')</a>
                    </li>
                    <li>
                        <a href="{{url('/why-accessoslo')}}">@lang('header.why_access')</a>
                    </li>
                    <li>
                        <a href="{{url('/partners')}}">@lang('header.our_partner')</a>
                    </li>
                    <li>
                        <a href="{{url('/news')}}">@lang('header.latest_news')</a>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(!auth()->user())
                <li><a href="{{route('login')}}" class="login">@lang('header.login')</a></li>
            @endif
            @if(!auth()->user())
                <li><a class="btn btn-yellow" href="{{url('/signup')}}">@lang('header.signup')</a></li>
            @endif
            @if(auth()->user())
                @if(auth()->user()->role_id == 0 || auth()->user()->role_id == 1)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/dashboard')}}">@lang('header.dashboard')</a>
                @endif
                @if(auth()->user()->role_id == 2)
                <a class="btn btn-yellow btn-dashboard" href="{{url('/member/dashboard')}}">@lang('header.dashboard')</a>
                @endif
            @endif                   
        </ul>
    </div>        
</nav>
@enddesktop
</header>
