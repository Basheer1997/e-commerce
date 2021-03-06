<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Page Title</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://bootswatch.com/4/materia/bootstrap.min.css">
</head>

<body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">

        <a class="navbar-brand" href="#">Maba</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @guest
        <a href="{{route('register')}}" style="float: right;" class="btn btn-secondary my-2 my-sm-0 ml-4" >Sign up</a>
        <a href="{{route('login')}}" style="float: right;" class="btn btn-secondary my-2 my-sm-0 ml-2" >Login</a>
        @endguest
        @auth


        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('user.products')}}">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item"><a href="{{route('product.index')}}" class="nav-link">Products</a></li>
                <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{route('checkout')}}" class="nav-link">Checkout</a></li>
                {{-- <li class="nav-item"><a href="{{route('profile.edit')}}" class="nav-link">Update Profile</a></li> --}}
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2 ml-15" type="text" placeholder="Search" />
                <a href="{{route('myProducts')}}" class="p-cart">
                    <span class="material-icons md-48 text-dark">shopping_cart</span>
                    <span class="badge badge-light bg-secondary">
                        {{App\Models\Cart::where('user_id',Auth::user()->id)->sum('count')}}
                    </span>
                </a>



                <a href="{{route('logouts')}}" class="btn btn-secondary my-2 my-sm-0 ml-2">Logout</a>


            </div>
        </div>
        @endauth

    </nav>

    <div class="container" style="margin-top:100px">
        @yield('content')
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">?? 2017-2019 Maba</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Privacy</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Support</a></li>
            </ul>
        </footer>
    </div>
</body>

</html>
