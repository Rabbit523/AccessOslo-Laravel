@extends('layouts.public') @section('title', 'Hjem') @section('content')
<div class="wrapper-general">
  <section class="introduction">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-4">
                  <div class="box">
                      <h1><span>Royal</span> jet group</h1>
                      <p>Royal Jet is an award-winning international
                      luxury flight services provider headquartered in
                      Abu Dhabi, the capital of the
                      United Arab Emirates (UAE).</p>
                      <span class="share">
                          <i class="fa fa-share-alt" aria-hidden="true"></i>
                      </span>
                  </div>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="slider">
                      <img src="/assets/img/bg/single-partner.jpg" class="img-responsive" alt="">
                  </div>
              </div>
          </div>
      </div>
  </section>
  <section class="wrapper-content">
      <div class="container">
          <div class="features-box">
              <div class="row">
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <h2>{{$data->last_audit}}</h2>
                              <p>LAST AUDIT PERFORMED BY ACCESS OSLO</p>
                              <a href="">What does this mean?</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <h2>50M USD COVERAGE</h2>
                              <p>NSURANCE DOCUMENTATION AND COVERAGE</p>
                              <a href="">What does this mean?</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <h2>VALID AOC</h2>
                              <p>AIR OPERATOR’S CERTIFICATE</p>
                              <a href="">What does this mean?</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <h2>50M USD COVERAGE</h2>
                              <p>INSURANCE DOCUMENTATION AND COVERAGE</p>
                              <a href="">What does this mean?</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item ranking">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <div class="ranking-box">
                                <div class="avg_rate"></div>
                              </div>
                              <h2 class="rate_text"></h2>
                              <p>SAFETY FOCUS AND SAFETY RECORD</p>
                              <a href="">What does this mean?</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="item">
                          <figure>
                              <img src="/assets/img/icon-single.png" class="img-responsive center-block" alt="">
                          </figure>
                          <div class="info-box">
                              <h2>{{$data->operate_since}}</h2>
                              <p>OPERATIVE SINCE</p>
                              <a href="">Go to Royal Jet website</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="review-box">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <div class="box-right" style="display: inline-block;">
                        @if ($counts != 0)
                        <h3>Recent customer reviews</h3>
                        @elseif ($counts == 0)
                        <h3>No recent customer reviews</h3>
                        @endif
                        @foreach($reviews as $review)
                        <div class="col-lg-4">
                            <div class="box">
                                <div class="header-box">
                                    <figure>
                                        <img src="/assets/img/user-review.jpg" class="img-responsive" alt="">
                                    </figure>
                                    <div>
                                        <div>
                                            <label>{{$review->customer_name}}</label>
                                            <div class="ranking-box">
                                                <div class="total_rate" data-initialRating="<?=$review->total_rate?>"></div>
                                            </div>
                                        </div>
                                        <h5>“Extraordinary flight experience”</h5>
                                    </div>
                                </div>
                                <div class="info-content">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled.</p>
                                    <a class="btn btn-border-gold">Show more</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$reviews->links()}}                      
                    </div>                  
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
<script src="/js/vendor/jquery.star-rating-svg.js"></script>
<script src="/js/accessoslo.js"></script>
<script>jQuery(function(){new Accessoslo.Controllers.SinglePartner();});</script>
@endsection