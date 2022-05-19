
<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> 
</head>
<style>
  ::placeholder {
  color: #000!important;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 
    color: #000;
}

::-ms-input-placeholder { /* Microsoft Edge */

    color: #000;
}
</style>
<body>
  <section class="login">
  <div class="container">
    <div class="row px-3">
      <div class="col-lg-10 col-xl-9 card flex-row mx-auto px-0">
        <!-- <div class="img-left d-none d-md-flex"></div> -->

        <div class="card-body">
          <h4 class="title text-center mt-4">
            Create Your Account
          </h4>
          <form action="signup_check.php" method="POST" class="form-box px-3">
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

            <div class="form-input">
              <span><i class="fa fa-user-o"></i></span>
              <input type="text" class="format-studNo" name="studNo" placeholder="Enter Student Number" tabindex="10" required>
            </div>

            <div class="form-input">
                <span><i class="fa fa-user-o"></i></span>
                <?php if (isset($_GET['firstname'])) { ?>
                <input type="text" name="firstname" value="<?php echo $_GET['firstname']; ?>"placeholder="firstname" tabindex="10" required>
                <?php }else{ ?>
                <input type="text" name="firstname" placeholder="Enter Your First Name" tabindex="10" required>
            </div>
            <?php }?>

            <div class="form-input">
                <span><i class="fa fa-user-o"></i></span>
                <?php if (isset($_GET['middlename'])) { ?>
                <input type="text" name="middlename" value="<?php echo $_GET['middlename']; ?>"placeholder="middlename" tabindex="10" required>
                <?php }else{ ?>
                <input type="text" name="middlename" placeholder="Enter Your Middle Name" tabindex="10" required>
            </div>
            <?php }?>

            <div class="form-input">
                <span><i class="fa fa-user-o"></i></span>
                <?php if (isset($_GET['lastname'])) { ?>
                <input type="text" name="lastname" value="<?php echo $_GET['lastname']; ?>"placeholder="lastname" tabindex="10" required>
                <?php }else{ ?>
                <input type="text" name="lastname" placeholder="Enter Your Last Name" tabindex="10" required>
            </div>
            <?php }?>

            <div class="form-input">
                <span><i class="fa fa-user-o"></i></span>
                <?php if (isset($_GET['birthday'])) { ?>
                <input type="date" name="birthday" value="<?php echo $_GET['birthday']; ?>"placeholder="birthday" tabindex="10" required>
                <?php }else{ ?>
                <input type="date" name="birthday" placeholder="" tabindex="10" required>
            </div>
            <?php }?>

            

            <div class="form-input" hidden>
                <span><i class="fa fa-user-o"></i></span>
                <select name="gender" id="gender" style="  width: 100%;
                  height: 45px;
                  padding-left: 40px;
                  margin-bottom: 20px;
                  box-sizing: border-box;
                  box-shadow: none;
                  border: 1px solid #00000020;
                  border-radius: 50px;
                  outline: none;
                  background: transparent;" tabindex="10" >
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-input">
            <span><i class="fa fa-envelope-o"></i></span>
              <?php if (isset($_GET['email'])) { ?>
              <input type="email" name="email" value="<?php echo $_GET['email']; ?>"placeholder="Email Address" tabindex="10" required>
              <?php }else{ ?>
              <input type="email" name="email" placeholder="Enter Your Email Address" tabindex="10" required>
              <?php }?>
            </div>

            <div class="form-input" hidden>
              <span><i class="fa fa-envelope-o"></i></span>
              <?php if (isset($_GET['contact'])) { ?>
              <input type="contact" name="contact" value="<?php echo $_GET['contact']; ?>"placeholder="contact" tabindex="10">
              <?php }else{ ?>
              <input type="contact" name="contact" placeholder="Phone Number" tabindex="10" >
              <?php }?>
            </div>

            <div class="form-input" hidden>
              <span><i class="fa fa-map-marker"></i></span>
              <?php if (isset($_GET['address'])) { ?>
              <textarea style="  width: 100%;
                  height: 45px;
                  padding-left: 40px;
                  margin-bottom: 20px;
                  box-sizing: border-box;
                  box-shadow: none;
                  border: 1px solid #00000020;
                  border-radius: 50px;
                  outline: none;
                  background: transparent;"  class="form-control mb-3" name="address"
                   placeholder="Address"><?php echo $_GET['address']; ?></textarea>
              <?php }else{ ?>
                <textarea style="  width: 100%;
                  height: 45px;
                  padding-left: 40px;
                  margin-bottom: 20px;
                  box-sizing: border-box;
                  box-shadow: none;
                  border: 1px solid #00000020;
                  border-radius: 50px;
                  outline: none;
                  background: transparent;" class="form-control mb-3" name="address"
                   placeholder="Address"></textarea>
              <?php }?>
            </div>
            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="re_password" placeholder="Confirm Password" required>
            </div>

            <div class="mb-3">
              <button type="submit" name="submit" class="btn btn-block text-uppercase">
                SIGN UP
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>
</html>

<?php
include('../includes/scripts.php');  
?>