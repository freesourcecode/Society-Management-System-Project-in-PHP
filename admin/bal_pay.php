<?php
	require_once '../connect.php';
	$expense_id = $_POST['expenses_id'];
	$student_id = $_POST['student_id'];
	$q_price = $conn->query("SELECT * FROM `transaction` WHERE `transact_detail` = '$expense_id' && `student_id` = '$student_id'") or die(mysqli_error());
	$f_price = $q_price->fetch_array();
	echo json_encode($f_price);
?>