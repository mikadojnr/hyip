<div class="bg-light">
    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">STAKING PLANS</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>

                        <li class="breadcrumb-item active">Staking Plans</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="container">
         <!-- START Section Pricing -->
        <section class="bg-light sp-100-70">
            <div class="container">

                <div class="tab-content wow fadeIn">
                    <div role="tabpanel" class="tab-pane fade show active" id="yearly">
                        <div class="row justify-content-center">

                            @foreach ($plans as $plan )
                            <div class="col-md-6 col-lg-4 mb-30">
                                <div class="price-item text-center">
                                    <div class="">
                                        <h2>{{$plan->percentage}}%</h2>
                                        <p id="planId" data-value="{{$plan->id}}"></p>
                                        <h4 class="mb-0 plan_name" id="planName" data-value="{{$plan->name}}">{{$plan->name}}</h4>
                                    </div>
                                    <div class="price-content">
                                        <ul class="border-bottom mb-30 mt-md-4 pb-3 text-left">
                                            <li>
                                                <i class="zmdi zmdi-check mr-2"></i>
                                                <span class="c-black plan-price" id="price" data-value="{{$plan->price}}"><b>Amount: {{$plan->price}} USDT</b></span>
                                            </li>
                                            <li>
                                                <i class="zmdi zmdi-check mr-2"></i>
                                                <span class="c-black" id="percentage" data-value="{{$plan->percentage}}">Profit {{$plan->percentage}}%</span>
                                            </li>

                                            <li>
                                                <i class="zmdi zmdi-check mr-2"></i>
                                                <span class="c-black" id="duration" data-value="7">7 Days Plan</span>
                                            </li>


                                            <p id="userId" data-value="{{ Auth::user()->id }}"></p>



                                        </ul>

                                        {{-- <button  wire:click="$emit('updateData')">Invest</button> --}}
                                        <a class="btn btn-custom" href="{{route('user.payment',['plan_id'=>$plan->id])}}">Invest</a>


                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>


                    </div>
                </div>
            </div>
        </section>
        <!-- END Section Pricing -->

        <!-- START Section Calculator -->
        <section class="cta-section position-relative">
        <div class="container">
            <div class="cta-box bg-white wow fadeInUp" data-wow-delay="0.2s">
                <h3>Staking Profit Calculator</h3>
            <div class="card mt-4">
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
    </div>
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
