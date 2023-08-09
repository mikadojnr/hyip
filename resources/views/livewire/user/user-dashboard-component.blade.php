<div class="bg-light" >

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">DashBoard</h2>
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

                        <a href="{{route('user.dashboard')}}" class="{{request()->is('user/dashboard') ? 'active' : ''}}">Dashboard</a>
                        <a href="{{route('admin.view-admins')}}" class="{{request()->is('admin/view-admin') ? 'active' : ''}}">My Profile</a>
                        <a href="{{route('admin.view-users')}}" class="{{request()->is('admin/view-user') ? 'active' : ''}}">Refferals</a>

                      </div>
                </div>
            </div> --}}

            <div class="col-lg-12 col-sm-12">
                <div class="container">
                    <div class="content-page">
                        <div class="content">

                            <!-- Start Content-->
                            <div class="container-fluid">


                                <div class="row justify-content-center">

                                    <div class="col-md-12 col-lg-4">
                                        <div class="card-box  p-4 m-2 alert-primary shadow">

                                            <strong class="header-title mt-0 mb-3">Pending Stake Returns</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fas fa-coins fa-4x pull-left text-primary" aria-hidden="true"  style="position: relative; padding-top:15px;"></i>
                                                    @if($currentBalance)
                                                        <h5 class="">{{$currentBalance}} USDT</h5>
                                                    @else
                                                        <h5 class="">0.00 USDT</h5>
                                                    @endif

                                                    <p class="text-muted mb-3">Pending Withdrawals</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-lg-4">
                                        <div class="card-box  p-4 m-2 alert-success shadow" >

                                            <strong class="header-title mt-0 mb-3">Total Amount Earned</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class=" fas fa-money-bill fa-4x pull-left text-success" style="position: relative; padding-top:15px;"></i>
                                                    @if($totalWithdrawal && $totalReferralAmount)

                                                        <h5 class="">{{ $totalWithdrawal + $totalReferralAmount }} USDT</h5>
                                                    @else
                                                        <h5 class="">0.00 USDT</h5>
                                                    @endif
                                                    <p class="text-muted mb-3">Staking & Referrals</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-md-12 col-lg-4">
                                        <div class="card-box  p-4 m-2 alert-danger shadow">

                                            <strong class="header-title mt-0 mb-3">Total Withdrawals</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-credit-card fa-4x pull-left text-danger" aria-hidden="true" style="position: relative; padding-top:15px;"></i>
                                                    @if($totalWithdrawal)
                                                        <h5 class="">{{$totalWithdrawal}} USDT</h5>
                                                    @else
                                                        <h5 class="">0.00 USDT</h5>

                                                    @endif
                                                    <p class="text-muted mb-3">Withdrawals</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    @if($userInvestment)
                                    <div class="col-xl-12 col-md-12">
                                        <div class="card-box  p-4 m-2 alert-warning shadow">

                                            <h6 class="header-title mt-0 mb-3 text-center text-md-left" style="color: #996633">Active Stake: <strong>{{ Str::upper($userInvestment->investmentPlan->name ) }}</strong></h6>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-credit-card fa-4x pull-left" aria-hidden="true" style="position: relative; padding-top:15px;"></i>

                                                    <p class="">Yield Amount: <strong>{{$yieldSum}} USDT</strong></p>
                                                    <p class="">End Date: <strong>{{$expiryDate}}</strong></p>
                                                    <p class="">Remaining Days: <strong>{{$daysPassed}}</strong></p>
                                                    <p class="text-muted mb-3 pt-4"><strong>ACTIVE</strong></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    @else
                                    <div class="col-xl-12 col-md-12">
                                        <div class="card-box  p-4 m-2 alert-warning shadow">

                                            <strong class="header-title mt-0 mb-3">NO ACTIVE STAKE</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 mt-3">
                                                    {{-- <i class="fa fa-credit-card fa-4x pull-left text-danger" aria-hidden="true" style="position: relative; padding-top:15px;"></i> --}}
                                                    <a href="{{ route('user.investment-plans') }}" class="btn-sm btn-success ">STAKE NOW</a>

                                                    <p class="text-muted mb-3 text-right"><strong>IN-ACTIVE</strong></p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->
                                    @endif

                                    <div class="col-xl-12 col-md-12">

                                            <div class="col-md-12">
                                                <div class="card mt-4 bg-white">
                                                    <div class="card-header">
                                                        <h5 class="card-title">Pending Stake Returns</h5>
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

                                                                    @foreach ($pendingWithdrawals as $pendingWithdrawal)
                                                                        <tr>
                                                                            <td>{{Str::title($pendingWithdrawal->user->name)}}</td>
                                                                            <td>{{Str::upper($pendingWithdrawal->mode)}}</td>
                                                                            <td>{{$pendingWithdrawal->amount}}</td>
                                                                            <td>{{Str::title($pendingWithdrawal->investmentPlan->name)}}</td>
                                                                            <td>
                                                                                <a href="{{route('user.transaction-details',['transaction_id'=>$pendingWithdrawal->id])}}" class="btn-sm btn-success">
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

                                    </div><!-- end col -->

                                    <div class="col-xl-12 col-md-12">
                                        <div class="card-box  p-4 m-2 bg-white border-top ">
                                            <div class="card-header">
                                                <strong class="header-title mt-0 mb-3">Referral Link</strong>
                                            </div>

                                            <script>
                                                function copyToClipboard() {
                                                    var input = document.getElementById("referral_link");

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
                                            <div class="widget-box-2 card-body">
                                                <div class="row">

                                                    <div class="col-xl-6 col-md-6">
                                                        <div class="card-box  p-4 m-2 alert-primary" style="border-radius: 5px;">

                                                            <strong class="header-title mt-0 mb-3">Number of Referrals</strong>
                                                            <div class="widget-box-2">
                                                                <div class="widget-detail-2 text-right">
                                                                    <i class="fa fa-users fa-4x pull-left text-primary"  style="position: relative; padding-top:15px;"></i>
                                                                    @if ($totalReferrals)
                                                                    <h5 class="">{{$totalReferrals}} </h5>
                                                                    @else
                                                                    <h5 class="">0 </h5>
                                                                    @endif

                                                                    <p class="text-muted mb-3">Referrals</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->

                                                    <div class="col-xl-6 col-md-6">
                                                        <div class="card-box  p-4 m-2 alert-success" style="border-radius: 5px;">

                                                            <strong class="header-title mt-0 mb-3">Total Referral Earnings</strong>
                                                            <div class="widget-box-2">
                                                                <div class="widget-detail-2 text-right">
                                                                    <i class="fas fa-gift fa-4x pull-left text-success"  style="position: relative; padding-top:15px;"></i>
                                                                    @if ($totalReferralAmount)
                                                                        <h5 class="">{{$totalReferralAmount}} USDT</h5>
                                                                    @else
                                                                        <h5 class="">0.00 USDT</h5>
                                                                    @endif
                                                                    <p class="text-muted mb-3">Earning</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->

                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="widget-detail-2 py-2">
                                                            <input class="form-control" type="text" name="referral_link" id="referral_link" value="https://edgepool.online/register/{{$referralCode}}" disabled><br>
                                                            <input type="button" onclick="copyToClipboard();" value="Copy!" class="btn btn-success">
                                                         </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="py-2 widget-detail">
                                                            <a href="{{ route('user.referrals') }}" class="pull-right btn btn-custom">View Referrals &raquo;</a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->






                                </div>
                                <!-- end row -->





                    </div>

                    <!-- ============================================================== -->
                    <!-- End Page content -->
                    <!-- ============================================================== -->

                    </div>
                </div>

                </div>
            </div>


    </div>
</div>
