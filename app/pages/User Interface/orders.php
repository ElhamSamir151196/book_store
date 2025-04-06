

      <?php require("../app/layouts/account_profile_right.php");?>
      <div class="profile__left mt-4 mt-md-0 w-100">
        <div class="profile__tab-content orders active">
          
          <?php if(!isset( $_SESSION['orders_user_auth'])):?>
            <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
              <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
              <button class="primary-button">تصفح المنتجات</button>
            </div>
          <?php elseif(! $_SESSION['orders_user_auth']):?>
            <div class="orders__none d-flex justify-content-between align-items-center py-3 px-4">
              <p class="m-0">لم يتم تنفيذ اي طلب بعد.</p>
              <button class="primary-button">تصفح المنتجات</button>
            </div>
          <?php else:?>
            <table class="orders__table w-100">
              <thead>
                <th class="d-none d-md-table-cell">الطلب</th>
                <th class="d-none d-md-table-cell">التاريخ</th>
                <th class="d-none d-md-table-cell">الحالة</th>
                <th class="d-none d-md-table-cell">الاجمالي</th>
                <th class="d-none d-md-table-cell">اجراءات</th>
              </thead>
              <tbody>

                
                <?php foreach($_SESSION['orders_user_auth'] as $order):?>
                  
                <tr class="order__item">
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="d-md-none">الطلب:</div>
                    <div><a href="order_details?id=<?= $order['id']?>">#<?php echo $order['id'] ?></a></div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="d-md-none">التاريخ:</div>
                    <div><?php echo $order['created_at'] ?>  </div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="d-md-none">الحالة:</div>
                    <?php if($order['statues']=="pending"): ?> 
                    <div>قيد التنفيذ</div>
                    <?php elseif($order['statues']=="done"): ?> 
                      <div>تم التنفيذ</div>
                    <?php elseif($order['statues']=="canceled"): ?> 
                      <div>تم الالغاء</div>
                    <?php  endif;?>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="d-md-none">الاجمالي:</div>
                    <div><?php echo $order['total_price'] ?> جنيه</div>
                  </td>
                  <td class="d-flex justify-content-between d-md-table-cell">
                    <div class="d-md-none">اجراءات:</div>
                    <div><a class="primary-button" href="order_details?id=<?= $order['id']?>">عرض</a></div>
                  </td>
                </tr>
                <?php endforeach;?>
              </tbody>
            </table>
          <?php endif;?>
        </div>
        <!-- <section class="section-container">
          <p>تم تقديم الطلب #79917 في يوليو 26, 2023 وهو الآن بحالة قيد التنفيذ.</p>
    
          <section>
            <h2>تفاصيل الطلب</h2>
            <table class="success__table w-100 mb-5">
              <thead>
                <tr class="border-0 bg-main text-white">
                  <th>المنتج</th>
                  <th class="d-none d-md-table-cell">الإجمالي</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <div>
                      <a href="">كوتش فلات ديزارت -رجالى - الابيض, 42</a> x 1
                    </div>
                    <div>
                      <span class="fw-bold">اللون:</span>
                      <span>لابيض</span>
                    </div>
                    <div>
                      <span class="fw-bold">المقاس:</span>
                      <span>42</span>
                    </div>
                  </td>
                  <td>
                    200.00 جنيه
                  </td>
                </tr>
                <tr>
                  <td>
                    <div>
                      <a href="">كوتش كاجوال -رجالى - بنى, 43</a> x 1
                    </div>
                    <div>
                      <span class="fw-bold">اللون:</span>
                      <span>بني</span>
                    </div>
                    <div>
                      <span class="fw-bold">المقاس:</span>
                      <span>43</span>
                    </div>
                  </td>
                  <td>
                    150.00 جنيه
                  </td>
                </tr>
                <tr>
                  <th>المجموع:</th>
                  <td class="fw-bolder">350.00 جنيه</td>
                </tr>
                <tr>
                  <th>الشحن:</th>
                  <td class="d-flex gap-2 align-items-center"><span class="fw-bolder">39.00 جنيه </span><p class="fa-xs m-0">بواسطة موف ات القاهرة والجيزة</p></td>
                </tr>
                <tr>
                  <th>وسيلة الدفع:</th>
                  <td class="fw-bold">الدفع نقدًا عند الاستلام</td>
                </tr>
                <tr>
                  <th>الإجمالي:</th>
                  <td class="fw-bold">389.00 جنيه </td>
                </tr>
              </tbody>
            </table>
          </section>
          <section class="mb-5">
            <h2>عنوان الفاتورة</h2>
            <div class="border p-3 rounded-3">
              <p class="mb-1">محمد محسن</p>
              <p class="mb-1">43 الاتحاد</p>
              <p class="mb-1">القاهرة</p>
              <p class="mb-1">01020288964</p>
              <p class="mb-1">moamenyt@gmail.com</p>
            </div>
          </section>
        </section> -->
      </div>
    </section>
  </main>