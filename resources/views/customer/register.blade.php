@extends('website.master')

@section('body')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Register</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('customer.register')}}">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>




    <div class="account-login section">
        <div class="container  ">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12 ">
                    <div class="register-form rounded-2">
                        <div class="title">
                            <h3 class="text-center">No Account? Register</h3>
                            <p>{{session('message')}}</p>
                        </div>
                        <form class="row" action="{{route('customer.register')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-fn">First Name</label>
                                    <input class="form-control" type="text" name="firstname" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-ln">Last Name</label>
                                    <input class="form-control" type="text" name="lastname" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-email">E-mail Address</label>
                                    <input class="form-control" type="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="reg-phone">Phone Number</label>
                                    <input class="form-control" type="text" name="mobile" required>
                                </div>
                            </div>
                            <div class="col-sm  ">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password" required>
                                </div>
                            </div>
                            <div class=" mb-2 d-flex flex-wrap  justify-content-between bottom-content">
                                <div class="form-check">
                                    <input type="checkbox" name="terms" class="form-check-input width-auto" required>
                                    <label class="form-check-label">I aggree and accept the <a class="text-primary" href="">terms and conditions</a></label>
                                </div>

                            </div>
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{route('customer.loginload')}}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <

@endsection
