@extends('layout.userLayout')

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
                            <p class="fs-6 text fw-bold">Quantity:</p>
                            <form action="/addCart/{{$product->id}}" method="POST" enctype="multipart/form-data" class="d-flex flex-row">
                                {{ csrf_field() }}
                                <fieldset>
                                    <input type="number" name="qty" id="qty" class="form-control" style="width: 150px; margin-right:5px" value="1">
                                    <button class="btn btn-primary" style="width: 150px" type="submit">Add</button>
                                </fieldset>
                            </form>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <a href="/userHome" class="btn btn-outline-danger" style="width: 150px; margin-top:5px">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
