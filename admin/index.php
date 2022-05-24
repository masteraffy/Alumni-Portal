<?php 
include "../dbconfig.php";
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


                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                               <u> <a href="alumni.php" class="link-primary"> Total Number Of Alumni </a></u> 
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
                                        <i class="fa-solid fa-graduation-cap fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                            <u> <a href="register.php" class="link-primary"> Total Number Of Admin </a></u> 
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM staff where userData ='Administrator'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-user-tie fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
   
                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                            <u> <a href="employee.php" class="link-primary"> Total Number Of Employee </a></u> 
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM staff where userData ='Employee'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-users fa-2xl"></i>
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
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                            <u> <a href="announcement.php" class="link-primary"> Total Content Posted </a></u> 
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent !='Jobs' AND AllowPost = 'Approved'";
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

                        <div class="col-xl-6 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                            <u> <a href="jobPost.php" class="link-primary"> Total Number of Job Posted</a></u> 
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE TypeOfContent ='Jobs'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-briefcase fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-12 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-primary text-uppercase mb-1">
                                            <u><a href="approve.php" class="link-primary"> Pending Posts of Alumni </a></u>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    require '../dbconfig.php';

                                                    $query = "SELECT * FROM events
                                                             WHERE AllowPost ='Pending'";
                                                    $query_run = mysqli_query($connection, $query);

                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h1>' .$row. '</h1>';

                                                ?>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-clock fa-2xl"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        
                        
                        
                        <!-- Total Numbers of User (Alumni) Employed 
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
                                                /*
                                                    require '../dbconfig.php';

                                                    if($user['userData'] == "Employee"){
                                                        
                                                        $query = "SELECT * FROM students
                                                        WHERE CurrentWork !='' 
                                                        AND  interest =".$user['BranchId'];
                                                        $query_run = mysqli_query($connection, $query);

                                                        $row = mysqli_num_rows($query_run);
                                                    }
                                                    else{
                                                        $query = "SELECT * FROM students
                                                                 WHERE CurrentWork !=''";
                                                        $query_run = mysqli_query($connection, $query);
    
                                                        $row = mysqli_num_rows($query_run);

                                                    }
                                                    echo '<h1>' .$row. '</h1>';
                                                */
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
                        -->
                        <!-- Total Numbers of User (Alumni) Unemployed
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
                                                /*
                                                    require '../dbconfig.php';

                                                    if($user['userData'] == "Employee"){
                                                        
                                                        $query = "SELECT * FROM students
                                                        WHERE CurrentWork ='' 
                                                        AND  interest =".$user['BranchId'];
                                                        $query_run = mysqli_query($connection, $query);

                                                        $row = mysqli_num_rows($query_run);
                                                    }
                                                    else{
                                                        $query = "SELECT * FROM students
                                                                 WHERE CurrentWork =''";
                                                        $query_run = mysqli_query($connection, $query);
    
                                                        $row = mysqli_num_rows($query_run);

                                                    }
                                                    echo '<h1>' .$row. '</h1>';
                                                    */
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
                         -->


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
                        <div class="col-xl-4 col-md-4 mb-4" style="<?php echo "display:".$display ?>">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line");
                                    let numbers=[];
                                    var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        <?php 
                                            $query = "Select batch.Description, count(batch.Description) as Count from batch 
                                            left join students
                                            on students.id = batch.Description
                                            where batch.Description != ' '
                                            GROUP by batch.Description;";
                                            $query_run = mysqli_query($connection, $query);
                                            
                                        ?>
                                         <?php
                                                ?>
                                            
                                                    
                                                    data: {
                                                        labels: <?php 
                                                            
                                                            $data=array(" ");
                                                            $count=array("0");
                                                            while($row = mysqli_fetch_assoc($query_run))
                                                                {
                                                                    $a = $row["Description"];
                                                                    $b = $row['Count'];
                                                                    array_push($data,$a);
                                                                    array_push($count,$b);
                                                                }
                                                                
		                                                        echo json_encode(($data));
                                                                $counter = json_encode(($count));
                                                                $counter = str_replace('"','', (string) $counter);
                                                               
                                                                ?>,
                                                            
                                                            datasets: [

                                                                {
                                                                label: 'No. of Graduates',
                                                                data: <?php echo $counter; ?>,
                                                                // data: [2, 3, 2],
                                                                backgroundColor: "rgba(153,255,51,0.6)"
                                                                }
                                                                
                                                            ]
                                                    },
                                                <?php
                                            
                                        ?>
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
                                                text: 'Graduates per Batch'
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
                                                    <div class="card-header">Graph</div>
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
                        <div class="col-xl-4 col-md-6 mb-4"  style="<?php echo "display:".$display ?>">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line1");
                                    let numbers=[];
                                    var myLineChart = new Chart(ctx, {
                                        type: 'line',
                                        <?php 
                                            $query = "SELECT schoolAttended, count(*) as perBranch FROM `students` 
                                            WHERE schoolAttended != ' '
                                            GROUP by schoolAttended;";
                                            $query_run = mysqli_query($connection, $query);
                                            
                                        ?>
                                         <?php
                                                ?>
                                            
                                                    
                                                    data: {
                                                        labels: <?php 
                                                            
                                                            $data=array(" ");
                                                            $count=array("0");
                                                            while($row = mysqli_fetch_assoc($query_run))
                                                                {
                                                                    $a = $row["schoolAttended"];
                                                                    $b = $row['perBranch'];
                                                                    array_push($data,$a);
                                                                    array_push($count,$b);
                                                                }
                                                                
		                                                        echo json_encode(($data));
                                                                $counter = json_encode(($count));
                                                                $counter = str_replace('"','', (string) $counter);
                                                               
                                                                ?>,
                                                            
                                                            datasets: [

                                                                {
                                                                label: 'No. of Graduates',
                                                                data: <?php echo $counter; ?>,
                                                                // data: [2, 3, 2],
                                                                backgroundColor: "rgba(153,255,51,0.6)"
                                                                }
                                                                
                                                            ]
                                                    },
                                                <?php
                                            
                                        ?>
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
                                                text: 'Graduates per Branch'
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
                                                    <div class="card-header">Graph</div>
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
                       
                        <div class="col-xl-4 col-md-6 mb-4">
                            <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
                            <script>

                                $(document).ready(function() {
                                    var ctx = $("#chart-line2");
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
                                        LEFT JOIN students ON studentforms.studID = students.id";
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
                                                text: 'Employment Status'
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
                                                        </div> <canvas id="chart-line2" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                                    </div>
                                                </div>
                                            </div>
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
include('../includes/scripts.php');
?>
