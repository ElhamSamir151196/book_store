<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
$errors=[];
function check_login_user()
{
    if (checkRequestMethod("POST") )
    { 
        foreach($_POST as $key=> $value){
        $$key=  sanitizeInput($value);
        }

        //vallidations 

        
        // email => required, email  
        if(!requiredVal($email)){ 
        $errors[]= "email is required";
        }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
        }

        //password=> required , min=6 , max =20
        if(!requiredVal($password)){
        $errors[]= "password is required";
        }elseif(!minVal($password,6)){
        $errors[]= "password must be greater than 6 chars";
        }elseif(!maxVal($password,20)){
        $errors[]= "password must be less than 20 chars";
        }


        if (empty($errors)) { // email, password 

            $user = LoginCheck($email, sha1($password));
            if (!$user) {
                $_SESSION['error'] =  "wrong email or password!";
                redirect("account");
                die;
            }
            $_SESSION['auth'] = $user; //get_User($user);
            $_SESSION['Success']="you login Sucessfully";
            //var_dump($_SESSION['auth']);
            if(isset($remember_me)){
                
                setcookie("auth_id", $_SESSION['auth']['id'], time() + (86400 * 3), "/");// 86400 = 1 day
                /*if(!isset($_COOKIE["auth_name"])) {
                    echo "Cookie named '" . "auth_name" . "' is not set!";
                } else {
                    echo "Cookie '" . "auth_name" . "' is set!<br>";
                    echo "Value is: " . $_COOKIE["auth_name"];
                }
                echo "here";
                die;*/
            }
            if($_SESSION['auth']['type']=="admin"){
                redirect("dashboard-home");
                die; 
            }
            redirect("home");
            die;
        } else {
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

function user_remember_me(){
    if(isset($_COOKIE["auth_id"])) {
        $_SESSION["auth"] = get_User($_COOKIE["auth_id"]);
        if(!isset($_SESSION["auth"])) {// if user id not exist
            setcookie("auth_id", "", time() - 3600, "/");// expire 1 hour ago
            redirect("home");
            die;
        }
        redirect("home");
        die;
    } else {
        setcookie("auth_id", "", time() - 3600, "/");// expire 1 hour ago
        redirect("home");
        die;
    }
}
?>