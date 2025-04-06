<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/branch_model.php";
require_once "../app/models/user_model.php";
require_once "../app/models/branches_phone_model.php";
$errors=[];

function branch_index_user(){
    $_SESSION['branches'] =  list_branches();
    $_SESSION['branches_phones'] =  list_branches_phone();
    require '../app/pages/User Interface/branches.php';

}

/*** dashboard */
function branch_index(){
    
    //*********  pagination part ***************
       // Define how many results per page
       $limit = 5;

       // Get the current page number
       $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
       $page = max($page, 1); // Ensure page is at least 1

       // Calculate offset
       $offset = ($page - 1) * $limit;

       // Get total number of contacts
       $total_result =get_branches_pagination("COUNT(*) AS total");//"SELECT COUNT(*) AS total FROM branches"
       $total_branches = $total_result[0]['total'];
       $total_pages = ceil($total_branches / $limit);

       // Fetch branches for the current page
       $_SESSION['branches']= get_branches_pagination("*",null,"LIMIT $limit OFFSET $offset");//"SELECT * FROM branches LIMIT $limit OFFSET $offset";
       $_SESSION['total_branches']=$total_branches;
       $_SESSION['offset']=$offset;
       $_SESSION['total_pages']=$total_pages;
       

       require '../app/pages/Dashboard/Branch/branch_index.php';
   
       
}

function branch_insert (){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// branch => `street`, `city`, `address`
    
        // validation street => required, min: 3,max:100 
        if(!requiredVal($street)){
            $errors[]= "street is required";
        }elseif(!minVal($street, 3)){
            $errors[]= "street must be greater than 3 chars";
        }elseif(!maxVal($street, 100)){
            $errors[]=  "street must be less than 30 chars";
        }

        // validation city => required, min: 3,max:100 
        if(!requiredVal($city)){
            $errors[]= "city is required";
        }elseif(!minVal($city, 3)){
            $errors[]= "city must be greater than 3 chars";
        }elseif(!maxVal($city, 100)){
            $errors[]=  "city must be less than 30 chars";
        }
    
        
        // validation address => required, min: 3,max:500 
        if(!requiredVal($address)){
            $errors[]= "address is required";
        }elseif(!minVal($address, 3)){
            $errors[]= "address must be greater than 3 chars";
        }elseif(!maxVal($address, 500)){
            $errors[]=  "address must be less than 500 chars";
        }


       
        if(empty($errors)){
            
            $data = [
                "city" => $city,
                "street" => $street,
                "address" => $address,
                "user_id" =>$_SESSION['auth']['id']
            ];

                if(!add_branch($data)){
                    $_SESSION["error"]= "insert new Branch error";
                    redirect("create-branch");
                    die;
                }
            $_SESSION['Success']="Added new Category Successfully";
            branch_index();
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("create-branch");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("create-branch");
        die;
    }
}

function branch_show(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
           branch_index();
        }

        $id=$_GET['id'];
        $branch=get_branch($id);
        $branch_phones=get_branches_phone_by_branches_id($id);
        
        if(isset($branch)){
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
            $_SESSION['branch']= $branch;
            $_SESSION['branch_phones']= $branch_phones;
            require '../app/pages/Dashboard/Branch/branch_show.php';
        }else{
            $_SESSION['error'] =  "can't get branch data";
            branch_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        branch_index();
    }

}

function branch_edit(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            branch_index();
        }

        $id=$_GET['id'];
        $branch=get_branch($id);
        $branch_phones=get_branches_phone_by_branches_id($id);

        if(isset($branch)){
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
            $_SESSION['branch']= $branch;
            $_SESSION['branch_phones']= $branch_phones;
            require '../app/pages/Dashboard/Branch/branch_edit.php';
        }else{
            $_SESSION['error'] =  "can't get category data";
            branch_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        branch_index();
    }

}

