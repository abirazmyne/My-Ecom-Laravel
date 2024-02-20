@extends('website.master')

@section('body')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Update Profile</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('customer.profile',['id' => $customer->id])}}"> Update Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card" >

                        <div class="text-center mt-5">
                            <img src="{{asset($customer->image)}}" class="card-img-top img-fluid" alt="..." style="border-radius:50%; height: 100px; width: 100px;">

                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$customer->name}}</h5>
                            <p class="card-text">{{$customer->email}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.dashboard')}}">Profile</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.profile',['id' => $customer->id])}}">Update Profile</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.order')}}">Order</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.payment')}}">Payments</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.change-password')}}">Change Password</a></li>
                            <li class="list-group-item"><a class="text-muted" href="{{route('customer.logout')}}">Logout</a></li>
                        </ul>
                    </div>


                </div>
                <div class="col-md-9">
                    <div class="card rounded-2">
                        <div class="title bg-success rounded-2" style="height: 70px">
                            <h3 class=" text-center pt-3 text-white">Update Profile </h3>
                        </div>

                        <div class="card-body">
                            <p>{{session('message')}}</p>
                            <div class="row">
                                <form action="{{route('profile.update', $customer->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-4">

                                        <div class="col-md-3">
                                            <img src="{{asset($customer->image)}}" alt="" class="img-fluid rounded-2 mb-3" style=" border: 2px solid grey;  width: 200px">
                                            <input for="image" class="form-control" name="image"  type="file" style="  width: 200px">
                                        </div>
                                        <div class="col-md-9">

                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Update name</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="name"   value="{{$customer->name}}" type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Mobile</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="mobile"  value="{{$customer->mobile}}" readonly type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Email</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="email"  value="{{$customer->email}}" readonly type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">NID</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="nid"  value="{{$customer->nid }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="address"    type="text">{{$customer->address }} </textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">City</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="city"  value="{{$customer->city }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Post code</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="post_code"  value="{{$customer->post_code }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Birth Date</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="date_of_birth"  value="{{$customer->date_of_birth }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label">Blood Group</label>
                                        <div class="col-md-9">
                                            <input class="form-control" name="blood_group"  value="{{$customer->blood_group }}"  type="text">
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="lastName" class="col-md-3 form-label"></label>
                                        <div class="col-md-9">
                                            <button class="form-control btn-danger btn" type="submit"> Update  </button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
