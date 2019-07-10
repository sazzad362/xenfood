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
				header('location: profile.php?status=1');
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

	
}
?>