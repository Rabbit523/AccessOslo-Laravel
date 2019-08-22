<?php $lang = app()->getLocale();?>
@extends('layouts.public')
@section('title', $data->nb_meta_title)
@section('description', $data->nb_meta_description)
@else
@section('title', $data->en_meta_title)
@section('description', $data->en_meta_description)
@endif
@section('content')
<div class="wrapper-general">
    <section class="introduction">
        <div class="container wrapper-tabs">
            <div class="row">
                <div class="col-xs-12">
                    <div class="description">
                        @if($lang == "nb")
                        {!! $data->nb_page_content !!}
                        @else
                        {!! $data->en_page_content !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@include('sweet::alert')