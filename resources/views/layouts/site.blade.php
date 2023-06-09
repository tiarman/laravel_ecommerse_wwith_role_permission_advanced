<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ecommerse || Online</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/site/assets/images/favicon.png')}}">

    <!-- CSS============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/sal.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/vendor/base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/style.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/site/css/custom.css') }}">

    @yield('stylesheet')

</head>


<body>
    <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    <!-- Start Header -->
    <header class="header axil-header header-style-2 header-style-6">
        <!-- Start Header Top Area  -->
        <div class="axil-header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-3 col-5">
                        <div class="header-brand">
                            <a href="index.html" class="logo logo-dark">
                                <img src="{{asset('assets/site/images/logo/logo.png')}}" alt="Site Logo">
                            </a>
                            <a href="index.html" class="logo logo-light">
                                <img src="{{asset('assets/site/images/logo/logo-light.png')}}" alt="Site Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-sm-9 col-7">
                        <div class="header-top-dropdown dropdown-box-style">
                            <div class="axil-search">
                                <button type="submit" class="icon wooc-btn-search">
                                    <i class="far fa-search"></i>
                                </button>
                                <input type="search" class="placeholder product-search-input" name="search2" id="search2" value="" maxlength="128" placeholder="What are you looking for...." autocomplete="off">
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    USD
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">USD</a></li>
                                    <li><a class="dropdown-item" href="#">AUD</a></li>
                                    <li><a class="dropdown-item" href="#">EUR</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    EN
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">EN</a></li>
                                    <li><a class="dropdown-item" href="#">ARB</a></li>
                                    <li><a class="dropdown-item" href="#">SPN</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area  -->

        <!-- Start Mainmenu Area  -->
        <div class="axil-mainmenu aside-category-menu">
            <div class="container">
                <div class="header-navbar">
                    <div class="header-nav-department">
                        <aside class="header-department">
                            <button class="header-department-text department-title">
                                <span class="icon"><i class="fal fa-bars"></i></span>
                                <span class="text">Categories</span>
                            </button>
                            <nav class="department-nav-menu">
                                <button class="sidebar-close"><i class="fas fa-times"></i></button>
                                <ul class="nav-menu-list">

                                    @foreach ($category as $row )
                                    @php
                                    $subcategory=DB::table('sub_categories')->where('category_id', $row->id)->get();
                                    @endphp
                                    <li>
                                        <a href="#" class="nav-link has-megamenu">
                                            <span class="menu-icon"><img src="{{asset('assets/site/images/product/categories/cat-02.png')}}" alt="Department"></span>
                                            <span class="menu-text">{{$row->category_name}}</span>
                                        </a>
                                        <div class="department-megamenu">
                                            <div class="department-megamenu-wrap">
                                                <div class="department-submenu-wrap">
                                                    <div class="department-submenu">
                                                        @foreach ($subcategory as $row )
                                                        @php
                                                        $childcategory=DB::table('child_categories')->where('subcategory_id', $row->id)->get();

                                                        @endphp
                                                        <h3 class="submenu-heading">{{$row->subcategory_name}}</h3>
                                                        <ul>
                                                            @foreach ($childcategory as $row)
                                                            <li><a href="shop.html">{{$row->childcategory_name}}</a></li>
                                                            @endforeach

                                                        </ul>

                                                        @endforeach
                                                        {{--  <h3 class="submenu-heading">Baby</h3>
                                                        <ul>
                                                            <li><a href="shop.html">Baby Cloths</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Gear</a></li>
                                                            <li><a href="shop.html">Baby Toddler</a></li>
                                                            <li><a href="shop-sidebar.html">Baby Toys</a></li>
                                                        </ul>  --}}
                                                    </div>

                                                </div>
                                                <div class="featured-product">
                                                    <h3 class="featured-heading">Featured</h3>
                                                    <div class="product-list">
                                                        <div class="item-product">
                                                            <a href="#"><img src="{{asset('assets/site/images/product/product-feature1.png')}}" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="{{asset('assets/site/images/product/product-feature2.png')}}" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="{{asset('assets/site/images/product/product-feature3.png')}}" alt="Featured Product"></a>
                                                        </div>
                                                        <div class="item-product">
                                                            <a href="#"><img src="{{asset('assets/site/images/product/product-feature4.png')}}" alt="Featured Product"></a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="axil-btn btn-bg-primary">See All Offers</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    @endforeach





                                </ul>
                            </nav>
                        </aside>
                    </div>
                    <div class="header-main-nav">
                        <!-- Start Mainmanu Nav -->
                        <nav class="mainmenu-nav">
                            <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                            <div class="mobile-nav-brand">
                                <a href="index.html" class="logo">
                                    <img src="{{asset('assets/site/images/logo/logo.png')}}" alt="Site Logo">
                                </a>
                            </div>
                            <ul class="mainmenu">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="axil-submenu">
                                        <li><a href="shop-sidebar.html">Shop With Sidebar</a></li>
                                        <li><a href="shop.html">Shop no Sidebar</a></li>
                                        <li><a href="single-product.html">Product Variation 1</a></li>
                                        <li><a href="single-product-2.html">Product Variation 2</a></li>
                                        <li><a href="single-product-3.html">Product Variation 3</a></li>
                                        <li><a href="single-product-4.html">Product Variation 4</a></li>
                                        <li><a href="single-product-5.html">Product Variation 5</a></li>
                                        <li><a href="single-product-6.html">Product Variation 6</a></li>
                                        <li><a href="single-product-7.html">Product Variation 7</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul class="axil-submenu">
                                        <li><a href="wishlist.html">Wishlist</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="my-account.html">Account</a></li>
                                        <li><a href="sign-up.html">Sign Up</a></li>
                                        <li><a href="sign-in.html">Sign In</a></li>
                                        <li><a href="forgot-password.html">Forgot Password</a></li>
                                        <li><a href="reset-password.html">Reset Password</a></li>
                                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="404.html">404 Error</a></li>
                                        <li><a href="typography.html">Typography</a></li>
                                    </ul>
                                </li>


                                <li><a href="contact.html">Contact</a></li>
                                @guest()
                                <li><a href="{{route('login')}}">Login</a></li>

                                @else
                                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                                <li><a href="{{route('logout')}}">Logout</a></li>

                                @endguest
                            </ul>
                        </nav>
                        <!-- End Mainmanu Nav -->
                    </div>
                    <div class="header-action">
                        <ul class="action-list">
                            <li class="axil-search d-sm-none d-block">
                                <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                    <i class="flaticon-magnifying-glass"></i>
                                </a>
                            </li>
                            <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li>
                            <li class="shopping-cart">
                                <a href="#" class="cart-dropdown-btn">
                                    <span class="cart-count">{{count(\Cart::getContent())}}</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                            <li class="my-account">
                                <a href="javascript:void(0)">
                                    <i class="flaticon-person"></i>
                                </a>
                                <div class="my-account-dropdown">
                                    <span class="title">QUICKLINKS</span>
                                    <ul>
                                        <li>
                                            <a href="my-account.html">My Account</a>
                                        </li>
                                        <li>
                                            <a href="#">Initiate return</a>
                                        </li>
                                        @guest()
                                        <a href="{{route('login')}}" class="axil-btn btn-bg-primary">Login</a>

                                        @else
                                        <li>
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="{{route('logout')}}">Log Out</a>
                                        </li>
                                        @endguest
                                    </ul>




                                    <div class="reg-footer text-center">No account yet? <a href="{{route('register')}}" class="btn-link">REGISTER HERE.</a></div>
                                </div>
                            </li>
                            <li class="axil-mobile-toggle">
                                <button class="menu-btn mobile-nav-toggler">
                                    <i class="flaticon-menu-2"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Mainmenu Area  -->
    </header>



