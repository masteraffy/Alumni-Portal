<?php
  include('security.php');
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
        <div class="card mt-2 p-2">
            
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
            <div class="row d-block p-5">
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
                                <img width="250" height="250" src=<?php 
                                    if($user['photo']){
                                     echo $user['photo'];
                                    }
                                    else{
                                        echo "profilePic/userPic.jpg";
                                    }
                                ?> />
                                <label>Change Profile Picture </label>
                                <br/>
                                <input type="hidden" id="fetch" name="fetch" value="<?php echo $user['photo']?>" />

                                <input type="file" id="file" name="file" />
                            </div>
                        </div>
                        <br/>
                        <h5>Bio</h5>
                        <div class="form-input col-12 p-0" style="display:inline-block">
                            <label>Add Bio</label>
                            <input type="text" name="bio" value="<?php echo $user['bio']?>" tabindex="10" >
                        </div>
                        <br/>
                        <h5>Basic Info</h5>
                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>First Name</label>
                            <input type="text" name="firstname" value="<?php echo $user['firstname']?>" placeholder="Jose" tabindex="10" required>
                        </div>

                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Middle Name</label>
                            <input type="text" name="middlename" value="<?php echo $user['middleName']?>"  placeholder="Protasio" tabindex="10" required>
                        </div>

                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Last Name</label>
                            <input type="text" name="lastname" value="<?php echo $user['lastname']?>" placeholder="Rizal" tabindex="10" required>
                        </div>

                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Birthday</label>
                            <input type="date" name="birthday" value="<?php echo $user['birthday']?>" placeholder="Rizal" tabindex="10" required>
                        </div>

                        <div class="form-input col-4 m-2" style="display:inline-block">
                            
                            <label>Gender</label>
                            <select name="gender" id="gender" 
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
                            background: transparent;" tabindex="10" >
                                <option><?php echo $user['gender'] ?></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-input col-3 p-0" style="display:inline-block">
                            <label>Civil Status</label>
                            <!-- <input type="text" name="studStatus" value="<?php echo $user['studStatus']?>" placeholder="Rizal" tabindex="10" required> -->
                            <select name="studStatus" id="studStatus" required
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
                            background: transparent;" tabindex="10" >
                                <option><?php echo $user['studStatus'] ?></option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widow / Widower">Widow / Widower</option>
                                <option value="Single Parent">Single Parent</option>
                            </select>
                        </div>

                        <h5>Contact Information</h5>
                        <div class="form-input col-5 m-2" style="display:none">
                          <label>Email</label>
                          <input type="email" name="email" value="<?php echo $user['email']?>" placeholder="Email Address" tabindex="10" required>
                        </div>

                        <div class="form-input col-5 m-2" style="display:inline-block">
                            <label>Personal Contact Number</label>
                            <input type="text" name="contact" value="<?php echo $user['contact']?>"  placeholder="Phone Number" tabindex="10" required>
                    
                        </div>
                        
                        <div class="form-input col-5 m-2" style="display:inline-block">
                            <label>Work Contact Number</label>
                            <input type="text" name="employerNo" value="<?php echo $user['employerNo']?>"  placeholder="Phone Number" tabindex="10" required>
                        </div>

                        <div class="form-input col-12 m-2" style="display:inline-block">
                            <label>Mailing Address</label>
                            <input type="text" name="mailingAddress" value="<?php echo $user['mailingAddress']?>"  placeholder="Mailing Address" tabindex="10" required>
                        </div>

                        <div class="form-input col-12 m-2" style="display:inline-block">
                            <label>Present Address</label>
                            <input type="text" name="presentAddress" value="<?php echo $user['presentAddress']?>"  placeholder="Present Address" tabindex="10" required>
                        </div>
                        

                        <div class="form-input col-12 m-2" style="display:inline-block">
                            <label>Provincial Address</label>
                            <input type="text" name="provincialAddress" value="<?php echo $user['provincialAddress']?>"  placeholder="Provincial Address" tabindex="10" required>
                        </div>


                        <div class="form-input col-12 d-none">
                            
                            <label>Address</label>
                            <textarea style="  width: 100%;
                            height: 45px;
                            padding-left: 40px;
                            margin-bottom: 20px;
                            box-sizing: border-box;
                            box-shadow: none;
                            border: 1px solid #00000020;
                            border-radius: 50px;
                            outline: none;
                            border: 2px solid #007bff;
                            background: transparent;" class="form-control mb-3" name="address"><?php echo $user['address'] ?></textarea>
                        
                        </div>
                        <div class="d-none">
                        <h5 class="">Background</h5>
                        <input type="hidden" value="<?php echo $user['interest']; ?>" name="testSchoolID" id="testSchoolID" />

                        <div class="form-input col-5  " style="display:inline-block">
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
                        <div class="form-input col-4 " style="display:inline-block">
                        
                            <label>Year Graduated</label>
                            <?php
                                      $query = "SELECT * FROM batch WHERE Name=".$user['userID']."   order by id desc
                                      limit 1";
                                      $querybatch = mysqli_query($connection, $query);
                                      $batch = mysqli_fetch_array($querybatch);
                            ?>
                            <input type="number" name="yearGraduated" value="<?php echo $batch['Description'] ?>"  placeholder="2015" tabindex="10" required>
                        </div>
                        <div class="form-input col-12 " style="display:inline-block">
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

                        <div class="form-input col-12  " style="display:inline-block">
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

                    
                    </div>
                    <h5>Social Accounts</h5>
                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Facebook</label>
                            <input type="text" name="fbURL" value="<?php echo $user['fbURL']?>" tabindex="10" >
                        </div>
                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Gmail</label>
                            <input type="text" name="gmailURL" value="<?php echo $user['gmailURL']?>" tabindex="10" >
                        </div>
                        <div class="form-input col-4 p-0" style="display:inline-block">
                            <label>Linkedln</label>
                            <input type="text" name="linkURL" value="<?php echo $user['linkURL']?>" tabindex="10" >
                        </div>
                    <br/>

                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-success w-100">
                            Update
                        </button>
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