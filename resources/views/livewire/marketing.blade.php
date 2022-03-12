<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="section">
        <div class="container-fluid">
            <div class="row pt-5 pt-md-0">
                <livewire:card-user-information/>

                <!-- main content  -->
                <div class="col-12 col-lg-9">
                    <!-- statistics -->
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="font-weight-bolder">Marketing</h3>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                    <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a></li>
                                    <li class="breadcrumb-item"><a href="#">Rocket</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Marketing</li>
                                </ol>
                            </nav>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <div class="card-header row">
                                    <div class="col-md-12">
                                        <h5 class="font-weight-bolder"><span>Slider</span> <span
                                                class="badge badge-primary">1</span></h5>
                                        <p class="small">Drag and drop or click below to chose product to be assigned to
                                            this flyer</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form action="" wire:submit.prevent="save">

                                        <div class="form-group files">
                                            <label>Upload Your File </label>
                                            <input type="file" class="form-control @error('photo') is-invalid @enderror"
                                                   wire:model="photo">
                                            @error('photo') <span class="alert-danger">{{ $message }}</span> @enderror
                                        </div>

                                        <div class="control-group col-md">
                                            <label for="product_id">Product</label>
                                            <select wire:model="product_id" class="form-control"
                                                    aria-label="Default select example">
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-5">Add</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <h4 class="card-title p-3">Sliders</h4>
                                <div class="card-body">
                                    <div class="table-responsive table-wrapper">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th class="border-0">Image</th>
                                                <th class="border-0 text-center">Product</th>
                                                <th class="border-0 text-center">Action</th>
                                            </tr>
                                            @forelse($productsNotNull as $product)
                                            <tr>
                                                <td><img src="{{ asset($product->image_url) }}"
                                                         class="rounded-circle profile-sm"> <span
                                                        class="font-weight-bold">File name.jpg</span></td>
                                                <td class="text-center">
                                                    <div class="flex-grow-1 ml-3">
                                                        <span class="font-weight-bold">{{ $product->name }}</span><br>
                                                        <span class="small text-muted">{{ isset($product->category->name) ? $product->category->name : 'Not Category' }}</span>
                                                    </div>
                                                </td>
                                                <td class="text-center text-danger"><button wire:click="deleteSlide({{ $product->id }})" class='btn btn-danger'><span>
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                           fill="currentColor" class="bi bi-x-circle-fill"
                                                           viewBox="0 0 16 16">
                                                      <path
                                                          d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                                      </svg>
                                                  </span> Delete</button></td>
                                            </tr>
                                                @empty
                                           @endforelse
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
