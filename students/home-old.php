<?php
  include('security.php');
  include "../dbconfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../style1.css" />
    
    
    
</head>
<body>
<div class="big-wrapper light">
        <img src="./img/shape.png" alt="" class="shape" />

        <header>
          <div class="container">
            <div class="logo">
              
              <h3>Al Trace It</h3>
            </div>
            
            <div class="links">
              <ul>
                <li>
                  <a href="home.php">
                    <div class="col">
                      <i class="fa fa-keyboard" aria-hidden="true"></i>                                                               
                        Home
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="col">
                      <i class="fa fa-briefcase" aria-hidden="true"></i>                                                               
                        Jobs
                    </div>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <div class="col">
                      <i class="fa fa-bell" aria-hidden="true"></i>                                                               
                        Notifications
                    </div>
                  </a>
                </li>
                <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                    
                    <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
                
            </li>
              </ul>
            </div>
            
          

            <div class="overlay"></div>

            <div class="hamburger-menu">
              <div class="bar"></div>
            </div>
          </div>
        </header>

        <div class="container">
        <div class="row profile">
            <div class="col-md-3">
                <div class="profile-sidebar">
                    <!-- SIDEBAR USERPIC -->
				    <div class="profile-userpic">
                        <img src="https://static.change.org/profile-img/default-user-profile.svg" class="img-responsive" alt="">
                    </div>
                    <!-- END SIDEBAR USERPIC -->
				    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                        
                        <?php echo $_SESSION['email']; ?>
                        
                          
                        </div>
					<div class="profile-usertitle-job">
						USERs
					</div>
				</div>
                <!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<button type="button" class="btn btn-success btn-sm">My Profile</button>
				</div>
                <!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
                
				<!-- END MENU -->
      </div>
    </div>
      
            <div class="col-md-9">              
                    <div id="content-wrapper" class="d-flex flex-column">
                    
                      <!-- Topbar Search -->
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-2 small" placeholder="What's on your mind, Joshua?"
                                aria-label="Search" aria-describedby="basic-addon2">
                                
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                                </button>
                            </div>
                            
                                
                        </div>
                        <div class="container">
                                  <div class="row">
                                    <div class="col">
                                    <i class="fa fa-keyboard" aria-hidden="true"></i>                                                               
                                     Text
                                  </div>
                                    <div class="col">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                      Event
                                    </div>
                                    <div class="col">
                                    <i class="fa fa-align-justify" aria-hidden="true"></i>
                                      Write article
                                    </div>
                                  </div>
                                </div>
                    </form>
                  </div>
                  
                      <br>
                      <br>
                      <div class="col-md-12">
                                <?php

                                  $sql = "SELECT title, description, date, time, createdby FROM tblcontent";
                                  $result = mysqli_query($connection, $sql);
                                  
                                  if ($result->num_rows > 0)
                                  {
                                    while($row = $result->fetch_assoc())
                                    {
                                      
                                      echo '<div class="card-header"><i class="fa fa-user-circle" aria-hidden="true"></i> ' .$row["createdby"]. " (<i>".$row["date"]. " ".$row["time"].") </i><br>Title: <b>" .$row["title"]. "</b> <br><br>" . $row["description"]. '</div>' ;
                                      echo "<br>";
                                    }
                                  }
                                  
                                ?>
                      
                        
                       <br>
                       <br>                        
                       <br>
                       <br>
                       <br>
                       <br>                        
                       <br>
                       <br>
                       <br>

                        
                      </div>
                      </div>
                      <br>
                      <br>
                      
                     

                      
                      

                      
                       
            </div>
            
            

        
  </div>  
    
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="./app.js"></script>
     <!-- Bootstrap core JavaScript-->
 <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>
</html>


