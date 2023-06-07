<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MAI BOUTIQUE</a>
        </div>
    </nav>

    <form action="/register" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <fieldset>
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100" >
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card" style="border-radius: 10px;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Sign Up</h3>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username (5-20 Letters)"/>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Email"/>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="Phone (10-13 Numbers)"/>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="address" name="address" class="form-control form-control-lg" placeholder="Address (Min 5 Letters)"/>
                            </div>

                            @if ($errors->any())
                                <div class="alert alert-dismissable alert-danger">
                                    {{$errors->first()}}
                                </div>
                            @endif

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Sign Up</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </form>



</body>
</html>
