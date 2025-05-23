
      <!--    -->
      <nav class="nav">
        <div class="section-container w-100 d-flex align-items-center gap-4 h-100">
          <div class="nav__categories-btn align-items-center justify-content-center rounded-1 d-none d-lg-flex">
            <button class="border-0 bg-transparent" data-bs-toggle="offcanvas" data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
            </button>
          </div>
          <div class="nav__logo">
            <a href="home">
              <img class="h-100" src="../app/assets/images/logo.png" alt="">
            </a>
          </div>
          <div class="nav__search w-100">
            <input class="nav__search-input w-100" type="search" placeholder="أبحث هنا عن اي شئ تريده...">
            <span class="nav__search-icon">
              <i class="fa-solid fa-magnifying-glass"></i>
            </span>
          </div>
          <ul class="nav__links gap-3 list-unstyled d-none d-lg-flex m-0">
          <?php if(isset($_SESSION['auth'])):?>
            <li class="nav__link nav__link-user">
              <a class="d-flex align-items-center gap-2">
                حسابي
                <i class="fa-regular fa-user"></i>
                <i class="fa-solid fa-chevron-down fa-2xs"></i>
              </a>
              <ul class="nav__user-list position-absolute p-0 list-unstyled bg-white">
                <li class="nav__link nav__user-link"><a href="profile">لوحة التحكم</a></li>
                <li class="nav__link nav__user-link"><a href="orders">الطلبات</a></li>
                <li class="nav__link nav__user-link"><a href="account_details">تفاصيل الحساب</a></li>
                <li class="nav__link nav__user-link"><a href="favourites">المفضلة</a></li>
                <li class="nav__link nav__user-link"><a class="d-flex align-items-center" data-bs-toggle="offcanvas" data-bs-target="#nav__cart">عربة التسوق</a></li>
                <li class="nav__link nav__user-link"><a href="logout">تسجيل الخروج</a></li>
              </ul>
            </li> 
            <?php else:?>
            <li class="nav__link">
              <a class="d-flex align-items-center gap-2" href="account">
                تسجيل الدخول
                <i class="fa-regular fa-user"></i>
              </a>
            </li>
            
            <li class="nav__link">
              <a class="d-flex align-items-center" href="track-order">
              تتبع طلبك                
              </a>
            </li>
            <?php endif?>
          </ul>
        </div>
        <div class="nav-mobile fixed-bottom d-block d-lg-none">
          <ul class="nav-mobile__list d-flex justify-content-around gap-2 list-unstyled  m-0 border-top">
            <li class="nav-mobile__link">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="home">
                <i class="fa-solid fa-house"></i>
                الرئيسية
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__categories">
              <i class="fa-solid fa-align-center fa-rotate-180"></i>
              الاقسام
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="profile">
                <i class="fa-regular fa-user"></i>
                حسابي 
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1">
              <a class="d-flex align-items-center flex-column gap-1 text-decoration-none" href="favourites">
                <i class="fa-regular fa-heart"></i>
                المفضلة 
              </a>
            </li>
            <li class="nav-mobile__link d-flex align-items-center flex-column gap-1" data-bs-toggle="offcanvas"
              data-bs-target="#nav__cart">
              <i class="fa-solid fa-cart-shopping"></i>
              السلة
            </li>
          </ul>
          <!--  -->
        </div>
      </nav>

      <div class="nav__categories offcanvas offcanvas-start px-4 py-2" tabindex="-1" id="nav__categories"
        aria-labelledby="nav__categories">
        <div class="nav__categories-header offcanvas-header justify-content-end">
          <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-x fa-1x fw-light"></i>
          </button>
        </div>
        <div class="nav__categories-body offcanvas-body pt-0">
          <div class="nav__side-logo mb-2">
            <img class="w-100" src="../app/assets/images/logo.png" alt="">
          </div>
          <ul class="nav__list list-unstyled">
            <li class="nav__link nav__side-link"><a href="shop" class="py-3">جميع المنتجات</a></li>
            <li class="nav__link nav__side-link"><a href="shop?lang=arabic" class="py-3">كتب عربيه</a></li>
            <li class="nav__link nav__side-link"><a href="shop?lang=english" class="py-3">كتب انجليزية</a></li>
          </ul>
        </div>
      </div>

      <div class="nav__cart offcanvas offcanvas-end px-3 py-2" tabindex="-1" id="nav__cart" aria-labelledby="nav__cart">
        <div class="nav__categories-header offcanvas-header align-items-center">
          <h5>سلة التسوق</h5>
          <button type="button" class="border-0 bg-transparent text-danger nav__close" data-bs-dismiss="offcanvas"
            aria-label="Close">
            <i class="fa-solid fa-x fa-1x fw-light"></i>
          </button>
        </div>
        <div class="nav__categories-body offcanvas-body pt-4">
          <?php if(!isset($_SESSION['cart'])):?>
            <p>لا توجد منتجات في سلة المشتريات.</p>
          <?php  elseif(!$_SESSION['cart']): ?>
            <p>لا توجد منتجات في سلة المشتريات.</p>
          <?php  else: ?>
          <div class="cart-products">
            <ul class="nav__list list-unstyled">
              
              <?php $sum=0;?>
              <?php foreach($_SESSION['cart'] as $key => $book_cart):?>
                <li class="cart-products__item d-flex justify-content-between gap-2">
                  <div class="d-flex gap-2">
                    <div>
                      <form action="delete-product-cart" method="post">
                        <input type="hidden" name="id" id="id" value="<?=$book_cart['id']?>">
                        <button class="cart-products__remove" type="submit">x</button>
                      </form>
                    </div>
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
          <button class="nav__cart-btn text-center text-white w-100 border-0 mb-3 py-2 px-3 bg-success" onclick="window.location.href='check-out'">اتمام الطلب</button>
          <?php endif?>
          <button class="nav__cart-btn text-center w-100 py-2 px-3 bg-transparent" onclick="window.location.href='home'">تابع التسوق</button>
        </div>
      </div>
    </div>
