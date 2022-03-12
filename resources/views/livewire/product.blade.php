<div>
    <main>
        <div class="section">
            <div class="container-fluid">
                <div class="row pt-5 pt-md-0">
                    <livewire:card-user-information />

                    <!-- main content  -->
                    <div class="col-12 col-lg-9">
                        <!-- statistics -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h3 class="font-weight-bolder">Inventory</h3>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Rocket</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Inventory</li>
                                    </ol>
                                </nav>

                            </div>
                            <!-- search -->
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="fas fa-search"></span>
                                        </span>
                                    </div>
                                    <input class="form-control" id="searchInputdashboard1" placeholder="Search"
                                           type="text" aria-label="Dashboard user search"></div>
                            </div>
                            <!-- End search -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header row justify-content-right">
                                        <div class="col-md-12">
                                            <p class="text-right">
                                                @if(!$addProduct)
                                                    <button wire:click="productAdd({{1}})"
                                                            class="btn btn-primary"><span>
                                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                       fill="currentColor" class="bi bi-plus-square"
                                                       viewBox="0 0 16 16"><path
                                                          d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                                  <path
                                                      d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                              </span>
                                                        Add product
                                                    </button>
                                                @endif
                                                @if($addProduct)
                                                    <button wire:click="productAdd({{0}})" class="btn btn-danger"><span>
                                              </span>
                                                        Annule
                                                    </button>
                                                @endif
                                            </p>
                                            @if($addProduct)
                                                @livewire('add-product')
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Description</th>
                                                    <th scope="col">Category</th>
{{--                                                    <th scope="col">Quantity</th>--}}
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($products as $product)
                                                    <tr>
                                                        <td><img src="{{ asset($product->cover_img) }}"
                                                                 class="mr-2 rounded-circle profile-sm">{{ $product->name }}
                                                        </td>
                                                        <td>XAF {{ number_format($product->price) }}</td>
                                                        <td class="text-success font-weight-bolder">{!!  $product->description !!}
                                                        </td>
                                                        <td>{{ isset($product->category->name) ? $product->category->name : 'Not Categories' }}</td>
{{--                                                        <td>{{ $product->quantity }}</td>--}}
                                                        <td>
                                                            <div class="btn-group">
                                                                <button
                                                                    class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                            <span class="icon icon-sm">
                                <span class="fas fa-ellipsis-h icon-dark"></span>
                            </span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu" style="">
                                                                    <button class="dropdown-item"
                                                                            wire:click="productEdit({{ $product->id }})">
                                                                        Edit
                                                                    </button>
                                                                    <button
                                                                        wire:click="deleteProduct({{ $product->id }})"
                                                                        class="dropdown-item">Delete
                                                                    </button>
                                                                    <a class="dropdown-item" href="#">Preview</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    @if($editId === $product->id)
                                                        <tr>

                                                            <livewire:product-form :product="$product"
                                                                                   :key="$product->id"/>
                                                        </tr>

                                                    @endif

                                                @empty
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
