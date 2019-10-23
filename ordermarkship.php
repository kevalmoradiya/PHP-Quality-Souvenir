<?php

if (isset ( $_POST ["shipped"] )) {
    require_once 'class/User.class.php';
    
    
    $user = new User();
    
    $user->markShipped($_GET ["orderid"]);
    
    header("Location: manageorder.php");
    exit;
    
    
    
}

?>