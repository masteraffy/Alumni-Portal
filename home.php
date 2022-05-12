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
  $id = $user["userID"];
  $courseID = $user["courseGraduated"];
  $query = "SELECT * FROM batch WHERE Name  =".$id;
  $query_run = mysqli_query($connection, $query);
  $batch = mysqli_fetch_array($query_run);
  $batch_row_cnt = mysqli_num_rows($query_run);

  $survey = $connection->query("SELECT * FROM studentforms WHERE studID =".$id);

  /* Get the number of rows in the result set */
  $row_cnt = $survey->num_rows;
  if($row_cnt == 0){
// printf("Result set has %d rows.\n", $row_cnt);
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Registered Successfully');
    window.location.href='sample.php';
    </script>");
  }
  
//   printf("Result set has %d rows.\n", $row_cnt);

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
</head>
<body>
<div class="wrapper">
<?php include("header.php"); ?>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3 col-md-4 pd-left-none no-pd">
<div class="main-left-sidebar no-margin">
<div class="user-data full-width">
<div class="user-profile">
<div class="username-dt">
<div class="usr-pic">
<?php 
    $photo = "";
    if($user['photo'] == "" || $user['photo'] == " "){
        $photo =  "profilePic/userPic.jpg";
    }
    else{
        $photo =  $user['photo'];
    } 
?>
<img src="<?php echo $photo; ?>" alt="">
</div>
</div>
<div class="user-specs">
<h3>
    <?php
        echo $user['firstname']." ".$user['middleName']." ".$user['lastname']; 
    ?>
</h3>
<span>Bio Here:
    
    <?php
            echo $user['bio']; 
    ?>
</span>
</div>
</div>
<ul class="user-fw-status">
<li>
<h4>
    <?php 
        $attended = $user['schoolAttended'];
        if($attended != ""){
            if($batch_row_cnt > 0){
             echo $attended." - Batch (".$batch['Description'].")"  ;
                
           }
           else{
            echo "School: Not Set" ;

           }
        }
        else{
            echo "School: Not Set";
        }
    ?>
</h4>
</li>
<li>
<h4>
    <?php 
        $courseGraduated = $user['title'];
        if($courseGraduated != " "){
            echo "<b>Course :</b>".$courseGraduated ;
        }
        else{
            echo "Course: Not Set";
        }
    ?>
    
</h4>
</li>
<li>
<h4>
    <?php 
    
        $CurrentWork = $user['CurrentWork'];
        if($CurrentWork != " "){
            echo "<b>Job :</b>".$CurrentWork ;
        }
        else{
            echo "Job: Not Set";
        }
    ?>
</h4>
</li>
<li>
<a href="editProfile.php" title="">Edit Profile</a>
</li>
</ul>
</div>

<div class="tags-sec full-width">
<ul>

<div class="cp-sec">
<!-- <p><img src="images/cp.png" alt="">Copyright Alumni Service and 2022</p> -->
</div>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 no-pd">
<div class="main-ws-sec">
<div class="post-topbar">
<div class="user-picy">
<img src="images/resources/user-pic.png" alt="">
</div>
<div class="post-st">
<ul>
<li><a class="post-jb active" href="#" title="">Whats on your Mind?</a></li>
</ul>
</div>
</div>
<div class="posts-section">
<?php
    $query = "SELECT *, 
    branch.Name as BranchNameShow,
    branch.Address as BranchAddShow,
    departments.Name as DepartmentNameShow,
    batch.Description as batchYear,
    events.Description as eventDesc
    
    FROM events 
    left join staff 
    on events.CreatedUser = staff.Id 
    left join branch 
    on staff.BranchId = branch.Id 
    left join departments 
    on staff.DepartmentId = departments.id  
    left join students 
    on students.guid = events.CreatedUser
    left join batch 
    on batch.Name = students.id
    
    where TypeOfContent !='Jobs'
    ORDER by CreatedDate DESC;";
    $content = mysqli_query($connection, $query);
    if(mysqli_num_rows($content) > 0)
    {
        while($row = mysqli_fetch_assoc($content))
        {
?>
            
            <div class="post-bar">
                <div class="post_topbar">
                    <div class="usy-dt">
                    <img src="images/resources/us-pic.png" alt="">
                        <div class="usy-name">
                            <h3> 
                            <?php 
                                if($row['UserType']=="Administrator"){
                                    echo $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']." | Alumni Service Department";
                                }
                                else if($row['UserType']=="Alumni"){
                                    echo $row['firstname']." ".$row['middleName']." ".$row['lastname']." | ".$row['schoolAttended']." | ".$row['batchYear'];
                                }
                                else{

                                    echo  $row['FirstName']." ".$row['MiddleName']." ".$row['LastName']." | ".$row['BranchNameShow']." ".$row['BranchAddShow']." | ".$row['DepartmentNameShow'];
                                    
                                    
                                }

                            ?>
                            </h3>
                            <span><img src="images/clock.png" alt="">
                                <?php 
                                    $date = date_create($row['CreatedDate']);
                                    echo date_format($date,"M d, Y | h:i:s A");
                                ?>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="job_descp">
                    <br/>
                    <h3>
                        <b>
                          <?php echo $row['Title'] ?>
                        </b>
                    </h3>
                    <p>
                     <?php echo $row['Subtitle'] ?>
                    </p>
                    <p>
                      <?php echo $row['eventDesc'] ?>
                    </p>
                    <?php 
                    if($row['UserType']=="Alumni"){
                        $pathPhoto = "/alumni/students/".$row['Image'];
                    } 
                    else{
                        $pathPhoto = "/alumni/admin/".$row['Image'];

                    }
                    if (!str_contains($row['Image'], 'empty')) { 
                           
                        ?>
                    <img src="<?php echo $pathPhoto;  ?>" />
                    <?php 
                    }
                    
                    ?>

                </div>
            </div>
<?php
        }
    }
