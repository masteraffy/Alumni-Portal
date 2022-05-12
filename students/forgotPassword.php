<?php
    include('security.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "../vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 3;                               
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

$mail->From = "arellano.alumnisd@gmail.com";
$mail->FromName = "Arellano Alumni";

$emailAddress=$_POST['email'];
$password =uniqid();
$pass = password_hash($password, PASSWORD_DEFAULT);
if(isset($_POST['forgot']))
{

    $mail->addAddress("$emailAddress");

    $mail->isHTML(true);

    $mail->Subject = "Forgot Password";
    $mail->Body = "<i>Forgot Password successfully, Please try your new password: $password </i>";

    try {
        $mail->send();
        $sqlUpdate ="UPDATE students SET
            password='$pass'
            WHERE email='$emailAddress' ";
        $result = mysqli_query($connection, $sqlUpdate);
        if($result){
            header('Location: login.php');
            $_SESSION['success'] = 'New Password sent successfully!';
        }
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}