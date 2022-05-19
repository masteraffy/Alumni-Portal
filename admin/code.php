<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "its-alumnitracking");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";


$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;                 

//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "arellano.alumnisd@gmail.com";                 
$mail->Password = "arellanoasd";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to
$mail->Port = 587;    
if(isset($_POST['registerbtn']))
{
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO admin (firstname,middlename,lastname,username,password,created_on,author) VALUES ('$firstname','$middlename','$lastname','$email','$pass',now(),'1')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            //echo "Saved";
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Admin Account: $email',now(),'Admin Account')";
            $query_run_logs = mysqli_query($connection, $querylogs);

            if($query_run_logs)
			{
              $_SESSION['success'] = "Admin Profile Added";
              header('Location: register.php');
            }

        }
        else
        {
            $_SESSION['status'] = "Admin Profile NOT Added";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: register.php');
    
    }
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $fname = $_POST['edit_fname'];
    $mname = $_POST['edit_mname'];
    $lname = $_POST['edit_lname'];
    $email = $_POST['edit_email'];
    $pass = $_POST['edit_password'];
    $cpass = $_POST['cedit_password'];

    if($pass === $cpass) {
    
        $pass = password_hash($pass, PASSWORD_DEFAULT);
       
        $query = "UPDATE admin SET 
        firstname='$fname',
        middlename='$mname',
        lastname='$lname',
        username='$email' , 
        password ='$pass'
        WHERE id='$id'"; 
        $query_run = mysqli_query($connection,$query);
        
        if($query_run)
        {
            $_SESSION['success'] = "Your Data is Updated";
            header('Location: register.php');
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT Updated";
            header('Location: register.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: register.php');
    
    }

}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM admin WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Deleted";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: register.php');
    }
}

if(isset($_POST['login_btn']))
{
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM register WHERE email = '$email_login' AND password = '$password_login' ";
    $query_run = mysqli_query($connection,$query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = 'Email / Password is Invalid';
        header('Location: login.php');
    }

}

if(isset($_POST['assigning_updatebtn']))
{
    $department = $_POST['edit_department'];
    $id = $_POST['edit_departmentid'];

    $query = "UPDATE register SET department='$department' WHERE id='$id'"; 
    $query_run = mysqli_query($connection,$query);
    
    if($query_run)
    {
        $_SESSION['success'] = "Action Done Successfully";
        header('Location: employee_assign.php');
    }
    else
    {
        $_SESSION['status'] = "Action Done Unsuccessful";
        header('Location: employee_assign.php');
    }

}

