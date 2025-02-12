<?php
	require_once '../connect.php';
	$student_id = $_POST['student_id'];
	$q_student = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$student_id'") or die(mysqli_error());
	$v_student = $q_student->num_rows;
	if($v_student > 0){
		echo "Success";
	}else{
		echo "Fail";
	}
?>