<?php
session_start();
include "../dbconfig.php";
if(isset($_POST['changepass']))
    {
        $id= $_POST['id'];
        $password= $_POST['password'];
    
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE students SET password='$pass' ";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $_SESSION['success'] = "Successfully Updated";

                echo '<script>window.location.replace("/alumni/students/sample.php");</script>';
            }
    }

?>