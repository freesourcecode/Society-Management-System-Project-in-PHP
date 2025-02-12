<?php
	require_once '../connect.php';
	if(ISSET($_POST['transact_id'])){
		$payment = $_POST['payment'];
		$transact_id = $_POST['transact_id'];
		$balance = $_POST['balance'];
		$total = $balance - $payment;
		if($total == 0){
			$status = "Paid";
		}else{
			$status = "Balance";
		}
		if($payment > $balance){
			echo"high";
		}else{
			$conn->query("UPDATE `transaction` SET `payment` = payment+'$payment', `balance` = '$total', `status` = '$status' WHERE `transact_id` = '$transact_id'") or die(mysqli_error());
		} 
	}
?>