<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';

ob_start();
include ('All.php');
$body = ob_get_clean();
$mail = new PHPMailer(true);

try {
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                     
    $mail->Host       = 'flyfar.tech';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'noreply@flyfar.tech';                  
    $mail->Password   = '@Flyfar123';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom('noreply@flyfar.tech', 'ERP Software - FLy Far');
    $mail->addAddress('fahim@flyfarint.com', 'Cheif Technical Officer');  

    $mail->addCC('ashik@flyfarint.com');
    $mail->addBCC('fahim@flyfarint.com');


    $mail->isHTML(true);                              
    $mail->Subject = 'Daily Report';
    $mail->Body    = $body;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>