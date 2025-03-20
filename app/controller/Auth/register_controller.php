<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
$errors=[];
function store_user()
{
    if (checkRequestMethod("POST"))
    { 
        foreach($_POST as $key=> $value){
        $$key=  sanitizeInput($value);
        }

        //vallidations 

        //name=> required , min:3 mam:25
        if(!requiredVal($name)){
        $errors[]= "name is required";
        }elseif(!minVal($name,3)){
        $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name,25)){
        $errors[]= "name must be less than 25 chars";
        } 
        
        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
        $errors[]= "email is required";
        }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
        }elseif (!notExistEmail($email)) {
            $errors[] = "please type other email , this email already exist";
        }

        //password=> required , min=6 , max =20
        if(!requiredVal($password)){
        $errors[]= "password is required";
        }elseif(!minVal($password,6)){
        $errors[]= "password must be greater than 6 chars";
        }elseif(!maxVal($password,20)){
        $errors[]= "password must be less than 20 chars";
        }


        if (empty($errors)){

        $data = [
            "name" => $name,
            "email" =>$email,
            "type" =>"user",
            "password" => sha1( $password)
        ];
        $insert_statues=addUser($data);
        if(!$insert_statues){
                $_SESSION['error']="error in add user to database";
                redirect("account");
                die;
            }
            $_SESSION['auth']=get_User_by_email($email);
            $_SESSION['Success']="Account Created Sucessfully";
            redirect("home");
            die;
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