<div class="bg-light">
    <!-- START Section Hero -->
    <section class="breadcrumb-section">
       <div class="banner position-relative">
           <div class="container">
               <div class="row align-items-center">
                   <div class="col-lg-6 col-12 text-lg-left text-center" data-wow-delay="0.2s">
                       <div class="banner-text">
                           <h2 class="c-white mb-3 mb-md-4">EDGEPOOL RELIABLE STAKING RETURNS </h2>
                           <p class="c-white">EDGEPOOL helps generate strong staking returns and meets long-term goals,  We are a leading global staking solutions partner, dedicated to improving peoples financial security.</p>
                           <a href="{{route('about')}}" class="btn btn-lg btn-custom btn-light mt-4">Read About Us</a>
                       </div>
                   </div>
                   <div class="col-lg-6 col-12 d-none d-lg-block wow zoomIn" data-wow-delay="0.4s">
                       <div class="banner-img">
                           <img src="{{ asset('img/home/banner-vector.png') }}" alt="business">
                       </div>
                   </div>
               </div>
           </div>
       </div>

       </div>
   </section>
   <!-- END Section Hero -->

  @guest
       <!-- START Section CTA -->
        <section class="cta-section position-relative">
            <div class="container">
                <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
                    <h3>Start growing with EDGEPOOL today!</h3>
                    <p class="mb-30 mx-auto">The ability to efficiently implement trades around the clock, through our internal trading desk.</p>
                    <a href="{{ route('register')}}" class="btn btn-lg btn-custom">Join Now <i class="zmdi zmdi-long-arrow-right ml-2"></i></a>
                </div>
            </div>
        </section>
        <!-- END Section CTA -->
  @endguest

   <!-- START Section Projects -->
   <section class="project-section bg-w sp-100-70">
       <div class="container">
           <div class="row d-none d-md-flex">
               <div class="col-12">
                   <ul class="sorting mb-60">


                       </li>
                   </ul>
               </div>
           </div>
           <div class="row masonary-wrap">
               <div class="col-lg-4 col-md-6 col-12 port-item mb-30 webdesign digitalmarketing">
                   <div class="project">
                       <div class="proj-img">
                           <img src="{{ asset('img/project/portfolio-1.jpg') }}" alt="project">
                           <div class="proj-overlay">
                               <h5>Sourcing key staking ideas designed to deliver real value</h5>
                               <a href="{{ asset('img/project/portfolio-1.jpg') }}" class="pop-btn">
                                   <i class="zmdi zmdi-zoom-in"></i>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-6 col-12 port-item mb-30 seo graphicdesign">
                   <div class="project">
                       <div class="proj-img">
                           <img src="{{ asset('img/project/portfolio-2.jpg') }}" alt="project">
                           <div class="proj-overlay">
                               <h5>Balancing yield and total return</h5>
                               <a href="{{ asset('img/project/portfolio-2.jpg') }}" class="pop-btn">
                                   <i class="zmdi zmdi-zoom-in"></i>
                               </a>
                           </div>
                       </div>
                   </div>
               </div>
               <div class="col-lg-4 col-md-6 col-12 port-item mb-30 webdesign graphicdesign">
                   <div class="project">
                       <div class="proj-img">
                           <img src="{{ asset('img/project/portfolio-3.jpg') }}" alt="project">
                           <div class="proj-overlay">
                               <h5>Research & insights From our global team of researchers and strategists</h5>
                               <a href="{{ asset('img/project/portfolio-3.jpg') }}" class="pop-btn">
                                   <i class="zmdi zmdi-zoom-in"></i>

                               </a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- END Section Projects -->


   <!-- START Section CTA -->
   <section class="cta-section position-relative">
       <div class="container">
           <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
               <a href="{{ route('user.referrals') }}" class="btn-lg btn-success">5% REFERRAL COMMISION</a>

           </div>
       </div>
   </section>
   <!-- END Section CTA -->


   <!-- START Section Page Title -->
   <section class="bg-light sp-100-70">
       <div class="container">
           <div class="row">
               <div class="col-12 text-center">
                   <h2>Staking plans</h2>


   <!-- START Section Pricing -->
   <section class="bg-light sp-100-70">
       <div class="container">

           <div class="tab-content wow fadeIn">
               <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                   <div class="row justify-content-center">

                        @if($plans)
                        @foreach ($plans as $plan )
                        <div class="col-md-6 col-lg-4 mb-30">
                            <div class="price-item text-center">
                                <div class="">
                                    <h2>{{$plan->percentage}}%</h2>
                                    <h4 class="mb-0 plan_name">{{$plan->name}}</h4>
                                </div>
                                <div class="price-content">
                                    <ul class="border-bottom mb-30 mt-md-4 pb-3 text-left">
                                         <li>
                                             <i class="zmdi zmdi-check mr-2"></i>
                                             <span class="c-black plan-price"><b>Amount: {{$plan->price}} USDT</b></span>
                                         </li>
                                        <li>
                                            <i class="zmdi zmdi-check mr-2"></i>
                                            <span class="c-black">Profit {{$plan->percentage}}%</span>
                                        </li>

                                        <li>
                                             <i class="zmdi zmdi-check mr-2"></i>
                                             <span class="c-black">7 Days Plan</span>
                                        </li>

                                    </ul>
                                    @guest
                                         <a href="{{route('register')}}" class="btn btn-custom">Start Now</a>
                                    @else
                                         <a class="btn btn-custom" href="{{route('user.payment',['plan_id'=>$plan->id])}}">Stake  Now</a>
                                    @endguest

                                 </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                   </div>
               </div>


               </div>
           </div>
       </div>
   </section>
   <!-- END Section Pricing -->

   <!-- START Section Calculator -->
   <section class="cta-section position-relative bg-light">
    <div class="container">
        <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
            <h3>Staking Profit Calculator</h3>
        <div class="card mt-4 bg-white">
            <div class="card-header">
                <h5>Select Staking Plan:</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                <select class="form-control" id="investmentSelect">
                    <option value="">-- Select --</option>
                    @foreach($plans as $plan)
                        <option value="{{ $plan->id }}">{{ Str::title($plan->name) }}</option>
                    @endforeach
                </select>
                </div>
                <strong><div id="result" class="center"></div></strong>
            </div>
            <div class="card-footer">
                <button class="btn btn-custom" onclick="calculateReturn()">Calculate</button>
            </div>
            </div>
        </div>

      </div>


   </section>
