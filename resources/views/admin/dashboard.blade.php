@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
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
    <div class="page-content accessoslo-dashboard">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <accessoslo-dashboard></accessoslo-dashboard>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
@endsection