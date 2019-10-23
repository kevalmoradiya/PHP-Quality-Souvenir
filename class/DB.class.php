<?php


class DB{
	var $servername = "localhost";
	
	var $username = "moradk01";
	
	var $password = "31031993";
	
	var $db = "moradk01mysql3";
	
	var $conn;
	
	function __construct(){
	
	
	
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
	
		if ($this->conn->connect_error) {
	
			echo "cannot connect";
	
		}else{
	
			//echo "connected";
	
		}
	
	}
	
}
?>