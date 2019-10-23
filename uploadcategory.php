<?php

if (isset ( $_POST ["categoryname"] )) {
    require_once 'class/User.class.php';
    
    
    $user = new User();
    
    $user->addCategory($_POST ["categoryname"]);
    
    header("Location: managecategory.php");
    exit;
    
    
    
}

?>