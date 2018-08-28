@extends('layouts.public') 
@section('title', $partner->meta_title) 
@section('description', $partner->meta_description)
@section('content')
<div class="wrapper-general">
        <section class="introduction">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="box">
                        @if ($partner->status == "published")
                            {!! $partner->page_title !!}
                            {!! $partner->page_content !!}
                        @else
                            <h1>Partners</h1>
                            <p>Lorem ipsum dolor sit amet consectetur ipsum 
                            dolor remi obligado remi opsum. This is just a 
                            dummy text for you to read meanwhile we are 
                            working on new text. Lorem ipsum dolor sit 
                            amet consectetur.</p>
                            <span class="share">
                                <i class="fa fa-share-alt" aria-hidden="true"></i>
                            </span>
                        @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="slider">
                            <img src="/assets/img/bg/slider-partners.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="wrapper-content">
            <div class="container">
                <div class="partners-group">
                    <div class="title">
                        <h2>Air Charter</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row grid">
                        @foreach($datas as $data)
                        <div class="col-xs-12 col-sm-4">
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                                </figure>
                                <div class="box-top">
                                    <h3>{{$data->partner_name}}</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. 
                                    This is just a dummy text for you to read meanwhile we are working on new text. Lorem ipsum dolor sit amet consectetur.</p>
                                    <a class="btn btn-border-gold view_details" id="{{$data->id}}">View details</a>
                                </div>
                                <div class="contact-box">
                                    <h4>Contact {{$data->partner_name}}</h4>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>PO Box: {{$data->post_box}} </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> {{$data->phone}}  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> {{$data->phone}}  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <a href="" target="_blank">{{$data->site_url}}</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> {{$data->email}}  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        @endforeach
                        {{$datas->links()}}                                       
                    </div>
                </div>
                <div class="partners-group">
                    <div class="title">
                        <h2>Hotels</h2>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row grid">
                        <div class="col-xs-12 col-sm-4">
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                                </figure>
                                <div class="box-top">
                                    <h3>Royal Jet Group</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. 
                                    This is just a dummy text for you to read meanwhile we are working on new text. Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <div class="contact-box">
                                    <h4>Contact Royal Jet Group</h4>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>PO Box: 60666, Abu Dhabi, United Arab Emirates </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> +97 125051777  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p>+97 125051850  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <a href="" target="_blank">www.royaljetgroup.com</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> info@royaljetgroup.com  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                                </figure>
                                <div class="box-top">
                                    <h3>Royal Jet Group</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. 
                                    This is just a dummy text for you to read meanwhile we are working on new text. Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <div class="contact-box">
                                    <h4>Contact Royal Jet Group</h4>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>PO Box: 60666, Abu Dhabi, United Arab Emirates </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> +97 125051777  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p>+97 125051850  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <a href="" target="_blank">www.royaljetgroup.com</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> info@royaljetgroup.com  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="item">
                                <figure>
                                    <img src="/assets/img/partners-logo.jpg" class="center-block img-responsive" alt="">
                                </figure>
                                <div class="box-top">
                                    <h3>Royal Jet Group</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. 
                                    This is just a dummy text for you to read meanwhile we are working on new text. Lorem ipsum dolor sit amet consectetur.</p>
                                </div>
                                <div class="contact-box">
                                    <h4>Contact Royal Jet Group</h4>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>PO Box: 60666, Abu Dhabi, United Arab Emirates </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> +97 125051777  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p>+97 125051850  </p>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <a href="" target="_blank">www.royaljetgroup.com</a>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6">
                                            <p> info@royaljetgroup.com  </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.Partners();});</script>
@endsection