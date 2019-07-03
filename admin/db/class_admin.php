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
	// Add Product
	public function addProduct($data)
	{
		//Get data from HTML form data
		$title    = mysqli_real_escape_string($this->dbcon(), $data['title']);
		$price    = mysqli_real_escape_string($this->dbcon(), $data['price']);
		$details  = mysqli_real_escape_string($this->dbcon(), $data['details']);
		$category = mysqli_real_escape_string($this->dbcon(), $data['category']);
		//Insert into database
		$sql = "INSERT INTO `products` (`id`, `title`, `price`, `category`, `details`) VALUES (NULL, '$title', '$price', '$category', '$details');";
		$add = mysqli_query($this->dbcon(), $sql);
        if ($add) {
            $message = "Info save successfully";
            return $message;
        } else {
           $message = "Something went wrong";
           return $message;
        }
	}
}
?>