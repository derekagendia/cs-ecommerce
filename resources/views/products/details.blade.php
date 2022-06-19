@extends('layouts.front')
@section('content')

    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">How much do you propose</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="payment_negociable">
                    <div class="modal-body">
                        <div class="form-check">
                            <select name="operator">
                                <option selected value="PAIEMENTMARCHAND_MTN_CM">MTN</option>
                                <option value="CM_PAIEMENTMARCHAND_OM_TP">ORANGE</option>
                            </select>
                            <input type="number" class="pb-2 " name="phone" placeholder="Phone number"/>
                            <input class="form-text-input mt-2" type="text" name="price_negociable"
                                   placeholder="New amount">
                            <input name="shop_id" type="hidden" class="pb-2" placeholder="Phone number"
                                   value="{{ $details->shop->id }}"/>
                            <input name="product_id" type="hidden" class="pb-2" placeholder="Phone number"
                                   value="{{ $details->id }}"/>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Pay Now</button>
                    </div>
                </form>
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
                            <div class="carousel-item">
                                <img src="{{ asset(Voyager::image($details->image_2)) }}" class="img-fluid" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset(Voyager::image($details->image_3)) }}" class="img-fluid" alt="Third slide">
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
                        <li>Brand: <span class="fw-bold">{{ $details->brand }}</span></li>
                        <li>state: <span class="fw-bold">{{ $details->state }}</span></li>
                    </ul>
                    <p>
                        @if($details->is_negociable)
                            @auth  <a href="#" class="btn btn-primary me-2 mt-1" data-bs-toggle="modal"
                                      data-bs-target="#modelId">Negotiate</a> @endauth
                        @endif
                        @auth  <a data-bs-toggle="modal" data-bs-target="#buyProduct" class="btn btn-primary me-2 mt-1">Buy</a> @endauth
                        @guest  <a href="{{ route('login') }}" class="btn btn-primary me-2 mt-1">Login To
                            Buy</a> @endguest

                    </p>
                    <p>
                        <a class="btn btn-success btn-sm"
                           href="https://wa.me/{{$details->shop->owner->phone}}?text=Hello i just order this product {{ route('products.details',[$details->slug]) }}"
                           target="_blank" rel="noopener"><i class="fab fa-whatsapp"></i> Share on WhatsApp</a>
                    </p>


                </div>
            </div>
        </div>


        <div class="modal fade" id="buyProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Buy Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="payment_form">
                        <div class="modal-body">
                            <select name="operator">
                                <option selected value="PAIEMENTMARCHAND_MTN_CM">MTN</option>
                                <option value="CM_PAIEMENTMARCHAND_OM_TP">ORANGE</option>
                            </select>
                            <input name="phone" type="number" class="pb-2" placeholder="Phone number"/>
                            <input name="amount" type="hidden" class="pb-2" placeholder="Phone number"
                                   value="{{ $details->price }}"/>
                            <input name="shop_id" type="hidden" class="pb-2" value="{{ $details->shop->id }}"/>
                        </div>
                        <div class="modal-footer">
                            <button id="close" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                            </button>
                            <button id="pay" type="submit" class="btn btn-primary">Pay now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('js')
    <script>
        // Variable to hold request
        var request;

        $('#payment_negociable').submit(function (e) {
            e.preventDefault();
            // Abort any pending request
            if (request) {
                request.abort();
            }

            // setup some local variables
            var $form = $(this);

            // Let's select and cache all the fields
            var $inputs = $form.find("input, select, button");

            // Serialize the data in the form
            var serializedData = $form.serialize();

            // Let's disable the inputs for the duration of the Ajax request.
            $inputs.prop("disabled", true);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "{{ route('check-price') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                data: serializedData
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR) {
                // Log a message to the console

                $(".modal").modal('hide');

                console.log(response);

                if (response.status === 302) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    })
                }

                if (response.status === 300) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.detailMessage,
                    })
                }

                if (response.status === 'INITIATED') {
                    Swal.fire(
                        'PAYMENT INITIATED',
                        'Please check your phone and complete the transaction ',
                        'info'
                    )
                }

            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
                // Log the error to the console

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorThrown,
                })
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function (response) {
                // Reenable the inputs
                if (response.status === 'FAILED') {
                    Swal.fire(
                        'Oops Failed!',
                        response.message,
                        'error'
                    )
                }

                if (response.status === 'SUCCESS') {
                    Swal.fire(
                        'Good job!',
                        response.message,
                        'success'
                    )
                }
                $inputs.prop("disabled", false);
            });

        })

        function checkPayment(order_id) {
            // Fire off the request to /form.php
            let id = order_id;
            let request;

            request = $.ajax({
                    url: "{{ route('check-status') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "post",
                    data: { 'order_id': id }
                });

            request.done(function (response) {

                if(response.status === 'PENDING') {
                    checkPayment(id);
                }

                if(response.status === 'FAILED') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something is wrong',
                    })
                }

                if(response.status === 'NOTFOUND') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Transaction Aborted',
                    })
                }

                if(response.status === 'SUCCESSFUL') {

                    Swal.fire(
                        'Good job!',
                        'Transaction Complete You Merchand will contact you!',
                        'success'
                    )
                }
            })

            request.fail(function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something is wrong',
                })
            })
        }

        $('#payment_form').submit(function (e) {
            e.preventDefault();

            // Abort any pending request
            if (request) {
                request.abort();
            }

            // setup some local variables
            var $form = $(this);

            // Let's select and cache all the fields
            var $inputs = $form.find("input, select, button");

            // Serialize the data in the form
            var serializedData = $form.serialize();

            // Let's disable the inputs for the duration of the Ajax request.
            $inputs.prop("disabled", true);

            // Fire off the request to /form.php
            request = $.ajax({
                url: "{{ route('pay') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                data: serializedData
            });

            // Callback handler that will be called on success
            request.done(function (response, textStatus, jqXHR) {
                // Log a message to the console

                $(".modal").modal('hide');

                if (response.status === 300) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.detailMessage,
                    })
                }

                if (response.status === 'INITIATED') {
                    Swal.fire(
                        'PAYMENT INITIATED',
                        'Please check your phone and complete the transaction ',
                        'info'
                    )
                    checkPayment(response.idFromClient);
                }
            });

            // Callback handler that will be called on failure
            request.fail(function (jqXHR, textStatus, errorThrown) {
                // Log the error to the console

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: errorThrown,
                })
                console.error(
                    "The following error occurred: " +
                    textStatus, errorThrown
                );
            });

            // Callback handler that will be called regardless
            // if the request failed or succeeded
            request.always(function (response) {
                // Reenable the inputs

                if (response.status === 'FAILED') {
                    Swal.fire(
                        'Oops Operation Failed!',
                        response.message,
                        'error'
                    )
                }

                if (response.status === 'SUCCESSFUL') {
                    Swal.fire(
                        'Good job!',
                        'Transaction Complete',
                        'success'
                    )
                }
                $inputs.prop("disabled", false);
            });
        })
    </script>
@endsection
