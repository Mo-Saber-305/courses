<!-- Header section -->
<header class="header-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="site-logo wow animate__animated animate__lightSpeedInLeft" data-wow-duration="2s"
                     data-wow-delay="2s">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="nav-switch">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <a href="{{ route('login') }}" class="site-btn header-btn">Login</a>
                <nav class="main-menu">
                    <ul>
                        <li><a href="{{ url('/') }}" class="hvr-float">Home</a></li>
                        <li><a href="#" class="hvr-float">About us</a></li>
                        <li><a href="courses.html" class="hvr-float">Courses</a></li>
                        <li><a href="blog.html" class="hvr-float">News</a></li>
                        <li><a href="contact.html" class="hvr-float">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header section end -->
