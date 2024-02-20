@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> Edit Order </h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin-order.all')}}">All Orders</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('admin-order.all')}}">Edit Order</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Order edit form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form action="{{route('admin.order-update',['id' => $order->id])}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-md-3">Customer Info :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$order->customer->name}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Total :</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$order->total_payable .' '. 'TK.'}}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Customer Delivery Address :</label>
                            <div class="col-md-9">
                                <textarea type="text" class="form-control"  name="delivery_address">{{$order->delivery_address}} </textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Order Status :</label>
                            <div class="col-md-9">
                                <select name="order_status" id="" class="form-control">
                                    <option value="" disabled selected> -- Select Order Status --</option>
                                    <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}> Pending</option>
                                    <option value="Cancel" {{$order->order_status == 'Cancel' ? 'selected' : ''}} > Cancel</option>
                                    <option value="Processing" {{$order->order_status == 'Processing' ? 'selected' : ''}}> Processing</option>
                                    <option value="Complete" {{$order->order_status == 'Complete' ? 'selected' : ''}} > Complete</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3">Courier Name :</label>
                            <div class="col-md-9">
                                <select name="courier_id"  class="form-control">
                                    <option value=""> -- Select Courier Name -- </option>
                                    @foreach($couriers as $courier)
                                        <option value="{{$courier->id}}"  {{$order->courier_id == $courier->id ? 'selected' : ''}}>{{$courier->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="Update Order">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection
