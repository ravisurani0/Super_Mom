<footer>
    <section class="df-footer__area  bg-theme-5- bg-white">
        <div class="footer__widgets-area">
            <div class="container">
                <div class="footer__widgets-wrapper-2 widgets-5">
                    <div class="footer__widget">
                        <div class="mb-40">
                            <div class="df-footer__logo mb-30">
                                <a href="#"><img src="{{ asset('storage/images/cms/'.$data['appLogo']['cms_value']) }}" alt="image not found"></a>
                            </div>

                        </div>
                        <!-- <div class="social-links">
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="icon-023-facebook-app-symbol"></i></a>
                                </li>
                                <li><a href="https://www.instagram.com/"><i class="icon-025-instagram"></i></a>
                                </li>
                                <li><a href="https://www.pinterest.com/"><i class="icon-029-pinterest"></i></a>
                                </li>
                                <li><a href="https://twitter.com/"><i class="icon-twitter-x"></i></a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Categorys</h4>
                        <div class="footer__links underline">
                            <ul>
                                @foreach($data['categoryTop5'] as $category )
                                <li><a href="/category/{{$category->slug}}">{{$category->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Useful Links</h4>
                        <div class="footer__links underline">
                            <ul>
                                <li> <a href="/about-us">About Us</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                                <li> <a href="/privacy-policy">Privacy & Policy</a></li>
                                <li> <a href="/terms-condition">Terms & Condition</a></li>
                                <!-- <li><a href="#">Our Team</a></li>
                                <li><a href="#">Clients Feedback</a></li> -->
                                <!-- <li><a href="#">Coming Soon</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="footer__widget">
                        <h4 class="footer__widget-title">Contact Info</h4>
                        <div class="footer-meta mb-15">
                            <i class="icon-007-telephone"></i>
                            <p></p>
                            <a href="tel:{{ strip_tags($data['contactDetails']['contact_no']) }}">
                                <p> {!! strip_tags($data['contactDetails']['contact_no']) !!}</p>
                            </a>
                        </div>
                        <div class="footer-meta mb-15">
                            <i class="icon-030-pin"></i>
                            <p>{!! $data['contactDetails']['address'] !!}</p>
                        </div>
                        <div class="footer-meta">
                            <i class="icon-timelapse"></i>
                            <p></p>
                            <p>{!! strip_tags($data['contactDetails']['working_time']) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- horizontal line start  -->
        <div class="container">
            <div class="hr1"></div>
        </div>
        <!-- horizontal line end  -->
        <div class="copyright__area p-relative">
            <div class="container">
                <div class="copyright-content__wrapper">
                    <div class="copyright__text text-md-start text-center ">
                        <p>©
                            {{-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            All Rights Reserved by <a href="/"> {{ env('APP_NAME') }}</a>
                        </p>
                    </div>
                    <div class="copyright__nav">
                        <ul>
                            <li>
                                <a href="/privacy-policy">Privacy & Policy</a>

                            </li>
                            <li>
                                <a href="/terms-condition">Terms & Condition</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>

<!-- <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button> -->

<script src="{{ asset('front/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/waypoints.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/plugins/meanmenu.js') }}"></script>
<script src="{{ asset('front/js/plugins/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/plugins/backToTop.js') }}"></script>
<script src="{{ asset('front/js/plugins/nice-select.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/ajax-form.js') }}"></script>
<script src="{{ asset('front/js/plugins/wow.min.js') }}"></script>
<script src="{{ asset('front/js/plugins/jquery-ui.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/jquery.appear.js') }}"></script>
<script src="{{ asset('front/js/vendor/jquery.odometer.min.js') }}"></script>
<script src="{{ asset('front/js/vendor/jquery-ui-slider-range.js') }}"></script>
<script src="{{ asset('front/js/plugins/slick.min.js') }}"></script>
<script src="{{ asset('front/js/plugins/parallax-scroll.js') }}"></script>
<script src="{{ asset('front/js/vendor/js_circle-progress.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>

<!-- scroll to top -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@yield('script_include')
<script>
    jQuery('.menu-expand-category').on("click",function(e){
        $('.mean-expand')[0].click();
    })
</script>

</section>
</body>
</html>