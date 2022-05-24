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
  $id = $user["userID"];
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Al Trace It! (Setup)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
  <section class="login">
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">        
        <div class="card-body">
          <h4 class="title text-center mt-4">
            Setup Password
          </h4>
          <?php
          
            if(isset($_SESSION['error'])){
                echo "
                  <div class='alert alert-danger'>
                    ".$_SESSION['error']."
                  </div>
                ";
                unset($_SESSION['error']);
            }
          ?>
             <span id="error_edit">  </span>
          <form action="functionChange.php" method="POST" class="form-box px-3">
            <div class="form-input">

                <br/>
                <div class="row">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <div class="form-group col-12">
                        <label>Password:</label>
                        <input type="password" name="password"  id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <div class="form-group col-12">
                        <label>Confirm Password:</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Enter Confirm Password">
                    </div>

                </div>

            <div class="mb-3">
              <button type="submit" name="changepass" id="forgot"  class="btn btn-block text-uppercase">
                Submit
              </button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>
<script>
     $(document).ready(function(){
        $("#password,#confirmpassword").keyup(function(){
      
            var pass=$("#password").val();
            var cpass=$("#confirmpassword").val();
            if(pass!=cpass){
                $("#error_edit").empty();
                $("#forgot").attr('disabled','disabled');
                $("#error_edit").append(`
                <div class="alert alert-danger" role="alert">
                    Password and Confirm password doesn't match!
                </div>
                `);
            
            }
            else{
                $("#forgot").removeAttr('disabled');
                $("#error_edit").empty();   
            }
            
        });
    });
</script>

</html>