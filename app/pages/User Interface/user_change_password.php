<div class="container mt-5 mb-5">
    <h2 class="border p-2 my-2 text-center"> User Reset Password</h2>

    <!-- Handling Messages Form Session -->
    <?php if (isset($_SESSION['error'])): ?>

        <div class="alert alert-danger text-center">
            <?php echo  $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); ?>
        </div>

    <?php endif; ?>
    <?php if (isset($_SESSION['errors'])):
        foreach ($_SESSION['errors'] as $error): ?>
            <div class="alert alert-danger text-center">
                <?php echo   $error; ?>
            </div>
        <?php endforeach; ?>
        <?php unset($_SESSION['errors']);    ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['Success'])): ?>
        <div class="alert alert-success rounded-0">
            <div class="d-flex justify-content-between align-items-center">
                <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['Success'] ?></div>
                <div class="col-auto">
                    <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                        <i class="fa-solid fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php unset($_SESSION['Success']);    ?>
    <?php endif; ?>

    <!--END of Handling Messages Form Session -->

    <?php if (isset($_GET['email'])):?>
        <form method="post" action="update-user-password" class="border p-3 mb-5" enctype="multipart/form-data">
            <input type="hidden" name="email" id="email" value="<?= $_GET['email'] ?>">

            <div class="mb-3">
                <label for="password" class="form-label">    كلمة المرور جديدة</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="mb-3">
                <label for="password_confirm" class="form-label">تاكيد كلمة المرور جديدة</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm">
            </div>

            <button type="submit" class="btn btn-primary ">حفظ </button>
        </form>
    <?php endif; ?>

</div>