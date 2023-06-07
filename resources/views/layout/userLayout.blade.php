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
            <a class="navbar-brand" href="/userHome">MAI BOUTIQUE</a>

            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a href="/userHome" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="/search" class="nav-link">Search</a>
                    </li>

                    <li class="nav-item">
                        <a href="/cart" class="nav-link">Cart</a>
                    </li>

                    <li class="nav-item">
                        <a href="/history" class="nav-link">History</a>
                    </li>

                    <li class="nav-item">
                        <a href="/profile" class="nav-link">Profile</a>
                    </li>
                </ul>

                <span class="navbar-text">
                    <a href="/logout" class="btn btn-outline-danger">Sign Out</a>
                </span>
            </div>
        </div>
    </nav>

      @yield('content')


</body>
</html>
