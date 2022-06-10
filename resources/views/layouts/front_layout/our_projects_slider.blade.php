<?php
use App\OurProjectsSlider;
$getOurProjectsSlider = OurProjectsSlider::getOurProjectsSlider();
?>
<!-- ჩვენი პროექტების სლაიდერის ბლოკი -->
<section class="design-section">
    <div class="container">
        <div class="section-title st-light">
            <h2 class="myBannerTitle">ჩვენი პროექტები</h2>
        </div>
    </div>

        <div class="design-slider owl-carousel">
            @foreach($getOurProjectsSlider as $ourProjectsSlider)
            <a href="{{ url('images/ourProjectsSlider_images/'.$ourProjectsSlider['image']) }}" class="img-popup-gallery">
                <img src="{{ url('images/ourProjectsSlider_images/'.$ourProjectsSlider['image']) }}" alt="">
                <i class="fa-solid fa-eye"></i>
            </a>
            @endforeach
        </div>

{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @foreach($getOurProjectsSlider as $ourProjectsSlider)--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="design-text text-white">--}}
{{--                    <h4>{{ $ourProjectsSlider['title'] }}</h4>--}}
{{--                    <p class="myDesc">--}}
{{--                       {{ $ourProjectsSlider['description'] }}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
</section>
<!-- ჩვენი პროექტების სლაიდერის ბლოკის დასასრული -->
