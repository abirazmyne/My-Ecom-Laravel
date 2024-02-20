@extends('website.master')

@section('body')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order Detail</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('customer.order-detail',['id' => $order->id])}}">Order Detail</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" >

                        <div class="text-center mt-5">
                            <img src="{{asset($customer->image)}}" class="card-img-top img-fluid" alt="..." style="border-radius:50%; height: 100px; width: 100px;">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$customer->name}}</h5>
                            <p class="card-text">{{$customer->email}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.dashboard')}}">Profile</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.profile',['id' => $customer->id])}}">Update Profile</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.order')}}">Order</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.payment')}}">Payments</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.change-password')}}">Change Password</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.logout')}}">Logout</a></li>
                        </ul>
                        <div class="card-body mx-auto">
                            <a href="#" class="card-link btn btn-success">Edit Profile</a>
                        </div>
                    </div>


                </div>
                <div class="col-md-9">
                    <div class="card rounded-2">
                        <div class="title bg-success rounded-2" style="height: 70px">
                            <h3 class=" text-center pt-3 text-white">My Dashboard </h3>
                        </div>

                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <td>{{$order->id}}</td>
                                </tr>

                                <tr>
                                    <th>Product Total : </th>
                                    <td>{{$order->order_total- $order->tax_total}}  <span class="text-danger">TK.</span></td>
                                </tr>
                                <tr>
                                    <th>Tax Total (5%) :</th>
                                    <td>{{$order->tax_total}}  <span class="text-danger">TK.</span></td>
                                </tr>
                                <tr>
                                    <th>Shipping Total :</th>
                                    <td>{{$order->shipping_total}}  <span class="text-danger">TK.</span></td>
                                </tr>
                                <tr>
                                    <th>Total payable : </th>
                                    <td>{{$order->total_payable}} <span class="text-danger">TK.</span></td>
                                </tr>
                                <tr>
                                    <th>Delivery Address :</th>
                                    <td>{{$order->delivery_address}}</td>
                                </tr>
                                <tr>
                                    <th>Order Status :</th>
                                    <td>{{$order->order_status}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Status :</th>
                                    <td>{{$order->delivery_status}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status :</th>
                                    <td>{{$order->payment_status}}</td>
                                </tr>
                                <tr>
                                    <th>Payment method :</th>
                                    <td>{{$order->payment_method}}</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID :</th>
                                    <td>{{$order->transaction_id}}</td>
                                </tr>
                                </tbody>
                            </table>

                            <hr>
                            <table class="table ">

                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Product Quantity</th>
                                    <th>Product price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($order->orderDetail as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><div><img class="img-fluid text-center" src="{{asset($product->product_image)}}" alt="" style="height: 60px; width: 60px; border: 1px solid grey; border-radius: 50%; "></div></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->product_qty}}</td>
                                    <td>{{$product->product_price}} <span class="text-danger">TK.</span></td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>


                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-3 bg-danger rounded-2 py-2 ml-2 text-white">
                                    <h6 class="me-1 text-center text-white">Total Price : <b>{{$order->total_payable}}</b> <i>TK.</i></h6>
                                </div>
                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
