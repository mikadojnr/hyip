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
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transaction</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- END Section Page Title -->


<div class="row">


    <div class="col-lg-12 col-sm-12">
        <div class="container">
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="pull-left">Transaction Detail</h4>
                        </div>

                        <div class="col-md-6">
                            <a href="{{route('admin.dashboard')}}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <strong class="center">Username</strong>
                            <p>{{Str::title($transaction->user->name)}}</p>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <strong>Email</strong>
                                <p class="">{{$transaction->user->email}}</p>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6 ">
                            <strong>Investment Plan</strong>
                            <p>{{Str::title($transaction->investmentPlan->name)}}</p>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <strong>Transaction Type</strong>
                                <p>{{Str::title($transaction->type)}}</p>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6 ">
                            <strong>Transaction Date</strong>
                            <p>{{Str::title($transaction->updated_at)}}</p>
                        </div>

                        <div class="col-md-6">
                            <div class="">
                                <strong>Amount</strong>
                                <p>{{Str::title($transaction->amount)}} USDT</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6 ">
                            <strong>Payment Mode</strong>
                            <p>{{Str::upper($transaction->mode)}}</p>
                        </div>
                        <div class="col-md-6 ">
                            <strong>Status</strong>
                            <p>{{Str::upper($transaction->status)}}</p>
                        </div>
                    </div>


                    <br>

                    @if($transaction->type == 'withdrawal')
                        <div class="row border-top ">
                            <div class="col-md-12 my-2">
                                <h4>Account Details</h4>
                            </div>
                        </div>
                        @if($transaction->mode == 'usdt')
                            <div class="row">
                                <div class="col-md-12 ">
                                    <strong>USDT Wallet</strong>
                                    <p>{{$transaction->user->user_detail->usdt_wallet}}</p>
                                </div>
                            </div>
                        @else
                        <div class="row">
                            <div class="col-md-4 ">
                                <strong>Bank Name</strong>
                                <p>{{$transaction->user->user_detail->bank_name}}</p>
                            </div>

                            <div class="col-md-4 ">
                                <strong>Account No.</strong>
                                <p>{{$transaction->user->user_detail->account_number}}</p>
                            </div>

                            <div class="col-md-4 ">
                                <strong>Account Name</strong>
                                <p>{{$transaction->user->user_detail->account_name}}</p>
                            </div>
                        </div>
                        @endif
                    @endif

                </div>

                <div class="card-footer">

                    <div class="pull-right">
                        @if($transaction->status === 'pending')
                            <a href="" wire:click.prevent="approveTransaction({{$transaction->id}})" class="btn btn-success">Approve</a>
                        @elseif($transaction->status === 'approved')
                        <a href="" wire:click.prevent="makeTransactionPending({{$transaction->id}})" class="btn btn-warning">Make Pending</a>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
