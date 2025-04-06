<?php
require_once('../app/handlers/ConnectionDB.php');
//add Order
function add_order($newOrder)
{
    $table_name='orders';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newOrder);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list Orders
function list_order()
{
    $table_name='orders';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}

/** select books using pagination */
function get_orders_pagination($columns_name,$where=null,$limit=null)
{
    $table_name='orders';
    $database=new ConnectionDB();
    //$columns_name="*";
    //$where="catergory_id=$catergory_id ";
    $data = $database->select($table_name, $columns_name,$where,$limit);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

/** select order using id */
function get_order($id)
{
    $table_name='orders';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $order = $database->select($table_name, $columns_name,$where);
    if (!empty($order)) {
        return $order[0];
    }

    return false;
}

/** select order using user id*/
function get_order_by_user_id($user_id)
{
    $table_name='orders';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="user_id=$user_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}


//delete orders
function delete_order($id)
{
    $table_name='orders';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update order data
function update_order($id, $data)
{
    $table_name='orders';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}

/*** get last id */
function get_last_id_order(){
    $table_name= "orders";
    $database=new ConnectionDB();
    $last_id=  $database->get_last_id( $table_name);
    return $last_id['MAX(id)'];
}

?>