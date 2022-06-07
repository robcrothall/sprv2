<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$form_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from history where id = ?", $form_id); 
	$event_date = $data[0]["event_date"];
	$event_id = $data[0]["id"]; 
	$place_id = $data[0]["place_id"]; 
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["surname"] . ", " . $data[0]["first_name"];
	$data = query("select place from places where id = ?", $place_id);
	$place = $data[0]["place"];
?>
<h2>Read about an event in history</h2>
  <div class="container">
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/history.php">Back</a>
   </div>
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $form_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Event date:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $event_date; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Place:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $place; ?></td>
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
				<td align="right" valign="top" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/history.php">Back</a>
   </div>
  </div>
