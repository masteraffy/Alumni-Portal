<?php
  include('security.php');
  include "../dbconfig.php";
  $email = $_SESSION['email'];
  $query = "SELECT * FROM students WHERE email  = '$email' ";
  $query_run = mysqli_query($connection, $query);
  $user = mysqli_fetch_array($query_run);
  $id = $user["id"];
  $query = "SELECT * FROM batch WHERE Name  =".$id;
  $query_run = mysqli_query($connection, $query);
  $batch = mysqli_fetch_array($query_run);

$query = "SELECT * FROM studentforms WHERE studID  =".$id;
$query_run = mysqli_query($connection, $query);
$form = mysqli_fetch_array($query_run);
$fetched = (json_decode($form['Description']));
// print_r($fetched);
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
<style>
    b{
        font-weight: bold;
    }
    .posts-section {
        background: #fff;
    }
</style>
<body>
<div class="wrapper">

<?php include("header.php"); ?>
<main style="padding: 20px 0!important;">
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3 col-md-4 pd-left-none no-pd d-none">
<div class="main-left-sidebar no-margin">
<!-- <div class="user-data full-width">
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
            <span>
                <?php
                        echo $user['bio']; 
                ?>
            </span>
        </div>
    </div>
    <ul class="user-fw-status">
        <li>
            <div style="text-align:center; padding-left:0px;">
                <?php 
                
                        $date = date_create($user['birthday']);
                        echo  "<div class='mb-2'><h3 style='font-weight: bold;'>Date of Birth</h3>".date_format($date,"M d, Y ")."</div>";
                        echo  "<div class='mb-2'><h3 style='font-weight: bold;'>Lives</h3>".$user['address']."</div>";
                        echo  "<div class='mb-2'><h3 style='font-weight: bold;'>Contact</h3>".$user['contact']."</div>";
                        echo  "<div class='mb-2'><h3 style='font-weight: bold;'>Email</h3>".$user['email']."</div>";
                ?>
                
            </div>
        </li>
    </ul>
</div> -->

<div class="tags-sec full-width">
<ul>

<div class="cp-sec">
<!-- <p><img src="images/cp.png" alt="">Copyright Alumni Service and 2022</p> -->

