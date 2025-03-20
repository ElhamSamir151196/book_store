
  
        <?php require("../app/layouts/account_profile_right.php");?>
        <div class="profile__left mt-4 mt-md-0 w-100">
          <div class="profile__tab-content active">
            <form class="profile__form border p-3" action="update-user-data" method="post">
              
              <div class="w-100">
                <label class="fw-bold mb-2" for="displayed-name">
                الاسم كامل<span class="required">*</span>
                </label>
                <input type="text" class="form__input" id="displayed-name" name="name" value="<?= $_SESSION["auth"]["name"]?>"/>
              </div>
              <div class="w-100 mb-3">
                <label class="fw-bold mb-2" for="email">
                  البريد الالكتروني<span class="required">*</span>
                </label>
                <input type="text" class="form__input" id="email" name="email" value="<?= $_SESSION["auth"]["email"]?>"/>
              </div>
              <button class="primary-button">تعديل</button>
            </form>
            <form action="change-user-password" method="post">
              <fieldset>
                <legend class="fw-bolder">تغيير كلمة المرور</legend>
                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    كلمة المرور الحالية (اترك الحقل فارغاً إذا كنت لا تودّ
                    تغييرها)
                  </label>
                  <input type="password" class="form__input" id="curr_password" name="curr_password"/>
                </div>
                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    كلمة المرور الجديدة (اترك الحقل فارغاً إذا كنت لا تودّ
                    تغييرها)
                  </label>
                  <input type="password" class="form__input" id="new_password" name="new_password" />
                </div>
                <div class="w-100 mb-3">
                  <label class="fw-bold mb-2" for="curr-password">
                    تأكيد كلمة المرور الجديدة
                  </label>
                  <input type="password" class="form__input" id="confirm_new_password" name="confirm_new_password"/>
                </div>
                <button class="primary-button">تغيير كلمة المرور</button>
              </fieldset>
            </form>
          </div>
        </div>
      </section>
    </main>
