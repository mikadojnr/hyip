<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">My Profile</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="container" style="padding:30px 0;">
        <div class="row">
            @if (Session::has('message'))
                    <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
                @endif

            <div class="col-md-12">


                <form class="form-horizontal" wire:submit.prevent="updateDetails">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="pull-left">User Details</h4>
                                </div>

                                <div class="col-md-6">
                                    <a href="{{route('user.dashboard')}}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Name</label>

                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_name" hidden>
                                            <h5>{{Str::title($get_name)}}</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Email</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_email" hidden>
                                            <h5 style="text-transform: lowercase">{{Str::lower($get_email)}}</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Referral Code</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_referral_code" hidden>
                                            <h5>{{$get_referral_code}}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card mt-5">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="pull-left">Payment Details</h4>
                                </div>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Account Name</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_account_name">
                                        </div>
                                        @error('get_account_name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Bank Name</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_bank_name">
                                        </div>
                                        @error('get_bank_name')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Account Number</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_account_number">
                                        </div>
                                        @error('get_account_number')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">USDT Wallet Address</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_usdt_wallet">
                                        </div>
                                        @error('get_usdt_wallet')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>




                    <div class="form-group py-2 pull-right">
                        <div class="">
                            <button type="submit" class="btn btn-custom form-control">Update Profile</button>
                        </div>
                    </div>





                </form>

            </div>
        </div>
    </div>
</div>
