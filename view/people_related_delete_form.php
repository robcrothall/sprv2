<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$rec_id = htmlspecialchars(strip_tags($form_id));
	$_SESSION["rec_id"] = $rec_id;
	$data = query("select * from people_related where id = ?", $rec_id); 
	$people_id = $data[0]["people_id"]; 
	$related_id = $data[0]["related_id"]; 
	$relationship = $data[0]["relationship"];
	$relationship_date = $data[0]["relationship_date"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select surname, first_name from people where id = ?", $people_id);
	$surname = $data[0]["surname"];
	$first_name = $data[0]["first_name"];
	$full_name = $surname . ", " . $first_name;
	$data = query("select surname, first_name from people where id = ?", $related_id);
	$r_surname = $data[0]["surname"];
	$r_first_name = $data[0]["first_name"];
	$r_full_name = $r_surname . ", " . $r_first_name;
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This relationship is about to be deleted!</h2>
  <div class="container">
  <form action="../page/people_related_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Person:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $full_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Related person:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $r_full_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Relationship:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $relationship; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Relationship date:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $relationship_date; ?></td>
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
      <a class="w3-button w3-green" href="../page/people_related.php">Cancel</a>
   </div>
  </div>
</form>