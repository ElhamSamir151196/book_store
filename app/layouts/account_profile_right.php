
<main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>حسابي</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">حسابي</span>
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

      <section class="section-container profile my-3 my-md-5 py-5 d-md-flex gap-5">
        <div class="profile__right mb-5">
          <div class="profile__user mb-3 d-flex gap-3 align-items-center">
            <div class="profile__user-img rounded-circle overflow-hidden">
              <img class="w-100" src="../app/assets/images/user.png" alt="" />
            </div>
            <div class="profile__user-name"><?php echo $_SESSION['auth']['name'];?></div>
          </div>
          <ul class="profile__tabs list-unstyled ps-3">
            <li class="profile__tab active">
              <a class="py-2 px-3 text-black text-decoration-none" href="profile">لوحة التحكم</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="orders">الطلبات</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="account_details">تفاصيل الحساب</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="favourites">المفضلة</a>
            </li>
            <li class="profile__tab">
              <a class="py-2 px-3 text-black text-decoration-none" href="logout">تسجيل الخروج</a>
            </li>
          </ul>
        </div>