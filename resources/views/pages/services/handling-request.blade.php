@extends('layouts.public') 
@section('title', $data->meta_title) 
@section('description', $data->meta_description)
@section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                    @if ($data->status == "published")
                    {!! $data->page_title !!}
                    {!! $data->page_content !!}
                    @else
                      <h1>HAndling <br>request</h1>
                      <p>Lorem ipsum dolor sit amet consectetur ipsum dolor remi obligado remi opsum. This is just a dummy text for you to.</p>
                      <span class="share"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                    @endif
                  </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="slider">
                      <img src="/assets/img/slider.jpg" class="img-responsive" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="content-box">
      <div class="container">
          <div class="row flex-box">
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-left">
                      @if ($data->status == "published")
                      {!! $data->extra_content !!}
                      @else
                      <h3>OPERATIONS CONTACT</h3>
                      <p><strong>Access Oslo AS</strong></p>
                      <p><strong>Headquarters: </strong> <br>
                          Hans Gaarders Veg, 2060 <br>
                          Gardermoen, Norway </p>
                      <p><strong> Post Address: </strong> <br>
                      PO Box 34  <br>
                      Snarøya, Norway  <br></p>

                      <p>
                          <strong>Phone: </strong> <br>
                          H24 +47 91 222 999
                      </p>

                      <p>
                          <strong>General Inquiries: </strong> <br>
                          contact@accessoslo.com
                      </p>

                      <p><strong>Operations:</strong> <br>
                      ops@accessoslo.com</p>
                      @endif
                  </div>
                  <div class="aux-img">
                      <img src="/assets/img/aux-img.jpg" class="img-responsive center-block" alt="">
                  </div>
              </div>
              <div class="col-xs-12 col-sm-6">
                  <div class="box box-right">
                    <accessoslo-handlingrequest></accessoslo-handlingrequest>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
@endsection

@section('scripts')
<script src="/js/vendor/utils.js"></script>
<script src="/js/vendor/data.js"></script>
<script src="/js/vendor/intlTelInput.js"></script>
<script src="/ng/directives/handling-request/handling-request.js"></script>
@endsection