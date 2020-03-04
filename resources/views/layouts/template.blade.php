<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>COMECA</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template/img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset("template/style.css") }}">

</head>

<body>
<!-- Preloader -->
<div class="preloader d-flex align-items-center justify-content-center">
    <div class="preloader-circle"></div>
    <div class="preloader-img">
        <img src="{{ asset("template/img/core-img/leaf.png") }}" alt="">
    </div>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- ***** Top Header Area ***** -->
    <div class="top-header-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="top-header-content d-flex align-items-center justify-content-between">
                        <!-- Top Header Content -->
                        <div class="top-header-meta">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="infodeercreative@gmail.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: comeca@gmail.com</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="+1 234 122 122"><i class="fa fa-phone" aria-hidden="true"></i> <span>Tel: +237 697 456 383</span></a>
                        </div>

                        <!-- Top Header Content -->
                        <div class="top-header-meta d-flex">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle mr-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Francais</a>
                                        <a class="dropdown-item" href="#">USA</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Login -->
                            <div class="login">
                                <a href="{{ route('login') }}"><i class="fa fa-user" aria-hidden="true"></i> <span>Login</span></a>
                            </div>
                            <!-- Cart -->
                            <div class="cart">
                                <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Cart <span class="cart-quantity">(1)</span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Navbar Area ***** -->
    <div class="alazea-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="alazeaNav">

                    <!-- Nav Brand -->
                    <a href="/" class="nav-brand"><img src="{{ asset("template/img/core-img/comeca.png") }}" alt=""></a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Navbar Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="/"><i class="fa fa-home"></i> &nbsp; Home</a></li>
                                <li><a href="{{ route('about') }}"><i class="fa fa-info"></i> &nbsp; Apropos</a></li>
                                <li><a href="{{ route('shop') }}"><i class="fa fa-shopping-bag"></i> &nbsp; Boutique</a></li>
                                <li><a href="contact.html"><i class="fa fa-address-book"></i>&nbsp; Contact</a></li>
                            </ul>
                            <!-- Search Icon -->
                            <div id="searchIcon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </div>

                        </div>
                        <!-- Navbar End -->
                    </div>
                </nav>

                <!-- Search Form -->
                <div class="search-form">
                    <form action="#" method="get">
                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; press enter...">
                        <button type="submit" class="d-none"></button>
                    </form>
                    <!-- Close Icon -->
                    <div class="closeIcon"><i class="fa fa-times" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->

<div id="app">
    @yield('content')
    <vue-progress-bar></vue-progress-bar>
</div>

<!-- ##### Footer Area Start ##### -->
<footer class="footer-area bg-img" style="background-image: url({{ asset("template/img/bg-img/3.jpg") }});">
    <!-- Main Footer Area -->
    <div class="main-footer-area">
        <div class="container">
            <div class="row">

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="footer-logo mb-30">
                            <a href="#"><img src="{{ asset("template/img/core-img/logo.png") }}" alt=""></a>
                        </div>
                        <p>Lorem ipsum dolor sit samet, consectetur adipiscing elit. India situs atione mantor</p>
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>QUICK LINK</h5>
                        </div>
                        <nav class="widget-nav">
                            <ul>
                                <li><a href="#">Purchase</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Payment</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Return</a></li>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Orders</a></li>
                                <li><a href="#">Policities</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>BEST SELLER</h5>
                        </div>

                        <!-- Single Best Seller Products -->
                        <div class="single-best-seller-product d-flex align-items-center">
                            <div class="product-thumbnail">
                                <a href="shop-details.html"><img src="{{ asset("template/img/bg-img/4.jpg") }}" alt=""></a>
                            </div>
                            <div class="product-info">
                                <a href="shop-details.html">Cactus Flower</a>
                                <p>$10.99</p>
                            </div>
                        </div>

                        <!-- Single Best Seller Products -->
                        <div class="single-best-seller-product d-flex align-items-center">
                            <div class="product-thumbnail">
                                <a href="shop-details.html"><img src=""{{ asset("template/img/bg-img/5.jpg") }} alt=""></a>
                            </div>
                            <div class="product-info">
                                <a href="shop-details.html">Tulip Flower</a>
                                <p>$11.99</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Footer Widget -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget">
                        <div class="widget-title">
                            <h5>CONTACT</h5>
                        </div>

                        <div class="contact-information">
                            <p><span>Address:</span> 505 Silk Rd, New York</p>
                            <p><span>Phone:</span> +1 234 122 122</p>
                            <p><span>Email:</span> info.deercreative@gmail.com</p>
                            <p><span>Open hours:</span> Mon - Sun: 8 AM to 9 PM</p>
                            <p><span>Happy hours:</span> Sat: 2 PM to 4 PM</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="border-line"></div>
                </div>
                <!-- Copywrite Text -->
                <div class="col-12 col-md-6">
                    <div class="copywrite-text">
                        <p>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <!-- Footer Nav -->
                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <nav>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Service</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->

@routes
<script src="/js/app.js"></script>
<!-- ##### All Javascript Files ##### -->
<!-- jQuery-2.2.4 js -->
<script src="{{ asset("template/js/jquery/jquery-2.2.4.min.js") }}"></script>
<!-- Popper js -->
<script src="{{ asset("template/js/bootstrap/popper.min.js") }}"></script>
<!-- Bootstrap js -->
<script src=" {{ asset("template/js/bootstrap/bootstrap.min.js") }}"></script>
<!-- All Plugins js -->
<script src="{{ asset("template/js/plugins/plugins.js") }}"></script>
<!-- Active js -->
<script src="{{ asset("template/js/active.js") }}"></script>
</body>

</html>
