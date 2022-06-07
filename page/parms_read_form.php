<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$parm_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from parms_char where id = ?", $parm_id); 

	$parm_name = $data[0]["parm_name"]; 
	$parm_value = $data[0]["parm_value"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["first_name"] . " " . $data[0]["surname"];
?>
<h2>Read about a parameter pair</h2>
  <div class="container">
   <a class="w3-button w3-green" href="../page/parms.php">Back</a>
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $parm_id; ?></td>
	      </tr>
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
				<td align="left" width="70%"><?php echo $username . ' - ' . $user_name_given; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
	</table> 
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/parms.php">Back</a>
   </div>
  </div>
