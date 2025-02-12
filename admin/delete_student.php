<?php
	require_once '../connect.php';
	$conn->query("DELETE FROM `student` WHERE id = '$_REQUEST[id]'") or die(mysqli_error());
	header('location:student.php');
?>