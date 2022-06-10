<?php
use App\Videos;
$getVideos = Videos::getVideos();
?>
<!-- ვიდეო რგოლების ბლოკი -->
<section class="location-section spad">
    <div class="container">
        <div class="section-title">
            <h2 class="myBannerTitle">ლოკაცია</h2>
        </div>
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                @foreach($getVideos as $video)
                <div class="tab-content location-tab">
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <img src="{{ asset('images/ourVideos_images/'.$video['image']) }}" alt="">
                        <a href="{{ url('images/ourVideos_video/'.$video['video']) }}" class="play-btn"><img src="{{ asset('images/front_images/play-icon.png') }}" alt=""></a>
                    </div>
{{--                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">--}}
{{--                        <img src="{{ asset('images/front_images/location/2.jpg') }}" alt="">--}}
{{--                        <a href="https://www.youtube.com/watch?v=7JTHzDiJ2NA" class="play-btn"><img src="{{ asset('images/front_images/play-icon.png') }}" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">--}}
{{--                        <img src="{{ asset('images/front_images/location/3.jpg') }}" alt="">--}}
{{--                        <a href="https://www.youtube.com/watch?v=ijqoM8sqG6o" class="play-btn"><img src="{{ asset('images/front_images/play-icon.png') }}" alt=""></a>--}}
{{--                    </div>--}}
{{--                    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">--}}
{{--                        <img src="{{ asset('images/front_images/location/4.jpg') }}" alt="">--}}
{{--                        <a href="https://www.youtube.com/watch?v=juj-89tbZhs" class="play-btn"><img src="{{ asset('images/front_images/play-icon.png') }}" alt=""></a>--}}
{{--                    </div>--}}
                </div>
                @endforeach
            </div>
            <div class="col-xl-12">

{{--                <ul class="nav nav-tabs location-tab-nav" role="tablist">--}}
{{--                    @foreach($getVideos as $video)--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">--}}
{{--                            <img src="{{ asset('images/ourVideos_images/'.$video['image']) }}" alt="">--}}
{{--                            <h5 class="myBannerTitle">მიდამო</h5>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">--}}
{{--                            <img src="{{ asset('images/front_images/location/thumb-2.jpg') }}" alt="">--}}
{{--                            <h5 class="myBannerTitle">ინტერიერის დიზაინი</h5>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">--}}
{{--                            <img src="{{ asset('images/front_images/location/thumb-3.jpg') }}" alt="">--}}
{{--                            <h5 class="myBannerTitle">კეთილმოწყობა</h5>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">--}}
{{--                            <img src="{{ asset('images/front_images/location/thumb-4.jpg') }}" alt="">--}}
{{--                            <h5 class="myBannerTitle">ნახვები</h5>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

            </div>
        </div>
    </div>
</section>
<!-- ვიდეო რგოლების ბლოკის დასასრული -->
