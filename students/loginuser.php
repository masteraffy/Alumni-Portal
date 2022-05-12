<?php
    include('security.php');

    
    if(isset($_POST['login_btn']))
    {
        $email = $_POST['email'];
        $password_login = $_POST['password'];
        $query = "SELECT * FROM students WHERE email = '$email'";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_array($query_run);
        // echo $query;
        if(password_verify($password_login, $result['password'])){
            $_SESSION['email'] = $email;
            $query = "SELECT * FROM students WHERE email  = '$email' ";
            $query_run = mysqli_query($connection, $query);
            $user = mysqli_fetch_array($query_run);
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['middleName'] = $user['middleName'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $user['id'];
            $_SESSION['Full_Name'] = $user['firstname']. " ".$user['middleName']. " ".$user['lastname'];
            header('Location: home.php');
        }
        else
        {
            $_SESSION['error'] = 'Incorrect password';
            echo '<script>alert("Email / Password is Invalid")</script>';
            header('Location: login.php');
            
            
        }
        
    }

?>