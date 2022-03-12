<div>
    <main>
        <div class="section">
            <div class="container-fluid">
                <div class="row pt-5 pt-md-0">
                    <livewire:card-user-information />

                    <!-- main content  -->
                    <div class="col-12 col-lg-9">
                        <!-- statistics -->
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="font-weight-bolder">Customers</h3>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Rocket</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">customers</li>
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
                                    <input wire:model.debounce.700ms="search" class="form-control" id="searchInputdashboard1" placeholder="Search"
                                           type="text" aria-label="Dashboard user search"></div>
                            </div>
                            <!-- End search -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th scope="col">Users</th>
                                                    <th scope="col">Date</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($users as $user)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex">
                                                                <div class="flex shrink-0">
                                                                    <img src="./assets/img/profile_pic.jpg"
                                                                         class="mr-2 my-2 rounded-circle profile-sm">
                                                                </div>
                                                                <div class="flex-grow-1 ml-3">
                                                                    <span
                                                                        class="font-weight-bold">{{ $user->first_name }}</span><br>
                                                                    <span
                                                                        class="small text-muted">{{ $user->email }}</span>
                                                                </div>
                                                        </td>
                                                        <td>21/09/2021</td>
                                                        <td class="{{ $user->status ? 'text-success' : 'text-muted' }} font-weight-bolder">{{ $user->status ? 'Active' : 'Disabled' }}</td>
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
                                                                    <button class="dropdown-item" wire:click="activeOrDisable({{ $user->id }})">{{ $user->status ? 'Disabled' : 'Active' }}</button>
                                                                    <button class="dropdown-item" wire:click="deleteCustomer({{ $user->id }})">Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    No data
                                                @endforelse

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $users->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
