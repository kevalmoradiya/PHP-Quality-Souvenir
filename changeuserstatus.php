<?php

if (isset ( $_POST ["userstatus"] )) {
    require_once 'class/User.class.php';
    
    
    $user = new User();
    
    $user->changeUserStatus($_GET ["userid"]);
    
    header("Location: disableuser.php");
    exit;
    
    
    
}

?>