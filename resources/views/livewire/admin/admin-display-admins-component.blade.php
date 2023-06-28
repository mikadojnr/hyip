<div class="bg-light">


    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Admin</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Admins</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->


    <div class="row">

        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
            @endif
        </div>

        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">

                        <div class="form-group">

                            <input class="form-control" wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search admins by name or email..." />
                        </div>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12">
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">All Admins</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{route('admin.dashboard')}}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Account Name</th>
                                        <th>Account No.</th>
                                        <th>USDT Wallet Address</th>
                                        <th></th>
                                        <th>Discard Admin</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($admins as $admin)
                                    <tr>
                                        <td>{{$admin->name}}</td>
                                        <td>{{$admin->email}}</td>
                                        <td>{{$admin->user_detail->account_name ?? ''}}</td>
                                        <td>{{$admin->user_detail->account_number ?? ''}}</td>

                                        <td>{{$admin->user_detail->usdt_wallet ?? ''}}</td>

                                        <td>
                                            <a class="btn-sm btn-danger" href="#" wire:click.prevent="deleteUser({{$admin->id}})" onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()">
                                                <i class="fa fa-times text-white"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn-sm btn-success" href="#" wire:click.prevent="makeUser({{$admin->id}})" onclick="confirm('Are you sure you want to dismiss this user from admin?') || event.stopImmediatePropagation()">
                                                Yes
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        @if(!$searchTerm)
                            {{$admins->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
