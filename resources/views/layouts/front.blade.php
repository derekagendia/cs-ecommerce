<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,700;1,600&display=swap"
          rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <title>Cs ecommerce</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a href="#" class="navbar-brand">
            E-commerce
        </a>
        <button class="navbar-toggler bg-white border-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav navbar-nav-hover ms-auto  w-75">
                <div class="input-group">
                    <input class="form-control" type="text" name="" placeholder="search products"
                           aria-label="Recipient's ">
                    <div class="input-group-append">
                        <a href="#" class="btn btn-secondary">search</a>
                    </div>
                </div>
            </ul>
            <ul class="navbar-nav navbar-nav-hover ms-auto">
                @if(Route::has('login'))
                    @auth
                        <li class="nav-item px-3">
                            <a class="nav-link" href="#">
                                My bids
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">user account</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">My store</a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                        @else
                            <a href="{{ route('login') }}" class="nav-link">Log in</a>
                            <a href="{{ route('register') }}" class="nav-link">Register</a>

                    @endauth
                @endif
            </ul>
        </div>


        </button>
    </div>
</nav>


<!-- end of navbar -->


@yield('content')


<footer class="mt-3 pb-2 pt-3 bg-dark text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4 class="fw-bold">CS E-com</h4>
                <p class="text-sm">Lorem ipsum dolore annuit is not a random text contrary to popular opinion</p>
            </div>
            <div class="col-lg-3">
                <h6 class="fw-bold">useful links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">About</a></li>
                    <li><a href="#" class="footer-link">Policies</a></li>
                    <li><a href="#" class="footer-link">Terms of service</a></li>
                    <li><a href="#" class="footer-link">Sitemap</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h6 class="fw-bold">useful links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="footer-link">About</a></li>
                    <li><a href="#" class="footer-link">Policies</a></li>
                    <li><a href="#" class="footer-link">Terms of service</a></li>
                    <li><a href="#" class="footer-link">Sitemap</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <div class="input-group">
                    <input class="form-control" type="text" name="" placeholder="search products"
                           aria-label="Recipient's ">
                    <div class="input-group-append">
                        <a href="#" class="btn btn-secondary">search</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>


<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>
</html>
