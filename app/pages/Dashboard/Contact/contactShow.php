
<div class="container mt-5 mb-5">
        <h2 class="border p-2 my-2 text-center">Show contact</h2>
        
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

        <?php if(isset($_SESSION['contact'])):
            $Contact=(object)$_SESSION['contact'];?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Contact ID</th>
                    <th scope="col">(<?php echo $Contact->id;  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $Contact->name;  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">E-mail</th>
                    <td><?php echo $Contact->email;  ?></td>
                    </tr>
                    <th scope="row">Phone</th>
                    <td><?php echo $Contact->phone_number;  ?></td>
                    </tr>
                    <th scope="row">Reason</th>
                    <td><?php echo $Contact->reason;  ?></td>
                    </tr>
                    <th scope="row">meessage</th>
                    <td><?php echo $Contact->meessage;  ?></td>
                    </tr>
                    <th scope="row">Created At</th>
                    <td><?php echo $Contact->created_at;  ?></td>
                    </tr>
                    
                    
                </tbody>

            </table>
           
            
        <?php endif;?>
        
    </div>

