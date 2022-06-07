<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$parms_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from parms_char where id = ?", $parms_id); 
	$_SESSION["parms_char_id"] = $parms_id;
	$parm_name = $data[0]["parm_name"]; 
	$_SESSION["parm_name"] = $parm_name;
	$parm_value = $data[0]["parm_value"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This parameter pair is about to be deleted!</h2>
  <div class="container">
  <form action="../page/parms_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Parameter Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $parm_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Parameter Value:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $parm_value; ?></td>
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
      <a class="w3-button w3-green" href="../page/parms.php">Cancel</a>
   </div>
  </div>
</form>