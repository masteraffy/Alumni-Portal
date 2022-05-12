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
        <script src="./app.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="style.css" /> -->
</head>
<body>
<main>
    

        <div class="container mt-2">
            <h3> Please Fill up The Form</h3>
            <ul class="nav nav-tabs">
                <li class="nav-item"><a id="BI_btn" class="nav-link active" data-bs-toggle="tab" href="#BI">General Informations</a></li>
                <li class="nav-item"><a id="WS_btn" class="nav-link"data-bs-toggle="tab" href="#WS">Education and Work</a></li>
                <li class="nav-item"><a id="LA_btn" class="nav-link"data-bs-toggle="tab" href="#LA">Life After my college days</a></li>

                <li class="nav-item"><a id="EI_btn" class="nav-link"data-bs-toggle="tab" href="#Employment">Employment Information</a></li>
            </ul>
            <form method="POST" action="samplecode.php" >
            <div class="tab-content">
                <div class="tab-pane active" id="BI">
                    <div class="row">
                    <hr>
                    <h3>Personal Information</h3>
                            <div class="mb-3 col-4">
                                <label for="validationCustom01" class="form-label">Last Name<span class="text-danger">*</span></label>
                                <input type="hidden" name="id" value="<?php echo $id ; ?>" />
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name" value="<?php echo $user["lastname"]; ?>"  >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="validationCustom02" class="form-label">First Name<span class="text-danger">*</span></label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First Name" value="<?php echo $user["firstname"]; ?>"  >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-4">
                                <label for="validationCustom03" class="form-label">Middle Name<span class="text-danger">*</span></label>
                                <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter Middle Name"  value="<?php echo $user["middleName"]; ?>" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-4">
                                <Label>Gender</Label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male">
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                  </div>
                            </div>
                            <div class="mb-3 col-8">
                                <Label>Civil Status</Label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio12" value="Single" checked>
                                    <label class="form-check-label" for="inlineRadio12">Single</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio22" value="Married">
                                    <label class="form-check-label" for="inlineRadio22">Married</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="Seperated">
                                    <label class="form-check-label" for="inlineRadio3">Seperated</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio4" value="Widow / Widower">
                                    <label class="form-check-label" for="inlineRadio4">Widow / Widower</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="inlineRadio5" value="Single Parent">
                                    <label class="form-check-label" for="inlineRadio5">Single Parent</label>
                                  </div>
                            </div>
                            
                            
                            <div class="mb-3 col-6">
                                <label for="validationCustom08">Date of Birth<span class="text-danger">*</span></label>
                                    <div class="col-sm-12">
                                        <div class="input-group date" id="datepicker">
                                            <input type="date" value="<?php echo $user["birthday"]; ?>"  id="bday" name="dateofbirth" class="form-control" >
                                                <div class="invalid-feedback">
                                                        This field is Required!
                                                </div>  
                                        </div>
                                    </div>
                                    
                            </div>
                            <div class="mb-3 col-md-6">
                                    <label for="validationCustom06">Email Address:<span class="text-danger">*</span></label>
                                    <input type="email" name="emailaddress" id="emailaddress" 
                                    value="<?php echo $user["email"]; ?>" class="form-control" placeholder="Enter Email Address" >
                                    <div class="invalid-feedback">
                                        This field is Required!
                                    </div>
                            </div>
                            <hr>
                            <h3>Contact Information</h3>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Personal Contact Number<span class="text-danger">*</span></label>
                                <input type="text" value="<?php echo $user['contact']; ?>" name="contactnumber" id="contactnumber" class="form-control" placeholder="Enter Contact Number" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Work Contact Number<span class="text-danger">*</span></label>
                                <input type="text" name="work_contactnumber" id="work_contactnumber" class="form-control" placeholder="Enter Work Contact Number" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Mailing Address<span class="text-danger">*</span></label>
                                <input type="text" name="mailingAddress" id="mailingAddress" class="form-control" placeholder="Enter Mailing Address" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Present Address<span class="text-danger">*</span></label>
                                <input type="text" name="presentAddress" value="<?php echo $user['address']; ?>" id="presentAddress" class="form-control" placeholder="Enter Present Address" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="validationCustom07">Provincial Address<span class="text-danger">*</span></label>
                                <input type="text" name="provincialAddress" id="provincialAddress" class="form-control" placeholder="Enter Provincial Address" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>
                            
                              
                            <hr>
                            <h3>Social Accounts</h3>                                      
                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Facebook URL<span class="text-danger">*</span></label>
                                <input type="text" name="fbUrl" id="fbUrl" class="form-control" placeholder="Enter Facebook URL" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>      

                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Gmail Account<span class="text-danger">*</span></label>
                                <input type="text" name="gmailUrl" id="gmailUrl" class="form-control" placeholder="Enter Gmail Account" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>  
                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Linked-In Account<span class="text-danger">*</span></label>
                                <input type="text" name="linkedUrl" id="linkedUrl" class="form-control" placeholder="Enter Linked-In Account" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>   
                            <div class="mb-3 col-md-6">  
                                <label for="validationCustom07">Other Social Account<span class="text-danger">*</span></label>
                                <input type="text" name="otherUrl" id="otherUrl" class="form-control" placeholder="Enter Other Social Account" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                            </div>  
                                                                 
                    </div>  
                    <hr>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">  
                    </div>
                </div>
                
                <div class="tab-pane" id="WS">
                    <div class="row">                        
                        <hr>
                        <h3>Educational Background</h3>              
                        
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Degree Earn in Arellano University<span class="text-danger">*</span></label>
                        <select name="course" class="form-control">
                            <option value="<?php echo $courseID = $user["courseGraduated"]; ?>"
                            ><?php
                            $courseID = $user["courseGraduated"]; 
                            if($courseID != ' '){
                            $course = "SELECT * FROM course WHERE id  =".$courseID;
                            $query_run = mysqli_query($connection, $course);
                            $courseName = mysqli_fetch_array($query_run);
                            echo $courseName['title'];
                            }
                            else{
                                echo "Select";
                            }
                            ?>
                        </option>
                            <?php
                                $query = "SELECT * FROM course";
                                $branch = mysqli_query($connection, $query);
                                if(mysqli_num_rows($branch) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($branch))
                                    {
                            ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['code']."-".$row['title']; ?></option>
                            <?php
                                    }
                                }
                            ?>    
                        </select>      
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>                                     
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Major<span class="text-danger"></span></label>
                            <input type="text" name="major" class="form-control" id="validationCustom10" placeholder="Pleae Input your Major if non leave blank" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div> 
                        <div class="mb-3 col-6">
                            <label for="validationCustom04" class="form-label">Campus Graduated<span class="text-danger">*</span></label>
                            <select class="form-select" name="schoolAttended" id="validationCustom04" aria-label="Default select example" >
                                <option><?php echo $user['schoolAttended']; ?></option>
                                <?php
                                    $query = "SELECT * FROM branch";
                                    $branch = mysqli_query($connection, $query);
                                    if(mysqli_num_rows($branch) > 0)
                                    {
                                        while($row = mysqli_fetch_assoc($branch))
                                        {
                                ?>
                                            <option><?php echo $row['Name']." - ".$row['Address']; ?></option>
                                <?php
                                        }
                                    }
                                ?> 
                            </select>
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>                                     
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom05" class="form-label">Year Graduated<span class="text-danger"></span></label>
                            <input type="text" value="<?php echo $batch['Description']; ?>" name="yeargraduated" id="validationCustom05" class="form-control" placeholder="Example: 2021, 2022" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Awards / Honors Received<span class="text-danger"></span></label>
                            <input type="text" name="awards" id="validationCustom05" class="form-control" placeholder="Please Input Awards / Honors Received if non leave blank" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div>
                        <hr>
                        <h3>Employment Background</h3> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Company:<span class="text-danger"></span></label>
                            <input type="text" name="company" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div>  
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Position:<span class="text-danger"></span></label>
                            <input type="text" name="positionWork" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Location:<span class="text-danger"></span></label>
                            <input type="text" name="location" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Description:<span class="text-danger"></span></label>
                            <input type="text" name="description" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div> 
                        <div class="mb-3 col-md-6">
                            <label for="validationCustom10" class="form-label">Year:<span class="text-danger"></span></label>
                            <input type="text" name="employeeYear" class="form-control" id="validationCustom10" placeholder="Example: 2021-2022" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
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

                <div class="tab-pane" id="LA">
                    <div class="row">
                        <hr>
                        <h3>Advance Trainings / Studies / Graduate School</h3>
                        <div class="mb-3 col-12">
                            <Label>1. Did you pursue further studies?</Label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pursueStudy" id="inlineRadio1" value="Yes" checked>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pursueStudy" id="inlineRadio2" value="No" >
                                <label class="form-check-label" for="inlineRadio2">No</label>
                              </div>                             
                        </div>  
                        <Label>2. Please list down all professional or work-related training program(s) including further studies you have attended after college.</Label><br>
                        <div class="mb-3 col-md-4">
                            <label for="training" class="form-label">Title of Training / Advance Study / Course<span class="text-danger"></span></label>
                            <input type="text" name="training" id="training" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="creditsEarned" class="form-label">Duration and Credits Earned<span class="text-danger"></span></label>
                            <input type="text" name="creditsEarned" id="creditsEarned" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="trainingIns" class="form-label">Training Institution / College / University<span class="text-danger"></span></label>
                            <input type="text" name="trainingIns" id="trainingIns" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-12">
                            <label>3. What made you pursue further studies?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pursueFurther" id="forPromotion" value="For Promotion" checked>
                                <label class="form-check-label" for="forPromotion">For Promotion</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="pursueFurther" id="ForProfessional" value="ForProfessional">
                                <label class="form-check-label" for="ForProfessional">For Professional Development</label>
                            </div>                              
                            <br>
                            <label for="othersReason" class="form-label">Others:<span class="text-danger"></span></label>
                            <input type="text" name="pursueOthers" class="form-control" id="othersReason" placeholder="Please state your answer">
                        </div>
                        <Label>4. What do you think are the skills, knowledge and trainings you received from Arellano University that proved to be useful to your current job / business / further studies?</Label><br>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Skills / Knowledge in <span class="text-danger"></span></label>
                            <input type="text" name="skills" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Training in<span class="text-danger"></span></label>
                            <input type="text" name="trainingIn" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>
                            <input type="text" name="otherTraining" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-12">
                            <label>5. To what extent is the usefulness of these acquired knowledge, skills, and trainings?</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skillsandtraining" id="inlineRadio1" value="Very useful" checked>
                                <label class="form-check-label" for="inlineRadio1" >Very useful</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skillsandtraining" id="inlineRadio2" value="Moderately useful">
                                <label class="form-check-label" for="inlineRadio2">Moderately useful</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skillsandtraining" id="inlineRadio1" value="Occasionally useful">
                                <label class="form-check-label" for="inlineRadio1">Occasionally useful</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="skillsandtraining" id="inlineRadio1" value="Not at all useful">
                                <label class="form-check-label" for="inlineRadio1">Not at all useful</label>
                            </div>                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>6. How would you rate the overall effectiveness of Arellano University in preparing its graduates to meet the demands in the workplaces</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="overalAll" id="inlineRadio1" value="Very effective" checked>
                                <label class="form-check-label" for="inlineRadio1">Very effective</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="overalAll" id="inlineRadio2" value="Effective">
                                <label class="form-check-label" for="inlineRadio2">Effective</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="overalAll" id="inlineRadio1" value="Ineffective">
                                <label class="form-check-label" for="inlineRadio1">Ineffective</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="overalAll" id="inlineRadio1" value="Very Ineffective">
                                <label class="form-check-label" for="inlineRadio1">Very Ineffective</label>
                            </div>                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>7. How would you rate your personal experiences during enrollment at Arellano University?</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="personalExp" id="inlineRadio1" value="Very satisfied" checked>
                                <label class="form-check-label" for="inlineRadio1">Very satisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="personalExp" id="inlineRadio2" value="Satisfied">
                                <label class="form-check-label" for="inlineRadio2">Satisfied</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="personalExp" id="inlineRadio1" value="dissatisfied">
                                <label class="form-check-label" for="inlineRadio1">dissatisfied</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="personalExp" id="inlineRadio1" value="Very dissatisfied">
                                <label class="form-check-label" for="inlineRadio1">Very dissatisfied</label>
                            </div>                           
                        </div>
                        <div class="mb-3 col-12">
                            <label>8. Based on your experiences, how would you compare Arellano graduates with those from other Universities who were hired for a similar position?</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compare" id="inlineRadio1" value="Better prepared" checked>
                                <label class="form-check-label" for="inlineRadio1">Better prepared</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compare" id="inlineRadio2" value="Equally prepared">
                                <label class="form-check-label" for="inlineRadio2">Equally prepared</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compare" id="inlineRadio1" value="Poorly prepared">
                                <label class="form-check-label" for="inlineRadio1">Poorly prepared</label>
                            </div>
                            <br>
                            <label for="validationCustom05" class="form-label">Others<span class="text-danger"></span></label>
                            <input type="text" name="prepareOthers" id="validationCustom05" class="form-control" placeholder="Please state your answer">                         
                        </div>
                        <Label>9. Kindly reflect all achievements/recognitions/ or awards accorded to you after graduation from Arellano University</Label><br>
                        <div class="mb-3 col-md-4">
                            <center>
                            <label for="validationCustom05" class="form-label">Award<span class="text-danger"></span></label>
                            </center>
                            <input type="text" name="Award" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-4">
                            <center>
                            <label for="validationCustom05" class="form-label">Granting Institution<span class="text-danger"></span></label>
                            </center>
                            <input type="text" name="GrantingInstitution" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>
                        <div class="mb-3 col-md-4">
                            <center>
                            <label for="validationCustom05" class="form-label">Year<span class="text-danger"></span></label>
                            </center>
                            <input type="text" name="year" id="validationCustom05" class="form-control" placeholder="Please state your answer"> 
                        </div>

                    </div>
                
                </div>
                
                <div class="tab-pane" id="Employment">
                    <div class="row">                        
                        <hr>
                        <h3>Work Survey</h3>              
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">What was your first job after graduation?<span class="text-danger"></span></label>
                            <input type="text" name="firstJob" id="validationCustom05" class="form-control" placeholder="Please state your answer">
                            
                        </div>
                        <div class="mb-3 col-12">
                            <Label>How long did it take for you get this job?</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio1" value="Less than a month" checked>
                                <label class="form-check-label" for="inlineRadio1">Less than a month</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="1-6 months">
                                <label class="form-check-label" for="inlineRadio2">1-6 months</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="7-11 months">
                                <label class="form-check-label" for="inlineRadio3">7-11 months</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="1 yr. to less than 2 yrs">
                                <label class="form-check-label" for="inlineRadio4">1 yr. to less than 2 yrs</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="2 yrs. to less than 3 yrs">
                                <label class="form-check-label" for="inlineRadio">2 yrs. to less than 3 yrs</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="3 yr. to less than 4 yrs">
                                <label class="form-check-label" for="inlineRadio4">3 yr. to less than 4 yrs</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="getJob" id="inlineRadio2" value="More than 4 yrs">
                                <label class="form-check-label" for="inlineRadio">More than 4 yrs</label>
                              </div>
                        </div>
                        <div class="mb-3 col-12">
                            <Label>How did you acquire your current job?</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acquired" id="inlineRadio1" value="Personal applied for the job" checked>
                                <label class="form-check-label" for="inlineRadio1" >Personal applied for the job</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acquired" id="inlineRadio2" value="Arranged school's job placement">
                                <label class="form-check-label" for="inlineRadio2">Arranged school's job placement</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acquired" id="inlineRadio2" value="Recommended by Au faculty/deans">
                                <label class="form-check-label" for="inlineRadio3">Recommended by Au faculty/deans</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="acquired" id="inlineRadio2" value="Directly invited by the company">
                                <label class="form-check-label" for="inlineRadio4">Directly invited by the company</label>
                              </div>
                              <br>
                              <label for="validationCustom10" class="form-label">Others:<span class="text-danger"></span></label>
                            <input type="text" name="acquiredOthers" class="form-control" id="validationCustom10" placeholder="Please state your answer" >                                                         
                        </div>
                        <hr>
                        <label><b>Plase provide information regarding your current empoyment status</b></label>
                        <div class="mb-3 col-12">
                            <Label>1. How long did it take for you get this job?</Label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employementStat" id="inlineRadio1" value="optLocalion1" checked>
                                <label class="form-check-label" for="inlineRadio1">Local</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="employementStat" id="inlineRadio2" value="Abroad">
                                <label class="form-check-label" for="inlineRadio2">Abroad</label>
                              </div>                             
                        </div>
                        <div class="mb-3 col-12">
                            <Label>2. Are you currently employed?</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio1" value="Yes" checked>
                                <label class="form-check-label" for="inlineRadio1" >Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio2" value="No">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio1" value="Self employed">
                                <label class="form-check-label" for="inlineRadio1">Self employed</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio2" value="Managing own company/Business">
                                <label class="form-check-label" for="inlineRadio2">Managing own company/Business</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio1" value="Retired">
                                <label class="form-check-label" for="inlineRadio1">Retired</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="currentlyEmp" id="inlineRadio2" value="Never employed">
                                <label class="form-check-label" for="inlineRadio2">Never employed</label>
                            </div>
                            <label for="validationCustom10" class="form-label">*In case of unemployed, state your reason(s) why you are unemployed</label>
                            <input type="text" name="unEmployed" class="form-control" id="validationCustom10" placeholder="Please state your answer" >                              
                        </div>
                        <div class="mb-3 col-12">
                            <Label>3. Type of Organization</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio1" value="Private" checked>
                                <label class="form-check-label" for="inlineRadio1" checked>Private</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio2" value="Public">
                                <label class="form-check-label" for="inlineRadio2">Public</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="typeOrg" id="inlineRadio1" value="NGO">
                                <label class="form-check-label" for="inlineRadio1">NGO</label>
                            </div>
                            <br>
                            <label for="validationCustom10" class="form-label">Others:<span class="text-danger"></span></label>
                            <input type="text" name="otherOrg" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                        </div>
                        <div class="mb-3 col-12">
                            <Label>4. Present Employment Status</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Regular/Permanent" checked>
                                <label class="form-check-label" for="inlineRadio1">Regular/Permanent</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio2" value="Casual">
                                <label class="form-check-label" for="inlineRadio2">Casual</label>
                            </div>  
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Part Time">
                                <label class="form-check-label" for="inlineRadio1">Part Time</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="presentStatus" id="inlineRadio1" value="Contractual">
                                <label class="form-check-label" for="inlineRadio1">Contractual</label>
                            </div>                           
                        </div>
                        <div class="mb-3 col-12">
                            <Label>5. Name of Present Employer/Company:</Label>
                            <input type="text" name="presentEmployer" class="form-control" id="validationCustom10" placeholder="Pleae state your answer" >     
                        </div>
                        
                        <div class="mb-3 col-6">
                                <label for="validationCustom01" class="form-label">6. Postion<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="validationCustom01" name="position" placeholder="Please state your answer" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                        </div>
                        <div class="mb-3 col-6">
                                <label for="validationCustom02" class="form-label">Since When<span class="text-danger">*</span></label>
                                <input type="text" name="when" id="validationCustom02" class="form-control" placeholder="Please state your answer" >
                                <div class="invalid-feedback">
                                    This field is Required!
                                </div>
                        </div>  
                        <div class="mb-3 col-12">
                            <Label>7. Occupational Classification</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Corporate Executive or Manager" checked>
                                <label class="form-check-label" for="inlineRadio1">Corporate Executive or Manager</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Managing Proprietor or Supervisor">
                                <label class="form-check-label" for="inlineRadio1">Managing Proprietor or Supervisor</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Official of Government and Special Interest Organization">
                                <label class="form-check-label" for="inlineRadio1">Official of Government and Special Interest Organization</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Educational">
                                <label class="form-check-label" for="inlineRadio1">Educational</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Laborer or Unskilled Worker">
                                <label class="form-check-label" for="inlineRadio1">Laborer or Unskilled Worker</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Special Occupation eg. travelling nurse, LPN">
                                <label class="form-check-label" for="inlineRadio1">Special Occupation eg. travelling nurse, LPN</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Technician or Associate Professional">
                                <label class="form-check-label" for="inlineRadio1">Technician or Associate Professional</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Trader or Related Worker">
                                <label class="form-check-label" for="inlineRadio1">Trader or Related Worker</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Market Sales Worker">
                                <label class="form-check-label" for="inlineRadio1">Market Sales Worker</label>
                            </div>   
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="occupationClass" id="inlineRadio1" value="Clerk">
                                <label class="form-check-label" for="inlineRadio1">Clerk</label>
                            </div>   
                            <br>
                            <label for="validationCustom10" class="form-label">Others:<span class="text-danger"></span></label>
                            <input type="text" name="otherClass" class="form-control" id="validationCustom10" placeholder="Please state your answer" >
                        </div>
                        <div class="mb-3 col-12">
                            <Label>8. Number of years in the company</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="1-5" checked>
                                <label class="form-check-label" for="inlineRadio1">1-5</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="6-10">
                                <label class="form-check-label" for="inlineRadio1">6-10</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="11-15">
                                <label class="form-check-label" for="inlineRadio1">11-15</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="16-20">
                                <label class="form-check-label" for="inlineRadio1">16-20</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="21-25">
                                <label class="form-check-label" for="inlineRadio1">21-25</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="compYears" id="inlineRadio1" value="25 above">
                                <label class="form-check-label" for="inlineRadio1">25 above</label>
                            </div> 
                        </div>
                        <div class="mb-3 col-12">
                            <Label>9. Monthly Income Range</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="Below 10,000" checked>
                                <label class="form-check-label" for="inlineRadio1">Below 10,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="10,000-20,000">
                                <label class="form-check-label" for="inlineRadio1">10,000-20,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="21,000-30,000">
                                <label class="form-check-label" for="inlineRadio1">21,000-30,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="31,000-40,000">
                                <label class="form-check-label" for="inlineRadio1">31,000-40,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="41,000-50,000">
                                <label class="form-check-label" for="inlineRadio1">41,000-50,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="51,000-60,000">
                                <label class="form-check-label" for="inlineRadio1">51,000-60,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="61,000-70,000">
                                <label class="form-check-label" for="inlineRadio1">61,000-70,000</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeRanged" id="inlineRadio1" value="71,000 above<">
                                <label class="form-check-label" for="inlineRadio1">71,000 above</label>
                            </div> 
                        </div>
                        <div class="mb-3 col-12">
                            <Label>10. How satisfied are you with your job?</Label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statisfied" id="inlineRadio1" value="Very satisfied" checked>
                                <label class="form-check-label" for="inlineRadio1">Very satisfied</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statisfied" id="inlineRadio1" value="Satisfied">
                                <label class="form-check-label" for="inlineRadio1">Satisfied</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statisfied" id="inlineRadio1" value="Dissatisfied">
                                <label class="form-check-label" for="inlineRadio1">Dissatisfied</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="statisfied" id="inlineRadio1" value="Very dissatisfied">
                                <label class="form-check-label" for="inlineRadio1">Very dissatisfied</label>
                            </div>                            
                        </div>
                        <br>
                        <br>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Do you have any suggestions that you feel will be useful improving the program / services of Arellano University for its future graduates? What are they?<span class="text-danger"></span></label>
                            <input type="text" name="address" id="validationCustom05" class="form-control" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div>
                        <div class="mb-3 col-md-12">
                            <label for="validationCustom05" class="form-label">Do you have suggestions for the alumni association to undertake for its alumni? Whar are they?<span class="text-danger"></span></label>
                            <input type="text" name="alumnisuggest" id="validationCustom05" class="form-control" placeholder="Please state your answer" >
                            <div class="invalid-feedback">
                                This field is Required!
                            </div>
                        </div>
                        <hr>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Submit</button>    
                            <a href=""></a>                
                        </div>
                    </div>
                </div>
                </form>
            </div>  
        </div>

    </main>
</body>
</html>