{{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

<ul class="navbar-nav navbar-nav-hover ms-auto  w-75">
    <div class="input-group">
        @if( request()->routeIs('products.list') )
            <form wire:submit.prevent="search">
                <input wire:model.debounce.700ms="searchProduct" class="form-control"
                       type="text" placeholder="search products"
                       aria-label="Recipient's "/>
                <div class="input-group-append">
                    <button  class="btn btn-secondary">search</button>
                </div>
            </form>
        @else
            <input wire:model.debounce.700ms="searchProduct" wire:change="updateProductSearch" class="form-control"
                   type="text" name="" placeholder="search products"
                   aria-label="Recipient's "/>
            <div class="input-group-append">
                <a wire:click="updateProductSearch" class="btn btn-secondary">search</a>
            </div>
        @endif
    </div>
</ul>
