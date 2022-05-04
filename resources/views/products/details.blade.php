@extends('layouts.front')
@section('content')

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">How much do you propose</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-text-input" type="text" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-text-label" for="flexRadioDefault1">
                           Amount you want to pay
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Buy Now</button>
                </div>
            </div>
        </div>
    </div>

    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <nav class="breadcrumb">
                                    <a class="breadcrumb-item bread" href="{{ route('home') }}">Home</a>
                                    {{--                                    <a class="breadcrumb-item bread" href="#">Electronics</a>--}}
                                    <span class="breadcrumb-item bread active">{{ $details->name }}</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="{{ asset(Voyager::image($details->cover_img)) }}" class="img-fluid" alt="First slide">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h2 class="fw-bolder">{{ $details->name }}</h2>
                    <h4 class="fw-bold text-primary">{{ number_format($details->price) }} FCFA <span
                            class="badge rounded-pill {{ $details->is_negociable ? 'bg-primary' : 'bg-danger' }}">{{ $details->is_negociable ? 'Negotiable' : 'Not negociable' }}</span>
                    </h4>
                    <p class="text-sm text-muted">Published date:<span
                            class="fw-bold"> {{ $details->created_at->format('m/d/Y') }}</span></p>
                    <hr>
                    <p>
                        {{ $details->description }}
                    </p>
                    <ul class="list-unstyled">
                        <li class="list-inline-item">
                            <div class="user"></div>
                        </li>
                        <li class="list-inline-item">
                            <p class="text-sm text-muted" style="line-height:1px;">seller</p>
                            <p class="fw-bolder" style="line-height:1px;">{{ $details->shop->owner->name }}</p>
                        </li>
                    </ul>

                    <ul class="list-unstyled">
                        <li>Brand: <span class="fw-bold">Apple</span></li>
                        <li>state: <span class="fw-bold">Used</span></li>
                    </ul>
                    <p>
                        @if($details->is_negociable)
                            <a href="#" class="btn btn-primary me-2 mt-1" data-bs-toggle="modal"
                                                       data-bs-target="#modelId">Negotiate</a>
                        @endif
                        <a href="#" class="btn btn-primary me-2 mt-1">Buy Now</a>

                    </p>
                    <p>
                        <a class="btn btn-success btn-sm"
                           href="https://wa.me/{{$details->shop->owner->phone}}?text=Hello i just order this product {{ route('products.details',[$details->slug]) }}"
                           target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Share on WhatsApp</a>
                        <a href="#" class="btn btn-primary btn-sm">Share on Facebook</a>
                    </p>


                </div>
            </div>
        </div>
    </section>
@endsection
