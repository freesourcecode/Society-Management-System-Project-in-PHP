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
				<div class = "alert alert-info">Accounts/Administrator/Update</div>
				<a class = "btn btn-success" href = "admin.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_admin = $conn->query("SELECT * FROM `admin` WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
							$f_admin = $q_admin->fetch_array();
						?>
							<form method = "POST" action = "edit_admin_query.php?admin_id=<?php echo $f_admin['admin_id']?>">	
								<div class = "form-group">
									<label>Username</label>
									<input type = "text" value = "<?php echo $f_admin['username']?>" class = "form-control"  name = "username"/>
								</div>
								<div class = "form-group">
									<label>Password</label>
									<input type = "password" value = "<?php echo $f_admin['password']?>" class = "form-control"  name = "password"/>
								</div>
								<div class = "form-group">
									<label>Name</label>
									<input type = "text" value = "<?php echo $f_admin['name']?>" class = "form-control"  name = "name"/>
								</div>
								<div class = "form-group">
									<button class = "btn btn-warning form-control" name = "update_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
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