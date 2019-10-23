<?php

session_start();

if (isset($_SESSION["quantities_cart"])){
	echo array_sum($_SESSION["quantities_cart"]);
}else{
	echo "0";
}

?>