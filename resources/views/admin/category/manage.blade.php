@extends('layouts.app')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Manage</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
      z      <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Category Table</h3>
                </div>
                <div class="card-body">
                    <p class="text-success text-center">{{session('message')}}</p>
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl NO.</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Category Description</th>
                                <th class="border-bottom-0">Category Image</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->description, 20) }}</td>
                                    <td><img src="{{ asset( $category->image )}}" alt="{{ $category->name }}" width="100"></td>
                                    <td>
                                        <a href="" class="btn btn-info">
                                            <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-success">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('category.delete', ['id' => $category->id])}}" onclick="return confirm('Are you sure you want to delete this category?')" class="btn btn-danger">
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
