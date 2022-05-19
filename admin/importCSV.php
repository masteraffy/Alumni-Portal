<?php
include "../dbconfig.php";
include('security.php');

//libary of phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once "../vendor/autoload.php";
//end of library

//functions of php mailer
//start
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
//end of functions for php mailer

// Allowed mime types
$csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values','application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel');
//choose file
$count=0;
$errorCountEmpty=0;
$errorCountRegex=0;
$errorCountExist_stud_no=0;
$successful_count=0;
$regexStudent = "/^[\d]{2}[\-][\d]{5}$/";
$regexAlumni = "/^[\d]{2}[\-][\d]{4}$/";
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['uploadfile']['name']) && in_array($_FILES['uploadfile']['type'], $csvMimes))
    {
        // If the file is uploaded
        if(is_uploaded_file($_FILES['uploadfile']['tmp_name']))
        {
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['uploadfile']['tmp_name'], 'r');
            
             // Skip the first line
             fgetcsv($csvFile);

             //another function of php mailer
             $mail->From = "arellano.alumnisd@gmail.com";
             $mail->FromName = "Arellano Alumni";
             //while loop to get the row data
             while(($line = fgetcsv($csvFile)) !== FALSE)
             {
                 //get row data by the variable $line
                 $alumni_id = $line[0];
                 $stud_id = $line[1];
                 $f_name = $line[2];
                 $m_name = $line[3];
                 $l_name = $line[4];
                 $email = $line[5];
                 $campus = $line[6];
                 $campus_address = $line[7];
                 $course = $line[8];
                 $batch = $line[9];
                 $phone = $line[10];
                 $address = $line[11];
                 $studDate = $line[12];
                 $studStatus = $line[13];
                 $studDes = $line[14];
                 $studOR = $line[15];

                 //schoolAttended
                 $school_Attended = $campus . " - " . $campus_address;
                 //password of account generated
                 $p_gen = uniqid();
                 $password = password_hash($p_gen, PASSWORD_DEFAULT);

                 
                //validation on blank fields
                if(!empty($alumni_id) && !empty($stud_id))
                {   
                    //validation on wrong format of alumniID and studentNo
                    if(preg_match($regexAlumni, $alumni_id) && preg_match($regexStudent, $stud_id))
                    {
                        //validation on existing studNo
                        $exisitng_student = $connection->query("SELECT * FROM students where studNo ='$stud_id'");
                        $row_existing_student = $exisitng_student->num_rows;
                        if($row_existing_student == 0)
                        {  
                            //converting of text to id in branch
                            $query_like_campus = "SELECT * FROM branch where Name like '$campus'";
                            $query_run_like_campus = mysqli_query($connection, $query_like_campus);
                            $result_campus = mysqli_fetch_array($query_run_like_campus);
                            $campus = $result_campus['Id'];

                            //converting of text to id in course
                            $query_like_course = "SELECT * FROM course where title like '$course'";
                            $query_run_like_course = mysqli_query($connection, $query_like_course);
                            $result_course = mysqli_fetch_array($query_run_like_course);
                            $course = $result_course['id'];

                            $query_insert = "INSERT INTO students (id, studRemarks, studNo, firstname, middleName, lastname, email, contact, studDate, password, courseGraduated,schoolAttended, address, interest, studStatus, studDes, studOR) VALUES (null, '".$alumni_id."', '".$stud_id. "', '".$f_name."', '".$m_name."', '".$l_name."', '".$email."', '".$phone."', '".$studDate."', '".$password."', '".$course."', '".$school_Attended."', '".$address."', '".$campus."', '".$studStatus."', '".$studDes."', '".$studOR."')";
                            if($connection->query($query_insert) === TRUE)
                            {
                                //insertion of current rowID to batch table
                                $branch_id = $connection->insert_id;
                                $sqlBatch = "INSERT INTO `batch`(`Id`, `Name`, `Description`, `AddedDate`) VALUES (null,$branch_id,$batch,now())";
                                $result1 = mysqli_query($connection, $sqlBatch);
                                

                                //final function for phpmailer
                                $mail->addAddress("$email", "$f_name $m_name $l_name");
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
                                Password: $p_gen
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
                                    $successful_count++;
                                } catch (Exception $e) {
                                    echo "Mailer Error: " . $mail->ErrorInfo;
                                }

                            }
                            else
                            {
                                echo "Error: " .$query_insert. "<br>" . $connection->error;
                            }

                        }
                        else
                        {
                            $errorCountExist_stud_no++;
                        }
                    }
                    else
                    {
                        $errorCountRegex++;
                    }
                }
                else
                {
                    $errorCountEmpty++;
                }

            }
            //sum of all errors
            $totalerror = $errorCountEmpty + $errorCountRegex + $errorCountExist_stud_no;

            //displaying of all Notifications
            if($errorCountEmpty == 0 && $errorCountRegex == 0 && $errorCountExist_stud_no == 0)
            {
                $_SESSION['success'] = "<b>" . $successful_count .  "</b> out of <b>" . $successful_count . "</b> <i> Entries has been Inserted Successfully! </i>";
                header('Location: alumni.php');
            }
            if($successful_count > 0)
            {
                $display_total = $successful_count + $totalerror;
                $_SESSION['success'] = "<b>" . $successful_count .  "</b> out of <b>" . $display_total . "</b> <i> Entries has been Inserted Successfully! </i>";
                header('Location: alumni.php');
            }

            if($errorCountEmpty > 0)
            {
                $_SESSION['empty'] = "<b>" . $errorCountEmpty  . "</b> <i> Entries has an Empty Alumni ID or Student Number Field </i>";
                header('Location: alumni.php?status=empty');
            }
            
            if($errorCountRegex > 0)
            {
                $_SESSION['regex'] = "<b>" . $errorCountRegex . "</b> <i> Entries has an Invalid Format for Alumni ID or Student Number Field </i>";
                header('Location: alumni.php?status=regex');
            }

            if($errorCountExist_stud_no > 0)
            {
                $_SESSION['exist'] = "<b>" . $errorCountExist_stud_no  . "</b> <i> Entries has an Existing Alumni ID or Student ID </i>";
                header('Location: alumni.php?status=exist');
            }
        }
        //close the opened csv file
        fclose($csvFile);
    }
    else
    {
        $_SESSION['exist'] = "<b> Invalid File Format! </b> Please Upload CSV File Only!";
        header('Location: alumni.php?status=exist');
    }

?>