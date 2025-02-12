<?php	
	session_start();
	$_SESSION['student_id'] = $_POST['student_id'];
	if(ISSET($_SESSION['student_id'])){
		require_once 'connect.php';
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