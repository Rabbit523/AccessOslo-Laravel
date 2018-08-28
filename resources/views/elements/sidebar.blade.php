<div class="general-wrapper">
    <nav class="sidebar">
        <div class="brand">
            <a href="{{url('/')}}">
                <img src="/assets/img/admin/logo.png" alt="" class="img-responsive center-block">
            </a>
        </div>
        <ul class="navbar">
            @if(auth()->user()->role_id == 0)
            <li class="{{$title=='Dashboard'?'active':''}}"><a href="{{url('/dashboard')}}">Dashboard</a></li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#sub-menu-1" aria-expanded="false">Request <span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
                <ul class="sub-menu {{$title =='Executive Charter' || $title =='Group Charter' || $title =='Helicopter Charter' || $title =='Cargo & Special Charter' || $title =='MEET & GREET' || $title == 'BOOK AIRPORT LIMOUSINE' || $title =='HANDLING REQUEST' || $title =='AIR PASSENGER TAX' || $title =='Destination Oslo' || $title =='Emptyleg Charter' || $title =='EVENT & GROUP TRAVEL' ?'collapse in':'collapse'}}" id="sub-menu-1">
                    <li class="{{$title =='Executive Charter'?'active':''}}"><a href="{{url('/admin/executive-charter')}}">EXECUTIVE CHARTER<small class="executive_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Group Charter'?'active':''}}"><a href="{{url('/admin/group-charter')}}">GROUP CHARTER <small class="group_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Helicopter Charter'?'active':''}}"><a href="{{url('/admin/helicopter-charter')}}">HELICOPTER CHARTER <small class="helicopter_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Cargo & Special Charter'?'active':''}}"><a href="{{url('/admin/cargo-charter')}}">CARGO & SPECIAL CHARTER <small class="cargo_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='MEET & GREET'?'active':''}}"><a href="{{url('/admin/meet-greet')}}">MEET & GREET <small class="meet_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='BOOK AIRPORT LIMOUSINE'?'active':''}}"><a href="{{url('/admin/airport-limousine')}}">AIRPORT LIMOUSINE <small class="limousine_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='HANDLING REQUEST'?'active':''}}"><a href="{{url('/admin/handling-requests')}}">HANDLING REQUESTS <small class="handling_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='AIR PASSENGER TAX'?'active':''}}"><a href="{{url('/admin/air-passenger')}}">AIR PASSENGER TAX <small class="passenger_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Destination Oslo'?'active':''}}"><a href="{{url('/admin/private-travel')}}">Destination Oslo<small class="private_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='EVENT & GROUP TRAVEL'?'active':''}}"><a href="{{url('/admin/group-travel')}}">EVENT & GROUP TRAVEL <small class="event_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Emptyleg Charter'?'active':''}}"><a href="{{url('/admin/emptyleg')}}"> Emptyleg Charter <small class="emptyleg_badge" style="display:none;"></small></a></li>
                </ul>
            </li>
            <li class="{{$title =='EMPTY LEG FLIGHT'?'active':''}}"><a href="{{url('/admin/empty-leg')}}">EMPTY LEG FLIGHTS</a></li>
            <li class="{{$title =='CUSTOMERS'?'active':''}}"><a href="{{url('/admin/customers')}}">CUSTOMERS</a></li>
            <li class="{{$title =='PARTNERS'?'active':''}}"><a href="{{url('/admin/partners')}}">PARTNERS</a></li>
            <li class="{{$title =='PAGES'?'active':''}}"><a href="{{url('/admin/pages')}}">PAGES</a></li>
            <li class="{{$title =='POSTS'?'active':''}}"><a href="{{url('/admin/posts')}}">POSTS</a></li>  
            <li class="{{$title =='AIRCRAFTS & CARS'?'active':''}}"><a href="{{url('/admin/aircrafts-cars')}}">AIRCRAFTS & CARS</a></li>  
            <li class="{{$title =='settings'?'active':''}}"><a href="{{url('/admin/settings')}}">SETTINGS</a></li>
            <li class="{{$title =='logout'?'active':''}}"><a href="{{url('/admin/logout')}}">LOG OUT</a></li>
            @endif
            @if(auth()->user()->role_id == 1)
            <li>
                <a href="#" data-toggle="collapse" data-target="#sub-menu-1" aria-expanded="false">Request <span><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
                <ul class="sub-menu {{$title =='Executive Charter' || $title =='Group Charter' || $title =='Helicopter Charter' || $title =='Cargo & Special Charter' || $title =='MEET & GREET' || $title == 'BOOK AIRPORT LIMOUSINE' || $title =='HANDLING REQUEST' || $title =='AIR PASSENGER TAX' || $title =='Destination Oslo' || $title =='Emptyleg Charter' || $title =='EVENT & GROUP TRAVEL' ?'collapse in':'collapse'}}" id="sub-menu-1">
                    <li class="{{$title =='Executive Charter'?'active':''}}"><a href="{{url('/admin/executive-charter')}}">EXECUTIVE CHARTER<small class="executive_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Group Charter'?'active':''}}"><a href="{{url('/admin/group-charter')}}">GROUP CHARTER<small class="group_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Helicopter Charter'?'active':''}}"><a href="{{url('/admin/helicopter-charter')}}">HELICOPTER CHARTER <small class="helicopter_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Cargo & Special Charter'?'active':''}}"><a href="{{url('/admin/cargo-charter')}}">CARGO & SPECIAL CHARTER <small class="cargo_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='MEET & GREET'?'active':''}}"><a href="{{url('/admin/meet-greet')}}">MEET & GREET <small class="meet_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='BOOK AIRPORT LIMOUSINE'?'active':''}}"><a href="{{url('/admin/airport-limousine')}}">AIRPORT LIMOUSINE<small class="limousine_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='HANDLING REQUEST'?'active':''}}"><a href="{{url('/admin/handling-requests')}}">HANDLING REQUESTS<small class="handling_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='AIR PASSENGER TAX'?'active':''}}"><a href="{{url('/admin/air-passenger')}}">AIR PASSENGER TAX<small class="passenger_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Destination Oslo'?'active':''}}"><a href="{{url('/admin/private-travel')}}">Destination Oslo<small class="private_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='EVENT & GROUP TRAVEL'?'active':''}}"><a href="{{url('/admin/group-travel')}}">EVENT & GROUP TRAVEL<small class="event_badge" style="display:none;"></small></a></li>
                    <li class="{{$title =='Emptyleg Charter'?'active':''}}"><a href="{{url('/admin/emptyleg')}}"> Emptyleg Charter <small class="emptyleg_badge" style="display:none;"></small></a></li>
                </ul>
            </li>
            @if(auth()->user()->permission == "true")
            <li class="{{$title =='EMPTY LEG FLIGHT'?'active':''}}"><a href="{{url('/admin/empty-leg')}}">EMPTY LEG FLIGHTS</a></li>
            @endif
            <li class="{{$title =='AIRCRAFTS & CARS'?'active':''}}"><a href="{{url('/admin/aircrafts-cars')}}">AIRCRAFTS & CARS</a></li>  
            <li class="{{$title =='settings'?'active':''}}"><a href="{{url('/admin/settings')}}">SETTINGS</a></li>
            <li class="{{$title =='logout'?'active':''}}"><a href="{{url('/admin/logout')}}">LOG OUT</a></li>
            @endif
        </ul>
        <div class="copyright">
            <p>© 2018. ACCESS OSLO AS. <br> WEB DEVELOPMENT: FANTASYLAB</p>
        </div>
    </nav>

   