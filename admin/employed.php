<?php 
include('security.php');
include('../includes/header.php');
include('../includes/navbar.php');
include "../dbconfig.php";
?>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="addadminprofile" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Alumni</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="code.php" method="POST">
            <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        
                        <div class="col-4">
                            <label>First Name:</label>
                            <input type ="text" name="firstname" class="form-control" placeholder="Enter First">
                        </div>
                            
                        <div class="col-4">
                            <label>Middle Name:</label>
                            <input type ="text" name="middlename" class="form-control" placeholder="Enter Middle">
                        </div>
                        <div class="col-4">

                            <label>Last Name:</label>
                            <input type ="text" name="lastname" class="form-control" placeholder="Enter Last">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row"> 
                        
                        <div class="col-6">
                            
                            <label>Gender:</label>
                            <select name="gender" class="form-control" tabindex="10" >
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        
                        <div class="col-6">
                            
                            <label>Birthday:</label>
                            <input type="date" name="birthday" class="form-control" placeholder="Rizal" tabindex="10">
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                        
                    <div class="form-group col-6">
                        <label>Email:</label>
                        <input type ="email" name="email" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group col-6">
                        <label>Contact #:</label>
                        <input type ="number" autocomplete="off" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"
                        onKeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57"
                        name="contact" id="contact_insert" class="form-control" placeholder="Enter contact #">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Address:</label>
                        <textarea class="form-control" name="address"></textarea>  
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>School:</label>
                        <select name="schoolAttended" class="form-control">
                        <option value="">Select</option>
                            <?php
                                $query = "SELECT * FROM branch";
                                $branch = mysqli_query($connection, $query);
                                if(mysqli_num_rows($branch) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($branch))
                                    {
                                        echo $row['Name'];
                            ?>
                                        <option><?php echo $row['Name']." - ".$row['Address']?></option>
                            <?php
                                    }
                                }
                            ?>    
                        </select>                
                    </div>

                    <div class="form-group col-6">
                        <label>Course:</label>
                        <select name="course" class="form-control">
                            <option value="">Select</option>
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
                    </div>

                </div>
                
                <div class="row">
                    <div class="form-group col-6">
                        <label>Current Work:</label>
                        <input type ="text" name="currentWork" class="form-control" placeholder="Enter Current Work">
                    </div>
                    <div class="form-group col-6">
                    <label>Year Graduated</label>
                            <input type="number"onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" class="form-control" name="yeargraduated"  placeholder="2015" tabindex="10" required>
                    </div>

                </div>
                <div class="row d-none">
                    <div class="form-group col-6">
                        <label>Password:</label>
                        <input type ="password" value="123456" name="password" id="password_insert" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-6">
                        <label>Confirm Password:</label>
                        <input type ="password"  value="123456"  name="confirmpassword" id="confirmpassword_insert" class="form-control" placeholder="Enter Confirm Password">
                    </div>

                </div>
                <div id="error"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="alumniInsert" id="alumniInsert" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="updateadminprofile" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Alumni</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
              
    <div class="modal-body">
    <form action="code.php" method="POST">
            <div class="modal-body">

                <div class="form-group">
                    <div class="row">
                        <input type="hidden" name="edit_id" id="edit_id" class="form-control" placeholder="Enter First">

                        <div class="col-4">
                            <label>First Name:</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter First">
                        </div>
                            
                        <div class="col-4">
                            <label>Middle Name:</label>
                            <input type="text" name="middlename" id="middlename" class="form-control" placeholder="Enter Middle">
                        </div>
                        <div class="col-4">

                            <label>Last Name:</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Last">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row"> 
                        
                        <div class="col-6">
                            
                            <label>Gender:</label>
                            <select name="gender" class="form-control" tabindex="10">
                                <option id="gender"></option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        
                        <div class="col-6">
                            
                            <label>Birthday:</label>
                            <input type="date" name="birthday" id="birthday" class="form-control" placeholder="Rizal" tabindex="10">
                        </div>
                        
                    </div>
                </div>

                <div class="row">
                        
                    <div class="form-group col-6">
                        <label>Email:</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group col-6">
                        <label>Contact #:</label>
                        <input type="number" autocomplete="off" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;"
                        onKeypress="return event.keyCode === 8 || event.charCode >= 48 && event.charCode <= 57"
                        name="contact" id="contact" class="form-control" placeholder="Enter contact #">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-12">
                        <label>Address:</label>
                        <textarea class="form-control" id="address" name="address"></textarea>  
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>School:</label>
                        <select name="schoolAttended" class="form-control">
                        <option  id="schoolAttended">Select</option>
                            <?php
                                $query = "SELECT * FROM branch";
                                $branch = mysqli_query($connection, $query);
                                if(mysqli_num_rows($branch) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($branch))
                                    {
                                        echo $row['Name'];
                            ?>
                                        <option><?php echo $row['Name']." - ".$row['Address']?></option>
                            <?php
                                    }
                                }
                            ?>    
                        </select>  
                        </select>                
                    </div>

                    <div class="form-group col-6">
                        <label>Course:</label>
                        <select name="course" class="form-control">
                        <option id="course">Select</option>
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
                    </div>

                </div>
                
                <div class="row">
                    <div class="form-group col-6">
                        <label>Current Work:</label>
                        <input type="text" id="currentWork" name="currentWork" class="form-control" placeholder="Enter Current Work">
                    </div>
                    <div class="form-group col-6">
                    <label>Year Graduated</label>
                            <input type="number"onKeyDown="if(this.value.length==4 && event.keyCode!=8) return false;" class="form-control" id="yeargraduated" name="yeargraduated"  placeholder="2015" tabindex="10" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Password:</label>
                        <input type="password" name="password"  id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-6">
                        <label>Confirm Password:</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter Confirm Password">
                    </div>

                </div>
                
                <div id="error_edit"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="alumniEdit" id="alumniEdit" class="btn btn-primary">Save</button>
            </div>
        </form>
    
    </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewProfile" tabindex="-1" role = "dialog"aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role = "document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Alumni</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
              
    <div class="modal-body">
    <div class="row">
        <div class="col-3">
            <img id="pic" width="150" height="150" />
        </div>
        <div class="col-9">
            <h2>Alumni Information</h2>
            <h5 id="fullname_view"></h5>
            <h5 id="birthday_view"></h5>
            <h5 id="gender_view"></h5>
            <h5 id="address_view"></h5>
            <hr/>
            <h2>Contact Details</h2>
            <h5 id="email_view"></h5>
            <h5 id="contanct_view"></h5>
            <hr/>
            <h2>Alumni History</h2>
            <h5 id="schoolAttended_view"></h5>
            <h5 id="course_view"></h5>
            <h5 id="yeargraduated_view"></h5>
            <h5 id="currentWork_view"></h5>
            
            
        </div>
    </div>
    
    </div>
    </div>
  </div>
