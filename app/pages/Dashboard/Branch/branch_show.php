

<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center">Show Category</h2>
        
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
        <?php if(isset($_SESSION['branch'])):?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Branch ID</th>
                    <th scope="col">(<?php echo $_SESSION['branch']['id'];  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">City</th>
                    <td><?php echo $_SESSION['branch']['city'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Street</th>
                    <td><?php echo $_SESSION['branch']['street'];  ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Address</th>
                    <td><?php echo $_SESSION['branch']['address'];  ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Created at</th>
                    <td><?php echo $_SESSION['branch']['created_at'];  ?></td>
                    </tr>
                    

                    
                    <th scope="row">Branch created by</th>
                    <?php if(isset($_SESSION['branch_user'])):?>
                       
                        <td><?php echo $_SESSION['branch_user']['name'];  ?> (<?php echo $_SESSION['branch_user']['id'];  ?>)</td>
                    <?php else: ?> <!-- if user deleted from system -->
                        <td><?php echo $_SESSION['branch']['user_id'];  ?> (but not exist user now)</td>
                    <?php endif;  ?>
                    </tr>
                    
                </tbody>

            </table>
            
        <?php endif;?>
    </div>

  
