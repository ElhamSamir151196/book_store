<?php
require_once('../app/handlers/ConnectionDB.php');

//add books
function add_books($new_book)
{
    $table_name='books';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_book);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list books
function list_books()
{
    $table_name='books';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select book using id */
function get_book($id)
{
    $table_name='books';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $book = $database->select($table_name, $columns_name,$where);
    if (!empty($book)) {
        return $book[0];
    }

    return false;
}

/** select books using catergory_id */
function get_books_by_catergory_id($catergory_id)
{
    $table_name='books';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="catergory_id=$catergory_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select books using pagination */
function get_books_pagination($columns_name,$where=null,$limit=null)
{
    $table_name='books';
    $database=new ConnectionDB();
    //$columns_name="*";
    //$where="catergory_id=$catergory_id ";
    $Review = $database->select($table_name, $columns_name,$where,$limit);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select books using user id*/
function get_books_by_user_id($user_id)
{
    $table_name='books';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="user_id=$user_id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

function get_most_buy_books(){

    $query= 'select * FROM books ,
    (SELECT `product_id` FROM order_products GROUP BY `product_id` ORDER BY COUNT(*) desc limit 10) as  sub
    WHERE sub.product_id = books.id ';
    $database=new ConnectionDB();
    $data = $database->select_query($query);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

function get_last_list_books(){

    $query= 'SELECT * FROM `books` ORDER by id DESC limit 10 ';
    $database=new ConnectionDB();
    $data = $database->select_query($query);
    if (!empty($data)) {
        return $data;
    }

    return false;
}

//delete book 
function delete_book($id)
{
    $table_name='books';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

// update book data
function update_book($id, $data)
{
    $table_name='books';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}

/*** get last id */
function get_last_id_book(){
    $table_name= "books";
    $database=new ConnectionDB();
    $last_id=  $database->get_last_id( $table_name);
    return $last_id['MAX(id)'];
}
?>