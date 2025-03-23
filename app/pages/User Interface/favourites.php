
    <main>
      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>المفضلة</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">المفضلة</span>
          </div>
        </div>
      </div>

      <div class="my-5 py-5">
        <section class="section-container favourites">
          <table class="w-100">
            <thead>
              <th class="d-none d-md-table-cell"></th>
              <th class="d-none d-md-table-cell"></th>
              <th class="d-none d-md-table-cell">الاسم</th>
              <th class="d-none d-md-table-cell">السعر</th>
              <th class="d-none d-md-table-cell">تاريخ الاضافه</th>
              <th class="d-none d-md-table-cell">المخزون</th>
              <th class="d-table-cell d-md-none">product</th>
            </thead>
            <tbody class="text-center">
              
              <?php  if($_SESSION['fav_books']):?>
                <?php foreach($_SESSION['fav_books'] as $fav_book): ?>
                  <tr>
                    <td class="d-block d-md-table-cell">
                      <a href="remove-fav-product?id=<?= $fav_book['id']?>"><span class="favourites__remove m-auto">
                        <i class="fa-solid fa-xmark"></i>
                      </span>
                      </a>
                    </td>
                    <td class="d-block d-md-table-cell favourites__img">
                      <img src="../app/storage/<?= $fav_book['image'] ?>" alt="" />
                    </td>
                    <td class="d-block d-md-table-cell">
                      <a href="single-product?id=<?= $fav_book['book_id']?>"> <?php echo $fav_book['name']?> </a>
                    </td>
                    <td class="d-block d-md-table-cell">
                      <span class="product__price product__price--old"
                        ><?php if($fav_book['sale_price']>0):?><?php echo $fav_book['sale_price']?> جنية<?php endif?></span
                      >
                      <span class="product__price"><?php echo $fav_book['price']?> جنية</span>
                    </td>
                    <td class="d-block d-md-table-cell"><?php echo $fav_book['created_at']?></td>
                    <td class="d-block d-md-table-cell">
                      
                      <span class="d-inline-block d-md-none d-lg-inline-block">
                        <?php if($fav_book['qty']>0):?>
                          <span class="me-2"><i class="fa-solid fa-check"></i></span>
                        متوفر بالمخزون
                        <?php else:?>
                          غير متوفر حاليا 
                        <?php endif?>
                      </span>
                    </td>
                  </tr>
                <?php endforeach ?>
              <?php else:?>
                <tr>
                  <td>
                  <?php  echo "لا يوجد حاليا";?>
                  </td>
                </tr>
              <?php endif;?>
            </tbody>
          </table>
        </section>
      </div>
    </main>
