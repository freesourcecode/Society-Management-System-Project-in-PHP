<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_student'])){
		$q_student = $conn->query("SELECT * FROM `student` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
		$f_student = $q_student->fetch_array();
		if($_FILES['image']['name'] == ""){
			$location = $f_student['photo'];
		}else{
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['name']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);
			move_uploaded_file($_FILES["image"]["tmp_name"], "../upload/" . $_FILES["image"]["name"]);
			$location =  $_FILES["image"]["name"];
		}
		$student_id = $_POST['student_id'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$year = $_POST['year'];
		$section = $_POST['section'];
		$conn->query("UPDATE `student` SET `student_id` = '$student_id', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `year` = '$year', `section` = '$section', `photo` = '$location' WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
		header('location:student.php');
		$conn->query("UPDATE `transaction` SET `student_id` = '$student_id' WHERE `student_id` = '$f_student[student_id]'");
	}
?>	