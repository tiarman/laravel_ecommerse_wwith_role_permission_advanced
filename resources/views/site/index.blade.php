@extends('layouts.site')
@section('stylesheet')
@endsection

@section('content')
    <main class="main-wrapper">

        <!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
            <div class="container">
                <div class="slider-offset-left">
                    <div class="row row--20">
                        <div class="col-lg-9">
                            <div class="slider-box-wrap">
                                <div class="slider-activation-one axil-slick-dots">
                                    @foreach ($product as $val)
                                        @if ($val->set_to_banner == 'yes')
                                            <div class="single-slide slick-slide">
                                                <div class="main-slider-content">
                                                    <span class="subtitle"><i class="fal fa-fire"></i> Hot Deal</span>
                                                    <h1 class="title">{{ $val->name }}</h1>
                                                    <div class="shop-btn">
                                                        <a href="{{ route('product_details', $val->name) }}"
                                                            class="axil-btn">Shop Now <i
                                                                class="fal fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="main-slider-thumb">
                                                    <img src="{{ $val->image }}" alt="Product">
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="slider-product-box">
                                <div class="product-thumb">
                                    <a href="single-product.html">
                                        <img src="{{ asset('assets/site/images/product/product-41.png') }}" alt="Product">
                                    </a>
                                </div>
                                <h6 class="title"><a href="single-product.html">Stylish Leather Bag</a></h6>
                                <span class="price">$29.99</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Flash Sale Area  -->

        <div
            class="axil-new-arrivals-product-area fullwidth-container flash-sale-area bg-color-white axil-section-gap pb--0">
            <div class="container ml--xxl-0">
                <div class="product-area pb--50">
                    <div class="d-md-flex align-items-end flash-sale-section">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"><i class="fas fa-fire"></i> Today's</span>
                            <h2 class="title">Flash Sales</h2>
                        </div>
                        <div class="sale-countdown countdown"></div>
                    </div>
                    <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">




                        @foreach ($product as $val)
                            <form action="{{ route('shopping.carts.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" value="{{ $val->id }}" name="id">
                                <input type="hidden" value="{{ $val->name }}" name="name">
                                @if ($val->discount_price == null)
                                    <input type="hidden" value="{{ $val->selling_price }}" name="selling_price">
                                @else
                                    <input type="hidden" value="{{ $val->discount_price }}" name="discount_price">
                                @endif

                                <input type="hidden" value="{{ $val->image }}" name="image">
                                <input type="hidden" value="{{ $val->stock_quantity }}" name="stock_quantity">
                                <input type="hidden" value="{{ $val->subcategory_id }}" name="subcategory_id">


                                @if ($val->today_deal == 'yes')
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="1500"
                                                        src="{{ asset($val->image) }}" alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        {{--  <li class="select-option"><button class="btn-bg-secondary" type="submit">Add to Cart</button></li>  --}}
                                                        <li class="select-option"><button type="submit"
                                                                class="px-4 py-2 btn btn-success text-white bg-red-600 shadow rounded-full">Add
                                                                to Cart</button></li>









                                                        <li id="{{ $val->id }}" class="quickview"><a href="#"
                                                                data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a
                                                            href="{{ route('product_details', $val->name) }}">{{ $val->name }}</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        @if ($val->discount_price == null)
                                                            <span
                                                                class="price current-price">${{ $val->selling_price }}</span>
                                                        @else
                                                            <span class="price old-price">${{ $val->selling_price }}</span>

                                                            <span
                                                                class="price current-price">${{ $val->discount_price }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </form>
                        @endforeach
                        <!-- End slick-single-layout -->
                    </div>
                </div>
            </div>
        </div>

        <!-- End Flash Sale Area  -->


        {{--  @foreach ($product as $val)
            <!-- Product Quick View Modal Start -->
            <div class="modal fade quick-view-product" id="quick-view-modal{{ $val->id }}" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="far fa-times"></i></button>
                        </div>
                        <div class="modal-body">
                            <div class="single-product-thumb">
                                <div class="row">
                                    <div class="col-lg-7 mb--40">
                                        <div class="row">
                                            <div class="col-lg-10 order-lg-2">
                                                <div
                                                    class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                                    <div class="thumbnail">

                                                        <img src="{{ asset('assets/site/images/product/product-big-01.png') }}"
                                                            alt="Product Images">
                                                        <div class="label-block label-right">
                                                            <div class="product-badget">20% OFF</div>
                                                        </div>
                                                        <div class="product-quick-view position-view">
                                                            <a href="{{ asset('assets/site/images/product/product-big-01.png') }}"
                                                                class="popup-zoom">
                                                                <i class="far fa-search-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="thumbnail">
                                                        <img src="{{ asset('assets/site/images/product/product-big-02.png') }}"
                                                            alt="Product Images">
                                                        <div class="label-block label-right">
                                                            <div class="product-badget">20% OFF</div>
                                                        </div>
                                                        <div class="product-quick-view position-view">
                                                            <a href="{{ asset('assets/site/images/product/product-big-02.png') }}"
                                                                class="popup-zoom">
                                                                <i class="far fa-search-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="thumbnail">
                                                        <img src="{{ asset('assets/site/images/product/product-big-03.png') }}"
                                                            alt="Product Images">
                                                        <div class="label-block label-right">
                                                            <div class="product-badget">20% OFF</div>
                                                        </div>
                                                        <div class="product-quick-view position-view">
                                                            <a href="{{ asset('assets/site/images/product/product-big-03.png') }}"
                                                                class="popup-zoom">
                                                                <i class="far fa-search-plus"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 order-lg-1">
                                                <div class="product-small-thumb small-thumb-wrapper">
                                                    <div class="small-thumb-img">
                                                        <img src="{{ asset('assets/site/images/product/product-thumb/thumb-08.png') }}"
                                                            alt="thumb image">
                                                    </div>
                                                    <div class="small-thumb-img">
                                                        <img src="{{ asset('assets/site/images/product/product-thumb/thumb-07.png') }}"
                                                            alt="thumb image">
                                                    </div>
                                                    <div class="small-thumb-img">
                                                        <img src="{{ asset('assets/site/images/product/product-thumb/thumb-09.png') }}"
                                                            alt="thumb image">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 mb--40">
                                        <div class="single-product-content">
                                            <div class="inner">
                                                <div class="product-rating">
                                                    <div class="star-rating">
                                                        <img src="{{ asset('assets/site/images/icons/rate.png') }}"
                                                            alt="Rate Images">
                                                    </div>
                                                    <div class="review-link">
                                                        <a href="#">(<span>1</span> customer reviews)</a>
                                                    </div>
                                                </div>
                                                <h3 class="product-title">Serif Coffee Table</h3>
                                                <span class="price-amount">$155.00 - $255.00</span>
                                                <ul class="product-meta">
                                                    <li><i class="fal fa-check"></i>In stock</li>
                                                    <li><i class="fal fa-check"></i>Free delivery available</li>
                                                    <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                                </ul>
                                                <p class="description">In ornare lorem ut est dapibus, ut tincidunt nisi
                                                    pretium. Integer ante est, elementum eget magna. Pellentesque sagittis
                                                    dictum libero, eu dignissim tellus.</p>

                                                <div class="product-variations-wrapper">

                                                    <!-- Start Product Variation  -->
                                                    <div class="product-variation">
                                                        <h6 class="title">Colors:</h6>
                                                        <div class="color-variant-wrapper">
                                                            <ul class="color-variant mt--0">
                                                                <li class="color-extra-01 active"><span><span
                                                                            class="color"></span></span>
                                                                </li>
                                                                <li class="color-extra-02"><span><span
                                                                            class="color"></span></span>
                                                                </li>
                                                                <li class="color-extra-03"><span><span
                                                                            class="color"></span></span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!-- End Product Variation  -->

                                                    <!-- Start Product Variation  -->
                                                    <div class="product-variation">
                                                        <h6 class="title">Size:</h6>
                                                        <ul class="range-variant">
                                                            <li>xs</li>
                                                            <li>s</li>
                                                            <li>m</li>
                                                            <li>l</li>
                                                            <li>xl</li>
                                                        </ul>
                                                    </div>
                                                    <!-- End Product Variation  -->

                                                </div>

                                                <!-- Start Product Action Wrapper  -->
                                                <div class="product-action-wrapper d-flex-center">
                                                    <!-- Start Quentity Action  -->
                                                    <div class="pro-qty"><input type="text" value="1"></div>
                                                    <!-- End Quentity Action  -->

                                                    <!-- Start Product Action  -->
                                                    <ul class="product-action d-flex-center mb--0">
                                                        <li class="add-to-cart"><a href="cart.html"
                                                                class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"
                                                                class="axil-btn wishlist-btn"><i
                                                                    class="far fa-heart"></i></a></li>
                                                    </ul>
                                                    <!-- End Product Action  -->

                                                </div>
                                                <!-- End Product Action Wrapper  -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Quick View Modal End -->
        @endforeach  --}}























        <!-- Start Categorie Area  -->
        <div class="axil-categorie-area bg-color-white axil-section-gapcommon">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i class="far fa-tags"></i> Categories</span>
                    <h2 class="title">Browse by Category</h2>
                </div>
                <div class="categrie-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="200" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-4.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Phones</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="300" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-5.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Computers</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="400" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-11.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Accessories</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="500" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-6.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Laptops</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="600" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-2.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Monitors</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="700" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-7.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Networking</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product" data-sal="zoom-out" data-sal-delay="800" data-sal-duration="500">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-8.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">PC Gaming</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-1.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Smartwatches</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-9.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Headphones</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-10.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Camera & Photo</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-8.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Video Games</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="categrie-product">
                            <a href="#">
                                <img class="img-fluid"
                                    src="{{ asset('assets/site/images/product/categories/elec-1.png') }}"
                                    alt="product categorie">
                                <h6 class="cat-title">Sports</h6>
                            </a>
                        </div>
                        <!-- End .categrie-product -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Categorie Area  -->

        <!-- Start Best Sellers Product Area  -->
        <div class="axil-best-seller-product-area bg-color-white axil-section-gap pt--0">
            <div class="container">
                <div class="product-area pb--50">
                    <div class="section-title-wrapper">
                        <span class="title-highlighter highlighter-primary"> <i class="far fa-shopping-basket"></i>This
                            Month</span>
                        <h2 class="title">Best Selling Products</h2>
                    </div>
                    <div
                        class="new-arrivals-product-activation-2 slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/electric/product-05.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="rating-number">(18)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Bass Meets Clarity</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$30</span>
                                            <span class="price old-price">$50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/fashion/product-15.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="rating-number">(24)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Nike Shoe</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$80</span>
                                            <span class="price old-price">$100</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/furniture/product-24.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="rating-number">(34)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Stylish Men's Shoe</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/jewellery/product-10.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="rating-number">(11)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Diamond Bracelet</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/fashion/product-25.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </span>
                                            <span class="rating-number">(14)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Smart Watch</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$30</span>
                                            <span class="price old-price">$35</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/fashion/product-10.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="rating-number">(14)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Women's Cosmetics</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$80</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/jewellery/product-12.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="rating-number">(24)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Denim Black Jacket</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$20</span>
                                            <span class="price old-price">$40</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/fashion/product-13.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <span class="icon">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span>
                                            <span class="rating-number">(24)</span>
                                        </div>
                                        <h5 class="title"><a href="single-product.html">Diamond Bracelet</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$30</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-three">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                            src="{{ asset('assets/site/images/product/jewellery/product-14.png') }}"
                                            alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                            </li>
                                            <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
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
                                        <h5 class="title"><a href="single-product.html">Diamond Ring</a></h5>
                                        <div class="product-price-variant">
                                            <span class="price current-price">$40</span>
                                            <span class="price old-price">$60</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End .slick-single-layout -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End  Best Sellers Product Area  -->

        <!-- Poster Countdown Area  -->
        <div class="axil-poster-countdown">
            <div class="container">
                <div class="poster-countdown-wrap bg-lighter">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="poster-countdown-content">
                                <div class="section-title-wrapper">
                                    <span class="title-highlighter highlighter-secondary"> <i
                                            class="fal fa-headphones-alt"></i> Don’t Miss!!</span>
                                    <h2 class="title">Enhance Your Music Experience</h2>
                                </div>
                                <div class="poster-countdown countdown mb--40"></div>
                                <a href="#" class="axil-btn btn-bg-primary">Check it Out!</a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="poster-countdown-thumbnail">
                                <img src="{{ asset('assets/site/images/product/poster/poster-03.png') }}"
                                    alt="Poster Product">
                                <div class="music-singnal">
                                    <div class="item-circle circle-1"></div>
                                    <div class="item-circle circle-2"></div>
                                    <div class="item-circle circle-3"></div>
                                    <div class="item-circle circle-4"></div>
                                    <div class="item-circle circle-5"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Poster Countdown Area  -->

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white axil-section-gap">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"> <i class="fal fa-store"></i> Our Products</span>
                    <h2 class="title">Explore our Products</h2>
                </div>
                <div
                    class="explore-product-activation slick-layout-wrapper slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                class="main-img"
                                                src="{{ asset('assets/site/images/product/electric/product-01.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/electric/product-08.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option">
                                                    <a href="single-product.html">
                                                        Add to Cart
                                                    </a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
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
                                            <h5 class="title"><a href="single-product.html">Yantiti Leather & Canvas
                                                    Bags</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-15.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/fashion/product-24.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Nike Shoe</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/furniture/product-1.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/furniture/product-2.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Stylish Wooden Chair</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="500" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/jewellery/product-3.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/jewellery/product-4.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(44)</span>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Womens Ring</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-10.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/fashion/product-12.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Women's Cosmetis</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-16.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Full Sleev T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="400" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/electric/product-07.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/electric/product-08.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
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
                                            <h5 class="title"><a href="single-product.html">Zone Headphone</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="500" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/furniture/product-15.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select Option</a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Wooden Box Waredrove</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="row row--15">
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                class="main-img"
                                                src="{{ asset('assets/site/images/product/electric/product-01.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/electric/product-08.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option">
                                                    <a href="single-product.html">
                                                        Add to Cart
                                                    </a>
                                                </li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
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
                                            <h5 class="title"><a href="single-product.html">Yantiti Leather & Canvas
                                                    Bags</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-15.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/fashion/product-24.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Nike Shoe</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/furniture/product-1.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/furniture/product-2.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a>
                                                </li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Stylish Wooden Chair</a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="500" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/jewellery/product-3.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/jewellery/product-4.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <div class="product-rating">
                                                <span class="icon">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </span>
                                                <span class="rating-number">(44)</span>
                                            </div>
                                            <h5 class="title"><a href="single-product.html">Womens Ring</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-10.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/fashion/product-12.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Women's Cosmetis</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="300" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/fashion/product-16.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Full Sleev T-shirt</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="400" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/electric/product-07.png') }}"
                                                alt="Product Images">
                                            <img class="hover-img"
                                                src="{{ asset('assets/site/images/product/electric/product-08.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
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
                                            <h5 class="title"><a href="single-product.html">Zone Headphone</a></h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30">
                                <div class="axil-product product-style-one">
                                    <div class="thumbnail">
                                        <a href="single-product.html">
                                            <img data-sal="zoom-out" data-sal-delay="500" data-sal-duration="800"
                                                src="{{ asset('assets/site/images/product/furniture/product-15.png') }}"
                                                alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                            <div class="product-badget">20% Off</div>
                                        </div>
                                        <div class="product-hover-action">
                                            <ul class="cart-action">
                                                <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#quick-view-modal"><i
                                                            class="far fa-eye"></i></a></li>
                                                <li class="select-option"><a href="single-product.html">Select
                                                        Option</a></li>
                                                <li class="wishlist"><a href="wishlist.html"><i
                                                            class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title"><a href="single-product.html">Wooden Box Waredrove</a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">$29.99</span>
                                                <span class="price old-price">$49.99</span>
                                            </div>
                                            <div class="color-variant-wrapper">
                                                <ul class="color-variant">
                                                    <li class="color-extra-01 active"><span><span
                                                                class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-02"><span><span class="color"></span></span>
                                                    </li>
                                                    <li class="color-extra-03"><span><span class="color"></span></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Product  -->
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Expolre Product Area  -->

        <!-- Start Testimonila Area  -->
        <div class="axil-testimoial-area axil-section-gap bg-vista-white">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-secondary"> <i
                            class="fal fa-quote-left"></i>Testimonials</span>
                    <h2 class="title">Users Feedback</h2>
                </div>
                <!-- End .section-title -->
                <div
                    class="testimonial-slick-activation testimonial-style-one-wrapper slick-layout-wrapper--20 axil-slick-arrow arrow-top-slide">
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“ It’s amazing how much easier it has been to
                                meet new people and create instantly non
                                connections. I have the exact same personal
                                the only thing that has changed is my mind
                                set and a few behaviors. “</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('assets/site/images/testimonial/image-1.png') }}"
                                    alt="testimonial image">
                            </div>
                            <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“ It’s amazing how much easier it has been to
                                meet new people and create instantly non
                                connections. I have the exact same personal
                                the only thing that has changed is my mind
                                set and a few behaviors. “</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('assets/site/images/testimonial/image-2.png') }}"
                                    alt="testimonial image">
                            </div>
                            <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“ It’s amazing how much easier it has been to
                                meet new people and create instantly non
                                connections. I have the exact same personal
                                the only thing that has changed is my mind
                                set and a few behaviors. “</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('assets/site/images/testimonial/image-3.png') }}"
                                    alt="testimonial image">
                            </div>
                            <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout testimonial-style-one">
                        <div class="review-speech">
                            <p>“ It’s amazing how much easier it has been to
                                meet new people and create instantly non
                                connections. I have the exact same personal
                                the only thing that has changed is my mind
                                set and a few behaviors. “</p>
                        </div>
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('assets/site/images/testimonial/image-2.png') }}"
                                    alt="testimonial image">
                            </div>
                            <div class="media-body">
                                <span class="designation">Head Of Idea</span>
                                <h6 class="title">James C. Anderson</h6>
                            </div>
                        </div>
                        <!-- End .thumbnail -->
                    </div>
                    <!-- End .slick-single-layout -->

                </div>
            </div>
        </div>
        <!-- End Testimonila Area  -->

        <!-- Start New Arrivals Product Area  -->
        <div class="axil-new-arrivals-product-area bg-color-white axil-section-gap pb--50">
            <div class="container">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This
                        Week’s</span>
                    <h2 class="title">New Arrivals</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--30 axil-slick-arrow  arrow-top-slide">
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-14.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Full A-Line Dress</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$25</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-15.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Leather Hand Bag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$45</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-4.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Guys Bomber Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$20</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-5.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Full A-Line Dress</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$25</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-10.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">10% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Men's Tshirt</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$30</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="200" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-11.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">25% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Leather Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="300" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-12.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">15% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Leather Hand Bag</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$45</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-two has-color-pick">
                            <div class="thumbnail">
                                <a href="single-product.html">
                                    <img data-sal="fade" data-sal-delay="400" data-sal-duration="1500"
                                        src="{{ asset('assets/site/images/product/fashion/product-13.png') }}"
                                        alt="Product Images">
                                </a>
                                <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="color-variant-wrapper">
                                        <ul class="color-variant">
                                            <li class="color-extra-01 active"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-02"><span><span class="color"></span></span>
                                            </li>
                                            <li class="color-extra-03"><span><span class="color"></span></span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h5 class="title"><a href="single-product.html">Guys Bomber Jacket</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$20</span>
                                    </div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action justify-content-center">
                                        <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li class="select-option"><a href="cart.html">Add to Cart</a></li>
                                        <li class="quickview"><a href="#" data-bs-toggle="modal"
                                                data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
        <!-- End New Arrivals Product Area  -->

        <!-- Start Axil Newsletter Area  -->
        <div class="axil-newsletter-area axil-section-gap pt--0">
            <div class="container">
                <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                    <div class="newsletter-content">
                        <span class="title-highlighter highlighter-primary2"><i
                                class="fas fa-envelope-open"></i>Newsletter</span>
                        <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="example@gmail.com" type="text">
                            </div>
                            <button type="submit" class="axil-btn mb--15">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End .container -->
        </div>
        <!-- End Axil Newsletter Area  -->

    </main>


    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/site/images/icons/service1.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/site/images/icons/service2.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/site/images/icons/service3.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="{{ asset('assets/site/images/icons/service4.png') }}" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="cart-dropdown" id="cart-dropdown">
        <div class="cart-content-wrap">
            <div class="cart-header">
                <h2 class="header-title">Cart review</h2>
                <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-body">
                <ul class="cart-item-list">

                    @foreach ($cartItems as $key => $vals)
                        <li class="cart-item">
                            <div class="item-img">
                                <a href="single-product.html"><img src="{{ asset($vals->attributes->image) }}"
                                        alt="Commodo Blown Lamp"></a>
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
                                <h3 class="item-title"><a href="">{{ $vals->name }}</a></h3>
                                @if ($vals->discount_price == null)
                                    <span class="price current-price">${{ $vals->selling_price }}</span>
                                @else
                                    <span class="price old-price"><strike>${{ $vals->selling_price }}</strike></span>

                                    <span class="price current-price">${{ $vals->discount_price }}</span>
                                @endif
                                {{--  <div class="item-price"><span class="currency-symbol">$</span>155.00</div>  --}}
                                <div class="pro-qty item-quantity">
                                    <input type="number" class="quantity-input" value="{{ $vals->quantity }}">
                                </div>
                            </div>
                        </li>
                    @endforeach



                </ul>
            </div>
            <div class="cart-footer">
                <h3 class="cart-subtotal">
                    <span class="subtotal-title">Subtotal:</span>
                    <span class="subtotal-amount">$610.00</span>
                </h3>
                <div class="group-btn">
                    <a href="{{ route('shopping.cartlist') }}" class="axil-btn btn-bg-primary viewcart-btn">View
                        Cart</a>
                    <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>











    <!-- Product Quick View Modal Start -->
    <div class="modal fade quick-view-product" id="quick-view-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header" id="quickview_body" >
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>









            </div>
        </div>
    </div>

