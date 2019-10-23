<?php 

require_once( 'DB.class.php' );
session_start();

class User{
	var $id;
	var $email;
	var $password;
	var $name;
	var $db;
	

	public function __construct()
	{
		$this->db = new DB();
	}
	
	public function isUser($email, $password){
		$aSQL="SELECT * from user where UseEmail = '$email' and UsePassword = '$password' and UseStatus='enable'";
		$query = mysqli_query($this->db->conn, $aSQL);
		
		$rowcount = mysqli_num_rows($query);
		if ($rowcount > 0){
			return true;
		}
		return false;
	}
	public function isUserExist($email){
		$aSQL="SELECT * from user where UseEmail = '$email'";
		$query = mysqli_query($this->db->conn, $aSQL);
		
		$rowcount = mysqli_num_rows($query);
		if ($rowcount > 0){
			return true;
		}
		return false;
	}		
	public function login($email, $password){
		$aSQL="SELECT * from user where UseEmail = '$email' and UsePassword = '$password'";
		$query = mysqli_query($this->db->conn, $aSQL);
		while ($row = mysqli_fetch_array($query)){
			$this->id = $row["UserId"];
			$this->email = $row["UseEmail"];
			$this->password = $row["UsePassword"];
			$this->name = $row["UseFName"];
		}
	}
	public function registration($firstname,$lastname,$email,$phonenumber,$address,$password){
		$aSQL="insert into user (UseFName,UseLName,UsePno,UseEmail,UsePassword,UseStatus,UseAddress) values('$firstname','$lastname','$phonenumber','$email','$password','enable','$address')";
		mysqli_query($this->db->conn, $aSQL);
		
		
	}
	public function addSouvenir($souvenirname, $souvenirprice,$souvenirdescription,$souvenirimage,$souvenirquantity,$supplierid,$categoryid){
	    
	    $aSQL="insert into souvenir (SouName,SouPrice,SouDescription,SouImage,SouQuantity,SupplierId,CategoryId) values('$souvenirname','$souvenirprice','$souvenirdescription','$souvenirimage','$souvenirquantity','$supplierid','$categoryid')";
	    mysqli_query($this->db->conn, $aSQL);
	    
	    
	}
	public function addCategory($categoryname){
	    
	    $aSQL="insert into category (CatName) values('$categoryname')";
	    mysqli_query($this->db->conn, $aSQL);
	    
	    
	}
	public function addSupplier($suppliername,$supplierpno,$supplieremail){
	    
	    $aSQL="insert into supplier (SupName,SupPno,SupEmail) values('$suppliername','$supplierpno','$supplieremail')";
	    mysqli_query($this->db->conn, $aSQL);
	    
	    
	}
	public function markShipped($orderid){
	    
	    $aSQL="update userorder set OrdStatus='shipped' where OrderId='$orderid'";
	    mysqli_query($this->db->conn, $aSQL);
	    
	    
	}
	public function changeUserStatus($userid){
	    $users = array();
	    $aSQL="select UseStatus from user where UserId='$userid'";
	    $query=mysqli_query($this->db->conn, $aSQL);
	    while ($row = mysqli_fetch_array($query)){
	        $user = array($row["UseStatus"]);
	        array_push($users, $user);
	    }
	    
	    if($users[0][0]=='enable')
	    {
	        $bSQL="update user set UseStatus='disable' where UserId='$userid'";
	        mysqli_query($this->db->conn, $bSQL);
	    }
	    else {
	        $cSQL="update user set UseStatus='enable' where UserId='$userid'";
	        mysqli_query($this->db->conn, $cSQL);
	    }
	    
	    
	    
	}
	
