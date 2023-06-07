@extends('layout.adminLayout')

@section('content')
    <div style="height: 800px">
        <div class="d-flex justify-content-center align-items-center" style="height: 800px">
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{Storage::url("images/".$product->image)}}" class="img-fluid rounded-start" style="margin-top:20px">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">{{$product->name}}</h2>
                            <h4 class="card-text">Rp. {{$product->price}}</h4>
                            <hr>
                            <p class="fs-6 text fw-bold">Product Detail</p>
                            <p class="card-text">{{$product->description}}</p>
                            <a href="/adminHome" class="btn btn-outline-danger" style="width: 150px; margin-top:5px">Back</a>
                            <a href="/deleteProduct/{{$product->id}}" class="btn btn-outline-danger" style="width: 150px; margin-top:5px">Delete Item</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
