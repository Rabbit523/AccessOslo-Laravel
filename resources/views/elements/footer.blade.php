<?php $lang = app()->getLocale();?>
<footer>
    <div class="container">
        <div class="box box-first">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <h6>Access oslo</h6>
                    <p>Access Oslo Executive Handling is all about taking care of passengers and crew needs. We always aim to
                        exceed their expectations and to create a unique experience for each visit. But first of all comes
                        the safe operation of handling a multi million dollar aircraft and its passengers and crew.
                        <br>
                        <br> The crew at Access Oslo Executive Handling has over 50 years of experience from various positions
                        as professional ground handlers to commercial pilots with an eye for safety.
                        <br>
                        <br> We like to say; "Handle with care".</p>
                    <img src="/assets/img/logo.jpg" alt="Access Oslo" class="logo-footer img-responsive">
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <h6>Contact Us</h6>
                    <p>
                        <b>Headquarters:</b>
                        <br> Hans Gaarders Veg, 2060
                        <br> Gardermoen, Norway
                        <br>
                        <br>

                        <b>Post Address:</b>
                        <br> PO Box 34
                        <br> Snarøya, Norway
                        <br>
                        <br>


                        <b>Phone: </b>
                        <br> H24 +47 91 222 999
                        <br>
                        <br>

                        <b>General Inquiries:</b>
                        <br> contact@accessoslo.com
                        <br>
                        <br>

                        <b>Operations:</b>
                        <br> ops@accessoslo.com
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 item">
                    <div class="blog">
                        <h6>From Our blog</h6>
                        <ul>
                            @foreach($blogs as $data)
                            <li>
                                <?php 
                                    $temp = explode(' ',$data->post_title);
                                    $link = '';
                                    foreach($temp as $key=>$item) {
                                        $link = $link.$item;
                                        if ($key < count($temp) - 1) {
                                            $link = $link."-";
                                        }
                                    }
                                ?>
                                @if($lang == "nb")
                                <a href="{{url('/news')}}/{{$link}}">{{$data->nb_post_title}}</a>
                                @else
                                <a href="{{url('/news')}}/{{$link}}">{{$data->en_post_title}}</a>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="newsletter">
                        <h6>Suscribe to newsletter</h6>
                        <p>Join our newsletter. Stay up to date.</p>
                        <form method="POST" action="/newsletter">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-6 email">
                                    <input type="email" name="email" class="form-control" placeholder="Email address">
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                    <input type="submit" value="SUBSCRIBE">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="social-list">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h6>FOLLOW US</h6>
                                <ul>
                                    <li>
                                        <a href="https://www.facebook.com/accessoslo.no/" target="_blank">
                                            <i class="fa fa-facebook-official" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.instagram.com/access_oslo_executive_handling/" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" target="_blank">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://www.linkedin.com/company/access-oslo-executive-handling" target="_blank">
                                            <i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <h6>SELECT LANGUAGE</h6>
                                <form id="lang-form" method="post" action="{{url('/site-lang')}}">
                                    {{ csrf_field() }}
                                    <input id="footer_language" class="form-control">
                                    <input type="text" id="selected_lang" name="lang">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-bottom">
            <div class="row">
                <div class="box-left col-xs-12 col-sm-12 col-md-7">
                    <p>
                        Copyright © <?php echo date("Y"); ?> Access Oslo AS. UI/UX Design & Full Stack Development
                        <a href="https://fantasylab.io/">FantasyLab</a>.
                    </p>
                </div>
                <div class="box-right col-xs-12 col-sm-12 col-md-5">
                    <ul>
                        <li>
                            <a href="{{url('/terms')}}" target="_blank">Terms & Conditions, Privacy Policy & GDPR Compliance</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</footer>
