<?php
session_start();
$pID = $_GET["pID"];
$quantity = $_GET["quantity"];
if (isset($_SESSION["pids_cart"])){
	$pids = $_SESSION["pids_cart"];
	$quantities = $_SESSION["quantities_cart"];
	if (in_array($pID, $pids)){
		$ind = array_search($pID, $pids);
		$quantities[$ind] = $quantities[$ind] + $quantity;
	}else {
		array_push($pids, $pID);
		array_push($quantities, $quantity);
	}
	$_SESSION["pids_cart"] = $pids;
	$_SESSION["quantities_cart"] = $quantities;
	
}else {
	$pids = array();
	$quantities = array();
	array_push($pids, $pID);
	array_push($quantities, $quantity);
	$_SESSION["pids_cart"] = $pids;
	$_SESSION["quantities_cart"] = $quantities;
}



?>