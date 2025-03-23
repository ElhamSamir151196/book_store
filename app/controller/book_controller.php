<?php
require_once "../app/handlers/validations.php";
require_once "../app/models/book_model.php";
require_once "../app/models/user_model.php";
require_once "../app/models/category_model.php";
require_once "../app/models/book_category_model.php";
require_once '../app/models/favorite_model.php';


$errors=[];

function book_index_user()
{
    //$_SESSION['books'] =  list_books();

    //*********** language if arabic or english or all*************
    $lang = isset($_GET['lang']) ? "language = '".$_GET['lang'] ."'": null;// null means all data if not selected specific language
    //*********  pagination part ***************
        // Define how many results per page
        $limit = 5;

        // Get the current page number
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page = max($page, 1); // Ensure page is at least 1

        // Calculate offset
        $offset = ($page - 1) * $limit;

        // Get total number of books
        $total_result =get_books_pagination("COUNT(*) AS total", $lang );//"SELECT COUNT(*) AS total FROM books"
        $total_books = $total_result[0]['total'];
        $total_pages = ceil($total_books / $limit);

        // Fetch books for the current page
        $_SESSION['books']= get_books_pagination("*", $lang ,"LIMIT $limit OFFSET $offset");//"SELECT * FROM books LIMIT $limit OFFSET $offset";
        $_SESSION['total_books']=$total_books;
        $_SESSION['offset']=$offset;
        $_SESSION['total_pages']=$total_pages;
        


    require '../app/pages/User Interface/shop.php';
}

function book_show_user(){
    
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            redirect("home");
            die;
        }

        $id=$_GET['id'];
        $book=get_book($id);
        
        if(isset($book)){
           // echo("<br><br><br><br><br><br><br>");
            //var_dump(is_favorite($id,$_SESSION['auth']['id']));
            
            if(is_favorite($id,$_SESSION['auth']['id'])){
                $_SESSION["is_favorite"]= "true";
            }else{
               $_SESSION["is_favorite"]="false";
               
            }
            //echo(isset($_SESSION["is_favorite"]));
           // die;
            $_SESSION['book']=$book;
            $_SESSION['Book_categories'] = get_book_catergories($id);
            require '../app/pages/User Interface/single-product.php';
        }else{
            $_SESSION['error'] =  "can't get book data";
            redirect("home");
            die;
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        redirect("home");
        die;
    }

}


/** dashboard*/
function book_index()
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
        $total_result =get_books_pagination("COUNT(*) AS total");//"SELECT COUNT(*) AS total FROM books"
        $total_books = $total_result[0]['total'];
        $total_pages = ceil($total_books / $limit);

        // Fetch books for the current page
        $_SESSION['books']= get_books_pagination("*",null,"LIMIT $limit OFFSET $offset");//"SELECT * FROM books LIMIT $limit OFFSET $offset";
        $_SESSION['total_books']=$total_books;
        $_SESSION['offset']=$offset;
        $_SESSION['total_pages']=$total_pages;
        

        require '../app/pages/Dashboard/Book/book_index.php';
        //redirect("index-users");
        //die;
}
/*
function book_index()
{
    $_SESSION['books'] =  list_books();
    redirect("index-book");
    die;
}
*/
function book_create(){
    $_SESSION['categories'] =  list_catergory();
    redirect("create_book");
    die;
}

