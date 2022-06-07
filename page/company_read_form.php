<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$company_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from company where id = ?", $company_id); 

	$co_name = $data[0]["co_name"]; 
	$co_address = $data[0]["co_address"]; 
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["first_name"] . " " . $data[0]["surname"];
?>
<h2>Read about a Company</h2>
  <div class="container">
   <a class="w3-button w3-green" href="../page/company.php">Back</a>
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $company_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $co_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Address:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $co_address; ?></td>
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
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
   <a class="w3-button w3-green" href="../page/company.php">Back</a>
   <div class="form-actions">
   </div>
  </div>
