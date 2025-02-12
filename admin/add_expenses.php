<?php
	require_once '../connect.php';
	if(ISSET($_POST['save_expenses'])){
		$detail = $_POST['detail'];
		$price = $_POST['price'];
		$ay = $_POST['ay1']."-".$_POST['ay2'];
		$sem = $_POST['sem'];
		$deadline = $_POST['deadline'];
		$conn->query("INSERT INTO `expense` VALUES('', '$detail', '$price', '$ay', '$sem', '$deadline')") or die(mysqli_error());
		header('location: expenses.php');
	}
?>