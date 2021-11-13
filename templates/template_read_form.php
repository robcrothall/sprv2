<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$%name%_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select a.*, b.%lookupName% from %table% a, %lookupTable% b where a.%lookupName%_id = b.id and a.id = ?", $%name%_id); 
	$%name% = $data[0]["%name%"];
	$%lookupName%_id = $data[0]["%lookupName%_id"]; 
	$%lookupName% = $data[0]["%lookupName%"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Read about a %title%</h2>
  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">%title% name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $%name%; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">%lookupTitle% name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $%lookupName%; ?></td>
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
      <a class="btn btn-success" href="../ctl/%name%.php">Back</a>
   </div>
  </div>
