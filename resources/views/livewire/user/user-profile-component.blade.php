<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">My Profile</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="container pt-3">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
        @endif

        @if (Session::has('error_message'))
            <div class="alert alert-danger" role="alert"><strong>{{Session::get('error_message')}}</strong></div>
        @endif
    </div>



    <div class="container pt-3">
        {{-- USER DETAILS START --}}
        <div class="card mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="pull-left">{{ Auth::user()->utype === 'USR'? 'User Details': 'Admin details'}}</h4>
                    </div>

                </div>
            </div>`

            <div class="row">
                <div class="card-body">

                    <div class="container">

                        <div class="row">

                            <div class="col-sm-12 {{ Auth::user()->utype === 'USR'? 'col-md-4': 'col-md-6'}}">
                                <div class="form-group">
                                    <label for="" class="control-label">Name</label>
                                    <p><strong>{{ $get_name }}</strong></p>
                                </div>
                            </div>

                            <div class="col-sm-12 {{ Auth::user()->utype === 'USR'? 'col-md-4': 'col-md-6'}}">
                                <div class="form-group">
                                    <label for="" class="control-label">Email</label>
                                    <p><strong>{{ $get_email }}</strong></p>
                                </div>
                            </div>



                            @if(Auth::user()->utype === 'USR')
                                <div class="col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="" class="control-label">Referral&nbsp;Code</label>
                                        <p><strong id="ref_code">{{ $get_referral_code }}</strong> </p>
                                    </div>
                                </div>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- USRE DETAILS END --}}
    </div>



    <div class="container pt-3 pb-30">

        {{-- PAYMENT DETAILS FORM START --}}
       @if(Auth::user()->utype === 'USR')
       <div class="card mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="pull-left">Payment Details</h4>
                    </div>

                </div>
            </div>`

            <div class="row">
                <div class="card-body">

                    <div class="container">
                        <form wire:submit.prevent="updateDetails">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="" class="control-label">Account Name</label>
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
                                        <label for="" class="control-label">Bank Name</label>
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
                                        <label for="" class="control-label">Account Number</label>
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
                                        <label for="" class="control-label">USDT Wallet Address</label>
                                        <div class="">
                                            <input  type="text" class="form-control" wire:model="get_usdt_wallet">
                                        </div>
                                        @error('get_usdt_wallet')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group py-2 pull-right">
                                <div class="">
                                    <button type="submit" class="btn btn-custom">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       @endif
        {{-- PAYMENT DETAILS FORM END --}}



        {{-- PASSWORD CHANGE FORM START --}}
        <div class="card mt-5">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="pull-left">Change Password</h4>
                    </div>

                </div>
            </div>`

            <div class="row">
                <div class="card-body">

                    <div class="container">
                        <form method="POST" wire:submit.prevent="changePassword">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="oldPassword" class="control-label">Old&nbsp;Password</label>
                                        <div class="">
                                            <input  type="password" class="form-control" wire:model.lazy="oldPassword">
                                        </div>
                                        @error('oldPassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="newPassword" class="control-label">New&nbsp;Password</label>
                                        <div class="">
                                            <input  type="password" id="newPassword" class="form-control" wire:model.lazy="newPassword">
                                        </div>
                                        @error('newPassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="confirmPassword" class="control-label">Confirm&nbsp;Password</label>
                                        <div class="">
                                            <input  type="password" id="newPassword" class="form-control" wire:model.lazy="confirmPassword">
                                        </div>
                                        @error('confirmPassword')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group py-2 pull-right">
                                <div class="">
                                    <button type="submit" class="btn btn-custom ">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- PASSWORD CHANGE FORM END --}}


    </div>
</div>

<script>
    function copyToClipboard() {
        var input = document.getElementById("ref_code");

        // Create a range object and select the input text
        input.select();

        // Execute the copy command using the Clipboard API
        navigator.clipboard.writeText(input.value)
        .then(function() {
            alert("Copied to clipboard!");
        })
        .catch(function(error) {
            alert("Failed to copy to clipboard: " + error);
        });
  }
</script>