	public function viewProducts(){
		$products = array();
		$aSQL="SELECT * from souvenir";
		$query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
		while ($row = mysqli_fetch_array($query)){
		    $product = array($row["SouName"],$row["SouPrice"],$row["SouImage"],$row["SouvenirId"],$row["SouDescription"],$row["SouQuantity"],$row["SupplierId"],$row["CategoryId"]);
			array_push($products, $product);
		}
		return $products;
	}
	public function viewCaProducts($catid){
	    $products = array();
	    $aSQL="SELECT SouName,SouPrice,SouImage,SouvenirId from souvenir where CategoryId='$catid'";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $product = array($row["SouName"],$row["SouPrice"],$row["SouImage"],$row["SouvenirId"]);
	        array_push($products, $product);
	    }
	    return $products;
	}
	public function viewSearchProducts($searchquery){
	    $products = array();
	    $aSQL="SELECT SouName,SouPrice,SouImage,SouvenirId from souvenir where SouName LIKE '$searchquery%' or SouDescription LIKE '$searchquery%'";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $product = array($row["SouName"],$row["SouPrice"],$row["SouImage"],$row["SouvenirId"]);
	        array_push($products, $product);
	    }
	    return $products;
	}
	public function Category(){
	    $categorys = array();
	    $aSQL="SELECT * from category";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $category = array($row["CategoryID"],$row["CatName"]);
	        array_push($categorys, $category);
	    }
	    return $categorys;
	}
	public function Supplier(){
	    $suppliers = array();
	    $aSQL="SELECT * from supplier";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $supplier = array($row["SupplierId"],$row["SupName"],$row["SupPno"],$row["SupEmail"]);
	        array_push($suppliers, $supplier);
	    }
	    return $suppliers;
	}
	public function RetriveUser(){
	    $users = array();
	    $aSQL="SELECT * from user where UserId='{$_SESSION['userID']}'";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $user = array($row["UserId"],$row["UseFName"],$row["UseLName"],$row["UsePno"],$row["UseEmail"],$row["UsePassword"],$row["UseStatus"],$row["UseAddress"]);
	        array_push($users, $user);
	    }
	    return $users;
	}
	public function RetriveAllUser(){
	    $users = array();
	    $aSQL="SELECT * from user";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $user = array($row["UserId"],$row["UseFName"],$row["UseLName"],$row["UsePno"],$row["UseEmail"],$row["UsePassword"],$row["UseStatus"],$row["UseAddress"]);
	        array_push($users, $user);
	    }
	    return $users;
	}
	public function RetriveOrder(){
	    $orders = array();
	    $aSQL="SELECT * from userorder where UserId='{$_SESSION['userID']}'";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $order = array($row["OrderId"],$row["OrdDate"],$row["OrdStatus"],$row["OrdSDate"],$row["OrdCost"]);
	        array_push($orders, $order);
	    }
	    return $orders;
	}
	public function RetriveAllOrder(){
	    $orders = array();
	    $aSQL="SELECT * from userorder";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $order = array($row["OrderId"],$row["UserId"],$row["OrdDate"],$row["OrdStatus"],$row["OrdSDate"],$row["OrdCost"]);
	        array_push($orders, $order);
	    }
	    return $orders;
	}
	public function RetriveOrderItem($OrdId){
	    $orderitems = array();
	    $aSQL="select souvenir.SouImage,souvenir.SouName,orderitem.OrdItemQ from souvenir,orderitem where souvenir.SouvenirId=orderitem.SouvenirId and orderitem.OrderId='$OrdId'";
	    $query = mysqli_query($this->db->conn, $aSQL) or die( mysqli_error($this->db->conn));
	    while ($row = mysqli_fetch_array($query)){
	        $orderitem = array($row["SouImage"],$row["SouName"],$row["OrdItemQ"]);
	        array_push($orderitems, $orderitem);
	    }
	    return $orderitems;
	}
	public function placeOrder(){
	   $aSQL="insert into userorder (UserId,OrdDate,OrdStatus,OrdSDate,OrdCost) values('{$_SESSION['userID']}',NOW(),'waiting',NOW(),'{$_SESSION['alltotal']}')";
	    mysqli_query($this->db->conn, $aSQL);
	    $last_id = mysqli_insert_id($this->db->conn);
	    
	    $pids = $_SESSION["pids_cart"];
	    $quantities = $_SESSION["quantities_cart"];
	    $i = 0;
	    
	    $p=sizeof($pids);
	    
	    while ($i < $p){
	    
	    $bSQL="insert into orderitem (OrderId,SouvenirId,OrdItemQ) values('$last_id','$pids[$i]','$quantities[$i]')";
	    mysqli_query($this->db->conn, $bSQL);
	   
	        $i += 1;
	    }
	    unset($_SESSION['pids_cart']);
	    unset($_SESSION['quantities_cart']);
	    unset($_SESSION['total']);
	    unset($_SESSION['gst']);
	    unset($_SESSION['alltotal']);
	    return TRUE;
	   
	    
	    
	    
	}
}
?>