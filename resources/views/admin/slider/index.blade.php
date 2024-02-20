@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> Add Slider</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Slider</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg col-md-12">
            <div class="card">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Add Slider Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('slider.create')}}"  method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Slider Title</label>
                            <div class="col-md-9">
                                <input class="form-control" name="title" placeholder="title" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Slider Description</label>
                            <div class="col-md-9">
                                <input class="form-control" name="description"  placeholder="Description" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="product_name" placeholder="name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <input class="form-control" name="product_price" placeholder="price" type="number">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label  class="col-md-3 form-label"> Slider Image </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image"  placeholder="Enter Slider Image" type="file">
                            </div>
                        </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="ckbox">
                                                            <input type="checkbox"><span class="text-13">I agree terms and conditions</span>
                                                        </label>
                                                    </div>
                                                </div>
                        <button class="btn btn-primary" type="submit">Add Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
