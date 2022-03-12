{{-- The Master doesn't talk, he acts. --}}
<ul class="navbar-nav w-75 ">
    <div class="input-group">
        <input wire:model.debounce.700ms="search" class="form-control" placeholder="Search Shop" wire:change="updateSearch"
               aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button"
                    id="button-addon2">
                                        <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                    </span>
            </button>
        </div>
    </div>
</ul>
