@extends('layout/userLayout')

@section('content')

    <h1 class="d-flex justify-content-center">Find Your Best Clothes Here!</h1>

    <div class="row row-cols-2 row-cols-md-4 g-4" style="margin: 20px 20px 20px 20px">
        @foreach ($products as $p)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{Storage::url("images/".$p->image)}}" style="height:350px">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">Rp. {{$p->price}}</p>
                        <a href="/product/{{$p->id}}" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div style="display: block">
        <div class="m-5 d-flex justify-content-center">
            {{$products->withQueryString()->links()}}
        </div>
    </div>

@endsection
