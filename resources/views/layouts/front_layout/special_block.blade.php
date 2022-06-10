<?php
use App\Special;
$getSpecial = Special::getSpecial();
?>
<!-- განსაკუთრებულობების ბლოკი -->
<section class="features-section">
    <div class="container">
        <div class="section-title">
            <h2 class="myBannerTitle">განსაკუთრებულობები</h2>
        </div>
    </div>
    <div class="features-slider owl-carousel">
        @foreach($getSpecial as $spec)
            <div class="feature-box">
                <i class="fa-solid fa-house-circle-check"></i>
                <h5 class="myBannerTitle">{{ $spec['title'] }}</h5>
                <p class="myDesc">
                    {{ $spec['description'] }}
                </p>
            </div>
        @endforeach
    </div>
</section>
<!-- განსაკუთრებულობების ბლოკის დასასრული -->
