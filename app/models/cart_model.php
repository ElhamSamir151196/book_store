<?php
require_once('../app/handlers/ConnectionDB.php');

//add cart_products
function add_cart_products($cart_products)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $cart_products);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list cart_products
function list_cart_products()
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select cart product using id */
function get_cart_product($id)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete cart product
function delete_cart_product($id)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update cart product data
function update_cart_product($id, $data)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>