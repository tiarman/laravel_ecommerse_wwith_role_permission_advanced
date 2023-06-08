
  <form action="{{ route('shopping.carts.store') }}" method="post" enctype="multipart/form-data">
    @csrf



    <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                @if ($product->discount_price==NULL)
                                <input type="hidden" value="{{ $product->selling_price }}" name="selling_price">
                                @else
                                <input type="hidden" value="{{ $product->discount_price }}" name="discount_price">
                                @endif
                                <input type="hidden" value="{{ $product->image }}"  name="image">
                                <input type="hidden" value="{{ $product->stock_quantity }}"  name="stock_quantity">
                                <input type="hidden" value="{{ $product->subcategory_id }}"  name="subcategory_id">
 <div class="modal-body">
                    <div class="single-product-thumb">
                        <div class="row">
                            <div class="col-lg-7 mb--40">
                                <div class="row">
                                    <div class="col-lg-10 order-lg-2">
                                        <div class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery">
                                            @foreach($product_file as $val)
                                        <div class="thumbnail">
                                            <a href="{{ asset($val->file) }}" class="popup-zoom">
                                                <img src="{{ asset($val->file) }}" alt="Product Images">
                                            </a>
                                        </div>
                                        @endforeach


                                        </div>
                                    </div>
                                    <div class="col-lg-2 order-lg-1">

                                        <div class="product-small-thumb small-thumb-wrapper">
                                            @foreach($product_file as $val)
                                            <div class="small-thumb-img">
                                                <img src="{{ asset($val->file) }}" alt="thumb image">
                                            </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 mb--40">
                                <div class="single-product-content">
                                    <div class="inner">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <img src="{{asset('assets/site/images/icons/rate.png')}}" alt="Rate Images">
                                            </div>
                                            <div class="review-link">
                                                <a href="#">(<span>1</span> customer reviews)</a>
                                            </div>
                                        </div>
                                        <h3 class="product-title">{{$product->name}}</h3>
                                        {{--  <span class="price-amount">$155.00 - $255.00</span>  --}}
                                        @if ($product->discount_price==NULL)
                                <span class="price-amount">${{$product->selling_price}}</span>
                                @else

                                <span class="price-amount"><span style="color:red"><s>${{$product->selling_price}}</s></span> <span></span>  ${{$product->discount_price}}</span>



                                @endif
                                        <ul class="product-meta">
                                            <li><i class="fal fa-check"></i>In stock</li>
                                            <li><i class="fal fa-check"></i>Free delivery available</li>
                                            <li><i class="fal fa-check"></i>Sales 30% Off Use Code: MOTIVE30</li>
                                        </ul>
                                        <p class="description">{{$product->description}}</p>

                                        <div class="product-variations-wrapper">

                                            <!-- Start Product Variation  -->
                                            <div class="product-variation">

                                                <label style="color: #3577f0">Select Color</label>
                                                <select name="rating" class="select2">
                                                    <option selected disabled >Select Color</option>
                                                    @foreach ($selectedColors as $col )
                                                    <option value="1">{{$col}}</option>
                                                    @endforeach


                                                </select>
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
                                                <li class="add-to-cart"><a href="cart.html" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                <li class="wishlist"><a href="wishlist.html" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
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
  </form>
