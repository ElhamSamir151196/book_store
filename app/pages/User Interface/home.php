


  <!-- Page Content Start -->
  <main class="pt-4">
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
    <!-- Hero Section Start -->
    <section class="section-container hero" >
      <div class="owl-carousel hero__carousel owl-theme">
        <div class="hero__item">
          <img class="hero__img" src="../app/assets/images/carousel-2.png" alt="" style="height: 480px;">
        </div>
        <div class="hero__item">
          <img class="hero__img" src="../app/assets/images/20090204-Design-Books-2.jpg" alt="" style="height: 480px;">
        </div>
        <div class="hero__item">
          <img class="hero__img" src="../app/assets/images/istockphoto.jpg" alt="" style="height: 480px;">
        </div>
      </div>
    </section>
    <!-- Hero Section End -->

   

    

    <!-- Categories Section Start -->
    <section class="section-container mb-5">
      <div class="categories row gx-4">
        <div class="col-md-6 p-2">
          <div class="p-4 border rounded-3">
            <a href="shop?lang=arabic" class="py-3"> 
            <img class="w-100" src="../app/assets/images/category-1.png" alt="">
            </a>
          </div>
        </div>
        <div class="col-md-6 p-2">
          <div class="p-4 border rounded-3">
            <a href="shop?lang=english" class="py-3"> 
            <img class="w-100" src="../app/assets/images/category-2.png" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Categories Section End -->

    <!-- Best Sales Section Start -->
    <?php if($_SESSION['most_buy_books']):?>
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">الاكثر مبيعا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
      <div class="owl-carousel products__slider owl-theme">
        <?php foreach( $_SESSION['most_buy_books'] as $book_best_sales):?>
          <div class="products__item">
            <div class="product__header mb-3">
              <a href="single-product?id=<?=$book_best_sales['id']?>">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/storage/<?= $book_best_sales['image']?>" data-id="white">
                </div>
              </a>
              
              
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product">
                <?php echo $book_best_sales['name']?>
              </a>
            </div>
            <div class="product__author text-center">
              <?php echo $book_best_sales['Author']?>
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <?php if($book_best_sales['sale_price']!=0):?>
              <span class="product__price product__price--old">
                <?php echo $book_best_sales['sale_price']?> جنيه
              </span>
              <?php endif?>
              <span class="product__price">
              <?php echo $book_best_sales['price']?> جنيه
              </span>
            </div>
          </div>
        <?php endforeach?>
        
        
      </div>
    </section>
    <?php endif?>
    <!-- Best Sales Section End -->

    <!-- Newest Section Start -->
    <?php if($_SESSION['last_list_books']):?>
    <section class="section-container mb-5">
      <div class="products__header mb-4 d-flex align-items-center justify-content-between">
        <h4 class="m-0">وصل حديثا</h4>
        <button class="products__btn py-2 px-3 rounded-1">تسوق الأن</button>
      </div>
      <div class="owl-carousel products__slider owl-theme">
        <?php foreach( $_SESSION['last_list_books'] as $book_best_sales):?>
          <div class="products__item">
            <div class="product__header mb-3">
              <a href="single-product?id=<?=$book_best_sales['id']?>">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/storage/<?= $book_best_sales['image']?>" data-id="white">
                </div>
              </a>
              
              
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product">
                <?php echo $book_best_sales['name']?>
              </a>
            </div>
            <div class="product__author text-center">
              <?php echo $book_best_sales['Author']?>
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <?php if($book_best_sales['sale_price']!=0):?>
              <span class="product__price product__price--old">
                <?php echo $book_best_sales['sale_price']?> جنيه
              </span>
              <?php endif?>
              <span class="product__price">
              <?php echo $book_best_sales['price']?> جنيه
              </span>
            </div>
          </div>
        <?php endforeach?>
        
        
      </div>
    </section>
    <?php endif?>
    <!-- Newest Section End -->
  </main>
  <!-- Page Content End -->

