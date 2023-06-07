@extends('layout.adminLayout')

@section('content')

    <h1 class="d-flex justify-content-center">Search Your Favorite Clothes!</h1>

    <div class="d-flex justify-content-center">
        <form action="/search/product" class="d-flex" style="width: 900px; margin-top:20px" method="GET">
            <input type="search" name="nama" class="form-control rounded" style="margin-right: 20px" placeholder="Search" value="{{old('nama')}}">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
    </div>

    <div class="row row-cols-2 row-cols-md-4 g-4" style="margin: 20px 20px 20px 20px">
        @foreach ($products as $p)
            <div class="col">
                <div class="card h-100">
                    <img class="card-img-top" src="{{Storage::url("images/".$p->image)}}" style="height:350px">
                    <div class="card-body">
                        <h5 class="card-title">{{$p->name}}</h5>
                        <p class="card-text">Rp. {{$p->price}}</p>
                        <a href="/adminProduct/{{$p->id}}" class="btn btn-primary">Details</a>
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
