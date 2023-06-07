@extends('layout.userLayout')

@section('content')

    <h1 class="text-center" style="margin: 20px">Check What You Have Bought!</h1>

    @empty($transaction)
        <div style="height: 500px">
            <div class="d-flex justify-content-center align-items-center" style="height: 500px">
                <h1>No Transaction</h1>
            </div>
        </div>
    @else
        @foreach ($transaction as $t)
            <div class="card" style="margin: 40px">
                <h4 class="card-body">{{$t->date}}</h4>

                @foreach ($t->transaction_detail as $td)
                    <li class="card-text" style="margin-left: 10px"> {{$td->qty}} pc(s) {{$td->product->name}} --- Rp. {{$td->price}}</p>
                @endforeach

                <h4 class="card-body">Total Price: Rp. {{$t->total_price}}</h4>
            </div>
        @endforeach
    @endempty

@endsection
