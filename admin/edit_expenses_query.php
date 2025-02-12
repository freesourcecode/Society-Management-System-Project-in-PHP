<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_expenses'])){
		$detail = $_POST['detail'];
		$price = $_POST['price'];
		$ay = $_POST['ay1']."-".$_POST['ay2'];
		$sem = $_POST['sem'];
		$deadline = $_POST['deadline'];
		$q_transact = $conn->query("SELECT * FROM `transaction` WHERE `transact_detail` = $_REQUEST[expenses_id]") or die(mysqli_error());
		$f_transact = $q_transact->fetch_array();
		$v_transact = $q_transact->num_rows;
		if($v_transact > 0){
			if($price > $f_transact['price']){
				$total = $price - $f_transact['price'];
				$total_bal = $total + $f_transact['balance'];
				echo $total_bal;
				$status = "Balance";
				$payment = $f_transact['payment'];
			}else{
				if($price == $f_transact['payment']){	
					$total_bal = 0;
					$payment = $f_transact['payment'];
					$status = "Paid";
				}else{
						if($f_transact['balance'] != 0){
							if($price < $f_transact['payment']){
								$payment = $price;
								$status = "Paid";
								$total_bal = 0;
							}else{
								$total_bal = $price - $f_transact['payment'];
								$status = "Balance";
								$payment = $f_transact['payment'];
							}	
						}else{
							$total_bal = 0;
							$payment = $price;
							$status = "Paid";
						}
				}		
			}
			$conn->query("UPDATE `transaction` SET `price` = '$price', `payment` = '$payment', `balance` = '$total_bal', `status` = '$status' WHERE `transact_detail` = '$_REQUEST[expenses_id]'") or die(mysqli_error());
			$conn->query("UPDATE `expense` SET `detail` = '$detail', `price` = '$price', `ay` = '$ay', `sem` = '$sem' WHERE `expense_id` = '$_REQUEST[expenses_id]'") or die(mysqli_error());
			header('location:expenses.php');
		}else{
			$conn->query("UPDATE `expense` SET `detail` = '$detail', `price` = '$price', `ay` = '$ay', `sem` = '$sem', `deadline` = '$deadline' WHERE `expense_id` = '$_REQUEST[expenses_id]'") or die(mysqli_error());
			header('location:expenses.php');
		}
	}
?>

