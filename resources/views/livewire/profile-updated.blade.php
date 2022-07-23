<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissable text-center text-black">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}.
                    </div>
                @endif
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Profile page</h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Profile page</li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <div class="white-box">
                        <div class="user-bg"> <img width="100%" alt="user" src="{{ asset(Voyager::image(auth()->user()->avatar)) }}">
                            <div class="overlay-box">
                                <div class="user-content">
                                    <img src="{{ asset(Voyager::image(auth()->user()->avatar)) }}" class="thumb-lg img-circle" alt="img">
                                    <h4 class="text-white">{{ auth()->user()->name }}</h4>
                                    <h5 class="text-white">{{ auth()->user()->email }}</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="tab active">
                                <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#password_update" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Update password</span> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <div class="row">
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                        <br>
                                        <p class="text-muted">{{ auth()->user()->name }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                        <br>
                                        <p class="text-muted">{{ auth()->user()->phone }}</p>
                                    </div>
                                    <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings">
                                <form action="{{ route('profile.updated') }}" method="post" class="form-horizontal form-material" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" placeholder="{{ auth()->user()->name }}" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input type="email" name="email" placeholder="{{ auth()->user()->email }}" class="form-control form-control-line" id="example-email"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Profile</label>
                                        <div class="col-md-12">
                                            <input type="file" name="avatar" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Phone No</label>
                                        <div class="col-md-12">
                                            <input type="text" name="phone" placeholder="{{ auth()->user()->phone }}" class="form-control form-control-line"> </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="password_update">
                                <form action="{{ route('password.updated') }}" method="post" class="form-horizontal form-material">
                                    @csrf
                                    <div class="form-group">
                                        <label for="current_password" class="col-md-12">Current Password</label>
                                        <div class="col-md-12">
                                            <input id="current_password" type="password" name="current_password" value="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password" class="col-md-12">New password</label>
                                        <div class="col-md-12">
                                            <input id="password" type="password" name="password" placeholder="" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Update Password</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
