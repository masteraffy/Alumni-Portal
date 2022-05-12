<?php 
include('security.php');
include "../dbconfig.php";
$id = $_GET['id'];
// print_r($id);
$query = "SELECT * FROM students WHERE id  = '$id' ";
$query_run = mysqli_query($connection, $query);
$user = mysqli_fetch_array($query_run);

$query = "SELECT * FROM batch WHERE Name  =".$id;
$query_run = mysqli_query($connection, $query);
$batch = mysqli_fetch_array($query_run);
$batch_row_cnt = mysqli_num_rows($query_run);


$query = "SELECT * FROM studentforms WHERE studID  =".$id;
$query_run = mysqli_query($connection, $query);
$form = mysqli_fetch_array($query_run);

$row_cnt = mysqli_num_rows($query_run);
$display;
$displayMsg;
$msg;
if($row_cnt > 0){
$fetched = (json_decode($form['Description']));
 $display= "unset";
 $displayMsg= "none";
 $msg= "";
}
else{
 $display= "none";
 $displayMsg= "block";
 $msg ="Student Survey Form is still on process.";    
 echo ("<script LANGUAGE='JavaScript'>
 window.alert('Student Survey Form is still on process.');
 window.location.href='viewProfileInc.php';
 </script>");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/a81368914c.js"></script>
        <!-- <script src="./app.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
</head>
<body>




<div class="container-fluid">

    <div class = "card shadow mb-4">
            <div class = "card-header py-3">
                <h6 class= "m-0 font-weight-bold text-primary">
                Alumni Profile  
               </h6>    
               <div>
                <a href="alumni.php" class= "m-0 font-weight-bold text-primary" style="text-align:right; width: 100%;">
                    Back to Alumni List                    
                <a>
              </div>
                <div class="alert alert-warning mt-1" style="<?php echo "display:".$displayMsg ?>">
                   <?php echo $msg ?>
                 </div>

                    
            </div>

            <div class="container mt-2">
            <ul class="nav nav-tabs">
                
            <!-- <a href="editProfile.php" 
            style="text-align: right;
                   float: right;
                   width: 100%;">Edit Profile</a> -->
                
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
                                    $photo =  "/alumni/students/profilePic/2-user_pic.jpg";
                                }
                                else{
                                    $photo =  "/alumni/students/".$user['photo'];
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
    </div>
</div>
   

</body>
</html>