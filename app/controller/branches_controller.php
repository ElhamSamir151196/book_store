<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/branch_model.php";
require_once "../app/models/user_model.php";
require_once "../app/models/branches_phone_model.php";
$errors=[];

function branch_index_user(){
    $_SESSION['branches'] =  list_branches();
    require '../app/pages/User Interface/branches.php';

}
function branch_index()
{
    $_SESSION['branches'] =  list_branches();
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
            $_SESSION['success']="Added new Category Successfully";
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

        
        if(isset($branch)){
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
            $_SESSION['branch']= $branch;
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

        if(isset($branch)){
            $_SESSION['branch_user']= get_User( $branch['user_id'] );
            $_SESSION['branch']= $branch;
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
                $_SESSION['success']="update new branch Successfully";
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
            $errors[]= "phone_number must be greater than 5 chars";
        }elseif(!maxVal($phone_number, 12)){
            $errors[]= "phone_number must be less than 12 chars";
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
            $_SESSION['success']="Added new Branch phone Successfully";
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
?>
