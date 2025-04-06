

<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center">Show Order</h2>
        
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
        <?php if(isset($_SESSION['order'])):?>
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">(<?php echo $_SESSION['order']['id'];  ?>)</th>
                   
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">City</th>
                    <td><?php echo $_SESSION['order']['city'];  ?></td>
                    </tr>
                    <tr>
                    <th scope="row">Address</th>
                    <td><?php echo $_SESSION['order']['address'];  ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Price</th>
                    <td><?php echo $_SESSION['order']['total_price'];  ?></td>
                    </tr>

                    <tr>
                    <th scope="row">Total Price</th>
                    <td><?php echo $_SESSION['order']['total_price']+39;  ?></td>
                    </tr>

                    <tr>
                    <th scope="row">Statues</th>
                    <td><?php echo $_SESSION['order']['statues'];  ?></td>
                    </tr>
                    
                    <tr>
                    <th scope="row">Created at</th>
                    <td><?php echo $_SESSION['order']['created_at'];  ?></td>
                    </tr>
                    

                    
                    <th scope="row">Order created by</th>
                    <?php if(isset($_SESSION['order_user'])):?>
                       
                        <td><?php echo $_SESSION['order_user']['name'];  ?> (<?php echo $_SESSION['order_user']['id'];  ?>)</td>
                    <?php else: ?> <!-- if user deleted from system -->
                        <td><?php echo $_SESSION['order']['user_id'];  ?> (but not exist user now)</td>
                    <?php endif;  ?>
                    </tr>
                    
                </tbody>

            </table>
            
        <?php endif;?>
        <?php if($_SESSION['order_products']):?>
            <div class="card-body">
            <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">QTY</th>
                    <th class="text-center">Image</th>
                </tr>
            </thead>
            <tbody>
                
                
                    <?php foreach($_SESSION['order_products'] as $product): ?>
                        <tr>
                            <td class="text-center"><?= $product['id'] ?></td>
                            <td class="text-center"><?= $product['product_name'] ?></td>
                            <td class="text-center"><?= $product['price'] ?></td>
                            <td class="text-center"><?= $product['product_qty'] ?></td>
                            <td class="text-center">
                                <img  src='../app/storage/<?= $product['image'] ?>' style="width: 100px; height: 100px;"/>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            
            </tbody>
            </table>
            </div>
        <?php endif;?>
    </div>

  
