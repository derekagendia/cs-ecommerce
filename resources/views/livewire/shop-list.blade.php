<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="row">
        @forelse($shops as $shop)
            <div wire:key="{{ $shop->id }}" class="col-lg-3 col-md-6 col-xs-6 mb-4">
                <a href="#">
                    <div class="card shadow">
                        <img src=" {{ asset('assets/img/cover.jpg') }}" class="card-img-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <p class="font-weight-bolder">{{ $shop->name }} <span
                                            class="badge badge-danger font-weight-bolder p-1">New</span>
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('shops.show',$shop->slug) }}" class="btn btn-paypal">Go to shop</a>
                        </div>
                    </div>
                </a>
            </div>
        @empty
        @endforelse
    </div>
    {{ $shops->links() }}
</div>
