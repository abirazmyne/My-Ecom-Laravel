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
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Sub-Category Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Sl NO.</th>
                                <th class="border-bottom-0">Category Name</th>
                                <th class="border-bottom-0">Sub-Category Name</th>
                                <th class="border-bottom-0">Sub-Category Description</th>
                                <th class="border-bottom-0">Sub-Category Image</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subCategories as $subCategory)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subCategory->category->name}} || id({{$subCategory->category_id}})</td>
                                <td>{{$subCategory->name}} </td>
                                <td>{{$subCategory->description}}</td>
                                <td><img src="{{asset($subCategory->image)}}" alt="{{$subCategory->name}}" width="100"></td>
                                <td>
                                    <a href="" class="btn btn-info">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <a href="{{route('subCategory.edit',['id'=>$subCategory->id])}}" class="btn btn-success">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('subCategory.delete',['id'=>$subCategory->id])}}" class="btn btn-danger" onclick="return confirm('You want to delete this Subcategory?')">
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
