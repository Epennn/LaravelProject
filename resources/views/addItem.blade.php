@extends('layout.adminLayout')

@section('content')

    <form action="/addItem" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" >
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Add Item</h3>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="image">Clothes Image</label>
                                <input type="file" id="image" name="image" class="form-control form-control-lg"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="name">Clothes Name</label>
                                <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="(5 - 20 Letters)"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="description">Clothes Desc</label>
                                <input type="text" id="description" name="description" class="form-control form-control-lg" placeholder="(min 5 Letters)"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="price">Price</label>
                                <input type="number" id="price" name="price" class="form-control form-control-lg" placeholder="> 1000"/>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="stock">Stock</label>
                                <input type="number" id="stock" name="stock" class="form-control form-control-lg" placeholder="> 1"/>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Add Item</button>

                            <a href="/adminHome" class="btn btn-outline-danger btn-lg btn-block" style="margin-top: 10px">Back</a>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>

@endsection
