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
	
}
?>