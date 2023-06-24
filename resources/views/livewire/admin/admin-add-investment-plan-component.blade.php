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
                        <li class="breadcrumb-item"><a href="{{route('admin.investment-plans')}}">Investment Plans</a></li>
                        <li class="breadcrumb-item active">Add Investment Plans</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->}

    {{-- <div class="container">
        <div class="cta-box bg-white">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Add Investment Plan</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.investment-plans')}}" class="btn btn-custom pull-right">All Plans</a>
                            </div>
                        </div>
                    </div>

                    <style>

                    </style>
                    <div class="card-body">
                        <form action="" class="form-horizontal">
                            <div class="form-group center">
                                <label for="" class="control-label">Plan Name</label>
                                <div class="">
                                    <input type="text" name="" id="" class="form-control input-md">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="pull-left">Add New Plan</h4>
                            </div>
                            <div class="col-md-6">
                                <a href="{{route('admin.investment-plans')}}" class="btn btn-custom pull-right">All Plans</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-horizontal" wire:submit.prevent="storePlan">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Plan Name</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Price</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="price">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Percentage</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" wire:model="percentage">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Duration</label>
                                <div class="col-md-4">
                                    <input type="text" name="" id="" class="form-control input-md" disabled value="7" wire:model="duration">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="is_active" class="col-md-4">Is Active?</label>
                                <div class="col-md-4">
                                    <select class="form-control " id="is_active" name="is_active" wire:model="is_active">
                                        <option value="">Select an option</option>
                                        <option value="true">Yes</option>
                                        <option value="false">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
