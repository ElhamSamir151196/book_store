  
    <!-- Handling Messages Form Session -->
    <?php if(isset($_SESSION['msg_success']) || isset($_SESSION['msg_error'])): ?>
                        <?php if(isset($_SESSION['msg_success'])): ?>
                            <div class="alert alert-success rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_success'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php unset($_SESSION['msg_success']); ?>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['msg_error'])): ?>
                            <div class="alert alert-danger rounded-0">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="col-auto flex-shrink-1 flex-grow-1"><?= $_SESSION['msg_error'] ?></div>
                                    <div class="col-auto">
                                        <a href="#" onclick="$(this).closest('.alert').remove()" class="text-decoration-none text-reset fw-bolder mx-3">
                                            <i class="fa-solid fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php unset($_SESSION['msg_error']); ?>
                        <?php endif; ?>
    <?php endif; ?>
    <!--END of Handling Messages Form Session -->
                    
    <!-- Table -->
    <h2 class="text-center">Users</h2>
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="card-title col-auto flex-shrink-1 flex-grow-1"><h5>Users List</h5></div>
                
            </div>
        </div>
      <div class="card-body">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Name</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Type</th>
                <th class="text-center">Action</th>

            </tr>
          </thead>
          <tbody>
            
            
                <?php foreach($_SESSION['Users'] as $user): ?>
                    <tr>
                        <td class="text-center"><?= $user['id'] ?></td>
                        <td class="text-center"><?= $user['name'] ?></td>
                        <td class="text-center"><?= $user['email'] ?></td>
                        <td class="text-center"><?= $user['type'] ?></td>
                        <td class="text-center">
                            <a href="user_show?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            <a href="user_edit?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-info rounded-0">
                                <i class="fa-solid fa-edit"></i>
                            </a>
                            <a href="user_delete?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger rounded-0" onclick="if(confirm(`Are you sure to delete <?= $user['name'] ?> details?`) === false) event.preventDefault();">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
           
          </tbody>
        </table>
      </div>
    </div>

    

  