<?php

error_reporting(E_ALL);
ini_set('display_errors','On');
include 'class/DB.class.php';
$db=new DB();
$conn=$db->conn;
    
    //Get image data from database
    $query="SELECT SouImage FROM souvenir WHERE SouvenirId =1";
	$result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_array($result))  
		  {  
			 echo '<img src="data:image/jpeg;base64,'.base64_encode($row['SouImage']).'" height="200" width="200" class="img-thumnail" />';  
		  } 
   

?>