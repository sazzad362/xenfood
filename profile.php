<?php 
	include 'seasson.php';

	//Get data from Sesson
	$ses_username = $_SESSION["id"];

	include 'inc/header_script.php';
	include 'inc/menu.php';

	require_once 'admin/db/class_front.php';

	$extend       = new front();
	$query_result = $extend->ViewOrder($ses_username);

?>

<section id="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-4">
				<div>
					<h3>Welcome</h3>
				</div>
				<div>
					<a href="logout.php" class="text-danger">Logout</a>
				</div>
			</div>
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
			<div class="col-md-8 table-responsive">
				<table class="table table-bordered text-center">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Food Name</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Total</th>
				      <th scope="col">Status</th>
				      <th scope="col">Order At</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  		$i = 0;
				  		while($order = mysqli_fetch_assoc($query_result)){
				  			$i++;
				  	?>
				    <tr>
				      <th scope="row"> <?php echo $i ; ?> </th>
				      <td><?php echo $order['pro_title']; ?></td>
				      <td><?php echo $order['qty']; ?></td>
				      <td><?php echo $order['total']; ?></td>
				      <td><?php 
				      	if ($order['status'] == 0) {
				      		echo "Processing";
				      	}
				      ?></td>
				      <td><?php echo $order['created_at']; ?></td>
				    </tr>
				    <?php } ?>
				  </tbody>
				</table>
			</div><!-- right md 8 -->
		</div><!-- End Row -->
	</div> <!-- End Container  -->
</section>	

<?php include 'inc/footer.php' ?>
