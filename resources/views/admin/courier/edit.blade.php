@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Edit</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('courier.manage')}}">Manage Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('courier.edit', ['id' => $courier->id])}}">Edit Courier</a></li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row ">
        <div class="col-lg col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Update Courier Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form class="form-horizontal" action="{{route('courier.update',['id' => $courier->id])}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="firstName" class="col-md-3 form-label">Update Courier Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$courier->name}}" placeholder="Enter your Courier Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Update Courier Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"  id="cat_description" placeholder="Enter Courier Description" type="text">{{$courier->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Courier Image</label>
                            <div class="col-md-9">
                                <img class="rounded-2"  src="{{asset($courier ->image)}}" alt="{{$courier ->name}}" width="250">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">New Image Input </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image"  placeholder="New Courier Image" type="file">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Courier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