if(isset($_POST['employeeInsert'])){
    
    $department = $_POST['department'];
    $employeeNo = $_POST['employeeNo'];
    $username = $_POST['email'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password === $confirmpassword)
    {
        $emp_id_checker = $connection->query("SELECT * FROM staff where userData ='Employee' AND IdNumber='".$employeeNo."'");
        $result_emp_id_checker = $emp_id_checker->num_rows;
        if($result_emp_id_checker == 0)
        {
            $emp_email_checker = $connection->query("SELECT * FROM staff where userData ='Employee' AND email='".$email."'");
            $result_emp_email_checker = $emp_email_checker->num_rows;
            if($result_emp_email_checker == 0)
            {
                    $pass = password_hash($password, PASSWORD_DEFAULT);
                    $query = "INSERT INTO staff(IdNumber, Username, Password, FirstName, LastName, MiddleName, Email, ContactNumber, BranchId, DepartmentId, AddedDate, userData) 
                    VALUES(
                        '$employeeNo',
                        '$username',
                        '$pass',
                        '$firstname',
                        '$lastname',
                        '$middlename',
                        '$email',
                        '$contact',
                        '$branch',
                        '$department',
                        now(),
                        'Employee'
                    )";
                    
                    $query_run = mysqli_query($connection, $query);
                    if($query_run)
                    {
                        $email_login= $_SESSION['username'];
                        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Employee Account: $email',now(),'Employee Account')";
                        $query_run_logs = mysqli_query($connection, $querylogs);

                        if($query_run_logs)
                        {
                            $_SESSION['success'] = "Employee Account for ID: <b> ". $employeeNo . " " . $firstname . " " .$middlename . " " . $lastname .  " </b> is Created Successfully!";
                            header('Location: employee.php');
                            
                        }
                    }
                    else
                    {
                        $_SESSION['status'] = "Error on creation";
                        header('Location: employee.php');
                    }
            }
            else
            {
                $_SESSION['status'] = "<b>" .$email. "</b> email is existing, Please Try Another One!";
                header('Location: employee.php');
            }
        }
        else
        {
            $_SESSION['status'] = "<b>Employee No: " .$employeeNo. " </b> is existing, Please Try Another One!";
            header('Location: employee.php');
        }
        
    }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: employee.php');
    }
}
if(isset($_POST['employeeEdit'])){
    $edit_id = $_POST['edit_id'];
    $department = $_POST['department'];
    $employeeNo = $_POST['employeeNo'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password === $confirmpassword)
    {
        $pass = password_hash($password, PASSWORD_DEFAULT);



        $pass = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE staff SET 
        IdNumber='$employeeNo',
        Username='$username',
        Password='$pass',
        FirstName='$firstname',
        LastName='$lastname',
        MiddleName='$middlename',
        Email='$email',
        ContactNumber='$contact',
        BranchId='$branch',
        DepartmentId='$department',
        userData='Employee'
        WHERE Id=".$edit_id;
        echo $query;
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Employee Account: $email',now(),'Employee Account')";
            $query_run_logs = mysqli_query($connection, $querylogs);

            if($query_run_logs)
			{
                $_SESSION['success'] = "Successfully Updated";
                header('Location: employee.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on update";
            header('Location: employee.php');
        }
     }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: employee.php');
    }
}
if(isset($_POST['deleteEmployee'])){
    $id = $_POST['delete_id'];

    //query for finding the employee # to include at delete message//
    $queryadmin = "SELECT * FROM staff where id='$id'";
    $query_admin = mysqli_query($connection, $queryadmin);
    $result = mysqli_fetch_array($query_admin);
    $emp_name = $result['FirstName'] . " " . $result['MiddleName'] . " " . $result['LastName'];
    $emp_no = $result['IdNumber'];
    ////
    $query = "DELETE FROM staff WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted an Employee Account Id: $id',now(),'Employee Account')";
        $query_run_logs = mysqli_query($connection, $querylogs);

        if($query_run_logs)
        {
            $_SESSION['success'] = "Employee <b> ID: " . $emp_no . " " . $emp_name . "</b> is Successfully Deleted!";
            header('Location: employee.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: employee.php');
    }
}

