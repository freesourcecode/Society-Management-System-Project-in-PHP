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
			<div class = "alert alert-info">Activities</div>
			<button type = "button" id = "add_activity" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add Activity</button>
			<button style = "display:none;" type = "button" id = "cancel_activity" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
			<br />
			<br />
			<div id = "act_table" class = "panel panel-default">
				<div  class = " panel-heading">	
					<table id = "table" class = "table table-bordered">
						<thead>
							<tr>
								<th>Title</th>
								<th>Description</th>
								<th>Start</th>
								<th>End</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$act_query = $conn->query("SELECT * FROM `activity`") or die(mysqli_error());
							while($act_fetch = $act_query->fetch_array()){
							?>
							<tr>
								<td><?php echo $act_fetch['title']?></td>
								<td><?php echo $act_fetch['description']?></td>
								<td><?php echo "<label class = 'text-info'>".date("M d, Y", strtotime($act_fetch['start']))."</label>"?></td>
								<td><?php echo "<label class = 'text-info'>".date("M d, Y", strtotime($act_fetch['end']))."</label>"?></td>
								<td><center><a href = "edit_activity.php?activity_id=<?php echo $act_fetch['activity_id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" data-toggle = "modal" data-target = "#delete_activity" name = "<?php echo $act_fetch['activity_id']?>" class = "btn btn-danger activity_id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</div>	
			</div>
			<div class = "modal fade" id = "delete_activity" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger delete_activity" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div id = "act_form" style = "display:none;" class = "panel panel-default">
				<div  class = " panel-heading" >	
					<div class = "alert alert-success">Activity/Add new</div>
					<div style = "width:40%; margin-left:32%;">	
						<form method = "POST" action = "add_activity.php">	
							<div class = "form-group">
								<label>Title</label>
								<input type = "text" class = "form-control" name = "title" required = "required"/>
							</div>
							<div class = "form-group">
								<label>Description</label>
								<textarea name = "description" style = "height:100px; resize:none;" class = "form-control" required = "required"></textarea>
							</div>
							<div class = "form-inline">
								<label>Start</label>
								<input type = "date" style = "width:41%;" class = "form-control"  name = "start" required = "required"/>
								<label>End</label>
								<input type = "date" style = "width:41%;" class = "form-control"  name = "end" required = "required"/>
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-primary form-control" name = "save_activity"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>	
					</div>	
				</div>
			</div>
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	})
</script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('.activity_id').on('click', function(){
			$activity_id = $(this).attr('name');
			$('.delete_activity').on('click', function(){
				window.location = 'delete_activity.php?activity_id=' + $activity_id;
			});
		})
	});
</script>
<script src = "../js/sidebar.js"></script>
<script src = "../js/script.js"></script>
</html>