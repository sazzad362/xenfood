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
           function goback()
		{
			header("Location: {$_SERVER['HTTP_REFERER']}" );
			exit;
		}
	goback();
        } else { ?>
            <script>
            	alert("Can't Delete Data Try agian later");
            </script>
        <?php }
	}

}
?>