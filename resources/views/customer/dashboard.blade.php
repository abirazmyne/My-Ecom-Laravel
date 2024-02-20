@extends('website.master')

@section('body')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{route('customer.dashboard')}}">Customer Dashboard</a></li>
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
                            <h3 class=" text-center pt-3 text-white">My Dashboard </h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table">

                                        <tr>
                                            <th>Name : </th>
                                            <td>{{$customer->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Mobile : </th>
                                            <td>{{$customer->mobile}}</td>
                                        </tr>
                                        <tr>
                                            <th>Email : </th>
                                            <td>{{$customer->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Address : </th>
                                            <td>{{$customer->address}}</td>
                                        </tr>
                                        <tr>
                                            <th>City : </th>
                                            <td>{{$customer->city}}</td>
                                        </tr>
                                        <tr>
                                            <th>Post Code : </th>
                                            <td>{{$customer->post_code}}</td>
                                        </tr>
                                        <tr>
                                            <th>NID : </th>
                                            <td>{{$customer->date_of_birth}}</td>
                                        </tr>
                                        <tr>
                                            <th>Blood Group : </th>
                                            <td><b class="text-danger">{{$customer->blood_group}}</b></td>
                                        </tr>

                                    </table>
                                </div>






                                <div class="col-md-4">
                                    <div class="row">
                                        <style>
                                            body {
                                                background-color: darkslategrey;
                                                font-family: Arial, sans-serif;

                                            }
                                            h1 {
                                                font-size: 3rem;
                                                color: #333;
                                                margin-top: 10%;
                                            }
                                        </style>
                                        </head>
                                        <body>
                                        <h1 id="clock"></h1>
                                        <script>
                                            function updateTime() {
                                                const now = new Date();
                                                let hours = now.getHours();
                                                let minutes = now.getMinutes();
                                                let seconds = now.getSeconds();
                                                let period = "AM";
                                                if (hours >= 12) {
                                                    period = "PM";
                                                }
                                                if (hours > 12) {
                                                    hours -= 12;
                                                }
                                                if (hours === 0) {
                                                    hours = 12;
                                                }
                                                hours = hours < 10 ? "0" + hours : hours;
                                                minutes = minutes < 10 ? "0" + minutes : minutes;
                                                seconds = seconds < 10 ? "0" + seconds : seconds;
                                                const time = `${hours}:${minutes}:${seconds} ${period}`;
                                                document.getElementById("clock").innerText = time;
                                            }
                                            setInterval(updateTime, 1000);
                                        </script>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
