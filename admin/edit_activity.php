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
				<div class = "alert alert-info">Activity/Update</div>
				<a class = "btn btn-success" href = "activity.php"><span class = "glyphicon glyphicon-hand-right"></span> Back</a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
						<div style = "width:40%; margin-left:32%;">	
						<?php
							$q_activity = $conn->query("SELECT * FROM `activity` WHERE `activity_id` = '$_REQUEST[activity_id]'") or die(mysqli_error());
							$f_activity = $q_activity->fetch_array();
						?>
						<form method = "POST" action = "edit_activity_query.php?activity_id=<?php echo $f_activity['activity_id']?>">	
							<div class = "form-group">
								<label>Title</label>
								<input type = "text" value = "<?php echo $f_activity['title']?>" class = "form-control" name = "title" />
							</div>
							<div class = "form-group">
								<label>Description</label>
								<textarea name = "description" style = "height:100px; resize:none;" class = "form-control"><?php echo $f_activity['description']?></textarea>
							</div>
							<div class = "form-inline">
								<label>Start</label>
								<input type = "date" value = "<?php echo $f_activity['start']?>" style = "width:41%;" class = "form-control"  name = "start"/>
								<label>End</label>
								<input type = "date" value = "<?php echo $f_activity['end']?>" style = "width:41%;" class = "form-control"  name = "end"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-warning form-control" name = "update_activity"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
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