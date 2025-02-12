<?php
	require_once '../connect.php';
	if(ISSET($_POST['update_activity'])){
		$title = $_POST['title'];
		$description = $_POST['description'];
		$start = $_POST['start'];
		$end = $_POST['end'];
		$month = date("M", strtotime($_POST['start']));
		$year = date("Y", strtotime($_POST['start']));
		$conn->query("UPDATE `activity` SET `title` = '$title', `description` = '$description', `start` = '$start', `end` = '$end', `month` = '$month', `year` = '$year' WHERE `activity_id` = '$_REQUEST[activity_id]'") or die(mysqli_error());
		header('location:activity.php');
	}
?>