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
    require '../app/pages/User Interface/orders.php';
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

function order_store(){
    if (checkRequestMethod("POST"))
    {
        echo "<br><br><br><br><br><br><br><br>";
        foreach($_POST as $key => $value){
            if($key=="categories"){
                $$key=$value; // array value from check inputs
            }else{
                $$key=sanitizeInput($value);        
            }
        }
        // orderd => `statues`, `user_id`, `total_price`, `address`, `notes`, `phone`, `email`, `first_name`, `last_name`, `city`
    
        // validation first_name => required, min: 3,max:50 
        if(!requiredVal($first_name)){
            $errors[]= "first_name is required";
        }elseif(!minVal($first_name, 3)){
            $errors[]= "first_name must be greater than 3 chars";
        }elseif(!maxVal($first_name, 50)){
            $errors[]=  "first_name must be less than 50 chars";
        }
    
        // validation last_name => required, min: 3,max:50 
        if(!requiredVal($last_name)){
            $errors[]= "last_name is required";
        }elseif(!minVal($last_name, 3)){
            $errors[]= "last_name must be greater than 3 chars";
        }elseif(!maxVal($last_name, 50)){
            $errors[]=  "last_name must be less than 50 chars";
        }

        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
           // $errors[]= "email is required";//optional
        }elseif(!emailVal($email)){
            $errors[]= "please type a valid email";
        }


        // validation phone => required, min: 5,max:11 , numeric 
        if(!requiredVal($phone)){
            $errors[]= "phone is required";
        }elseif(!minVal($phone, 5)){
            $errors[]= "phone must be greater than 5 numbers";
        }elseif(!maxVal($phone, 12)){
            $errors[]= "phone must be less than 12 numbers";
        }elseif(!is_numeric($phone)){
            $errors[]=  "phone must be numbers";
        }

        // validation total_price => required, numeric 
        if(!requiredVal($total_price)){
            $errors[]= "total_price is required";
        }elseif($total_price<=0){
            $errors[]= "total_price must be number greater than zero";
        }elseif(!is_numeric($total_price)){
            $errors[]=  "total_price must be numbers";
        }



        // validation address => required, min: 2,max:200 
        if(!requiredVal($address)){
            $errors[]= "address is required";
        }elseif(!minVal($address, 2)){
            $errors[]= "address must be greater than 2 chars";
        }elseif(!maxVal($address, 200)){
            $errors[]=  "address must be less than 200 chars";
        }

        // validation notes => required, min: 3,max:500 
        if(!requiredVal($notes)){
            $errors[]= "notes is required";
        }elseif(!minVal($notes, 3)){
            $errors[]= "notes must be greater than 3 chars";
        }elseif(!maxVal($notes, 500)){
            $errors[]=  "notes must be less than 500 chars";
        }

        // orderd => `statues`, `user_id`, `total_price`, `address`, `notes`, `phone`, `email`, `first_name`, `last_name`, `city`

    
            
        if(empty($errors)){
            
            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email?? null,
                "phone" => $phone,
                "notes" =>$notes,
                "address" => $address,
                "user_id" =>$_SESSION['auth']['id'],
                "total_price" => $total_price,
                "city" => $city,
               "statues"=> "pending"
                ];

                if(!add_order($data)){
                    $_SESSION["error"]= "insert new order error";
                    redirect("home");
                    die;
                }
                
                
            $_SESSION['Success']="Added new order Successfully";
            unset($_SESSION["cart"]);
            redirect("home");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("home");
            die;
        }
    }else{
        redirect("home");
        die;
    }
}

?>


