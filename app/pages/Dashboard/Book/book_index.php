  
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
                    
    <!-- Table -->
    <h2 class="text-center">Books</h2>
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="card-title col-auto flex-shrink-1 flex-grow-1"><h5>Books List</h5></div>
                <div class="col-atuo">
                    <a class="btn btn-primary btn-sm btn-flat" href="create-book"><i class="fa fa-plus-square"></i> Add Product</a>
                </div>
            </div>
        </div>
      <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">Author</th>
                <th class="text-center">Price</th>
                <th class="text-center">Language</th>
                <th class="text-center">Action</th>

            </tr>
          </thead>
          <tbody>
            
            
                <?php foreach($_SESSION['books'] as $book): ?>
                    <tr>
                        <td class="text-center"><?= $book['id'] ?></td>
                        <td class="text-center"><?= $book['name'] ?></td>
                        <td class="text-center"><?= $book['Author'] ?></td>
                        <td class="text-center"><?= $book['sale_price'] ?></td>
                        <td class="text-center"><?= $book['language'] ?></td>
                        <td class="text-center">
                            <a href="book-show?id=<?= $book['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="book-edit?id=<?= $book['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="book-delete?id=<?= $book['id'] ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`Are you sure to delete <?= $book['name'] ?> details?`) === false) event.preventDefault();">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
           
          </tbody>
        </table>
      </div>
    </div>

    

  