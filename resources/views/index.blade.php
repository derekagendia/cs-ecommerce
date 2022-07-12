@extends('layouts.front')

@section('content')
</div>
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
                                <livewire:show-categories/>
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
                            @foreach(\App\Models\Event::where('active',1)->get() as $ads)
                                @if($loop->iteration <= 3)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img src="{{ asset(Voyager::image($ads->image)) }}"
                                             style="height:400px; width:auto;"
                                             alt="First slide">
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselId"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselId"
                                data-bs-slide="next">
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
            <livewire:product-list/>
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
            <livewire:shop-list/>

    </section>

@endsection
