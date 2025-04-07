<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/book_model.php";

function home_index()
{
    $_SESSION['most_buy_books']=get_most_buy_books()??[];
    $_SESSION['last_list_books']=get_last_list_books()??[];
    require '../app/pages/User Interface/home.php';
}


?>