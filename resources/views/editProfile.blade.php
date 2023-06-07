@extends('layout.userLayout')

@section('content')

    <form action="/editProfile" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" >
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Edit Profile</h3>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" class="form-control form-control-lg" value="{{Auth::User()->username}}"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="username">Email</label>
                                <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{Auth::User()->email}}"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="username">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control form-control-lg" value="{{Auth::User()->phone}}"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="username">Address</label>
                                <input type="text" id="address" name="address" class="form-control form-control-lg" value="{{Auth::User()->address}}"/>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit Profile</button>

                            <a href="/profile" class="btn btn-outline-danger btn-lg btn-block" style="margin-top: 10px">Back</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>



@endsection
