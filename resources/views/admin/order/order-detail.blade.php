@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> Order Details</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin-order.all')}}">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin.order-detail',['id'=> $order->id])}}">Order Detail</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Information</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" >
                         <tr>
                             <td>Order ID</td>
                             <td>{{$order->id}}</td>
                         </tr>
                         <tr>
                             <td>Customer Info</td>
                             <td>
                                 <p><b>Name : </b>{{$order->customer->name}} (id= {{$order->customer->id}})</p>
                                 <p><b>Email  : </b>{{$order->customer->email}}</p>
                                 <p><b>Mobile : </b>{{$order->customer->mobile}}</p>
                                 <p><b>Courier : </b>   ( {{$order->courier_id}} ) :  @if ($order->courier_id == 1)
                                         <b class=" bg-success text-danger ">POP</b>
                                     @elseif ($order->courier_id  == 2)
                                         <b class=" text-danger ">Shuandarban</b>
                                     @elseif ($order->courier_id  == 3)
                                         <b class=" text-danger ">SA Travels</b>
                                     @else
                                         <b class="  text-danger ">Pending</b>
                                     @endif
                                 </p>


                             </td>
                         </tr>
                         <tr>
                             <td>Product Total Price</td>
                             <td>{{$order->order_total}} <span class="text-info">TK.</span></td>
                         </tr>
                         <tr>
                             <td>Tax Total(5%) :</td>
                             <td>{{$order->tax_total}} <span class="text-info">TK.</span></td>
                         </tr>
                         <tr>
                             <td>Shipping Total</td>
                             <td>{{$order->shipping_total}} <span class="text-info">TK.</span></td>
                         </tr>
                         <tr>
                             <td>Total Price</td>
                             <td><b>{{$order->total_payable}} <span class="text-danger">TK.</span></b></td>
                         </tr>
                         <tr>
                             <td>Order Status</td>
                             <td>{{$order->order_status}}</td>
                         </tr>
                         <tr>
                             <td>Delivery Address</td>
                             <td>{{$order->delivery_address}}</td>
                         </tr>
                         <tr>
                             <td>Delivery Status</td>
                             <td>{{$order->delivery_status}}</td>
                         </tr>
                         <tr>
                             <td>Payment Method</td>
                             <td>{{$order->payment_method}}</td>
                         </tr>
                         <tr>
                             <td>Payment Status</td>
                             <td>{{$order->payment_status}}</td>
                         </tr>
                         <tr>
                             <td>Payment Amount</td>
                             <td>{{$order->payment_amount}} <span class="text-success">TK.</span></td>
                         </tr>
                         <tr>
                             <td>Currency </td>
                             <td>{{$order->currency}}</td>
                         </tr>
                         <tr>
                             <td>Transaction ID</td>
                             <td>{{$order->transaction_id}}</td>
                         </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product Information</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table ">

                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Product price</th>
                                <th>Action</th>
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
                                    <td>
                                        <a href="" class="btn btn-info" title="Product Info">
                                            <i class="fa fa-info"></i>
                                        </a>

                                        <a href="" title=" Product Delete" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
    <!-- End Row -->



@endsection
