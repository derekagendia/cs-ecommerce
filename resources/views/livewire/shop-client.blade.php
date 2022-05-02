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
                    <h4 class="page-title">List of Clients</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="#">Table</a></li>
                        <li class="active">List of Clients</li>
                    </ol>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Clients Export</h3>
                        <p class="text-muted m-b-30">Export client to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <td>{{ $client->user->name }}</td>
                                        <td>{{ $client->user->phone }}</td>
                                        <td>{{ $client->user->email }}</td>
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
