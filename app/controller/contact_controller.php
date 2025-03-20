<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/contact_model.php";
$errors=[];

function contact_insert(){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// contact => `name`, `phone_number`, `email`, `reason`, `meessage`
    
        // validation name => required, min: 3,max:100 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 100)){
            $errors[]=  "name must be less than 30 chars";
        }

        // validation reason => required
        if(!requiredVal($reason)){
            $errors[]= "reason is required";
        }

        // validation meessage => required, min: 3,max:700 
        if(!requiredVal($meessage)){
            $errors[]= "meessage is required";
        }elseif(!minVal($meessage, 3)){
            $errors[]= "meessage must be greater than 3 chars";
        }elseif(!maxVal($meessage, 700)){
            $errors[]=  "meessage must be less than 700 chars";
        }
    
        // email => required, email format
        if(!requiredVal($email)){ 
            $errors[]= "email is required";
        }elseif(!emailVal($email)){
            $errors[]= "please type a valid email";
        }

         // validation phone_number => required, min: 5,max:11 , numeric 
         if(!requiredVal($phone_number)){
            $errors[]= "phone_number is required";
        }elseif(!minVal($phone_number, 5)){
            $errors[]= "phone_number must be greater than 5 chars";
        }elseif(!maxVal($phone_number, 12)){
            $errors[]= "phone_number must be less than 12 chars";
        }elseif(!is_numeric($phone_number)){
            $errors[]=  "phone_number must be numbers";
        }
       
        if(empty($errors)){//contact => `name`, `phone_number`, `email`, `reason`, `meessage`
            
            $data = [
                "name" => $name,
                "phone_number" => $phone_number,
                "email" => $email,
                "reason" => $reason,
                "meessage" =>$meessage
            ];

                if(!add_contacts($data)){
                    $_SESSION["error"]= "insert new contact error";
                    redirect("contact");
                    die;
                }
            $_SESSION['Success']="Message send Successfully";
            redirect("contact");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("contact");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("contact");
        die;
    }
}


?>