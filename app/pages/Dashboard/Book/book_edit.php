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

        <h2 class="border p-2 my-2 text-center">Update Book</h2>
        <form method="post" action="book-update" class="border p-3" enctype="multipart/form-data">
        <input type="hidden"  name="id" id="id" value="<?= $_SESSION['Book']['id']?>">

            <div class="mb-3">
              <label for="name" class="form-label">Book Name</label>
                <input type="text" class="form-control" name="name" id="name" value="<?= $_SESSION['Book']['name']?>">
            </div>
            <div class="mb-3">
              <label for="Author" class="form-label">Book Author</label>
                <input type="text" class="form-control" name="Author" id="Author" value="<?= $_SESSION['Book']['Author']?>">
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">Choose Book Language:</label>
                <select class="form-select" id="language" name="language">
                    <?php if($_SESSION['Book']['language']=="english"):?>
                        <option value="english" selected>English</option>
                    <?php else:?>
                        <option value="english">English</option>
                    <?php endif  ?>
                    <?php if($_SESSION['Book']['language']=="arabic"):?>
                        <option value="arabic" selected>العربية (Arabic)</option>
                    <?php else:?>
                        <option value="arabic">العربية (Arabic)</option>
                    <?php endif  ?>
                    <?php if($_SESSION['Book']['language']!="arabic" && $_SESSION['Book']['language']!="english"):?>
                        <option value="other" selected>Other</option>
                    <?php else:?>
                        <option value="other">Other</option>
                    <?php endif  ?>
                </select>
            </div>
            <div class="mb-3">
              <label for="page_number" class="form-label">Page Numbers</label>
                <input type="number" min="1" class="form-control" name="page_number" id="page_number" value="<?= $_SESSION['Book']['page_number']?>">
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">Book description</label>
                <input type="text" class="form-control" name="description" id="description" value="<?= $_SESSION['Book']['description']?>">
            </div>
            <div class="mb-3">
              <label for="qty" class="form-label">Book Qty</label>
                <input type="text" type="number" min="1" class="form-control" name="qty" id="qty" value="<?= $_SESSION['Book']['qty']?>">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price(جنيه)</label>
                <input type="number" min="1" class="form-control" name="price" id="price" value="<?= $_SESSION['Book']['price']?>">
            </div>            
           
            <div class="form-check">
                <?php if($_SESSION['Book']['sale_price']!=0):?>
                <input class="form-check-input" type="checkbox" value="sale" name="sale" id="sale" checked>
                <?php else:?>
                    <input class="form-check-input" type="checkbox" value="" name="sale" id="sale" >
                <?php endif;?>
                <label class="form-check-label" for="sale">
                    Sale Activation
                </label>
            </div>
            <div class="mb-3">
                <label for="sale_price" class="form-label">Sale Price (جنيه) (Optional)</label>
                <input type="number" class="form-control" name="sale_price" id="sale_price" value="<?= $_SESSION['Book']['sale_price']?>">
            </div>

            <div class="mb-3">
                <img src="../app/storage/<?= $_SESSION['Book']['image'] ?>" alt="product image" style="width:200px; height:150px;"><br><br>
                <label for="image" class="form-label">Choose Image if this is not correct</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" >
            </div>

            
            <?php if($_SESSION['categories']):?>
            <div class="mb-3">
                <label for="categories" class="form-label">select book category</label><br>
                <?php foreach($_SESSION['categories'] as $category): ?>
                    <?php if (in_array($category['id'], $_SESSION['Book_categories_id'])):?>
                        <input type="checkbox" name="categories[]" value="<?= $category['id'] ?>" checked>  <?= $category['id'] ?> -<?= $category['name'] ?> <br>
                    <?php else:?>
                        <input type="checkbox" name="categories[]" value="<?= $category['id'] ?>" >  <?= $category['id'] ?> -<?= $category['name'] ?> <br>
                    <?php endif;?>
                <?php endforeach; ?>
            </div>
            <?php endif;?>
            <button type="submit" class="btn btn-primary ">Save</button>
        </form>
    </div>

  
<?php  
//include 'incs/dashboardFooter.php';
?>