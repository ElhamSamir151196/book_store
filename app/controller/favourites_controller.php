<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/book_model.php";
require_once "../app/models/user_model.php";
require_once '../app/models/favorite_model.php';

$errors=[];


function favourites_index()
{
    $_SESSION['fav_books']=get_user_favorite_books($_SESSION['auth']['id']);
    //echo "<br> <br><br><br><br><br><br>";
    //var_dump($_SESSION['fav_books']);
  //  die;
    require '../app/pages/User Interface/favourites.php';
}

function add_to_favorite(){

    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            redirect("home");
            die;
        }

        $id=$_GET['id'];
       
        //echo "<br><br><br><br><br><br><br><br><br>";
       // var_dump(is_favorite($id,$_SESSION['auth']['id']));
        //die;
        if(!is_favorite($id,$_SESSION['auth']['id'])){
            $data=[
                'user_id'=> $_SESSION['auth']['id'],
                'book_id'=>$id
            ];

            if(!add_favorite_product($data)){
                $_SESSION["error"]= "can't make product favorite";
            }else{
                $_SESSION["is_favorite"]= "true";
            }
        }
            
            redirect("single-product?id=$id");
            die;
        
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        redirect("home");
        die;
    }

}


function delete_favourit_book(){
   
    if($_SERVER['REQUEST_METHOD']=="GET"){
        
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            redirect("favourites");
            die;
        }
        
        $id=$_GET['id'];
        $delete_statues=delete_favorite_product($id);
       
        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
        redirect("favourites");
        die;
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        redirect("favourites");
        die;
    }
}
?>


