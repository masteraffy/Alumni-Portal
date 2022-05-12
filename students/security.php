<?php
    session_start();
    $connection = mysqli_connect("localhost","root","","its-alumnitracking");

    if(!$_SESSION['email'])
    {
        header('Location: login.php');
    }
?>