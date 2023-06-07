@extends('layout.userLayout')

@section('content')
    <div style="width: 1550px; height: 600px">
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 600px; margin: 5px">
            <h1 style="color: gray">My Profile</h1>
            <p style="color: gray" class="border border-primary rounded">{{Auth::User()->role}}</p>
            <p>Username: {{Auth::User()->username}}</p>
            <p>{{Auth::User()->email}}</p>
            <p>Address: {{Auth::User()->address}}</p>
            <p>Phone: {{Auth::User()->phone}}</p>
            <div class="d-flex">
                <a href="/editProfile" class="btn btn-primary" style="margin: 0px 5px 0px 5px">Edit Profile</a>
                <a href="/editPassword" class="btn btn-outline-primary" style="margin: 0px 5px 0px 5px">Edit Password</a>
            </div>
        </div>
    </div>
@endsection
