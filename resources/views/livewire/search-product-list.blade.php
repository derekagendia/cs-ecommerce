{{-- Nothing in the world is as soft and yielding as water. --}}
<div>
    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-6 col-xs-6 mb-4">
                <a href="#">
                    <div class="card shadow">
                        <img src=" {{ asset('assets/img/cover.jpg') }}" class="card-img-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <p class="font-weight-bolder">{{ $product->name }} <span
                                            class="badge badge-danger font-weight-bolder p-1">New</span>
                                    </p>
                                </div>
                            </div>
                            <h5 class="font-weight-bolder">{{ number_format($product->price) }} CFA</h5>
                            <a href="{{ route('product.details',[$product->shop->slug,$product->id]) }}"
                               class="btn btn-paypal">details</a>
                        </div>
                    </div>
                </a>
            </div>
        @empty
        @endforelse

    </div>
    {{ $products->links() }}
</div>