function book_insert(){
    if (checkRequestMethod("POST"))
    {
        
        foreach($_POST as $key => $value){
            if($key=="categories"){
                $$key=$value; // array value from check inputs
            }else{
                $$key=sanitizeInput($value);        
            }
        }
    
        // book => name , basic_price , sale_price , image ,language , page_number,description , qty, Author
    
        // validation name => required, min: 3,max:100 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 100)){
            $errors[]=  "name must be less than 30 chars";
        }
    
        // validation Author => required, min: 2,max:100 
        if(!requiredVal($Author)){
            $errors[]= "Author is required";
        }elseif(!minVal($Author, 2)){
            $errors[]= "Author must be greater than 2 chars";
        }elseif(!maxVal($Author, 100)){
            $errors[]=  "Author must be less than 30 chars";
        }

        // validation description => required, min: 3,max:500 
        if(!requiredVal($description)){
            $errors[]= "description is required";
        }elseif(!minVal($description, 3)){
            $errors[]= "description must be greater than 3 chars";
        }elseif(!maxVal($description, 500)){
            $errors[]=  "description must be less than 500 chars";
        }


        // validation qty => required, number , positive
        if(!requiredVal($qty)){
            $errors[]= "qty is required";
        }elseif($qty<=0){
            $errors[]= "qty must be number greater than zero";
        }elseif(!is_numeric($qty)){
            $errors[]= "qty must be number";
        }

        // validation page_number => required, number , positive
        if(!requiredVal($page_number)){
            $errors[]= "page number is required";
        }elseif($page_number<=0){
            $errors[]= "page number must be number greater than zero";
        }elseif(!is_numeric($page_number)){
            $errors[]= "page number must be number";
        }
    
        // validation price => required, number , positive
        if(!requiredVal($price)){
            $errors[]= "Price is required";
        }elseif($price<=0){
            $errors[]= "Price must be number greater than zero";
        }elseif(!is_numeric($price)){
            $errors[]= "Price must be number";
        }
    

        // in case sale exist on book
        if(isset($sale)){
            // validation sale_price => required, number , greater than price
            if(!requiredVal($sale_price)){
                $errors[]= "as you activate sale check box must set sale price number";
            }elseif(!is_numeric($sale_price)){
                $errors[]= "Sale Price must be number";
            }elseif($sale_price<=$price){
                $errors[]= "sale Price must be number greater than price";
            }
        }
    
    
        //validation image Exit if file uploaded
        if (isset($_FILES["image"])) {
    
            $image_file = $_FILES["image"];// Get reference to uploaded image
    
            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                $errors[]='Uploaded file has no contents.';
            }else{
                // Exit if is not a valid image file
                $image_type = exif_imagetype($image_file["tmp_name"]);
                if (!$image_type) {
                    $errors[]='Uploaded file is not an image.';
                }else{
                    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                    $image_extension = image_type_to_extension($image_type, true);
    
                    // Create a unique image name
                    $image_name = bin2hex(random_bytes(16)) . $image_extension;
    
                    $path = '../app/storage/'.$image_name;
                    // Move the temp image file to the images directory
                    // (Temp image location , New image location
                    $result= move_uploaded_file( $image_file["tmp_name"],$path);
    
                    if (!$result) {
                        $errors[]= 'failed to upload';
                    }
                } 
            }
    
            
    
    
        }
    
        //`name`, `Author`, `qty`, `price`, `sale_price`, `user_id`, `description`, `page_number`, `code`, `language`, `image`
        if(empty($errors)){
            
            $data = [
                "name" => $name,
                "Author" => $Author,
                "qty" => $qty,
                "price" =>$price?? null,
                "sale_price" => $sale_price,
                "user_id" =>$_SESSION['auth']['id'],
                "description" => $description,
                "page_number" =>$page_number,
                "language" => $language??"english",
                "image" =>$image_name ,
                "code" =>strtoupper(bin2hex(random_bytes(5)))
                ];

                if(!add_books($data)){
                    $_SESSION["error"]= "insert new book error";
                    $_SESSION['categories'] =  list_catergory();
                    redirect("create_book");
                    die;
                }
                $id=get_last_id_book();
                
                foreach($categories as $category){
                    $category_data=[
                        "book_id"=>$id,
                        "catergory_id"=>$category
                    ];
                    add_books_categories($category_data);
                }
            $_SESSION['Success']="Added new book Successfully";
            $_SESSION['books'] =  list_books();
            book_index();
            //redirect("index-book");
            //die;
            
        }else{
            $_SESSION['errors']=$errors;
            $_SESSION['categories'] =  list_catergory();
            redirect("create_book");
            die;
        }
    }else{
        $_SESSION["error"]= "not supported method";
        $_SESSION['categories'] =  list_catergory();
        redirect("create_book");
        die;
    }
}

function book_delete(){
   
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            book_index();
        }

        $id=$_GET['id'];
        delete_book_catergory_by_book_id($id);
        $delete_statues=delete_book($id);
        if($delete_statues){
            $_SESSION['Success']= "data deleted successfully";
            
        }else{
            $_SESSION['error'] =  "can't delete data";
            
        }
        book_index();
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        book_index();
    }
}

function book_show(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            book_index();
        }

        $id=$_GET['id'];
        $book=get_book($id);

        if(isset($book)){
            $_SESSION['Book_user']= get_User( $book['user_id'] );
            $_SESSION['Book_categories'] = get_book_catergories($id);
            $_SESSION['Book']=$book;
            require '../app/pages/Dashboard/Book/book_show.php';
        }else{
            $_SESSION['error'] =  "can't get Book data $id";
            book_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        book_index();
    }
}

function book_edit(){
    if($_SERVER['REQUEST_METHOD']=="GET"){
    
        if(!isset($_GET['id'])){
            $_SESSION['error'] =  "id required";
            book_index();
        }

        $id=$_GET['id'];
        $book=get_book($id);

        if(isset($book)){
            $_SESSION['Book_user']= get_User( $book['user_id'] );
            $categories_id= (get_categories_by_book_id($id) == false) ? [] : array_column(get_categories_by_book_id($id), "catergory_id");
            $_SESSION['Book_categories_id'] = $categories_id;//array_column($categories_id, "id");
            $_SESSION['categories'] =  list_catergory();
            $_SESSION['Book']=$book;
            require '../app/pages/Dashboard/Book/book_edit.php';
        }else{
            $_SESSION['error'] =  "can't get Book data $id";
            book_index();
        }
    
        
    }else{
        $_SESSION['error'] =  "not supported Method";
        book_index();
    }
}



