<?php
use App\OurProjectBlocks;
use App\OurProjectsBanner;
$getOurProjectsBlocks = OurProjectBlocks::getOurProjectsBlocks();
$getOurProjectsBanner = OurProjectsBanner::getOurProjectBanner();
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
@foreach($getOurProjectsBanner as $banner)
<section class="page-top-section set-bg" data-setbg="{{ 'images/ourProjectsBanner_images/'.$banner['image'] }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-top-text text-white">
                    <h2>{{ $banner['title'] }}</h2>
                    <p>{{ $banner['description'] }}</p>
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

<!-- Developments section-->
<section class="developments-section spad">
    <div class="container">
        <div class="row">
            @foreach($getOurProjectsBlocks as $ourProjectsBlocks)
            <div class="col-lg-4 col-md-6">
                <div class="development-box">
                    <img src="{{ url('images/ourProjectsBlocks_images/'.$ourProjectsBlocks['image']) }}" alt="">
                    <div class="dev-text">
                        <h4>{{ $ourProjectsBlocks['title'] }}</h4>
{{--                        <h5>3465  Elk City Road</h5>--}}
                        <p>{{ $ourProjectsBlocks['description'] }}</p>
                        <div class="dev-price">
                            <span>მ<sup>2</sup></span>
                            <h4>{{ $ourProjectsBlocks['price'] }} $</h4>
                            <span>(ექვივალენტი ლარში)</span>
                        </div>
                        <a href="project_filter/{{ $ourProjectsBlocks['project_filter_id'] }}" class="site-btn">დეტალურად</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Developments section end-->

@include('layouts.front_layout.front_footer')

<!--====== Javascripts & Jquery ======-->
<script src="{{ url('js/front_js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('js/front_js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/front_js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/front_js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/front_js/main.js') }}"></script>

</body>
</html>
