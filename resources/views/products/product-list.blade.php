@extends('layouts.front')

@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <nav class="breadcrumb ">
                    <a class="breadcrumb-item bread text-black" href="{{ route('home') }}">Home</a>
                    <span class="breadcrumb-item active bread text-black">Search results</span>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <div id="mySidebar">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-light h-100 position-fixed shadow"
                     style="width: 250px; position:absolute; z-index:1;">
                    <a href="/"
                       class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
                        <svg class="bi me-2" width="40" height="32">
                            <use xlink:href="#bootstrap"></use>
                        </svg>
                        <span class="fs-4">Filters</span>
                    </a>
                    <hr>
                    <ul class="nav flex-column mb-auto">
                        <li class="nav-item">
                            <form action="{{ route('search.filters') }}" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label">Price range</label>
                                    <input value="{{ old('price1') }}" required name="price1" type="number" class="form-control"  id="" aria-describedby="helpId"
                                           placeholder="From">
                                </div>
                                <div class="mb-3">
                                    <input value="{{ old('price2') }}" required name="price2" type="number" class="form-control" id="" aria-describedby="helpId"
                                           placeholder="to">
                                </div>
{{--                                <div class="mb-3">--}}
{{--                                    <small id="helpId" class="form-text text-muted"><label for="">Date added</label></small>--}}
{{--                                    <input required type="date" class="form-control" name="date" id="" aria-describedby="helpId"--}}
{{--                                                                 placeholder="">--}}
{{--                                </div>--}}
                                <div class="form-check">
                                    <input value="1" class="form-check-input" type="radio" name="is_negociable"
                                           id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Negotiable
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input value="0" class="form-check-input" type="radio" name="is_negociable"
                                           id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Non-Negotiable
                                    </label>
                                </div>
                                <button class="btn btn-primary w-100 mt-3" type="submit">Check</button>
                            </form>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- ------------ -->
        <!-- main content of the site -->
        <!-- ------------ -->
        <div class="col-lg-10">
            <section class="mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h6 class="fw-bold text-uppercase">Search results {{ isset($product_name)? 'for '. $product_name : '' }}</h6>
                            <button class="btn btn-primary btn-sm float-end" onclick="myFunction()">Filter</button>

                        </div>
                        <hr>
                    </div>
                </div>

            </section>

            <section class="mt-3">
                <div class="container">
                    <div class="row">
                        @forelse($products as $product)

                            <div class="col-lg-3 col-sm-6 col-xs-3">

                                <div class="card mb-2">
                                    <a href="{{ route('products.details',$product->slug) }}">
                                        <img src="{{ asset(Voyager::image($product->cover_img)) }}" class="card-img-top">
                                    </a>
                                    <div class="card-body">
                                        <h4>{{ number_format($product->price) }} FCFA <span
                                                class="badge {{ $product->is_negociable ? 'bg-primary' : 'bg-danger' }} badge-pill fw-light"
                                                style="font-size:10pt;">{{ $product->is_negociable ? 'negociable' : 'not negociable' }}</span>
                                        </h4>
                                        <p>{{ $product->name }}</p>
                                        <ul class="list-unstyled pt-1">
                                            <li class="list-inline-item">
                                                <a href="#" style="text-decoration: none;">
                                                    <div class="user"
                                                         style="background-image:url({{asset('assets/img/dg2.jpg')}}); size:cover;">
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" style="position: absolute;">
                                                {{ $product->shop->name }}
                                            </li>
                                        </ul>


                                    </div>
                                </div>
                            </div>
                        @empty
                            No Product To display
                        @endforelse

                    </div>
                    {{ $products->links() }}
                </div>
            </section>

        </div>
    </div>

@endsection
