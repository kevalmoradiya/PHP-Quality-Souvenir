<?php

session_start ();
if (isset($_SESSION["userID"])){
    header("Location: checkout.php"); 
    exit;
}
else {
    $_SESSION["redirect"] = "true";
    header("Location: login.php");
    exit;
    
}


?>
