<?php
use App\Banner;
$getBanners = Banner::getBanners();
//dd($getBanners);
//echo "<pre>"; print_r($getBanners);die;
?>
    <!-- Hero section -->
    <section class="hero-section">
        <div class="hero-social-warp">
            <div class="hero-social">
                <a href="https://www.facebook.com/megadevelopment.ge" target="_blank"><i class="fa fa-facebook myawesome"></i></a>
{{--                <a href=""><i class="fa fa-linkedin myawesome"></i></a>--}}
{{--                <a href=""><i class="fa fa-twitter myawesome"></i></a>--}}
                <a href="https://www.youtube.com/channel/UCzx0cP-gXXUM5Ozw5hRhNpg" target="_blank"><i class="fa fa-youtube-play myawesome"></i></a>
                <a href="https://www.instagram.com/mega_development/" target="_blank"><i class="fa fa-instagram myawesome"></i></a>
            </div>
        </div>
            <div class="hero-slider owl-carousel owl-theme">
                @foreach($getBanners as $banner)
                <div class="hs-item set-bg " data-setbg="{{ asset('images/banner_images/'.$banner['image']) }}">

                    <a href=""></a>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-7">
                                <h2 class="myBannerTitle">{{ $banner['title'] }}</h2>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        <!-- Hero details slider -->
        <div class="hero-nav-slider-warp">
            <div class="container">
                <div class="hero-nav-slider owl-carousel">
                    @foreach($getBanners as $banner)
                    <div class="hns-item">
                        <h5>{{ $banner['title'] }}</h5>
                        <p class="myBannerDesc">{{ $banner['description'] }}</p>
                        <span>{{ $banner['price'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Hero section end -->
