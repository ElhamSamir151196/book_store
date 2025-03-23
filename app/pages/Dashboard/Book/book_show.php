

<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center">Show Book</h2>
        
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
        <?php if(isset($_SESSION['Book'])):?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">(<?php echo $_SESSION['Book']['id'];  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">Name</th>
                    <td><?php echo $_SESSION['Book']['name'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Description</th>
                    <td><?php echo $_SESSION['Book']['description'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">language</th>
                    <td><?php echo $_SESSION['Book']['language'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">price</th>
                    <td><?php echo $_SESSION['Book']['price'];  ?></td>
                    </tr>
                    <?php if(isset($_SESSION['Book']['sale_price'])):?>
                    <tr>
                    <th scope="row">sale_price</th>
                    <td><?php echo $_SESSION['Book']['sale_price'];  ?></td>
                    </tr>
                    <?php endif?>
                    <th scope="row">page_number</th>
                    <td><?php echo $_SESSION['Book']['page_number'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Stock</th>
                    <td><?php echo $_SESSION['Book']['qty'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Code</th>
                    <td><?php echo $_SESSION['Book']['code'];  ?></td>
                    </tr>
                    <th scope="row">Image</th>
                    <td>
                    <img  src='../app/storage/<?= $_SESSION['Book']['image'] ?>' style="width: 150px; height: 150px;"/>
                    </td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Creation Time</th>
                    <td><?php echo $_SESSION['Book']['created_at'];  ?></td>
                    </tr>
                    

                    
                    <th scope="row">Book created by</th>
                    <?php if(isset($_SESSION['Book_user'])):?>
                       
                        <td><?php echo $_SESSION['Book_user']['name'];  ?> (<?php echo $_SESSION['Book_user']['id'];  ?>)</td>
                    <?php else: ?> <!-- if user deleted from system -->
                        <td><?php echo $_SESSION['Book']['user_id'];  ?> (but not exist user now)</td>
                    <?php endif;  ?>
                    </tr>
                    
                </tbody>

            </table>
            
        <?php endif;?>
        
        <?php if($_SESSION['Book_categories']):?>
            <div class="card-body">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Created At</th>
                </tr>
            </thead>
            <tbody>
                
                
                    <?php foreach($_SESSION['Book_categories'] as $category): ?>
                        <tr>
                            <td class="text-center"><?= $category['id'] ?></td>
                            <td class="text-center"><?= $category['name'] ?></td>
                            <td class="text-center"><?= $category['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
            
            </tbody>
            </table>
            </div>
        <?php endif;?>
</div>

  
