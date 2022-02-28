@extends('layouts.front')

@section('content')

    <section class="mt-2">
        <div class="container">
            <div class="row">
                <!-- categories -->
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h6>Categories</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                <li class="nav-item">
                                    <a href="search_results.html" class="nav-link">Clothing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="search_results.html" class="nav-link">Electronics</a>
                                </li>
                                <li class="nav-item">
                                    <a href="search_results.html" class="nav-link">Home appliances</a>
                                </li>
                                <li class="nav-item">
                                    <a href="search_results.html" class="nav-link">Office equipment</a>
                                </li>
                                <li class="nav-item">
                                    <a href="search_results.html" class="nav-link">More</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end of categories -->

                <div class="col-md-9">
                    <div id="carouselId" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="./assets/img/csl1.jpg" style="height:400px; width:auto;" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/img/csl1.jpg" style="height:400px; width:auto;" alt="second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="./assets/img/csl1.jpg" style="height:400px; width:auto;" alt="Third slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="fw-bold text-uppercase">Recently added</h6>
                    <hr>
                </div>
            </div>
        </div>

    </section>

    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-3">

                    <div class="card mb-2">
                        <a href="product_details.html">
                            <img src="./assets/img/dg2.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h4>6000 F <span class="badge bg-primary badge-pill fw-light" style="font-size:10pt;">negotiable</span></h4>
                            <p>Airpod Max</p>
                            <ul class="list-unstyled pt-1">
                                <li class="list-inline-item">
                                    <a href="#" style="text-decoration: none;">
                                        <div class="user" style="background-image:url('./assets/img/dg2.jpg'); size:cover;">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item" style="position: absolute;">
                                    Jonathan kent
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-6 col-xs-3">

                    <div class="card mb-2">
                        <a href="product_details.html">
                            <img src="./assets/img/dg2.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h4>6000 F <span class="badge bg-primary badge-pill fw-light" style="font-size:10pt;">negotiable</span></h4>
                            <p>Airpod Max</p>
                            <ul class="list-unstyled pt-1">
                                <li class="list-inline-item">
                                    <a href="#" style="text-decoration: none;">
                                        <div class="user" style="background-image:url('./assets/img/dg2.jpg'); size:cover;">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item" style="position: absolute;">
                                    Jonathan kent
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-xs-3">

                    <div class="card mb-2">
                        <a href="javascript.js">
                            <img src="./assets/img/dg2.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h4>6000 F <span class="badge bg-primary badge-pill fw-light" style="font-size:10pt;">negotiable</span></h4>
                            <p>Airpod Max</p>
                            <ul class="list-unstyled pt-1">
                                <li class="list-inline-item">
                                    <a href="#" style="text-decoration: none;">
                                        <div class="user" style="background-image:url('./assets/img/dg2.jpg'); size:cover;">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item" style="position: absolute;">
                                    Jonathan kent
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-xs-3">

                    <div class="card mb-2">
                        <a href="javascript.js">
                            <img src="./assets/img/dg2.jpg" class="card-img-top">
                        </a>
                        <div class="card-body">
                            <h4>6000 F <span class="badge bg-primary badge-pill fw-light" style="font-size:10pt;">negotiable</span></h4>
                            <p>Airpod Max</p>
                            <ul class="list-unstyled pt-1">
                                <li class="list-inline-item">
                                    <a href="#" style="text-decoration: none;">
                                        <div class="user" style="background-image:url('./assets/img/dg2.jpg'); size:cover;">
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item" style="position: absolute;">
                                    Jonathan kent
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h6 class="fw-bold text-uppercase">Top shops</h6>
                    <hr>
                </div>
            </div>
            <!-- shops -->
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-xs-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">Jonathan Kent</p>
                                    <a href="shopdetails.html" class="btn btn-primary btn-sm">View shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

    </section>

@endsection
