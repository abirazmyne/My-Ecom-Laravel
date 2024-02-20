@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title"> Edit Slider</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Slider</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg col-md-12">
            <div class="card">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Edit Slider Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('slider.update',['id' => $slider->id])}}"  method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Slider Title</label>
                            <div class="col-md-9">
                                <input class="form-control" name="title" value="{{$slider->title}}"  type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Slider Description</label>
                            <div class="col-md-9">
                                <input class="form-control" name="description" value="{{$slider->Description}}"   type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="product_name" value="{{$slider->product_name}}"  type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Product Price</label>
                            <div class="col-md-9">
                                <input class="form-control" name="product_price"  value="{{$slider->product_price}}"   type="number">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Slider Image</label>
                            <div class="col-md-9">
                                <img class="rounded-2"  src="{{asset($slider->image)}}" alt="{{$slider->name}}" width="400">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label  class="col-md-3 form-label"> Slider Image </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image"  placeholder="Enter Slider Image" type="file">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Slider Status</label>
                            <div class="col-md-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="slider_status" id="inlineRadio1" value="1"checked>
                                    <label class="form-check-label" for="inlineRadio1">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="slider_status" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">Inactive</label>
                                </div>
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
