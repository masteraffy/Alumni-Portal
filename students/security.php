<?php
    session_start();
    include "../dbconfig.php";

    if(!$_SESSION['email'])
    {
        header('Location: login.php');
    }
?>