<div class="nav__cart  px-3 py-2">
        <div class="nav__categories-header offcanvas-header align-items-center">
          <h5>سلة التسوق</h5>
          
        </div>
        <div class="nav__categories-body offcanvas-body pt-4">
          <?php if(!isset($_SESSION['user_cart_products'])):?>
            <p>لا توجد منتجات في سلة المشتريات.</p>
          <?php  elseif(!$_SESSION['user_cart_products']): ?>
            <p>لا توجد منتجات في سلة المشتريات.</p>
          <?php  else: ?>
          <div class="cart-products">
            <ul class="nav__list list-unstyled">
              
              <?php $sum=0;?>
              <?php foreach($_SESSION['user_cart_products'] as $key => $book_cart):?>
                <li class="cart-products__item d-flex justify-content-between gap-2">
                  <div class="d-flex gap-2">
                    
                    <div>
                      <p class="cart-products__name m-0 fw-bolder"><?php echo $book_cart['name']?></p>
                      <p class="cart-products__price m-0">  <?php echo $book_cart['book_qty']?> x  جنيه <?php echo $book_cart['price']?>    </p>
                      <?php $sum+=($book_cart['book_qty']*$book_cart['price']);?>
                    </div>
                  </div>
                  <div class="cart-products__img">
                    <img class="w-100" src="../app/storage/<?=$book_cart['image']?>" alt="">
                  </div>
                </li>
              <?php endforeach?>
            </ul>
            <div class="d-flex justify-content-between">
              <p class="fw-bolder">المجموع:</p>
              <p><?php echo $sum;?> جنيه</p>
            </div>
          </div>
          <?php endif?>
        </div>
      </div>