<a href="editProfile.php" title="">Edit Profile</a>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12 no-pd">
<div class="main-ws-sec">
<div class="">
</div>
</div>
<div class="posts-section">
<?php
   $newID = $user['id'];
    $query = "SELECT *, 
    branch.Name as BranchNameShow,
    branch.Address as BranchAddShow,
    departments.Name as DepartmentNameShow,
    batch.Description as batchYear
    
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
    
    
    where TypeOfContent !='Jobs' and AllowPost = '1'
    and students.id = $newID
    ORDER by CreatedDate DESC";
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
                      <?php echo $row['Description'] ?>
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
        <div class="container mt-2"  style="background: #fff;">
            <ul class="nav nav-tabs" style="width: 100%;padding-top: 2%;">
                
            <a href="editProfile.php" 
            style="text-align: right;
                   float: right;
                   width: 100%;">Edit Profile</a>
                
                <li class="nav-item"><a id="LA_btn" class="nav-link" data-bs-toggle="tab" href="#general">General Information
                    </a></li>
                <li class="nav-item"><a id="EI_btn" class="nav-link" data-bs-toggle="tab" href="#Employment">Education and Employment Information</a></li>
                <li class="nav-item"><a id="LA_btn" class="nav-link" data-bs-toggle="tab" href="#LA">Advance Trainings or Graduate Studies
                </a></li>
                
                
            </ul>
            <form method="POST" action="samplecode.php" >
            <div class="tab-content">
                
                <div class="tab-pane active" id="general">
                    <div class="row p-3">
                        <h2 style="font-size:17pt;">Personal Information</h2>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <?php 
                                $photo = "";
                                if($user['photo'] == "" || $user['photo'] == " "){
                                    $photo =  "profilePic/userPic.jpg";
                                }
                                else{
                                    $photo =  $user['photo'];
                                } 
                            ?>
                            <img width="150" height="150" src="<?php echo $photo; ?>" alt="">
                       </div>
                        <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <p>Name</p>
                                    <p>
                                        <?php
                                            echo $user['firstname']." ".$user['middleName']." ".$user['lastname']; 
                                        ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p>Gender</p>
                                    <p>
                                        <?php
                                            echo $user['gender']
                                        ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p>Civil Status</p>
                                    <p>
                                        <?php
                                            echo $user['studStatus']
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row m-3">
                                <div class="col">
                                    <p>Email Address</p>
                                    <p>
                                        <?php
                                            echo $user['email']
                                        ?>
                                    </p>
                                </div>
                                <div class="col">
                                    <p>Date Of Birth</p>
                                    <p>
                                        <?php
                                            echo $user['birthday']
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                        </div>
                    </div>
                    <div class="row p-3">
                        <h2 style="font-size:17pt;">Contact Information</h2>
                    </div>
                
                    <div class="row p-1 mb-1">
                        <div class=" col"> 
                            <p>Personal Contact Number</p>
                            <p>
                                <?php echo $user['contact']; ?>
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Work Contact Number</p>
                            <p>
                                <?php echo $user['employerNo']; ?> 
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Mailing Address</p>
                            <p>
                                <?php echo $user['mailingAddress'];  ?>
                            </p>
                        </div>
                    </div>
                    <div class="row p-1 mb-1">
                        <div class=" col-4"> 
                            <p>Present Address</p>
                            <p>
                                <?php echo $user['presentAddress'];  ?>
                            </p>
                        </div>
                        <div class=" col-4"> 
                            <p>Provincial Address</p>
                            <p>
                                <?php echo $user['provincialAddress'];  ?>
                            </p>
                        </div>
                    </div>
                    <div class="row p-3">
                        <h2 style="font-size:17pt;">Social Accounts</h2>
                    </div>
                
                    <div class="row p-1 mb-1">
                        <div class=" col"> 
                            <p>Facebook URL</p>
                            <p>
                                <?php echo $user['fbURL']; ?>
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Gmail Account</p>
                            <p>
                                <?php echo $user['gmailURL']; ?>
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Linkedln Account</p>
                            <p>
                                <?php echo $user['linkURL']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="row p-3">
                        <h2 style="font-size:17pt;">Additional Information</h2>
                    </div>
                
                    <div class="row p-1 mb-1">
                        <div class=" col"> 
                            <p>Student Number</p>
                            <p>
                                <?php 
                                    echo  $user['studNo'];
                                ?>
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Alumni Number</p>
                        </div>
                        <div class=" col"> 
                            <p>Official Receipt</p>
                            <p>
                                <?php 
                                    echo  $user['studOR'];
                                ?>
                            </p>
                        </div>
                        <div class=" col"> 
                            <p>Designation</p>
                            <p>
                                <?php 
                                    echo  $user['studDes'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="LA">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $id ; ?>" />
                        <div class="mb-3 col-12">
                            <Label>1. Did you pursue further studies?</Label>
                            <b>- <?php echo ($fetched->pursueStudy); ?></b>                       
                        </div> 
                        
                        <div class="mb-3 col-md-12">
                            <Label>2. Please list down all professional or work-related training program(s) including further studies you have attended after college.</Label><br>               
                        </div> 

                        <div class="mb-3 col-md-4">
                            <label for="training" class="form-label">Title of Training / Advance Study / Course<span class="text-danger"></span></label>
                            <b>- <?php echo ($fetched->training); ?></b>   
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="creditsEarned" class="form-label">Duration and Credits Earned<span class="text-danger"></span></label>
                            <b>- <?php echo ($fetched->creditsEarned); ?></b>  
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="trainingIns" class="form-label">Training Institution / College / University<span class="text-danger"></span></label>
                            <b>- <?php echo ($fetched->trainingIns); ?></b>  
                        </div>
                        <div class="mb-3 col-12">
                            <label>3. What made you pursue further studies?</label>
                         
                            : 
                                <b>- <?php echo ($fetched->pursueFurther); ?></b>                              
                        </div>
                        <Label>4. What do you think are the skills, knowledge and trainings you received from Arellano University that proved to be useful to your current job / business / further studies?</Label><br>

                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Skills / Knowledge in <span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->skills); ?></b>   
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Training in<span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->trainingIn); ?></b>  
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->otherTraining); ?></b>  
                        </div>
                        <div class="mb-3 col-12">
                            <label>5. To what extent is the usefulness of these acquired knowledge, skills, and trainings?</label><br>
                                : 
                                <b>- <?php echo ($fetched->skillsandtraining); ?></b>                             
                        </div>
                        <div class="mb-3 col-12">
                            <label>6. How would you rate the overall effectiveness of Arellano University in preparing its graduates to meet the demands in the workplaces</label><br>
                                <b>- <?php echo ($fetched->overalAll); ?></b>                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>7. How would you rate your personal experiences during enrollment at Arellano University?</label><br>
                                <b>- <?php echo ($fetched->personalExp); ?></b>                                       
                        </div>
                        <div class="mb-3 col-12">
                            <label>8. Based on your experiences, how would you compare Arellano graduates with those from other Universities who were hired for a similar position?</label><br>
                                <b>- <?php echo ($fetched->compare); ?></b>                        
                        </div>
                        <Label>9. Kindly reflect all achievements/recognitions/ or awards accorded to you after graduation from Arellano University</Label>
                        <br/>
                        <b>- <?php echo ($fetched->Award); ?></b>   

                    </div>
                        
                
                        
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- <button class="btn btn-primary me-md-2" disabled id="submit" type="submit">Submit</button>    
                            <a href=""></a>                 -->
                        </div>
                </div>
                
                <div class="tab-pane" id="Employment">
                    <div class="row">                        
                        <hr>
                        <div class=" col-12">            
                        <br/>
                        <h3>Educational Background</h3>       
                        <br/>   
                        </div>
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Degree Earn in Arellano University</label>
                            
                            <label value="<?php echo $courseID = $user["courseGraduated"]; ?>"
                            ><?php
                            $courseID = $user["courseGraduated"]; 
                            
                            $course = "SELECT * FROM course WHERE id  =".$courseID;
                            $query_run = mysqli_query($connection, $course);
                            $courseName = mysqli_fetch_array($query_run);
                            echo $courseName['title'];
                            ?>
                            </label>                                       
                        </div>       

                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Major<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $courseID = $user["major"]; ?>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Campus Graduated</label>
                            <br/>
                                <label><?php echo $user['schoolAttended']; ?></label>                          
                        </div>
                        
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom05" class="form-label">Year Graduated<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $batch['Description']; ?>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Awards / Honors Received<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['awards']; ?>
                        </div>
                        <hr>
                        <div class="mb-4 col-12">
                            <h3>Employment Information</h3>
                            <label><b>Plase provide information regarding your current empoyment status</b></label>
                        </div>
                        
                        <?php 
                        $showFieldUE;
                        $showNow;
                        if($fetched->currentlyEmp != "No"){
                            $showFieldUE = "display:unset";
                            $showNow = "display:none";
                        }
                        else{
                            $showFieldUE = "display:none";
                            $showNow = "display:unset";
                        }
                        ?>
                        <div class="mb-3 col-12" >
                            <Label>1. Are you currently employed?</Label><br><b>- <?php echo ($fetched->currentlyEmp); ?></b>   <br>

                            <label  style=<?php echo $showNow; ?> for="validationCustom10" class="form-label">*In case of unemployed, state your reason(s) why you are unemployed</label><br>
                            <b  style=<?php echo $showNow; ?>>- <?php echo ($fetched->unEmployed); ?></b>         
                        </div>
                        <?php 
                        $showFieldUE;
                        if($fetched->currentlyEmp != "No"){
                            $showFieldUE = "display:unset";
                        }
                        else{
                            $showFieldUE = "display:none";
                        }
                        ?>

                        <div class="Employed" style=<?php echo $showFieldUE; ?>>
                            
                            <div class="mb-3 col-12">
                                <Label>2. How long did it take for you get this job?</Label><br>
                                    <b>- <?php echo ($fetched->getJob); ?></b>
                            </div>
                            <div class="mb-3 col-12">
                                <Label>3. Type of Organization</Label><br><b>- <?php echo ($fetched->typeOrg); ?></b>
                            </div>
                            <div class="mb-3 col-12">
                                <Label>4. Present Employment Status</Label><br><b>- <?php echo ($fetched->presentStatus); ?></b>                       
                            </div>
                            <div class="mb-3 col-12">
                                <Label>5. Name of Present Employer/Company:</Label><br><b>- <?php echo ($fetched->presentEmployer); ?></b>        
                            </div>
                            
                        
                            <div class="mb-3 col-6">
                                    <label for="validationCustom01" class="form-label">6. Postion</label><br><b>- <?php echo ($fetched->position); ?></b>  
                            </div>

                            
                            <div class="mb-3 col-6">
                                    <label for="validationCustom02" class="form-label">Since When</label><br><b>- <?php echo ($fetched->when); ?></b> 
                            </div>  

                            <div class="mb-3 col-12">
                                <Label>Does your job related to your educational field/Course?</Label>
                                <br><b>- <?php echo ($form["courseRelated"]); ?></b> 
                            </div>
                            <div class="mb-3 col-12">
                                <Label>7. Occupational Classification</Label><br><b>- <?php echo ($fetched->occupationClass); ?></b> <br>Others<b>- <?php echo ($fetched->otherClass); ?></b>
                            
                            </div>
                            <div class="mb-3 col-12">
                                <Label>8. Number of years in the company</Label><br><b> <?php echo ($fetched->compYears); ?></b>
                            </div>
                            <div class="mb-3 col-12">
                                <Label>9. Monthly Income Range</Label><br><b> <?php echo ($fetched->incomeRanged); ?></b> 
                            </div>
                            
                            <div class="mb-3 col-12">
                                <Label>10. How satisfied are you with your job?</Label><br><b> <?php echo ($fetched->statisfied); ?></b>                          
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="mb-3 col-md-12 d-none">
                            <label for="validationCustom05" class="form-label">Do you have any suggestions that you feel will be useful improving the program / services of Arellano University for its future graduates? What are they?<span class="text-danger"></span></label><br><b> <?php echo ($fetched->suggestions); ?></b>     
                        </div>
                        <div class="mb-3 col-md-12 d-none">
                            <label for="validationCustom05" class="form-label">Do you have suggestions for the alumni association to undertake for its alumni? What are they?<span class="text-danger"></span></label><br><b> <?php echo ($fetched->alumnisuggest); ?></b>     
                        </div>
                    </div>
                <hr>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                            <ul class="nav nav-tabs">
                                <!-- <li class="nav-item"><a id="LA_btn" class="nav-link" data-bs-toggle="tab" href="#LA">Next -->
                               
                            </li>
                            </ul>             
                        </div>
                </div>
                </form>
            </div>  
        </div>
        <!-- <div class="card p-2 container mt-2">
            <ul class="nav nav-tabs">
                <li class="nav-item"><a id="BI_btn" class="nav-link active" data-bs-toggle="tab" href="#BI">General Informations</a></li>
                <li class="nav-item"><a id="WS_btn" class="nav-link"data-bs-toggle="tab" href="#WS">Education and Work</a></li>
                <li class="nav-item"><a id="LA_btn" class="nav-link"data-bs-toggle="tab" href="#LA">Life After my college days</a></li>

                <li class="nav-item"><a id="EI_btn" class="nav-link"data-bs-toggle="tab" href="#EI">Employment Information</a></li>
            </ul>
            <form method="POST" action="samplecode.php" >
            <div class="tab-content">
                <div class="tab-pane active" id="BI">
                    <div class="row m-2">
                        Personal Information
                    </div>
                    <div class="row">
                    <hr>
                            <div class="mb-3 col-4">
                                <label for="validationCustom01" class="form-label">Name</label>
                                <br/>
                                <?php echo $user["lastname"].", ".$user["firstname"]." ".$user["middleName"]; ?>
                            </div>
                            <div class="mb-3 col">
                                <Label>Gender</Label><br>
                                <?php echo $user["gender"]; ?>
                            </div>
                            <div class="mb-3 col">
                                <Label>Civil Status</Label><br>
                                <?php echo $user["studStatus"]; ?>
                            </div>
                            
                            
                            <div class="mb-3 col-6">
                                <label for="validationCustom08">Date of Birth</label>
                                        : <?php echo $user["birthday"]; ?>
                                    
                            </div>
                            <div class="mb-3 col-md-6">
                                    <label for="validationCustom06">Email Address:</label>
                                    <?php echo $user["email"]; ?>
                            </div>
                            <hr>

                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Personal Contact Number</label>
                                <br/>
                                <?php echo $user['contact']; ?>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Work Contact Number</label>
                                <br/>
                                <?php echo $user['employerNo']; ?> 
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Mailing Address</label>
                                <br/>
                                <?php echo $user['mailingAddress'];  ?>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Present Address</label>
                                <br/>
                                <?php echo $user['presentAddress'];  ?>
                                
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Provincial Address</label>
                                <br/>
                                <?php echo $user['provincialAddress']; ?>
                            </div>
                            
                              
                            <hr>
                            <h3>&nbsp;</h3>   
                            <br/>                                   
                            <div class="mb-3 col-md-6">  
                            <h3>Social Accounts</h3>   
                            <br/>
                                <label for="validationCustom07">Facebook URL</label>
                                <br/>
                                <?php echo $user['fbURL']; ?>
                            </div>      

                            <div class="mb-3 col-md-6">  
                                <br/>
                                <br/>
                                <label for="validationCustom07">Gmail Account</label>
                                <br/>
                                <?php echo $user['gmailURL']; ?>
                            </div>  
                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Linked-In Account</label>
                                <br/>
                                <?php echo $user['linkURL']; ?>
                            </div>   
                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Other Social Account</label>
                                <br/>
                                <?php echo $user['otherURL']; ?>
                                    
                            </div>  
                                                                 
                    </div>  
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                         
                    </div>
                </div>
                
                <div class="tab-pane" id="WS">
                    <div class="row">                        
                        <hr>
                        <div class=" col-12">            
                        <br/>
                        <h3>Educational Background</h3>       
                        <br/>   
                        </div>
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Degree Earn in Arellano University</label>
                            
                            <label value="<?php echo $courseID = $user["courseGraduated"]; ?>"
                            ><?php
                            $courseID = $user["courseGraduated"]; 
                            
                            $course = "SELECT * FROM course WHERE id  =".$courseID;
                            $query_run = mysqli_query($connection, $course);
                            $courseName = mysqli_fetch_array($query_run);
                            echo $courseName['title'];
                            ?>
                        </label>                                       
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Major<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $courseID = $user["major"]; ?>
                        </div> 
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Campus Graduated</label>
                            <br/>
                                <label><?php echo $user['schoolAttended']; ?></label>                          
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom05" class="form-label">Year Graduated<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $batch['Description']; ?>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Awards / Honors Received<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['awards']; ?>
                        </div>
                        <hr>
                        <div class="mb-3 col-md-6">
                        <h3>Employment Background</h3> 
                        <br/>
                            <label for="validationCustom10" class="form-label">Company:<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['company']; ?>
                        </div>  
                        <div class="mb-3 col-md-6">
                        <br/>
                        <br/>
                            <label for="validationCustom10" class="form-label">Position:<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['position']; ?>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Location:<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['location']; ?>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Description:<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['description']; ?>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Year:<span class="text-danger"></span></label>
                            <br/>
                            <?php echo $user['employeeYear']; ?>
                            <br>
                            <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                  I Currently Work Here
                                </label>
                            </div> -->
                            <br>
                              
                        </div>                    
                         
                       <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">    
                            
                            
                        </div>
                    </div>
                    </div>
                <!-- <div class="tab-pane" id="EI">
                    
                <div class="row">                        
                        <hr>
                        <h3>Work Survey</h3>              
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">What was your first job after graduation?<span class="text-danger"></span></label>
                                
                                <b>- <?php echo ($fetched->firstJob); ?></b>
                            
                        </div>
                        <div class="mb-3 col-12">
                            <Label>How long did it take for you get this job?</Label><br>
                                <b>- <?php echo ($fetched->getJob); ?></b>
                        </div>
                        <div class="mb-3 col-12">
                            <Label>How did you acquire your current job?</Label><br>
                                <b>- <?php echo ($fetched->acquired); ?></b><br>
                                Others:<b>- <?php echo ($fetched->acquiredOthers); ?></b>                                                
                        </div>
                        <hr>
                        <label><b>Plase provide information regarding your current empoyment status</b></label>
                        <div class="mb-3 col-12">
                            <Label>1. How long did it take for you get this job?</Label><b>- <?php echo ($fetched->employementStat); ?></b>                                  
                        </div>
                        <div class="mb-3 col-12">
                            <Label>2. Are you currently employed?</Label><br><b>- <?php echo ($fetched->currentlyEmp); ?></b>   <br>
                            <label for="validationCustom10" class="form-label">*In case of unemployed, state your reason(s) why you are unemployed</label><br><b>- <?php echo ($fetched->unEmployed); ?></b>         
                        </div>
                        <div class="mb-3 col-12">
                            <Label>3. Type of Organization</Label><br><b>- <?php echo ($fetched->typeOrg); ?></b>
                        </div>
                        <div class="mb-3 col-12">
                            <Label>4. Present Employment Status</Label><br><b>- <?php echo ($fetched->presentStatus); ?></b>                       
                        </div>
                        <div class="mb-3 col-12">
                            <Label>5. Name of Present Employer/Company:</Label><br><b>- <?php echo ($fetched->presentEmployer); ?></b>        
                        </div>
                        
                        <div class="mb-3 col-6">
                                <label for="validationCustom01" class="form-label">6. Postion</label><br><b>- <?php echo ($fetched->position); ?></b>  
                        </div>
                        
                        <div class="mb-3 col-6">
                                <label for="validationCustom02" class="form-label">Since When</label><br><b>- <?php echo ($fetched->when); ?></b> 
                        </div>  
                        <div class="mb-3 col-12">
                            <Label>7. Occupational Classification</Label><br><b>- <?php echo ($fetched->occupationClass); ?></b> <br>Others<b>- <?php echo ($fetched->otherClass); ?></b>
                         
                        </div>
                        <div class="mb-3 col-12">
                            <Label>8. Number of years in the company</Label><br><b> <?php echo ($fetched->compYears); ?></b>
                        </div>
                        <div class="mb-3 col-12">
                            <Label>9. Monthly Income Range</Label><br><b> <?php echo ($fetched->incomeRanged); ?></b> 
                        </div>
                        <div class="mb-3 col-12">
                            <Label>10. How satisfied are you with your job?</Label><br><b> <?php echo ($fetched->statisfied); ?></b>                          
                        </div>
                        <br>
                        <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <!-- <button class="btn btn-primary me-md-2" type="submit">Submit</button>     -->
                            <!-- <a href=""></a>                 -->
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="LA">
                    <div class="row">
                        <hr>
                        <h3>Advance Trainings / Studies / Graduate School</h3>
                        <div class="mb-3 col-12">
                            <Label>1. Did you pursue further studies?</Label>
                            <div class="form-check form-check-inline">
                                
                            <b>- <?php echo ($fetched->pursueStudy); ?></b>                       
                        </div>  
                        <Label>2. Please list down all professional or work-related training program(s) including further studies you have attended after college.</Label><br>
                        <div class="mb-3 col-md-12">
                            <label for="training" class="form-label">Title of Training / Advance Study / Course<span class="text-danger"></span></label>: 
                            <b>- <?php echo ($fetched->training); ?></b>      


                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="creditsEarned" class="form-label">Duration and Credits Earned<span class="text-danger"></span></label>: 
                            <b>- <?php echo ($fetched->creditsEarned); ?></b>     
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="trainingIns" class="form-label">Training Institution / College / University<span class="text-danger"></span></label>: 
                            <b>- <?php echo ($fetched->trainingIns); ?></b>  
                        </div>
                        <div class="mb-3 col-12">
                            <label>3. What made you pursue further studies?</label>
                            <div class="form-check form-check-inline">
                                : 
                                <b>- <?php echo ($fetched->pursueFurther); ?></b>  
                            </div>                           
                            <br>
                        </div>
                        <Label>4. What do you think are the skills, knowledge and trainings you received from Arellano University that proved to be useful to your current job / business / further studies?</Label><br>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Skills / Knowledge in <span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->skills); ?></b>   
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Training in<span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->trainingIn); ?></b>  
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>
                                : 
                                <b>- <?php echo ($fetched->otherTraining); ?></b>  
                        </div>
                        <div class="mb-3 col-12">
                            <label>5. To what extent is the usefulness of these acquired knowledge, skills, and trainings?</label>
                                : 
                                <b>- <?php echo ($fetched->skillsandtraining); ?></b>                         
                        </div>
                        <div class="mb-3 col-12">
                            <label>6. How would you rate the overall effectiveness of Arellano University in preparing its graduates to meet the demands in the workplaces</label>
                                <b>- <?php echo ($fetched->overalAll); ?></b>                     
                        </div>
                        <div class="mb-3 col-12">
                            <label>7. How would you rate your personal experiences during enrollment at Arellano University?</label>: 
                                <b>- <?php echo ($fetched->personalExp); ?></b>                            
                        </div>
                        <div class="mb-3 col-12">
                            <label>8. Based on your experiences, how would you compare Arellano graduates with those from other Universities who were hired for a similar position?</label>
                            <br> 
                                <b>- <?php echo ($fetched->compare); ?></b>    
                            <br>
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>       : 
                                <b>- <?php echo ($fetched->prepareOthers); ?></b>    
                            <br>                
                        </div>
                        <Label>9. Kindly reflect all achievements/recognitions/ or awards accorded to you after graduation from Arellano University</Label><br><br>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Award<span class="text-danger"></span></label>:
                                <b>- <?php echo ($fetched->Award); ?></b>   
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Granting Institution<span class="text-danger"></span></label>:
                                <b>- <?php echo ($fetched->GrantingInstitution); ?></b>  
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="validationCustom05" class="form-label">Year<span class="text-danger"></span></label>:
                                <b>- <?php echo ($fetched->year); ?></b> 
                        </div>

                    </div>
                    <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">   
                            
                            
                        </div>
                </div> -->
                
                </form>
            </div>  
        </div> -->



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
            <input type="text" name="id" placeholder="Title" value="<?php echo $user['id'];?>" >
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
<div class="chatbox-list">
<div class="chatbox">

