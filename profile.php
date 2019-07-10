<?php 
	// include 'seasson.php';

	// //Get data from Sesson
	// $ses_username = $_SESSION["id"];
	
	// echo $ses_username;

	include 'inc/header_script.php';
	include 'inc/menu.php';

	require_once 'admin/db/class_front.php';

?>

<section id="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center mb-4">
				<h3>Welcome <b><i>Md Sazzad Hossain</i></b></h3>
			</div>
			<!-- ===============
					Account Details -->
			<div class="col-md-4">
				<div class="ls_grp">
					<ul class="list-group">
					  <li class="list-group-item"><a href="">My Profile</a></li>
					  <li class="list-group-item"><a href="">Order Items</a></li>
					  <li class="list-group-item"><a href="">Order History</a></li>
					  <li class="list-group-item"><a href="">Reviews</a></li>
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
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <th scope="row">1</th>
				      <td>Pasta Basta with exta beef</td>
				      <td>2</td>
				      <td>Cooking</td>
				    </tr>
				  </tbody>
				</table>
			</div><!-- right md 8 -->
		</div><!-- End Row -->
	</div> <!-- End Container  -->
</section>	

<?php include 'inc/footer.php' ?>
