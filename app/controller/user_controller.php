<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";

$errors=[];

/*** user Interface */
function user_show()
{
    require '../app/pages/User Interface/profile.php';
}

function update_user_data(){
    if (checkRequestMethod("POST")&&isset($_SESSION['auth']))
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
        }elseif ($name != $_SESSION['auth']['name']) {
            $data['name'] = $name;
        }
        
        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
        $errors[]= "email is required";
        }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
        }elseif ($email != $_SESSION['auth']['email']) {
            if (!notExistEmail($email)) {
                $errors[] = "please type other email , this email already exist";
            } else {
                $data['email'] = $email;
            }
        }

        

        if (empty($errors)){
            // same data no change 
            if(!isset($data)){
               $_SESSION['error'] ="no data changed , try again!!";
                redirect("account_details");
                die;
            }
            $update_statues = update_User($_SESSION['auth']['id'], $data);
            if (!$update_statues) {
                $_SESSION['error'] = "update error ,please try again";
                redirect("account_details");
                die;
            }
            $_SESSION['auth'] = get_User($_SESSION['auth']['id']);
            $_SESSION['Success'] = "Account updated Sucessfully";
            redirect("account_details");
            die;
       
        }else{
        $_SESSION["errors"]=$errors;
        redirect("account_details");
        die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("account_details");
        die;
    }
}

/** ** Dashboard */
function user_index(){
    
    $_SESSION['Users'] =  list_users();
    redirect("index-users");
    die;
        
}




?>