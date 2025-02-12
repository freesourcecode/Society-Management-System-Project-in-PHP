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
				<div class = "alert alert-info">Accounts/Student/Update</div>
				<a class = "btn btn-warning" href = "student.php"><span class = "glyphicon glyphicon-hand-right"> Back</span></a>
				<br />
				<br />
				<div class = "panel panel-default">
					<div  class = " panel-heading" >	
							<?php
								$q_student = $conn->query("SELECT * FROM `student` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
								$f_student = $q_student->fetch_array();
							?>
							<form method = "POST" enctype = "multipart/form-data" action = "edit_student_query.php?id=<?php echo $f_student['id']?>">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '<?php if($f_student['photo'] == "default.png"){echo "../images/".$f_student['photo'];}else{echo "../upload/".$f_student['photo'];}?>'" height = "200px" width = "200px" id="pic" src="#" />
									</div>
									<br />
									<div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image" />
									</div>
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>Student ID</label>
										<input type = "text" class = "form-control"  name = "student_id" value = "<?php echo $f_student['student_id']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Firstname</label>
										<input type = "text" class = "form-control"  name = "firstname" value = "<?php echo $f_student['firstname']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Middlename</label>
										<input type = "text" class = "form-control"  name = "middlename" value = "<?php echo $f_student['middlename']?>" placeholder = "Optional"/>
									</div>
									<div class = "form-group">
										<label>Lastname</label>
										<input type = "text" class = "form-control"  name = "lastname" value = "<?php echo $f_student['lastname']?>" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Year</label>
										<select class = "form-control" name = "year" required = "required">
											<option>Please select an option</option>
											<option <?php if($f_student['year'] == "I"){echo "selected";}?> value = "I">I</option>
											<option <?php if($f_student['year'] == "II"){echo "selected";}?> value = "II">II</option>
											<option <?php if($f_student['year'] == "III"){echo "selected";}?> value = "III">III</option>
											<option <?php if($f_student['year'] == "IV"){echo "selected";}?> value = "IV">IV</option>
										</select>
									</div>
									<div class = "form-group">
										<label>Section</label>
										<input type = "text" value = "<?php echo $f_student['section']?>" class = "form-control"  name = "section"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-warning form-control" name = "update_student"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
									</div>
								</div>	
							</form>		
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
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pic')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200)
						.css('display', 'block');
					$('.pic_hide').hide();
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
</html>