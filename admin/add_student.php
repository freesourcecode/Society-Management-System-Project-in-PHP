<?php
	require_once '../connect.php';
	if(ISSET($_POST['save_student'])){	
			if($_FILES['image']['name'] == ""){
				$location = "default.png";
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
			$conn->query("INSERT INTO `student` VALUES('', '$student_id', '$firstname', '$middlename', '$lastname', '$year', '$section', '$location')") or die(mysqli_error());
			header("location:student.php");
	}
?>