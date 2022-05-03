<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="row">
        @foreach($products as $product)
            <div class="col-lg-3 col-sm-6 col-xs-3">

                <div class="card mb-2">
                    <a href="{{ route('products.details',$product->slug) }}">
                        <img src="{{ asset(Voyager::image($product->cover_img)) }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h4>{{ number_format($product->price) }} FCFA <span class="badge {{ $product->is_negociable ? 'bg-primary' : 'bg-danger' }} badge-pill fw-light"
                                         style="font-size:10pt;" >{{ $product->is_negociable ? 'negociable' : 'not negociable' }}</span></h4>
                        <h3>{{ $product->name }}</h3>
                        <ul class="list-unstyled pt-1">
                            <li class="list-inline-item" style="position: absolute;">
                                {{ $product->shop->name}}
                            </li>
                        </ul>


                    </div>
                </div>
            </div>
        @endforeach
        {{ $products->links() }}
    </div>

</div>
