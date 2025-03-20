<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
$errors=[];


function update_user_password()
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  email,password , password_confirm

        // email => required, email , not exist before 
        if (empty($email)) {
            $_SESSION['error'] = "email is required, try again";
            redirect("account");
            die;
        }elseif(!emailVal($email)){
            $_SESSION['error'] = "please type a valid email";
            redirect("reset-password?email=$email");
            die;
        }elseif(notExistEmail($email)) {
            $_SESSION['error'] = "please type other email , this email not exist";
            //header("location:account");
            redirect("reset-password?email=$email");
            die;
        }else{
            $user = get_User_by_email($email);
        }


        // validation password => required, min: 6,max:100 
        if (empty($password)) {
            $errors[] = "password is required";
        } elseif (strlen($password) < 6) {
            $errors[] = "password must be greater than 6 chars";
        } elseif (strlen($password) > 100) {
            $errors[] =  "password must be less than 25 chars";
        }

        // validation password => required, equality, old password 
        if (empty($password_confirm)) {
            $errors[] = "password confirmation is required";
        } elseif ($password_confirm != $password) {
            $errors[] = "password not match confirm password";
        } elseif (sha1($password) ==  $user['password']) {
            $errors[] = "old password can't be new password";
        }


        if (empty($errors)) { //  password
            $data['password'] = sha1($password);
            $id= $user['id'];
            $update_statues = update_User($id, $data);
            if (!$update_statues) {
                $_SESSION['error'] = "update user error";
                redirect("reset-password?email=$email");
                die;
            }
            $_SESSION['auth'] = get_User($id);
            $_SESSION['Success'] = "Password updated Sucessfully";
            redirect("home");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            redirect("reset-password?email=$email");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        redirect("account");
        die;
    }
}

function change_user_password(){
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION["auth"])) {

        foreach ($_POST as $key => $value) {
            $$key = trim(htmlspecialchars(htmlentities($value)));
        } //  curr_password,new_password , confirm_new_password

       


        // validation password => required, min: 6,max:100 
        if (empty($curr_password)) {
            $_SESSION["error"] = "current password is required";
            redirect("account_details");
            die;
        } elseif (sha1($curr_password)!=$_SESSION["auth"]["password"]) {
            $_SESSION["error"] = "**wrong password**";
            redirect("account_details");
            die;
        } 

        // validation new_password => required, min: 6,max:100 
        if (empty($new_password)) {
            $errors[] = "new password is required";
        } elseif (strlen($new_password) < 6) {
            $errors[] = "new password must be greater than 6 chars";
        } elseif (strlen($new_password) > 100) {
            $errors[] =  "new password must be less than 25 chars";
        }elseif (sha1($new_password) ==  $_SESSION["auth"]['password']) {
            $errors[] = "old password can't be new password";
        }

        // validation confirm_new_password => required, equality, old password 
        if (empty($confirm_new_password)) {
            $errors[] = "password confirmation is required";
        } elseif ($confirm_new_password != $new_password) {
            $errors[] = "new password does not match confirm password";
        } 


        if (empty($errors)) { //  password
            $data['password'] = sha1($new_password);
            $id= $_SESSION["auth"]['id'];
            $update_statues = update_User($id, $data);
            if (!$update_statues) {
                $_SESSION['error'] = "update user error";
                redirect("account_details");
                die;
            }
            $_SESSION['auth'] = get_User($id);
            $_SESSION['Success'] = "Password updated Sucessfully";
            redirect("account_details");
            die;
        } else {
            $_SESSION['errors'] = $errors;
            redirect("account_details");
            die;
        }
    } else {
        $_SESSION['error'] =  "not supported Method";
        redirect("account_details");
        die;
    }
}

?>