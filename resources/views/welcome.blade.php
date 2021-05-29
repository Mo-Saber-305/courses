@extends('layouts.app')

@inject("tracks", "App\Models\Track")

@section('title', config('app.name') . ' | Home')

@section('style')
    <style>
        .course-item .course-thumb {
            position: relative;
        }

        .course-item .course-thumb .price {
            position: absolute;
            z-index: 1;
            top: 0;
            left: 0;
        }
    </style>
@stop

@section('content')
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    @include('includes.navbar')


    <!-- Hero section -->
    <section class="hero-section set-bg" data-setbg="{{ asset('img/bg.jpg') }}">
        <div class="container">
            <div class="hero-text text-white">
                <h2>Get The Best Free Online Courses</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris
                    scelerisque, at rutrum nulla <br> dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.
                </p>
            </div>
            <div class="text-center">
                <a href="{{ route('register') }}" class="site-btn">Sign Up Now</a>
            </div>
        </div>
    </section>
    <!-- Hero section end -->


    <!-- categories section -->
    <section class="categories-section spad">
        <div class="container">
            <div class="section-title">
                <h2>Our Course Categories</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris
                    scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
            </div>
            <div class="row justify-content-center" id="load-data"></div>
            <div id="remove-row" class="text-center wow animate__animated animate__bounceInRight">
                <button id="btn-more" class="site-btn ">Load More</button>
            </div>
        </div>
    </section>
    <!-- categories section end -->


    <!-- search section -->
    <section class="search-section">
        <div class="container">
            <div class="search-warp">
                <div class="section-title text-white">
                    <h2>Search your course</h2>
                </div>
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <!-- search form -->
                        <form class="course-search-form">
                            <input type="text" placeholder="Course">
                            <input type="text" class="last-m" placeholder="Category">
                            <button class="site-btn">Search Couse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- search section end -->


    <!-- course section -->
    <section class="course-section spad">
        <div class="container">
            <div class="section-title mb-0">
                <h2>Featured Courses</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris
                    scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
            </div>
        </div>
        <div class="course-warp">
            <ul class="course-filter controls">
                <li class="control active mixitup-control-active" data-track-id="all">All</li>
                @foreach($tracks_data as $index => $track)
                    <li class="control animate__backInUp" data-track-id="{{ $track->id }}">{{ $track->name }}</li>
                @endforeach

            </ul>
            <div class="row justify-content-center course-items-area"></div>
            <div id="remove-course-btn" class="text-center col-12">
                <button id="btn-more-courses" data-filtering="all" class="site-btn">Load More</button>
            </div>
        </div>
    </section>
    <!-- course section end -->


    <!-- signup section -->
    <section class="signup-section spad">
        <div class="signup-bg set-bg" data-setbg="img/signup-bg.jpg"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="signup-warp">
                        <div class="section-title text-white text-left">
                            <h2>Sign up to became a teacher</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus
                                mauris scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus
                                faucibus finibus.</p>
                        </div>
                        <!-- signup form -->
                        <form class="signup-form">
                            <input type="text" placeholder="Your Name">
                            <input type="text" placeholder="Your E-mail">
                            <input type="text" placeholder="Your Phone">
                            <label for="v-upload" class="file-up-btn">Upload Course</label>
                            <input type="file" id="v-upload">
                            <button class="site-btn">Search Couse</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- signup section end -->


    <!-- banner section -->
    <section class="banner-section spad">
        <div class="container">
            <div class="section-title mb-0 pb-2">
                <h2>Join Our Community Now!</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada lorem maximus mauris
                    scelerisque, at rutrum nulla dictum. Ut ac ligula sapien. Suspendisse cursus faucibus finibus.</p>
            </div>
            <div class="text-center pt-5">
                <a href="#" class="site-btn">Register Now</a>
            </div>
        </div>
    </section>
    <!-- banner section end -->


    <!-- footer section -->
    <footer class="footer-section spad pb-0">
        <div class="footer-top">
            <div class="footer-warp">
                <div class="row">
                    <div class="widget-item">
                        <h4>Contact Info</h4>
                        <ul class="contact-list">
                            <li>1481 Creekside Lane <br>Avila Beach, CA 931</li>
                            <li>+53 345 7953 32453</li>
                            <li>yourmail@gmail.com</li>
                        </ul>
                    </div>
                    <div class="widget-item">
                        <h4>Engeneering</h4>
                        <ul>
                            <li><a href="">Applied Studies</a></li>
                            <li><a href="">Computer Engeneering</a></li>
                            <li><a href="">Software Engeneering</a></li>
                            <li><a href="">Informational Engeneering</a></li>
                            <li><a href="">System Engeneering</a></li>
                        </ul>
                    </div>
                    <div class="widget-item">
                        <h4>Graphic Design</h4>
                        <ul>
                            <li><a href="">Applied Studies</a></li>
                            <li><a href="">Computer Engeneering</a></li>
                            <li><a href="">Software Engeneering</a></li>
                            <li><a href="">Informational Engeneering</a></li>
                            <li><a href="">System Engeneering</a></li>
                        </ul>
                    </div>
                    <div class="widget-item">
                        <h4>Development</h4>
                        <ul>
                            <li><a href="">Applied Studies</a></li>
                            <li><a href="">Computer Engeneering</a></li>
                            <li><a href="">Software Engeneering</a></li>
                            <li><a href="">Informational Engeneering</a></li>
                            <li><a href="">System Engeneering</a></li>
                        </ul>
                    </div>
                    <div class="widget-item">
                        <h4>Newsletter</h4>
                        <form class="footer-newslatter">
                            <input type="email" placeholder="E-mail">
                            <button class="site-btn">Subscribe</button>
                            <p>*We don’t spam</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-warp">
                <ul class="footer-menu">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
                <div class="copyright">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
            </div>
        </div>
    </footer>
    <!-- footer section end -->
