<?php 
	
	include 'inc/header_script.php';
	include 'inc/menu.php';

	// Get user id form seasson
	include 'seasson.php';
	$user_id = $_SESSION['id'];

	require_once 'admin/db/class_front.php';

	$price         = $_POST['price'];
	$quantity      = $_POST['quantity'];
	$product_id    = $_POST['product_id'];
	$product_title = $_POST['product_title'];

	$total_price = $price * $quantity;

    if (isset($_POST['order'])) {
      $order = new front($_POST);
      $message = $order->oder_data($_POST);
  }

?>

<section id="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="card mt-4">
				<div class="card-header text-uppercase">Order Summary</div>
					<div class="card-body">
					   <form action="" method="post" accept-charset="utf-8">
							<div class="form-group">
							    <label>Food Name</label>
							    <input name="title" type="text" onclick="this.select();" class="form-control" value="<?php echo $product_title; ?>" readonly>
							    <input name="pro_id" type="hidden" onclick="this.select();" class="form-control" value="<?php echo $product_id; ?>" readonly>
							 </div>
							<div class="row">
								<div class="form-group col-md-3">
									<label>Price</label>
									<input name="price" type="text" onclick="this.select();" class="form-control" value="<?php echo $price; ?>" readonly>
								</div>
								<div class="form-group col-md-3">
									<label>Quantity</label>
									<input name="quantity" type="text" onclick="this.select();" class="form-control" value="<?php echo $quantity; ?>" readonly>
								</div>
								<div class="form-group col-md-6">
									<label>Total</label>
									<input name="total_price" type="text" onclick="this.select();" class="form-control" value="<?php echo $total_price; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="font-weight-bold">Table Number</label>
								<select class="form-control" name="table_no" required autocomplete="OFF">
							      <option value="">Select Table</option>
							      <option>1</option>
							      <option>2</option>
							      <option>3</option>
							      <option>4</option>
							      <option>5</option>
							      <option>6</option>
							      <option>7</option>
							    </select>

								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
							</div>
					     <button class="btn btn-primary btn-block waves-effect waves-light mt-4" type="submit" name="order" value="Save User">Confirm Order</button>
					   </form>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- End Container  -->
</section>	

<?php include 'inc/footer.php' ?>
