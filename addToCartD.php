<?php
session_start();
$pID = $_GET["pID"];
$quantity = $_GET["quantity"];
if (isset($_SESSION["pids_cart"])){
	$pids = $_SESSION["pids_cart"];
	$quantities = $_SESSION["quantities_cart"];
	if (in_array($pID, $pids)){
		
		$ind = array_search($pID, $pids);
		if($quantities[$ind]>1)
		{
		$quantities[$ind] = $quantities[$ind] - $quantity;
		$_SESSION["pids_cart"] = $pids;
		$_SESSION["quantities_cart"] = $quantities;
		}
	}
	
	
}



?>