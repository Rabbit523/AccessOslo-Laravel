@extends('layouts.public') 
@section('title', $data->meta_title)  
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <div class="container">       
                <div class="row">         
                    <div class="col-xs-12">
                        <h3>Access Oslo News</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        @foreach($datas as $data)
                        <div class="box box-top">                            
                            <div class="col-xs-5">
                                @if($data->post_img)
                                <img class="post_img" src="{{$data->post_img}}">
                                @else
                                <img class="post_img" src="/assets/img/default-blog-image.jpg">
                                @endif
                            </div>
                            <div class="col-xs-7 text_area">
                                <p class="date">Published: {{$data->published_date}}</p>
                                <a class="post_link" data-id="{{$data->id}}"><h4>{{$data->post_title}}</h4></a>                                
                                <p>{{$data->post_description}}</p>
                            </div>                            
                        </div>
                        @endforeach
                        {{$datas->links()}}
                    </div>
                </div>
            </div>
        </section>  
    </div>
@endsection

@section('scripts')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.News();});</script>
@endsection