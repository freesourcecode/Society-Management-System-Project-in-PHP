<?php require_once 'connect.php'?>
<table id = "table" class = "table table-bordered">
	<thead>
		<tr>
			<th>Detail</th>
			<th>Price</th>
			<th>Sem</th>
			<th>A.Y</th>
			<th>Payment</th>
			<th>Balance</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
			session_start();
			if(ISSET($_SESSION['student_id'])){
			$q_transact = $conn->query("SELECT * FROM `transaction` LEFT JOIN `expense` ON transaction.transact_detail = expense.expense_id WHERE `student_id` = '$_SESSION[student_id]' && `status` = 'Paid' ORDER BY `ay` ") or die(mysqli_error());
			while($f_transact = $q_transact->fetch_array()){
		?>
		<tr>
			<td><?php echo $f_transact['detail']?></td>
			<td><?php echo $f_transact['price']?></td>
			<td><?php echo $f_transact['sem']?></td>
			<td><?php echo $f_transact['ay']?></td>
			<td><?php echo $f_transact['payment']?></td>
			<td><?php echo $f_transact['balance']?></td>
			<td><?php echo $f_transact['status']?></td>
		</tr>
		<?php
			}
		}
		?>
	</tbody>
</table>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>