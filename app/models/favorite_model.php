<?php
require_once('../app/handlers/ConnectionDB.php');

//add favorite product
function add_favorite_product($new_favorite_products)
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_favorite_products);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list favorite product
function list_favorite_products()
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select favorite product using id */
function get_favorite_product($id)
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select favorite products using offer id*/
function get_favorite_products_by_user_id($user_id)
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="user_id=$user_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

//delete favorite product
function delete_favorite_product($id)
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update favorite product data
function update_favorite_product($id, $data)
{
    $table_name='favorite_products';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>