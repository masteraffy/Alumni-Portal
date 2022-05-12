<?php 

$display;
$redirect;
if($user['userData'] === "Employee"){
    $display = "none";
    $redirect = "employeeIndex.php";
}
else{
    $display = "unset";
    $redirect = "index.php";
}


?>
 
 
 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $redirect; ?>">

    <div class="sidebar-brand-text mx-3">ALUMNI PORTAL</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo $redirect; ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Content Management -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContent"
        aria-expanded="true" aria-controls="collapseContent">
        <i class="fa fa-clipboard"></i>
        <span>Content Management</span>
    </a>
    <div id="collapseContent" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="announcement.php">Announcements & Events</a> 
            <a class="collapse-item" href="jobPost.php">Job Postings</a>
            <a class="collapse-item" href="approve.php" style="<?php echo "display:".$display ?>">Approve Postings</a>             
        </div>
    </div>
</li>


<!-- Nav Item - Content Mangement -->
<!-- <li class="nav-item">
    <a class="nav-link" href="cms.php">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Content Management</span></a>
</li> -->

<!-- Nav Item - Alumni Management -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa fa-graduation-cap"></i>
        <span>Alumni Management</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Alumni Records:</h6>
            <a class="collapse-item" href="alumni.php">View Records</a>      
        </div>
    </div>
</li>

<!-- Nav Item - Employee Management -->
<li class="nav-item" style="<?php echo "display:".$display ?>">
    <a class="nav-link collapsed" href="employee.php" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fa fa-users"></i>
            <span>Employee Management</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="employee.php">View Employee</a>
                        
            <!-- <div class="collapse-divider"></div>
                <h5 class="collapse-header">Assigning to Department</h5>
                <a class="collapse-item" href="employee_assign.php">Assign</a>                       
            </div> -->
        </div>
</li>

<li class="nav-item"  style="<?php echo "display:".$display ?>">
    <a class="nav-link" href="register.php">
        <i class="fa fa-user"></i>
        <span>Admin Management</span></a>
</li>

<!-- Nav Item - Employee Management -->
<li class="nav-item" style="<?php echo "display:".$display ?>">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#utility"
        aria-expanded="true" aria-controls="utility">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utility</span>
    </a>
    <div id="utility" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Branch Setup:</h6>
                 <a class="collapse-item" href="Branch.php">Branch</a> 
                <h6 class="collapse-header">Department Setup:</h6>
                 <a class="collapse-item" href="Department.php">Department</a> 
                <h6 class="collapse-header">Course Setup:</h6>
                 <a class="collapse-item" href="Course.php">Course</a> 
        </div>
    </div>
</li>

<li class="nav-item" style="<?php echo "display:".$display ?>">
    <a class="nav-link" href="logs.php">
        <i class="fa fa-cogs"></i>
        <span>System Logs</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search 
        <form
            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>-->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                        <?php
                        if($user['userData'] === "Employee")
                        {
                            echo $user['FirstName']." ".$user['MiddleName']." ".$user['LastName']." | ".$user['userData']." | ".$user['Branch_Name']." - ".$user['Branch_Address']." | ".$user['Department_Name'];
                        }
                        else
                        {
                            echo $user['FirstName']." ".$user['MiddleName']." ".$user['LastName']." | ".$user['userData']." | Alumni Serivce Department";
                        }
                           
                        ?>
                    </span>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" id="changepasswordTrigger" href="#" data-toggle="modal" data-target="#changepassword">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </a> 
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>

    <!-- Modal -->
<div class="modal fade bd-example-modal-md" id="changepassword" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form method="POST" action="code.php">
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-12">
                        
                                <?php
                                
                                if(isset($_SESSION['error'])){
                                    echo "
                                    <div class='alert alert-danger'>
                                        ".$_SESSION['error']."
                                    </div>
                                    ";
                                    unset($_SESSION['error']);
                                }
                            ?>
                        <label>Current Password:</label> <input type ="hidden"  name="id"  value=<?php  echo $user['Id']; ?> class="form-control" placeholder="Enter Current Password">
                        <input type ="password"  name="currentpw" class="form-control" placeholder="Enter Current Name" required>
                        <label>New Password:</label>
                        <input type ="password"  name="newpw" id="newpw" class="form-control" placeholder="Enter New Password" required>
                        <label>Confirm Password:</label>
                        <input type ="password"  name="confrimpw" id="confrimpw" class="form-control" placeholder="Enter Confirm password" required>
                    </div>
                </div>
                <div id="errorChange">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="changepass" id="changepassBtn" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
    <!-- End of Topbar -->


<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    

 