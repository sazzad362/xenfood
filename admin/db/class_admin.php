<?php 
include 'config.php';
class dashboard{
	//Database for conntecions
	public function dbcon()
	{
		$db = new Database();
		$conn = $db->connect();
		return $conn;
	}
	/* ================
		Add Product == */ 
	public function addProduct($data)
	{
		//Get data from HTML form data
		$title    = mysqli_real_escape_string($this->dbcon(), $data['title']);
		$price    = mysqli_real_escape_string($this->dbcon(), $data['price']);
		$details  = mysqli_real_escape_string($this->dbcon(), $data['details']);
		$category = mysqli_real_escape_string($this->dbcon(), $data['category']);
		//Insert into database
		$sql = "INSERT INTO `product` (`id`, `title`, `details`, `price`, `category`) VALUES (NULL, '$title', '$details', '$price', '$category');";
		$add = mysqli_query($this->dbcon(), $sql);
        if ($add) {
            $message = "Info save successfully";
            return $message;
        } else {
           $message = "Something went wrong";
           return $message;
        }
	}

	/* ================
		Add Category == */ 
	public function addCategory($data)
	{
		//Get data from HTML form data
		$cat_name    = mysqli_real_escape_string($this->dbcon(), $data['cat_name']);
		//Insert into database
		$sql = "INSERT INTO `category` (`id`, `name`) VALUES (NULL, '$cat_name');";
		$add = mysqli_query($this->dbcon(), $sql);
        if ($add) {
            $message = "Info save successfully";
            return $message;
        } else {
           $message = "Something went wrong";
           return $message;
        }
	}

