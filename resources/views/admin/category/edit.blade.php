@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Update</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row ">
        <div class="col-lg col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Update Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form class="form-horizontal" action="{{route('category.update',['id' => $category->id])}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Update Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$category->name}}" placeholder="Enter your Category Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Update Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"  id="cat_description" placeholder="Enter Category Description" type="text">{{$category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <img class="rounded-2"  src="{{asset($category ->image)}}" alt="{{$category ->name}}" width="250">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">New Image Input </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image"  placeholder="New Category Image" type="file">
                            </div>
                        </div>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label class="ckbox">--}}
                        {{--                                    <input type="checkbox"><span class="text-13">I agree terms and conditions</span>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <button class="btn btn-primary" type="submit">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
