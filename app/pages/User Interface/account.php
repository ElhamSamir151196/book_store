
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

      <div
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
      </div>

      <div class="page-full pb-5">
        <div class="account account--login mt-5 pt-5">
          <div class="account__tabs w-100 d-flex mb-3">
            <div
              class="account__tab account__tab--login text-center fs-6 py-3 w-50"
            >
              تسجيل الدخول
            </div>
            <div
              class="account__tab account__tab--register text-center fs-6 py-3 w-50"
            >
              حساب جديد
            </div>
          </div>
          <div class="account__login w-100">
            <form class="mb-5" action="login" method="post">
              <div class="input-group rounded-1 mb-3">
                <input
                  type="text"
                  class="form-control p-3"
                  placeholder="البريد الالكتروني"
                  aria-label="Email"
                  name="email"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-envelope"></i>
                </span>
              </div>
              <div class="input-group rounded-1 mb-3">
                <input
                  type="password"
                  class="form-control p-3"
                  placeholder="كلمة السر"
                  aria-label="Password"
                  name="password"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-key"></i>
                </span>
              </div>

              <div class="login__bottom d-flex justify-content-between mb-3">
                <a class="login__forget-btn" href="">نسيت كلمة المرور؟</a>
                <div>
                  <input type="checkbox" name="remember_me" value="1"/>
                  <label for="checkbox">تذكرني</label>
                </div>
              </div>

              <button
                class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
              >
                تسجيل الدخول
              </button>
            </form>
          </div>
          <div class="account__register w-100">
            <form class="mb-5" action="register" method="post">
              <div class="input-group rounded-1 mb-3">
                <input
                  type="text"
                  class="form-control p-3"
                  placeholder="الاسم كامل"
                  aria-label="Username"
                  name="name"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-user"></i>
                </span>
              </div>
              <div class="input-group rounded-1 mb-3">
                <input
                  type="text"
                  class="form-control p-3"
                  placeholder="البريد الالكتروني"
                  aria-label="Email"
                  name="email"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-envelope"></i>
                </span>
              </div>
              <div class="input-group rounded-1 mb-3">
                <input
                  type="password"
                  class="form-control p-3"
                  placeholder="كلمة السر"
                  aria-label="Password"
                  name="password"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-key"></i>
                </span>
              </div>

              <button
                class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
              >
                حساب جديد
              </button>
            </form>
          </div>
          <div class="account__forget">
            <p>
              فقدت كلمة المرور الخاصة بك؟ الرجاء إدخال عنوان البريد الإلكتروني
              الخاص بك. ستتلقى رابطا لإنشاء كلمة مرور جديدة عبر البريد
              الإلكتروني.
            </p>
            <form action="forget_password" method="post">
              <div class="input-group rounded-1 mb-3">
                <input
                  type="text"
                  class="form-control p-3"
                  placeholder="البريد الالكتروني"
                  aria-label="email"
                  name="email"
                  aria-describedby="basic-addon1"
                />
                <span
                  class="input-group-text login__input-icon"
                  id="basic-addon1"
                >
                  <i class="fa-solid fa-envelope"></i>
                </span>
              </div>
              <button
                class="text-center fs-6 py-2 w-100 bg-black text-white border-0 rounded-1"
              >
                اعادة تعيين كلمة المرور
              </button>
            </form>
          </div>
        </div>
      </div>
    </main>
