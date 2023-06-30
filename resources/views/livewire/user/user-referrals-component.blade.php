<div class="bg-light">

    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Referrals</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Referrals</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->


    <div class="row">

        <div class="col-md-12">
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>
            @endif
        </div>

        <div class="container pt-5">

            <div class="col-md-12">
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
                                            <h4 class="">{{$totalReferrals}} </h4>
                                            @else
                                            <h4 class="">0 </h4>
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
                                                <h4 class="">{{$totalReferralAmount}} USDT</h4>
                                            @else
                                                <h4 class="">0.00 USDT</h4>
                                            @endif
                                            <p class="text-muted mb-3">Earning</p>
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

            <div class="row justify-content-center pt-5">
                <div class="col-md-6">

                        <div class="form-group">

                            <input class="form-control" wire:model.debounce.500ms="searchTerm" type="text" placeholder="Search admins by name or email..." />
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
                                <h4 class="pull-left">All Referals</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{route('user.dashboard')}}" class="btn btn-custom pull-right">&raquo; Back to Dashboard</a>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Amount Earned</th>
                                        <th>Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referrals as $referral)
                                    <tr>
                                        <td>{{$referral->referee->name}}</td>
                                        <td>{{$referral->referee->email}}</td>
                                        <td>{{$referral->referral_amount}}</td>
                                        <td>{{date('Y-m-d H:i', strtotime($referral->created_at))}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-footer">
                        @if(!$searchTerm)
                            {{$referrals->links()}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
