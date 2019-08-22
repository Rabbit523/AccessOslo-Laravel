<header>
    <nav class="navbar navbar-accessoslo"  id="sticky_navbar">
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
                <li>
                    <a href="{{url('/member/make-request')}}">Make New Request</a>
                </li>
                <li class="dropdown">                       
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Upcoming Requests <span class="notification green member_notice" style="display:none;"></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=executive&status=all-status&show_mode=mode1')}}">Executive Charter</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=emptyleg&status=all-status&show_mode=mode1')}}">Emptyleg Flights</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=limousine&status=all-status&show_mode=mode1')}}">Airport Limo</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=meet&status=all-status&show_mode=mode1')}}">Meet & Greet</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">                       
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">History Requests <span class="notification green member_notice" style="display:none;"></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=executive&status=paid&show_mode=mode1')}}">Executive Charter</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=emptyleg&status=paid&show_mode=mode1')}}">Emptyleg Flights</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=limousine&status=paid&show_mode=mode1')}}">Airport Limo</a>
                        </li>
                        <li>
                            <a href="{{url('/member/upcoming-request-type?charter=meet&status=paid&show_mode=mode1')}}">Meet & Greet</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{url('/member/passenger-settings')}}">My Passengers</a>
                </li>
                <li>
                    <a href="{{url('/member/empty-leg')}}">Available EmptyLeg Flights</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="dashboard_list" >
                <li class="dropdown">
                    <a href="{{url('/dashboard')}}" class="dropdown-toggle btn btn-yellow btn-dashboard" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span>Dashboard</span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{url('/member/dashboard')}}">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
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
    </nav>
</header>