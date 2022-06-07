<?php
	$_SESSION["module"] 	= $_SERVER["PHP_SELF"];
	$form_id 				= htmlspecialchars(strip_tags($form_id));
	$data = query("select proc_date, med_proc_id, price, value, comment, user_id, changed from med_history where id = ?", $form_id); 
	$_SESSION["selected_med_history_id"] = $form_id;
	$proc_date 				= $data[0]["proc_date"]; 
	$_SESSION["proc_date"] 	= $proc_date;
	$med_proc_id			= $data[0]["med_proc_id"];
	$price 					= $data[0]["price"];
	$value					= $data[0]["value"];
	$comment 				= $data[0]["comment"];
	$user_id 				= $data[0]["user_id"];
	$changed 				= $data[0]["changed"];
	$data = query("select description from med_procedures where id = ?", $med_proc_id);
	$description			= $data[0]["description"];
	$data = query("select username from users where id = ?", $user_id);
	$username 				= $data[0]["username"];
?>
<h2>This medical event is about to be deleted!</h2>
  <div class="container">
  <form action="../page/medhist_delete.php" method="post">
  <a class="w3-button w3-green" href="../page/medhist.php">Cancel</a>
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Procedure date:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $proc_date; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Procedure:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $description; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Value:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $value; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Price:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $price; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Comment:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $comment; ?></td>
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
      <a class="w3-button w3-green" href="../page/medhist.php">Cancel</a>
   </div>
  </div>
</form>
