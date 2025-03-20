<?php  
require_once "../app/handlers/validations.php";

session_start();
session_destroy();
// in case remember me exist => remove it
setcookie("auth_id", "", time() - 3600, "/");// expire 1 hour ago
              
redirect('account');
die;

?>