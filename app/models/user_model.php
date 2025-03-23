<?php
require_once('../app/handlers/ConnectionDB.php');
//add User
function addUser($newUser)
{
    $table_name='users';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newUser);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list Users
function list_users()
{
    $table_name='users';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select users using pagination */
function get_users_pagination($columns_name,$where=null,$limit=null)
{
    $table_name='users';
    $database=new ConnectionDB();
    //$columns_name="*";
    //$where="catergory_id=$catergory_id ";
    $data = $database->select($table_name, $columns_name,$where,$limit);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

/** to check if email exist already in users before or not*/
function notExistEmail($email)
{
    $table_name='users';
    $col_name = "email";
    $database=new ConnectionDB();
    $Users = $database->select($table_name, $col_name);
    foreach ($Users as $user) {
        //echo " email = $email , user['email'] = ". $user->email."<br>";
        if (strtoupper($email) == strtoupper($user['email'])) {//php case sensitive but sql not so , convert all to upper letter to ensure not exist before
            return false;
        }
    }

    return true;
}

/** check if user exist with this email and password or not*/
function LoginCheck($email, $password)
{
    $table_name='users';
    $database=new ConnectionDB();
   // $query = "SELECT * FROM `$table_name` WHERE `email`='$email' and `password` = '$password'";
    $columns_name="*";
    $where="`email`='$email' and `password` = '$password'";
    $User = $database->select($table_name,$columns_name,$where);
    if (!empty($User)) {
        return $User[0];//['id'];//get id using email and password
    }

    return false;
}

/** select user using id */
function get_User($id)
{
    $table_name='users';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="`id`='$id' ";
    $User = $database->select($table_name, $columns_name,$where);
    if (!empty($User)) {
        return $User[0];
    }

    return false;
}

/** select user using email */
function get_User_by_email($email)
{
    $table_name='users';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="`email`='$email' ";
    $User = $database->select($table_name, $columns_name,$where);
    if (!empty($User)) {
        return $User[0];
    }

    return false;
}


//delete User
function delete_User($id)
{
    $table_name='users';
    $database=new ConnectionDB();
    $where="`id`='$id' ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update user data
function update_User($id, $data)
{
    $table_name='users';
    $database=new ConnectionDB();
    $where="`id`='$id' ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}

// update user data using email
function update_User_by_email($email, $data)
{
    $table_name='users';
    $database=new ConnectionDB();
    $where="`email`='$email' ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>