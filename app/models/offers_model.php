<?php
require_once('../app/handlers/ConnectionDB.php');
//add day_offers
function add_day_offers($newOrder)
{
    $table_name='day_offers';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newOrder);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list day_offers
function list_day_offers()
{
    $table_name='day_offers';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select day_offers using id */
function get_day_offers($id)
{
    $table_name='day_offers';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete day_offers
function delete_day_offers($id)
{
    $table_name='day_offers';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update day_offers data
function update_day_offers($id, $data)
{
    $table_name='day_offers';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>