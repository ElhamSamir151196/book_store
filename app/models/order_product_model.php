<?php
require_once('../app/handlers/ConnectionDB.php');

//add order product
function add_order_product($newOrder)
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newOrder);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list order products
function list_order_products()
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select order product using id */
function get_order_product($id)
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select order all products using order id*/
function get_order_product_by_order_id($order_id)
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="order_id=$order_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete order product
function delete_order_product($id)
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update order product data
function update_order_product($id, $data)
{
    $table_name='order_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>