?>    




</div>
</div>
</div>
<div class="col-lg-3 pd-right-none no-pd">
<div class="right-sidebar">

<div class="widget widget-jobs">
<div class="sd-title">
 <h3>Top Jobs</h3>
</div>
<div class="jobs-list p-1">
<div class="job-info">
<div class="job-details  p-0 w-100">
<?php
    $query = "SELECT *
    FROM events
    WHERE TypeOfContent ='Jobs'
    AND course =".$courseID."
    ORDER by CreatedDate DESC;";
    $content = mysqli_query($connection, $query);
    if(mysqli_num_rows($content) > 0)
    {
        while($row = mysqli_fetch_assoc($content))
        {
            
            $url = "postJobsolo.php?id=".$row['id'];
?>
        <div class="jobs-list p-0" style="border-bottom: 1px solid #000;">
            <div class="job-info">
                <div class="job-details p-1 w-100">
                    <a href="<?php echo $url; ?>"><h3><?php echo $row['Title'];?></h3></a>
                    <p><?php echo $row['Subtitle'] ?></p>
                </div>
            </div>
        </div>
        
<?php
        }
    }
    else{
        echo "<i><small>0 Job Posted</small></i>";
    }
?>
</div>
</div>



</div>

<div class="post-popup pst-pj">
<div class="post-project">
<div class="post-project-fields">


</div>
<a href="#" title="">x</a>
</div>
</div>
<div class="post-popup job_post">
<div class="post-project">
<h3>Whats on Your Mind?</h3>
<div class="post-project-fields">

<form action="code.php" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-lg-12">
            <input type="hidden" name="id" placeholder="Title" value="<?php echo $user['userID'];?>" >
        </div>
        <div class="col-lg-12">
            <input type="text" name="title" placeholder="Title">
        </div>
        <div class="col-lg-12">
            <input type="text" name="Subtitle" placeholder="Subtitle">
        </div>
        <div class="col-lg-12">
            <textarea name="description" placeholder="Description"></textarea>
        </div>
        <div class="col-lg-12">
            <label>Image :</label>    
            <br/>             
            <input type="file" name="file" />

        </div>
        <div class="col-lg-12">
            <ul>
            <li>
                <button type="submit" name="postContent" class="active"> Yes</button>
            </li>
            <li><a href="#" title="">Cancel</a></li>
            </ul>
        </div>
    </div>
</form>
</div>
<a href="#" title="">x</a>
</div>
</div>

</div>
</div>
     <!-- Modal -->
     <div class="modal fade mt-5" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-body p-3">
                        <h1 class="p-2 mb-2" style="font-size: 20pt !important;">Are you sure you want to Signout?</h1>
                        
                            <a href="logout.php" class="btn btn-danger" >Yes</a>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </div>
                    </div>
                </div>
            </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="lib/slick/slick.min.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<script>
    $(document).ready(function(){
        $(".hideDropdown").click(function(){
            $("#users").css("display","none");
        });
    });
    </script>
</body>
</html>