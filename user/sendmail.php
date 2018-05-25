<?php

include 'mymail/settings.php';
if(isset($_POST['prabin'])){
    $email=$_POST['email'];
    
    $message=$_POST['msg'];

    $mail->addReplyTo('ghanu61837@gmail.com', 'Blood System Admin');
    $mail->addAddress($email, 'User');
    $mail->Subject = 'Blood Request';

    //$message="Hello, this is our first email";
             
    // $message is gotten from the form
    $mail->msgHTML($message);
   // $mail->AltBody = $filteredmessage;
    if (!$mail->send()) 
    {
        $mailmsg = "We are extremely sorry to inform you that your message
             could not be delivered,please try again.";
    } 
    else 
        {
        $mailmsg =  "Your message was successfully delivered,you would be contacted shortly.";
        }

        echo $mailmsg;


$redirectTo = $_POST['returnback'];

        switch ($redirectTo) 
        {
            case 'tbl_common':
                header("location:tbl_common.php");
                break;

            case 'ABnegative':
                header("location:ABnegative.php");
                break;
            
            case 'ABpositive':
                header("location:ABpositive.php");
                break;
            
            case 'Anegative':
                header("location:Anegative.php");
                break;
            
            case 'Apositive':
                header("location:Apositive.php");
                break;
            
            case 'Bnegative':
                header("location:Bnegative.php");
                break;
            
            case 'Bpositive':
                header("location:Bpositive.php");
                break;

            case 'Onegative':
                header("location:Onegative.php");
                break;

            case 'Opositive':
                header("location:Opositive.php");
                break;
            
                
            
            default:
                header("location:profile.php");
                break;
        }
        }
        ?>