if(isset($_POST['employeeInsert1'])){
    
    $department = $_POST['department'];
    $employeeNo = $_POST['employeeNo'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password === $confirmpassword)
    {
        $admin_email_checker = $connection->query("SELECT * FROM staff WHERE userData ='Administrator' AND email ='".$email."'");
        $row_count_checker = $admin_email_checker->num_rows;
        if($row_count_checker == 0)
        {
            $pass = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO staff(IdNumber, Username, Password, FirstName, LastName, MiddleName, Email, ContactNumber, BranchId, DepartmentId, AddedDate, userData) 
            VALUES(
                '$employeeNo',
                '$email',
                '$pass',
                '$firstname',
                '$lastname',
                '$middlename',
                '$email',
                '$contact',
                '$branch',
                '$department',
                now(),
                'Administrator'
            )";
            
            $query_run = mysqli_query($connection, $query);
            if($query_run)
            {
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Admin Account: $email',now(),'Admin Account')";
                $query_run_logs = mysqli_query($connection, $querylogs);

                if($query_run_logs)
                {
                    $_SESSION['success'] = "Admin Account for <b> ". $firstname . " " . $middlename . " " . $lastname . " </b> is Created Successfully!";
                    header('Location: register.php'); 
                }
            }
            else
            {
                $_SESSION['status'] = "Error on creation";
                header('Location: register.php');
            }
        }
        else
        {
            $_SESSION['status'] = "<b>" .$email. "</b> email is existing, Please Try Another One!";
            header('Location: register.php');
        }
        
    }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: register.php');
    }
}
if(isset($_POST['employeeEdit1'])){
    $edit_id = $_POST['edit_id'];
    $department = $_POST['department'];
    $employeeNo = $_POST['employeeNo'];
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $branch = $_POST['branch'];
    $department = $_POST['department'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    if($password === $confirmpassword)
    {


        $pass = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE staff SET 
        IdNumber='$employeeNo',
        Username='$username',
        Password='$pass',
        FirstName='$firstname',
        LastName='$lastname',
        MiddleName='$middlename',
        Email='$email',
        ContactNumber='$contact',
        BranchId='$branch',
        DepartmentId='$department',
        userData='Administrator'
        WHERE Id=".$edit_id;
        echo $query;
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Admin Account: $email',now(),'Admin Account')";
            $query_run_logs = mysqli_query($connection, $querylogs);

            if($query_run_logs)
			{
                $_SESSION['success'] = "Successfully Updated";
                header('Location: register.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on update";
            header('Location: register.php');
        }
     }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: register.php');
    }
}
if(isset($_POST['deleteEmployee1'])){
    $id = $_POST['delete_id'];
    $userID = $_SESSION['UserId'];
    
    //query for finding the admin full name to include at delete message//
    $queryadmin = "SELECT * FROM staff where id='$id'";
    $query_admin = mysqli_query($connection, $queryadmin);
    $result = mysqli_fetch_array($query_admin);
    $admin_name = $result['FirstName']. " " . $result['MiddleName'] . " " . $result['LastName'];


    if($userID != $id)
    {
        $query = "DELETE FROM staff WHERE id='$id'"; 
        $query_run = mysqli_query($connection,$query);

        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted an Admin Account: $id',now(),'Admin Account')";
            $query_run_logs = mysqli_query($connection, $querylogs);
    
            if($query_run_logs)
            {
                $_SESSION['success'] = "Admin <b> " .$admin_name. " </b> is Successfully Deleted!"; 
                header('Location: register.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT Deleted";
            header('Location: register.php');
        }
    }

    else
    {
        $_SESSION['status'] = "You cannot delete your own account!";
        header('Location: register.php');
    }

    
}


if(isset($_POST['deleteAlumni'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM students WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted an Alumni Account: $id',now(),'Admin Account')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $query = "DELETE FROM batch WHERE Name='$id' "; 
            $query_run1 = mysqli_query($connection,$query);
        
            $_SESSION['success'] = "Alumni Account Successfully Deleted!";
            header('Location: alumni.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Alumni Account Deletion Unsuccessful!";
        header('Location: alumni.php');
    }
}
if(isset($_POST['alumniInsert'])){
    $testSchoolID = $_POST['testSchoolID'];
    $firstname= $_POST['firstname'];
    $middlename= $_POST['middlename'];
    $lastname= $_POST['lastname'];
    $gender= $_POST['gender'];
    $birthday= $_POST['birthday'];
    $email= $_POST['email'];
    $contact= $_POST['contact'];
    $course= $_POST['course'];
    $schoolAttended = $_POST['schoolAttended'];
    $currentWork = $_POST['currentWork'];
    $password= $_POST['password'];
    $confirmpassword= $_POST['confirmpassword'];
    $address= $_POST['address'];
    $studNo= $_POST['studNo'];
    $studStatus= $_POST['studStatus'];
    $studDes= $_POST['studDes'];
    $studOR= $_POST['studOR'];
    $studDate= $_POST['studDate'];
    $studRemarks= $_POST['studRemarks'];
    $random =uniqid();
    $yearGraduated=$_POST['yeargraduated'];
    if($random)
    {
        $pass = password_hash($random, PASSWORD_DEFAULT);
        
        $alumni_id_checker = $connection->query("SELECT * FROM students where email ='".$email."'");
        $row_cnt_email = $alumni_id_checker->num_rows;
        if($row_cnt_email == 0)
        {
            $survey = $connection->query("SELECT * FROM students WHERE studNo ='".$studNo."'");
            $row_cnt = $survey->num_rows;
            print_r($row_cnt);
            if($row_cnt == 0){
                $query = "INSERT INTO students
                (id, firstname, middleName, lastname, photo, gender, birthday, email, contact, socMed, interest, schoolAttended, CurrentWork, courseGraduated, created_on, password, address,studNo,studStatus, studDes, studOR, studDate,studRemarks)
                VALUES(null,'$firstname','$middlename','$lastname', ' ', '$gender','$birthday', '$email', '$contact', ' ', '$testSchoolID', '$schoolAttended', '$currentWork', '$course',NOW(),'$pass','$address','$studNo','$studStatus','$studDes','$studOR',NOW(),'$studRemarks')";
                $query_run = mysqli_query($connection, $query);
                if($query_run)
                {
                    
                    $last_id = mysqli_insert_id($connection);            
                    //checker
                    $query = "SELECT * FROM batch WHERE Name  = '$last_id' ";
                    $batchChecker = mysqli_query($connection, $query);
                    if(mysqli_num_rows($batchChecker) == 0){
                        $email_login= $_SESSION['username'];
                        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Alumni Account: $email',now(),'Admin Account')";
                        $query_run_logs = mysqli_query($connection, $querylogs);
                
                        if($query_run_logs)
                        {

                            $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$last_id,$yearGraduated,now())";
                            $result1 = mysqli_query($connection, $sqlBatch);
                        }
                    } 
                    else{
            
                        
                        $email_login= $_SESSION['username'];
                        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Alumni Account: $email',now(),'Admin Account')";
                        $query_run_logs = mysqli_query($connection, $querylogs);
                
                        if($query_run_logs)
                        {

                            $row = mysqli_fetch_assoc($batchChecker);
                            $checker = $row['Id'];
                            $sqlBatch = "UPDATE `batch` SET `Description` = '$yearGraduated' WHERE `batch`.`Name` = $checker";
                            $result1 = mysqli_query($connection, $sqlBatch);
                        }
                    }
                    $_SESSION['success'] = "Alumni Account Successfully Created!";
                    $mail->From = "arellano.alumnisd@gmail.com";
                    $mail->FromName = "Arellano Alumni";

                    $mail->addAddress("$email", "$firstname $middlename $lastname");
                    $mail->isHTML(true);
                    $mail->Subject = "Alumni Invitation";
                    $mail->Body = "<div>
                            <p>
                            We are inviting you to use our Alumni Portal as being part of Arellano University Alumni Student.
                        
                            </p><p>
                        Here is your account details:
                        </p><p>
                        Email:  $email
                        </p>
                        <p>
                        Password: $random
                        </p>
                        <p>
                        Note: Please use this guide in accessing your account at <a href='www.alumniportal.com'>www.alumniportal.com</a>
                        After logging in, please do answer the necessary information, to help us in tracing.
                        </p>
                        <p>Thanks in advance</p>
                        Arellano Alumni Service Department 
                        </div>";
                    try {
                        $mail->send();
                        header('Location: alumni.php');
                    } catch (Exception $e) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    }
                }
                else
                {
                    $_SESSION['status'] = "Alumni Account Creation Unsuccessful!";
                    header('Location: alumni.php');
                }
            }
            else
            {
                $_SESSION['status'] = "Alumni Account is Existing!";
                header('Location: alumni.php');
            }
        }           
        else
        {
            $_SESSION['status'] = "<b>" .$email . "</b> email is Already Existing!";
            header('Location: alumni.php');
        }
    }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header('Location: alumni.php');
   }
}
if(isset($_POST['alumniEdit'])){
    
    $testSchoolIDedit = $_POST['testSchoolIDedit'];
    $edit_id=$_POST['edit_id'];
    $firstname=$_POST['firstname'];
    $middlename=$_POST['middlename'];
    $lastname=$_POST['lastname'];
    $gender=$_POST['gender'];
    $birthday=$_POST['birthday'];
    $email=$_POST['email'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $courseGraduated =$_POST['course'];
    $schoolAttended=$_POST['schoolAttended'];
    $currentWork=$_POST['currentWork'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $yearGraduated=$_POST['yeargraduated'];
    $studNo= $_POST['studNo'];
    $studStatus= $_POST['studStatus'];
    $studDes= $_POST['studDes'];
    $studOR= $_POST['studOR'];
    $studDate= $_POST['studDate'];
    $studRemarks= $_POST['studRemarks'];

    if($password === $confirmpassword)
    {
        if(isset($_POST['yeargraduated']) || isset($_POST['course'] )){
            
            $pass = password_hash($password, PASSWORD_DEFAULT);
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
            currentWork='$currentWork',
            password='$pass',
            studNo  ='$studNo',
            studStatus ='$studStatus',
            studDes ='$studDes',
            studOR ='$studOR',
            studRemarks ='$studRemarks',
            interest = '$testSchoolIDedit'
            WHERE id =$edit_id";
            $sql = $sqlUpdate;
            $result = mysqli_query($connection, $sql);
            if($result){
                //checker
                $query = "SELECT * FROM batch WHERE Name  = '$edit_id' ";
                $batchChecker = mysqli_query($connection, $query);
                if(mysqli_num_rows($batchChecker) == 0){
                    $email_login= $_SESSION['username'];
                    $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Alumni Account: $email',now(),'Admin Account')";
                    $query_run_logs = mysqli_query($connection, $querylogs);
                    if($query_run_logs)
                    {
    
                        $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$edit_id,$yearGraduated,now())";
                        $result1 = mysqli_query($connection, $sqlBatch);
                    }
                } 
                else{
                    
                    $email_login= $_SESSION['username'];
                    $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Alumni Account: $email',now(),'Admin Account')";
                    $query_run_logs = mysqli_query($connection, $querylogs);
                    if($query_run_logs)
                    {
                        $row = mysqli_fetch_assoc($batchChecker);
                        $checker = $row['Id'];
                        $sqlBatch = "UPDATE `batch` SET `Description` = '$yearGraduated' WHERE `batch`.`Name` = $edit_id";
                        $result1 = mysqli_query($connection, $sqlBatch);
                    }
                }

                header("Location: alumni.php?success=Profile updated successfully!".$sqlBatch);
            }
        
        }
    }
    else{
        $_SESSION['status'] = "Pasword and Confirm Password Does Not Match";
        header("Location: alumni.php?success=Password does not match!");
    }
}
if(isset($_POST['branchInsert'])){
    
    $Name=$_POST['Name'];
    $Address=$_POST['address'];

    echo $Name."-".$Address;
    $query = "INSERT INTO branch(Id, Name, Address, AddedDate) 
        VALUES(
            null,
            '$Name',
            '$Address',
            now()
        )";
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created Branch',now(),'Branch')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Created";
                header('Location: branch.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on creation";
            header('Location: branch.php');
        }
}
if(isset($_POST['branchUpdate'])){
    
    $branch_id=$_POST['branch_id'];
    $Name=$_POST['Name'];
    $Address=$_POST['address'];

    $query = "UPDATE branch SET 
        Name='$Name',
        Address='$Address'
        WHERE Id=".$branch_id;
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated Branch',now(),'Branch')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Updated";
                header('Location: branch.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on updating data";
            header('Location: branch.php');
        }
}
if(isset($_POST['deleteBranch'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM branch WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted Branch',now(),'Branch')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: branch.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: branch.php');
    }
}

if(isset($_POST['departmentInsert'])){
    
    $Name=$_POST['Name'];
    $branch=$_POST['branch'];
    $Address=$_POST['address'];

    echo $Name."-".$Address;
    $query = "INSERT INTO departments(Id, Name, Description, AddedDate, branch_id) 
        VALUES(
            null,
            '$Name',
            '$Address',
            now(),
            '$branch'
        )";
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created Deparment',now(),'Deparment')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Created";
                header('Location: department.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on creation";
            header('Location: department.php');
        }
}

if(isset($_POST['departmentUpdate'])){
    
    $branch=$_POST['branch'];
    $branch_id=$_POST['branch_id'];
    $Name=$_POST['Name'];
    $Address=$_POST['address'];

    $query = "UPDATE departments SET 
        Name='$Name',
        Description='$Address',
        branch_id='$branch'
        WHERE id=".$branch_id;
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated a Deparment',now(),'Deparment')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Updated";
                header('Location: department.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on updating data";
            header('Location: department.php');
        }
}
if(isset($_POST['deleteDepartment'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM departments WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted Department',now(),'Deparment')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: department.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: department.php');
    }
}


if(isset($_POST['courseInsert'])){
    $department=$_POST['department'];
    $Name=$_POST['Name'];
    $Address=$_POST['address'];

    echo $Name."-".$Address;
    $query = "INSERT INTO course(Id, title, code,dep_id) 
        VALUES(
            null,
            '$Name',
            '$Address',
            '$department'
        )";
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created a Course',now(),'Course')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Created";
                header('Location: course.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on creation";
            header('Location: course.php');
        }
}


if(isset($_POST['courseUpdate'])){
    $department=$_POST['department'];
    
    $branch_id=$_POST['branch_id'];
    $Name=$_POST['Name'];
    $Address=$_POST['address'];

    $query = "UPDATE course SET 
        title='$Name',
        code='$Address',
        dep_id='$department'
        WHERE id=".$branch_id;
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $email_login= $_SESSION['username'];
            $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated a Course',now(),'Course')";
            $query_run_logs = mysqli_query($connection, $querylogs);
            if($query_run_logs)
            {
                $_SESSION['success'] = "Successfully Updated";
                header('Location: course.php');
            }
        }
        else
        {
            $_SESSION['status'] = "Error on updating data";
            header('Location: course.php');
        }
}
if(isset($_POST['deleteCourse'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM course WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted a Course',now(),'Course')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: course.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: course.php');
    }
}

if(isset($_POST['changepass'])){
    $id = $_SESSION['UserId'];
    $usertype = $_SESSION['Usertype'];
    $currentpw= $_POST['currentpw'];
    $newpw= $_POST['newpw'];
    $confrimpw= $_POST['confrimpw'];
 
    $query = "SELECT * FROM staff WHERE Id = '$id'";
    $query_run = mysqli_query($connection, $query);
    $result = mysqli_fetch_array($query_run);

    if(password_verify($currentpw, $result['Password'])){
        $_SESSION['success'] = "Password is now updated";
        if($newpw === $confrimpw)
        {
            $pass = password_hash($newpw, PASSWORD_DEFAULT);
            $query = "UPDATE staff SET 
                Password='$pass' ";
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $_SESSION['success'] = "Successfully Updated";

            if($usertype == "Administrator")
            {
                echo '<script>window.location.replace("/alumni/admin/index.php?Updated");</script>' .$usertype;
            }
            else
            {
                echo '<script>window.location.replace("/alumni/admin/employeeIndex.php?Updated");</script>';
            }
            
        }
        }
       
    }
    else
    {
        $_SESSION['error'] = 'Incorrect Current password';
        if($usertype == "Administrator")
        {
            echo '<script>window.location.replace("/alumni/admin/index.php?Changepass");</script>';
        }
        else{
            echo '<script>window.location.replace("/alumni/admin/employeeIndex.php?Updated");</script>';
        }
        
        
        
    }
}

