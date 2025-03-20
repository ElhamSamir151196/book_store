<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$errors=[];


function forget_password()
{
    if (checkRequestMethod("POST"))
    { 
        foreach($_POST as $key=> $value){
        $$key=  sanitizeInput($value);
        }

        //vallidations 
        
        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
        $errors[]= "email is required";
        }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
        }elseif(notExistEmail($email)) {
            $errors[] = "please type other email , this email not exist";
        }

        

        if (empty($errors)){

        
            // send email
            $subject = "Reset Password -Coding Arabi";
            $mail = new PHPMailer(true);

            try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //$mail->Port = 465; // Use for SSL
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //app name: email sender
            //app password:mrmr ewbm fvja eazy

            $mail->Username = "elham.samir.cairo.1996@gmail.com";
            $mail->Password = "mrmr ewbm fvja eazy";

            $mail->setFrom($email, "Coding Arabi");
            $mail->addAddress("elham.samir.cairo@gmail.com", "");

            $mail->Subject = $subject;
            //$mail->Body = $message;
            // Enable HTML email
            $mail->isHTML(true);
            $mail->Body = 'Click <a href="http://localhost/EraaSoft%20PHP/Projects/Book-Store/New%20folder/book%20-2/public/reset-password?email='.$email.'">here</a> to change your password.';//chanage link to your path
            //$mail->AltBody = 'Visit this link: https://example.com'; // For non-HTML email clients


            $mail->send();
            $_SESSION['Success']="Mail Send Sucessfully";

            } catch (Exception $e) {
                $_SESSION["error"]= "Email could not be sent. Error: {$mail->ErrorInfo}";
            }
            redirect("account");
            die;
            //header("Location: sent.html");
            // end send email
            //$_SESSION['auth']=get_User($_SESSION['auth_id']);
            
        }else{
        $_SESSION["errors"]=$errors;
        redirect("account");
        die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("account");
        die;
    }
}


?>