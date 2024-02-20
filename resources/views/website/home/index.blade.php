@extends('website.master')

@section('body')

    <section class="hero-area mt-0 mb-0">
        <div class="container">
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




                                    <div class="button">
                                        <a href="{{route('home')}}" class="btn">Shop Now</a>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif


                        </div>

                    </div>
                </div>
{{--                <div class="col-lg-4 col-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">--}}

{{--                            <div class="hero-small-banner" style="background-image: url('{{asset('/')}}website/assets/images/hero/slider-bnr.jpg');">--}}
{{--                                <div class="content">--}}
{{--                                    <h2>--}}
{{--                                        <span>New line required</span>--}}
{{--                                        iPhone 12 Pro Max--}}
{{--                                    </h2>--}}
{{--                                    <h3>$259.99</h3>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="col-lg-12 col-md-6 col-12">--}}

{{--                            <div class="hero-small-banner style2">--}}
{{--                                <div class="content">--}}
{{--                                    <h2>Weekly Sale!</h2>--}}
{{--                                    <p>Saving up to 50% off all online store items this week.</p>--}}
{{--                                    <div class="button">--}}
{{--                                        <a class="btn" href="product-grids.html">Shop Now</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>


{{--    <section class="featured-categories section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="section-title">--}}
{{--                        <h2>Featured Categories</h2>--}}
{{--                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have--}}
{{--                            suffered alteration in some form.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                @foreach($categories as $category)--}}
{{--                <div class="col-lg-4 col-md-6 col-12">--}}
{{--                    <div class="single-category">--}}
{{--                        <h3 class="heading" onchange="getSubCategoryByCategory(this.value)">{{$category->name}}</h3>--}}


{{--                        <ul id="subCategoryId">--}}
{{--                            @foreach($subCategories as $subCategory)--}}
{{--                            <li><a href="">{{$subCategory->name}}</a></li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                        <div class="images">--}}
{{--                            <img src="{{asset('/')}}website/assets/images/featured-categories/fetured-item-1.png" alt="#">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <section class="trending-product section section mb-0  pb-0">
        <div class="container pb-5">

            <div class="row mb-3">
                @foreach($allProducts as $allProduct)
                <div class="col-lg-3 col-md-6 col-12">

                    <div class="single-product">
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



    <section class="trending-product section m-0 p-0">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($newProducts as $newProduct)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img src="{{$newProduct->image}}" alt="#" class="img-fluid " style=" height: 310px; min-width: 290px  ">
                            <div class="button">
                                <form action="{{route('cart.add', ['id' => $newProduct->id])}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qty" value="1" min="1" class="">
                                    <button type="submit" class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
                                </form>

                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{$newProduct->category->name}}</span>
                            <h4 class="title">
                                <a href="{{route('product.detail', ['id' => $newProduct->id])}}">{{$newProduct->name}}</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>

                            @switch($newProduct->product_status)
                                @case(0)
                                <div class="price">
                                    <span>{{$newProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                </div>
                                @break
                                @case(1)
                                <div class="price">
                                    <span>{{$newProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                    <span class="discount-price">{{$allProduct->regular_price}} </span>
                                </div>
                                @break
                                @case(2)
                                <div class="price">
                                    <span>{{$newProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                    <span class="discount-price">{{$newProduct->regular_price}}</span>
                                </div>
                                @break
                            @endswitch
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <a href="" class="col-md-3 btn btn-danger mx-auto text-center mt-3"> <b> All New Products</b> </a>
            </div>
        </div>
    </section>


    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('{{asset('/')}}website/assets/images/banner/banner-1-bg.jpg')">
                        <div class="content">
                            <h2>Smart Watch 2.0</h2>
                            <p>Space Gray Aluminum Case with <br>Black/Volt Real Sport Band </p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin" style="background-image:url('{{asset('/')}}website/assets/images/banner/banner-2-bg.jpg')">
                        <div class="content">
                            <h2>Smart Headphone</h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Special Offer</h2>
{{--                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have--}}
{{--                            suffered alteration in some form.</p>--}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @foreach($offerProducts as $offerProduct)
                        <div class="col-lg-4 col-md-4 col-12">

                            <div class="single-product" style="height: 460px">
                                <div class="product-image">
                                    <img src="{{$offerProduct->image}}" alt="#" class="img-fluid " style=" min-width: 290px  ">
                                    <div class="button">
                                        <form action="{{route('cart.add', ['id' => $offerProduct->id])}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="qty" value="1" min="1" class="">
                                            <button type="submit" class="btn"><i class="lni lni-cart"></i> Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <span class="category">{{$offerProduct->category->name}}</span>
                                    <h4 class="title">
                                        <a href="{{route('product.detail', ['id' => $offerProduct->id])}}">{{$offerProduct->name}}</a>
                                    </h4>
                                    <ul class="review">
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><i class="lni lni-star-filled"></i></li>
                                        <li><span>5.0 Review(s)</span></li>
                                    </ul>
                                    @switch($offerProduct->product_status)
                                        @case(0)
                                        <div class="price">
                                            <span>{{$offerProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                        </div>
                                        @break
                                        @case(1)
                                        <div class="price">
                                            <span>{{$offerProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                            <span class="discount-price">{{$offerProduct->regular_price}} </span>
                                        </div>
                                        @break
                                        @case(2)
                                        <div class="price">
                                            <span>{{$offerProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                            <span class="discount-price">{{$offerProduct->regular_price}}</span>
                                        </div>
                                        @break
                                    @endswitch
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                    <div class="single-banner right" style="background-image:url('{{asset('/')}}website/assets/images/banner/banner-3-bg.jpg');margin-top: 30px;">
                        <div class="content">
                            <h2>Samsung Notebook 9 </h2>
                            <p>Lorem ipsum dolor sit amet, <br>eiusmod tempor
                                incididunt ut labore.</p>
                            <div class="price">
                                <span>$590.00</span>
                            </div>
                            <div class="button">
                                <a href="product-grids.html" class="btn">Shop Now</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="{{asset('/')}}website/assets/images/offer/offer-image.jpg" alt="#">
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2><a href="product-grids.html">Bluetooth Headphone</a></h2>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><span>5.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>$200.00</span>
                                <span class="discount-price">$400.00</span>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry incididunt ut
                                eiusmod tempor labores.</p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">000</h1>
                                <h2 id="daystxt">Days</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">00</h1>
                                <h2 id="hourstxt">Hours</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">00</h1>
                                <h2 id="minutestxt">Minutes</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">00</h1>
                                <h2 id="secondstxt">Secondes</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24);" class="alert">
                            <h1 style="padding: 50px 80px;color: white;">We are sorry, Event ended ! </h1>
                        </div>
                    </div>
                </div>
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


    <section class="blog-section section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest News</h2>
                        <p>There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="{{asset('/')}}website/assets/images/blog/blog-1.jpg" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="{{asset('/')}}website/assets/images/blog/blog-2.jpg" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img src="{{asset('/')}}website/assets/images/blog/blog-3.jpg" alt="#">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                </a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
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
                        <h5>Free Shipping</h5>
                        <span>On order over $99</span>
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


@endsection
