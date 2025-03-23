  
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
    <h2 class="text-center">Branches</h2>
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="card-title col-auto flex-shrink-1 flex-grow-1"><h5>Branches List</h5></div>
                <div class="col-atuo">
                    <a class="btn btn-primary btn-sm btn-flat" href="create-branch"><i class="fa fa-plus-square"></i> Add branch</a>
                    <p class="m-0">عرض <?php echo $_SESSION['offset']+1?> - <?php echo count($_SESSION['branches'])+$_SESSION['offset']?> من أصل <?php echo $_SESSION['total_branches']?> نتيجة</p>
                </div>
            </div>
        </div>
      <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">City</th>
                <th class="text-center">Street</th>
                <th class="text-center">Action</th>

            </tr>
          </thead>
          <tbody>
            
            
                <?php foreach($_SESSION['branches'] as $branch): ?>
                    <tr>
                        <td class="text-center"><?= $branch['id'] ?></td>
                        <td class="text-center"><?= $branch['city'] ?></td>
                        <td class="text-center"><?= $branch['street'] ?></td>
                        
                        <td class="text-center">
                            <a href="branch-add-phone?id=<?= $branch['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877zM12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                            </a>
                            <a href="branch-show?id=<?= $branch['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="branch-edit?id=<?= $branch['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="branch-delete?id=<?= $branch['id'] ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`Are you sure to delete <?= $branch['city'] ?> details?`) === false) event.preventDefault();">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
           
          </tbody>
        </table>
        <div class="products__pagination mb-5 d-flex justify-content-center gap-2">
            <?php  // Display page numbers within range
              $link = "?page=";
              $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
              $range=3;
              
              $start = max(1, $page - $range);
              $end = min($_SESSION['total_pages'], $page + $range);

            ?>
            <?php if($page > 1): ?>
              <a href="<?=$link?><?=($page - 1)?>" ><span class="pagination__btn rounded-1 pagination__btn--next"><i class="fa-solid fa-arrow-right-long"></i></span></a>
            <?php endif?>
            
            <?php for ($i = $start; $i <= $end; $i++) : ?>
              <?php if ($i == $page) : ?>
                <span class="pagination__btn rounded-1 active"><?php echo $i?></span></a>
              <?php else : ?>
                <a href='<?=$link?><?=$i?>' style="text-decoration: none;"> <span class="pagination__btn rounded-1"><?php echo $i?></span></a>
              <?php endif?>
            <?php endfor?>
            <?php if($page < $_SESSION['total_pages']): ?>
              <a href='<?=$link?><?=($page + 1)?>'><span class="pagination__btn rounded-1 pagination__btn--prev" ><i class="fa-solid fa-arrow-left-long"></i></span></a>
            <?php endif?>
        </div>
      </div>
    </div>

    

  