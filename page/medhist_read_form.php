<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$form_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from med_history where id = ?", $form_id); 
	$people_id 			= $data[0]["people_id"];
	$proc_date 			= $data[0]["proc_date"];
	$medhist_id 		= $data[0]["id"]; 
	$med_proc_id		= $data[0]["med_proc_id"];
	$price 				= $data[0]["price"]; 
	$value 				= $data[0]["value"];
	$comment 			= $data[0]["comment"];
	$proc_date 			= $data[0]["proc_date"];
	$user_id 			= $data[0]["user_id"];
	$changed 			= $data[0]["changed"];
	$data = query("select * from people where id = ?", $people_id);
	$cottage 			= $data[0]["cottage"];
	$account_no			= $data[0]["account_no"];
	$patient_name 		= $data[0]["surname"] . ", " . $data[0]["first_name"] . " " . $data[0]["other_name"];
	if (!empty($data[0]["given_name"])) {
		$patient_name .= " (" . $data[0]["given_name"] . ")";
	}
	$data = query("select * from users where id = ?", $user_id);
	$username 			= $data[0]["username"];
	$user_name_given 	= $data[0]["surname"] . ", " . $data[0]["first_name"];
	$data = query("select description from med_procedures where id = ?", $med_proc_id);
	$description 		= $data[0]["description"];
?>
<h2>Read about an event in medical history</h2>
  <div class="container">
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/medhist.php">Back</a>
   </div>
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $form_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Patient name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $patient_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Cottage:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $cottage; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Account No:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $account_no; ?></td>
	      </tr>
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
				<td align="right" width="30%">Value:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $value; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Price:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $price; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Comment:</td>
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
      <a class="w3-button w3-green" href="../page/medhist.php">Back</a>
   </div>
  </div>
