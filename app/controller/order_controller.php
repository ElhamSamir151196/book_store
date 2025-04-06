<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/order_model.php";
require_once '../app/models/cart_model.php';
require_once '../app/models/user_model.php';
require_once '../app/models/order_product_model.php';
require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$errors=[];


/** user interface*/
function order_index_interface()
{
    $_SESSION['orders_user_auth']= get_order_by_user_id($_SESSION['auth']['id']);//get all orders of this user

    require '../app/pages/User Interface/orders.php';
}

function user_index()
{
    
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

function track_order(){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }
    
        // validation order_id => required 
        if(!requiredVal($order_id)){
            $_SESSION["error"]= "order id is required";
            redirect("track-order");
            die;
        }
        
        $order=get_order($order_id);
       
        if(!$order){
            $_SESSION["error"]= "order id is wrong";
            redirect("track-order");
            die;
        }


        // email => required, check if correct or not
        if(!requiredVal($email)){ 
            $errors[]= "email is required";
        }elseif($order["email"] != $email){
            $errors[]= "not correct email for this order id";
        }
       
        if(empty($errors)){

             
            // send email
            $subject = "Order Tracking -Coding Arabi";
            $mail = new PHPMailer(true);

            try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //$mail->Port = 465; // Use for SSL
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //app name: email sender
            //app password:mrmr ewbm fvja eazy

            $mail->Username = "elham.samir.cairo.1996@gmail.com";
            $mail->Password = "mrmr ewbm fvja eazy";

            $mail->setFrom("elham.samir.cairo.1996@gmail.com", "Coding Arabi");
            $mail->addAddress($email, "");

            $mail->Subject = $subject;
            //$mail->Body = $message;
            // Enable HTML email
            $mail->isHTML(true);
           
            $mail->Body = 'Click <a href="http://localhost/EraaSoft%20PHP/Projects/Book-Store/New%20folder/book%20-2/public/order-recieved?id='.$order_id.'">here</a> to track your order.';//chanage link to your path
            

            $mail->send();
            $_SESSION['Success']="Mail Send Sucessfully";

            } catch (Exception $e) {
                $_SESSION["error"]= "Email could not be sent. Error: {$mail->ErrorInfo}";
            }            
            redirect("track-order");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("track-order");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("track-order");
        die;
    }
}

function order_store(){
    if (checkRequestMethod("POST"))
    {
        if(empty($_SESSION["cart"])){
            $_SESSION['error']="لا يوجد منتجات لانشاء طلب";
            redirect("orders");
            die;
        }

        //echo "<br><br><br><br><br><br><br><br>";
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);        
        }
        // orderd => `statues`, `user_id`, `total_price`, `address`, `notes`, `phone`, `email`, `first_name`, `last_name`, `city`
    
        // validation first_name => required, min: 3,max:50 
        if(!requiredVal($first_name)){
            $errors[]= "first_name is required";
        }elseif(!minVal($first_name, 3)){
            $errors[]= "first_name must be greater than 3 chars";
        }elseif(!maxVal($first_name, 50)){
            $errors[]=  "first_name must be less than 50 chars";
        }
    
        // validation last_name => required, min: 3,max:50 
        if(!requiredVal($last_name)){
            $errors[]= "last_name is required";
        }elseif(!minVal($last_name, 3)){
            $errors[]= "last_name must be greater than 3 chars";
        }elseif(!maxVal($last_name, 50)){
            $errors[]=  "last_name must be less than 50 chars";
        }

        // email => required, email , not exist before 
        if(!requiredVal($email)){ 
           // $errors[]= "email is required";//optional
        }elseif(!emailVal($email)){
            $errors[]= "please type a valid email";
        }


        // validation phone => required, min: 5,max:11 , numeric 
        if(!requiredVal($phone)){
            $errors[]= "phone is required";
        }elseif(!minVal($phone, 5)){
            $errors[]= "phone must be greater than 5 numbers";
        }elseif(!maxVal($phone, 12)){
            $errors[]= "phone must be less than 12 numbers";
        }elseif(!is_numeric($phone)){
            $errors[]=  "phone must be numbers";
        }

        // validation total_price => required, numeric 
        if(!requiredVal($total_price)){
            $errors[]= "total_price is required";
        }elseif($total_price<=0){
            $errors[]= "total_price must be number greater than zero";
        }elseif(!is_numeric($total_price)){
            $errors[]=  "total_price must be numbers";
        }



        // validation address => required, min: 2,max:200 
        if(!requiredVal($address)){
            $errors[]= "address is required";
        }elseif(!minVal($address, 2)){
            $errors[]= "address must be greater than 2 chars";
        }elseif(!maxVal($address, 200)){
            $errors[]=  "address must be less than 200 chars";
        }

        // orderd => `statues`, `user_id`, `total_price`, `address`, `notes`, `phone`, `email`, `first_name`, `last_name`, `city`

    
            
        if(empty($errors)){
            
            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email?? null,
                "phone" => $phone,
                "notes" =>$notes??null,
                "address" => $address,
                "user_id" =>$_SESSION['auth']['id'],
                "total_price" => $total_price,
                "city" => $city,
               "statues"=> "pending"
                ];

                

                if(!add_order($data)){
                    $_SESSION["error"]= "insert new order error";
                    redirect("orders");
                    die;
                }
                $id=get_last_id_order();
                
                foreach($_SESSION['cart'] as $cart_product){
                    $cart_product_data=[
                        "order_id"=>$id,
                        "product_name"=>$cart_product['name'],
                        "product_qty" =>$cart_product['book_qty'],
                        "image" => $cart_product['image'],
                        "price" => $cart_product["price"],
                        "sale_price" => $cart_product["sale_price"]
                    ];
                    update_cart_product($cart_product['id'],["statues"=>"ordered"]);
                    add_order_product($cart_product_data);
                }
                $_SESSION['cart']=get_cart_books_where_not_ordered($_SESSION['auth']['id']);

                // send email
            $subject = "Order added successfully -Coding Arabi";
            $mail = new PHPMailer(true);

            try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.gmail.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            //$mail->Port = 465; // Use for SSL
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            //app name: email sender
            //app password:mrmr ewbm fvja eazy

            $mail->Username = "elham.samir.cairo.1996@gmail.com";
            $mail->Password = "mrmr ewbm fvja eazy";

            $mail->setFrom("elham.samir.cairo.1996@gmail.com", "Coding Arabi");
            $mail->addAddress($email, "");

            $mail->Subject = $subject;
            //$mail->Body = $message;
            // Enable HTML email
            $mail->isHTML(true);
           
            $mail->Body = 'Click <a href="http://localhost/EraaSoft%20PHP/Projects/Book-Store/New%20folder/book%20-2/public/order-recieved?id='.$id.'">here</a> to track your order your order number '.$id.'.';//chanage link to your path
            

            $mail->send();
            //$_SESSION['Success']="Mail Send Sucessfully";

            } catch (Exception $e) {
                $_SESSION["error"]= "Email could not be sent. Error: {$mail->ErrorInfo}";
            }
            $_SESSION['Success']="Added new order Successfully";
            unset($_SESSION["cart"]);
            redirect("orders");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("orders");
            die;
        }
    }else{
        redirect("orders");
        die;
    }
}