@stop

@section('script')
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();

            //---------------------------------------start load track data------------------------------------//

            var page = 1; //track user scroll as page number, right now page number is 1

            load_more(page); //initial content load

            //load more tracks
            $(document).on('click', '#btn-more', function () {
                $(this).html('loading....');
                page++; //page number increment
                load_more(page); //load content
            });

            function load_more(page) {
                $.ajax({
                    url: "{{ url('get-tracks-data-ajax?page=' ) }}" + page,
                    type: "get",
                    datatype: "html",

                })
                    .done(function (data) {
                        $("#btn-more").html('load more');
                        $("#load-data").append(data.html); //append data into #results element
                        if (page == data.last_page) {
                            $('#remove-row').remove();
                        }
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        alert('No response from server');
                    });
            }

            //---------------------------------------end load track data------------------------------------//


            //---------------------------------------start load courses data------------------------------------//

            var filtering = $('#btn-more-courses').attr('data-filtering');

            load_more_courses(page, filtering); //initial content load
            var page_number = 1;
            //load more courses
            $(document).on('click', '#btn-more-courses', function () {
                var id = $('#btn-more-courses').attr('data-filtering');
                // var page_number = 1;
                $(this).html('loading....');
                page_number++; //page number increment
                load_more_courses(page_number, id); //load content
            });

            //filtering data by track name
            $('.control').on('click', function () {
                var id = $(this).attr('data-track-id');
                $(this).addClass('mixitup-control-active').siblings().removeClass('mixitup-control-active');
                page_number = 1;
                $('#btn-more-courses').attr('data-filtering', id);
                filtering_courses(page_number, id);
            });

            function filtering_courses(page_number, id) {
                $.ajax({
                    url: "{{ url('get-courses-data-ajax?page=' ) }}" + page_number + "&id=" + id,
                    type: "get",
                    datatype: "html",
                })
                    .done(function (data) {
                        $(".course-items-area").empty();
                        $(".course-items-area").append(data.html); //append data into #results element

                        if (page_number == data.last_page) {
                            $('#remove-course-btn').hide();
                        } else {
                            $('#remove-course-btn').show();
                        }
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        alert('No response from server');
                    });
            }

            function load_more_courses(page_number, id) {
                $.ajax({
                    url: "{{ url('get-courses-data-ajax?page=' ) }}" + page_number + "&id=" + id,
                    type: "get",
                    datatype: "html",
                })
                    .done(function (data) {
                        $("#btn-more-courses").html('load more');
                        $(".course-items-area").append(data.html); //append data into #results element
                        if (page_number == data.last_page) {
                            $('#remove-course-btn').hide();
                        } else {
                            $('#remove-course-btn').show();
                        }
                    })
                    .fail(function (jqXHR, ajaxOptions, thrownError) {
                        alert('No response from server');
                    });
            }

            //---------------------------------------end load courses data------------------------------------//
        });
    </script>

@stop