	/*=======================
		View Category List ==*/
	public function ViewCategory()
	{
		//Get data from database
        $sql = "SELECT * FROM category ORDER BY name ASC";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*=======================
		View Product List ==*/
	public function ViewProduct()
	{
		//Get data from database
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*===============================
		Category name helper ==*/
	public function catName($id)
	{
		//Get data from database
        $sql = "SELECT * FROM category WHERE id = $id";
        $catname = mysqli_query($this->dbcon(), $sql);

        $cat_data = mysqli_fetch_assoc($catname);

        return $cat_data;
        
	}

	// Product Edit
	public function getproduct($id)
	{
		//Get data from database
        $sql = "SELECT * FROM `product` WHERE `id` = $id";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	// product update
	public function product_update($data)
	{
		//Get data from HTML form data
		$title    = mysqli_real_escape_string($this->dbcon(), $data['title']);
		$price    = mysqli_real_escape_string($this->dbcon(), $data['price']);
		$category = mysqli_real_escape_string($this->dbcon(), $data['category']);
		$details  = mysqli_real_escape_string($this->dbcon(), $data['details']);
		$id       = mysqli_real_escape_string($this->dbcon(), $data['edit_id']);

		//Insert into database
		$sql = "UPDATE `product` SET `title` = '$title', `details` = '$details', `price` = '$price', `category` = '$category' WHERE `product`.`id` = $id";
		$update = mysqli_query($this->dbcon(), $sql);
	        if ($update) {
				$message = "Info save successfully";
	            return $message;
	        } else {
	           $message = "Something went wrong";
	           return $message;
	        }
	}

	// Global Delete Functions
	public function GlobalDelete($id,$table)
	{
        $sql = "DELETE FROM `$table` WHERE id = '$id'";
            $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
              $location = $_SERVER['HTTP_REFERER'];
			echo "<script>location.replace('$location')</script>";
	
        } else { ?>
            <script>
            	alert("Can't Delete Data Try agian later");
            </script>
        <?php }
	}

	// Product Edit
	public function getcategory($id)
	{
		//Get data from database
        $sql = "SELECT * FROM `category` WHERE `id` = $id";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	// Category update
	public function category_update($data)
	{
		//Get data from HTML form data
		$cat_name    = mysqli_real_escape_string($this->dbcon(), $data['cat_name']);
		$id       = mysqli_real_escape_string($this->dbcon(), $data['edit_id']);

		//Insert into database
		$sql = "UPDATE `category` SET `name` = '$cat_name' WHERE `category`.`id` = $id";
		$update = mysqli_query($this->dbcon(), $sql);
	        if ($update) {
				$message = "Info save successfully";
	            return $message;
	        } else {
	           $message = "Something went wrong";
	           return $message;
	        }
	}

	/* ================
		Admin auth == */ 

	public function auth($data){
		$email       = mysqli_real_escape_string($this->dbcon(), $data['email']);
		$password    = mysqli_real_escape_string($this->dbcon(), $data['password']);
		
		$email_check = "SELECT * FROM `users` WHERE `email` = '$email'";
		$users       = mysqli_query($this->dbcon(), $email_check);

		$users_array = mysqli_fetch_assoc($users);
		$user_chk    = mysqli_num_rows($users);

		$dbpass = $users_array['password'];

		if ($user_chk > 0) {
			if ($dbpass == $password) {
				session_start();
				$_SESSION["admin_id"] = $users_array['id'];
				echo "<script>location.replace('dashboard.php')</script>";
			}else{
				$message  = "Please check your password.!!";
				return $message;
			}
		}else{
			$message  = "User not found.!!";
			return $message;
		}

	}

	/*=======================
		View users List ==*/
	public function allUser()
	{
		//Get data from database
        $sql = "SELECT * FROM users WHERE type = 'customer' ORDER BY id desc";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*=======================
		View All order List ==*/

	public function all_order()
	{
		//Get data from database
        $sql = "SELECT * FROM orders ORDER BY id desc";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*===============================
		user Name name helper ==*/
	public function user_name($id)
	{
		//Get data from database
		$sql       = "SELECT * FROM users WHERE id = $id";
		$user_name = mysqli_query($this->dbcon(), $sql);
		$user_data = mysqli_fetch_assoc($user_name);
        return $user_data;
	}

	/*===============================
		Pending Order List ==*/
	public function pending_order()
	{
		//Get data from database
        $sql = "SELECT * FROM orders  WHERE status = 0 ORDER BY id desc";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*===============================
		Complete order ==*/

	public function complete_order()
	{
		//Get data from database
        $sql = "SELECT * FROM orders  WHERE status = 1 ORDER BY id desc";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*===============================
		Order Details ==*/
	public function order_details($id)
	{
		//Get data from database
		$sql       = "SELECT * FROM orders WHERE id = $id";
		$orders = mysqli_query($this->dbcon(), $sql);
		$order_details = mysqli_fetch_assoc($orders);
        return $order_details;
	}
	/*===============================
		Order Status Update ==*/
	public function order_status($data)
	{
		//Get data from HTML form data
		$order_id = mysqli_real_escape_string($this->dbcon(), $data['order_id']);
		$user_id  = mysqli_real_escape_string($this->dbcon(), $data['user_id']);
		$amount   = mysqli_real_escape_string($this->dbcon(), $data['total']);


        //Insert into payment Table
		$sql = "INSERT INTO `payment` (`id`, `order_id`, `user_id`, `amount`, `status`) VALUES (NULL, '$order_id', '$user_id', '$amount', '1')";

		$payment = mysqli_query($this->dbcon(), $sql);

		//Update order status
		$update = "UPDATE orders SET `status` = '1' WHERE `orders`.`id` = $order_id;";

		$status_update = mysqli_query($this->dbcon(), $update);

        if ($update && $status_update) {
			$message = "Info save successfully";
            return $message;
        } else {
           $message = "Something went wrong";
           return $message;
        }

	}

	/*=======================
		transaction Data ==*/

	public function transaction()
	{
		//Get data from database
        $sql = "SELECT * FROM payment ORDER BY id desc";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}

	/*=======================
		For Dashboard ==*/

	public function recent_order()
	{
		//Get data from database
        $sql = "SELECT * FROM orders where status = 0 ORDER BY id desc LIMIT 20";
        $result = mysqli_query($this->dbcon(), $sql);
        if ($result) {
            $query_result = $result;
            return $query_result;
        } else {
            echo "Something went wrong";
        }
	}
	public function count_pending_order()
	{
		$datas = "SELECT * FROM `orders` WHERE status = 0";
        $pending_data = mysqli_query($this->dbcon(), $datas);

        $pending_rows = mysqli_num_rows($pending_data);

        return $pending_rows;
	}
	public function count_complete_order()
	{
		$datas = "SELECT * FROM `orders` WHERE status = 1";
        $complete_data = mysqli_query($this->dbcon(), $datas);

        $complete_rows = mysqli_num_rows($complete_data);

        return $complete_rows;
	}
	public function customer_count()
	{
		$datas = "SELECT * FROM `users` WHERE type = 'customer'";
        $customer = mysqli_query($this->dbcon(), $datas);

        $customer_count = mysqli_num_rows($customer);

        return $customer_count;
	}

}
?>