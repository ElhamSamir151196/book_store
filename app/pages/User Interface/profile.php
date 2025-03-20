

   
        <?php require("../app/layouts/account_profile_right.php");?>
        <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">
            <p class="mb-5">
              مرحبا <span class="fw-bolder"><?php echo $_SESSION['auth']['name'];?></span> (لست
              <span class="fw-bolder"><?php echo $_SESSION['auth']['name'];?></span>?
              <a class="text-danger" href="logout">تسجيل الخروج</a>)
            </p>

            <p>
              من خلال لوحة تحكم الحساب الخاص بك، يمكنك استعراض
              <a class="text-danger" href="orders">أحدث الطلبات</a>،
             والفواتير
              الخاصة بك، بالإضافة إلى
              <a class="text-danger" href="account_details">تعديل كلمة المرور وتفاصيل حسابك</a>.
            </p>
          </div>
        </div>
      </section>
    </main>
