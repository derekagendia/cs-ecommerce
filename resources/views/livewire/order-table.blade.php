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
                                <h3 class="font-weight-bolder">Orders</h3>
                                <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                        <li class="breadcrumb-item"><a href="#"><span class="fas fa-home"></span></a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#">Rocket</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                                    <input wire:model.debounce.500ms="search" class="form-control" id="searchInputdashboard1" placeholder="Search"
                                           type="text" aria-label="Dashboard user search"></div>
                            </div>
                            <!-- End search -->
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <div wire:loading wire:target="is_paid,deleteOrder" class="spinner-grow justify-center" style="width: 3rem; height: 3rem;" role="status">
                                            </div>
                                            <table class="table table-borderless">
                                                <thead>
                                                <tr>
                                                    <th scope="col">User</th>
                                                    <th scope="col">Cart Number</th>
                                                    <th scope="col">Order date</th>
                                                    <th scope="col">Mode of payment</th>
                                                    <th scope="col">Total price</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orders as $order)
                                                    <tr>
                                                        <td><img src="{{ asset($order->user->profile_photo_url) }}"
                                                                 class="mr-2 rounded-circle profile-sm">{{ $order->user->name }}
                                                        </td>
                                                        <td><a href="#" style="text-decoration:none;">{{ $order->order_number }}</a></td>
                                                        <td>{{ $order->created_at->format('d/m/Y') }}</td> <!-- 31/08/2021 -->
                                                        <td>{{ $order->payment_gateway == 1 ? 'MTN MONEY' : 'ORANGE MONEY' }}</td>
                                                        <td>XAF {{ number_format($order->grand_total) }}</td>
                                                        <td><span
                                                                class="shape-xs rounded-circle bg-success mr-2"></span><span
                                                                class="font-weight-bolder {{ $order->is_paid ? 'text-success':'text-danger' }}"> {{ $order->is_paid ? 'Complete' : 'awaiting payment' }} </span>
                                                        </td>
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
                                                                    <button wire:loading.attr="disabled" wire:click="is_paid({{ $order->id }})" class="dropdown-item"> {{ $order->is_paid ? 'Mark as not paid':'Mark as Paid' }}</button>
                                                                    <button wire:loading.attr="disabled" wire:click="deleteOrder({{ $order->id }})" class="dropdown-item" href="#">Delete</button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="6">
                                                            Not Order(s)
                                                        </td>
                                                    </tr>
                                                @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
