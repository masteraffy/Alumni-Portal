
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Al Trace It!(Login)</title>
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
        <div class="img-left d-none d-md-flex"></div>

        <div class="card-body">
          <h4 class="title text-center mt-4">
            Please Login to your Account
          </h4>
          <?php
          
  	        session_start();
            if(isset($_SESSION['error'])){
                echo "
                  <div class='alert alert-danger'>
                    ".$_SESSION['error']."
                  </div>
                ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
                  <div class='alert alert-success'>
                    ".$_SESSION['success']."
                  </div>
                ";
                unset($_SESSION['success']);
            }
          ?>
          <form action="loginuser.php" method="POST" class="form-box px-3">
            <div class="form-input">
              <span><i class="fa fa-envelope-o"></i></span>
              <input type="email" name="email" placeholder="Email Address" tabindex="10" required>
            </div>

            <div class="form-input">
              <span><i class="fa fa-key"></i></span>
              <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="cb1" name="">
                <label class="custom-control-label" for="cb1">Remember me</label>
              </div>
            </div>

            <div class="mb-3">
              <button type="submit" name="login_btn" class="btn btn-block text-uppercase">
                Login
              </button>
            </div>

            <div class="text-right">
              <a href="forgotForm.php" class="forget-link">
                Forgot Password?
              </a>
            </div>

            <!-- <div class="text-center mb-3">
              or Continue Using
            </div>

            <div class="row mb-3">
              <div class="col-12">
                <a href="#" class="btn btn-block btn-social btn-facebook">
                  facebook
                </a>
              </div>
              
            </div> -->

            <hr class="my-4">

            <div class="text-center mb-2">
              Don't have an account?
              <a href="user_registration.php" class="register-link">
                Register here
              </a>
            </div>
            <hr class="my-4">

            <div class="text-center mb-2 d-none">
              <a href="/alumni/admin/loginAdmin.php" class="register-link">
              Login as admin
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>


</html>