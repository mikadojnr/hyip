<div class="bg-light">


    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">All Users</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
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

                            <input class="form-control" wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search users by name or email..." />
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
                                <h4 class="pull-left">All Users</h4>
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
                                        <th>Bank</th>
                                        <th>USDT Wallet Address</th>
                                        <th colspan="2">Action</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->user_detail->account_name ?? ''}}</td>
                                        <td>{{$user->user_detail->account_number ?? ''}}</td>
                                        <td>{{$user->user_detail->bank_name ?? ''}}</td>

                                        <td>{{$user->user_detail->usdt_wallet ?? ''}}</td>

                                        <td>
                                            <a class="btn-md btn-danger" href="#" wire:click.prevent="deleteUser({{$user->id}})" onclick="confirm('Are you sure you want to delete this user?') || event.stopImmediatePropagation()">
                                                Delete
                                            </a>
                                        </td>

                                        <td>
                                            <a class="btn-md btn-success" href="#" wire:click.prevent="makeAdmin({{$user->id}})" onclick="confirm('Are you sure you want to add this user as admin?') || event.stopImmediatePropagation()">
                                                Make Admin
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
                        {{$users->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
