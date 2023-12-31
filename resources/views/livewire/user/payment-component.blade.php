<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Make Payment</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Payment</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Make Payment</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{route('user.investment-plans')}}" class="btn btn-custom pull-right">&raquo; Back to Staking Plans</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
                        @endif

                        @if (Session::has('error_message'))
                            <div class="alert alert-danger" role="alert"><strong>{{Session::get('error_message')}}</strong></div>
                        @endif

                        @if($activeUserInvestment)
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h4>You have an active staking in progress.</h4>
                                <p> <strong>Payment cannot be made at this time!</strong></p>
                                <a href="{{ route('user.dashboard') }}" class="btn btn-custom">&raquo; Go to Dashboard</a>
                            </div>
                        </div>

                        @elseif ($userTransaction)
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <h4>Your last payment is still pending.</h4>
                                <p> <strong>Payment cannot be made at this time!</strong></p>
                                <a href="{{ route('user.dashboard') }}" class="btn btn-custom">&raquo; Go to Dashboard</a>
                            </div>
                        </div>
                        @else

                        <form class="form-horizontal" wire:submit.prevent="makePayment" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Plan Name</label>
                                <div class="col-md-4">
                                    <input  type="text" name="" id="" class="form-control input-md"  value="" disabled wire:model="get_name">

                                    <input  type="text" name="" id="" class="form-control input-md" wire:model="get_userId" disabled hidden>
                                    <input  type="text" name="" id="" class="form-control input-md" wire:model="get_planId"  disabled hidden>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="get_price" disabled>
                                    @error('get_price')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Percentage</label>


                            <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="get_percentage" disabled>
                                    @error('get_percentage')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Duration</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="get_duration" disabled>
                                    @error('get_duration')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="is_active" class="col-md-4">Payment Method</label>
                                <div class="col-md-4">
                                    <select class="form-control " id="" name="" wire:model="get_mode">
                                        <option value="">Select an option</option>
                                        <option value="usdt">USDT</option>
                                        <option value="bank">Bank Payment</option>
                                    </select>
                                    @error('get_mode')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>



                            @if($get_mode === 'usdt')

                            <!-- START Section Calculator -->
                            <section class="cta-section position-relative">
                                <div class="container">
                                    <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
                                        <h5>Transfer <strong>{{$get_price}} USDT</strong> to the wallet address below:</h5>

                                        <h5><strong id="wallet">0x0f4078207d53181963203b5e9a18be8e811e0661</strong></h5>

                                        <input type="button" onclick="copyToClipboard('wallet');" value="Copy" class="btn btn-success">


                                </div>
                            </section>
                            <!-- END Section payment details-->

                            @elseif ($get_mode === 'bank')

                            <!-- START Section payment details -->
                            <section class="cta-section position-relative">
                                <div class="container">
                                    <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">

                                        <h5>Transfer <strong>{{$get_price*870}}</strong> Naira to the account number below:</h5>
                                        <h5>Bank Name: <strong>Wema Bank</strong> </h5>
                                        <h5>Account Name: <strong>Raven - IKAMBOR OTINYIA</strong> </h5>
                                        <h5>Account Number: <strong id="account">7790877006</strong> </h5>

                                        <input type="button" onclick="copyToClipboard('account')" value="Copy" class="btn btn-success">
                                </div>
                            </section>
                            <!-- END Section payment details-->

                            @endif

                            @if($get_mode)

                                <div class="form-group">
                                    <label for="" class="col-md-4 control-label">Upload Payment Proof</label>
                                    <div class="col-md-4">
                                        <input type="file" name="" id="" class="input-file" wire:model="get_image">
                                        @error('get_image')
                                            <p class="text-danger">You must upload proof payment</p>
                                        @enderror
                                        @if($get_image)
                                            <img src="{{ $get_image->temporaryUrl() }}" alt="" width="150" class="mt-3"/>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-custom">Confirm you have Paid</button>
                                    </div>
                                </div>
                            @endif

                        </form>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(elementID) {
        var element = document.getElementById(elementID);

        // Execute the copy command using the Clipboard API
        navigator.clipboard.writeText(element.innerText)
            .then(function() {
                alert("Copied to clipboard!");
            })
            .catch(function(error) {
                alert("Failed to copy to clipboard: " + error);
            });
  }
</script>
