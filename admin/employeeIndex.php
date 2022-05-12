<?php 

include('security.php');
include('../includes/header.php');
include('../includes/navbar.php');
?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <!-- <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> -->
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                         <div class="col-xl-6 col-md-6 mb-4">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line");
                                    let numbers=[];
                                    var myLineChart = new Chart(ctx, {
                                        type: 'pie',
                                        <?php 
                                            $query = "SELECT
                                            interest,
                                            COUNT(*) AS total,
                                            SUM(
                                                CASE WHEN currentlyEmp = 'No' THEN 1 ELSE 0
                                            END
                                        ) AS Unemployed,
                                        SUM(
                                            CASE WHEN currentlyEmp = 'Yes' THEN 1 ELSE 0
                                        END
                                        ) AS Employed,
                                        SUM(
                                            CASE WHEN currentlyEmp = 'Self employed' THEN 1 ELSE 0
                                        END
                                        ) AS Self,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'No' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS UnemployedRate,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'Yes' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS EmployedRate,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'Self employed' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS Self
                                        FROM
                                            studentforms
                                         left JOIN
                                         students
                                         on studentforms.studID = students.id
                                        WHERE interest =".$user['BranchId'];
                                            $query_run = mysqli_query($connection, $query);
                                        ?>
                                    data: {
                                        labels: ['Employed', 'Unemployed','Self Employed'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: <?php 
                                                      while($row = mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "[".($row["EmployedRate"]).",".($row["UnemployedRate"]).",".($row["Self"])."]";
                                                        }
                                                        ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(34, 22, 225, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(34, 22, 225, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                        options: {     
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        userCallback: function(label, index, labels) {
                                                            // when the floored value is the same as the value we have a whole number
                                                            if (Math.floor(label) === label) {
                                                                return label;
                                                            }

                                                        },
                                                    }
                                                }],
                                            },
                                            title: {
                                                display: true,
                                                text: 'Employment Status regarding on this Department'
                                            }
                                        }
                                        
                                    });
                                });
                            </script>
                            <div class="page-content page-container" id="page-content">
                                <div class="padding">
                                    <div class="row">
                                        <div class="container-fluid d-flex justify-content-center">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">Pie Chart</div>
                                                    <div class="card-body" style="height: 100%">
                                                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                            </div>
                                                        </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                         <!-- <div class="col-xl-6 col-md-6 mb-4">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line");
                                    let numbers=[];
                                    var myLineChart = new Chart(ctx, {
                                        type: 'pie',
                                        <?php 
                                            $query = "SELECT
                                            interest,
                                            COUNT(*) AS total,
                                            SUM(
                                                CASE WHEN currentlyEmp = 'No' THEN 1 ELSE 0
                                            END
                                        ) AS Unemployed,
                                        SUM(
                                            CASE WHEN currentlyEmp = 'Yes' THEN 1 ELSE 0
                                        END
                                        ) AS Employed,
                                        SUM(
                                            CASE WHEN currentlyEmp = 'Self employed' THEN 1 ELSE 0
                                        END
                                        ) AS Self,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'No' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS UnemployedRate,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'Yes' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS EmployedRate,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN currentlyEmp = 'Self employed' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS Self
                                        FROM
                                            studentforms
                                        LEFT JOIN students ON studentforms.studID = students.id
                                        where interest =".$user['BranchId'];;
                                            $query_run = mysqli_query($connection, $query);
                                        ?>
                                    data: {
                                        labels: ['Employed', 'Unemployed'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: <?php 
                                                      while($row = mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "[".($row["EmployedRate"]).",".($row["UnemployedRate"])."]";
                                                        }
                                                        ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                        options: {     
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        userCallback: function(label, index, labels) {
                                                            // when the floored value is the same as the value we have a whole number
                                                            if (Math.floor(label) === label) {
                                                                return label;
                                                            }

                                                        },
                                                    }
                                                }],
                                            },
                                            title: {
                                                display: true,
                                                text: ''
                                            }
                                        }
                                        
                                    });
                                });
                            </script>
                            <div class="page-content page-container" id="page-content">
                                <div class="padding">
                                    <div class="row">
                                        <div class="container-fluid d-flex justify-content-center">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">Employement Status</div>
                                                    <div class="card-body" style="height: 100%">
                                                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                            </div>
                                                        </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line1");
                                    let numbers=[];
                                    var myLineChart = new Chart(ctx, {
                                        type: 'pie',
                                        <?php 
                                            $query = "SELECT
                                            interest,
                                            COUNT(*) AS total,
                                            ROUND(
                                                (
                                                    (
                                                        SUM(
                                                            CASE WHEN courseRelated = 'Yes' THEN 1 ELSE 0
                                                        END
                                                    ) / COUNT(*)
                                                ) * 100
                                            ),
                                            2
                                        ) AS related,
                                        ROUND(
                                            (
                                                (
                                                    SUM(
                                                        CASE WHEN courseRelated = 'No' THEN 1 ELSE 0
                                                    END
                                                ) / COUNT(*)
                                            ) * 100
                                        ),
                                        2
                                        ) AS notRelated
                                        FROM
                                            studentforms
                                        LEFT JOIN students ON studentforms.studID = students.id
                                        WHERE interest =".$user['BranchId'];
                                            $query_run = mysqli_query($connection, $query);
                                        ?>
                                    data: {
                                        labels: ['Related', 'Not Related'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: <?php 
                                                      while($row = mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "[".($row["related"]).",".($row["notRelated"])."]";
                                                        }
                                                        ?>,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                        options: {     
                                            scales: {
                                                yAxes: [{
                                                    ticks: {
                                                        beginAtZero: true,
                                                        userCallback: function(label, index, labels) {
                                                            // when the floored value is the same as the value we have a whole number
                                                            if (Math.floor(label) === label) {
                                                                return label;
                                                            }

                                                        },
                                                    }
                                                }],
                                            },
                                            title: {
                                                display: true,
                                                text: 'Jobs Attained Related to their Degrees'
                                            }
                                        }
                                        
                                    });
                                });
                            </script>
                            <div class="page-content page-container" id="page-content">
                                <div class="padding">
                                    <div class="row">
                                        <div class="container-fluid d-flex justify-content-center">
                                            <div class="col-sm-12 col-md-12">
                                                <div class="card">
                                                    <div class="card-header">Job Related to degree Status</div>
                                                    <div class="card-body" style="height: 100%">
                                                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                            </div>
                                                        </div> <canvas id="chart-line1" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Total Number Of Employee -->
                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Alumni
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM students";
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

                        <!-- Total Number Of Admin -->
                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Admin
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM admin";
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
                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Number Of Employee
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM staff";
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
                        <!-- Total Numbers of Admin Content Posted (Announcements / Updates) -->
                        <div class="col-xl-6 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Numbers of Admin Content Posted (Announcements / Updates)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent !='Jobs' 
                                                             AND UserType = 'Administrator' ";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-sbts2018-blue-sbts2018/344/external-comment-social-media-basic-1-sbts2018-blue-sbts2018.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of Admin Content Posted (Announcements / Updates) -->
                        <div class="col-xl-6 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Numbers of Admin Content Posted (Announcements / Updates)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent ='Jobs' 
                                                             AND UserType = 'Administrator' ";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-job-recruitment-agency-flaticons-lineal-color-flat-icons-2.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of Employee Content Posted (Announcements / Updates) -->
                        <div class="col-xl-6 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Numbers of Employee Content Posted (Announcements / Updates)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent !='Jobs' 
                                                             AND UserType = 'Employee' ";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-sbts2018-blue-sbts2018/344/external-comment-social-media-basic-1-sbts2018-blue-sbts2018.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of Employee Job Posted -->
                        <div class="col-xl-6 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Numbers of Employee Job Posted
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent ='Jobs' 
                                                             AND UserType = 'Employee' ";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/344/external-job-recruitment-agency-flaticons-lineal-color-flat-icons-2.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of User (Alumni) Content Posted -->
                        <div class="col-xl-12 col-md-12 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Total Numbers of User (Alumni) Content Posted
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent !='Jobs' 
                                                             AND UserType = 'Alumni' ";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-sbts2018-blue-sbts2018/344/external-comment-social-media-basic-1-sbts2018-blue-sbts2018.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Total Numbers of User (Alumni) Employed -->
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a href="employed.php">
                                                Total Numbers of User (Alumni) Employed
                                            </a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM students
                                                             WHERE CurrentWork !=' '
                                                                AND  interest =".$user['BranchId'];
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/external-soft-fill-juicy-fish/344/external-self-digital-nomad-soft-fill-soft-fill-juicy-fish.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of User (Alumni) Unemployed -->
                        <div class="col-xl-6 col-md-6 mb-4" >
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a href="unemployed.php">Total Numbers of User (Alumni) Unemployed</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM students
                                                             WHERE CurrentWork =''
                                                             AND  interest =".$user['BranchId'];
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/color/344/look-for.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of User (Alumni) Unemployed -->
                        <div class="col-xl-6 col-md-6 mb-4" >
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a>Total Numbers of Alumni in this Department</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $userDept = $user['DepartmentId'];
                                                    $query = "SELECT * FROM `students`
                                                    left join course
                                                    on students.courseGraduated = course.id
                                                    left join departments
                                                    on departments.id = course.dep_id
                                                    where departments.id = '$userDept'
                                                    and interest =".$user['BranchId'];
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    
                                                    echo '<h1>' .$row.  '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/ios-glyphs/30/000000/men-age-group-5.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Total Numbers of User (Alumni) Unemployed -->
                        <div class="col-xl-6 col-md-6 mb-4" >
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a>Total-Content Posted by this Department (Announcement / Events)</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';
                                                    $query = "SELECT * FROM `staff`
                                                    left join events
                                                    on staff.Id = events.CreatedUser
                                                    where TypeOfContent != 'Jobs'
                                                    and staff.DepartmentId = '$userDept'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/ios-glyphs/30/000000/men-age-group-5.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 col-md-12 mb-4" >
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            <a>Total-Content Posted by this Department (Job Postings)</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';
                                                    $query = "SELECT * FROM `staff`
                                                    left join events
                                                    on staff.Id = events.CreatedUser
                                                    where TypeOfContent = 'Jobs'
                                                    and staff.DepartmentId = '$userDept'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <img width="32px" src="https://img.icons8.com/ios-glyphs/30/000000/men-age-group-5.png"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Total Number Of Content Management Post -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Number Of Content Management(POST)
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT id FROM books
                                                            WHERE status != '0'
                                                            ORDER BY id";
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
                         -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

<?php 
include('../includes/scripts.php');
?>
