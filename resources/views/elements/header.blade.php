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
                @if(!auth()->user())
                <a class="brand-box" href="{{url('/')}}">
                    <img src="/assets/img/logo.jpg" alt="accessoslo" class="img-responsive">
                </a>
                @endif
                @if(auth()->user())
                @if(auth()->user()->role_id == 0)
                <a class="brand-box" href="{{url('/dashboard')}}">
                    <img src="/assets/img/logo.jpg" alt="accessoslo" class="img-responsive">
                </a>
                @endif
                @if(auth()->user()->role_id == 1)
                <a class="brand-box" href="{{url('/admin/executive-charter')}}">
                    <img src="/assets/img/logo.jpg" alt="accessoslo" class="img-responsive">
                </a>
                @endif
                @if(auth()->user()->role_id == 2)
                <a class="brand-box" href="{{url('/member/dashboard')}}">
                    <img src="/assets/img/logo.jpg" alt="accessoslo" class="img-responsive">
                </a>
                @endif
                @endif
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav box-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Air Charter
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/air-charter/passenger-charter')}}">PASSENGER CHARTER</a>
                            </li>
                            <li>
                                <a href="{{url('/air-charter/executive-charter')}}">EXECUTIVE CHARTER</a>
                            </li>
                            <li>
                                <a href="{{url('/air-charter/group-charter')}}">GROUP CHARTER</a>
                            </li>    
                            <li>
                                <a href="{{url('/air-charter/helicopter-charter')}}">HELICOPTER CHARTER</a>
                            </li>     
                            <li>
                                <a href="{{url('/air-charter/cargo-charter')}}">CARGO & SPECIAL CHARTER</a>                                
                            </li>                          
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Airport Services
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/airport-services/meet-greet')}}">MEET AND GREET</a>
                            </li>
                            <li>
                                <a href="{{url('/airport-services/limousine-transport')}}">LIMOUSINE TRANSPORT</a>
                            </li>                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FBO & HANDLING
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/fbo/oslo-fbo')}}">OSLO FBO (OSLO/ENGM)</a>
                            </li>
                            <li>
                                <a href="{{url('/fbo/sandejord-fbo')}}">SANDEJORD FBO(TRF/ENTO)</a>
                            </li>
                            <li>
                                <a href="{{url('/fbo/fbo-services')}}">FBO SERVICES</a>
                            </li>
                            <li>
                                <a href="{{url('/airport-services/handling')}}">HANDLING REQUEST</a>
                            </li>
                            <li>
                                <a href="{{url('/fbo/supervision')}}">SUPERVISION</a>
                            </li>
                            <li>
                                <a href="{{url('/fbo/vip-catering')}}">VIP CATERING</a>
                            </li>
                            <li>
                                <a href="{{url('/fbo/air-passenger-tax')}}">AIR PASSENGER TAX</a>
                            </li>
                        </ul>
                    </li>                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Destination Management
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">                                                  
                            <li>
                                <a href="{{url('/travel/private-travel')}}">DESTINATION OSLO</a>
                            </li>                            
                            <li>
                                <a href="{{url('/travel/event-travel')}}">EVENT & GROUP TRAVEL</a>
                            </li>
                        </ul>
                    </li>                  
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Access Loyalty
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{route('login')}}">LOG IN</a>
                            </li>
                            <li>
                                <a href="{{route('signup')}}">SIGN UP</a>
                            </li>
                        </ul>
                    </li>                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{url('/about/contact-us')}}">CONTACT US</a>
                            </li>
                            <li>
                                <a href="{{url('/about/why-us')}}">WHY US</a>
                            </li>                           
                            <li>
                                <a href="{{url('/about/our-team')}}">OUR TEAM</a>
                            </li>
                            <li>
                                <a href="{{url('/about/safety')}}">SAFETY</a>
                            </li>
                            <li>
                                <a href="{{url('/about/our-partners')}}">OUR PARTNERS</a>
                            </li>
                            <li>
                                <a href="{{url('/about/latest-news')}}">LASTEST NEWS</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        @if(!auth()->user())
                            <a class="btn btn-yellow" href="{{url('/loyalty-program/login')}}">Login</a> 
                        @endif     
                        @if(auth()->user())
                            @if(auth()->user()->role_id == 0 || auth()->user()->role_id == 1)
                            <a class="btn btn-yellow btn-dashboard" href="{{url('/dashboard')}}">Dashboard</a> 
                            @endif
                            @if(auth()->user()->role_id == 2)
                            <a class="btn btn-yellow btn-dashboard" href="{{url('/member/dashboard')}}">Dashboard</a> 
                            @endif
                        @endif                        
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>