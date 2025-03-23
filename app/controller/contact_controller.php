<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/contact_model.php";
$errors=[];

/******* user interface */
function contact_insert(){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// contact => `name`, `phone_number`, `email`, `reason`, `meessage`
    
        // validation name => required, min: 3,max:100 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 100)){
            $errors[]=  "name must be less than 30 chars";
        }

        // validation reason => required
        if(!requiredVal($reason)){
            $errors[]= "reason is required";
        }

        // validation meessage => required, min: 3,max:700 
        if(!requiredVal($meessage)){
            $errors[]= "meessage is required";
        }elseif(!minVal($meessage, 3)){
            $errors[]= "meessage must be greater than 3 chars";
        }elseif(!maxVal($meessage, 700)){
            $errors[]=  "meessage must be less than 700 chars";
        }
    
        // email => required, email format
        if(!requiredVal($email)){ 
            $errors[]= "email is required";
        }elseif(!emailVal($email)){
            $errors[]= "please type a valid email";
        }

         // validation phone_number => required, min: 5,max:11 , numeric 
         if(!requiredVal($phone_number)){
            $errors[]= "phone_number is required";
        }elseif(!minVal($phone_number, 5)){
            $errors[]= "phone_number must be greater than 5 chars";
        }elseif(!maxVal($phone_number, 12)){
            $errors[]= "phone_number must be less than 12 chars";
        }elseif(!is_numeric($phone_number)){
            $errors[]=  "phone_number must be numbers";
        }
       
        if(empty($errors)){//contact => `name`, `phone_number`, `email`, `reason`, `meessage`
            
            $data = [
                "name" => $name,
                "phone_number" => $phone_number,
                "email" => $email,
                "reason" => $reason,
                "meessage" =>$meessage
            ];

                if(!add_contacts($data)){
                    $_SESSION["error"]= "insert new contact error";
                    redirect("contact");
                    die;
                }
            $_SESSION['Success']="Message send Successfully";
            redirect("contact");
            die;
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("contact");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("contact");
        die;
    }
}

/** dashboard */
function contact_index(){
    
    //*********  pagination part ***************
       // Define how many results per page
       $limit = 5;

       // Get the current page number
       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $page = max($page, 1); // Ensure page is at least 1

       // Calculate offset
       $offset = ($page - 1) * $limit;

       // Get total number of contacts
       $total_result =get_contacts_pagination("COUNT(*) AS total");//"SELECT COUNT(*) AS total FROM contacts"
       $total_contacts = $total_result[0]['total'];
       $total_pages = ceil($total_contacts / $limit);

       // Fetch contacts for the current page
       $_SESSION['contacts']= get_contacts_pagination("*",null,"LIMIT $limit OFFSET $offset");//"SELECT * FROM contacts LIMIT $limit OFFSET $offset";
       $_SESSION['total_contacts']=$total_contacts;
       $_SESSION['offset']=$offset;
       $_SESSION['total_pages']=$total_pages;
       

       require '../app/pages/Dashboard/Contact/contactIndex.php';
   /*$_SESSION['categories'] =  list_catergory();
   redirect("index-category");
   die;*/
       
}

function contact_show(){
   
   if($_SERVER['REQUEST_METHOD']=="GET"){
   
       if(!isset($_GET['id'])){
           $_SESSION['error'] =  "id required";
           contact_index();
       }

       $id=$_GET['id'];
       $contact=get_contact($id);
       if(isset($contact)){
           $_SESSION['contact']=$contact;
           require '../app/pages/Dashboard/Contact/contactShow.php';
       }else{
           $_SESSION['error'] =  "can't get contact data";
           contact_index();
       }
   
       
   }else{
       $_SESSION['error'] =  "not supported Method";
       contact_index();
   }

}


?>