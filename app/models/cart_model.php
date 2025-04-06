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

function is_product_in_cart($book_id,$user_id){
    $table_name='cart_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="user_id=$user_id and book_id= $book_id and statues='cart' ";
    $data = $database->select($table_name, $columns_name,$where);
    if (!empty($data)) {
        return true;
    }

    return false;

}

/** select cart product using id */
function get_cart_product($id)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $data = $database->select($table_name, $columns_name,$where);
    if (!empty($data)) {
        return $data[0];
    }

    return false;
}


/** select cart product using id */
function get_cart_product_where($where=null)
{
    $table_name='cart_products';
    $database=new ConnectionDB();
    $columns_name="*";
    //$where="id=$id ";
    $data = $database->select($table_name, $columns_name,$where);
    if (!empty($data)) {
        return $data[0];
    }

    return false;
}

/** select get_cart_books using user id */
function get_cart_books($user_id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $data=$database->join_tables("books" ,"id ","cart_products","book_id  and cart_products.user_id =$user_id ");
    if (!empty($data)) {
        return $data;
    }

    return false;
}

/** select get_cart_books using user id */
function get_cart_books_where_not_ordered($user_id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $data=$database->join_tables("books" ,"id ","cart_products","book_id  and cart_products.user_id =$user_id and cart_products.statues= 'cart' ");
    if (!empty($data)) {
        return $data;
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