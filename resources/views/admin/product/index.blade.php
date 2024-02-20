@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Manage</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Product List Table</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl NO.</th>
                                <th class="border-bottom-0"> Image</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Details</th>
                                <th class="border-bottom-0">Price</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img class="rounded-2" src="{{asset($product->image)}}" alt="{{$product->name}}" style="height: 90px; width: 90px;"></td>
                                    <td>
                                        <p><b>Name: </b> {{ Str::limit($product->name, 20) }}</p>

                                        <p><b>Product Status: </b><b class="text-info">
                                                @if ($product->product_status == 0)
                                                    Regular Product
                                                @elseif ($product->product_status == 1)
                                                    Offer Product
                                                @elseif ($product->product_status == 2)
                                                    New Arrivals
                                                @else
                                                    Regular Product
                                                @endif
                                            </b></p>
                                        <p><b>Product Stock: </b> <b class="text-info">{{$product->stock_amount}}</b></p>
                                    </td>
                                    <td>
                                        <p>Category :     {{$product->category->name}}</p>
                                        <p>Sub-Category : {{$product->subCategory->name}}</p>
                                        <p>Brand : {{$product->brand->name}}</p>
                                    </td>
                                    <td>
                                        <p>Regular Price: {{$product->regular_price}} <b class="text-success"> TK.</b>  </p>
                                        <p>    Selling Price: {{$product->selling_price}}<b class="text-success"> TK.</b></p>
                                        <p>    Sales Count: {{$product->sales_count}}<b class="text-success"> Times</b></p>
                                    </td>

                                    <td>
                                        <a href="{{route('product.show', $product->id)}}" class="btn btn-info m-2">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-success m-2">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('product.destroy', $product->id)}}" method="POST" id="deleteForm{{$product->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class=" btn btn-danger delete-btn m-2" data-id="{{$product->id}}">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
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
