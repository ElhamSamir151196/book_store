
    <main>
      <section
        class="page-top d-flex justify-content-center align-items-center flex-column text-center"
      >
        <div class="page-top__overlay"></div>
        <div class="position-relative">
          <div class="page-top__title mb-3">
            <h2>فروعنا</h2>
          </div>
          <div class="page-top__breadcrumb">
            <a class="text-gray" href="home">الرئيسية</a> /
            <span class="text-gray">فروعنا</span>
          </div>
        </div>
      </section>

      <section class="branches section-container my-5 py-5">
        <div class="row">
        <?php foreach($_SESSION['branches'] as $key =>$branch):?>
        
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="branches__item h-100">
              <h3>فرع: <?php echo $branch['city'];?></h3>
              <p>
              <?php echo $branch['address'];?>
              </p>
              <div
                class="branches__contact d-flex align-items-center gap-2 mb-3"
              >
                <div class="branches__icon">
                  <i class="fa-solid fa-phone"></i>
                </div>
                <div>
                  <p class="mb-0 fw-bolder">اتصل بنا</p>
                  <?php foreach($_SESSION['branches_phones'] as $branches_phones):?>
                    <?php if($branches_phones['branch_id']==$branch['id']):?>
                      <p class="mb-0"><?php echo $branches_phones['phone_number'];?></p>
                    <?php endif;?>
                  <?php endforeach;?>
                </div>
              </div>
              <div class="branches__location d-flex align-items-center gap-2">
                <div class="branches__icon">
                  <i class="fa-solid fa-location-dot"></i>
                </div>
                <div>
                  <p class="mb-0 fw-bolder">زورنا في الفرع</p>
                  <p class="mb-0"> <?php echo $branch['street'];?> </p>
                </div>
              </div>
            </div>
          </div>
        
        <?php endforeach;?>
        </div>
      </section>
    </main>
