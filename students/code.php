<?php
session_start();
include "../dbconfig.php";
if(isset($_POST['changepass']))
    {
        $id= $_POST['id'];
        $currentpw= $_POST['currentpw'];
        $newpw= $_POST['newpw'];
        $confrimpw= $_POST['confrimpw'];
    
        $query = "SELECT * FROM students WHERE id = '$id'";
        $query_run = mysqli_query($connection, $query);
        $result = mysqli_fetch_array($query_run);
        // echo $query;
        // echo $currentpw;
        // echo $result['password'];
        if(password_verify($currentpw, $result['password'])){
            $_SESSION['success'] = "Password is now updated";
            if($newpw === $confrimpw)
            {
                $pass = password_hash($newpw, PASSWORD_DEFAULT);
                $query = "UPDATE students SET 
                    password='$pass' ";
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $_SESSION['success'] = "Successfully Updated";

                echo '<script>window.location.replace("/alumni/students/home.php?Updated");</script>';
            }
            }
        
        }
        else
        {
            $_SESSION['error'] = 'Incorrect Current password';
            echo '<script>window.location.replace("/alumni/students/home.php?Changepass");</script>';
            
            
        }
    }
if(isset($_POST['postContent'])){
    
    
        $contentType="Announcements";
        $Title=$_POST['title'];
        $Subtitle=$_POST['Subtitle'];
        $Description=$_POST['description'];
        $user=$_POST['id'];
        $userData="Alumni";
        $file=$_POST['file'];
        $date = date('Ymd');
        $file = $_FILES['file']['name'];
    
        if(!empty($file)){
            move_uploaded_file($_FILES['file']['tmp_name'], 'contents/'.$date."-".$file);
            $file = $file;	
        }
        else{
            $file = "empty";
        }
        
        $picture = "contents/".$date."-".$file;
        $query = "INSERT INTO events(id, Title, Subtitle, Description, Image, CreatedDate, CreatedUser, UserType, TypeOfContent, AllowPost)
            VALUES(
                null,
                '$Title',
                '$Subtitle',
                '$Description',
                '$picture',
                now(),
                '$user',
                '$userData',
                '$contentType',
                'Pending'
    
            )";
            
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $newId = trim($user, "_student");
                $update = "UPDATE `students` SET `guid` = '$user' WHERE `students`.`id` = $newId;
                ";
                
                $updateq = mysqli_query($connection, $update);
                if($updateq)
                {

                    $_SESSION['notification'] = "Successfully Created";
                    echo $update;
                    header('Location: home.php');
                }
            }
            else
            {
                $_SESSION['status'] = "Error on creation";
                    header('Location: home.php');
            }
    
    
}
?>