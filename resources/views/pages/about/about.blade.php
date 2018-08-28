@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <div class="slider">
                            <img src="/assets/img/bg/meet-dedicated.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="box">
                        @if ($data->status == "published")
                            {!! $data->page_title !!}
                        @else
                            <h1><span>MEET </span> THE DEDICATED TEAM</h1>
                            <span class="share">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                        @endif 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-8">
                        <div class="box box-left">
                        @if ($data->status == "published")
                        {!! $data->page_content !!}
                        @else
                            <h2>THIS IS A H2 TITLE</h2>   
                            <h4>Lorem ipsum is simply a dummy text of the printing and typeseting industry.</h4>
                                    
                            <h3>Lorem ipsum dolor H3</h3>
                            <p class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    
                            <h3>Lorem ipsum dolor H3</h3>
                                    
                            <p  class="text-justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially </p>
                        @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="box box-right">
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/img-1-team.jpg" class="img-responsive center-block" alt="">
                                </figure>
                                <div>
                                    <h5>Aleksander Aaland</h5>
                                    <p>CHAIRMAN AND MARKETING MANAGER</p>
                                </div>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/img-2-team.jpg" class="img-responsive center-block" alt="">
                                </figure>
                                <div>
                                    <h5>Aleksander Aaland</h5>
                                    <p>CHAIRMAN AND MARKETING MANAGER</p>
                                </div>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/img-3-team.jpg" class="img-responsive center-block" alt="">
                                </figure>
                                <div>
                                    <h5>Aleksander Aaland</h5>
                                    <p>CHAIRMAN AND MARKETING MANAGER</p>
                                </div>
                            </div>
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/img-1-team.jpg" class="img-responsive center-block" alt="">
                                </figure>
                                <div>
                                    <h5>Aleksander Aaland</h5>
                                    <p>CHAIRMAN AND MARKETING MANAGER</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection