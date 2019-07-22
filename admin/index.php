<?php

 include 'inc/header_script.php' ;
 require_once 'db/class_admin.php';

    $message = "";
    if (isset($_POST['submit'])) {
      $admin_login = new dashboard($_POST);
      $message = $admin_login->auth($_POST);
  }

 ?>

<div id="wrapper">
  <div class="card card-authentication1 mx-auto my-5 animated zoomIn">
    <div class="card-body">
     <div class="card-content p-2">
      <?php if ( !empty($message) ): ?>
        <p class="bg-danger text-white p-3 sd_alert mb-2"> <?php echo "$message"; ?></p>
      <?php endif ?>
      <div class="text-center">
        <img src="assets/images/logo-icon.png"/>
      </div>
      <div class="card-title text-uppercase text-center py-2">Dashboard</div>
        <form action="" method="POST">
        <div class="form-group">
         <div class="position-relative has-icon-left">
          <label for="exampleInputUsername" class="sr-only">Username</label>
          <input type="text" id="exampleInputUsername" class="form-control" placeholder="Username" name="email">
          <div class="form-control-position">
            <i class="icon-user"></i>
          </div>
         </div>
        </div>
        <div class="form-group">
         <div class="position-relative has-icon-left">
          <label for="exampleInputPassword" class="sr-only">Password</label>
          <input type="password" id="exampleInputPassword" class="form-control" placeholder="Password" name="password">
          <div class="form-control-position">
            <i class="icon-lock"></i>
          </div>
         </div>
        </div>
       <div class="form-group">
        <input type="submit" name="submit" value="Sign In" class="btn btn-danger w-100">
       </div>
       </form>
       </div>
      </div>
    </div>
    <!--End Back To Top Button-->
  </div><!--wrapper-->

<?php include 'inc/footer_script.php'; ?>