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
				<div class = "alert alert-info">Accounts/Student</div>
				<button type = "button" id = "add_student" class = "btn btn-success"><span class = "glyphicon glyphicon-plus"></span> Add student</button>
				<button style = "display:none;" type = "button" id = "cancel_student" class = "btn btn-warning"><span class = "glyphicon glyphicon-hand-right"></span> Cancel</button>
				<br />
				<br />
				<div id = "s_table" class = "panel panel-default">
					<div  class = " panel-heading">	
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th>Student ID</th>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>
									<th>Year & Section</th>
									<th>Picture</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$s_query = $conn->query("SELECT * FROM `student`") or die(mysqli_error());
									while($s_fetch = $s_query->fetch_array()){	
								?>
								<tr>
									<td><?php echo $s_fetch['student_id']?></td>
									<td><?php echo $s_fetch['firstname']?></td>
									<td><?php echo $s_fetch['middlename']?></td>
									<td><?php echo $s_fetch['lastname']?></td>
									<td><?php echo $s_fetch['year']."-".$s_fetch['section']?></td>
									<td><center><img src ="<?php if($s_fetch['photo'] == "default.png"){echo "../images/".$s_fetch['photo'];}else{echo "../upload/".$s_fetch['photo'];}?>" height = "45px" width = "45px"/></center></td>
									<td><center><a href = "edit_student.php?id=<?php echo $s_fetch['id']?>" class = "btn btn-warning"><span class=  "glyphicon glyphicon-edit"></span> Update</a> <a href = "#" name = "<?php echo $s_fetch['id']?>" data-toggle = "modal" data-target = "#delete_student" class = "btn btn-danger id"><span class=  "glyphicon glyphicon-trash"></span> Delete</a></center></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>	
				</div>
				<div class = "modal fade" id = "delete_student" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
					<div class = "modal-dialog" role = "document">
						<div class = "modal-content ">
							<div class = "modal-body">
								<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
								<br />
								<center><a class = "btn btn-danger delete_student" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
							</div>
						</div>
					</div>
				</div>
				<div id = "s_form" style = "display:none;" class = "panel panel-default">
					<div  class = " panel-heading" >	
							<div class = "alert alert-success">Accounts/Student/Add new</div>
							<form method = "POST" enctype = "multipart/form-data" action = "add_student.php">
								<div class = "pull-left">
									<div id = "picture">
										<img onerror="this.src = '../images/default.png'" height = "200px" width = "200px" id="pic" src="#" />
									</div>
									<br />
									<div class = "form-group">
										<input type='file' onchange="readURL(this);" name = "image" />
									</div>
								</div>
								<div style = "width:40%; margin-left:32%;">	
									<div class = "form-group">
										<label>Student ID</label>
										<input type = "text" class = "form-control"  name = "student_id" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Firstname</label>
										<input type = "text" class = "form-control"  name = "firstname" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Middlename</label>
										<input type = "text" class = "form-control"  name = "middlename" placeholder = "Optional"/>
									</div>
									<div class = "form-group">
										<label>Lastname</label>
										<input type = "text" class = "form-control"  name = "lastname" required = "required"/>
									</div>
									<div class = "form-group">
										<label>Year</label>
										<select class = "form-control" name = "year" required = "required">
											<option>Please select an option</option>
											<option value = "I">I</option>
											<option value = "II">II</option>
											<option value = "III">III</option>
											<option value = "IV">IV</option>
										</select>
									</div>
									<div class = "form-group">
										<label>Section</label>
										<input type = "text" class = "form-control"  name = "section"/>
									</div>
									<div class = "form-group">
										<button class = "btn btn-primary form-control" name = "save_student"><span class = "glyphicon glyphicon-save"></span> Save</button>
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
<script src = "../js/bootstrap.js"></script>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
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
<script type = "text/javascript">
	$(document).ready(function(){
		$('.id').on('click', function(){
			$id = $(this).attr('name');
			$('.delete_student').on('click', function(){
				window.location = 'delete_student.php?id=' + $id;
			});
		});
	});
</script>
</html>