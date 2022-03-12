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
                                <h3 class="font-weight-bolder">Category and sections</h3>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Rocket</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Category</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 mt-2">
                                <form wire:submit.prevent="addCategory">
                                    <div class="form-group focused">
                                        <label for="nameCategory"><span class="font-weight-bolder"
                                                                              style="font-size:14pt;">Enter category</span></label>
                                        <input wire:model.debounce.600ms="name" type="text" class="form-control @error('name') is-invalid @enderror" id="nameCategory"
                                               aria-describedby="" placeholder="Ex. clothing">
                                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Add
                                    </button>
                                </form>
                                <div class="card mt-4">
                                    <p class="card-title p-2 font-weight-bolder">Categories</p>
                                    <div class="card-body p-3">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            <tbody>
                                            @forelse($categories as $category)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            {{ $category->name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#">
                                                                <button wire:loading.attr="disabled" wire:click="deleteCategory({{ $category->id }})" class="btn btn-danger btn-sm">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                         height="16" fill="currentColor" class="bi bi-x"
                                                                         viewBox="0 0 16 16">
                                                                        <path
                                                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                    </svg>
                                                                    <span> Delete</span>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                            </tbody>
                                            </thead>
                                        </table>
                                        {{ $categories->links() }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mt-2">
                                <form>
                                    <div class="form-group focused">
                                        <label for="exampleInputEmail1"><span class="font-weight-bolder"
                                                                              style="font-size:14pt;">Enter new section</span></label>
                                        <input type="text" class="form-control" id="exampleInputText"
                                               aria-describedby="" placeholder="Ex. Top sales">
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">Add</button>
                                </form>
                                <div class="card mt-4">
                                    <p class="card-title p-2 font-weight-bolder">Categories</p>
                                    <div class="card-body p-3">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        Clothing
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#">
                                                            <button class="btn btn-danger btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor" class="bi bi-x"
                                                                     viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                </svg>
                                                                <span> Delete</span>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        Electronics
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="#">
                                                            <button class="btn btn-danger btn-sm">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                     height="16" fill="currentColor" class="bi bi-x"
                                                                     viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                                </svg>
                                                                <span> Delete</span>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
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
    </main>
</div>
