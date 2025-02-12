<!DOCTYPE html>
<?php
	require_once 'session.php';
?>
<html lang = "eng">
	<head>
		<title>Information System Society Membership</title>
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php';?>
<!--------------------HEAD---------------------->
<!-------------------SIDEBAR------------------>
<?php include 'sidebar.php';?>
<!-------------------SIDEBAR------------------>

		<div id = "sidecontent" class = "well pull-right">
			<div class = "alert alert-info">Expenses</div>
			<button type = "button" id = "add_expenses" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Expenses</button>
			<button style = "display:none;" type = "button" id = "cancel_expenses" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
			<br />
			<br />
			<div id = "exp_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Price</th>
								<th>A.Y.</th>
								<th>Sem</th>
								<th>Deadline</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$exp_query = $conn->query("SELECT * FROM `expense`") or die(mysqli_error());
								while($exp_fetch = $exp_query->fetch_array()){
							?>
							<tr>
								<td><?php echo $exp_fetch['detail']?></td>
								<td><?php echo $exp_fetch['price']?></td>
								<td><?php echo $exp_fetch['ay']?></td>
								<td><?php echo $exp_fetch['sem']?></td>
								<td><?php echo date("M d, Y",strtotime($exp_fetch['deadline']))?></td>
								<td><center><a href = "edit_expenses.php?expenses_id=<?php echo $exp_fetch['expense_id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" data-toggle = "modal" data-target = "#delete_expenses" name = "<?php echo $exp_fetch['expense_id']?>" class = "btn btn-danger expenses_id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class = "modal fade" id = "delete_expenses" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger delete_expenses" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div id = "exp_form" style = "display:none;" class = "panel panel-default">
				<div  class = " panel-heading" >	
					<div class = "alert alert-success">Expenses/Add new</div>
					<div style = "width:40%; margin-left:32%;">	
						<form method = "POST" action = "add_expenses.php">	
							<div class = "form-group">
								<label>Detail</label>
								<input type = "text" class = "form-control" name = "detail" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Price</label>
								<input type = "number" min = "0" max = "999999" class = "form-control" name = "price" required = "required"/>
							</div>
							<div class = "form-inline">
								<label>A.Y</label>
								<input type = "number" min = "0" max = "9999" style = "width:20%;" class = "form-control"  name = "ay1" required = "required"/>
								-
								<input type = "number" min = "0" max = "9999" style = "width:20%;" class = "form-control"  name = "ay2" required = "required"/>
								<label>Sem</label>
								<select name = "sem" class = "form-control" required = "required">
									<option value = "">Choose an option</option>
									<option value = "1st">1st</option>
									<option value = "2nd">2nd</option>
									<option value = "Summer">Summer</option>
								</select>
							</div>
							<br />
							<div class = "form-inline">
								<label>Deadline</label>
								<br />
								<input type = "date"  name = "deadline" class = "form-control" required = "required"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-primary form-control" name = "save_expenses"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>	
					</div>	
				</div>
			</div>
		<br /><br /><br />
		<br /><br /><br />
		</div>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	
</body>	
<script src = "../js/jquery-3.1.1.js"></script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.expenses_id').on('click', function(){
			$expenses_id = $(this).attr('name');
			$('.delete_expenses').on('click', function(){
				window.location = 'delete_expenses.php?expenses_id=' + $expenses_id;
			});
		})
	});
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>