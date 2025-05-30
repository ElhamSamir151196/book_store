<?php
  $sum=0;
foreach($_SESSION['cart'] as  $book_cart){
  $sum+=($book_cart['book_qty']*$book_cart['price']);
}




?>
    <main>
      <section class="page-top d-flex justify-content-center align-items-center flex-column text-center">
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>إتمام الطلب</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">إتمام الطلب</span>
          </div>
        </div>
      </section>

      <section class="section-container my-5 py-5 d-lg-flex">
        <div class="checkout__form-cont w-50 px-3 mb-5">
          <h4>الفاتورة </h4>
          <form class="checkout__form" action="store-order" method="post">
            <div class="d-flex gap-3 mb-3">
              <div class="w-50">
                <label for="first-name">الاسم الأول <span class="required">*</span></label>
                <input class="form__input" type="text" id="first_name" name="first_name"/>
              </div>
              <div class="w-50">
                <label for="last-name">الاسم الأخير <span class="required">*</span></label>
                <input class="form__input" type="text" id="last_name" name="last_name"/>
              </div>
            </div>
            <div class="mb-3">
              <label for="city">المدينة / المحافظة<span class="required">*</span></label>
              <select class="form__input bg-transparent" type="text" id="city" name="city">
                <option value="القاهرة">القاهرة</option>
                <option value="اسكندرية">اسكندرية</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="address">
                العنوان بالكامل ( المنطقة -الشارع - رقم المنزل)<span class="required" >*</span>
                </label>
              <input class="form__input" placeholder="رقم المنزل او الشارع / الحي" type="text" id="address" name="address"/>
            </div>
            <div class="mb-3">
              <label for="phone">رقم الهاتف<span class="required">*</span></label>
              <input class="form__input" type="text" id="phone" name="phone"/>
            </div>
            <div class="mb-3">
              <label for="email">البريد الإلكتروني (اختياري)<span class="required">*</span></label>
              <input class="form__input" type="email" id="email" name="email"/>
            </div>
            <div class="mb-3">
              <h2>معلومات اضافية</h2>
              <label for="notes"
                >ملاحظات الطلب (اختياري)<span class="required">*</span></label
              >
              <textarea
                class="form__input"
                placeholder="ملاحظات حول الطلب, مثال: ملحوظة خاصة بتسليم الطلب."
                type="text"
                id="notes"
                name="notes"
              ></textarea>
            </div>
            <input type="hidden" name="total_price" id="total_price" value="<?= $sum?>">
            <button class="primary-button w-100 py-2" type="submit">تاكيد الطلب</button>
          </form>
        </div>
        <div class="checkout__order-details-cont w-50 px-3">
          <h4>طلبك</h4>
          <div>
            <table class="w-100 checkout__table">
              <thead>
                <tr class="border-0">
                  <th>المنتج</th>
                  <th>المجموع</th>
                </tr>
              </thead>
              <tbody>
                <?php $sum=0;
                  $sum_sale=0;?>
                <?php foreach($_SESSION['cart'] as $key => $book_cart):?>
                <tr>
                  <td><?php echo $book_cart['name']?> × <?php echo $book_cart['book_qty']?></td>
                  <td>
                    <div class="product__price text-center d-flex gap-2 flex-wrap">
                      <?php if($book_cart['sale_price'] >0):?>
                      <span class="product__price product__price--old">
                        <?php echo $book_cart['sale_price']?> جنيه 
                        <?php  $sum_sale+=($book_cart['book_qty']*($book_cart['sale_price']-$book_cart['price']));?>
                      </span>
                      <?php endif;?>
                      <span class="product__price"> <?php echo $book_cart['price']?> جنيه </span>
                      <?php $sum+=($book_cart['book_qty']*$book_cart['price']);?>
                    </div>
                  </td>
                </tr>
                <?php endforeach;?>
                <tr>
                  <th>المجموع</th>
                  <td class="fw-bolder"><?php echo $sum;?> جنيه</td>
                </tr>
                <tr class="bg-green">
                  <th>قمت بتوفير</th>
                  <td class="fw-bolder"><?php echo $sum_sale;?> جنيه</td>
                </tr>
                <tr>
                  <th>الإجمالي</th>
                  <td class="fw-bolder"><?php echo $sum+39;//added delivery?> جنيه</td><
                </tr>
              </tbody>
            </table>
          </div>


          <div class="checkout__payment py-3 px-4 mb-3">
            <p class="m-0 fw-bolder">الدفع نقدا عند الاستلام</p>
          </div>

          <p>الدفع عند التسليم مباشرة.</p>
        </div>
      </section>
    </main>
