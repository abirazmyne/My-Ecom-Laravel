@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> All Orders</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin-order.all')}}">Orders</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order Table</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl NO.</th>
                                <th class="border-bottom-0">Order Id</th>
                                <th class="border-bottom-0">Customer Info</th>
                                <th class="border-bottom-0">Order Date</th>
                                <th class="border-bottom-0">Total Payable</th>
                                <th class="border-bottom-0">Order Status</th>
                                <th class="border-bottom-0">Delivery Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>
                                        <p>Name : {{ $order->customer->name }}</p>
                                        <p>Email : {{ $order->customer->email }}</p>
                                        <p>Mobile : {{ $order->customer->mobile }}</p>
                                    </td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->total_payable }} <span class="text-danger">TK.</span></td>
                                    <td>{{ $order->order_status }}</td>
                                    <td><p>{{ $order->delivery_status }}</p>
                                        <p>

                                       @if ($order->courier_id == 1)
                                                <span    class=" bg-success text-danger ">POP</span>
                                            @elseif ($order->courier_id  == 2)
                                                <span    class=" text-success ">Shuandarban</span>
                                            @elseif ($order->courier_id  == 3)
                                                <span    class=" text-success ">SA Travels</span>
                                            @else
                                                <span    class="  text-danger ">Pending</span>
                                            @endif
                                        </p>

                                    </td>
                                    <td>
                                        <a href="{{route('admin.order-detail', ['id' => $order->id])}}" class="btn btn-info" title="Order Details">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{route('admin.order-edit', ['id' => $order->id])}}"  class=" {{$order->order_status == 'Complete' ? 'btn btn-dark disabled ' : 'btn btn-success'}}" title="Edit Orders">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin.order-invoice', ['id' => $order->id])}}" class="btn btn-primary" title=" Order invoice">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{route('admin.download-invoice', ['id' => $order->id])}}" class="btn btn-warning" title="Print Order">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        <a href="{{route('admin.order-delete', ['id' => $order->id])}}" title=" Order Delete" onclick="return confirm('Are you sure you want to delete this category?')" class=" {{$order->order_status == 'Cancel' ? 'btn btn-danger ' : ' disabled btn btn-dark'}}">
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
