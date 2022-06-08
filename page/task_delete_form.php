<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$rec_id = htmlspecialchars(strip_tags($form_id));
	$_SESSION["rec_id"] = $rec_id;
	$data = query("select * from tasks where id = ?", $rec_id); 
	$subject = $data[0]["subject"]; 
	$description = $data[0]["description"]; 
	$originator_id = $data[0]["originator_id"]; 
	$dept_id = $data[0]["dept_id"]; 
	$severity = $data[0]["severity"]; 
	$asset_id = $data[0]["asset_id"]; 
	$discipline = $data[0]["discipline"]; 
	$assigned_to = $data[0]["assigned_to"]; 
//	$date_assigned = $data[0]["date_assigned"]; 
	$project_id = $data[0]["project_id"]; 
	$type = $data[0]["type"]; 
//	$create_date = $data[0]["create_date"]; 
	$estimated_hours = $data[0]["estimated_hours"]; 
	$sched_date = $data[0]["sched_date"]; 
	$sched_time = $data[0]["sched_time"]; 
	$actual_date = $data[0]["actual_date"]; 
	$actual_time = $data[0]["actual_time"]; 
	$actual_hours = $data[0]["actual_hours"]; 
	$closed = $data[0]["closed"]; 
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
//	$create_id = $data[0]["create_id"]; 
//	$read_date = $data[0]["read_date"]; 
	$data = query("select surname, first_name from people where id = ?", $originator_id);
	$surname = $data[0]["surname"];
	$first_name = $data[0]["first_name"];
	$originator_name = $surname . ", " . $first_name;
	if($user_id < 10000) {$data = query("select username from users where id = ?", $user_id);}
	else {$data = query("select account_no as username from people where id = ?", $user_id - 10000);}
	$username = $data[0]["username"];
?>
<h2>This Task is about to be deleted!</h2>
  <div class="container">
  <form action="../page/task_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Task No:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $rec_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Summary:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $subject; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Description:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $description; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Severity:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $severity; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Discipline:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $discipline; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Type of Task:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $type; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Originator:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $originator_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $username; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
	</table> 

   <div class="form-actions">
   	<input type='submit' value='Delete' class='w3-button w3-red' />
      <a class="w3-button w3-green" href="../page/task.php">Cancel</a>
   </div>
  </div>
</form>