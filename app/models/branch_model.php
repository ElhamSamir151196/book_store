<?php
require_once('../app/handlers/ConnectionDB.php');

//add branches
function add_branch($cart_products)
{
    $table_name='branches';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $cart_products);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list branches
function list_branches()
{
    $table_name='branches';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select branches using id */
function get_branch($id)
{
    $table_name='branches';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $branch = $database->select($table_name, $columns_name,$where);
    if (!empty($branch)) {
        return $branch[0];
    }

    return false;
}


//delete branch
function delete_branch($id)
{
    $table_name='branches';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update branch
function update_branch($id, $data)
{
    $table_name='branches';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>