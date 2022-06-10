<?php
use App\Section;
$getSections = Section::getSections();
//echo "<pre>"; print_r($getSections); die;
?>
<!-- Header section -->
<header class="header-section">
    <!-- logo -->
    <a href="{{ url('/') }}" class="site-logo">
        <img src="{{ asset('images/front_images/megadevelopment.PNG')}}" style="width: 100%;" alt="">
    </a>
    <div class="nav-switch">
        <i class="fa fa-bars"></i>
    </div>
    <div class="container">
        <ul class="main-menu">
            @foreach($getSections as $section)
            <li><a href="{{ url($section['url']) }}">{{ $section['name'] }}</a></li>
            @endforeach
        </ul>
    </div>
</header>
<!-- Header section end -->
