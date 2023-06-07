@extends('layout.userLayout')

@section('content')

    <h1 class="text-center mt-5">Edit Cart</h1>

    <div style="height: 700px">
        <div class="d-flex justify-content-center align-items-center" style="height: 700px">
            <div class="card mb-3" style="max-width: 1000px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{Storage::url("images/".$td->product->image)}}" class="img-fluid rounded-start" style="margin-top:20px">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h2 class="card-title">{{$td->product->name}}</h2>
                            <h4 class="card-text">Rp. {{$td->product->price}}</h4>
                            <hr>
                            <p class="fs-6 text fw-bold">Product Detail</p>
                            <p class="card-text">{{$td->product->description}}</p>
                            <p class="fs-6 text fw-bold">Quantity:</p>
                            <form action="/editCart/{{$td->product->id}}" method="POST" enctype="multipart/form-data" class="d-flex flex-row">
                                {{ csrf_field() }}
                                <fieldset>
                                    <input type="number" name="qty" id="qty" class="form-control" style="width: 150px; margin-right:5px" value={{$td->qty}}>
                                    <button class="btn btn-primary" style="width: 150px" type="submit">Edit</button>
                                </fieldset>
                            </form>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <a href="/cart" class="btn btn-outline-danger" style="width: 150px; margin-top:5px">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
