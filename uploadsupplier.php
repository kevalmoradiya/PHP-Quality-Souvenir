<?php

if (isset ( $_POST ["suppliername"] ) && isset ( $_POST ["supplierpno"] ) && isset ( $_POST ["supplieremail"] )) {
    require_once 'class/User.class.php';
    
    
    $user = new User();
    
    $user->addSupplier($_POST ["suppliername"],$_POST ["supplierpno"],$_POST ["supplieremail"]);
    
    header("Location: managesupplier.php");
    exit;
    
    
    
}

?>