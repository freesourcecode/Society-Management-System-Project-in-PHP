<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_admin'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$name = $_POST['name'];
		$q_admin = $conn->query("SELECT * FROM `admin` WHERE `username` = '$username'") or die(mysqli_error());
		$v_admin = $q_admin->num_rows;
		if($v_admin > 0){
			echo '<script>alert("Username already taken");</script>';
			echo '<script>window.location = "edit_admin.php?admin_id=" +'.$_REQUEST['admin_id'].'</script>';
		}else{
			$conn->query("UPDATE `admin` SET `username` = '$username', `password` = '$password', `name` = '$name' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
			header('location:admin.php');
		}
	}
?>