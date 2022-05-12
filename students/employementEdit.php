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
  $query = "SELECT * FROM studentforms WHERE studID  =".$id;
  $query_run = mysqli_query($connection, $query);
  $form = mysqli_fetch_array($query_run);
  $fetched = (json_decode($form['Description']));
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
            
            <h3>Employment Information</h3>
            <div class="container mt-2">
            <ul class="nav nav-tabs">
                
                
                <li class="nav-item"><a id="EI_btn" class="nav-link" data-bs-toggle="tab" href="#Employment">Education and Employment Information</a></li>
                <!-- <li class="nav-item"><a id="LA_btn" class="nav-link" data-bs-toggle="tab" href="#LA">Advance Trainings or Graduate Studies -->
                </a></li>

                
            </ul>
            <form method="POST" action="updateProfile.php" >
            <div class="tab-content">
                <div class="tab-pane" id="LA">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $id ; ?>" />
                        <div class="mb-3 col-12">
                            <Label>1. Did you pursue further studies?</Label>
                            <input type="text" name="pursueStudy" value="<?php echo ($fetched->pursueStudy); ?>" />                     
                        </div> 
                        
                        <div class="mb-3 col-md-12">
                            <Label>2. Please list down all professional or work-related training program(s) including further studies you have attended after college.</Label><br>               
                        </div> 

                        <div class="mb-3 col-md-4">
                            <label for="training" class="form-label">Title of Training / Advance Study / Course<span class="text-danger"></span></label>
                            
                            
                            <input type="text" name="training" value="<?php echo ($fetched->training); ?>" />       
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="creditsEarned" class="form-label">Duration and Credits Earned<span class="text-danger"></span></label>
                            
                            <input type="text" name="creditsEarned" value="<?php echo ($fetched->creditsEarned); ?>" />   
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="trainingIns" class="form-label">Training Institution / College / University<span class="text-danger"></span></label>
                            <input type="text" name="trainingIns" value="<?php echo ($fetched->trainingIns); ?>" />   
                        </div>
                        <div class="mb-3 col-12">
                            <label>3. What made you pursue further studies?</label>
                         
                            :                    
                                
                            <input type="text" name="pursueFurther" value="<?php echo ($fetched->pursueFurther); ?>" />   
                        </div>
                        <Label>4. What do you think are the skills, knowledge and trainings you received from Arellano University that proved to be useful to your current job / business / further studies?</Label><br>

                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Skills / Knowledge in <span class="text-danger"></span></label>
                                : 
                                
                            <input type="text" name="skills" value="<?php echo ($fetched->skills); ?>" />   
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Training in<span class="text-danger"></span></label>
                                : 
                            <input type="text" name="trainingIn" value="<?php echo ($fetched->trainingIn); ?>" />   
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>
                                : 
                            <input type="text" name="otherTraining" value="<?php echo ($fetched->otherTraining); ?>" />    
                        </div>
                        <div class="mb-3 col-12">
                            <label>5. To what extent is the usefulness of these acquired knowledge, skills, and trainings?</label><br>
                                :                  
                                
                            <input type="text" name="skillsandtraining" value="<?php echo ($fetched->skillsandtraining); ?>" />        
                        </div>
                        <div class="mb-3 col-12">
                            <label>6. How would you rate the overall effectiveness of Arellano University in preparing its graduates to meet the demands in the workplaces</label><br>
                                
                            <input type="text" name="overalAll" value="<?php echo ($fetched->overalAll); ?>" />                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>7. How would you rate your personal experiences during enrollment at Arellano University?</label><br>
                                
                            <input type="text" name="personalExp" value="<?php echo ($fetched->personalExp); ?>"/>                                                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>8. Based on your experiences, how would you compare Arellano graduates with those from other Universities who were hired for a similar position?</label><br>
                            <input type="text" name="compare" value="<?php echo ($fetched->compare); ?>"/>                              
                        </div>
                        <Label>9. Kindly reflect all achievements/recognitions/ or awards accorded to you after graduation from Arellano University</Label>
                        <br/>  
                            <input type="text" name="Award" value="<?php echo ($fetched->Award); ?>"/>            

                    </div>
                        
                
