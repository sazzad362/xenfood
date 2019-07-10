<?php 
	include 'inc/header_script.php';
	include 'inc/menu.php';

	require_once 'admin/db/class_front.php';

    $message = "";
    if (isset($_POST['reg'])) {
      $reg = new front($_POST);
      $message = $reg->userReg($_POST);
  }
  if (isset($_POST['login'])) {
      $log = new front($_POST);
      $message = $log->userlogin($_POST);
  }

?>

<!-- =========================
		Login Area
========================== -->
<section id="login_reg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if ( !empty($message) ): ?>
					<p class="bg-success text-white p-3 sd_alert mt-3"> <?php echo "$message"; ?></p>
				<?php endif ?>
			</div>
			<div class="col-md-6">
				<div class="sd_login">
					<form action="" method="POST">
					  <div class="form-group">
					    <label for="emial">Email address</label>
					    <input name="email" type="email" class="form-control" id="emial" aria-describedby="emailHelp" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <button type="submit" name="login" class="btn btn-primary">Login</button>
					  or <a href="javascript:void(0)" class="text-dark" id="reg_show">Register Now</a>
					</form>
				</div>
			</div>
			<div class="col-md-6 ct_reg" style="display: block;">
				<div class="sd_login">
					<form action="" method="POST">
					  <div class="form-group">
					    <label for="name">Full Name</label>
					    <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name">
					  </div>
					  <div class="form-group">
					    <label for="emial">Email address</label>
					    <input name="email" type="email" class="form-control" id="emial" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label for="phone">Phone</label>
					    <input name="number" type="number" class="form-control" id="phone" placeholder="Enter Number">
					  </div>
					  <div class="form-group">
					    <label for="password">Password</label>
					    <input name="password" type="password" class="form-control" id="password" placeholder="Password">
					  </div>
					  <button type="submit" name="reg" class="btn btn-primary">Sign Up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include 'inc/footer.php' ?>
