<div class="bg-light">
    <style>
        html,
        body {
            height: 100%;
        }

        .card-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
    </style>

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Transaction Details</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transaction</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="row">
        <div class="col-lg-12 col-sm-12 mb-30 mt-30">
            <div class="container">
                @if (Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ Session::get('message') }}</strong>
                    </div>
                @endif

                @if (Session::has('warning_message'))
                    <div class="alert alert-warning" role="alert">
                        <strong>{{ Session::get('warning_message') }}</strong>
                    </div>
                @endif

                @if (Session::has('error_message'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ Session::get('error_message') }}</strong>
                    </div>
                @endif

                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Transaction Detail</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ route('user.dashboard') }}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                            </div>
                        </div>
                    </div>

                    @if ($investment)
                        @if ($transaction->type === 'withdrawal')
                            <form action="" wire:submit.prevent="requestWithdrawal">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong class="center">Username</strong>
                                            <p>{{ Str::title($transaction->user->name) }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <strong>Email</strong>
                                                <p class="">{{ $transaction->user->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <strong>Staking Plan</strong>
                                            <p>{{ Str::title($transaction->investmentPlan->name) }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <strong>Transaction Type</strong>
                                                <p>{{ Str::title($transaction->type) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6 ">
                                            <strong>Transaction Date</strong>
                                            <p>{{ Str::title($transaction->updated_at) }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="">
                                                <strong>Amount</strong>
                                                <p>{{ Str::title($transaction->amount) }} USDT</p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        @if ($transaction->status === 'pending')
                                            <div class="col-md-6 ">
                                                <strong>Payment Mode</strong>
                                                <select name="" id="" class="form-control md-4" wire:model="get_mode">
                                                    <option value="">-- Select Payment mode --</option>
                                                    <option value="usdt">USDT</option>
                                                    <option value="bank">BANK</option>
                                                </select>
                                                @error('get_mode')
                                                    <p class="text-danger">You must choose payment type</p>
                                                @enderror
                                                <br>
                                            </div>
                                        @else
                                            <div class="col-md-6 ">
                                                <strong>Payment Mode</strong>
                                                <select name="" id="" class="form-control md-4" wire:model="get_mode" disabled>
                                                    <option value="{{ $transaction->mode }}">{{ Str::upper($transaction->mode) }}</option>
                                                </select>
                                                @error('get_mode')
                                                    <p class="text-danger">You must select your payment mode.</p>
                                                @enderror
                                                <br>
                                            </div>
                                        @endif
                                        <div class="col-md-6 ">
                                            <strong>Status</strong>
                                            <p>{{ Str::upper($transaction->status) }}</p>
                                        </div>
                                    </div>
                                    @if ($transaction->type === 'withdrawal' && $transaction->status === 'requested')
                                        <div class="row border-top ">
                                            <div class="col-md-12 my-2">
                                                <h4>Account Details</h4>
                                            </div>
                                        </div>
                                        @if ($transaction->mode === 'usdt')
                                            <div class="col-md-12">
                                                <strong>USDT Wallet</strong>
                                                <p>{{ $transaction->user->user_detail->usdt_wallet }}</p>
                                            </div>
                                        @elseif ($transaction->mode === 'bank')
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Bank Name</strong>
                                                    <p>{{ Str::upper($transaction->user->user_detail->bank_name) }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Account No.</strong>
                                                    <p>{{ $transaction->user->user_detail->account_number }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Account Name</strong>
                                                    <p>{{ Str::title($transaction->user->user_detail->account_name) }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @else
                                        <div class="row border-top ">
                                            <div class="col-md-12 my-2">
                                                <h4>Account Details</h4>
                                            </div>
                                        </div>
                                        @if ($get_mode === 'usdt' && isset($transaction->user->user_detail->usdt_wallet))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <strong>USDT Wallet</strong>
                                                    <p>{{ $transaction->user->user_detail->usdt_wallet }}</p>
                                                </div>
                                            </div>
                                        @elseif ($get_mode === 'bank' && isset($transaction->user->user_detail->bank_name) && isset($transaction->user->user_detail->account_number) && isset($transaction->user->user_detail->account_name))
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <strong>Bank Name</strong>
                                                    <p>{{ Str::upper($transaction->user->user_detail->bank_name) }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Account No.</strong>
                                                    <p>{{ $transaction->user->user_detail->account_number }}</p>
                                                </div>
                                                <div class="col-md-4">
                                                    <strong>Account Name</strong>
                                                    <p>{{ Str::title($transaction->user->user_detail->account_name) }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endif
                                    <br>

                                    <div class="card-footer mb-3">
                                        <div class="pull-right">
                                            @if ($transaction->status === 'pending' && $transaction->type === 'withdrawal')
                                                <input type="submit" value="Request Withdrawal" class="btn btn-success" onclick="confirm('You will be charged 5% of your earnings!') || event.stopImmediatePropagation()">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    @endif
                @else
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="center">Username</strong>
                                <p>{{ Str::title($transaction->user->name) }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <strong>Email</strong>
                                    <p class="">{{ $transaction->user->email }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Staking Plan</strong>
                                @if(!$transaction->description === 'bonus')

                                    <p>{{ Str::title($transaction->investmentPlan->name) }}</p>
                                @else
                                    <p>NIL</p>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <strong>Transaction Type</strong>
                                    <p>{{ Str::title($transaction->type) }}</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Transaction Date</strong>
                                <p>{{ Str::title($transaction->updated_at) }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <strong>Amount</strong>
                                    <p>{{ Str::title($transaction->amount) }} USDT</p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Payment Mode</strong>
                                <p>{{ Str::upper($transaction->mode) }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong>Status</strong>
                                <p>{{ Str::upper($transaction->status) }}</p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Description</strong>
                                <p>{{ Str::title($transaction->description) }}</p>
                            </div>
                            <div class="col-md-6">
                                <p>-------------------------------</p>
                            </div>
                        </div><br>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>
