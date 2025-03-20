<?php
require_once('../app/handlers/ConnectionDB.php');

//add catergory
function add_catergory($new_catergory)
{
    $table_name='catergories';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_catergory);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list catergories
function list_catergory()
{
    $table_name='catergories';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select catergories using id */
function get_catergory($id)
{
    $table_name='catergories';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $category = $database->select($table_name, $columns_name,$where);
    if (!empty($category)) {
        return $category[0];
    }

    return false;
}


//delete catergory
function delete_catergory($id)
{
    $table_name='catergories';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update catergory data
function update_catergory($id, $data)
{
    $table_name='catergories';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>