@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Info</h1>
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
                            <tr class="py-3">
                                <th>Product ID : </th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr class="py-3">
                                <th>Product Name : </th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Category : </th>
                                <td>{{$product->category->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Sub Category : </th>
                                <td>{{$product->subcategory->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Brand : </th>
                                <td>{{$product->brand->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Unit : </th>
                                <td>{{$product->unit->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code : </th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Status : </th>
                                <td>{{$product->product_status}}</td>
                            </tr>
                            <tr>
                                <th>Product Sales Count : </th>
                                <td>{{$product->sales_count}}</td>
                            </tr>
                            <tr>
                                <th>Product Status : </th>
                                <td>{{$product->status}}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price : </th>
                                <td>{{$product->regular_price}} TK.</td>
                            </tr>
                            <tr>
                                <th>Product Selling Price : </th>
                                <td>{{$product->selling_price}} TK.</td>
                            </tr>

                            <tr>
                                <th>Product Short Description : </th>
                                <td>{{$product->short_description}}</td>
                            </tr>

                            <tr>
                                <th>Product Long Description : : </th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr class="mt-5">
                                <th>Product Main Image : </th>
                                <td><img src="{{asset($product->image)}}" alt="" height="150" width="200" class="rounded-2"></td>
                            </tr>
                            <tr>
                                <th>Product Other Images : </th>
                                <td class="pt-5">
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="150" width=200>

                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->



@endsection
