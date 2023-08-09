<div class="bg-light">
    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Staking Plans</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Staking Plans</li>
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

        <div class="col-lg-12 col-sm-12 mb-30">
            <div class="container">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Staking Plans</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.add-investment-plans')}}" class="btn btn-custom pull-right">Add Plans</a>

                            </div>
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Percentage</th>
                                        <th>Duration</th>
                                        <th>Active</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($investment_plans)
                                        @foreach($investment_plans as $plan)
                                        <tr>
                                            <td>{{Str::title($plan->name)}}</td>
                                            <td>{{$plan->price}}</td>
                                            <td>{{$plan->percentage}}</td>
                                            <td>{{$plan->duration}}</td>
                                            <td>{{$plan->is_active}}</td>
                                            <td>
                                                <a class="btn-sm btn-danger" href="#" wire:click.prevent="deletePlan({{$plan->id}})" onclick="confirm('Are you sure you want to delete this plan?') || event.stopImmediatePropagation()">
                                                    <i class="fa fa-times text-white"></i>
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
</div>
