@extends('layouts.nav2')
@section('stylesheet1')

@endsection

@section('content1')





<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Cart</h4>
                    <a href="#" class="cart-clear">Clear Shoping Cart</a>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title"></th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartItems as $val)


                            <tr>
                                {{--  <td class="class="text-right md:table-cell">
                                    <form action="{{ route('shopping.remove') }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" value="{{ $val->id }}" name="id">
                                        <button type="submit" class="px-4 py-2 btn btn-success text-white bg-red-600 shadow rounded-full">Remove</button>
                                    </form>
                                </td>  --}}
                                <td class="product-remove"><a href="{{ route('shopping.remove') }}" data-id="{{$val->id}}" id="removeProduct" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                <td class="product-thumbnail"><a href="single-product.html"><img src="{{ asset($val->image) }}" alt="Digital Product"></a></td>
                                <td class="product-title"><a href="single-product.html">{{ $val->name }}</a></td>
                                <td class="product-price" data-title="Price"><span class="currency-symbol">$</span>{{ $val->price }}</td>
                                <td class="product-quantity" data-title="Qty">
                                    <div class="pro-qty">
                                        <input type="number" class="quantity-input" value="{{$val->qty}}">
                                    </div>
                                </td>
                                <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">$</span>275.00</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="cart-update-btn-area">
                    <div class="input-group product-cupon">
                        <input placeholder="Enter coupon code" type="text">
                        <div class="product-cupon-btn">
                            <button type="submit" class="axil-btn btn-outline">Apply</button>
                        </div>
                    </div>
                    <div class="update-btn">
                        <a href="#" class="axil-btn btn-outline">Update Cart</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                        <div class="axil-order-summery mt--80">
                            <h5 class="title mb--20">Order Summary</h5>
                            <div class="summery-table-wrap">
                                <table class="table summery-table mb--30">
                                    <tbody>
                                        <tr class="order-subtotal">
                                            <td>Subtotal</td>
                                            <td>$117.00</td>
                                        </tr>
                                        <tr class="order-shipping">
                                            <td>Shipping</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="radio" id="radio1" name="shipping" checked>
                                                    <label for="radio1">Free Shippping</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio2" name="shipping">
                                                    <label for="radio2">Local: $35.00</label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="radio" id="radio3" name="shipping">
                                                    <label for="radio3">Flat rate: $12.00</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="order-tax">
                                            <td>State Tax</td>
                                            <td>$8.00</td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>Total</td>
                                            <td class="order-total-amount">$125.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="checkout.html" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area  -->

</main>


<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="{{asset('assets/site/images/icons/service1.png')}}" alt="Service">
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
                        <img src="{{asset('assets/site/images/icons/service2.png')}}" alt="Service">
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
                        <img src="{{asset('assets/site/images/icons/service3.png')}}" alt="Service">
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
                        <img src="{{asset('assets/site/images/icons/service4.png')}}" alt="Service">
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







@endsection

@section('script1')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.5"></script>
@endsection
