<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-outline-danger rounded-0 shadow-sm"><i class="fas fa-download fa-sm text-danger-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mb-5">
            <div class="card border-left-danger shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Orders</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto text-danger">
                                    <div class="h5 mb-0 font-weight-bold text-danger-800">
                                       <?= Order::count_all(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto text-danger">
                            <i class="fas fa-cash-register fa-2x text-danger-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Earnings (Monthly) Card Example -->
	    <div class="col-md-3 mb-5">
            <div class="card border-left-info shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto text-info">
	                                <div class="h5 mb-0 font-weight-bold text-info-800">
                                        <?= User::count_all(); ?>
	                                </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto text-info">
                            <i class="fas fa-users fa-2x text-info-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-5">
            <div class="card border-left-info shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Roles</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto text-info">
                                    <div class="h5 mb-0 font-weight-bold text-info-800">
                                        <?= Role::count_all(); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto text-info">
                            <i class="fas fa-rocket fa-2x text-info-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	    <div class="col-md-3 mb-5">
		    <div class="card border-left-info shadow h-100 py-2 rounded-0">
			    <div class="card-body">
				    <div class="row no-gutters align-items-center">
					    <div class="col mr-2">
						    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Views</div>
						    <div class="row no-gutters align-items-center">
							    <div class="col-auto text-success">
								    <div class="h5 mb-0 font-weight-bold text-success-800">
                                        <?= $session->count; ?>
								    </div>
							    </div>

						    </div>
					    </div>
					    <div class="col-auto text-success">
						    <i class="fas fa-eye fa-2x text-success-300"></i>
					    </div>
				    </div>
			    </div>
		    </div>
	    </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mt-5">
            <div class="card border-left-primary shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-primary">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Products</div>
                            <div class="h5 mb-0 font-weight-bold text-primary-800">
                                <?= Product::count_all(); ?>
                            </div>
                        </div>
                        <div class="col-auto text-primary">
                            <i class="fas fa-magic fa-2x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mt-5">
            <div class="card border-left-primary shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-primary">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Brands</div>
                            <div class="h5 mb-0 font-weight-bold text-primary-800">
                                <?= Brand::count_all(); ?>
                            </div>
                        </div>
                        <div class="col-auto text-primary">
                            <i class="fas fa-leaf fa-2x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mt-5">
            <div class="card border-left-primary shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-primary">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-primary-800">
                                <?= Categorie::count_all(); ?>
                            </div>
                        </div>
                        <div class="col-auto text-primary">
                            <i class="fas fa-palette fa-2x text-primary-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-md-3 mt-5">
            <div class="card border-left-success shadow h-100 py-2 rounded-0">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-success">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Comments</div>
                            <div class="h5 mb-0 font-weight-bold text-success-800">
                                <?= Comment::count_all(); ?>
                            </div>
                        </div>
                        <div class="col-auto text-success">
                            <i class="fas fa-comments fa-2x text-success-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-12">
            <div id="piechart" style="width:900px; height:500px;">

            </div>

            <div>
                <?=  $session->count;  ;?>
            </div>
        </div>
    </div>



    <!-- Content Row -->

</div>
<!-- /.container-fluid -->