<!-- END Section Calculator-->


   <!-- START Section Counter -->
   <section class="sp-100-70 bg-gradi counters-section" id="counters">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="section-title">
                       <h3 class="top-c-sep  c-white">Some of Company Real Facts</h3>

                   </div>
               </div>
           </div>
           <div class="row align-items-center justify-content-center">
               <div class="col-lg-3 col-md-6 mb-30">
                   <div class="counter-box d-flex d-lg-block">
                       <div class="icon-box mb-3">

                       </div>
                       <div class="ml-5 ml-lg-0 pt-1 pt-lg-0">
                           <h3 class="" >{{ $active_investments }}</h3>
                           <p class="c-black text-capitalize"> Active Stakes</p>
                       </div>
                   </div>
               </div>

               <div class="col-lg-3 col-md-6 mb-30">
                   <div class="counter-box d-flex d-lg-block">
                       <div class="icon-box mb-3">

                       </div>
                       <div class="ml-5 ml-lg-0 pt-1 pt-lg-0">
                           <h3 class="" >{{ $total_users }}</h3>
                           <p class="c-black text-capitalize"> Total Accounts</p>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 mb-30">
                   <div class="counter-box d-flex d-lg-block">
                       <div class="icon-box mb-3">

                       </div>
                       <div class="ml-5 ml-lg-0 pt-1 pt-lg-0">
                           <h3 class="" >{{ $total_deposited }} USDT</h3>
                           <p class="c-black text-capitalize"> Total Deposited</p>
                       </div>
                   </div>
               </div>
               <div class="col-lg-3 col-md-6 mb-30">
                   <div class="counter-box d-flex d-lg-block">
                       <div class="icon-box mb-3">

                       </div>
                       <div class="ml-5 ml-lg-0 pt-1 pt-lg-0">
                           <h3 class="" >{{ $total_withdrawn }} USDT</h3>
                           <p class="c-black text-capitalize">Total Withdrawn</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- END Section Counter -->