if(isset($_POST['contentsInsert'])){
    
    $course=$_POST['course'];
    $contentType=$_POST['contentType'];
    $Title=$_POST['Title'];
    $Subtitle=$_POST['Subtitle'];
    $Description=$_POST['Description'];
    $user=$_SESSION['Full_Name'];
    $userData=$_POST['userData'];
    $file=$_POST['file'];
    $date = date('Ymd');
    $file = $_FILES['file']['name'];

    if($contentType == "Jobs"){
        $Location=$_POST['Location'];
        $Specialization=$_POST['Specialization'];
    }
    else{
        $Location="";
        $Specialization="";

    }

    if(!empty($file)){
        move_uploaded_file($_FILES['file']['tmp_name'], 'contents/'.$date."-".$file);
        $file = $file;	
    }
    else{
        $file = "empty";
    }
    
    
    $picture = "contents/".$date."-".$file;
    $query = "INSERT INTO events(id, Title, Subtitle, Description, Image, CreatedDate, CreatedUser, UserType, TypeOfContent,location,specialization,course,AllowPost)
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
            '$Location',
            '$Specialization',
            '$course',
            'Approved'

        )";
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $_SESSION['success'] = "Successfully Created";

            if($contentType == "Jobs"){
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Job Post: $Title',now(),'Jobs')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                if($query_run_logs)
                {
                 header('Location: jobPost.php');
                }
            }
            else{
                
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Created an Announcement / Events: $Title',now(),'Announcement / Events')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                if($query_run_logs)
                {
                    header('Location: announcement.php');
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Error on creation";
            if($contentType == "Jobs"){
                header('Location: jobPost.php');
            }
            else{
                header('Location: announcement.php');
            }
        }
}



