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
    <div class="page-content accessoslo-customers">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table member-since">Member since</div>
                                <div class="label-table title">title</div>
                                <div class="label-table first-name">First Name</div>
                                <div class="label-table last-name">Last Name</div>
                                <div class="label-table phone">Phone</div>
                                <div class="label-table email">Email</div>
                                <div class="label-table action">Action</div>
                            </div>
                        </div>
                        <div class="items-list">
                            @if($counts == 0)
                            <h4>There is nothing!</h4>
                            @endif 
                            @foreach($users as $user)
                            <div class="item">
                                <div class="row">
                                    <div class="label-table member-since">{{$user->created_at}}</div>
                                    <div class="label-table title">{{$user->gender}}</div>
                                    <div class="label-table first-name">{{$user->first_name}}</div>
                                    <div class="label-table last-name">{{$user->last_name}}</div>
                                    <div class="label-table phone">{{$user->phone}}</div>
                                    <div class="label-table email">{{$user->email}}</div>
                                    @if($user->profile_complete == "true")
                                    <div class="label-table action"><a class="view_details" id="{{$user->id}}">View details</a></div>                                                                     
                                    @elseif($user->profile_complete == "false")
                                    <div class="label-table action"><a class="view_details">Not Completed</a></div>                                    
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            {{$users->links()}}
                        </div><!-- items-list -->
                    </div><!-- content-box -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection


@section('scripts')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.AdminCustomers();});</script>
@endsection