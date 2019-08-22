<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="" ng-app="accessosloApp">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link rel="shortcut icon" type="image/png" href="/assets/img/logoaccessoslo.png">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/accessoslo.no.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/css/wickedpicker.min.css">
    <link rel="stylesheet" href="/css/intlTelInput.css">
    <link rel="stylesheet" href="/css/countrySelect.min.css">
    <link rel="stylesheet" href="/css/currency-flags.css">
    <link rel="stylesheet" href="/css/star-rating-svg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="/css/modal-loading.css">
    <link rel="stylesheet" href="/css/modal-loading-animate.css">    
    <link rel="stylesheet" href="/css/loading-btn.css">
    <link rel="stylesheet" href="/css/loading.css">
    <link rel="stylesheet" href="/css/jquery.slide.css">
    <script src="/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <script>var config = @json($configuration); config.server = "<?= route("accessoslo-api", [],false) ?>/"; config.token = "<?= csrf_token() ?>"; var BASE_URL = "{{ url('/') }}";</script>
</head>

<body class="accessoslo login-portal {{$page}}" @isset($ngApp) ng-app="{{$ngApp}}" @endisset>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    @include('elements.member_header') @yield('content') @include('elements.footer')    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>    
    <script src="/js/vendor/bootstrap3-typeahead.js"></script>
    <script src="/js/vendor/bootstrap.min.js"></script>
    <script src="/js/vendor/sweetalert.min.js"></script>
    <script src="/js/vendor/countrySelect.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="https://use.fontawesome.com/551be509ec.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script data-require="lodash.js@*" data-semver="3.5.0" src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/3.5.0/lodash.js"></script>
    <script>var user = @json(auth()->user());</script>
    <script src="/js/ng.accessoslo.min.js"></script>
    <script src="/js/sticky.js"></script>
    @yield('scripts')
</body>

</html>