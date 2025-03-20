<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/category_model.php";
require_once "../app/models/user_model.php";

$errors=[];


function category_index(){
    
    $_SESSION['categories'] =  list_catergory();
    redirect("index-category");
    die;
        
}

function category_insert (){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// book => name , description
    
        // validation name => required, min: 3,max:100 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 100)){
            $errors[]=  "name must be less than 30 chars";
        }
    
        
        // validation description => required, min: 3,max:500 
        if(!requiredVal($description)){
            $errors[]= "description is required";
        }elseif(!minVal($description, 3)){
            $errors[]= "description must be greater than 3 chars";
        }elseif(!maxVal($description, 500)){
            $errors[]=  "description must be less than 500 chars";
        }


       
        if(empty($errors)){
            
            $data = [
                "name" => $name,
                "description" => $description,
                "user_id" =>$_SESSION['auth']['id']];

                if(!add_catergory($data)){
                    $_SESSION["error"]= "insert new category error";
                    redirect("create-category");
                    die;
                }
            $_SESSION['success']="Added new Category Successfully";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("create-category");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("create-category");
        die;
    }
}

function category_show(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
        }

        $id=$_GET['id'];
        $category=get_catergory($id);

        if(isset($category)){
            $_SESSION['Category_user']= get_User( $category['user_id'] );
            $_SESSION['Category']=$category;
            redirect("category_show");
            die;
        }else{
            $_SESSION['error'] =  "can't get post data";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        $_SESSION['categories'] =  list_catergory();
        redirect("index-category");
        die;
    }

}

function category_edit(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
        }

        $id=$_GET['id'];
        $category=get_catergory($id);

        if(isset($category)){
            $_SESSION['Category_user']= get_User( $category['user_id'] );
            $_SESSION['Category']=$category;
            redirect("category_edit");
            die;
        }else{
            $_SESSION['error'] =  "can't get category data";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        $_SESSION['categories'] =  list_catergory();
        redirect("index-category");
        die;
    }

}

function category_update(){
    if (checkRequestMethod("POST"))
    {
        if(isset($_POST['id'])){
            echo $_POST['id'];
        }
    
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// category => name , description

        // validation name => required, min: 3,max:25 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 30)){
            $errors[]=  "name must be less than 30 chars";
        }
    
         // validation description => required, min: 3,max:500 
         if(!requiredVal($description)){
            $errors[]= "description is required";
        }elseif(!minVal($description, 3)){
            $errors[]= "description must be greater than 3 chars";
        }elseif(!maxVal($description, length: 500)){
            $errors[]=  "description must be less than 500 chars";
        }
        
        $category=get_catergory($id);

        if($description==$category['description'] &&$name==$category['name']  ){
            $errors[]= 'no chnage in data';
        }
    
        // name , description
        if(empty($errors)){
            
            $data = [
                "name" => $name,
                "description" => $description,
                "user_id" =>$_SESSION['auth']['id']
            ];

            if(!update_catergory($id,$data)){
                $_SESSION["error"]= "update category error";
                $_SESSION['Category_user']= get_User( $category['user_id'] );
                $_SESSION['Category']=$category;
                redirect("category_edit");
                die;
            }
                $_SESSION['success']="update new Category Successfully";
                $_SESSION['categories'] =  list_catergory();
                redirect("index-category");
                die;
        
            
        }else{
            $_SESSION['errors']=$errors;
            $_SESSION['Category_user']= get_User( $category['user_id'] );
            $_SESSION['Category']=$category;
            redirect("category_edit");
            die;
        }

    }else{
        $_SESSION["error"]= "not supported method";
        $_SESSION['categories'] =  list_catergory();
        redirect("index-category");
        die;
    }
    
}

function category_delete(){
   
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            $_SESSION['categories'] =  list_catergory();
            redirect("index-category");
            die;
        }

        $id=$_GET['id'];
        $delete_statues=delete_catergory($id);

        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
        $_SESSION['categories'] =  list_catergory();
        redirect("index-category");
        die;
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        $_SESSION['categories'] =  list_catergory();
        redirect("index-category");
        die;
    }
}


?>