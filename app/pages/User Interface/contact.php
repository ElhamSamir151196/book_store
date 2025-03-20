  <main>
    <section class="page-top d-flex justify-content-center align-items-center flex-column text-center ">
      <div class="page-top__overlay"></div>
      <div class="position-relative">
        <div class="page-top__title mb-3">
          <h2>تواصل معنا</h2>
        </div>
        <div class="page-top__breadcrumb">
          <a class="text-gray" href="home">الرئيسية</a> /
          <span class="text-gray">تواصل معنا</span>
        </div>
      </div>
    </section>

    <section class="section-container py-5">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-phone"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">اتصل بنا</h6>
              <p class="contact__item-text m-0">01110083360</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">راسلنا علي الايميل</h6>
              <p class="contact__item-text m-0">elham.samir.cairo@gmail.com</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-location-dot"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">العنوان</h6>
              <p class="contact__item-text m-0">دعم فني على مدار اليوم للإجابة على اي استفسار لديك</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
          <div class="contact__item h-100 d-flex align-items-center gap-2">
            <div class="contact__icon">
              <i class="fa-solid fa-comments"></i>
            </div>
            <div>
              <h6 class="contact__item-title m-0">دعم متواصل</h6>
              <p class="contact__item-text m-0">يمكنك استبدال واسترجاع المنتج في حالة عدم مطابقة المواصفات.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- message handling -->
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

      <!--- end message handling----->
    <section class="section-container contact d-md-flex align-items-center mb-3">
      <div class="contact__side w-50">
        <h4 class="mb-3">يسعدنا تواصلك معنا في أى وقت</h4>
        <p>إذا كنت تواجه أي مشكلة أو ترغب في إسترجاع أو إستبدال المنتج لا تتردد أبدأ بالتواصل معنا في أي وقت. كل ماعليك هو ملئ النموذج التالي ببيانات صحيحة وسنقوم بمراجعة طلبك في أسرع وقت.</p>
        <form class="contact__form" action="insert-contact" method="post">
          <div class="d-flex gap-3 mb-3">
            <div class="w-50">
              <label for="name">الاسم<span class="required">*</span></label>
              <input class="contact__input" id="name" name="name" type="text">
            </div>
            <div class="w-50">
              <label for="phone">رقم الهاتف<span class="required">*</span></label>
              <input class="contact__input" id="phone_number" name="phone_number" type="text">
            </div>
          </div>
          <div class="mb-3">
            <label for="email">البريد الالكتروني<span class="required">*</span></label>
            <input class="contact__input" id="email" name="email" type="email">
          </div>
          <div class="mb-3">
            <label for="reason">سبب التواصل<span class="required">*</span></label>
            <select class="contact__input" id="reason" name="reason">
              <option value="others">- اضغط هنا لاختيرا السبب -</option>
              <option value="question">استفسار</option>
              <option value="repalce">استبدال</option>
              <option value="recovery">استرجاع</option>
              <option value="order">استعجال اوردر</option>
              <option value="others">اخري</option>
            </select>
          </div>
          <div>
            <label for="reason">نص الرسالة<span class="required">*</span></label>
            <textarea class="contact__input" name="meessage" id="meessage"></textarea>
          </div>
          <button class="primary-button w-100 rounded-2">ارسال الطلب</button>
        </form>
      </div>
      <div class="contact__side w-50 text-center">
        <img class="w-100" src="../app/assets/images/contact-1.png" alt="">
      </div>
    </section>

    <div class="section-container my-5 px-4">
      <div class="contact__map"></div>
    </div>
  </main>
