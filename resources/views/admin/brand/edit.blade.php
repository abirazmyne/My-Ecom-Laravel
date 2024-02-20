@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Update</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row ">
        <div class="col-lg col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Update Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form class="form-horizontal" action="{{route('brand.update',['id' => $brand->id])}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Update Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$brand->name}}" placeholder="Enter your Brand Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Update Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"  id="cat_description" placeholder="Enter Brand Description" type="text">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <img class="rounded-2"  src="{{asset($brand ->image)}}" alt="{{$brand ->name}}" width="250">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">New Brand Image Input </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image"  placeholder="New Brand Image" type="file">
                            </div>
                        </div>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label class="ckbox">--}}
                        {{--                                    <input type="checkbox"><span class="text-13">I agree terms and conditions</span>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <button class="btn btn-primary" type="submit">Update Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
