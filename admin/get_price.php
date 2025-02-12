<?php
	require_once '../connect.php';
	$expense_id = $_POST['expenses_id'];
	$q_price = $conn->query("SELECT * FROM `expense` WHERE `expense_id` = '$expense_id'") or die(mysqli_error());
	$f_price = $q_price->fetch_array();
	echo json_encode($f_price);
?>