<?php
    session_start(); 
    include "../dbconfig.php";
	$id = ($_POST['id']);
	$bio = ($_POST['bio']);
	$email = ($_POST['email']);
    $testSchoolID = ($_POST['testSchoolID']);
    $pass = ($_POST['password']);
	$firstname = ($_POST['firstname']);
	$middlename = ($_POST['middlename']);
	$lastname = ($_POST['lastname']);
	$gender = ($_POST['gender']);
	$contact = ($_POST['contact']);
	$birthday = ($_POST['birthday']);
    $studStatus = ($_POST['studStatus']);
	$address = ($_POST['address']);
	$schoolAttended = ($_POST['schoolAttended']);
	$courseGraduated = ($_POST['courseGraduated']);
	$CurrentWork = ($_POST['CurrentWork']);
    $employerNo = ($_POST['employerNo']);
    $mailingAddress = ($_POST['mailingAddress']);
    $presentAddress = ($_POST['presentAddress']);
    $provincialAddress = ($_POST['provincialAddress']);
    $fbURL = ($_POST['fbURL']);
    $gmailURL = ($_POST['gmailURL']);
    $linkURL = ($_POST['linkURL']);
    $file = $_FILES['file']['name'];
    if(!empty($file)){
        move_uploaded_file($_FILES['file']['tmp_name'], 'profilePic/'.$id."-".$file);
        $file = $file;	
        $picture = "profilePic/".$id."-".$file;
    }
    else{
        $file = $_POST['fetch'];
        $picture =$file;
    }
    //year graduated
	$yearGraduated = ($_POST['yearGraduated']);

    if(isset($_POST['yearGraduated']) || isset($_POST['courseGraduated'] )){
        $sqlUpdate = "UPDATE students SET
        email='$email' ,
        firstname='$firstname' ,
        middlename='$middlename' ,
        lastname='$lastname' ,
        gender='$gender' ,
        birthday='$birthday' ,
        contact='$contact' ,
        address='$address' ,
        schoolAttended='$schoolAttended' ,
        courseGraduated='$courseGraduated' ,
        CurrentWork='$CurrentWork',
        photo ='$picture',
        bio ='$bio',
        interest='$testSchoolID',
        studStatus = '$studStatus',
        employerNo= '$employerNo',
        mailingAddress = '$mailingAddress',
        presentAddress = '$presentAddress',
        provincialAddress = '$provincialAddress',
        fbURL ='$fbURL',
        gmailURL ='$gmailURL',
        linkURL ='$linkURL'
        WHERE id =$id";
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = $sqlUpdate;
        $result = mysqli_query($connection, $sql);
        // echo $sqlUpdate;
        //checker
        $query = "SELECT * FROM batch WHERE Name  = '$id' ";
        $batchChecker = mysqli_query($connection, $query);
        if(mysqli_num_rows($batchChecker) == 0){
            $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$id,$yearGraduated,now())";
            $result1 = mysqli_query($connection, $sqlBatch);
        } 
        else{
            $row = mysqli_fetch_assoc($batchChecker);
            $checker = $row['Id'];
            $sqlBatch = "UPDATE `batch` SET `Description` = '$yearGraduated' WHERE `batch`.`Name` = $id";
            $result1 = mysqli_query($connection, $sqlBatch);
        }
      

        if ($result > 0){
            header("Location: editProfile.php?success=Profile updated successfully!");
        }
    }
    else{
    $sqlUpdate = "UPDATE students SET
                    email='$email' ,
                    firstname='$firstname' ,
                    middlename='$middlename' ,
                    lastname='$lastname' ,
                    gender='$gender' ,
                    birthday='$birthday' ,
                    contact='$contact' ,
                    address='$address' ,
                    schoolAttended='$schoolAttended' ,
                    courseGraduated='$courseGraduated' ,
                    CurrentWork='$CurrentWork'
                    WHERE id =$id";
        $pass = password_hash($pass, PASSWORD_DEFAULT);
	    $sql = $sqlUpdate;
		$result = mysqli_query($connection, $sql);
        if ($result > 0){
            header("Location: editProfile.php?success=Profile updated successfully!");
        }
    }
    
?>