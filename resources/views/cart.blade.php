@extends('layout.userLayout')

@section('content')

    <h1 class="d-flex justify-content-center">My Cart</h1>

    @empty($transaction)
        <div style="height: 500px">
            <div class="d-flex justify-content-center align-items-center" style="height: 500px">
                <h1>Empty Cart</h1>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-end" style="margin-right: 10px;">
            <p style="margin-right: 10px;">Total Price: {{$transaction->total_price}}</p>
            <a href="/checkOut" class="btn btn-primary">Check Out ({{$transaction->total_qty}})</a>
        </div>

        <div class="row row-cols-2 row-cols-md-4 g-4" style="margin: 20px 20px 20px 20px">
            @foreach ($transaction->transaction_detail as $td)
                <div class="col">
                    <div class="card h-100">
                        <img class="card-img-top" src="{{Storage::url("images/".$td->product->image)}}" style="height:350px">
                        <div class="card-body">
                            <h5 class="card-title">{{$td->product->name}}</h5>
                            <p class="card-text">Rp. {{$td->product->price}}</p>
                            <p class="card-text">Qty: {{$td->qty}}</p>
                            <a href="/editCart/{{$td->product->id}}" class="btn btn-primary">Edit Cart</a>
                            <a href="/deleteItem/{{$td->product->id}}" class="btn btn-danger">Remove From Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endempty


@endsection
