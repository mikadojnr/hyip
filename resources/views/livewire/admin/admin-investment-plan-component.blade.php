<div>
    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Admin DashBoard</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Investment Plans</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->

    <div class="container">
        <div class="cta-box bg-white">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Investment Plans</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.add-investment-plans')}}" class="btn btn-custom pull-right">Add Plans</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Percentage</th>
                                    <th>Duration</th>
                                    <th>Active</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investment_plans as $plan)
                                <tr>
                                    <td>{{title_case($plan->name)}}</td>
                                    <td>{{$plan->price}}</td>
                                    <td>{{$plan->percentage}}</td>
                                    <td>{{$plan->duration}}</td>
                                    <td>{{$plan->is_active}}</td>

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
