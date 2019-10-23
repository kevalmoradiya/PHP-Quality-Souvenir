<?php
session_start ();

if (isset ( $_SESSION["userID"] )) {
	header("Location: index.php"); 
    exit;
} 
else if (isset ( $_POST ["email"] ) && isset ( $_POST ["password"] )) {
	require_once 'class/User.class.php';
	$user = new User();
	if ($user->isUser($_POST ["email"], $_POST ["password"])){		
		$user->login($_POST ["email"], $_POST ["password"]);
		$_SESSION["userID"] = $user->id;
		$_SESSION["email"] = $user->email;
		$_SESSION["password"] = $user->password;
		$_SESSION["name"] = $user->name;
		echo $user->name;
		if(isset ( $_SESSION["redirect"])){
		    
		    unset($_SESSION['redirect']);
		    header("Location: checkout.php"); 
		    exit;
		}
		else {
		    header("Location: index.php"); 
		    exit;
		}
		
   
		
	}else{
		echo "wrong login";
		header("Location: login.php"); 
    exit;
		
	}
}else{
	header("Location: login.php"); 
    exit;
}

?>
