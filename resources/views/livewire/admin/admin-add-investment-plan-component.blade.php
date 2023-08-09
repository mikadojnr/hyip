<div>
    <!-- START Section Page Title -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-uppercase mb-4 c-white">Staking Plan</h2>
                    <ul class="breadcrumb mb-0 justify-content-center">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.investment-plans')}}">Staking Plans</a></li>
                        <li class="breadcrumb-item active">Add Staking Plans</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- END Section Page Title -->}




    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert"><strong>{{Session::get('message')}}</strong></div>

        @endif

        <div class="col-lg-12 col-sm-12">
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

                                <form class="form-horizontal" wire:submit.prevent="storePlan">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Plan Name</label>
                                        <div class="col-md-4">
                                            <input type="text" name="" id="" class="form-control input-md" wire:model="name" autofocus>
                                            @error('name')
                                                <strong class="text-danger">{{$message}}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Price</label>
                                        <div class="col-md-4">
                                            <input type="text" name="" id="" class="form-control input-md" wire:model="price">
                                            @error('price')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Percentage</label>
                                        <div class="col-md-4">
                                            <input type="text" name="" id="" class="form-control input-md" wire:model="percentage">
                                            @error('percentage')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="col-md-4 control-label">Duration</label>
                                        <div class="col-md-4">
                                            <select class="form-control " id="is_active" name="is_active" wire:model="duration">
                                                <option value="">Select an option</option>
                                                <option value="7">Seven Days</option>
                                            </select>
                                            @error('duration')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_active" class="col-md-4">Is Active?</label>
                                        <div class="col-md-4">
                                            <select class="form-control " id="is_active" name="is_active" wire:model="is_active">
                                                <option value="">Select an option</option>
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                            </select>
                                            @error('is_active')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
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
    </div>
</div>
