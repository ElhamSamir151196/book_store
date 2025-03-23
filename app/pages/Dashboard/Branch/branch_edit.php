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
        <?php if($_SESSION['branch_phones']):?>
            <div class="card-body">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Created At</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                
                
                    <?php foreach($_SESSION['branch_phones'] as $phone): ?>
                        <tr>
                            <td class="text-center"><?= $phone['id'] ?></td>
                            <td class="text-center"><?= $phone['phone_number'] ?></td>
                            <td class="text-center"><?= $phone['created_at'] ?></td>
                            <td class="text-center">
                            
                            <a href="phone_number_delete?id=<?= $phone['id'] ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`Are you sure to delete <?= $phone['phone_number'] ?> details?`) === false) event.preventDefault();">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        </tr>
                    <?php endforeach; ?>
            
            </tbody>
            </table>
            </div>
        <?php endif;?>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>