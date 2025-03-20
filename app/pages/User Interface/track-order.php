

    <main>
      <section
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
      </section>

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
      <section class="section-container my-5 py-5">
        <p class="mb-5">فضلًا أدخل رقم طلبك في الصندوق أدناه وأضغط زر لتتبعه "تتبع الطلب" لعرض حالته. بإمكانك العثور على رقم الطلب في البريد المرسل إليك والذي يحتوي على فاتورة تأكيد الطلب.</p>
        <form action="track_order" method="post">
          <div class="mb-4">
            <label for="">رقم الطلب</label>
            <input class="form__input" placeholder="ستجده في رسالة تأكيد طلبك." type="text" name="order_id" id="order_id">
          </div>
          <div class="mb-4">
            <label for="">البريد الالكتروني للفاتورة</label>
            <input class="form__input" placeholder="البريد الالكتروني الذي استخدمته اثناء اتمام الطلب" type="text" name="email" id="email">
          </div>
          <button class="primary-button">تتبع طلبك</button>
        </form>
      </section>
    </main>
