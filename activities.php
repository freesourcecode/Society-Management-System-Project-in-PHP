<div id = "activities" class = "tab-pane fade">
	<img src = "images/calendar.png" class = "pull-left" height = "100" width = "100"/>
	<h2 class = "text-success pull-left">Activities</h2>
	<br style = "clear:both;"/>
	<hr style = "border-top:1px solid #000;"/>
	<h3 class = "text-primary"><?php echo date("M Y", strtotime("+8 HOURS"))?></h3>
	<br />
	<table class = "table table-hover">
		<?php
			$month = date("M", strtotime("+8 HOURS"));
			$year = date("Y", strtotime("+8 HOURS"));
			$q_activity = $conn->query("SELECT * FROM `activity` WHERE `month` = '$month' && `year` = '$year' ORDER BY `start`") or die(mysqli_error());
			while($f_activity = $q_activity->fetch_array()){
		?>
		<tr>
			<td><?php echo date("M d, Y", strtotime($f_activity['start']))." - ".date("M d, Y", strtotime($f_activity['end']))?></td>
			<td><?php echo $f_activity['title']?></td>
			<td><?php echo $f_activity['description']?></td>
		</tr>
		<?php
			}
		?>
	</table>
	
</div>