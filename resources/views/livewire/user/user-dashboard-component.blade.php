<div class="bg-light">

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

        <div class="row">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
            @endif

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


                                <div class="row">

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card-box  p-4 m-2 bg-white shadow">

                                            <strong class="header-title mt-0 mb-3">Account Balance</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-dollar fa-4x pull-left text-success"  style="position: relative; padding-top:15px;"></i>
                                                    <h4 class="">0.00 USDT</h4>
                                                    <p class="text-muted mb-3">Investment Earning</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card-box  p-4 m-2 bg-white shadow" >

                                            <strong class="header-title mt-0 mb-3">Total Amount Earned</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-dollar fa-4x pull-left text-success" style="position: relative; padding-top:15px;"></i>
                                                    @if($totalAmountEarned)
                                                        <h4 class="">{{$totalAmountEarned}} USDT</h4>
                                                    @else
                                                        <h4 class="">0.00 USDT</h4>
                                                    @endif
                                                    <p class="text-muted mb-3">Earnings</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card-box  p-4 m-2 bg-white shadow">

                                            <strong class="header-title mt-0 mb-3">Active Investment</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-dollar fa-4x pull-left text-success" style="position: relative; padding-top:15px;"></i>
                                                    <h4 class="">$0.00 </h4>
                                                    <p class="text-muted mb-3">Current Investment</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-xl-6 col-md-6">
                                        <div class="card-box  p-4 m-2 bg-white shadow">

                                            <strong class="header-title mt-0 mb-3">Total Withdrawals</strong>
                                            <div class="widget-box-2">
                                                <div class="widget-detail-2 text-right">
                                                    <i class="fa fa-dollar fa-4x pull-left text-success" style="position: relative; padding-top:15px;"></i>
                                                    @if($totalWithdrawal)
                                                        <h4 class="">{{$totalWithdrawal}} USDT</h4>
                                                    @else
                                                        <h4 class="">0.00 USDT</h4>

                                                    @endif
                                                    <p class="text-muted mb-3">Withdrawals</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div><!-- end col -->

                                    <div class="col-xl-12 col-md-12">
                                        <div class="cta-box">
                                            <div class="col-md-12">
                                                <div class="card mt-4 bg-white">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Pending Withdrawals</h4>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Mode</th>
                                                                    <th>Amount</th>
                                                                    <th>Investment Plan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($pendingWithdrawals as $pendingWithdrawal)
                                                                    <tr>
                                                                        <td>{{Str::title($pendingWithdrawal->user->name)}}</td>
                                                                        <td>{{Str::upper($pendingWithdrawal->mode)}}</td>
                                                                        <td>{{$pendingWithdrawal->amount}}</td>
                                                                        <td>{{Str::title($pendingWithdrawal->investmentPlan->name)}}</td>
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
                                                        <div class="card-box  p-4 m-2 bg-light" style="border-radius: 5px;">

                                                            <strong class="header-title mt-0 mb-3">Number of Referrals</strong>
                                                            <div class="widget-box-2">
                                                                <div class="widget-detail-2 text-right">
                                                                    <i class="fa fa-users fa-4x pull-left text-success"  style="position: relative; padding-top:15px;"></i>
                                                                    <h4 class="">200 </h4>
                                                                    <p class="text-muted mb-3">Referrals</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->

                                                    <div class="col-xl-6 col-md-6">
                                                        <div class="card-box  p-4 m-2 bg-light" style="border-radius: 5px;">

                                                            <strong class="header-title mt-0 mb-3">Total Referral Earnings</strong>
                                                            <div class="widget-box-2">
                                                                <div class="widget-detail-2 text-right">
                                                                    <i class="fa fa-users fa-4x pull-left text-success"  style="position: relative; padding-top:15px;"></i>
                                                                    <h4 class="">200 USDT</h4>
                                                                    <p class="text-muted mb-3">Referral Earning</p>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div><!-- end col -->

                                                </div>

                                                <div class="widget-detail-2 py-2">
                                                   <input class="form-control" type="text" name="referral_link" id="referral_link" value="edgepool.online/register/{{$referralCode}}" disabled><br>
                                                   <input type="button" onclick="copyToClipboard();" value="Copy!" class="btn btn-success">
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
