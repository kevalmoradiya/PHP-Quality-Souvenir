<?php
session_start();
$pID = $_GET["pID"];
if (isset($_SESSION["pids_cart"])){
	$pids = $_SESSION["pids_cart"];
	$quantities = $_SESSION["quantities_cart"];
	if (in_array($pID, $pids)){
		
		
		$ind = array_search($pID, $pids);
		array_splice($pids, $ind, 1);
		array_splice($quantities, $ind, 1);
		
		$_SESSION["pids_cart"] = $pids;
		$_SESSION["quantities_cart"] = $quantities;
		
	}
	
	
}



?>