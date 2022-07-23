<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row">
        @forelse($shops as $shop)
                <div class="col-lg-3 col-sm-6 col-xs-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="shop-1 ms-2"></div>
                                </div>
                                <div class="col-md-8">
                                    <p class="fw-bold">{{ $shop->name }}</p>
                                    <a href="{{ route('shop.owner',$shop->slug) }}" class="btn btn-primary btn-sm">View Shop</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        @empty
        @endforelse
    </div>
    {{ $shops->links() }}
</div>
