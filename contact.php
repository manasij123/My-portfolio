
<link rel="stylesheet" href="css/style.css">

<?php

    //Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];



//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'manasijmandal1999@gmail.com';                     //SMTP username
    $mail->Password   = 'cpjgpcnoochpjiqu';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('manasijmandal1999@gmail.com', 'At Services');
    $mail->addAddress('manasijmandal1999@gmail.com', 'At Services');     //Add a recipient
    
   
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'At Services';
    $mail->Body    = "Sender Name - $name <br> Sender Email - $email <br> Sender subject - $subject <br> Sender Message - $message";
    

    $mail->send();
    
    echo '  
    
    
    <div class="alert"> <h1>! THANK YOU, I WILL GET BACK TO YOU ! </h1>
    
    <p>  <a class="goto" href="https://www.manasijmandal.com/"> Click-Here Go to the home page </a> </p>
    
        <img src="images/thank.gif" alt="https://www.manasijmandal.com/">
    
    </div>
    ';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