if(isset($_POST['contentUpdate'])){
    
    
    $branch_id=$_POST['branch_id'];
    $contentType=$_POST['contentType'];
    $Title=$_POST['Title'];
    $Subtitle=$_POST['Subtitle'];
    $Description=$_POST['Description'];
    $user=$_POST['user'];
    $userData=$_POST['userData'];
    $file=$_POST['file'];
    $file = $_FILES['file']['name'];
    $date = date('Ymd');
    $imageFetched=$_POST['imageFetched'];
    if($contentType == "Jobs"){
        $Location=$_POST['Location'];
        $Specialization=$_POST['Specialization'];
        $course=$_POST['course'];
    }
    else{
        $Location="";
        $Specialization="";
        $course="0";

    }
    if(!empty($file)){
        move_uploaded_file($_FILES['file']['tmp_name'], 'contents/'.$date."-".$file);
        $file = $file;	
        $picture = "contents/".$date."-".$file;
    }
    else{
        $picture = $imageFetched;
    }




    
    $query = "UPDATE events SET 
                Title='$Title',
                Subtitle='$Subtitle',
                Description='$Description',
                Image='$picture',
                CreatedUser='$user',
                UserType='$userData',
                TypeOfContent='$contentType', 
                location='$Location',
                specialization='$Specialization',
                course='$course' 
                WHERE id=$branch_id";
        
        $query_run = mysqli_query($connection, $query);
        if($query_run)
        {
            $_SESSION['success'] = "Successfully Created";
            if($contentType == "Jobs"){
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated a Job Post: $Title',now(),'Jobs')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                if($query_run_logs)
                {
                    header('Location: jobPost.php');
                }
            }
            else{
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Announcement / Events: $Title',now(),'Announcement / Events')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                if($query_run_logs)
                {
                  header('Location: announcement.php');
                }
            }
        }
        else
        {
            $_SESSION['status'] = "Error on creation";
            if($contentType == "Jobs"){
                header('Location: jobPost.php');
            }
            else{
                header('Location: announcement.php');
            }
        }
}

