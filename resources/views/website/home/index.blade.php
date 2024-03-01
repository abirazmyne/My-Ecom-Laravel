@extends('website.master')

@section('body')

    <section class="hero-area mt-0 mb-0">
        <div class="">
            <div class="row">
                <div class="col-lg col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="hero-slider">
                            @if(isset($sliders))
                            @foreach($sliders as $slider)

                            <div class="single-slider" style="background-image: url({{asset($slider->image)}});">
                                <div class="content">

                                    @if(isset($slider->title))
                                    <h2>{{$slider->title}}</h2>
                                    @else
                                        <h2></h2>
                                    @endif

                                    @if(isset($slider->product_name))
                                    <h4>{{$slider->product_name}}</h4>

                                    @else
                                        <h4></h4>
                                    @endif

                                    @if(isset($slider->Description))
                                            <p>{{$slider->Description}}</p>
                                        @else
                                            <p></p>
                                        @endif


                                    @if(isset($slider->product_price))
                                        <h3><span>Now Only</span> {{$slider->product_price}} TK. </h3>

                                    @else

                                                <h3></h3>
                                    @endif




{{--                                    <div class="button">--}}
{{--                                        <a href="{{route('home')}}" class="btn">Shop Now</a>--}}

{{--                                    </div>--}}
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="shipping-info">
        <div class="container">
            <ul>
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>All Bangladesh Shipping</h5>
                        <span>On order over 150 TK</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>

                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section class="trending-product  mb-0  pb-0">
        <div class="container pb-5">
            <div class="section-title">
                <h2>OUR PRODUCTS</h2>
            </div>

            <div class="row mb-3">
                @foreach($allProducts as $allProduct)
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">

                    <div class="single-product ">
                        <div class="product-image">
                            <img src="{{asset($allProduct->image)}}" alt="#" class="img-fluid rounded-2" style=" height: 310px; min-width: 290px;   ">

{{--                            <p><b>Product Status: </b><b class="text-info">--}}
{{--                                    @if ($product->product_status == 0)--}}
{{--                                        Regular Product--}}
{{--                                    @elseif ($product->product_status == 1)--}}
{{--                                        Offer Product--}}
{{--                                    @elseif ($product->product_status == 2)--}}
{{--                                        New Arrivals--}}
{{--                                    @else--}}
{{--                                        Regular Product--}}
{{--                                    @endif--}}
{{--                                </b></p>--}}
                            <div>
                                @if ($allProduct->product_status == 0)
                                    <span class="sale-tag bg-success">Regular</span>
                                @elseif ($allProduct->product_status == 1)
                                    <span class="sale-tag">Offer</span>
                                @elseif ($allProduct->product_status == 2)
                                    <span class="new-tag">New</span>
                                @else
                                    Regular Product
                                @endif
                            </div>

                            <div class="button">
                                <form action="{{route('cart.add', ['id' => $allProduct->id])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qty" value="1" min="1" class="">
                                <button type="submit" class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
                                </form>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{$allProduct->category->name}}</span>
                            <h4 class="title">
                                <a href="{{route('product.detail', ['id' => $allProduct->id])}}">{{$allProduct->name,20}}</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            @switch($allProduct->product_status)
                                @case(0)
                                <div class="price">
                                    <span>{{$allProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                </div>
                                @break
                                @case(1)
                                <div class="price">
                                    <span>{{$allProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                    <span class="discount-price">{{$allProduct->regular_price}} </span>
                                </div>
                                @break
                                @case(2)
                                <div class="price">
                                    <span>{{$allProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                    <span class="discount-price">{{$allProduct->regular_price}}</span>
                                </div>
                                @break
                            @endswitch

                        </div>
                    </div>

                </div>

                @endforeach
            </div>
            <div class="row">
                <a href="" class="col-md-3 btn btn-success mx-auto text-center mt-3"> <b>View All Products</b> </a>
            </div>
        </div>
    </section>





    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Best Sellers</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/01.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">GoPro Hero4 Silver</a>
                            </h3>
                            <span>$287.99</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/02.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Puro Sound Labs BT2200</a>
                            </h3>
                            <span>$95.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/03.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                            </h3>
                            <span>$120.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">New Arrivals</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/04.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>$1150.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/05.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                            </h3>
                            <span>$950.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/06.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Microsoft Xbox One S</a>
                            </h3>
                            <span>$298.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">Top Rated</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/07.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>$68.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/08.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                            </h3>
                            <span>$840.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html"><img src="{{asset('/')}}website/assets/images/home-product-list/09.jpg" alt="#"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                            </h3>
                            <span>$28.00</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="brands">
        <div class="">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    @foreach($brands as $brand)
                        <div class="brand-logo">
                            <img src="{{asset($brand->image)}}" class="img-fluid" alt="#">
                        </div>
                    @endforeach
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/02.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/03.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/04.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/05.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/06.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/03.png" alt="#">
                    </div>
                    <div class="brand-logo">
                        <img src="{{asset('/')}}website/assets/images/brands/04.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
