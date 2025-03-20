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

        <h2 class="border p-2 my-2 text-center">Update Branch # (<?= $_SESSION['branch']['id']?>)</h2>
        <form method="post" action="branch-update" class="border p-3" >
            <input type="hidden"  name="id" id="id" value="<?= $_SESSION['branch']['id']?>">

            <div class="mb-3">
                <label for="city" class="form-label">Branch City</label>
                <input type="text" class="form-control" name="city" id="city" value="<?= $_SESSION['branch']['city']?>">
            </div>
            <div class="mb-3">
              <label for="street" class="form-label">Branch Street</label>
                <input type="text" class="form-control" name="street" id="street" value="<?= $_SESSION['branch']['street']?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Branch address</label>
                <textarea class="form-control" rows="4" name="address" id="address"><?= $_SESSION['branch']['address']?></textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>