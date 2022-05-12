<?php
// Load the database configuration file

include('security.php');
// include('../includes/header.php');
// include('../includes/navbar.php');
include "../dbconfig.php";
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

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            // Skip the first line
            fgetcsv($csvFile);
            $campus= $_POST['campus'];
            $course= $_POST['course'];
            $testSchoolIDbulk = $_POST['testSchoolIDbulk'];
            $batch= $_POST['batch'];
            // Parse data from CSV file line by line
            $mail->From = "arellano.alumnisd@gmail.com";
            $mail->FromName = "Arellano Alumni";
            $counter =0;
            $total=0;
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $alumni_id   = $line[0];
                $studNo   = $line[1];
                $fname   = $line[2];
                $mname   = $line[3];
                $lname   = $line[4];
                $email  = $line[5];
                $phone  = $line[6];
                $address  = $line[7];
                $studDate  = $line[8];
                $studStatus  = $line[9];
                $studDes  = $line[10];
                $studOR  = $line[11];
                $password =uniqid();
                $pass = password_hash($password, PASSWORD_DEFAULT);
                    // Insert member data in the database
                    
                    $survey = $connection->query("SELECT * FROM students WHERE studNo ='".$studNo."'");
                    $test = "SELECT * FROM students WHERE studNo =".$studNo;
                    /* Get the number of rows in the result set */
                    $row_cnt = $survey->num_rows;
                    if($row_cnt == 0)
                        {
                            $connection->query("INSERT INTO students
                            (id,studRemarks,studNo, firstname,middleName,lastname, email, contact,studDate, password, courseGraduated,schoolAttended,address,interest,studStatus,studDes,studOR) 
                            VALUES (null,'".$alumni_id."','".$studNo."','".$fname."', '".$mname."', '".$lname."','".$email."', '".$phone."', NOW(), '".$pass."', '".$course."', '".$campus."', '".$address."','".$testSchoolIDbulk."','".$studStatus."','".$studDes."','".$studOR."')");
                            $last_id = mysqli_insert_id($connection);  
                            
                            $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$last_id,$batch,now())";
                            $result1 = mysqli_query($connection, $sqlBatch);
                
                            $mail->addAddress("$email", "$fname $mname $lname");
                            $mail->isHTML(true);
                            $mail->Subject = " Alumni Invitation";
                            $mail->Body = "<div>
                            <p>
                            We are inviting you to use our Alumni Portal as being part of Arellano University Alumni Student.
                            </p><p>
                            Here is your account details:
                            </p><p>
                            Email:  $email
                            </p>
                            <p>
                            Password: $password
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
                                $mail->clearAllRecipients(); 
                                $counter++;
                                $_SESSION['success'] = "Alumni Data Unsucessfully Imported: " . " " . $counter;
                                header('Location: alumni.php');
                            } catch (Exception $e) {
                                echo "Mailer Error: " . $mail->ErrorInfo;
                            }
                            
                        }
                    else{
                        echo ("<script LANGUAGE='JavaScript'>
                        alert('student already exist');
                        </script>");
                        $total++;
                        $_SESSION['exist'] = "Alumni Data Unsucessfully Imported: " . " " . $total;
                        header('Location: alumni.php?status=exist');
                    }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
            
            

            
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }
}
// Redirect to the listing page