function book_update(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(!isset($_POST['id'])){
            $_SESSION['error'] =  "id required";
            book_index();
        }

        foreach($_POST as $key => $value){
            if($key=="categories"){
                $$key=$value;//$categories[]=$value; // array value from check inputs
            }else{
                $$key=sanitizeInput($value);        
            }
        }

        // book => name , basic_price , sale_price , image ,language , page_number,description , qty, Author

        // validation name => required, min: 3,max:100 
        if(!requiredVal($name)){
            $errors[]= "name is required";
        }elseif(!minVal($name, 3)){
            $errors[]= "name must be greater than 3 chars";
        }elseif(!maxVal($name, 100)){
            $errors[]=  "name must be less than 30 chars";
        }

        // validation Author => required, min: 2,max:100 
        if(!requiredVal($Author)){
            $errors[]= "Author is required";
        }elseif(!minVal($Author, 2)){
            $errors[]= "Author must be greater than 2 chars";
        }elseif(!maxVal($Author, 100)){
            $errors[]=  "Author must be less than 30 chars";
        }

        // validation description => required, min: 3,max:500 
        if(!requiredVal($description)){
            $errors[]= "description is required";
        }elseif(!minVal($description, 3)){
            $errors[]= "description must be greater than 3 chars";
        }elseif(!maxVal($description, 500)){
            $errors[]=  "description must be less than 500 chars";
        }


        // validation qty => required, number , positive
        if(!requiredVal($qty)){
            $errors[]= "qty is required";
        }elseif($qty<=0){
            $errors[]= "qty must be number greater than zero";
        }elseif(!is_numeric($qty)){
            $errors[]= "qty must be number";
        }

        // validation page_number => required, number , positive
        if(!requiredVal($page_number)){
            $errors[]= "page number is required";
        }elseif($page_number<=0){
            $errors[]= "page number must be number greater than zero";
        }elseif(!is_numeric($page_number)){
            $errors[]= "page number must be number";
        }

        // validation price => required, number , positive
        if(!requiredVal($price)){
            $errors[]= "Price is required";
        }elseif($price<=0){
            $errors[]= "Price must be number greater than zero";
        }elseif(!is_numeric($price)){
            $errors[]= "Price must be number";
        }


        // in case sale exist on book
        if(isset($sale)){
            // validation sale_price => required, number , greater than price
            if(!requiredVal($sale_price)){
                $errors[]= "as you activate sale check box must set sale price number";
            }elseif(!is_numeric($sale_price)){
                $errors[]= "Sale Price must be number";
            }elseif($sale_price<=$price){
                $errors[]= "sale Price must be number greater than price";
            }
        }else{
            $sale_price=null;
        }


        //validation image Exit if file uploaded
        if (isset($_FILES["image"])) {

            $image_file = $_FILES["image"];// Get reference to uploaded image

            // Exit if image file is zero bytes
            if (filesize($image_file["tmp_name"]) <= 0) {
                //$errors[]='Uploaded file has no contents.'; //will take old image
                $image_name=null;
            }else{
                // Exit if is not a valid image file
                $image_type = exif_imagetype($image_file["tmp_name"]);
                if (!$image_type) {
                    $errors[]='Uploaded file is not an image.';
                }else{
                    // Get file extension based on file type, to prepend a dot we pass true as the second parameter
                    $image_extension = image_type_to_extension($image_type, true);

                    // Create a unique image name
                    $image_name = bin2hex(random_bytes(16)) . $image_extension;

                    $path = '../app/storage/'.$image_name;
                    // Move the temp image file to the images directory
                    // (Temp image location , New image location
                    $result= move_uploaded_file( $image_file["tmp_name"],$path);
                    if (!$result) {
                        $errors[]= 'failed to upload';
                    }
                } 
            }

            


        }

        // name , basic_price , sale_price , image , sale
        if(empty($errors)){
        $book=get_book($id);

        $data = [
            "id"=>$id,
            "name" => $name,
            "Author" => $Author,
            "qty" => $qty,
            "price" =>$price?? null,
            "sale_price" => $sale_price,
            "user_id" =>$_SESSION['auth']['id'],
            "description" => $description,
            "page_number" =>$page_number,
            "language" => $language??"english",
            "image" =>$image_name??$book["image"] ,
            "code" =>$book["code"],
            "created_at"=> $book["created_at"]
        ];

        
        
        delete_book_catergory_by_book_id($id);
        if(isset($categories)){
            //var_dump($categories[0]);
            foreach($categories as $category){
                $category_data=[
                    "book_id"=>$id,
                    "catergory_id"=>$category
                ];
                add_books_categories($category_data);
            }
        }
        if($data != $book){
            $update_staues=update_book($id,$data);
            //echo "<br><br><br><br><br><br><br><br>".$update_staues;
            //die;
           if(!$update_staues){
               $_SESSION['error']="error in update book";
               redirect("book-edit?id=$id");
               die;
           }
        }
        $_SESSION['Success']="book updated successfully";
        book_index();
         
    }else{
        $_SESSION['errors']=$errors;
        redirect("book-edit?id=$id");
        die;
    }
}else{
    $_SESSION['error'] =  "not supported Method";
    book_index();
}
}


?>
