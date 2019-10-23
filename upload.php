<?php

if (isset ( $_POST ["souvenirname"] ) && isset ( $_POST ["souvenirprice"]) && isset ( $_POST ["souvenirdescription"] )  && isset ( $_POST ["souvenirquantity"] ) && isset ( $_POST ["supplierid"] ) && isset ( $_POST ["categoryid"] )) {
    require_once 'class/User.class.php';
    $image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    
    $user = new User();
    
    $user->addSouvenir($_POST ["souvenirname"] , $_POST ["souvenirprice"],$_POST ["souvenirdescription"],$imgContent,$_POST ["souvenirquantity"],$_POST ["supplierid"],$_POST ["categoryid"]);
    
        header("Location: managesouvenir.php");
        exit;
   
    
    
}

?>