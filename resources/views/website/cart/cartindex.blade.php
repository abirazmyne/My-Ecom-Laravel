@extends('website.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <p class="text-center text-success">{{session('message')}}</p>

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php($sum= 0)
                @foreach($products as $product)


                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html">
                                <img src="{{asset($product->options->image)}}" alt="#" class="img-fluid" style="height:100px; width: 100px;">
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name">
                                <a href="product-details.html">{{$product->name}}</a>
                            </h5>
                            <p class="product-des">
                                <span><em>Category:</em> {{$product->options->category}}</span>
                                <span><em>Brand:</em> {{$product->options->brand}}</span>
                                <span><em>Color:</em> {{$product->options->color}}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <form action="{{route('cart.update',['rowId' => $product->rowId])}}" method="POST">
                                @csrf
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" value="{{$product->qty}}" name="qty">
                                <button type="submit" class="btn btn-success"> Update</button>
                            </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$product->price}} <span class="text-danger">TK.</span></p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$product->price * $product->qty}} <span class="text-danger">TK.</span></p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="{{route('cart.remove',['rowId' => $product->rowId])}}" onclick="return confirm('Are you sure to delete this?')">
                                <i class="lni lni-close"></i>
                            </a>
                        </div>
                    </div>
                </div>
                   @php($sum = $sum + $product->subtotal)

                @endforeach



            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{$sum}} TK.</span></li>
                                        <li>Shipping<span> {{$shipping= 70 }} TK.</span></li>
                                        <li>Tax Amount(5%) : <span>@php($tax = $sum*0.05) {{round($tax)}} TK.</span></li>
                                        <li class="last">Total Product Payable<span>{{$totalPayble = $sum+ $tax + $shipping}} TK.</span></li>
                                    </ul>

                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn">Checkout</a>
                                        <a href="{{route('home')}}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
