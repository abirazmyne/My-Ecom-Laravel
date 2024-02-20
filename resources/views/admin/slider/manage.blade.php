@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Slider Manage</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Slider</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            z      <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Slider Table</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl NO.</th>
                                <th class="border-bottom-0">Slider Image</th>
                                <th class="border-bottom-0">Title</th>
                                <th class="border-bottom-0"> Description</th>
                                <th class="border-bottom-0"> Product Name</th>
                                <th class="border-bottom-0"> Product Price</th>
                                <th class="border-bottom-0"> Status</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($sliders as $slider)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset( $slider->image )}}" alt="{{ $slider->name }}" width="100"></td>
                                    <td>{{$slider->title }}</td>
                                    <td>{{$slider->Description}}</td>
                                    <td>{{$slider->product_name}}</td>
                                    <td>{{$slider->product_price}}</td>
                                    <td>{{$slider->slider_status}}</td>

                                    <td>
                                        <a href="" class="btn btn-info">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{route('slider.edit', ['id' => $slider->id])}}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('slider.delete', ['id' => $slider->id])}}" onclick="return confirm('Are you sure you want to delete this Slider?')" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