</div>
<div class="container-fluid">

<!-- Data tables -->

<div class = "card shadow mb-4">
    <div class = "card-header py-3">
        <h6 class= "m-0 font-weight-bold text-primary">
            List of Alumni - Employed
            <!-- <button type="button" class="btn btn-primary float-end" data-toggle="modal" data-target="#addadminprofile">
                Add Alumni
            </button> -->
        <h6>
    </div>

    <div class = "card-body">

    <?php
        if(isset($_SESSION['success']) && $_SESSION['success'] !='')
        {
            echo '<div class="alert alert-success"> '.$_SESSION['success'].' </div>';
            unset($_SESSION['success']); 
        }
        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
        {
            echo '<div class="alert alert-danger"> '.$_SESSION['status'].' </div>';
            unset($_SESSION['status']); 
        }
    ?>
        <div class= "table-responsive">

        <?php
            if($user['userData'] == "Employee"){
                                  
            $query = "SELECT * from students 
            LEFT JOIN course
            ON students.courseGraduated = course.id
            WHERE CurrentWork !=''
            AND  interest =".$user['BranchId'];
            $query_run = mysqli_query($connection, $query);
        }
        else{
                                  
            $query = "SELECT * from students 
            LEFT JOIN course
            ON students.courseGraduated = course.id
            WHERE CurrentWork !='' ";
            $query_run = mysqli_query($connection, $query);

        }
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fullname</th>
                    <th>Contact Details</th>
                    <th>Experienced</th>
                    <!-- <th>ACTIONS</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['firstname']." ".$row['middleName']." ".$row['lastname']; ?> </td>     
                                <td> 
                                   <b>Email: <?php echo $row['email']; ?> </b>
                                   <br/>
                                   <b>Phone:  <?php echo $row['contact']; ?> </b>
                                   <br/>
                                   <b> Address :  <?php echo $row['address']; ?> </b>
                            
                                </td>
                                <td>
                                   <b>School: <?php echo $row['schoolAttended']; ?> </b>
                                   <br/>
                                   <b>Course:  <?php echo $row['title']; ?> </b>
                                   <br/>
                                   <b> Current Work :  <?php echo $row['CurrentWork']; ?> </b></td>
                              
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else
                    {
                        echo "No Record Found";
                    }
                ?>                
            </tbody>
        </table>
        </div>
    </div>
