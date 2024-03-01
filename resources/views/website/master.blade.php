<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Shop-Boneek.</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}website/assets/images/logome.png" />

    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/xzoom.css" />
    <link rel="stylesheet" href="{{asset('/')}}website/assets/css/main.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">
    You are using an <strong>outdated</strong> browser. Please
    <a href="https://browsehappy.com/">upgrade your browser</a> to improve
    your experience and security.
</p>
<![endif]-->

<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>


<header class="header navbar-area">


    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">

                    <a class="navbar-brand" href="{{route('home')}}">
{{--                        <img src="{{asset('/')}}website/assets/images/my/fcb.png" alt="Logo" style="max-height: 80px;">--}}
                        <img src="{{asset('/')}}website/assets/images/logo/logome.png" alt="Logo">
                    </a>

                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">

                    <div class="main-menu-search">

                        <div class="navbar-search search-style-5">
{{--                            <div class="search-select">--}}
{{--                                <div class="select-position">--}}
{{--                                    <select id="select1">--}}
{{--                                        <option selected>All</option>--}}
{{--                                        <option value="1">option 01</option>--}}
{{--                                        <option value="2">option 02</option>--}}
{{--                                        <option value="3">option 03</option>--}}
{{--                                        <option value="4">option 04</option>--}}
{{--                                        <option value="5">option 05</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>+880 17********</span>
                            </h3>
                        </div>

                        <div class="navbar-cart">
{{--                            <div class="wishlist">--}}
{{--                                <a href="javascript:void(0)">--}}
{{--                                    <i class="lni lni-heart"></i>--}}
{{--                                    <span class="total-items">0</span>--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <div class="cart-items mx-3">
                                @if(Session::get('customer_id'))
                                <a href="{{route('customer.dashboard')}}" class="">
                                    <img src="{{asset($customer->image)}}" class="img-fluid" style="height: 40px; width: 40px; border: 2px solid grey; border-radius: 50%;" alt="">

                                </a>
                                <div class="shopping-item">
                                    <ul class="list-group">
                                        <li class=" my-2">
                                            <a href="{{route('customer.dashboard')}}"  class="text-decoration-none" >
                                                <i class="fa-regular fa-user"></i> Hello ,<b> {{Session::get('customer_name')}}</b>
                                            </a>
                                        </li>
                                        <hr>

                                        <li class="mb-3 cusimg"><i class="fa-solid fa-gauge "></i> <a href="{{route('customer.dashboard')}}" class=" text-decoration-none  cusimg"> Dashboard </a></li>
                                        <li class="mb-3 cusimg"><i class="fa-solid fa-cart-shopping"></i> <a href="{{route('customer.order')}}" class=" text-decoration-none cusimg"> Orders </a></li>
                                        <li class="mb-3 cusimg"><i class="fa-solid fa-right-from-bracket"></i> <a href="{{route('customer.logout')}}" class="text-decoration-none cusimg"> Logout </a></li>
                                    </ul>

                                </div>

                                @else
                                    <a href="" class="main-btn">
                                        <i class="fa-solid fa-user"></i>
                                    </a>

                                    <div class="shopping-item">
                                        <ul class="list-group">
                                            <li class=" my-2">
                                                <a href="{{route('home')}}"  class="text-decoration-none" >
                                                    <i class="fa-regular fa-user"></i> Hello , Welcome Here
                                                </a>
                                            </li>
                                            <hr>

                                            <li class=" text-center  ">
                                                <a href="{{route('customer.loginload')}}" class="btn btn-primary">Sign In</a>
                                                <a href="{{route('customer.register')}}" class="btn btn-success">Register</a>
                                            </li>

                                        </ul>

                                    </div>


                                @endif

                            </div>


                            <div class="cart-items">
                                <a href="{{route('cart.show')}}" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{count(Cart::content())}}</span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{count(Cart::content())}} Items</span>
                                        <a href="{{route('cart.show')}}">View Cart</a>
                                    </div>
                                    <ul class="shopping-list">
                                        @php($sum= 0)
                                       @foreach(Cart::content() as $cartItem)
                                        <li>
                                            <a href="{{route('cart.remove',['rowId' => $cartItem->rowId])}}" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="{{route('product.detail',['id' =>$cartItem->id])}}"><img src="{{asset($cartItem->options->image)}}" alt="#"></a>
                                            </div>
                                            <div class="content">
                                                <h4><a href="{{route('product.detail',['id' =>$cartItem->id])}}">{{$cartItem->name,15}}</a></h4>
                                                <p class="quantity">{{$cartItem->qty}} * <span class="amount text-success">{{$cartItem->price}} =</span> <span> {{round($cartItem->subtotal)}} TK.</span></p>
                                            </div>
                                        </li>
                                            @php($sum = $sum + $cartItem->subtotal)
                                        @endforeach
                                    </ul>
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">{{$sum}} TK.</span>
                                        </div>
                                        <div class="button">
                                            <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
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


    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">

                    <div class="mega-category-menu">
                        <a href="{{route('home')}}" class="cat-button nav-link"><i class="lni lni-menu"></i>All Categories</a>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                            <li>
                                <a class="bg-pages rounded-2 mb-2 nav-link" href="{{route('product.category', ['id' =>$category->id])}}">
                                    {{$category->name}}
                                    @if(count($category->subCategories ) > 0)
                                    <i class="lni lni-chevron-right"></i>
                                    @endif
                                </a>
                                @if(count($category->subCategories) > 0)
                                <ul class="inner-sub-category">
                                    @foreach($category->subCategories as $subCategory)
                                    <li><a class="nav-link" href="{{route('product.subCategory', ['id' =>$subCategory->id])}}">{{$subCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{route('home')}}" class="active nav-link" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="dd-menu collapsed nav-link" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Categories</a>
                                    <ul class="sub-menu collapse" id="submenu-1-2">
                                        @foreach($categories as $category)
                                        <li class="nav-item"><a class="nav-link" href="{{route('product.category', ['id' =>$category->id])}}">{{$category->name}}</a></li>
                                        @endforeach

                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('web.blog')}}" >Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('customer.contact')}}" aria-label="Toggle navigation">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">

                <div class="nav-social">
                    @if(Session::get('customer_id'))
                        <h5 class="title">Hello,   {{Session::get('customer_name')}}</h5>
                    @else
                        <h5 class="title">Welcome to our website</h5>
                    @endif

                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</header>

@yield('body')

<footer class="footer">


    <div class="footer-middle">
        <div class="container">
            <div class="bottom-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-contact">
                            <h3>Contact With Us</h3>
                            <p class="phone">Phone: +880 17********</p>
                            <ul>
                                <li><span>Sunday-Thursday: </span> 9.00 am - 8.00 pm</li>
                            </ul>
{{--                            <p class="mail">--}}
{{--                                <a href=""><span>123@gmail.com</span></a>--}}
{{--                            </p>--}}
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer our-app">
                            <h3>About</h3>
                            <ul class="app-btn">
                                <li class="text-white">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error esse laborum libero perferendis! Consequuntur distinctio dolor, dolore magni omnis quod veniam. Consequuntur dolorem earum eius facere iure nobis perspiciatis tenetur?
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>Information</h3>
                            <ul>
                                <li class="text-white"><a class="text-white" href="#">My Account</a></li>
                                <li class="text-white"><a class="text-white" href="#">Login</a></li>
                                <li class="text-white"><a class="text-white" href="#">Registration</a></li>
                                <li class="text-white"><a class="text-white" href="#">Terms & Conditions</a></li>
                                <li class="text-white"><a class="text-white" href="#">Delivery Policy</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 col-12">

                        <div class="single-footer f-link">
                            <h3>Pages</h3>
                            <ul>
                                <li class="text-white"><a class="text-white" href="#">About</a></li>
                                <li class="text-white"><a class="text-white" href="#">Contact Us</a></li>
                                <li class="text-white"><a class="text-white" href="#">Privacy Policy</a></li>
                                <li class="text-white"><a class="text-white" href="#">Return & Refund Policy</a></li>
                                <li class="text-white"><a class="text-white" href="#">Refer & Win</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer-bottom">
        <div class="container">
            <div class="container">
                <div class="row">
                    <img src="{{asset('/')}}website/assets/images/my/ssl.png" class="img-fluid" alt="">
                </div>
                <div class="row align-items-center pt-3">
                    <div class="col-md-12">
                        <div class="">
                            <p class="text-white">© 2024 All Rights Reserved  |  HTML Template by <a class="text-white" href="">Abir Azmyne</a>.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</footer>


<a href="#" class="scroll-top">
    <i class="lni lni-chevron-up"></i>
</a>


<script src="{{asset('/')}}website/assets/js/jquery.js"></script>
<script src="{{asset('/')}}website/assets/js/bootstrap.min.js"></script>
<script src="{{asset('/')}}website/assets/js/tiny-slider.js"></script>
<script src="{{asset('/')}}website/assets/js/glightbox.min.js"></script>
<script src="{{asset('/')}}website/assets/js/xzoom.min.js"></script>
<script src="{{asset('/')}}website/assets/js/setup.js"></script>
<script src="{{asset('/')}}website/assets/js/main.js"></script>
<script type="text/javascript">
    //========= Hero Slider
    tns({
        container: '.hero-slider',
        slideBy: 'page',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 0,
        items: 1,
        nav: false,
        controls: true,
        controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
    });

    //======== Brand Slider
    tns({
        container: '.brands-logo-carousel',
        autoplay: true,
        autoplayButtonOutput: false,
        mouseDrag: true,
        gutter: 15,
        nav: false,
        controls: false,
        responsive: {
            0: {
                items: 1,
            },
            540: {
                items: 3,
            },
            768: {
                items: 5,
            },
            992: {
                items: 6,
            }
        }
    });

</script>
</body>
</html>
