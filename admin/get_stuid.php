<?php	
	require_once '../connect.php';
	$q_student = $conn->query("SELECT * FROM `student` WHERE student_id = '$_REQUEST[student_id]'") or die(mysqli_error());
	$f_student = $q_student->fetch_array();
?>
<input type = "hidden" id = "student_id" value = "<?php echo $f_student['student_id']?>"/>
<img style = "margin:20px;" class = "pull-left" src = "<?php if($f_student['photo'] == "default.png"){echo "../images/".$f_student['photo'];}else{echo "../upload/".$f_student['photo'];}?>" height = "150px" width = "150px"/>
<div style = "padding:20px; margin-left:50px;" class = "col-md-8 alert-success">	
	<table class = "table">	
		<tr>
			<td><label>Student ID:</label></td><td><label class = "text-danger"><?php echo $f_student['student_id']?></label></td>
		</tr>
		<tr>
			<td><label>Name:</label></td><td><label class = "text-danger"><?php echo $f_student['firstname']." ".$f_student['lastname']?></label></td>
		</tr>
		<tr>
			<td><label>Year/Section:</label></td><td><label class = "text-danger"><?php echo $f_student['year']."-".$f_student['section']?></label></td>
		</tr>
	</table>
</div>
<br style = "clear:both;"/>
<br />
<div class = "row">
	<div class = "col-md-3"></div>
	<div class = "col-md-7 well">
		<form method = "POST">
		<div class = "form-inline">
			<div class = "pull-left">	
				<label>Expenses:</label>
				<select class = "form-control expenses"  disabled = "disabled"  required = "required">
					<option value = "">Choose an option</option>
				</select>
			</div>
			<div class = "pull-right">	
				<label>Status:</label>
				<select class = "form-control status" required = "required">
					<option value = "">Choose an option</option>
					<option>Balance</option>
					<option>Available</option>
				</select>
			</div>
			<br style = "clear:both;"/>
			<br/>
			<div id = "result2">	
				<div class = "form-inline">
					<div class = "pull-left">	
						<label>Price:</label>
						<input type = "number" class = "form-control price" disabled = "disabled"/>
					</div>
					<div id = "deadline" style = "" class = "pull-right">	
						<label>Deadline:</label>
						<input type = "date" class = "form-control deadline" disabled = "disabled"/>
					</div>
					<br />
					<br />
					<br />
					<div class = "pull-left form-inline">	
						<label>Payment:</label>
						<input type = "number" min = "0" class = "form-control payment" />
						<div id = "p_error"></div>
					</div>
					<div style = "display:none;" id = "bal">
						<div class = "pull-right">
							<label>Balance:</label>
							<input type = "number" class = "form-control" id = "balance" disabled = "disabled"/>
						</div>
					</div>	
				</div>
			</div>
			<br />
			<br />
			<br style = "clear:both;"/>
			<div class = "form-group">
				<button type = "button" id = "btn_cash" class = "btn btn-primary form-control"><span class = "glyphicon glyphicon-bitcoin"></span> Cash Invoice</button>
			</div>
		</div>
		</form>
	</div>
</div>
<script src = "../js/script1.js"></script>