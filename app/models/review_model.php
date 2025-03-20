<?php
require_once('../app/handlers/ConnectionDB.php');
//add Review
function add_review($newReview)
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $newReview);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list Reviews
function list_review()
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select Review using id */
function get_review($id)
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select Review using by book id*/
function get_review_by_book_id($book_id)
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="book_id=$book_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

//delete Review
function delete_review($id)
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update Review data
function update_review($id, $data)
{
    $table_name='reviews';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>