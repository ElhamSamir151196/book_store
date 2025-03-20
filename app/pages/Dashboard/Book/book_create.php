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

        <h2 class="border p-2 my-2 text-center">Create Book</h2>
        <form method="post" action="insert-book" class="border p-3" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Book Name</label>
                <input type="text" class="form-control" name="name" id="name" >
            </div>
            <div class="mb-3">
              <label for="Author" class="form-label">Book Author</label>
                <input type="text" class="form-control" name="Author" id="Author" >
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Choose Book Language:</label>
                <select class="form-select" id="language" name="language">
                    <option value="english" selected>English</option>
                    <option value="arabic">العربية (Arabic)</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="mb-3">
              <label for="page_number" class="form-label">Page Numbers</label>
                <input type="number" min="1" class="form-control" name="page_number" id="page_number" >
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Book description</label>
                <input type="text" class="form-control" name="description" id="description" >
            </div>
            <div class="mb-3">
              <label for="qty" class="form-label">Book Qty</label>
                <input type="text" type="number" min="1" class="form-control" name="qty" id="qty" >
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price(جنيه)</label>
                <input type="number" min="1" class="form-control" name="price" id="price" >
            </div>            
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="sale" name="sale" id="sale" checked>
                <label class="form-check-label" for="sale">
                    Sale Activation
                </label>
            </div>
            <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price (جنيه) (Optional)</label>
                <input type="number" class="form-control" name="sale_price" id="sale_price" >
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Choose Image</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">select book category</label><br>
                <?php foreach($_SESSION['categories'] as $category): ?>
                    <input type="checkbox" name="categories[]" value="<?= $category['id'] ?>">  <?= $category['id'] ?> - <?= $category['name'] ?><br>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>