@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="bg-dark py-3 text-white text-center rounded-2" >Order Checkout Information </h6>
                                <section class="checkout-steps-form-content  show" >
                                    <form action="{{route('new.order')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="shippingcost" id="shippingcost">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>User Name</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            @if(isset($customer->name))
                                                                <input type="text" class="form-control" value="{{$customer->name}}" readonly name="name" placeholder="Full Name">
                                                            @else
                                                                <input type="text" name="name" placeholder="Full Name">

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Email Address</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->email))
                                                            <input type="text" class="form-control" value="{{$customer->email}}" readonly name="email" placeholder="Email address">
                                                        @else
                                                            <input type="email" name="email" placeholder="Email Address">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-form form-default">
                                                    <label>Mobile Number</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->mobile))
                                                            <input type="number" class="form-control" value="{{$customer->mobile}}"  readonly name="mobile" placeholder="Mobile NumberE">
                                                        @else
                                                            <input type="number" name="mobile" placeholder="Mobile Number">
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label for="location">Select Location:</label>
                                                    <select class="form-control" id="location" onchange="calculateShipping()">
                                                        <option value="" disabled selected > -- Select Order Type --</option>
                                                        <option value="inside dhaka">Inside Dhaka</option>
                                                        <option value="outside dhaka">Outside Dhaka</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>Delivery Address</label>
                                                    <div class="form-input form">
                                                        @if(isset($customer->address))
                                                            <textarea type="number"  class="form-control"  name="address" placeholder="Delivery Address"> {{$customer->address}}</textarea>
                                                        @else
                                                            <textarea type="text" class="form-control" name="address" style="height: 160px;" placeholder="Delivery Address"></textarea>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>

                                            @if(Session::get('customer_id'))


                                            @else
                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Post Code</label>
                                                        <div class="form-input form">
                                                            @if(isset($customer->post_code))
                                                                <input type="number" value="{{$customer->post_code}}" class="form-control"  name="post_code" placeholder="Post Code">
                                                            @else
                                                                <input type="text" placeholder="Post Code" name="post_code">
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-form form-default">
                                                        <label>Your Image</label>
                                                        <div class="">
                                                            @if(isset($customer->image))
                                                                <input type="file" value="{{$customer->image}}" hidden class="form-control"  name="image" placeholder="Image">
                                                            @else
                                                                <input type="file" class="form-control" name="image" placeholder="Image">
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>


                                            @endif






                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label for="location">Payment Method:</label>
                                                    <div>
                                                        <label class="me-3" for=""><input type="radio" name="payment_method" value="Cash" checked> Cash On Delivery</label>
                                                        <label for=""><input type="radio" name="payment_method" value="Online" > Online </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">next
                                                        step</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                @php($sum=0)

                                @foreach(Cart::content() as $cartItem)
                                <div class="total-price">
                                    <p class="value">{{$cartItem->name,10}} * {{$cartItem->qty}} * {{$cartItem->price}} :</p>
                                    <p class="price">{{round($cartItem->subtotal)}} <span class="text-danger">TK.</span></p>
                                </div>
                                    @php($sum = $sum + $cartItem->subtotal)
                                @endforeach
                            </div>`
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Cart total price:</p>
                                    <p class="price">{{$sum}} <span class="text-danger">TK.</span></p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Total (5%):</p>
                                    <p class="price">{{round($tax= 0.05 * $sum)}} <span class="text-danger">TK.</span></p>
                                </div>
                                <hr>
                                <div class="payable-price">
                                    <p class="value">Product total price:</p>
                                    <p class="price">{{round($product_total = $tax + $sum)}} <span class="text-danger">TK.</span></p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Price:</p>
                                    <p class="price" id="shipping-cost"> <span class="text-danger">TK.</span></p>
                                </div>

                                <?php
                                Session::put('product_total' , round($product_total));
                                Session::put('tax_total' , round($tax));
                                ?>


{{--                                <input type="hidden" name="shippingcost" id="shippingcost">--}}

                                <script>
                                    function calculateShipping() {
                                        var location = document.getElementById("location").value;
                                        var shippingCost = (location === "inside dhaka") ? 100 : 150;
                                        document.getElementById("shipping-cost").innerHTML = shippingCost + " TK.";
                                        document.getElementById("shippingcost").value = shippingCost;
                                        {{--var shippingCostVariable = shippingCost;--}}
                                        {{--var shippingCostElement = document.getElementsByClassName("price")[0];--}}
                                        {{--shippingCostElement.innerHTML = "{{$shipping_cost = " + shippingCostVariable + "}}<span class=\"text-danger\">TK.</span>";--}}
                                    }
                                </script>



{{--                                <div class="payable-price">--}}
{{--                                    <p class="value">Shipping Price:</p>--}}
{{--                                    <p class="price" id="shipping-cost"> <span class="text-danger">TK.</span></p>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <label for="location">Location:</label>--}}
{{--                                    <select class="form-control" id="location" onchange="calculateShipping()">--}}
{{--                                        <option value="inside dhaka">Inside Dhaka</option>--}}
{{--                                        <option value="outside dhaka">Outside Dhaka</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <input type="hidden" name="shippingcost" id="shippingcost">--}}

{{--                                <script>--}}
{{--                                    function calculateShipping() {--}}
{{--                                        var location = document.getElementById("location").value;--}}
{{--                                        var shippingCost = (location === "inside dhaka") ? 100 : 150;--}}
{{--                                        document.getElementById("shipping-cost").innerHTML = shippingCost + " TK.";--}}
{{--                                        document.getElementById("shippingcost").value = shippingCost;--}}
{{--                                        var shippingCostVariable = shippingCost;--}}
{{--                                        var shippingCostElement = document.getElementsByClassName("price")[0];--}}
{{--                                        shippingCostElement.innerHTML = "{{$shipping_cost = " + shippingCostVariable + "}}<span class=\"text-danger\">TK.</span>";--}}
{{--                                    }--}}
{{--                                </script>--}}
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
