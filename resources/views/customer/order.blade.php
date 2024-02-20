@extends('website.master')

@section('body')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Orders</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('customer.order')}}"> Orders</a></li>
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

                    </div>


                </div>
                <div class="col-md-9">
                    <div class="card rounded-2">
                        <div class="title bg-success rounded-2" style="height: 70px">
                            <h3 class=" text-center pt-3 text-white">My Orders </h3>
                        </div>

                        <div class="card-body">

                            <table class="table">
                                <thead >
                                <th class="bg-dark text-white">SL No</th>
                                <th>Order ID</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Delivery Status</th>
                                <th>Order Details</th>
                                </thead>

                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="bg-dark text-white text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$order->id}}</td>
                                    <td>{{$order->order_total}} Tk.</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{$order->delivery_status}}</td>
                                    <td>
                                        <a href="{{route('customer.order-detail',['id' => $order->id])}}" class="btn btn-primary"> Order Detail </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
