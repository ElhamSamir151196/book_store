<?php
require_once('../app/handlers/ConnectionDB.php');

//add offer product
function add_offer_product($newoffer_products)
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newoffer_products);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list offer products
function list_offer_products()
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select offer product using id */
function get_offer_products($id)
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select offer products using offer id*/
function get_offer_products_by_offer_id($offer_id)
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="offer_id=$offer_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete offer product
function delete_offer_product($id)
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update offer product data
function update_offer_products($id, $data)
{
    $table_name='offer_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>