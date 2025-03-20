<?php  
//include 'incs/dashboardSidebar.php';
?>

<div class="container mt-5 mb-5">
        <!-- error handling -->
        <?php if(isset($_SESSION['Success'])):?>
              
              <div class="alert alert-success text-center">
                  <?php echo  $_SESSION['Success'] ;?>
                  <?php unset($_SESSION['Success']);?>
              </div>
              
        <?php endif;?>

        <?php if(isset($_SESSION['error'])):?>
                
                <div class="alert alert-danger text-center">
                    <?php echo  $_SESSION['error'] ;?>
                    <?php unset($_SESSION['error']);?>
                </div>
                
        <?php endif;?>
            
        <?php if(isset($_SESSION['errors'])):
                foreach($_SESSION['errors'] as $error): ?>
                <div class="alert alert-danger text-center">
                    <?php echo   $error;?>
                </div>
                <?php endforeach;
                unset($_SESSION['errors']);    ?>
        <?php endif;?>
        <!-- error handling end-->

        <h2 class="border p-2 my-2 text-center">Create Branch phone</h2>
        <form method="post" action="branch-insert-phone" class="border p-3">
            <input type="hidden" name="branch_id" id="branch_id" value="<?= isset($_GET['id']) ? (int)$_GET['id'] : null?>">
            <div class="mb-3">
              <label for="phone_number" class="form-label">Branch phone number</label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" >
            </div>

            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>