if(isset($_POST['deleteContent'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM events WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Announcement / Events: $id',now(),'Announcement / Events')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: announcement.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: announcement.php');
    }
}

if(isset($_POST['updateContent'])){
    $id = $_POST['update_id'];

    $query = "UPDATE events set AllowPost = 'Approved' WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Announcement / Events: $id',now(),'Announcement / Events')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Content Post Approved";
            header('Location: approve.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: announcement.php');
    }
}

if(isset($_POST['disapproveContent'])){
    $id = $_POST['disapprove_id'];

    $query = "UPDATE events set AllowPost = 'Disapproved' WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted an Announcement / Events: $id',now(),'Announcement / Events')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Content Post Disapproved";
            header('Location: approve.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        header('Location: announcement.php');
    }
}


if(isset($_POST['deleteJob'])){
    $id = $_POST['delete_id'];

    $query = "DELETE FROM events WHERE id='$id' "; 
    $query_run = mysqli_query($connection,$query);

    if($query_run)
    {
        $email_login= $_SESSION['username'];
        $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Updated an Announcement / Events: $id',now(),'Announcement / Events')";
        $query_run_logs = mysqli_query($connection, $querylogs);
        if($query_run_logs)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            header('Location: jobPost.php');
        }
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Deleted";
        header('Location: jobPost.php');
    }
}

//checkbox delete of alumni
$del_count = 0;
if(isset($_POST['checkbox'][0])){
	foreach($_POST['checkbox'] as $list){
		$id=mysqli_real_escape_string($connection,$list);
        $query = "DELETE FROM students WHERE id='$id'";
		$query_run = mysqli_query($connection, $query);
        $del_count ++;

            if($query_run)
            {
                $email_login= $_SESSION['username'];
                $querylogs = "INSERT INTO logs (user,movement,movement_date,log_type) VALUES ('$email_login','User Deleted an Alumni Account $id',now(),'Announcement / Events')";
                $query_run_logs = mysqli_query($connection, $querylogs);
                    if($query_run_logs)
                    {
                        $query = "DELETE FROM batch WHERE Name='$id' "; 
                        $query_run1 = mysqli_query($connection,$query);
                    }
            }
            else
            {
                $_SESSION['status'] = "Your Data is NOT Deleted";
                header('Location: alumni.php');
            }
        }
}


?>