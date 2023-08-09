<div class="bg-light">


    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">All Transactions</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->


    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
        @endif

        <div class="container pt-5">

            <div class="col-md-12">
                <div class="card-box  p-4 m-2 bg-white border-top ">
                    <div class="card-header">
                        <strong class="header-title mt-0 mb-3">Stats</strong>
                    </div>

                    <div class="widget-box-2 card-body">
                        <div class="row">

                            <div class="col-xl-6 col-md-6">
                                <div class="card-box  p-4 m-2 alert-info" style="border-radius: 5px;">

                                    <strong class="header-title mt-0 mb-3">Total Charges</strong>
                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            <i class="fas fa-money-bill fa-4x pull-left text-success"  style="position: relative; padding-top:15px;"></i>
                                            @if ($totalWithdrawalCharge)
                                            <h4 class="">{{$totalWithdrawalCharge}} USDT</h4>
                                            @else
                                            <h4 class="">0.00 USDT</h4>
                                            @endif

                                            <p class="text-muted mb-3">Total Withdrawal Charges</p>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-6 col-md-6">
                                <div class="card-box  p-4 m-2 alert-info" style="border-radius: 5px;">

                                    <strong class="header-title mt-0 mb-3">Transaction Charges</strong>
                                    <div class="widget-box-2">
                                        <div class="widget-detail-2 text-right">
                                            <i class="fa fa-credit-card fa-4x pull-left text-danger"  style="position: relative; padding-top:15px;"></i>
                                            @if ($totalWithdrawalChargeCount)
                                                <h4 class="">{{$totalWithdrawalChargeCount}}</h4>
                                            @else
                                                <h4 class="">0</h4>
                                            @endif
                                            <p class="text-muted mb-3">Charge Counts</p>
                                        </div>

                                    </div>
                                </div>
                            </div><!-- end col -->

                        </div>

                    </div>
                </div>
            </div><!-- end col -->
        </div>

        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">

                        <div class="form-group">

                            <input class="form-control" wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search transactions base on name..." />
                        </div>

                </div>
            </div>
        </div>


        <div class="col-lg-12 col-sm-12 mb-30">
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">All Transactions</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{route('admin.dashboard')}}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="">
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Mode</th>
                                        <th>Status</th>
                                        <th>View</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @if($transactions)
                                        @foreach($transactions as $transaction)
                                            @if($transaction->type === 'deposit')
                                                <tr class="alert-success ">
                                                    <td>{{date('Y-m-d H:i', strtotime($transaction->updated_at))}}</td>
                                                    <td>{{Str::title($transaction->user->name)}}</td>
                                                    <td>{{Str::title($transaction->type)}}</td>
                                                    <td>{{$transaction->amount}}</td>
                                                    <td>{{Str::title($transaction->description)}}</td>
                                                    <td>{{Str::upper($transaction->mode)}}</td>
                                                    <td>{{Str::title($transaction->status)}}</td>

                                                    <td>
                                                        <a class="btn-sm btn-success" href="{{route('admin.transaction-details',['transaction_id'=>$transaction->id])}}">
                                                            <i class="fa fa-eye"></i>

                                                        </a>
                                                    </td>

                                                </tr>

                                            @else

                                                <tr class="alert-danger ">
                                                    <td>{{date('Y-m-d H:i', strtotime($transaction->updated_at))}}</td>
                                                    <td>{{Str::title($transaction->user->name)}}</td>
                                                    <td>{{Str::title($transaction->type)}}</td>
                                                    <td>{{$transaction->amount}}</td>
                                                    <td>{{Str::title($transaction->description)}}</td>
                                                    <td>{{Str::upper($transaction->mode)}}</td>
                                                    <td>{{Str::title($transaction->status)}}</td>

                                                    <td>
                                                        <a class="btn-sm btn-success" href="{{route('admin.transaction-details',['transaction_id'=>$transaction->id])}}">
                                                            <i class="fa fa-eye"></i>

                                                        </a>
                                                    </td>

                                                </tr>
                                            @endif

                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer mb-10">

                        @if(!$searchTerm)
                            {{$transactions->links()}}
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
