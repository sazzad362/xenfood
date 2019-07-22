<?php error_reporting(0);

	// Get user Login information
	session_start();
	$user_id = $_SESSION['id'];

	// Get our helper files
	include 'inc/header_script.php';
	include 'inc/menu.php';

	//Get Category ID

	$cat_id = $_GET['id'];

	//Database Query
	$extend      = new front();
    $query_result = $extend->product_list_cat($cat_id);
?>

<!-- =========================
		Product Area
========================== -->

<section id="products">
	<div class="container">
		<div class="row">
			<?php 
			  while($item = mysqli_fetch_assoc($query_result)){
			  $id = $item['id'];   			  
			?>
			<div class="col-md-4 mb-4">
				<div class="card card-cascade narrower sd_new_margin">
				  <!-- Card image -->
				  <div class="view view-cascade overlay">
				    <img  class="card-img-top" src="admin/uploads/<?php echo $item['thumb']; ?>" alt="Card image cap">
				    <a>
				      <div class="mask rgba-white-slight"></div>
				    </a>
				  </div>
				  <!-- Card content -->
				  <div class="card-body card-body-cascade">
				    <!-- Title -->
				    <h4 class="font-weight-bold card-title"><?php echo $item['title']; ?></h4>
				    <!-- Text -->
				    <p class="card-text"><?php echo $item['details']; ?></p>
				    <!-- Button -->
				    <form action="order.php" method="POST">
					    <div class="d-flex justify-content-between">
						    <div>
						    	<a class="btn btn-secondary btn-sm m-0">৳ <?php echo $item['price']; ?></a>
						    	<input type="hidden" name="price" value="<?php echo $item['price']; ?>">
						    	<input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
						    	<input type="hidden" name="product_title" value="<?php echo $item['title']; ?>">
						    </div>
						    <div class="quantity buttons_added">
								<input type="button" value="-" class="minus">
								<input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode="">
								<input type="button" value="+" class="plus">
							</div>
						    <div>
						    	<?php 
						    		if (!empty($user_id)) { ?>
						    			<input type="submit" class="btn btn-primary btn-sm m-0" value="Order">
						    	<?php }else{
						    		echo "<a href='login.php' class='btn btn-primary btn-sm m-0'>Order</a>";
						    	} ?>
						    </div>
						</div>
					</form>
				  </div>
				</div>
			</div> <!-- End Col md 4 -->
			<?php } ?>

		</div> <!-- End Row -->
	</div> <!-- End Container  -->
</section>

<!-- ============ Cart Area ====-->
<?php 
	if (!empty($user_id)) { ?>
		<div class="cart text-center">
			<div class="my_ac">
				<a href="profile.php"><i class="fa fa-user mr-2" aria-hidden="true"></i> My Account</a>
			</div>
		</div>
	<?php } else{ ?>
		<div class="cart text-center">
			<div class="my_ac">
				<a href="login.php"><i class="fa fa-user mr-2" aria-hidden="true"></i> My Account</a>
			</div>
		</div>
	<?php } ?>

<?php include 'inc/footer.php' ?>