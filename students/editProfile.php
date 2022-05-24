<?php
  include('security.php');
  include "../dbconfig.php";
  $email = $_SESSION['email'];
  $query = "SELECT *, students.id as userID 
            From students 
            LEFT JOIN course
            ON students.courseGraduated = course.id
            WHERE email  = '$email' ";
  $query_run = mysqli_query($connection, $query);
  $user = mysqli_fetch_array($query_run);
  $id = $user['userID'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Hello! <?php echo $user["firstname"]; ?> </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="css/animate.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/responsive.css">

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<style>
    .col-4 {
        -ms-flex: 0 0 33% !important;
        flex: 0 0 33% !important;
        max-width: 33% !important;
    }
    .custom-breadcrumb{
    list-style:none;
    overflow: hidden;
}

.custom-breadcrumb li {
    text-decoration: non    e; 
    padding: 10px 30px 10px 40px;
    position: relative; 
    display: block;
    float: left;
}

.custom-breadcrumb li:after {
    content: " ";
    display: block;
    width: 0;
    height: 0;
    border-top: 50px solid transparent;
    border-bottom: 50px solid transparent;
    position: absolute;
    top: 50%;
    margin-top: -50px;
    left: 100%;
    z-index: 2;
}

.custom-breadcrumb li:before {
    content: " "; 
  display: block; 
  width: 0; 
  height: 0;
  border-top: 50px solid transparent;       
  border-bottom: 50px solid transparent;
  border-left: 30px solid white;
  position: absolute;
  top: 50%;
  margin-top: -50px; 
  margin-left: 1px;
  left: 100%;
  z-index: 1;
}

.blue-crumb{
    background-color: #2980b9;
    color: white;
}
.blue-crumb:after{
    border-left:30px solid #2980b9;
}

.gray-crumb{
    background-color: #bdc3c7;
}
.gray-crumb:after{
    border-left: 30px solid #bdc3c7;
}

.light-blue-crumb:after{
    border-left:30px solid #3498db;
}
.light-blue-crumb{
    background: #3498db;
    color: white;
}

.faded-crumb:after{
    border-left:30px solid #ecf0f1;
}

.faded-crumb{
    background: #ecf0f1;
    color: #95a5a6;
}

.current {
    
}

</style>
<body>
<div class="wrapper">

<?php include("header.php"); ?>



<div class="cp-sec">
<!-- <p><img src="images/cp.png" alt="">Copyright Alumni Service and 2022</p> -->
</div>

<div class="container">
    <div class="main-ws-sec">
        <div class="card mt-2 p-5">
            
            <h2>Update / Edit Profile</h2>
            <div class="container">
                <div class="row">
                    <ul class="custom-breadcrumb">
                        <li class="light-blue-crumb">
                           <a href="editProfile.php" style="color:#fff;">General Information</a>
                        </li>
                        <li class="light-blue-crumb">
                            <a href="employementEdit.php" style="color:#fff;"> Employment Information</a>
                        </li>
                        <li class="blue-crumb current p-0" > </li>
                    </ul>
                </div>
            </div>
            <div class="row d-block p-3">
            <form action="edit_function.php" method="POST" enctype="multipart/form-data">
                    <?php if (isset($_GET['error'])) 
                    { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php
                    } ?>
                    <?php if (isset($_GET['success'])) 
                    { ?>
                        <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php
                    } ?>
                        <input name="id" type="hidden" value=<?php echo $user['userID'] ?> />
                        <div class="row">
                            <div class=" col-12 p-0" style="display:block">
                                <img width="250" height="250" alt="Image not Found" src=<?php 
                                    if($user['photo']){
                                     echo $user['photo'];
                                    }
                                    else{
                                        echo "profilePic/userPic.jpg";
                                    }
                                ?> />
                                <label for="exampleFormControlFile1" class="ml-3">Change Profile Picture </label>
                                <br>
                                &nbsp  &nbsp<input type="hidden" class="form-control-file" id="fetch exampleFormControlFile1" name="fetch" value="<?php echo $user['photo']?>" />

                                <input type="file" id="file" name="file" />
                            </div>
                        </div>
                        <hr style="color:solid-black">
                        <div class="row mt-3">
                            <div class="h2">Basic Information</div>
                        </div>
                            <div class="form-group">
                                <div class="row-md-12">
                                    <div>
                                        <div class="col-md-12">
                                        <label for="validationCustom01 class="ml-2">Bio</label>
                                        <input type="text" class="form-control" name="bio" value="<?php echo $user['bio']?>" tabindex="1" id="validationCustom01" placeholder ="Add Bio (Optional)" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstname" value="<?php echo $user['firstname']?>" placeholder="Enter Your First Name" class="form-control" tabindex="2" required>
                                        </div>

                                        <div class="col-4">
                                            <label for="">Middle Name </label>
                                            <input type="text" name="middlename" value="<?php echo $user['middleName']?>" placeholder="Enter Your Middle Name" class="form-control" tabindex="3" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lastname" value="<?php echo $user['lastname']?>" placeholder="Enter Your Last Name" class="form-control" tabindex="4" required>
                                        </div>
                                </div>

                                <div class="form-group">
                                    <div class="row mt-3">
                                        <div class="col-4">
                                                <label for="">Date of Birth</label>
                                                <input type="date" name="birthday" value="<?php echo $user['birthday']?>" placeholder="State your Date of Birth" class="form-control" tabindex="5" required>
                                        </div>
                                        <div class="col-4">
                                                <label for="">Gender</label>
                                                <select name="gender" required id="" tabindex="6" class="form-control" placeholder="What is your Gender">
                                                    <option disable selected hidden><?php echo $user['gender']?></option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                        </div>
                                        <div class="col-4">
                                                <label for="">Civil Status</label>
                                                <select name="studStatus" required id="" tabindex="6" class="form-control" placeholder="What is your Civil Status? ">
                                                    <option disable selected hidden> <?php echo $user['studStatus']?></option>
                                                    <option value="Single">Single</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Separated">Separated</option>
                                                    <option value="Widow / Widower">Widow / Widowe</option>
                                                    <option value="Single Parent">Single Parent</option>
                                                </select>
                                        </div>
                                    </div>
                                </div>

                        <div class="row mt-4">
                            <div class="h2">Contact Information</div>
                        </div>
                        
                            <div class="form-group">
                                <div class="row mt-3">                                   
                                    <div class="col-4">
                                        <label for="" class="form-label">Email</label>
                                         <input type="email" name="email" value="<?php echo $user['email']?>"  placeholder="Enter your Email" class="form-control" tabindex="7" required>
                                    </div>
                                    <div class="col-4">
                                        <label for="">Contact Number</label>
                                         <input type="text" name="contact" value="<?php echo $user['contact']?>" placeholder="Enter your Contact Number" class="form-control" tabindex="8" required>
                                    </div>  
                                    <div class="col-4">
                                        <label for="">Work Contact Number</label>
                                         <input type="text" name="employerNo" value="<?php echo $user['employerNo']?>" placeholder="Enter your Contact Number" class="form-control" tabindex="9" required>
                                    </div>                             
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row mt-3">
                                    <div class="col-12">        
                                        <label for="">Present Address</label>
                                         <input type="text" name="presentAddress" value="<?php echo $user['presentAddress']?>"  placeholder="Enter your Present Address" class="form-control" tabindex="10" required>         
                                    </div>
                                    <div class="col-12 mt-3">        
                                        <label for="">Mailing Address</label>
                                         <input type="text" name="mailingAddress" value="<?php echo $user['mailingAddress']?>"  placeholder="Enter your Mailing Address(Optional)" class="form-control" tabindex="11" >         
                                    </div>
                                    <div class="col-12 mt-3">        
                                        <label for="">Provincial Address</label>
                                         <input type="text" name="provincialAddress" value="<?php echo $user['provincialAddress']?>"  placeholder="Enter your Provincial Address(Optional)" class="form-control" tabindex="12" >         
                                    </div>
                                </div>
                            </div>

                        <div class="row mt-4">
                            <div class="h2">Social Accounts</div>
                        </div>

                        <div class="form-group">
                            <div class="row mt-3">
                                <div class="col-4">
                                    <label for="">Facebook URL</label>
                                    <input type="text" name="fbURL" value="<?php echo $user['fbURL']?>"  placeholder="Enter your Facebook URL(Optional)" class="form-control" tabindex="13">       
                                 </div>
                                 <div class="col-4">
                                    <label for="">LinkedIn</label>
                                    <input type="text" name="linkURL" value="<?php echo $user['linkURL']?>"  placeholder="Enter your LinkedIn Profile URL(Optional)" class="form-control" tabindex="13">       
                                 </div>
                                 <div class="col-4">
                                    <label for="">Twitter</label>
                                    <input type="text" name="gmailURL" value="<?php echo $user['gmailURL']?>"  placeholder="Enter your Twitter URL(Optional)" class="form-control" tabindex="13">       
                                 </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-12">
                        <button type="submit" name="submit" id="" class="btn btn-primary float-right mt-2 mr-3">Update</button>
                         
                        </div>            
                    </div>
                        

                    <div class="form-input col-5  " style="display:inline-block" hidden>
                            <label>School Attended</label>
                            <select name="schoolAttended" 
                            id="schooolDataID"
                            style="  width: 100%;
                            height: 45px;
                            padding-left: 40px;
                            margin-bottom: 20px;
                            box-sizing: border-box;
                            box-shadow: none;
                            border: 1px solid #00000020;
                            border-radius: 50px;
                            outline: none;
                            text-transform: capitalize;
                            border: 2px solid #007bff;
                            background: transparent;" >
                            
                            <option><?php echo $user['schoolAttended']?></option>
                                <?php
                                      $query = "SELECT * FROM branch";
                                      $query_run = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            ?>
                                        
                                            <option data-id=<?php echo $row['Id']; ?>><?php echo $row['Name']." - ".$row['Address']?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                ?>      
                            </select>
                        </div>
                        <div class="form-input col-4 " style="display:inline-block" hidden>
                        
                            <label>Year Graduated</label>
                            <?php
                                      $query = "SELECT * FROM batch WHERE Name=".$user['userID']."   order by id desc
                                      limit 1";
                                      $querybatch = mysqli_query($connection, $query);
                                      $batch = mysqli_fetch_array($querybatch);
                            ?>
                            <input type="number" name="yearGraduated" value="<?php echo $batch['Description'] ?>"  placeholder="2015" tabindex="10" required>
                        </div>
                        <div class="form-input col-12 " style="display:inline-block" hidden>
                            <label>Course Graduated</label>                       
                            <select name="courseGraduated" 
                            style="  width: 100%;
                            height: 45px;
                            padding-left: 10px;
                            margin-bottom: 20px;
                            box-sizing: border-box;
                            box-shadow: none;
                            border: 1px solid #00000020;
                            border-radius: 50px;
                            outline: none;
                            text-transform: capitalize;
                            border: 2px solid #007bff;
                            background: transparent;" >
                            
                            <option value="<?php echo $user['courseGraduated']?>"><?php echo $user['title']?></option>
                                <?php
                                      $query = "SELECT * FROM course";
                                      $query_run = mysqli_query($connection, $query);
                                    ?>
                                
                                <?php
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            ?>
                                        
                                            <option value="<?php echo $row['id']?>"><?php echo $row['code']." - ".$row['title']?></option>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                ?>      
                            </select>
                        </div>

                        <div class="form-input col-12  " style="display:inline-block" hidden>
                            <label>Current Work</label>
                            <input type="text" name="CurrentWork" value="<?php echo $user['CurrentWork'] ?>">
                        </div>  

                        <h5 class="d-none">Password</h5>
                        <div class="form-input col-5 m-2 d-none" style="display:inline-block">
                        <label>Password</label>
                        <input type="password" name="password" value="<?php echo $user['password'] ?>     placeholder="Password" required>
                        </div>

                        <div class="form-input col-5 m-2 d-none" style="display:inline-block">
                        <label>Confirm Password</label>
                        <input type="password" name="re_password" value="<?php echo $user['password'] ?>   placeholder="Confirm Password" required>
                        </div>

                        
                    </form>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function(){
        // alert("test");
        $("#schooolDataID").change(function(){
            var id =$(this).find(':selected').data('id');
            $("#testSchoolID").val(id);
        });
    });
</script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>