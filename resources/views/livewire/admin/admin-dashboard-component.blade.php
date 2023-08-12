<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Admin DashBoard</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->


    <div class="content">
        <style>
            .content {
              padding-top: 40px;
              padding-bottom: 40px;
              color: rgb(25, 25, 25)
            }
            .icon-stat {
                display: block;
                overflow: hidden;
                position: relative;
                padding: 15px;
                margin-bottom: 1em;
                background-color: #fff;
                border-radius: 4px;
                border: 1px solid #ddd;
            }

            .icon-stat-label, .icon-stat-value {
                padding-left: 15px;
            }

            .icon-stat-label {
                display: block;
                color: #999;
                font-size: 13px;
                font-weight: 600;
                width: 100%;
            }

            .icon-stat-value {
                display: block;
                font-size: 1.5rem;
                font-weight: 600;
            }
            .icon-stat-visual {
                position: relative;
                top: 22px;
                display: inline-block;
                width: 32px;
                height: 32px;
                border-radius: 4px;
                text-align: center;
                font-size: 16px;
                line-height: 30px;
            }
            .bg-primary {
                color: #fff;
                background: #d74b4b;
            }
            .bg-secondary {
                color: #fff;
                background: #6685a4;
            }

            .icon-stat-footer {
                padding: 10px 0 0;
                margin-top: 10px;
                color: #aaa;
                font-size: 13px;
                border-top: 1px solid #eee;
            }
        </style>
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
        @endif
        <div class="row">


            {{-- <div class="col-lg-3 col-sm-12">
                <div class="container">
                    <div class="sidebar">

                        <a href="{{route('admin.dashboard')}}" class="{{request()->is('admin/dashboard') ? 'active' : ''}}">Dashboard</a>
                        <a href="{{route('admin.view-admins')}}" class="{{request()->is('admin/view-admin') ? 'active' : ''}}">Admins</a>
                        <a href="{{route('admin.view-users')}}" class="{{request()->is('admin/view-user') ? 'active' : ''}}">Users</a>
                        <a href="{{ route('admin.investment-plans')}}" class="{{request()->is('admin/investment-plans') ? 'active' : ''}}">Investment Plans</a>
                        <a href="{{ route('admin.transactions')}}" class="{{request()->is('admin/transactions') ? 'active' : ''}}">All Transactions</a>
                      </div>
                </div>
            </div> --}}

            <div class="col-lg-12 col-sm-12">
                <div class="container">
                    <div class="row">

                        <div class=" col-sm-6 col-lg-4">
                            <div class="icon-stat">
                              <div class="row">
                                <div class="col-xs-8 text-left">
                                  <span class="icon-stat-label">Deposits Today</span>
                                  <span class="icon-stat-value">{{$depositToday}} USDT</span>
                                </div>
                                <div class="col-xs-4 text-center right" style="padding-left: 10px">
                                  <i class="fas fa-coins icon-stat-visual bg-primary text-white"></i>
                                </div>
                              </div>
                              <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                              </div>
                            </div>
                          </div>

                        <div class=" col-sm-6 col-lg-4">
                            <div class="icon-stat">
                              <div class="row">
                                <div class="col-xs-8 text-left">
                                  <span class="icon-stat-label">Pending Deposits</span>
                                  <span class="icon-stat-value">{{$pendingDeposit}}</span>
                                </div>
                                <div class="col-xs-4 text-center right" style="padding-left: 10px">
                                  <i class="fas fa-hourglass-half icon-stat-visual bg-warning text-white"></i>
                                </div>
                              </div>
                              <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                              </div>
                            </div>
                          </div>

                        <div class=" col-sm-6 col-lg-4">
                            <div class="icon-stat">
                              <div class="row">
                                <div class="col-xs-8 text-left">
                                  <span class="icon-stat-label">Total Amount Deposited</span>
                                  <span class="icon-stat-value">{{$totalDeposit}} USDT</span>
                                </div>
                                <div class="col-xs-4 text-center right" style="padding-left: 10px">
                                  <i class="fas fa-credit-card icon-stat-visual bg-success text-white"></i>
                                </div>
                              </div>
                              <div class="icon-stat-footer">
                                <i class="fa fa-clock-o"></i> Updated Now
                              </div>
                            </div>
                          </div>

                        <div class=" col-sm-6 col-lg-4">
                          <div class="icon-stat">
                            <div class="row">
                              <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Pending Withdrawals</span>
                                <span class="icon-stat-value">{{$pendingWithdrawal}}</span>
                              </div>
                              <div class="col-xs-4 text-center" style="padding-left: 10px">
                                <i class="fas fa-hourglass-half icon-stat-visual bg-warning text-white"></i>
                              </div>
                            </div>
                            <div class="icon-stat-footer">
                              <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                          </div>
                        </div>

                        <div class=" col-sm-6 col-lg-4">
                          <div class="icon-stat">
                            <div class="row">
                              <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Total Amount Withdrawn</span>
                                <span class="icon-stat-value">{{$totalWithdrawal}} USDT</span>
                              </div>
                              <div class="col-xs-4 text-center" style="padding-left: 10px">
                                <i class="fa fa-dollar icon-stat-visual bg-danger text-white"></i>
                              </div>
                            </div>
                            <div class="icon-stat-footer">
                              <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                          </div>
                        </div>

                        <div class=" col-sm-6 col-lg-4">
                          <div class="icon-stat">
                            <div class="row">
                              <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Withdrawals Today</span>
                                <span class="icon-stat-value">{{$withdrawalToday}} USDT</span>
                              </div>
                              <div class="col-xs-4 text-center" style="padding-left: 10px">
                                <i class="fa fa-bar-chart icon-stat-visual bg-danger text-white"></i>
                              </div>
                            </div>
                            <div class="icon-stat-footer">
                              <i class="fa fa-clock-o"></i> Updated Now
                            </div>
                          </div>
                        </div>
                      </div>
                </div>

                <div class="container">

                    <div class="cta-box ">
                        <div class="col-md-12">
                            <div class="card mt-4 bg-white">
                                <div class="card-header">
                                    <h4 class="card-title">Pending Deposits</h4>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>

                                                    <th>Mode</th>
                                                    <th>Amount</th>
                                                    <th>Staking Plan</th>
                                                    <th>Proof</th>
                                                    <th>View</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($pendingDepositRecords)
                                                        @foreach ($pendingDepositRecords as $pendingDepositRecord)
                                                            <tr>
                                                                <td>{{Str::title($pendingDepositRecord->user->name)}}</td>

                                                                <td>{{Str::upper($pendingDepositRecord->mode)}}</td>
                                                                <td>{{$pendingDepositRecord->amount}}</td>
                                                                <td>{{Str::title($pendingDepositRecord->investmentPlan->name)}}</td>
                                                                {{-- <td>{{Str::title($pendingDepositRecord->status)}}</td> --}}
                                                                <td>
                                                                    <img src="{{ asset('images/proofs')}}/{{ $pendingDepositRecord->proof }}" alt="Pay proof" style="object-fit:cover; height:50px; width:50px"/>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('admin.transaction-details',['transaction_id'=>$pendingDepositRecord->id])}}" class="btn-sm btn-success">
                                                                        <i class="fa fa-eye"></i>
                                                                    </a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="cta-box ">
                        <div class="col-md-12">
                            <div class="card mt-4 bg-white">
                                <div class="card-header">
                                    <h4 class="card-title">Requested Withdrawals</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>

                                                    <th>Name</th>
                                                    <th>Mode</th>
                                                    <th>Amount</th>
                                                    <th>Staking Plan</th>

                                                    <th>View</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($pendingWithdrawalRecords as $pendingWithdrawalRecord)
                                                    <tr>
                                                        <td>{{Str::title($pendingWithdrawalRecord->user->name)}}</td>

                                                        <td>{{Str::upper($pendingWithdrawalRecord->mode)}}</td>
                                                        <td>{{$pendingWithdrawalRecord->amount}}</td>
                                                        <td>{{Str::title($pendingWithdrawalRecord->investmentPlan->name)}}</td>

                                                        <td>
                                                            <a href="{{route('admin.transaction-details',['transaction_id'=>$pendingWithdrawalRecord->id])}}" class="btn-sm btn-success">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- <div class="container">
            <div class="cta-box bg-white">
                <div class="col-md-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4 class="card-title">Transactions History</h4>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                                </li>

                              </ul>
                              <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                  <h3>Home Content</h3>
                                  <p>This is the content for the Home tab.</p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                  <h3>Profile Content</h3>
                                  <p>This is the content for the Profile tab.</p>
                                </div>

                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
</div>
