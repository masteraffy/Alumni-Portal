<?php
    session_start(); 
    include "../dbconfig.php";
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require_once "../vendor/autoload.php";
	
    if (
		isset($_POST['email']) && 
		isset($_POST['password'])&& 
		isset($_POST['firstname']) && 
		isset($_POST['middlename']) && 
		isset($_POST['lastname']) && 
		isset($_POST['re_password']) && 
		isset($_POST['birthday']) && 
		isset($_POST['gender'])&& 
		isset($_POST['contact']) && 
		isset($_POST['address'])
		
		
		
		
		) 
    {
	    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$firstname = validate($_POST['firstname']);
	$middlename = validate($_POST['middlename']);
	$lastname = validate($_POST['lastname']);
	$gender = validate($_POST['gender']);
	$contact = validate($_POST['contact']);
	$birthday = validate($_POST['birthday']);
	$address = validate($_POST['address']);
	$batch = validate($_POST['batch']);
	
	$user_data = 'email='. $email. '&firstname='. $firstname. '&middlename='. $middlename. '&lastname='. $lastname. '&lastname='. $lastname. '&gender='. $gender. '&birthday='. $birthday. '&contact='. $contact. '&address='. $address ;


	if (empty($email)) {
		header("Location: user_registration.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: user_registration.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: user_registration.php?error=Re Password is required&$user_data");
	    exit();
	}

	else if(empty($firstname)){
        header("Location: user_registration.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: user_registration.php?error=The password doesn't match&$user_data");
	    exit();
	}

	else{

		$pass = password_hash($pass, PASSWORD_DEFAULT);
	    $sql = "SELECT * FROM students WHERE email='$email' ";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: user_registration.php?error=The is already exists please try another email&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO students(id, firstname, middleName, lastname, photo, gender, birthday, email, contact, socMed, interest, schoolAttended, CurrentWork, courseGraduated, created_on, password, address) VALUES(null,'$firstname','$middlename','$lastname', ' ', '$gender','$birthday', '$email', '$contact', '-', ' ', ' ', ' ', ' ','now()','$pass','$address')";
           $result2 = mysqli_query($connection, $sql2);
           if ($result2) 
           {
			$_SESSION['email'] = $email;
            $query = "SELECT * FROM students WHERE email  = '$email' ";
            $query_run = mysqli_query($connection, $query);
            $user = mysqli_fetch_array($query_run);
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['middleName'] = $user['middleName'];
            $_SESSION['lastname'] = $user['lastname'];
			$last_id = $user['id'] ;
			
			$sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$last_id,'$batch',now())";
			$result1 = mysqli_query($connection, $sqlBatch);
           	header("Location: home.php");
	        exit();
           }
           else 
           {
			   var_dump($sql2);
           }
		}
	}
	
}
else
{
	header("Location: user_registration.php");
	exit();
}
?>