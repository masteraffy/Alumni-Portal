<?php 

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Number Of Admin -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Admin
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require 'dbconfig.php';

                                                    $query = "SELECT * FROM register WHERE usertype ='admin'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/ios-glyphs/30/000000/men-age-group-5.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Number Of Employee -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Employee
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require 'dbconfig.php';

                                                    $query = "SELECT * FROM register WHERE usertype ='employee'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/ios-glyphs/30/000000/men-age-group-5.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Number Of Alumni -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Employee
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require 'dbconfig.php';

                                                    $query = "SELECT * FROM register WHERE usertype ='user'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/ios-filled/50/000000/graduation-cap.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Number Of Content Management Post -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Number Of Content Management(POST)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    require 'dbconfig.php';

                                                    $query = "SELECT id FROM tblcontent ORDER BY id";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/ios/50/000000/post-office.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Number Of Pending Requests For Alumni -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests For Alumni
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                500
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/64/000000/external-request-graph-design-kiranshastry-lineal-kiranshastry.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<?php 
include('includes/footer.php');
include('includes/scripts.php');
?>
