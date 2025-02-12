<option value = "">Choose an option</option>
<?php
	require_once '../connect.php';
	$q_transact = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `expense` WHERE `status` = 'Balance' && `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
	while($f_transact = $q_transact->fetch_array()){
?>
<option value = "<?php echo $f_transact['transact_detail']?>"><?php echo $f_transact['detail']?></option>
<?php
	}
?>