</div>

   
<?php 
include('../includes/footer.php'); 
include('../includes/scripts.php');    
?>
<script>
    $(document).ready(function(){
        $(".edit_btn").click(function(){
            $("#edit_id").val($(this).data("id"));
            $("#firstname").val($(this).data("fname"));
            $("#middlename").val($(this).data("mname"));
            $("#lastname").val($(this).data("lname"));
            $("#gender").html($(this).data("gender"));
            $("#birthday").val($(this).data("birthday"));
            $("#email").val($(this).data("email"));
            $("#contact").val($(this).data("contact"));
            $("#address").html($(this).data("address"));
            $("#course").val($(this).data("course"));
            $("#course").html($(this).data("coursetitle"));
            $("#schoolAttended").html($(this).data("school"));
            $("#currentWork").val($(this).data("currentwork"));
            $("#password").val($(this).data("pass"));
            $("#confirmpassword").val($(this).data("pass"));
            $("#yeargraduated").val($(this).data("yeargraduated"));
        });
        
        $(".view_btn").click(function(){
            var full = $(this).data("fname")+" "+$(this).data("mname")+" "+$(this).data("lname");
            let photo;
            if($(this).data("photo")==" "){
                photo ="/alumni/students/profilePic/userPic.jpg";
            }
            else{
                photo = "/alumni/students/"+$(this).data("photo");
            }
            
            $("#pic").attr("src",photo);
            $("#fullname_view").html("Name: "+full);
            $("#birthday_view").html("Date of birth: "+ $(this).data("birthday"));
            $("#gender_view").html("Gender: "+$(this).data("gender"));
            $("#email_view").html("Email Address:  " +$(this).data("email"));
            $("#address_view").html("Address:  " +$(this).data("address"));
            $("#contanct_view").html("Contact #:  " +$(this).data("contact"));
            $("#course_view").html("Course:  " +$(this).data("coursetitle"));
            $("#schoolAttended_view").html("School:  " +$(this).data("school"));
            $("#yeargraduated_view").html("Graduated Year:  " +$(this).data("yeargraduated"));
            $("#currentWork_view").html("Current Work:  " +$(this).data("currentwork"));
        });
        
        $("#contact_insert").blur(function() {
            if($(this).val().length > 10) {
                // Enable submit button
                $("#alumniInsert").removeAttr('disabled');
                $("#error").empty();
            } else {
                // Disable submit button
                $("#alumniInsert").attr('disabled','disabled');
                $("#error").empty();
                $("#error").append(`
                <div class="alert alert-danger" role="alert">
                    Invalid Contact Number
                </div>
                `);
            }
        });
        
        $("#contact").blur(function() {
            if($(this).val().length > 10) {
                // Enable submit button
                $("#alumniEdit").removeAttr('disabled');
                $("#error_edit").empty();
            } else {
                // Disable submit button
                $("#alumniEdit").attr('disabled','disabled');
                $("#error_edit").empty();
                $("#error_edit").append(`
                <div class="alert alert-danger" role="alert">
                    Invalid Contact Number
                </div>
                `);
            }
        });
    $("#password,#confirmpassword").keyup(function(){
            var pass=$("#password").val();
            var cpass=$("#confirmpassword").val();
            if(pass!=cpass){
                $("#error_edit").empty();
                $("#alumniEdit").attr('disabled','disabled');
                $("#error_edit").append(`
                <div class="alert alert-danger" role="alert">
                    Password and Confirm password doesn't match!
                </div>
                `);
            
            }
            else{
                $("#alumniEdit").removeAttr('disabled');
                $("#error_edit").empty();
            }
            
        });
        $("#password_insert,#confirmpassword_insert").keyup(function(){
            var pass=$("#password_insert").val();
            var cpass=$("#confirmpassword_insert").val();
            if(pass!=cpass){
                $("#error").empty();
                $("#alumniInsert").attr('disabled','disabled');
                $("#error").append(`
                <div class="alert alert-danger" role="alert">
                    Password and Confirm password doesn't match!
                </div>
                `);
            
            }
            else{
                $("#alumniInsert").removeAttr('disabled');
                $("#error").empty();
            }
            
        });
        $(".delete").click(function(){
            $("#delete_id").val($(this).data("id"));
            
        });
    });
</script>
</script>