<!DOCTYPE html>
<?php
	require 'connect.php';
?>
<html lang = "en">
	<head>
		
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
<body>
<!--------------------HEAD---------------------->
<?php include'head.php'?>
<!--------------------HEAD---------------------->
<br />
<br />
<br />
<?php
	$date = date("Y-m-d", strtotime("+8 HOURS"));
	$q_activity = $conn->query("SELECT * FROM `activity` WHERE '$date' BETWEEN `start` AND `end`") or die(mysqli_error());
	$f_activity = $q_activity->fetch_array();
	$v_activity = $q_activity->num_rows;
	if($v_activity > 0){	
		echo '<marquee><h4 class = "text-danger">'.$f_activity['title'].' - '.$f_activity['description'].'</h4></marquee>';
	}
?>
	<div id = "transaction" style = "display:none; width:900px; margin-left:18%; position:fixed; z-index:1;">
		<div class = "alert alert-info">
			<span style = "cursor:pointer;" class = "close pull-right glyphicon glyphicon-remove"></span>
			<h3>Transaction Details</h3>
			<hr style = "border-top:1px dotted #000;"/>
			<a class = "balance">Balance</a> | <a class = "paid">Paid</a>
			<br /><br />
			<div id = "load_data"></div>
		</div>
	</div>
	<div class = "container-fluid" id = "content">	
		<div class = "row" style = "margin-top:-120px;">	
			<div class = "col-md-3 well" id = "student_content">	
				<?php
					session_start();
					if(!ISSET($_SESSION['student_id'])){
						echo'
							<div class = "alert alert-info">Student Login</div>
							<form>	
								<div class = "form-group">
									<label>Student ID</label>
									<input type = "number" min = "0" max = "99999999" id = "student_id" class = "form-control"/>
								</div>
								<br />
								<div class = "form-group">
									<button type = "button" class = "btn btn-primary form-control" id = "student_login">Login</button>
								</div>
							</form>	
						';
					}else{
						$q_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$_SESSION[student_id]'") or die(mysqli_error());
						$f_student = $q_student->fetch_array();
						if($f_student['photo'] == "default.png"){
							$photo = "images/default.png";
						}else{
							$photo = 'upload/'.$f_student['photo'];
						}
						echo'
							<div class = "pull-left">
								<img src = "'.$photo.'" height = "75px" width = "75px"/>
							</div>
							<div style = "width:200px; padding:10px; word-wrap:break-word;" class = "pull-left">
								<label class = "text-success">'.$f_student['firstname'].' '.$f_student['lastname'].'</label>
								<br />
								<label class = "text-success">'.$f_student['year'].''.$f_student['section'].'</label>
							</div>
							<br style = "clear:both;"/>
							<hr style = "border-top:1px solid #000;"/>
							<a class = "pull-left btn_transact" style = "cursor:pointer;">View Transaction</a>
							<a class = "pull-right logout" style = "cursor:pointer;">Logout</a>
						';
					}	
				?>	
			</div>	
			<div class = "col-md-8 well pull-right">
				<ul class="nav nav-tabs">
					
					<li><a href="#activities" data-toggle = "tab">Activities</a></li>
				</ul>
				<br />
				<div class = "tab-content container-fluid">
					<?php
						
						include	'activities.php';
					?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<br />
	<br />
	
</body>	
<script src = "js/jquery-3.1.1.js"></script>
<script src = "js/script.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.min.js"></script>
</html>