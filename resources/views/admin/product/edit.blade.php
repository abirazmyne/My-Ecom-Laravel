@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Edit</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg col-md-12">
            <div class="card bg-dark-transparent ">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Edit Product Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.update', $product->id)}}"  method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select name="category_id"  class="form-control" onchange="getSubCategoryByCategory(this.value)">
                                    <option value=""> -- Select Product Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <select name="sub_category_id"  class="form-control" id="subCategoryId">
                                    <option value=""> -- Select Product Sub-Category -- </option>
                                    @foreach($sub_categories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{$product->sub_category_id == $subCategory->id ? 'selected' : ''}}>{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <select name="brand_id"  class="form-control">
                                    <option value=""> -- Select Product Brand -- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}" {{$product->brand_id == $brand->id ?'selected': ''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Unit Name</label>
                            <div class="col-md-9">
                                <select name="unit_id"  class="form-control">
                                    <option value=""> -- Select Product Unit -- </option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$product->unit_id == $unit->id ? 'selected': ''}}>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Capacity Type</label>
                            <div class="col-md-9">
                                <input class="form-control" name="product_capacity" value="{{$product->product_capacity}}" placeholder="Product Capacity" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name"   value="{{$product->name}}" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Code</label>
                            <div class="col-md-9">
                                <input class="form-control" name="code"  value="{{$product->code}}" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Stock Input</label>
                            <div class="col-md-9">
                                <input class="form-control" name="stock_amount" value="{{$product->stock_amount}}" placeholder="Stock amount" type="number">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Regular Price</label>
                            <div class="col-md-9">
                                <input class="form-control" name="regular_price" value="{{$product->regular_price}}"  placeholder="Product  Regular Price" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Selling Price</label>
                            <div class="col-md-9">
                                <input class="form-control" name="selling_price"  value="{{$product->selling_price}}" placeholder="Product Selling Price" type="text">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="short_description" placeholder="Enter Product Short Description" type="text">{{$product->short_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="summernote" name="long_description" placeholder="Enter Product Long Description" type="text">{{$product->long_description}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-4 ">
                            <label for="lastName" class="col-md-3 form-label">Update Image</label>
                            <div class="col-md-4">
                                <input type="file" class="dropify " name="image" data-height="200"  />
                            </div>
                            <div class="col-md-4">
                                <img class="rounded-2" src="{{asset($product->image)}}" alt="{{$product->name}}" style="height: 200px;">
                            </div>
                        </div>

                        <div class="row mb-4 ">
                            <label for="lastName" class="col-md-3 form-label">Update Other Images</label>
                            <div class="col-md-9">
                                @foreach($product->otherImages as $otherimage)
                                    <img class="my-3 mx-3 rounded-2" src="{{asset($otherimage->image)}}"  height="100px" width="170" alt="">
                                @endforeach

                                <input type="file"  class="form-control" name="other_image[]" multiple/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Product Status</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="product_status" id="inlineRadio1" value="0" checked>
                                    <label class="form-check-label" for="inlineRadio1">Regular</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="product_status" id="inlineRadio2" value="1">
                                    <label class="form-check-label" for="inlineRadio2">Offer Product</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="product_status" id="inlineRadio3" value="2" >
                                    <label class="form-check-label" for="inlineRadio3">New Arrivals</label>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-primary" type="submit">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
