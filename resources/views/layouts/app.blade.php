<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('docTitle') | Awesome Products</title>
    @yield('head')
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/css/magnific-popup.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/nice-select.css">
    <link rel="stylesheet" href="/css/flaticon.css">
    <link rel="stylesheet" href="/css/animate.css">
    <link rel="stylesheet" href="/css/slicknav.css">
    <link rel="stylesheet" href="/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>
<body>
    <header>
        <div class="header-area ">
            <div class="header_top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4 col-md-4 d-none d-md-block">
                            <div class="header_links ">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                    <li><a class="twiter" href="#"> <i class="fa fa-twitter"></i> </a></li>
                                    <li><a class="insta" href="#"> <i class="fa fa-instagram"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="logo" style="text-align: center;">
                                <p>Explore awesome products!</p>
                                <h1>Awesome Products</h1>
{{--                                <a href="index.html">--}}
{{--                                    <img src="img/logo.png" alt="">--}}
{{--                                </a>--}}
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4 d-none d-md-block">
                            @guest
                                <div class="login_resiter">
                                    <p><a href="/login"><i class="flaticon-user"></i>login</a> | <a href="/register">Register</a></p>
                                </div>
                            @else
                            <!-- Large button groups (default and split) -->
                                <div class="login_resiter">
                                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-user"></i> {{ Auth::user()->name }}
                                    </button>
                                    <div class="dropdown-menu">
                                        <ul class="submenu">
                                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                            @if(Auth::check())
                                                @if (count(Auth::user()->Role->where("name", "admin")->all()) > 0 || count(Auth::user()->Role->where("name", "superuser")->all()))
                                                    <li><a class="dropdown-item" href="/admin">Admin panel</a></li>
                                                @endif
                                            @endif
                                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a></li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
            <div id="sticky-header" class="main-header-area white-bg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="@yield("activeHome")" href="/">Home</a></li>
                                        <li><a class="@yield("activeCatg")" href="/tag">catagory</a></li>
                                        <li><a @yield("activeAbout") href="/about">About</a></li>
                                        <li><a @yield("active") href="#">pages <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                                @if(Auth::check())
                                                    @if (count(Auth::user()->Role->where("name", "admin")->all()) > 0 || count(Auth::user()->Role->where("name", "superuser")->all()) > 0 )
                                                        <li><a class="dropdown-item" href="/admin">Admin panel</a></li>
                                                    @endif
                                                @endif
                                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                        <li><a @yield("activeContact") href="/contact">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5">
                            <div class="get_serch">
                                <a id="search_1" href="javascript:void(0)"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                    <div class="search_input" id="search_input_box">
                        <div class="container ">
                            <form class="d-flex justify-content-between search-inner">
                                <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                                <button type="submit" class="btn"></button>
                                <span class="ti-close" id="close_search" title="Close Search"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @yield('content')
    <!-- photo_gallery_start -->
    <div class="photo_gallery">
        <div class="container mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-33">
                        <h3>Recommended</h3>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="photo_gallery_active owl-carousel">
                        <div class="single_photo_gallery gallery_bg_1">
                            <div class="photo_caption">
                                <h3>Travel Camping</h3>
                            </div>
                        </div>
                        <div class="single_photo_gallery gallery_bg_2">
                            <div class="photo_caption">
                                <h3>Travel Camping</h3>
                            </div>
                        </div>
                        <div class="single_photo_gallery gallery_bg_1">
                            <div class="photo_caption">
                                <h3>Travel Camping</h3>
                            </div>
                        </div>
                        <div class="single_photo_gallery gallery_bg_2">
                            <div class="photo_caption">
                                <h3>Travel Camping</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe_newsletter">
        <div class="container">
            <div class="black_bg">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="newsletter_text">
                            <h3>
                                Subscribe newsletter
                            </h3>
                            <p>Get updates to our newsletter and new articles</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="newsform">
                            <form action="#">
                                <input type="email" placeholder="Enter Your Email">
                                <button type="submit">sign up</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- photo_gallery_end -->
    <!-- footer_start -->
    <footer class="footer">
        <div class="footer_area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer_info text-center">
                            <div class="footer_logo text-center">
                                <h1 class="text-white">Awesome products</h1>
                            </div>
                            <p class="footer_text">
                                Explore photo media blog to enrich your photography knowledge
                            </p>
                            <div class="header_links">
                                <ul>
                                    <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                    <li><a class="twiter" href="#"> <i class="fa fa-twitter"></i> </a></li>
                                    <li><a class="insta" href="#"> <i class="fa fa-instagram"></i> </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_bottom ">
            <div class="container">
                <div class="footer_border">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="footer_links text-center">
                                <ul>
                                    <li><a href="/">home</a></li>
                                    <li><a href="/category">category</a></li>
                                    <li><a href="/about">about</a></li>
                                    <li><a href="/contact">contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_text text-center">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by AMPD Team | Designed with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </footer>
    <!-- JS here -->
    <script src="/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/isotope.pkgd.min.js"></script>
    <script src="/js/ajax-form.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/imagesloaded.pkgd.min.js"></script>
    <script src="/js/scrollIt.js"></script>
    <script src="/js/jquery.scrollUp.min.js"></script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/nice-select.min.js"></script>
    <script src="/js/jquery.slicknav.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/plugins.js"></script>

    <!--contact j/s-->
    <script src="/js/contact.js"></script>
    <script src="/js/jquery.ajaxchimp.min.js"></script>
    <script src="/js/jquery.form.js"></script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/mail-script.js"></script>

    <script src="/js/main.js"></script>
</body>
</html>
