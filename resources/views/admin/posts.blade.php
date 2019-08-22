@extends('layouts.private') @section('title', 'Admin Portal') @section('content')
<div class="page-container">
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="title-box">
                        <h1>{{$title}}</h1>                       
                        <a class="btn btn-gray new_post">New Post</a>                    
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
    <div class="page-content accessoslo-posts">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="content-box">
                        <div class="header-list">
                            <div class="row">
                                <div class="label-table title">Title</div>
                                <div class="label-table author">Author</div>
                                <div class="label-table published">Published</div>
                                <div class="label-table updated">Last Updated</div>
                                <div class="label-table status">Status</div>
                            </div>
                        </div>
                        <div class="items-list">
                            @foreach($datas as $data)
                            <div class="item">
                                <div class="row">
                                    <div class="label-table title">{{$data->post_title_plain}} <a class="edit" data-id="{{$data->id}}">Edit</a> <a class="delete" data-id="{{$data->id}}">Delete</a></div>
                                    <div class="label-table author">{{$data->author}}</div>
                                    <div class="label-table published">{{$data->published_date}}</div>
                                    <div class="label-table updated">{{$data->updated_at}}</div>
                                    <div class="label-table status published"><span>{{$data->status}}</span></div>
                                </div>
                            </div>    
                            @endforeach
                            {{$datas->links()}}                          
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
<script>jQuery(function(){new Accessoslo.Controllers.AdminPosts();});</script>
@endsection