<!--                         
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" disabled id="submit" type="submit">Submit</button>    
                                        
                        </div> -->
                </div>
                
                <div class="tab-pane active" id="Employment">
                    <div class="row">                        
                        <hr>
                        <div class=" col-12">     
                        <div class="mb-4 col-12">
                            <h3>Employment Information</h3>
                            <label><b>Plase provide information regarding your current empoyment status</b></label>
                        </div>
                        
                        <?php 
                        $showFieldUE;
                        if(($fetched->currentlyEmp) == "No"){
                            $showFieldUE = "display:unset";
                            $showNow = "display:none";
                        }
                        else{
                            $showFieldUE = "display:none";
                            $showNow = "display:unset";
                        }
                        ?>
                        <div class="mb-3 col-12" >
                            <Label>1. Are you currently employed?</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="yesEmployed" value="Yes" 
                                <?php
                                if(($fetched->currentlyEmp) == "Yes"){
                                    echo "checked";
                                } ?>
                                >
                                <label class="form-check-label" for="inlineRadio1" >Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="noEmployed" value="No"
                                
                                <?php
                                if(($fetched->currentlyEmp) == "No"){
                                    echo "checked";
                                } ?>>
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="selfEmployed" value="Self employed"
                                
                                <?php
                                if(($fetched->currentlyEmp) == "Self employed"){
                                    echo "checked";
                                } ?>>
                                <label class="form-check-label" for="inlineRadio1"
                                >Self employed</label>
                            </div>       
                        </div>
                      
                        
                        <div class="unEmployed" >
                                <label for="validationCustom10" class="form-label">*In case of unemployed, state your reason(s) why you are unemployed</label>
                                <input type="text" value="<?php echo (($fetched->unEmployed)); ?>" name="unEmployed" class="form-control" id="validationCustom10" placeholder="Please state your answer" >                              
                            </div> 
                        <!-- <div class="mb-3 col-12"  style="<?php echo $showNow; ?>" >
                            <Label>2. Are you currently employed?</Label><br><b>- <?php echo ($fetched->currentlyEmp); ?></b>   <br>
                            <label for="validationCustom10" class="form-label">*In case of unemployed, state your reason(s) why you are unemployed</label><br><b>- <?php echo (($fetched->unEmployed)); ?></b>         
                        </div> -->
                        <!-- <?php echo $showNow;?> -->
                        <div class="Employed" style="<?php echo $showNow; ?>" >
                            
                            <div class="mb-3 col-12">
                                <Label>How long did it take for you get this job?</Label><br>
                                    <!-- <b>- <?php echo ($fetched->getJob); ?></b> -->
                                    
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employementStat" id="inlineRadio1" value="Local"
                                    <?php
                                    if(($fetched->getJob) == "Local"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Local</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="employementStat" id="inlineRadio2" value="Abroad"
                                    
                                    <?php
                                    if(($fetched->getJob) == "Abroad"){
                                        echo "checked";
                                    } ?>>
                                    <label class="form-check-label" for="inlineRadio2">Abroad</label>
                                </div>                             
                            </div>
                            <div class="mb-3 col-12">
                                <Label>3. Type of Organization</Label>
                                
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio1" value="Private"  
                                    <?php
                                    if(($fetched->typeOrg) == "Private"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1" checked>Private</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio2" value="Public" 
                                    <?php
                                    if(($fetched->typeOrg) == "Public"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio2">Public</label>
                                </div>  
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio1" value="NGO"
                                    <?php
                                    if(($fetched->typeOrg) == "NGO"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">NGO</label>
                                </div>
                            </div>
                            <div class="mb-3 col-12">
                                <Label>4. Present Employment Status</Label>
                                
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Regular/Permanent"   
                                    <?php
                                    if(($fetched->presentStatus) == "Regular/Permanent"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Regular/Permanent</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio2" value="Casual"
                                    
                                    <?php
                                    if(($fetched->presentStatus) == "Casual"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio2">Casual</label>
                                </div>  
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Part Time"
                                    
                                    <?php
                                    if(($fetched->presentStatus) == "Part Time"){
                                        echo "checked";
                                    } ?>
                                    
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Part Time</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Contractual"
                                    
                                    <?php
                                    if(($fetched->presentStatus) == "Contractual"){
                                        echo "checked";
                                    } ?>
                                    
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Contractual</label>
                                </div>                      
                            </div>
                            <div class="mb-3 col-12">
                                <Label>5. Name of Present Employer/Company:</Label>
                                
                                <input type="text" name="presentEmployer" class="form-control" id="validationCustom10" value="<?php echo ($fetched->presentEmployer); ?>" >       
                            </div>
                            
                        
                            <div class="mb-3 col-6">
                                    <label for="validationCustom01" class="form-label">6. Postion</label><br>
                                    <input type="text" name="position" class="form-control" id="validationCustom10" value="<?php echo ($fetched->position); ?>" >     
                            </div>

                            
                            <div class="mb-3 col-6">
                                    <label for="validationCustom02" class="form-label">Since When</label>
                                    <br>
                                    
                                    <input type="text" name="position" class="form-control" id="validationCustom10" value="<?php echo ($fetched->when); ?>" >     
                            </div>  

                            <div class="mb-3 col-12">
                                <Label>Does your job related to your educational field/Course?</Label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="courseRelated" id="inlineRadio1" value="Yes" 
                                    
                                    <?php
                                    if($form["courseRelated"] == "Yes"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="courseRelated" id="inlineRadio2" value="No"
                                    
                                    <?php
                                    if($form["courseRelated"] == "No"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                </div> 
                            </div>
                            <div class="mb-3 col-12">
                                <Label>7. Occupational Classification</Label><br>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Corporate Executive or Manager" 
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Corporate Executive or Manager"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Corporate Executive or Manager</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Managing Proprietor or Supervisor"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Managing Proprietor or Supervisor"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Managing Proprietor or Supervisor</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Official of Government and Special Interest Organization"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Official of Government and Special Interest Organization"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Official of Government and Special Interest Organization</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Educational"

                                    <?php
                                    if(($fetched->occupationClass) == "Educational"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Educational</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Laborer or Unskilled Worker"

                                    <?php
                                    if(($fetched->occupationClass) == "Laborer or Unskilled Worker"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Laborer or Unskilled Worker</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Special Occupation eg. travelling nurse, LPN"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Special Occupation eg. travelling nurse, LPN"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Special Occupation eg. travelling nurse, LPN</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Technician or Associate Professional"
                                    <?php
                                    if(($fetched->occupationClass) == "Technician or Associate Professional"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Technician or Associate Professional</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Trader or Related Worker"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Trader or Related Worker"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Trader or Related Worker</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Market Sales Worker"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Market Sales Worker"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Market Sales Worker</label>
                                </div>   
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Clerk"
                                    
                                    <?php
                                    if(($fetched->occupationClass) == "Clerk"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">Clerk</label>
                                </div>   
                            
                            </div>
                            <div class="mb-3 col-12">
                                <Label>8. Number of years in the company</Label>
                                <br>
                                
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="1-5" 
                                    
                                    <?php
                                    if(($fetched->compYears) == "1-5"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">1-5</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="6-10"
                                    
                                    <?php
                                    if(($fetched->compYears) == "6-10"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">6-10</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="11-15"
                                    
                                    <?php
                                    if(($fetched->compYears) == "11-15"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">11-15</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="16-20"
                                    
                                    <?php
                                    if(($fetched->compYears) == "16-20"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">16-20</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="21-25"
                                    
                                    <?php
                                    if(($fetched->compYears) == "21-25"){
                                        echo "checked";
                                    } ?>
                                    >
                                    <label class="form-check-label" for="inlineRadio1">21-25</label>
                                </div> 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="25 above" 
                                    <?php
                                    if(($fetched->compYears) == "25 above"){
                                        echo "checked";
                                    } ?>>
                                    <label class="form-check-label" for="inlineRadio1">25 above</label>
                                </div> 
                            </div>
                            <div class="mb-3 col-12 d-none">
                                <Label>9. Monthly Income Range</Label><br><b> 
                                    
                                <input type="text"name="incomeRanged" value="<?php echo ($fetched->incomeRanged); ?>" />
                            
                            </div>
                            
                            <div class="mb-3 col-12 d-none">
                                <Label>10. How satisfied are you with your job?</Label>
                                <input type="text"name="statisfied" value="<?php echo ($fetched->statisfied); ?>" />
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="mb-3 col-md-12 d-none ">
                            <label for="validationCustom05" class="form-label">Do you have any suggestions that you feel will be useful improving the program / services of Arellano University for its future graduates? What are they?<span class="text-danger"></span></label><br>
                            
                            <input type="text"name="suggestions" value="<?php echo ($fetched->suggestions); ?>" />
                        </div>
                        <div class="mb-3 col-md-12 d-none ">
                            <label for="validationCustom05" class="form-label">Do you have suggestions for the alumni association to undertake for its alumni? What are they?<span class="text-danger"></span></label><br><b> <?php echo ($fetched->alumnisuggest); ?></b>     
                            
                            <input type="text"name="alumnisuggest" value="<?php echo ($fetched->alumnisuggest); ?>" />
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" id="submit" type="submit">Update</button>    
                                        
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
<?php 
include('../includes/footer.php'); 
include('../includes/scripts.php');    
?>
<script>

    $(document).ready(function(){
        
     
        $("#noEmployed").click(function(){
            $(".unEmployed").css("display","unset");
            $(".Employed").css("display","none");
        });
        $("#yesEmployed, #selfEmployed").click(function(){
            $(".unEmployed").css("display","none");
            $(".Employed").css("display","unset");
        });

        $("#schooolDataID").change(function(){
            var id =$(this).find(':selected').data('id');
            $("#testSchoolID").val(id);
        });
    });
</script>
</html>