<?php 
	include 'seasson.php';

	//Get data from Sesson
	$ses_username = $_SESSION["id"];

	include 'inc/header_script.php';
	include 'inc/menu.php';

	require_once 'admin/db/class_front.php';

	$extend       = new front();
	$query_result = $extend->viewProfile($ses_username);

	$profile = mysqli_fetch_assoc($query_result);

?>

<section id="products">
	<div class="container">
		<div class="row">
			<!-- ===============
					Account Details -->
			<div class="col-md-4">
				<div class="ls_grp">
					<ul class="list-group">
					  <li class="list-group-item"><a href="my_profile.php">My Profile</a></li>
					  <li class="list-group-item"><a href="profile.php">Order Items</a></li>
					  <li class="list-group-item"><a href="all_order.php">Order History</a></li>
					</ul>
				</div>
			</div><!-- leff md-4 -->
			<div class="col-md-8">
				<form action="" method="POST" class="bg_my_profile">
				  <div class="form-group">
				    <label for="name">Full Name</label>
				    <input name="name" type="text" class="form-control" id="name" value="<?php echo $profile['name']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="emial">Email address</label>
				    <input name="email" type="email" class="form-control" id="emial" value="<?php echo $profile['email']; ?>" readonly>
				  </div>
				  <div class="form-group">
				    <label for="phone">Phone</label>
				    <input name="number" type="number" class="form-control" id="phone" value="<?php echo $profile['phone']; ?>">
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input name="password" type="password" class="form-control" id="password" value="<?php echo $profile['password']; ?>">
				  </div>
				  <button type="submit" name="reg" class="btn btn-primary w-100 ml-0">Update Profile</button>
				</form>
			</div><!-- right md 8 -->
		</div><!-- End Row -->
	</div> <!-- End Container  -->
</section>	

<?php include 'inc/footer.php' ?>
