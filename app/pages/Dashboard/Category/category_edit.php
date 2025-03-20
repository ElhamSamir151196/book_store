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

        <h2 class="border p-2 my-2 text-center">Update Category # (<?= $_SESSION['Category']['id']?>)</h2>
        <form method="post" action="category-update" class="border p-3" enctype="multipart/form-data">
            <input type="hidden"  name="id" id="id" value="<?= $_SESSION['Category']['id']?>">

            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['Category']['name']?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea class="form-control" rows="4" name="description" id="description"><?= $_SESSION['Category']['description']?></textarea>
            </div>

            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>