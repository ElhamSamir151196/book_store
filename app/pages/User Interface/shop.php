 
    <main>
      <div class="page-top d-flex justify-content-center align-items-center flex-column text-center">
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>المتجر</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">المتجر</span>
          </div>
        </div>
      </div>

      <div class="section-container d-block d-lg-flex gap-5 shop mt-5 pt-5">
        <!-- <div class="shop__filter mb-4"> -->
          <!-- <div class="mb-4">
            <h6 class="shop__filter-title">بتدور علي ايه؟</h6>
            <form action="">
              <div class="filter__search position-relative">
                <input
                  class="w-100 py-1 ps-2"
                  type="text"
                  placeholder="بتدور علي ايه؟"
                />
                <div
                  class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center"
                >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
              </div>
            </form>
          </div> -->
        <div class="shop__products col-12">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <p class="m-0">عرض <?php echo $_SESSION['offset']+1?> - <?php echo count($_SESSION['books'])+$_SESSION['offset']?> من أصل <?php echo $_SESSION['total_books']?> نتيجة</p>
            <form action="">
              <div class="filter__search position-relative">
                <input
                  class="w-100 py-1 ps-2"
                  type="text"
                  placeholder="بتدور علي ايه؟"
                />
                <div
                  class="filter__search-icon position-absolute h-100 top-0 end-0 p-2 d-flex justify-content-center align-items-center"
                >
                  <i class="fa-solid fa-magnifying-glass"></i>
                </div>
              </div>
            </form>
          </div>
          <div class="row products__list">
            <?php  foreach( $_SESSION['books'] as $book): ?>
            <div class="products__item col-6 col-md-4 col-lg-3 mb-5">
              <div class="product__header mb-3">
                <a href="single-product?id=<?= $book['id']?>">
                  <div class="product__img-cont">
                    <img
                      class="product__img w-100 h-100 object-fit-cover"
                      src='../app/storage/<?= $book['image'] ?>'
                      data-id="white"
                    />
                  </div>
                </a>
                <div class="product__sale position-absolute top-0 start-0 m-1 px-2 py-1 rounded-1 text-white">
                  وفر 10%
                </div>
                <div class="product__favourite position-absolute top-0 end-0 m-1 rounded-circle d-flex justify-content-center align-items-center bg-white">
                  <i class="fa-regular fa-heart"></i>
                </div>
              </div>
              <div class="product__title text-center">
                <a
                  class="text-black text-decoration-none"
                  href="single-product?id=<?= $book['id']?>"
                >
                <?php echo $book['name'] ?>
                </a>
              </div>
              <div class="product__author text-center"><?php echo $book['Author'] ?></div>
              <div
                class="product__price text-center d-flex gap-2 justify-content-center flex-wrap"
              >
                <span class="product__price product__price--old">
                <?php echo $book['sale_price'] ?> جنيه
                </span>
                <span class="product__price"> <?php echo $book['price'] ?> جنيه </span>
              </div>
            </div>
            <?php endforeach?>
          </div>

          <div class="products__pagination mb-5 d-flex justify-content-center gap-2">
            <?php  // Display page numbers within range
              $link = isset($_GET['lang']) ? "?lang=".$_GET['lang'] ."&page=": "?page=";
              $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
              $range=3;
              
              $start = max(1, $page - $range);
              $end = min($total_pages, $page + $range);

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
    </main>