@endsection












{{--  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5"></script>  --}}

@section('script')
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  --}}
    <script type="text/javascript">
        //ajax request send for collect childcategory
        $(document).on('click', '.quickview', function() {
            var id = $(this).attr("id");
            {{--  alert(id);  --}}
            $.ajax({
                url: "{{ url('/quickview/') }}/" + id,
                type: 'get',
                success: function(data) {
                    $("#quickview_body").html(data);
                }
            });
        });
    </script>






    <script>
        $(document).ready(function() {
            $('#cart-form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();
                {{--  console.log('click', formData);  --}}

                $.ajax({
                    url: '{{ route('shopping.carts.store') }}',
                    type: 'POST',
                    data: formData,
                    success: function(response) {
                        // Show SweetAlert Toast success notification
                        Swal.fire({
                            icon: 'success',
                            title: 'Congratulations!',
                            text: 'Cart added successfully',
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });

                        // Reset the form
                        $('#cart-form')[0].reset();
                    },
                    error: function(xhr) {
                        // Show SweetAlert Toast error notification
                        Swal.fire({
                            icon: 'error',
                            title: xhr.responseJSON.error ? xhr.responseJSON.title :
                                'Error',
                            text: xhr.responseJSON.message,
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true
                        });
                    }
                });
            });
        });
    </script>
@endsection
