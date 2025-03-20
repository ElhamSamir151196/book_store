<?php
require_once('../app/handlers/ConnectionDB.php');

//add books_categories
function add_books_categories($new_books_categories)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $insert_statues = $database->insert_item($table_name, $new_books_categories);
    return  $insert_statues; //"Account Created Sucessfully"
}

// list books_categories
function list_books_categories()
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $Users =  $database->select($table_name);
    return $Users;
}


/** select catergories using id */
function get_book_catergory($id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="id=$id ";
    $Review = $database->select($table_name, $columns_name,$where);
    if (!empty($Review)) {
        return $Review;
    }

    return false;
}

/** select catergories using id */
function get_book_catergories($book_id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $columns_name="*";
    $where="book_id=$book_id ";
    //$data = $database->select($table_name, $columns_name,$where);
    /*SELECT *
FROM books_categories
 join catergories on books_categories.catergory_id=catergories.id and book_id = 15*/
 $data=$database->join_tables("catergories" ,"id ","books_categories","catergory_id and book_id =$book_id ");
    if (!empty($data)) {
        return $data;
    }

    return false;
}


//delete books_categories
function delete_book_catergory($id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $where="id=$id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}

//delete books_categories
function delete_book_catergory_by_book_id($book_id)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $where="book_id=$book_id ";
    $delete_status =  $database->delete_item($table_name, $where);
    return $delete_status;
}
// update catergory data
function update_book_catergory($id, $data)
{
    $table_name='books_categories';
    $database=new ConnectionDB();
    $where="id=$id ";
    $update_status =  $database->update_item($table_name, $data, $where);
    return $update_status;
}


?>