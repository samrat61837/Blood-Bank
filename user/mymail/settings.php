<?php
require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
    $mail = new PHPMailer;   
    $mail->isSMTP();
// change this to 0 if the site is going live
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    
    $mail->SMTPSecure = 'tls';

 //use SMTP authentication
    $mail->SMTPAuth = true;
//Username to use for SMTP authentication
    $mail->Username = "samratthapa61837@gmail.com";
    $mail->Password = "barcelona61837";
    $mail->setFrom('samratthapa61837@gmail.com', 'Blood Bank');

    $email_signature = "<br/>Thanks,<br/>Blood Bank<br/>Email: prabinshresthanis111@gmail.com<br>";

    function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    ?>