<div>

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
                font-size: 2rem;
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

        <style>
            /* Set a fixed height for the sidebar and add some padding */
            .sidebar {
            height: 100%;
            padding: 20px;
            }

            /* Add a background color and some padding to the links */
            .sidebar a {
            display: block;
            padding: 10px;
            background-color: #f8f9fa;
            color: #333;
            }

            /* Change the background color on hover */
            .sidebar a:hover {
            background-color: #e9ecef;
            }

            /* Style the active link */
            .sidebar .active {
            background-color: #007bff;
            color: #fff;
            }
        </style>

        <div class="row">
            <div class="col-lg-3 col-sm-12">
                <div class="container">
                    <div class="sidebar">
                        <a class="active" href="#">Home</a>
                        <a href="#">Company Details</a>
                        <a href="#">Users / Admins</a>
                        <a href="{{ route('admin.investment-plans')}}">Investment Plans</a>
                      </div>
                </div>
            </div>

            <div class="col-lg-9 col-sm-12">
                <div class="container">
                    <div class="row">
                        <div class=" col-sm-6 col-lg-4">
                          <div class="icon-stat">
                            <div class="row">
                              <div class="col-xs-8 text-left">
                                <span class="icon-stat-label">Deposits Today</span>
                                <span class="icon-stat-value">{{$depositToday}} USDT</span>
                              </div>
                              <div class="col-xs-4 text-center right">
                                <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
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
                                  <span class="icon-stat-value">$0</span>
                                </div>
                                <div class="col-xs-4 text-center right">
                                  <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
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
                                  <span class="icon-stat-value">$0</span>
                                </div>
                                <div class="col-xs-4 text-center right">
                                  <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
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
                                <span class="icon-stat-value">0</span>
                              </div>
                              <div class="col-xs-4 text-center">
                                <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
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
                                <span class="icon-stat-value">$0</span>
                              </div>
                              <div class="col-xs-4 text-center">
                                <i class="fa fa-dollar icon-stat-visual bg-primary"></i>
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
                                <span class="icon-stat-value">0</span>
                              </div>
                              <div class="col-xs-4 text-center">
                                <i class="fa fa-gift icon-stat-visual bg-secondary"></i>
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
                    <div class="cta-box bg-white">
                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="card-title">Pending Deposits</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>A</th>
                                                <th>B</th>
                                                <th>C</th>
                                                <th>D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="cta-box bg-white">
                        <div class="col-md-12">
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="card-title">Pending Withdrawals</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>A</th>
                                                <th>B</th>
                                                <th>C</th>
                                                <th>D</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                            <tr>
                                                <td>1</td>
                                                <td>2</td>
                                                <td>3</td>
                                                <td>4</td>
                                            </tr>

                                        </tbody>
                                    </table>
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
