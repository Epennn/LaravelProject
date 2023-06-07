@extends('layout.userLayout')

@section('content')

    <form action="/editPassword" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" >
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Edit Password</h3>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" id="oldPassword" name="oldPassword" class="form-control form-control-lg" placeholder="(5-20 Letters)"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="newPassword">New Password</label>
                                <input type="password" id="newPassword" name="newPassword" class="form-control form-control-lg" placeholder="(5-20 Letters)"/>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Edit Password</button>

                            <a href="/userHome" class="btn btn-outline-danger btn-lg btn-block" style="margin-top: 10px">Back</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>



@endsection
