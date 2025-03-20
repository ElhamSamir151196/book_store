

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
        <?php if(isset($_SESSION['Category'])):
            $Order=$_SESSION['Category'];?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">(<?php echo $_SESSION['Category']['id'];  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $_SESSION['Category']['name'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Description</th>
                    <td><?php echo $_SESSION['Category']['description'];  ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Creation Time</th>
                    <td><?php echo $_SESSION['Category']['created_at'];  ?></td>
                    </tr>
                    

                    
                    <th scope="row">Category created by</th>
                    <?php if(isset($_SESSION['Category_user'])):?>
                       
                        <td><?php echo $_SESSION['Category_user']['name'];  ?> (<?php echo $_SESSION['Category_user']['id'];  ?>)</td>
                    <?php else: ?> <!-- if user deleted from system -->
                        <td><?php echo $_SESSION['Category']['user_id'];  ?> (but not exist user now)</td>
                    <?php endif;  ?>
                    </tr>
                    
                </tbody>

            </table>
            
        <?php endif;?>
    </div>

  
