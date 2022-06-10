<?php
use App\ContactBanner;
use App\ContactBlock;
$getContactBanner = ContactBanner::getContactBanner();
$getContactBlock = ContactBlock::getContactBlock();
?>
    <!DOCTYPE html>
<html lang="ka">
<head>
    <title>MEGA DEVELOPMENT</title>
    <meta charset="UTF-8">
    <meta name="description" content="Real estate html template">
    <meta name="keywords" content="real estate, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link href="{{ asset('images/front_images/favicon.ico') }}" rel="shortcut icon"/>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Sarabun:300,300i,400,400i,500,500i,600,600i,700,700i&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ url('css/front_css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/font-awesome.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/all.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/brands.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/regular.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/solid.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/svg.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/v4-font-face.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/v4-shims.css') }}"/>
    <link rel="stylesheet" href="{{ url('fontawesome/css/v5-font-face.css') }}"/>
    {{--    <link rel="stylesheet" href="{{ url('css/front_css/flaticon.css') }}"/>--}}
    <link rel="stylesheet" href="{{ url('css/front_css/magnific-popup.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/front_css/owl.carousel.min.css') }}"/>

    <!-- Main Stylesheets -->
    <link rel="stylesheet" href="{{ url('css/front_css/style.css') }}"/>
    <link rel="stylesheet" href="{{ url('css/front_css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('css/front_css/mystyles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/front_css/bpg-nino-mtavruli-bold.css') }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

@include('layouts.front_layout.front_header')

<!-- Page top section -->
@foreach($getContactBanner as $contactBanner)
<section class="page-top-section set-bg" data-setbg="{{ url('images/contactBanner_images/'.$contactBanner['image']) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="page-top-text text-white">
                    <h2>{{ $contactBanner['title'] }}</h2>
                    <p>{{ $contactBanner['description'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-social-warp">
        <div class="hero-social">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-linkedin"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-youtube-play"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
        </div>
    </div>
</section>
@endforeach
<!-- Page top section end -->

<!-- Contact section-->
@foreach($getContactBlock as $contactBlock)
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-5">
                <div class="contact-info-box">
                    <h5 class="contact-title">{{ $contactBlock['title'] }}</h5>
                    <div class="contact-info">
                        <div class="ci-item">
                            <p><i class="fa fa-location-dot myawesome" style="font-size: 18px;"></i> &nbsp;{{ $contactBlock['address'] }}</p>
                        </div>
                        <div class="ci-item">
                            <p>
                                <i class="fa fa-phone myawesome" style="font-size: 18px;"></i> &nbsp;{{ $contactBlock['phone'] }}<br>
                                <i class="fa fa-at myawesome" style="font-size: 18px;"></i> &nbsp; {{ $contactBlock['email'] }}
                                &nbsp;&nbsp;</p>
                        </div>
                    </div>
{{--                    <h5 class="contact-title">{{ $contactBlock['secondTitle'] }}</h5>--}}
{{--                    <form class="contact-form">--}}
{{--                        <div class="form-field">--}}
{{--                            <input type="text" placeholder="Full Name">--}}
{{--                        </div>--}}
{{--                        <div class="form-field">--}}
{{--                            <input type="text" placeholder="Email Address">--}}
{{--                        </div>--}}
{{--                        <div class="form-field">--}}
{{--                            <textarea placeholder="Hi ..."></textarea>--}}
{{--                        </div>--}}
{{--                        <button class="site-btn">გაგზავნა</button>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- Map -->
    <div class="map">
{{--        <iframe src="https://www.google.com/maps/d/embed?mid=1NR9jY2ghC3mHAJRujPOs55gkHnl8bytu&ehbc=2E312F" width="100%" style="border: none;"></iframe>--}}
        <img src="{{ url('images/map.PNG') }}" style="width: 100%; height: 100%" alt="">
    </div>
</section>
@endforeach
<!-- Contact section end-->

@include('layouts.front_layout.front_footer')
<!--====== Javascripts & Jquery ======-->
<script src="{{ url('js/front_js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('js/front_js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/front_js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/front_js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/front_js/main.js') }}"></script>

</body>
</html>
