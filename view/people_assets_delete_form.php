<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$rec_id = htmlspecialchars(strip_tags($form_id));
	$_SESSION["rec_id"] = $rec_id;
	$data = query("select * from people_asset where id = ?", $rec_id); 
	$people_id = $data[0]["people_id"]; 
	$asset_id = $data[0]["asset_id"]; 
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select surname, first_name from people where id = ?", $people_id);
	$surname = $data[0]["surname"];
	$first_name = $data[0]["first_name"];
	$originator_name = $surname . ", " . $first_name;
	$data = query("select asset_name from asset where id = ?", $asset_id);
	$asset_name = $data[0]["asset_name"];
	if($user_id < 10000) {$data = query("select username from users where id = ?", $user_id);}
	else {$data = query("select account_no as username from people where id = ?", $user_id - 10000);}
	$username = $data[0]["username"];
?>
<h2>This link is about to be deleted!</h2>
  <div class="container">
  <form action="../page/people_assets_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Originator:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $originator_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Asset:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $asset_name; ?></td>
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
      <a class="w3-button w3-green" href="../page/people_assets.php">Cancel</a>
   </div>
  </div>
</form>