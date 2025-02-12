<?php
	require_once '../connect.php';
	if(ISSET($_POST['expenses_id'])){	
		$student_id = $_POST['student_id'];
		$expenses_id = $_POST['expenses_id'];
		$price = $_POST['price'];
		$payment = $_POST['payment'];
		$balance = $price - $payment;
		if($balance == 0){
			$status = "Paid";
		}else{
			$status = "Balance";
		}
		if($payment > $price){
			echo "high";
		}else{
			$conn->query("INSERT INTO `transaction` VALUES('', '$student_id', '$expenses_id', '$price', '$payment', '$balance', '$status')") or die(mysqli_error());
		}
	}
?>