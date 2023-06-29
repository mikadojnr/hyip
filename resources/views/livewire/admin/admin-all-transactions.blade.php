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
            <div class="row justify-content-center">
                <div class="col-md-6">

                        <div class="form-group">

                            <input class="form-control" wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search transactions base on name..." />
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
                                        <th>Name</th>
                                        <th>Plan</th>
                                        <th>Amount</th>
                                        <th>Mode</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>View</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                    @if($transaction->type === 'deposit')

                                        <tr class="alert-success ">

                                            <td>{{$transaction->user->name}}</td>
                                            <td>{{Str::title($transaction->investmentPlan->name)}}</td>
                                            <td>{{$transaction->amount}}</td>
                                            <td>{{Str::upper($transaction->mode)}}</td>
                                            <td>{{Str::title($transaction->status)}}</td>
                                            <td>{{date('Y-m-d H:i', strtotime($transaction->updated_at))}}</td>


                                            <td>
                                                <a class="btn-sm btn-success" href="{{route('admin.transaction-details',['transaction_id'=>$transaction->id])}}">
                                                    <i class="fa fa-eye"></i>

                                                </a>
                                            </td>

                                        </tr>
                                    @else

                                        <tr class="alert-danger">
                                            <td>{{$transaction->user->name}}</td>
                                            <td>{{Str::title($transaction->investmentPlan->name)}}</td>
                                            <td>{{$transaction->amount}}</td>
                                            <td>{{Str::upper($transaction->mode)}}</td>
                                            <td>{{Str::title($transaction->status)}}</td>
                                            <td>{{date('Y-m-d H:i', strtotime($transaction->updated_at))}}</td>


                                            <td>
                                                <a class="btn-sm btn-success" href="{{route('admin.transaction-details',['transaction_id'=>$transaction->id])}}">
                                                    <i class="fa fa-eye"></i>

                                                </a>
                                            </td>

                                        </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">

                        @if(!$searchTerm)
                            {{$transactions->links()}}
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
