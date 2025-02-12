<!DOCTYPE html>
<?php
	require_once 'session.php';
	require_once '../connect.php';
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

<!-------------------SIDEBAR0------------------>
<?php include 'sidebar.php';?>
<!-------------------SIDEBAR0------------------>

		<div id = "sidecontent" class = "well pull-right">
				<div class = "alert alert-info">Expenses/Update</div>
				<a class = "btn btn-success" href = "expenses.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_expenses = $conn->query("SELECT * FROM `expense` WHERE `expense_id` = '$_REQUEST[expenses_id]'") or die(mysqli_error());
							$f_expenses = $q_expenses->fetch_array();
						?>
						<form method = "POST" action = "edit_expenses_query.php?expenses_id=<?php echo $f_expenses['expense_id']?>">	
							<div class = "form-group">
								<label>Detail</label>
								<input type = "text" class = "form-control" name = "detail" value = "<?php echo $f_expenses['detail']?>" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Price</label>
								<input type = "number" min = "0" max = "999999" class = "form-control" name = "price" value = "<?php echo $f_expenses['price']?>" required = "required"/>
							</div>
							<div class = "form-inline">
								<label>A.Y</label>
								<input type = "number" min = "0" max = "9999" style = "width:20%;" class = "form-control" value = "<?php echo substr($f_expenses['ay'], 0, 4)?>" name = "ay1" required = "required"/>
								-
								<input type = "number" min = "0" max = "9999" style = "width:20%;" class = "form-control" value = "<?php echo substr($f_expenses['ay'], 5, 10)?>"  name = "ay2" required = "required"/>
								<label>Sem</label>
								<select name = "sem" class = "form-control" required = "required">
									<option value = "">Choose an option</option>
									<option <?php if($f_expenses['sem'] == "1st"){echo "selected";}?> value = "1st">1st</option>
									<option <?php if($f_expenses['sem'] == "2nd"){echo "selected";}?> value = "2nd">2nd</option>
									<option <?php if($f_expenses['sem'] == "Summer"){echo "selected";}?> value = "Summer">Summer</option>
								</select>
							</div>
							<br />
							<div class = "form-inline">
								<label>Deadline</label>
								<br />
								<input type = "date" value = "<?php echo $f_expenses['deadline']?>" name = "deadline" class = "form-control" required = "required"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-warning form-control" name = "update_expenses"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
							</div>
						</form>	
						</div>	
					</div>
				</div>
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
<script src = "../js/script.js"></script>
</html>