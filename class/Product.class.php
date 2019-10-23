<?php 

require_once( 'DB.class.php' );

class Product{
	var $id;
	var $title;
	var $price;
	var $image;
	var $description;
	var $db;

	
	public function Product($id){
		$this->db = new DB();
		$aSQL="SELECT * from souvenir where SouvenirId = $id";
		$query = mysqli_query($this->db->conn, $aSQL);
		while ($row = mysqli_fetch_array($query)){
			$this->id = $row["SouvenirId"];
			$this->title = $row["SouName"];
			$this->price = $row["SouPrice"];
			$this->image = $row["SouImage"];
			$this->description = $row["SouDescription"];
		}

	}
	
}
?>