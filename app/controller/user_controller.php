<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/user_model.php";
require_once '../app/models/favorite_model.php';
require_once "../app/models/book_model.php";
require_once '../app/models/cart_model.php';


$errors=[];

/*** user Interface */
function user_show()
{
    require '../app/pages/User Interface/profile.php';
}

function update_user_data(){
    if (checkRequestMethod("POST")&&isset($_SESSION['auth']))
    { 
        
        foreach($_POST as $key=> $value){
        $$key=  sanitizeInput($value);
        }

        //vallidations 


        //name=> required , min:3 mam:25
        if(!requiredVal($name)){
        $errors[]= "name is required";
        }elseif(!minVal($name,3)){
        $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name,25)){
        $errors[]= "name must be less than 25 chars";
        }elseif ($name != $_SESSION['auth']['name']) {
            $data['name'] = $name;
        }
        
        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
        $errors[]= "email is required";
        }elseif(!emailVal($email)){
        $errors[]= "please type a valid email";
        }elseif ($email != $_SESSION['auth']['email']) {
            if (!notExistEmail($email)) {
                $errors[] = "please type other email , this email already exist";
            } else {
                $data['email'] = $email;
            }
        }

        

        if (empty($errors)){
            // same data no change 
            if(!isset($data)){
               $_SESSION['error'] ="no data changed , try again!!";
                redirect("account_details");
                die;
            }
            $update_statues = update_User($_SESSION['auth']['id'], $data);
            if (!$update_statues) {
                $_SESSION['error'] = "update error ,please try again";
                redirect("account_details");
                die;
            }
            $_SESSION['auth'] = get_User($_SESSION['auth']['id']);
            $_SESSION['Success'] = "Account updated Sucessfully";
            redirect("account_details");
            die;
       
        }else{
        $_SESSION["errors"]=$errors;
        redirect("account_details");
        die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("account_details");
        die;
    }
}

/** ** Dashboard */

function user_index()
{
    //unset($_SESSION["Users"]);
    //var_dump($_SESSION["Users"]);
    //die;
        //*********  pagination part ***************
        // Define how many results per page
        $limit = 5;

        // Get the current page number
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Ensure page is at least 1

        // Calculate offset
        $offset = ($page - 1) * $limit;

        // Get total number of books
        $total_result =get_users_pagination("COUNT(*) AS total");//"SELECT COUNT(*) AS total FROM users"
        $total_Users = $total_result[0]['total'];
        $total_pages = ceil($total_Users / $limit);

        // Fetch books for the current page
        $_SESSION['Users']= get_users_pagination("*",null,"LIMIT $limit OFFSET $offset");//"SELECT * FROM Users LIMIT $limit OFFSET $offset";
        $_SESSION['total_Users']=$total_Users;
        $_SESSION['offset']=$offset;
        $_SESSION['total_pages']=$total_pages;
        

        require '../app/pages/Dashboard/User/userIndex.php';
        //redirect("index-users");
        //die;
}

/*
function user_index(){
    
    $_SESSION['Users'] =  list_users();
    redirect("index-users");
    die;
        
}*/

function show(){
    if (checkRequestMethod("GET"))
    { 
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            user_index();
        }

        $id=$_GET['id'];
        
        $User=get_User($id);
        if(isset($User)){
            $_SESSION['User']=(object)$User;
            require("../app/pages/Dashboard/User/userShow.php");//redirect user
           
        }else{
            $_SESSION['error']="can't get user data";
            user_index();
        }
        
    }else{
        $_SESSION["error"]= "not supported method";
        user_index();
    }
   
}

function edit(){
    if (checkRequestMethod("GET"))
    { 
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            user_index();
        }

        $id=$_GET['id'];
        
        $User=get_User($id);
        if(isset($User)){
            $_SESSION['User']=(object)$User;
            require("../app/pages/Dashboard/User/userEdit.php");//redirect user
           
        }else{
            $_SESSION['error']="can't get user data";
            user_index();
        }
        
    }else{
        $_SESSION["error"]= "not supported method";
        user_index();
    }
}

function update(){
    if (checkRequestMethod("POST"))
    { 
        
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        }
    
        
        if($type =="admin"){

                $data['type'] = "admin";
                $User=update_User($id,$data);
               
                if(isset($User)){
                    $_SESSION['Success']= "User $id become admin now";
                    redirect("user_show?id=$id");
                    die;
                }else{
                    $_SESSION["error"]= "user not updated";
                    redirect("user_edit?id=$id");
                    die;
                }
                
        }else{
           
            $_SESSION["error"]= "no change happended";
            redirect("user_edit?id=$id");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        user_index();
    }
}

function delete(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            user_index();
        }

        $id=$_GET['id'];

        $delete_statues=delete_User($id);
        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
        user_index();
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        user_index();
    }
}

function user_favorite(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            user_index();
        }

        $id=$_GET['id'];

        $_SESSION['fav_books']=get_user_favorite_books($id)??[];
        require("../app/pages/Dashboard/User/userFavorite.php");//redirect user
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        user_index();
    }
}

function user_cart(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            user_index();
        }

        $id=$_GET['id'];

        $_SESSION['user_cart_products']=get_cart_books_where_not_ordered($id)??[];
        
        require("../app/pages/Dashboard/User/userCart.php");//redirect user
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        user_index();
    }
}

?>