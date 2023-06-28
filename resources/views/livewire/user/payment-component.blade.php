<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Make Payment</h2>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Make Payment</h4>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif

                        <form class="form-horizontal" wire:submit.prevent="initiateInvestment">
                            @csrf
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Plan Name</label>
                                <div class="col-md-4">
                                    <input  type="text" name="" id="" class="form-control input-md"  value="" disabled wire:model="get_name">

                                    <input  type="text" name="" id="" class="form-control input-md" wire:model="get_userId" disabled hidden>
                                    <input  type="text" name="" id="" class="form-control input-md" wire:model="get_planId"  disabled hidden>
                                    @error('get_name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    @error('get_userId')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror

                                    @error('get_planId')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
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
                                        <input type="button" onclick="copyWallet();" value="Copy" class="btn btn-success">
                                </div>
                            </section>
                            <!-- END Section payment details-->

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-custom">Confirm you have Paid</button>
                                </div>
                            </div>

                            @elseif ($get_mode === 'bank')

                            <!-- START Section payment details -->
                            <section class="cta-section position-relative">
                                <div class="container">
                                    <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">

                                        <h5>Transfer <strong>{{$get_price*760}}</strong> Naira to the account number below:</h5>
                                        <h5>Bank Name: <strong>Wema Bank</strong> </h5>
                                        <h5>Account Name: <strong>Raven - IKAMBOR OTINYIA</strong> </h5>
                                        <h5>Account Number: <strong id="account">7790877006</strong> </h5>

                                        <input type="button" onclick="copyBank()" value="Copy" class="btn btn-success">



                                </div>
                            </section>
                            <!-- END Section payment details-->

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-custom">Confirm you have Paid</button>
                                </div>
                            </div>

                            @endif



                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