<br><br>

   <!-- START Section Projects -->
   <section class="cta-section position-relative">
       <div class="container">
           <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
               <h3>Latest Stakings</h3>
               <div class="columns is-variable is-multiline is-centered">
                 <div class="column is-10">


                   <br>
                   <br>
                   <table class="table is-fullwidth is-bordered">
                     <thead>
                       <tr class="is-selected">
                         <th>Username</th>
                         <th>Amount</th>
                       </tr>
                     </thead>
                     <tbody>

                        @if($user_investments)
                            @foreach ($user_investments as $user_investment)
                            <tr>
                                <td>{{Str::title($user_investment->user->name)}}</td>
                                <td>{{$user_investment->amount}} USDT</td>
                            </tr>
                            @endforeach
                        @endif



                      </tbody>
                   </table>
                 </div>
               </div>
               <br>

                <br>
                    <hr>
                 <br>

               <h3>Latest Payouts</h3>

                 <div class="column is-10">


                   <br>
                   <br>
                   <table class="table is-fullwidth is-bordered">
                     <thead>
                       <tr class="is-selected">
                         <th>Username</th>
                         <th>Amount</th>

                       </tr>
                     </thead>
                     <tbody>


                       @if($payouts)
                            @foreach ($payouts as $payout)
                            <tr>
                                <td>{{ Str::title($payout->user->name) }}</td>
                                <td>{{ $payout->amount }} USDT</td>

                            </tr>
                            @endforeach
                       @endif

                     </tbody>
                   </table>
                 </div>

               <br> </div>

   </section>
   <!-- END Section CTA -->



   <!-- START Section Clients -->
   {{-- <section class="sp-100 bg-white clients-section">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="text-left mb-60">
                       <h3 class="title-right">Payment Methods</h3>
                   </div>
               </div>
           </div>
           <div class="client-slider" id="client-slider">
               <div class="item">
                   <img src="{{ asset('img/client/client-1.png') }}" alt="client 1">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-2.png') }}" alt="client 2">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-3.png') }}" alt="client 3">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-4.png') }}" alt="client 4">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-5.png') }}" alt="client 5">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-6.png') }}" alt="client 6">
               </div>
               <div class="item">
                   <img src="{{ asset('img/client/client-7.png') }}" alt="client 7">
               </div>
           </div>
       </div>
   </section> --}}
   <!-- END Sections Clients -->



</div>

<script>
    function calculateReturn() {
      var investmentSelect = document.getElementById('investmentSelect');
      var selectedInvestment = investmentSelect.value;
      var resultElement = document.getElementById('result');

      switch (selectedInvestment) {

        @foreach ($plans as $plan)
            case '{{ $plan->id }}':
            calculateInvestmentReturn({{ $plan->price }}, {{ $plan->percentage }}, {{ $plan->duration }});
            break;
        @endforeach

        default:
          resultElement.innerHTML = 'Select a Plan!';
          break;
      }
    }

    function calculateInvestmentReturn(investmentAmount, profitPercentage, duration) {
      var returnAmount = investmentAmount * (profitPercentage / 100);
      var totalAmount = investmentAmount + returnAmount;
      var resultElement = document.getElementById('result');
      resultElement.innerHTML = 'Return after '+duration+ ' days will be ' + totalAmount.toFixed(2) + ' USDT';
    }
  </script>
