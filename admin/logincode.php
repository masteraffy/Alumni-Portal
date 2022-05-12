<?php
    include('security.php');

    $connection = mysqli_connect("localhost","root","","its-alumnitracking");

    if(isset($_POST['login_btn']))
    {
        $email_login = $_POST['email'];
        $password_login = $_POST['password'];
        $query = "SELECT * FROM staff WHERE Username = '$email_login'";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_array($query_run);
        
        if(password_verify($password_login, $result['Password'])){
            $_SESSION['username'] = $email_login;
            $_SESSION['UserId'] = $result['Id'];
            $_SESSION['Usertype'] = $result['userData'];
            if($result['userData'] == "Administrator"){
                
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Logged In',now(),'Login')";
            $query_run_logs = mysqli_query($connection, $querylogs);
                if($query_run_logs)
                    {
                        header('Location: index.php');
                    }
            }
            else if($result['userData'] == "Employee"){
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Logged In',now(),'Login')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                    if($query_run_logs)
                        {
                            header('Location: employeeIndex.php');
                        }
            }
        }
        else
        {
            $_SESSION['error'] = 'Incorrect password';
            echo '<script>alert("Email / Password is Invalid")</script>';
            header('Location: loginAdmin.php');
            
            
        }
        
    }

?>