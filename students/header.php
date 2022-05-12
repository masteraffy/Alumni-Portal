<style>
    .user-account {
    float: right;
    width: 110px;
    border-left: 0px solid #dd3e2b !important;
    border-right: 0px solid #dd3e2b !important;
    box-sizing: border-box;
    position: relative;
}
.modal-backdrop.show{
    z-index: 10 !important;
}
::placeholder {
  color: #000;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 
    color: #000;
}

::-ms-input-placeholder { /* Microsoft Edge */

    color: #000;
}
.modal-header,.post-project h3 {
    background-color: #007bff!important;
    color: #fff!important;
}
.post-project-fields form ul li button.active, button#changepassBtn, button#changepassBtn:hover {
    background-color: #007bff!important;
    border: 1px solid #007bff!important;
    color: #fff;
}
</style>
<header>
        <div class="container">
        <div class="header-data">
        <div class="logo">
         <a href="home.php" title=""><img src="images/logo.png" alt=""></a>
        
        </div>
        <div style="width:30%; float:left;">
            <h1 style="margin: 5% 0;font-size: 16pt;color:#fff;">Arellano University Alumni Portal</h1>
        </div>
        <nav  style="width:25%">
        <ul>
        <li>
        <a href="home.php" title="">
        <span><img src="images/icon1.png" alt=""></span>
        Home
        </a>
        </li>

        </a>
        <ul>
        <li><a href="companies.html" title="">Companies</a></li>
        <li><a href="company-profile.html" title="">Company Profile</a></li>
        </ul>
        </li>

        <li>
        <a href="posts.php" title="">
        <span><img src="images/icon4.png" alt=""></span>
        Profiles
        </a>
        </li>
        <li>
        <a href="postedJobs.php" title="">
        <span><img src="images/icon5.png" alt=""></span>
        Jobs
        </a>
        </li>

        <li class="d-none">
        <a href="#" title="" class="not-box-open">
        <span><img src="images/icon7.png" alt=""></span>
        Notification
        </a>
        <div class="notification-box noti" id="notification">
        <div class="nt-title">
        <h4>Setting</h4>
        <a href="#" title="">Clear all</a>
        </div>
        <div class="nott-list">
        <div class="notfication-details">
        <div class="noty-user-img">
        <img src="images/resources/ny-img1.png" alt="">
        </div>
        <div class="notification-info">
        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
        <span>2 min ago</span>
        </div>
        </div>
        <div class="notfication-details">
        <div class="noty-user-img">
        <img src="images/resources/ny-img2.png" alt="">
        </div>
        <div class="notification-info">
        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
        <span>2 min ago</span>
        </div>
        </div>
        <div class="notfication-details">
        <div class="noty-user-img">
        <img src="images/resources/ny-img3.png" alt="">
        </div>
        <div class="notification-info">
        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
        <span>2 min ago</span>
        </div>
        </div>
        <div class="notfication-details">
        <div class="noty-user-img">
        <img src="images/resources/ny-img2.png" alt="">
        </div>
        <div class="notification-info">
        <h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
        <span>2 min ago</span>
        </div>
        </div>
        <div class="view-all-nots">
        <a href="#" title="">View All Notification</a>
        </div>
        </div>
        </div>
        </li>
        </ul>
        </nav>
        <div class="menu-btn">
        <a href="#" title=""><i class="fa fa-bars"></i></a>
        </div>
        <div class="user-account">
        <div class="user-info">
        <a href="#" title="" style="font-size:12px;"><?php echo $user["firstname"]." ".$user['lastname'] ?></a>
        </div>
        <div class="user-account-settingss" id="users">


        <h3>Setting</h3>
        <h3 class="tc">                    
            <a class="dropdown-item" id="changepasswordTrigger" href="#" data-toggle="modal" data-target="#changepassword">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Change Password
            </a> 
            <br/>
            <a type="button" class="hideDropdown" data-toggle="modal" data-target="#confirmModal">
                        Logout
            </a>
        </h3>

        <!-- <h3 class="tc"><a href="logout.php" title="">Logout</a></h3> -->
        </div>
        </div>
        </div>
        </div>
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
                    <div class="form-group col-12 mt-3">
                        
                        <label>Current Password:</label> <input type ="hidden"  name="id"  value=<?php  echo $id; ?> class="form-control" placeholder="Enter Current Password">
                        <input type ="password"  name="currentpw" class="form-control" placeholder="Enter Current Name">
                        <br/>
                        <label>New Password:</label>
                        <input type ="password"  name="newpw" id="newpw" class="form-control" placeholder="Enter New Password">
                        <br/>
                        <label>Confirm Password:</label>
                        <input type ="password"  name="confrimpw" id="confrimpw" class="form-control" placeholder="Enter Confirm password">
                    </div>
                </div>
                <div id="errorChange">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
                <button type="submit" name="changepass" id="changepassBtn" class="btn">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>
    <!-- End of Topbar -->

    </header>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        if (window.location.toString().includes("Changepass")) {
            $('#changepassword').modal('show');
            alert("Error occured on updating password")
        }
        if (window.location.toString().includes("Updated")) {
            alert("Password Updated Successfully")
        }
        $("#newpw,#confrimpw").keyup(function(){
            var pass=$("#newpw").val();
            var cpass=$("#confrimpw").val();
            if(pass.length < 5){
                    $("#errorChange").empty();
                    $("#changepassBtn").attr('disabled','disabled');
                    $("#errorChange").append(`
                    <div class="alert alert-danger" role="alert">
                        Password should be more than 6 characters
                    </div>
                    `);
            }
            else{
                if(pass!=cpass){
                    $("#errorChange").empty();
                    $("#changepassBtn").attr('disabled','disabled');
                    $("#errorChange").append(`
                    <div class="alert alert-danger" role="alert">
                        Password and Confirm password doesn't match!
                    </div>
                    `);
                
                }
                else{
                    $("#changepassBtn").removeAttr('disabled');
                    $("#errorChange").empty();
                }
            }
        });
    });
  </script>     