@yield('content')

    <!-- Start Footer Area  -->
    <footer class="axil-footer-area footer-style-2">
        <!-- Start Footer Top Area  -->
        <div class="footer-top separator-top">
            <div class="container">
                <div class="row">
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Support</h5>
                            <!-- <div class="logo mb--30">
                            <a href="index.html">
                                <img class="light-logo" src="{{asset('assets/site/images/logo/logo.png')}}" alt="Logo Images">
                            </a>
                        </div> -->
                            <div class="inner">
                                <p>685 Market Street, <br>
                                Las Vegas, LA 95820, <br>
                                United States.
                                </p>
                                <ul class="support-list-item">
                                    <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i> example@domain.com</a></li>
                                    <li><a href="tel:(+01)850-315-5862"><i class="fal fa-phone-alt"></i> (+01) 850-315-5862</a></li>
                                    <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Account</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="my-account.html">My Account</a></li>
                                    <li><a href="sign-up.html">Login / Register</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Quick Link</h5>
                            <div class="inner">
                                <ul>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="terms-of-service.html">Terms Of Use</a></li>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                    <!-- Start Single Widget  -->
                    <div class="col-lg-3 col-sm-6">
                        <div class="axil-footer-widget">
                            <h5 class="widget-title">Download App</h5>
                            <div class="inner">
                                <span>Save $3 With App & New User only</span>
                                <div class="download-btn-group">
                                    <div class="qr-code">
                                        <img src="{{asset('assets/site/images/others/qr.png')}}" alt="Axilthemes">
                                    </div>
                                    <div class="app-link">
                                        <a href="#">
                                            <img src="{{asset('assets/site/images/others/app-store.png')}}" alt="App Store">
                                        </a>
                                        <a href="#">
                                            <img src="{{asset('assets/site/images/others/play-store.png')}}" alt="Play Store">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget  -->
                </div>
            </div>
        </div>
        <!-- End Footer Top Area  -->
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-default separator-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4">
                        <div class="social-share">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-discord"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-left d-flex flex-wrap justify-content-center">
                            <ul class="quick-link">
                                <li>© 2023. All rights reserved by <a target="_blank" href="https://axilthemes.com/">Axilthemes</a>.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-12">
                        <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                            <span class="card-text">Accept For</span>
                            <ul class="payment-icons-bottom quick-link">
                                <li><img src="{{asset('assets/site/images/icons/cart/cart-1.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/site/images/icons/cart/cart-2.png')}}" alt="paypal cart"></li>
                                <li><img src="{{asset('assets/site/images/icons/cart/cart-5.png')}}" alt="paypal cart"></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->
    </footer>
    <!-- End Footer Area  -->



    <!-- Header Search Modal End -->
    <div class="header-search-modal" id="header-search-modal">
        <button class="card-close sidebar-close"><i class="fas fa-times"></i></button>
        <div class="header-search-wrap">
            <div class="card-header">
                <form action="#">
                    <div class="input-group">
                        <input type="search" class="form-control" name="prod-search" id="prod-search" placeholder="Write Something....">
                        <button type="submit" class="axil-btn btn-bg-primary"><i class="far fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="card-body">
                <div class="search-result-header">
                    <h6 class="title">24 Result Found</h6>
                    <a href="shop.html" class="view-all">View All</a>
                </div>
                <div class="psearch-results">
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="{{asset('assets/site/images/product/electric/product-09.png')}}" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="axil-product-list">
                        <div class="thumbnail">
                            <a href="single-product.html">
                                <img src="{{asset('assets/site/images/product/electric/product-09.png')}}" alt="Yantiti Leather Bags">
                            </a>
                        </div>
                        <div class="product-content">
                            <div class="product-rating">
                                <span class="rating-icon">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fal fa-star"></i>
                            </span>
                                <span class="rating-number"><span>100+</span> Reviews</span>
                            </div>
                            <h6 class="product-title"><a href="single-product.html">Media Remote</a></h6>
                            <div class="product-price-variant">
                                <span class="price current-price">$29.99</span>
                                <span class="price old-price">$49.99</span>
                            </div>
                            <div class="product-cart">
                                <a href="cart.html" class="cart-btn"><i class="fal fa-shopping-cart"></i></a>
                                <a href="wishlist.html" class="cart-btn"><i class="fal fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Search Modal End -->



    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product.html"><img src="{{asset('assets/site/images/product/electric/product-01.png')}}" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</span>
                                <span class="rating-number">(64)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-3.html">Wireless PS Handler</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>155.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="15">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-2.html"><img src="{{asset('assets/site/images/product/electric/product-02.png')}}" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</span>
                                <span class="rating-number">(4)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product-2.html">Gradient Light Keyboard</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>255.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="5">
                            </div>
                        </div>
                    </li>
                    <li class="cart-item">
                        <div class="item-img">
                            <a href="single-product-3.html"><img src="{{asset('assets/site/images/product/electric/product-03.png')}}" alt="Commodo Blown Lamp"></a>
                            <button class="close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="item-content">
                            <div class="product-rating">
                                <span class="icon">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</span>
                                <span class="rating-number">(6)</span>
                            </div>
                            <h3 class="item-title"><a href="single-product.html">HD CC Camera</a></h3>
                            <div class="item-price"><span class="currency-symbol">$</span>200.00</div>
                            <div class="pro-qty item-quantity">
                                <input type="number" class="quantity-input" value="100">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">$610.00</span>
                </h3>
                <div class="group-btn">
                    <a href="{{route('shopping.cartlist')}}" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                    <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="{{asset('assets/site/js/vendor/modernizr.min.js')}}"></script>
    <!-- jQuery JS -->
    <script src="{{asset('assets/site/js/vendor/jquery.js')}}"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('assets/site/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/slick.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/js.cookie.js')}}"></script>
    <!-- <script src="{{asset('assets/site/js/vendor/jquery.style.switcher.js')}}"></script> -->
    <script src="{{asset('assets/site/js/vendor/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/sal.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/counterup.js')}}"></script>
    <script src="{{asset('assets/site/js/vendor/waypoints.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('assets/site/js/main.js')}}"></script>

    @yield('script')

</body>


</html>
