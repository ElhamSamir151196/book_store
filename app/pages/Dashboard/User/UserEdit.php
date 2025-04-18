
<div class="container mt-5 mb-5">
        <h2 class="border p-2 my-2 text-center">Show User</h2>
        
        <!-- Handling Messages Form Session -->
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
        <!--END of Handling Messages Form Session -->

        <?php if(isset($_SESSION['User'])):
            $User=$_SESSION['User'];?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">User ID</th>
                    <th scope="col">(<?php echo $User->id;  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $User->name;  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">E-mail</th>
                    <td><?php echo $User->email;  ?></td>
                    </tr>
                    <tr>
                    
                    <th scope="row">Type</th>
                    <td><?php echo $User->type  ?></td>
                    </tr>
                    
                </tbody>

            </table>
            <?php if($User->type == "user"):?>
            <form method="post" action="user_update" class="border p-3" enctype="multipart/form-data">
                            <input type="hidden" value="update" name="action">
                            <input type="hidden" value="<?php echo $User->id;  ?>" name="id">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="type" id="exampleCheck1" value="admin">
                                <label class="form-check-label" name="type" for="exampleCheck1">Check here if you want to make this user admin</label>
                            </div>
                            <button type="submit" class="btn btn-primary ">Save</button>
            </form>
            <?php endif;?>
            
        <?php endif;?>
        
    </div>
