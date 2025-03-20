<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/order_model.php";
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$errors=[];


/** user interface*/
function order_index()
{
    require '../app/pages/orders.php';
}

function track_order(){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }
    
        // validation order_id => required 
        if(!requiredVal($order_id)){
            $_SESSION["error"]= "order id is required";
            redirect("track-order");
            die;
        }
        
        $order=get_order($order_id);
       
        if(!$order){
            $_SESSION["error"]= "order id is wrong";
            redirect("track-order");
            die;
        }


        // email => required, check if correct or not
        if(!requiredVal($email)){ 
            $errors[]= "email is required";
        }elseif($order["email"] != $email){
            $errors[]= "not correct email for this order id";
        }
       
        if(empty($errors)){

             
            // send email
            $subject = "Order Tracking -Coding Arabi";
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

            $mail->setFrom("elham.samir.cairo.1996@gmail.com", "Coding Arabi");
            $mail->addAddress($email, "");

            $mail->Subject = $subject;
            //$mail->Body = $message;
            // Enable HTML email
            $mail->isHTML(true);
            if($order["statues"] == "done"){
                $mail->Body = 'Click <a href="http://localhost/EraaSoft%20PHP/Projects/Book-Store/New%20folder/book%20-2/public/order-recieved?order_id='.$order_id.'">here</a> to track your order.';//chanage link to your path
            }else{
                $mail->Body = 'Click <a href="http://localhost/EraaSoft%20PHP/Projects/Book-Store/New%20folder/book%20-2/public/order-details?order_id='.$order_id.'">here</a> to track your order.';//chanage link to your path
            }

            $mail->send();
            $_SESSION['Success']="Mail Send Sucessfully";

            } catch (Exception $e) {
                $_SESSION["error"]= "Email could not be sent. Error: {$mail->ErrorInfo}";
            }            
            redirect("track-order");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("track-order");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("track-order");
        die;
    }
}

?>


