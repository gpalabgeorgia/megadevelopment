<?php
//use App\OurProjectBlocks;
use App\ProjectFilter;
$getProjectFilter = ProjectFilter::getProjectFilter();
//$getOurProjectsBanner = OurProjectsBanner::getOurProjectBanner();
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
    <link rel="stylesheet" href="{{ url('css/flats.css') }}">
    <link rel="stylesheet" href="{{ url('css/swiper.css') }}">

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
<br><br>
<section class="flats">
    <div class="flats__header">
        <div class="flats__slider">
            <div class="flats__swiper gallery-top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/1.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/2.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/3.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/4.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/5.jpg') }}" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/6.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="flats__swiper gallery-thumbs">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/1.jpg') }}" alt="image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/2.jpg') }}" alt="image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/3.jpg') }}" alt="image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/4.jpg') }}" alt="image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/5.jpg') }}" alt="image">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{ asset('images/developments/6.jpg') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="flats__filter">
            <div class="flats__select">
                <select name="floor" class="flats__floor">
                    <option value="">სართული</option>
                    @foreach($getProjectFilter as $filter)
                    <option value="2">{{ $filter['floor'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flats__select">
                <select name="Meters" class="flats__floor">

                    <option value="">კვადრატული მეტრი</option>
                    @foreach($getProjectFilter as $filter)
                        <option value="2">{{ $filter['meter'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flats__select">
                <select name="Meters" class="flats__floor">
                    <option value="">მდგომარეობა</option>
                    @foreach($getProjectFilter as $filter)
                    <option value="2">{{ $filter['position'] }}</option>
                    @endforeach
                </select>
            </div>
            <button class="flats__button">ძებნა</button>
        </div>
    </div>
    @foreach($getProjectFilter as $projectFilter)
    <div class="flats__result">

        <div class="flats-result__texts">
            <div class="flats-result__text">ბინა: <span>{{ $projectFilter['project'] }}</span></div>
            <div class="flats-result__text">სართული: <span>{{ $projectFilter['floor'] }}</span></div>
            <div class="flats-result__text">კვადრატი: <span>{{ $projectFilter['meter'] }}<sup>2</sup></span></div>
            <div class="flats-result__text">ფასი: <span>{{ $projectFilter['price'] }}</span></div>
            <div class="flats-result__text">სტატუსი: <span>{{ $projectFilter['sell'] }}</span></div>
        </div>

        <div class="flats-result__image">
            <img src="{{ asset('images/projectFilters_images/'.$projectFilter['images']) }}" alt="image">
        </div>
    </div>
    @endforeach
    @foreach($getProjectFilter as $projectFilter)
    <div class="flats__info">
        <div class="flats-info__title">დეტალური აღწერა</div>
        <p class="flats-info__text">
            {{ $projectFilter['description'] }}
        </p>
    </div>
    @endforeach
</section>

@include('layouts.front_layout.front_footer')

<!--====== Javascripts & Jquery ======-->
<script src="{{ url('js/front_js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ url('js/front_js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/front_js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/front_js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ url('js/front_js/main.js') }}"></script>
<script src="{{ url('js/swiper.js') }}"></script>
<script src="{{ url('js/flats.js') }}"></script>

</body>
</html>
