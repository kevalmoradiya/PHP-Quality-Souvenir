<?php

if (isset ( $_POST ["firstname"] ) && isset ( $_POST ["lastname"]) && isset ( $_POST ["email"] ) && isset ( $_POST ["phonenumber"] ) && isset ( $_POST ["address"] ) && isset ( $_POST ["password"] )) {	
require_once 'class/User.class.php';
	
$user = new User();
	if($user->isUserExist($_POST ["email"])){
	echo "Email already exist.";
		header("Location: registration.php"); 
	}
	else{
		$user->registration($_POST ["firstname"], $_POST ["lastname"],$_POST ["email"],$_POST ["phonenumber"],$_POST ["address"],$_POST ["password"]);
		
		header("Location: login.php"); 
    exit;
		
	}
}else{
	header("Location: registration.php"); 
    exit;
}

?>
