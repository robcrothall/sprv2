<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$form_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from history where id = ?", $form_id); 
	$_SESSION["selected_history_id"] = $form_id;
	$event_date = $data[0]["event_date"]; 
	$_SESSION["event_date"] = $event_date;
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This event is about to be deleted!</h2>
  <div class="container">
  <form action="../page/history_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Event date:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $event_date; ?></td>
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
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 

   <div class="form-actions">
   	<input type='submit' value='Delete' class='w3-button w3-red' />
      <a class="w3-button w3-green" href="../page/history.php">Cancel</a>
   </div>
  </div>
</form>