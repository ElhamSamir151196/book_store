<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
require_once "../app/models/order_model.php";
require_once "../app/models/book_model.php";

function dasboard_index()
{
    $_SESSION['Users'] =  list_users();
    $_SESSION['Orders'] =  list_order();
    $_SESSION['Books'] =  list_books();

    redirect("dashboard_home");
    die;
}


?>