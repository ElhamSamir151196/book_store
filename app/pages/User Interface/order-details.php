
<?php

  if(!isset($_SESSION['order_details']) || !isset($_SESSION['order_products'])){
    header('location:orders');
    die;
  }

    if(!$_SESSION['order_products']){$_SESSION['order_products']=[];}// in case false make it empty array

?>
    <main>
      <div
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>تتبع طلبك</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">تتبع طلبك</span>
          </div>
        </div>
      </div>

      <section class="section-container my-5 py-5">
        <p>
          تم تقديم الطلب #<?php echo $_SESSION['order_details']['id']?> في <?php echo $_SESSION['order_details']['created_at']?> وهو الآن بحالة 
        
          <?php if($_SESSION['order_details']['statues']=="pending"): ?> 
            قيد التنفيذ
          <?php elseif($_SESSION['order_details']['statues']=="done"): ?> 
            تم التنفيذ
          <?php elseif($_SESSION['order_details']['statues']=="canceled"): ?> 
            تم الالغاء
          <?php  endif;?>
        </p>
        <section>
          <h2>تفاصيل الطلب</h2>
          <table class="success__table w-100 mb-5">
            <thead>
              <tr class="border-0 bg-danger text-white">
                <th>المنتج</th>
                <th class="d-none d-md-table-cell">الإجمالي</th>
              </tr>
            </thead>
            <tbody>
              
              <?php foreach($_SESSION['order_products'] as  $product):?>
                
              <tr>
                <td>
                  <div> 
                  <span class="fw-bold">  اسم الكتاب:</span>
                  <span><?php echo $product['product_name'];?></span>
                  </div>
                  <div>
                    <span class="fw-bold">الكميه  :</span>
                    <span><?php echo $product['product_qty']?></span>
                  </div>
                  <?php if($product['sale_price']!=0):?>
                  <div>
                    <span class="fw-bold">السعر قبل التخفيض:</span>
                    <span><?php echo $product['sale_price'];?> جنيه</span>
                  </div>
                  <?php endif?>
                  <div>
                    <span class="fw-bold">السعر  :</span>
                    <span><?php echo $product['price'];?> جنيه</span>
                  </div>
                  <div>
                    <img  src='../app/storage/<?= $product['image'] ?>' style="width: 150px; height: 150px;"/>
                  </div>
                </td>
                <td><?php echo $product['price']*$product['product_qty'];?> جنيه</td>
              </tr>
              <?php  endforeach;?>
              <tr>
                <th>المجموع:</th>
                <td class="fw-bolder"><?php echo $_SESSION['order_details']['total_price']?> جنيه</td>
              </tr>
              <tr>
                <th>الإجمالي:</th>
                <td class="fw-bold"><?php echo $_SESSION['order_details']['total_price']+39?> جنيه</td>
              </tr>
            </tbody>
          </table>
        </section>
        <section class="mb-5">
          <h2>عنوان الفاتورة</h2>
          <div class="border p-3 rounded-3">
            <p class="mb-1"> <?php echo $_SESSION['order_details']['first_name']?> <?php echo $_SESSION['order_details']['last_name']?>  </p>
            <p class="mb-1"><?php echo $_SESSION['order_details']['address']?> </p>
            <p class="mb-1"><?php echo $_SESSION['order_details']['city']?> </p>
            <p class="mb-1"><?php echo $_SESSION['order_details']['phone']?> </p>
            <p class="mb-1"><?php echo $_SESSION['order_details']['email']?> </p>
            <p class="mb-1"><?php echo $_SESSION['order_details']['notes']?> </p>
          </div>
        </section>
      </section>
    </main>
