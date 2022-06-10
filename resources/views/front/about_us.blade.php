<?php
use App\AboutSlider;
use App\Staf;
use App\Motto;
use App\SecondBanner;

$getAboutSlider = AboutSlider::getAboutSlider();
$getStaf = Staf::getStaf();
$getMotto = Motto::getMotto();
$getSecondBanner = SecondBanner::getSecondBanner() ;
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
{{--@include('layouts.front_layout.hero_slider')--}}
@foreach($getSecondBanner as $secondBanner)
<!-- Page top section -->
<section class="page-top-section set-bg" data-setbg="{{ url('../images/seccondBanner_images/'.$secondBanner['image']) }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="page-top-text text-white">
                    <h2>{{ $secondBanner['title'] }}</h2>
                    <p>{{ $secondBanner['description'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-social-warp">
        <div class="hero-social">
            <a href=""><i class="fa fa-facebook myawesome"></i></a>
            <a href=""><i class="fa fa-linkedin myawesome"></i></a>
            <a href=""><i class="fa fa-twitter myawesome"></i></a>
            <a href=""><i class="fa fa-youtube-play myawesome"></i></a>
            <a href=""><i class="fa fa-instagram myawesome"></i></a>
        </div>
    </div>
</section>
@endforeach
<!-- Page top section end -->

<!-- About section --> <br>
<section class="about-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                @foreach($getAboutSlider as $aboutSlider)
                <div class="about-text">
                    <h4>{{ $aboutSlider['title'] }}</h4>
                    <p>{{ $aboutSlider['description'] }}</p>
                </div>
                @endforeach
            </div>

            <div class="col-lg-6">

                <div class="about-slider owl-carousel">
                    @foreach($getAboutSlider as $slider)
                    <img src="{{ url('images/aboutSlider_images/'.$slider['image']) }}" alt="">
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
<!-- About section end -->
<!-- Team section -->
{{--<section class="team-section">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @foreach($getStaf as $staf)--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="team-member">--}}
{{--                    <div class="member-pic">--}}
{{--                        <img style="margin: 10px;" src="{{url('images/staf_images/'.$staf['image'])}}" alt="">--}}
{{--                        <a href="#" class="member-link">+</a>--}}
{{--                    </div>--}}
{{--                    <div class="member-info">--}}
{{--                        <h4>{{ $staf['fullName'] }}</h4>--}}
{{--                        <h5>{{ $staf['post'] }}</h5>--}}
{{--                        <p>{{ $staf['description'] }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!-- Team section end -->

<!-- About box text -->
{{--<div class="about-text-box-warp spad">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @foreach($getMotto as $motto)--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="design-text">--}}
{{--                    <h4>{{ $motto['title'] }}</h4>--}}
{{--                    <p>{{ $motto['description'] }}</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
@include('layouts.front_layout.front_footer')
<!-- About box text end -->
    <!--====== Javascripts & Jquery ======-->
    <script src="{{ url('js/front_js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('js/front_js/bootstrap.min.js') }}"></script>
    <script src="{{ url('js/front_js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('js/front_js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ url('js/front_js/main.js') }}"></script>

    </body>
</html>
