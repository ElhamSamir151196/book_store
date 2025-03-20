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

    <!-- Dashboard Cards -->
    <div class="row mt-4">
      <div class="col-md-4">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">Total Users</h5>
            <p class="card-text"><?php echo count($_SESSION['Users']);?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">Total Orders</h5>
            <p class="card-text"><?php echo count($_SESSION['Orders']);?></p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card text-white bg-warning">
          <div class="card-body">
            <h5 class="card-title">Total Books </h5>
            <p class="card-text"><?php echo count($_SESSION['Books']);?></p>
          </div>
        </div>
      </div>
    </div>

   
  
  <?php  
//include 'incs/dashboardFooter.php';
?>
  

