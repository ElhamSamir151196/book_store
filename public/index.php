
<?php
    ob_start();
    session_start();
    if(isset($_COOKIE["auth_id"])&&!isset($_SESSION['auth'])) {
        require_once '../app/controller/Auth/login_controller.php';
        user_remember_me();
    }
    $url = $_GET["url"] ?? '/';
    //include '../app/layouts/links.php';
    //include '../app/layouts/navbar.php';
    //include '../app/layouts/section.php';
    // to assign navbar according to type admin or user
    
   if(isset($_SESSION['auth'])){
        if($_SESSION['auth']['type']=="admin"){
            include '../app/layouts/dashboardSidebar.php';
        }else{
            include '../app/layouts/links.php';
            include '../app/layouts/navbar.php';
            include '../app/layouts/section.php';
        }
    }else{
        include '../app/layouts/links.php';
        include '../app/layouts/navbar.php';
        include '../app/layouts/section.php';
    }

    switch ($url) {
        /**** user interface */
        case '/':
            require_once '../app/controller/home_controller.php';
            home_index();
            break;
        case 'home':
            require_once '../app/controller/home_controller.php';
            home_index();
            break;
        case 'about':
            require '../app/pages/User Interface/about.php';
            break;
        case 'privacy-policy':
            require '../app/pages/User Interface/privacy-policy.php';
            break;
        case 'refund-policy':
            require '../app/pages/User Interface/privacy-policy.php';
            break;
        case 'track-order':
            require '../app/pages/User Interface/track-order.php';
            break;
        case 'order-recieved':
            //require '../app/pages/User Interface/order-recieved.php';
            require_once '../app/controller/order_controller.php';
            order_recieved();
            break;
        //case 'order-recieved':
          //  require '../app/pages/User Interface/order-recieved.php';
          //  break;
        case 'order-details':
            require '../app/pages/User Interface/order-details.php';
            break;
        case 'track_order':
            require_once '../app/controller/order_controller.php';
            track_order();
            break;
        case 'contact':
            require '../app/pages/User Interface/contact.php';
            break;
        case 'insert-contact':
            require_once '../app/controller/contact_controller.php';
            contact_insert();
            break;
        case 'branches':
            require_once '../app/controller/branches_controller.php';
            branch_index_user();
            break;
        case 'account':
            require '../app/pages/User Interface/account.php';
            break;
        case 'single-product':
            require_once '../app/controller/book_controller.php';
            book_show_user();
            break;
        case 'add-to-cart':
            require_once '../app/controller/book_controller.php';
            add_to_cart();
            break;
        case 'delete-product-cart':
            require_once '../app/controller/book_controller.php';
            delete_product_cart();
            break;
        case 'check-out':
            require '../app/pages/User Interface/checkout.php';
            break;
        case 'add-to-favorite':
            require_once '../app/controller/favourites_controller.php';
            add_to_favorite();
            break;
        case 'favourites':
            require_once '../app/controller/favourites_controller.php';
            favourites_index();
            break;
        case 'remove-fav-product':
            require_once '../app/controller/favourites_controller.php';
            delete_favourit_book();
            break;
        case 'profile':
            require_once '../app/controller/user_controller.php';
            user_show();
            break;
        case 'shop':
            require_once '../app/controller/book_controller.php';
            book_index_user();
            break;
        case 'shop_home':
            require '../app/pages/User Interface/shop.php';
            break;
        case 'orders':
            require_once '../app/controller/order_controller.php';
            order_index_interface();
            break;
        case 'store-order':
            require_once '../app/controller/order_controller.php';
            order_store();
            break;
        case 'order_details':
            require_once '../app/controller/order_controller.php';
            order_show();
            break;
        case 'account_details':
            require '../app/pages/User Interface/account_details.php';
            break;
        case 'logout':
            require '../app/pages/User Interface/logout.php';
            break;
        case 'register':
            require_once '../app/controller/Auth/register_controller.php';
            store_user();
            break;
        case 'login':
            require_once '../app/controller/Auth/login_controller.php';
            check_login_user();
            break;
        case 'forget_password':
            require_once '../app/controller/Auth/forget_password_controller.php';
            forget_password();
            break;
        case 'reset-password':
            require '../app/pages/User Interface/user_change_password.php';
            break;
        case 'update-user-password':
            require_once '../app/controller/Auth/reset_password_controller.php';
            update_user_password();
            break;
        case 'update-user-data':
            require_once '../app/controller/user_controller.php';
            update_user_data();
            break;
        case 'change-user-password':
            require_once '../app/controller/Auth/reset_password_controller.php';
            change_user_password();
            break;
        

            /*** admin dashboard */
            /** dashboard home  */
        case 'dashboard-home':
            require_once '../app/controller/dashborad_controller.php';
            dasboard_index();
            break;
        case 'dashboard_home':
            require '../app/pages/Dashboard/dashboradHome.php';
            break;
            /*** dashboard user */
        case 'dashboard-user-index':
            require_once '../app/controller/user_controller.php';
            user_index();
            break;
        case 'index-users':
            require '../app/pages/Dashboard/User/userIndex.php';
            break;
        case 'user_show':
            require_once '../app/controller/user_controller.php';
            show();
            break;
        case 'user_edit':
            require_once '../app/controller/user_controller.php';
            edit();
            break;
        case 'user_update':
            require_once '../app/controller/user_controller.php';
            update();
            break;
        case 'user_delete':
            require_once '../app/controller/user_controller.php';
            delete();
            break;
            /**** bashboard Category */
        case 'dashboard-catergory-index':
            require_once '../app/controller/category_controller.php';
            category_index();
            break;
        case 'index-category':
            require '../app/pages/Dashboard/Category/category_index.php';
            break;
        case 'create-category':
            require '../app/pages/Dashboard/Category/category_create.php';
            break;
        case 'category-show':
            require_once '../app/controller/category_controller.php';
            category_show();
            break;
        case 'category_show':
            require '../app/pages/Dashboard/Category/category_show.php';
            break;
        case 'insert-category':
            require_once '../app/controller/category_controller.php';
            category_insert();
            break;
        case 'category-edit':
            require_once '../app/controller/category_controller.php';
            category_edit();
            break;
        case 'category_edit':
            require '../app/pages/Dashboard/Category/category_edit.php';
            break;
        case 'category-update':
            require_once '../app/controller/category_controller.php';
            category_update();
            break;
        case 'category-delete':
            require_once '../app/controller/category_controller.php';
            category_delete();
            break;
        
            /*** dashboard contact */
        case 'dashboard-contact-index':
            require_once '../app/controller/contact_controller.php';
            contact_index();
            break;
        case 'contact_show':
            require_once '../app/controller/contact_controller.php';
            contact_show();
            break;

            /*** dashboard  book*/
        case 'dashboard-book-index':
            require_once '../app/controller/book_controller.php';
            book_index();
            break;
        case 'index-book':
            require '../app/pages/Dashboard/Book/book_index.php';
            break;
        case 'create-book':
            require_once '../app/controller/book_controller.php';
            book_create();
            break;
        case 'create_book':
            require '../app/pages/Dashboard/Book/book_create.php';
            break;
        case 'insert-book':
            require_once '../app/controller/book_controller.php';
            book_insert();
            break;
        case 'book-delete':
            require_once '../app/controller/book_controller.php';
            book_delete();
            break;
        case 'book-edit':
            require_once '../app/controller/book_controller.php';
            book_edit();
            break;
        case 'book-show':
            require_once '../app/controller/book_controller.php';
            book_show();
            break;
        case 'book_edit':
            require '../app/pages/Dashboard/Book/book_edit.php';
            break;
        case 'book-update':
            require_once '../app/controller/book_controller.php';
            book_update();
            break;

            /**** bashboard Branches */
        case 'dashboard-branch-index':
            require_once '../app/controller/branches_controller.php';
            branch_index();
            break;
        case 'insert-branch':
            require_once '../app/controller/branches_controller.php';
            branch_insert();
            break;
        case 'create-branch':
            require '../app/pages/Dashboard/Branch/branch_create.php';
            break;
        case 'branch-show':
            require_once '../app/controller/branches_controller.php';
            branch_show();
            break;
        case 'branch_show':
            require '../app/pages/Dashboard/Branch/branch_show.php';
            break;
        case 'branch-edit':
            require_once '../app/controller/branches_controller.php';
            branch_edit();
            break;
        case 'branch_edit':
            require '../app/pages/Dashboard/Branch/branch_edit.php';
            break;
        case 'branch-update':
            require_once '../app/controller/branches_controller.php';
            branch_update();
            break;
        case 'branch-delete':
            require_once '../app/controller/branches_controller.php';
            branch_delete();
            break;
        case 'branch-insert-phone':
            require_once '../app/controller/branches_controller.php';
            branch_add_phone();
            break;
        case 'branch-add-phone':
            //require '../app/pages/Dashboard/Branch/branch_add_phone.php';
            require_once '../app/controller/branches_controller.php';
            branch_create_phone();
            break;
        case 'phone_number_delete':
            require_once '../app/controller/branches_controller.php';
            branch_delete_phone();
            break;
         /****************** orders */
        case 'dashboard-order-index':
            require_once '../app/controller/order_controller.php';
            orders_index();
            break;
        case 'order-show':
            require_once '../app/controller/order_controller.php';
            order_show_admin();
            break;
        case 'order-edit':
            require_once '../app/controller/order_controller.php';
            order_edit();
            break;
        case 'order-update':
            require_once '../app/controller/order_controller.php';
            order_Update();
            break;
            /** default */
        default:
            require_once("../app/controllers/home_controller.php");
            home_index();
            break;
    }
    // to assign footer according to type admin or user
    //require '../app/layouts/footer.php';
    if(isset($_SESSION['auth'])){
        if($_SESSION['auth']['type']=="admin"){
            include '../app/layouts/dashboardFooter.php';
        }else{
            require '../app/layouts/footer.php';
        }
    }else{
        require '../app/layouts/footer.php';
    }
    
    ob_end_flush();
    ?>