<div class="conversation-box">
<div class="con-title mg-3">
<div class="chat-user-info">
<img src="images/resources/us-img1.png" alt="">
<h3>John Doe <span class="status-info"></span></h3>
</div>
<div class="st-icons">
<a href="#" title=""><i class="la la-cog"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
</div>
</div>
<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
<div class="date-nd">
<span>Sunday, August 24</span>
</div>
<div class="chat-msg st2">
<p>Cras ultricies ligula.</p>
<span>5 minutes ago</span>
</div>
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
</div>
<div class="typing-msg">
<form>
<textarea placeholder="Type a message here"></textarea>
<button type="submit"><i class="fa fa-send"></i></button>
</form>
<ul class="ft-options">
<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
<li><a href="#" title=""><i class="la la-camera"></i></a></li>
<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="chatbox">

<div class="conversation-box">
<div class="con-title mg-3">
<div class="chat-user-info">
<img src="images/resources/us-img1.png" alt="">
<h3>John Doe <span class="status-info"></span></h3>
</div>
<div class="st-icons">
<a href="#" title=""><i class="la la-cog"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-minus-square"></i></a>
<a href="#" title="" class="close-chat"><i class="la la-close"></i></a>
</div>
</div>
<div class="chat-hist mCustomScrollbar" data-mcs-theme="dark">
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
<div class="date-nd">
<span>Sunday, August 24</span>
</div>
<div class="chat-msg st2">
<p>Cras ultricies ligula.</p>
<span>5 minutes ago</span>
</div>
<div class="chat-msg">
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor.</p>
<span>Sat, Aug 23, 1:10 PM</span>
</div>
</div>
<div class="typing-msg">
<form>
<textarea placeholder="Type a message here"></textarea>
<button type="submit"><i class="fa fa-send"></i></button>
</form>
<ul class="ft-options">
<li><a href="#" title=""><i class="la la-smile-o"></i></a></li>
<li><a href="#" title=""><i class="la la-camera"></i></a></li>
<li><a href="#" title=""><i class="fa fa-paperclip"></i></a></li>
</ul>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <script src="./app.js"></script>
</script>
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