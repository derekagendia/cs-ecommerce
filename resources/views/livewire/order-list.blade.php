<div>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}.
                    </div>
                @endif
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">List of Orders</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">List of orders</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Orders Export</h3>
                        <p class="text-muted m-b-30">Export order to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
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
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                        <td> {{ $order->payment_gateway == 1 ? 'MTN MONEY' : 'ORANGE MONEY' }}</td>
                                        <td>XAF {{ number_format($order->grand_total) }}</td>
                                        <td><span
                                                class="shape-xs rounded-circle bg-success mr-2"></span><span
                                                class="font-weight-bolder {{ $order->is_paid ? 'text-success':'text-danger' }}"> {{ $order->is_paid ? 'Complete' : 'awaiting payment' }} </span>
                                        </td>
                                        <td class="text-nowrap">
                                            <button wire:click="is_delivery({{$order->id}})"
                                                    class="fcbtn btn btn-success btn-outline btn-1d" >Mark as Delivery
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
