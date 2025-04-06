<?php
require_once('../app/handlers/ConnectionDB.php');

//add branches phone
function add_branches_phone($new_branches_phone)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_branches_phone);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list branches_phone
function list_branches_phone()
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select branches_phone using id */
function get_branch_phone($id)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $branch_phone = $database->select($table_name, $columns_name,$where);
    if (!empty($branch_phone)) {
        return $branch_phone[0];
    }

    return false;
}

/** select branches phone using branche id*/
function get_branches_phone_by_branches_id($branch_id)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="branch_id=$branch_id ";
    $data = $database->select($table_name, $columns_name,$where);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

/** select branches phone using user id*/
function get_branches_phone_by_user_id($user_id)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="user_id=$user_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete branches phone
function delete_branches_phone($id)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update branches phone data
function update_branches_phone($id, $data)
{
    $table_name='branches_phone';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>