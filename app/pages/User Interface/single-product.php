
    <main>
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

      <!-- Product details Start -->
      <section class="section-container my-5 pt-5 d-md-flex gap-5">
        <div class="single-product__img w-100" id="main-img">
          <img src="../app/storage/<?= $_SESSION['book']['image']?>" alt="">
        </div>
        <div class="single-product__details w-100 d-flex flex-column justify-content-between">
          <div>
            <h4><?php echo  $_SESSION['book']['name']?></h4>
            <div class="product__author"><?php echo  $_SESSION['book']['Author']?></div>
            <div class="product__author"><?php echo  $_SESSION['book']['page_number']?> صفحة</div>
            <div class="product__price mb-3 text-center d-flex gap-2">
              <?php if(isset($_SESSION['book']['sale_price'])):?>
                <span class="product__price product__price--old fs-6 ">
                  <?php echo  $_SESSION['book']['sale_price']?> جنيه
                </span>
              <?php endif ?>
              <span class="product__price fs-5">
              <?php echo  $_SESSION['book']['price']?> جنيه
              </span>
            </div>
            <div >
              <form action="add-to-cart" method="post" class="d-flex w-100 gap-2 mb-3">
                <input type="hidden" name="id" value="<?=$_SESSION['book']['id']?>">
              <div class="single-product__quanitity position-relative float-right">
                <input class="single-product__input text-center px-3" name="qty" type="number" value="1" placeholder="---" id="numberInput">
                <button class="single-product__increase border-0 bg-transparent position-absolute end-0 h-100 px-3" id="increaseBtn" type="button">+</button>
                <button class="single-product__decrease border-0 bg-transparent position-absolute start-0 h-100 px-3" id="decreaseBtn" type="button">-</button>
              </div>
              <button class="single-product__add-to-cart primary-button w-100" type="submit">اضافه الي السلة</button>
              </form>
            </div>
            <a href="add-to-favorite?id=<?=$_SESSION['book']['id']?>" style="text-decoration: none;">
              <div class="single-product__favourite d-flex align-items-center gap-2 mb-4">
                <?php if( $_SESSION["is_favorite"]=="true"):?>
                  <i class="fa-solid fa-heart"></i>
                <?php else:?>
                  <i class="fa-regular fa-heart"></i>
                  <?php endif ?>
                اضافة للمفضلة
              </div>
            </a>
          </div>
          <div class="single-product__categories">
            <p class="mb-0">رمز المنتج: <?php echo  $_SESSION['book']['code']?></p>
            
              <span>التصنيفات: </span>
              <?php if($_SESSION['Book_categories']):?>
                <?php foreach($_SESSION['Book_categories'] as  $key=>$book_category): ?>
                  <a href="shop_category?id=<?= $book_category['id'];?>"><?php echo $book_category['name'];?></a>
                  <?php if($key !=(count($_SESSION['Book_categories'])-1)):?>
                    , 
                  <?php  endif?>
                <?php endforeach?>
              <?php else:?>
                <p class="mb-0">غير محدد</p>
              <?php endif ?>
            </div>
            
          </div>
        </div>
      </section>
      <!-- Product details End -->

      <!-- Description and questions Start -->
      <section class="section-container">
        <nav class="mb-0 ">
          <div class="nav nav-tabs single-product__nav pb-0 gap-2" id="nav-tab" role="tablist">
            <button class="single-product__tab nav-link active" id="single-product__describtion-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
              الوصف
            </button>
          </div>
        </nav>
        <div class="tab-content pt-4" id="nav-tabContent">
          <div class="tab-pane show active" id="nav-description" role="tabpanel" aria-labelledby="single-product__describtion-tab" tabindex="0">
          <?php echo  $_SESSION['book']['description']?>
          </div>
          <div class="questions tab-pane" id="single-product__questions" role="tabpanel" aria-labelledby="single-product__questions-tab" tabindex="0">
            <div class="questions__list accordion" id="question__list">
              <div class="questions__item accordion-item">
                <h2 class="questions__header accordion-header" id="question1">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    الشحن بيوصل خلال قد ايه؟
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="question1" data-bs-parent="#question__list">
                  <div class="accordion-body">
                    خلال 3 ايام داخل القاهرة والجيزة و7 ايام خارج القاهرة والجيزة.
                  </div>
                </div>
              </div>
              <div class="questions__item accordion-item">
                <h2 class="questions__header accordion-header" id="headingTwo">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    خامات التصنيع؟
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#question__list">
                  <div class="accordion-body">
                    خامات مصرية عالية الجودة.
                  </div>
                </div>
              </div>
              <div class="questions__item accordion-item">
                <h2 class="questions__header accordion-header" id="headingThree">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    متاح استبدال او استرجاع المنتج
                  </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#question__list">
                  <div class="accordion-body">
                    نعم، متاح الاستبدال والاسترجاع خلال 7 ايام، برجاء مراجعة <a class="text-danger" href="refund-policy.html">سياسة الاسترجاع والاستبدال</a>.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Description and questions End -->

      <!-- Features Start -->
      <section class="section-container py-5">
        <div class="row">
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="../app/assets/images/feature-1.png" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">شحن سريع</h6>
                <p class="features__item-text m-0">سعر شحن موحد لجميع المحافظات ويصلك في أقل من 72 ساعة</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="../app/assets/images/feature-2.png" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">ضمان الجودة</h6>
                <p class="features__item-text m-0">خامات عالية الجودة ومرونه فى طلبات الاستبدال والاسترجاع</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="../app/assets/images/feature-3.png" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">دعم فني</h6>
                <p class="features__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-3">
            <div class="features__item d-flex align-items-center gap-2">
              <div class="features__img">
                <img class="w-100" src="../app/assets/images/feature-4.png" alt="">
              </div>
              <div>
                <h6 class="features__item-title m-0">استبدال سهل</h6>
                <p class="features__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Features End -->

      <!-- May love Start -->
      <section class="section-container">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">قد يعجبك ايضا...</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="row">
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.html">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/assets/images/product-1.webp" data-id="white">
                </div>
              </a>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر 10%
              </div>
              <div
                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product.html">
                Flutter Apprentice
              </a>
            </div>
            <div class="product__author text-center">
              Mike Katz
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <span class="product__price product__price--old">
                550.00 جنيه
              </span>
              <span class="product__price">
                350.00 جنيه
              </span>
            </div>
          </div>
        </div>
      </section>
      <!-- May love End -->

      <!-- Related products Start -->
      <section class="section-container">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">منتجات ذات صلة</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="row">
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.html">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/assets/images/product-1.webp" data-id="white">
                </div>
              </a>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر 10%
              </div>
              <div
                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product.html">
                Flutter Apprentice
              </a>
            </div>
            <div class="product__author text-center">
              Mike Katz
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <span class="product__price product__price--old">
                550.00 جنيه
              </span>
              <span class="product__price">
                350.00 جنيه
              </span>
            </div>
          </div>
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.html">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/assets/images/product-2.webp" data-id="white">
                </div>
              </a>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر 10%
              </div>
              <div
                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product.html">
                Modern Full-Stack Development
              </a>
            </div>
            <div class="product__author text-center">
              Frank Zammetti
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <span class="product__price product__price--old">
                450.00 جنيه
              </span>
              <span class="product__price">
                250.00 جنيه
              </span>
            </div>
          </div>
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.html">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/assets/images/product-3.webp" data-id="white">
                </div>
              </a>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر 10%
              </div>
              <div
                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product.html">
                C# 10 in a Nutshell
              </a>
            </div>
            <div class="product__author text-center">
              Joseph Albahari
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <span class="product__price product__price--old">
                650.00 جنيه
              </span>
              <span class="product__price">
                450.00 جنيه
              </span>
            </div>
          </div>
          <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
            <div class="product__header mb-3">
              <a href="single-product.html">
                <div class="product__img-cont">
                  <img class="product__img w-100 h-100 object-fit-cover" src="../app/assets/images/product-4.webp" data-id="white">
                </div>
              </a>
              <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                وفر 10%
              </div>
              <div
                class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>
            <div class="product__title text-center">
              <a class="text-black text-decoration-none" href="single-product.html">
                Algorithms عربي
              </a>
            </div>
            <div class="product__author text-center">
              Aditya Y. Bhargava
            </div>
            <div class="product__price text-center d-flex gap-2 justify-content-center flex-wrap">
              <span class="product__price product__price--old">
                359.00 جنيه
              </span>
              <span class="product__price">
                249.00 جنيه
              </span>
            </div>
          </div>
        </div>
      </section>
      <!-- Related products End -->

      <!-- Users comments Start -->
      <section class="section-container comments mb-5">
        <div class="d-flex gap-4 align-items-center w-100 mb-4">
          <h5 class="m-0">أعرف اراء عملاؤنا</h5>
          <hr class="flex-grow-1">
        </div>
        <div class="comments__slider owl-carousel owl-theme">
          <div class="comments__item">
            <div class="comments__icon">
              <img class="w-100" src="../app/assets/images/quote.png" alt="">
            </div>
            <div class="comments__text mb-3">
              الكتاب جميل جدا
            </div>
            <div class="comments__author d-flex align-items-center gap-2">
              <div class="comments__author-dash"></div>
              <div class="comments__author-name fw-bolder">
                Moamen Sherif
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Users comments End -->
    </main>


    <script>
  // Select elements
  const input = document.getElementById("numberInput");
  const increaseBtn = document.getElementById("increaseBtn");
  const decreaseBtn = document.getElementById("decreaseBtn");

  // Increase function
  increaseBtn.addEventListener("click", () => {
    input.value = parseInt(input.value) + 1;
  });

  // Decrease function
  decreaseBtn.addEventListener("click", () => {
    if(input.value==1){
      alert("can't decrease more tnan 1!!");
    }else{
      input.value = parseInt(input.value) - 1;
    }
   
  });
</script>