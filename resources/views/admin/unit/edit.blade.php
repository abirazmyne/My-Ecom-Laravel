@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Unit Update</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Unit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Update Unit</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col-lg col-md-12">
            <div class="card">
                <div class="card-header border-bottom mx-auto">
                    <h3 class="card-title text-center">Update Unit Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('unit.update',['id' => $unit->id])}}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Update Unit Name</label>
                            <div class="col-md-9">
                                <input class="form-control" name="name" value="{{$unit->name}}" placeholder="Enter your Unit Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label  class="col-md-3 form-label">Update Unit Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description"  placeholder="Enter Unit Description" type="text">{{$unit->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <img class="rounded-2"  src="{{asset($unit ->image)}}" alt="{{$unit ->name}}" width="250">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">  Unit Image </label>
                            <div class="col-md-9">
                                <input class="form-control" name="image" placeholder="Enter Brand Image" type="file">
                            </div>
                        </div>
                        {{--                        <div class="row">--}}
                        {{--                            <div class="form-group">--}}
                        {{--                                <label class="ckbox">--}}
                        {{--                                    <input type="checkbox"><span class="text-13">I agree terms and conditions</span>--}}
                        {{--                                </label>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        <button class="btn btn-primary" type="submit">Update New Unit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
