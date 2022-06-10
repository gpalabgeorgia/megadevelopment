<?php
use App\Section;
$getSections = Section::getSections();
?>
<!-- Footer section -->
<footer class="footer-section">
    <div class="container">
        <div class="row">
{{--            <div class="col-lg-5 col-md-2 col-sm-12">--}}
{{--                <div class="footer-widget">--}}
{{--                    <!--						<img src="img/log-color.png" alt="">-->--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="col-lg-2 col-md-3 col-sm-4" style="flex: 0 0 33%; max-width: 33%;">

                <div class="footer-widget">
                    <h5>კომპანია</h5>
                    <ul>
                        @foreach($getSections as $section)
                            <li><a href="{{ url($section['url']) }}">{{ $section['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
{{--            <div class="col-lg-5 col-md-2 col-sm-12">--}}
{{--                <div class="footer-widget">--}}
{{--                    <!--						<img src="img/log-color.png" alt="">-->--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="col-lg-2 col-md-3 col-sm-4" style="flex: 0 0 33%; max-width: 33%;">
                <div class="footer-widget">
                    <h5>იურიდიული</h5>
                    <ul>
                        <li><a href="">დოკუმენტაცია</a></li>
                        <li><a href="">როგორ შევიძინოთ</a></li>
                        <li><a href="">პირობები</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <div class="footer-widget">
                    <h5>სოციალური</h5>
                    <div class="footer-social">
                        <a href="https://www.facebook.com/megadevelopment.ge" target="_blank"><i class="fa fa-facebook"></i></a>
{{--                        <a href=""><i class="fa fa-linkedin"></i></a>--}}
{{--                        <a href=""><i class="fa fa-twitter"></i></a>--}}
                        <a href="https://www.youtube.com/channel/UCzx0cP-gXXUM5Ozw5hRhNpg" target="_blank"><i class="fa fa-youtube-play"></i></a>
                        <a href="https://www.instagram.com/mega_development/" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            Copyright &copy;
            <script>document.write(new Date().getFullYear());</script> ყველა უფლება დაცულია | დამზადებულია
            </i> by <a href="https://megaacademy.ge" target="_blank">MEGA Academy</a>
        </div>
    </div>
</footer>
<!-- Footer section end-->
