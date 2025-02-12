<?php
	require_once '../connect.php';
	if(ISSET($_POST['save_admin'])){	
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$a_query = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$a_valid = $a_query->num_rows;
		if($a_valid > 0){
			echo "<script>alert('Username already taken')</script>";
			echo "<script>window.location = 'admin.php'</script>";
		}else{
			$conn->query("INSERT INTO `admin` VALUES('', '$username', '$password', '$name')") or die(mysqli_error());
			header('location:admin.php');
		}
	}	
?>