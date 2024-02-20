@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Shop Grid</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="javascript:void(0)">Shop</a></li>
                        <li>Shop Grid</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="product-grids section">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
{{--                                        <label for="sorting">Sort by:</label>--}}
{{--                                        <select class="form-control" id="sorting">--}}
{{--                                            <option>New</option>--}}
{{--                                            <option>Low - High Price</option>--}}
{{--                                            <option>High - Low Price</option>--}}
{{--                                            <option>Average Rating</option>--}}
{{--                                            <option>A - Z Order</option>--}}
{{--                                            <option>Z - A Order</option>--}}
{{--                                        </select>--}}
                                        <h3 class="total-show-product">Showing: <span>{{ $categoryProducts->firstItem() }} - {{ $categoryProducts->lastItem() }} items</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab" data-bs-target="#nav-grid" type="button" role="tab" aria-controls="nav-grid" aria-selected="true"><i class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab" data-bs-target="#nav-list" type="button" role="tab" aria-controls="nav-list" aria-selected="false"><i class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel" aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach($categoryProducts as $categoryProduct)
                                    <div class="col-lg-3 col-md-6 col-12">

                                        <div class="single-product">
                                            <div class="product-image">
                                                <img src="{{asset($categoryProduct->image)}}" class="img-fluid" alt="#"  style=" height: 310px; min-width: 290px  ">
                                                <div>
                                                    @if ($categoryProduct->product_status == 0)
                                                        <span class="sale-tag bg-success">Regular</span>
                                                    @elseif ($categoryProduct->product_status == 1)
                                                        <span class="sale-tag">Offer</span>
                                                    @elseif ($categoryProduct->product_status == 2)
                                                        <span class="new-tag">New</span>
                                                    @else
                                                        Regular Product
                                                    @endif
                                                </div>
                                                <div class="button">
                                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <span class="category">{{$categoryProduct->category->name}}</span>
                                                <h4 class="title">
                                                    <a href="{{route('product.detail',['id'=>$categoryProduct->id])}}">{{$categoryProduct->name}}</a>
                                                </h4>
                                                <ul class="review">
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star-filled"></i></li>
                                                    <li><i class="lni lni-star"></i></li>
                                                    <li><span>4.0 Review(s)</span></li>
                                                </ul>
                                                @switch($categoryProduct->product_status)
                                                    @case(0)
                                                    <div class="price">
                                                        <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                    </div>
                                                    @break
                                                    @case(1)
                                                    <div class="price">
                                                        <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                        <span class="discount-price">{{$categoryProduct->regular_price}} </span>
                                                    </div>
                                                    @break
                                                    @case(2)
                                                    <div class="price">
                                                        <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                        <span class="discount-price">{{$categoryProduct->regular_price}}</span>
                                                    </div>
                                                    @break
                                                @endswitch
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="col-12 my-3">
                                        <div class=" mt-2">
                                            {{ $categoryProducts->links() }}
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach($categoryProducts as $categoryProduct)
                                    <div class="col-lg-12 col-md-12 col-12">

                                        <div class="single-product">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 col-md-4 col-12">
                                                    <div class="product-image">
                                                        <img src="{{asset($categoryProduct->image)}}" class="img-fluid" alt="#">
                                                        <div>
                                                            @if ($categoryProduct->product_status == 0)
                                                                <span class="sale-tag bg-success">Regular</span>
                                                            @elseif ($categoryProduct->product_status == 1)
                                                                <span class="sale-tag">Offer</span>
                                                            @elseif ($categoryProduct->product_status == 2)
                                                                <span class="new-tag">New</span>
                                                            @else
                                                                Regular Product
                                                            @endif
                                                        </div>
                                                        <div class="button">
                                                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Add to
                                                                Cart</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-12">
                                                    <div class="product-info">
                                                        <span class="category">Speaker</span>
                                                        <h4 class="title">
                                                            <a href="product-grids.html">Big Power Sound Speaker</a>
                                                        </h4>
                                                        <ul class="review">
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><i class="lni lni-star-filled"></i></li>
                                                            <li><span>5.0 Review(s)</span></li>
                                                        </ul>
                                                        @switch($categoryProduct->product_status)
                                                            @case(0)
                                                            <div class="price">
                                                                <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                            </div>
                                                            @break
                                                            @case(1)
                                                            <div class="price">
                                                                <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                                <span class="discount-price">{{$categoryProduct->regular_price}} </span>
                                                            </div>
                                                            @break
                                                            @case(2)
                                                            <div class="price">
                                                                <span>{{$categoryProduct->selling_price}} <span class="text-muted">TK.</span></span>
                                                                <span class="discount-price">{{$categoryProduct->regular_price}}</span>
                                                            </div>
                                                            @break
                                                        @endswitch
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12 my-3">
                                        <div class=" mt-2">
                                            {{ $categoryProducts->links() }}
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