function branch_update(){
    if (checkRequestMethod("POST"))
    {
        if(isset($_POST['id'])){
            echo $_POST['id'];
        }
    
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }// branch => `street`, `city`, `address`
    
        // validation street => required, min: 3,max:100 
        if(!requiredVal($street)){
            $errors[]= "street is required";
        }elseif(!minVal($street, 3)){
            $errors[]= "street must be greater than 3 chars";
        }elseif(!maxVal($street, 100)){
            $errors[]=  "street must be less than 30 chars";
        }

        // validation city => required, min: 3,max:100 
        if(!requiredVal($city)){
            $errors[]= "city is required";
        }elseif(!minVal($city, 3)){
            $errors[]= "city must be greater than 3 chars";
        }elseif(!maxVal($city, 100)){
            $errors[]=  "city must be less than 30 chars";
        }
    
        
        // validation address => required, min: 3,max:500 
        if(!requiredVal($address)){
            $errors[]= "address is required";
        }elseif(!minVal($address, 3)){
            $errors[]= "address must be greater than 3 chars";
        }elseif(!maxVal($address, 500)){
            $errors[]=  "address must be less than 500 chars";
        }

        
        $branch=get_branch($id);

        if($street==$branch['street'] &&$city==$branch['city']&&$address==$branch['address']  ){
            $errors[]= 'no chnage in data';
        }
    
        // branch => `street`, `city`, `address`
        if(empty($errors)){
            
            $data = [
                "street" => $street,
                "city" => $city,
                "address" => $address,
                "user_id" =>$_SESSION['auth']['id']
            ];

            if(!update_branch($id,$data)){
                $_SESSION["error"]= "update branch error";
                $_SESSION['branch_user']= get_User( $branch['user_id'] );
                $_SESSION['branch']=$branch;
                redirect("branch_edit");
                die;
            }
                $_SESSION['Success']="update new branch Successfully";
                branch_index();
        
            
        }else{
            $_SESSION['errors']=$errors;
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
                $_SESSION['branch']=$branch;
                redirect("branch_edit");
        }

    }else{
        $_SESSION["error"]= "not supported method";
        branch_index();
    }
    
}

function branch_delete(){
   
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            branch_index();
        }

        $id=$_GET['id'];
        $delete_statues=delete_branch($id);

        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
       branch_index();
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        branch_index();
    }
}

function branch_add_phone(){
    if (checkRequestMethod("POST"))
    {
        foreach($_POST as $key => $value){
            $$key=sanitizeInput($value);
        
        }
        
        //validation branch_id => required
        if(!requiredVal($branch_id)){
            $errors[]= "phone_number is required";
            branch_index();
        }
    
        // validation phone_number => required, min: 5,max:11 , numeric 
        if(!requiredVal($phone_number)){
            $errors[]= "phone_number is required";
        }elseif(!minVal($phone_number, 5)){
            $errors[]= "phone_number must be greater than 5 numbers";
        }elseif(!maxVal($phone_number, 12)){
            $errors[]= "phone_number must be less than 12 numbers";
        }elseif(!is_numeric($phone_number)){
            $errors[]=  "phone_number must be numbers";
        }



        if(empty($errors)){
            
            $data = [
                "phone_number" => $phone_number,
                "branch_id" => $branch_id,
                "user_id" =>$_SESSION['auth']['id']
            ];

                if(!add_branches_phone($data)){
                    $_SESSION["error"]= "insert new Branch phone error";
                    redirect("branch-add-phone");
                    die;
                }
            $_SESSION['Success']="Added new Branch phone Successfully";
            branch_index();
            
        }else{
            $_SESSION['errors']=$errors;
            redirect("branch-add-phone");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        redirect("branch-add-phone");
        die;
    }
}

function branch_create_phone(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
           branch_index();
        }

        $id=$_GET['id'];
        $branch=get_branch($id);

        
        if(isset($branch)){
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
            $_SESSION['branch']= $branch;
            require '../app/pages/Dashboard/Branch/branch_add_phone.php';
        }else{
            $_SESSION['error'] =  "can't get branch data";
            branch_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        branch_index();
    }

}

function branch_delete_phone(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            branch_index();
        }

        $id=$_GET['id'];
        $branch_id=get_branch_phone($id)['branch_id'];
        $delete_statues=delete_branches_phone($id);

        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
       //branch_index();
        redirect("branch-edit?id=$branch_id");
        die;
    }else{
        $_SESSION['error'] =  "not supported Method";
        branch_index();
    }
}

?>
