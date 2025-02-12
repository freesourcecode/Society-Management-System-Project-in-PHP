<option value = "">Choose an option</option>
<?php
	require_once '../connect.php';
	$v_expense = $q_expense->num_rows;
	$q_expense = $conn->query("SELECT * FROM `expense`") or die(mysqli_error());
	while($f_expense = $q_expense->fetch_array()){
		$q_transaction = $conn->query("SELECT * FROM `transaction` WHERE `transact_detail` = '$f_expense[expense_id]' && `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
		$v_transaction = $q_transaction->num_rows;
?>	
	<option style = "display:<?php if($v_transaction == 1){echo "none";}else{echo "block";}?>;" value = "<?php echo $f_expense['expense_id']?>"><?php echo $f_expense['detail']?></option>
<?php
	}
?>