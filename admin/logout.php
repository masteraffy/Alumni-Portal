<?php
include('security.php');
$connection = mysqli_connect("localhost", "root", "", "its-alumnitracking");
$email_login= $_SESSION['username'];
	$querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Logged Out',now(),'Login')";
	$query_run_logs = mysqli_query($connection, $querylogs);
		if($query_run_logs)
			{
				session_start();
				session_destroy();
				header('location: loginAdmin.php');
			}
?>