function order_show(){
    if (checkRequestMethod("GET"))
    {
        
        // validation order_id => required 
        if(!requiredVal($_GET['id'])){
            $_SESSION["error"]= "order id is required";
            redirect("orders");
            die;
        }
        
        $order_id=$_GET['id'];
        $order=get_order($order_id);
        $order_products=get_order_product_by_order_id($order_id);
        if(!$order){
            $_SESSION["error"]= "order id is wrong";
            redirect("orders");
            die;
        }

        $_SESSION['order_details']=$order;
        $_SESSION['order_products']=$order_products;
       require '../app/pages/User Interface/order-details.php';
       
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("orders");
        die;
    }
}

function order_recieved(){
    if (checkRequestMethod("GET"))
    {
        
        // validation order_id => required 
        if(!requiredVal($_GET['id'])){
            $_SESSION["error"]= "order id is required";
            redirect("home");
            die;
        }
        
        $order_id=$_GET['id'];
        $order=get_order($order_id);
        $order_products=get_order_product_by_order_id($order_id);
        if(!$order){
            $_SESSION["error"]= "order id is wrong";
            redirect("home");
            die;
        }

        $_SESSION['order_details']=$order;
        $_SESSION['order_products']=$order_products;
        require '../app/pages/User Interface/order-recieved.php';

    }else{
        $_SESSION["error"]= "not supported method";
        redirect("home");
        die;
    }
}

/****** Dashboard */

function orders_index()
{
    
        //*********  pagination part ***************
        // Define how many results per page
        $limit = 5;

        // Get the current page number
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Ensure page is at least 1

        // Calculate offset
        $offset = ($page - 1) * $limit;

        // Get total number of orders
        $total_result =get_orders_pagination("COUNT(*) AS total");//"SELECT COUNT(*) AS total FROM orders"
        $total_orders = $total_result[0]['total'];
        $total_pages = ceil($total_orders / $limit);

        // Fetch orders for the current page
        $_SESSION['orders']= get_orders_pagination("*",null,"LIMIT $limit OFFSET $offset");//"SELECT * FROM orders LIMIT $limit OFFSET $offset";
        $_SESSION['total_orders']=$total_orders;
        $_SESSION['offset']=$offset;
        $_SESSION['total_pages']=$total_pages;
        

        require '../app/pages/Dashboard/Order/order_index.php';
        //redirect("index-users");
        //die;
}


function order_show_admin(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
           orders_index();
        }

        $id=$_GET['id'];
        $order=get_order($id);
        $order_products=get_order_product_by_order_id($id);
        
        if(isset($order)){
            $_SESSION['order_user']= get_User( $order['user_id'] );
            $_SESSION['order']= $order;
            $_SESSION['order_products']= $order_products;
            require '../app/pages/Dashboard/Order/order_show.php';
        }else{
            $_SESSION['error'] =  "can't get order data";
            orders_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        orders_index();
    }

}

function order_edit(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
           orders_index();
        }

        $id=$_GET['id'];
        $order=get_order($id);
        $order_products=get_order_product_by_order_id($id);
        
        if(isset($order)){
            $_SESSION['order_user']= get_User( $order['user_id'] );
            $_SESSION['order']= $order;
            $_SESSION['order_products']= $order_products;
            require '../app/pages/Dashboard/Order/order_edit.php';
        }else{
            $_SESSION['error'] =  "can't get order data";
            orders_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        orders_index();
    }
}



function order_Update(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(!isset($_POST['id'])){
            $_SESSION['error'] =  "id required";
            orders_index();
        }

        $id=$_POST["id"];
        $statues=sanitizeInput($_POST['statues']);        
        $order=get_order($id);
        
        if($statues != $order['statues']){
            $data = ["statues"=>$statues];
            $update_staues=update_order($id,$data);
            //echo "<br><br><br><br><br><br><br><br>".$update_staues;
            //die;
           if(!$update_staues){
               $_SESSION['error']="error in update order";
               redirect("order-edit?id=$id");
               die;
           }
        }
        $_SESSION['Success']="order updated successfully";
        orders_index();
         
   
    }else{
        $_SESSION['error'] =  "not supported Method";
        orders_index();
    }
}

?>


