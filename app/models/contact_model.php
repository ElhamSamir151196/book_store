<?php
require_once('../app/handlers/ConnectionDB.php');

//add contacts
function add_contacts($new_contact)
{
    $table_name='contacts';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_contact);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list contacts
function list_contacts()
{
    $table_name='contacts';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select contacts using id */
function get_contacts($id)
{
    $table_name='contacts';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete contacts
function delete_contacts($id)
{
    $table_name='contacts';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update contacts data
function update_favorite_product($id, $data)
{
    $table_name='contacts';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>