<?php 
include 'config.php';
class front{
	//Database for conntecions
	public function dbcon()
	{
		$db = new Database();
		$conn = $db->connect();
		return $conn;
	}

	/*=======================
		View Product List ==*/
	public function product_list()
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

	/*=======================
		View Product List ==*/
	public function product_list_cat($cat)
	{
		//Get data from database
        $sql = "SELECT * FROM `product` WHERE `category` = $cat ORDER BY id DESC";
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
	/*===============================
		User Reg ==*/
	public function userReg($data)
	{
		//Get data from HTML form data
		$name     = mysqli_real_escape_string($this->dbcon(), $data['name']);
		$email    = mysqli_real_escape_string($this->dbcon(), $data['email']);
		$number   = mysqli_real_escape_string($this->dbcon(), $data['number']);
		$password = mysqli_real_escape_string($this->dbcon(), $data['password']);

		$email_check = "SELECT * FROM `users` WHERE `email` = '$email'";
        $users = mysqli_query($this->dbcon(), $email_check);

        $user_chk = mysqli_num_rows($users);

        if ($user_chk == 0) {
	        $sql      = "INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `status`, `points`, `type`, `created_at`, `created_by`) VALUES (NULL, '$name', '$email', '$number', '$password', '1', NULL, 'customer', CURRENT_TIMESTAMP, 'sazzad');";
			
			$add      = mysqli_query($this->dbcon(), $sql);

			if ($add) {
			$message  = "Registration successfully";
			return $message;
			} else {
			$message  = "Something went wrong";
	           return $message;
	        }
        }else{
        	$message  = "Email Already Used";
        	return $message;
        }
		
	}

	/*====================
		User login=======*/

	public function userlogin($data){
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
				$_SESSION["id"] = $users_array['id'];
				//header('location: profile.php?status=1');
				echo "<script>location.replace('profile.php?status=1')</script>";
			}else{
				$message  = "Please check your password.!!";
				return $message;
			}
		}else{
			$message  = "Email address not found.!!";
			return $message;
		}

	}

	/*===============================
		User helper ==*/
	public function users($id)
	{
		//Get data from database
        $sql = "SELECT * FROM users WHERE id = $id";
        $user = mysqli_query($this->dbcon(), $sql);
        $output = mysqli_fetch_assoc($user);
        return $output;
	}

	/*===============================
		User Reg ==*/
	public function oder_data($data)
	{
		//Get data from HTML form data
		$pro_id      = mysqli_real_escape_string($this->dbcon(), $data['pro_id']);
		$title       = mysqli_real_escape_string($this->dbcon(), $data['title']);
		$total_price = mysqli_real_escape_string($this->dbcon(), $data['total_price']);
		$quantity    = mysqli_real_escape_string($this->dbcon(), $data['quantity']);
		$table_no    = mysqli_real_escape_string($this->dbcon(), $data['table_no']);
		$user_id     = mysqli_real_escape_string($this->dbcon(), $data['user_id']);

		//Insert into database
		$sql = "INSERT INTO `orders` (`id`, `pro_id`, `pro_title`, `user_id`, `total`, `qty`, `table_no`, `status`, `created_at`, `created_by`) VALUES (NULL, '$pro_id', '$title', '$user_id', '$total_price', '$quantity', '$table_no', '0', CURRENT_TIMESTAMP, 'sazzad')";

		$order = mysqli_query($this->dbcon(), $sql);

        if ($order) {
           //header("Location: profile.php?ost=1");
           echo "<script>location.replace('profile.php?status=1')</script>";
			exit;
        } else {
           //header("Location: profile.php?ost=0");
        	echo "<script>location.replace('profile.php?status=0')</script>";
			exit;
        }       
		
	}

	/*===============================
		Profile Index ==*/

	public function ViewOrder($data)
	{
		 $user_id = $data;

		//Get data from database
        $sql = "SELECT * FROM `orders` WHERE `user_id` = $user_id AND `status` = 0";
        $result = mysqli_query($this->dbcon(), $sql);

        if ($result) {
            return $result;
        } else {
            echo "Something went wrong";
        }
	}
	/*===============================
		order List ==*/
	public function all_order($data)
	{
		 $user_id = $data;

		//Get data from database
        $sql = "SELECT * FROM `orders` WHERE `user_id` = $user_id";
        $result = mysqli_query($this->dbcon(), $sql);

        if ($result) {
            return $result;
        } else {
            echo "Something went wrong";
        }
	}
	/*===============================
		my Profile ==*/

	public function viewProfile($data)
	{
		 $user_id = $data;

		//Get data from database
        $sql = "SELECT * FROM `users` WHERE `id` = $user_id";
        $result = mysqli_query($this->dbcon(), $sql);

        if ($result) {
            return $result;
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

	
}
?>