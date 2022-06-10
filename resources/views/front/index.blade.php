<?php
use App\OurProjects;

$getOurProjects = OurProjects::getOurProjects();

?>
@extends('layouts.front_layout.front_layout')
@section('content')
    <!-- Intro section -->
    <section class="intro-section">
        <div class="container">
            <div class="section-title">
                <h2 class="myBannerTitle">ჩვენი პროექტები</h2>
            </div>
            @foreach($getOurProjects as $ourProject)
            <div class="row">
                <div class="col-lg-8">
                    <div class="intro-img-box">
                        <h4>{{ $ourProject['title'] }}</h4>
                        <img src="{{ asset('images/ourProjects_images/'.$ourProject['image']) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-4 align-items-end d-flex">
                    <div class="intro-text-box">
                        <p class="myDesc">
                            {{ $ourProject['description'] }}
                        </p>
                        <a href="" class="site-btn">დეტალურად</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- Intro section end-->
@endsection
