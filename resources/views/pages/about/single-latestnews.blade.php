@extends('layouts.public') @section('title', 'Hjem') @section('content')
<div class="wrapper-general">
        <section class="introduction">
            <div class="container">       
                <div class="row">   
                    <div class="col-xs-12">                          
                        <div class="top-info">
                            <div class="col-xs-9 date">
                                <p><span><b>Published: </b><span>{{$data->published_date}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><b>Last updated: </b><span>{{$data->updated_at}}</span></span></p>
                            </div>
                            <div class="col-xs-3">
                                <div class="link">
                                    <span><a id="facebook" style="padding-right:10px;color:#5f6062;"><i class="fa fa-facebook-square"></i></a></span>
                                    <span><a id="twitter" style="padding-right:10px;color:#5f6062;"><i class="fa fa-twitter-square"></i></a></span>
                                    <span><a id="linkedin" style="padding-right:10px;color:#5f6062;"><i class="fa fa-linkedin-square"></i></a></span>
                                    <span><a id="mail" style="color:#5f6062;"><i class="fa fa-envelope-square"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">                       
                        <div class="detail_box">                            
                            <div class="info_title">
                                <h2>{{$data->post_title}}</h2>
                            </div>    
                            <div class="info_image">
                                @if($data->single_img)
                                <img style="width: 100%;" src="{{$data->single_img}}">
                                @else
                                <img class="post_img" src="/assets/img/default-blog-image.jpg">
                                @endif
                            </div>
                            <div class="info_post_description">                                                 
                                <p>{{$data->post_description}}</p>
                            </div>     
                            <div class="info_meta">
                                <p class="meta_title">{{$data->meta_title}}</p>
                                <p> {{$data->meta_description}}</p>
                            </div>                       
                        </div>                 
                        <div class="posts">
                            @foreach($posts as $post)
                            <div class="col-xs-3">
                                @if($post->post_img)
                                <img src="{{$post->post_img}}" style="width:100%;height:165px;padding-top:20px;">
                                @else
                                <img src="/assets/img/default-blog-image.jpg" style="width:100%;height:165px;padding-top:20px;">
                                @endif
                                <p class="post_date"><b>Published:</b> {{$post->published_date}}</p>
                                <a class="post_title" id="selected_post{{$post->id}}" data-source="{{$post->id}}"><p style="padding-left: 20px;">{{$post->post_title}}</p></a>
                            </div>
                            @endforeach
                        </div>    
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection

@section('scripts')
<script>
    var id = {{$data->id}};
</script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.SingleNews();});</script>
@endsection