<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$people_id = htmlspecialchars(strip_tags($form_id));
	$_SESSION["people_id"] = $people_id;
	$data = query("select a.surname, a.first_name, a.other_name, a.given_name, a.title, a.account_no, a.notes, a.user_id, a.changed, b.occupation from people a, occupation b where a.occupation_id = b.id and a.id = ?", 
						$people_id); 
	$surname = $data[0]["surname"];
	$_SESSION["surname"] = $surname;
	$first_name = $data[0]["first_name"];
	$_SESSION["first_name"] = $first_name;
	$other_name = $data[0]["other_name"];
	$_SESSION["other_name"] = $other_name;
	$given_name = $data[0]["given_name"];
	$title = $data[0]["title"];
	$full_name = "";
	if (!empty($title)) {$full_name .= $title . " ";}
	if (!empty($first_name)) {$full_name .= $first_name . " ";}
	if (!empty($other_name)) {$full_name .= $other_name . " ";}
	if (!empty($given_name)) {$full_name .= "(" . $given_name . ") ";}
	if (!empty($surname)) {$full_name .= $surname . " ";}
	$account_no = $data[0]["account_no"];
	$occupation = $data[0]["occupation"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select * from users where id = ?", $user_id);
	$username = $data[0]["username"];
	$user_name_given = $data[0]["first_name"] . " " . $data[0]["surname"];
	// Check for dependencies
	$message = "";
	$error = 0;
	$rows = query("select count(*) rowCount from address where person_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Address lines still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from history where people_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "History lines still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from med_history where people_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Medical history lines still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from payments where person_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Payment lines still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from people_asset where people_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Asset links still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from people_related where people_id =? or related_id =?", $people_id, $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Relationships still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from people_rs where people_id =? or rs_id =?", $people_id, $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "R&S links still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from people_skills where people_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Skill links still exist.  "; $error += 1;
		}
	$rows = query("select count(*) rowCount from people_vehicle where people_id =?", $people_id);
	$row = $rows[0];
	if ($row["rowCount"] > 0) {
		$message .= "Vehicle links still exist.  "; $error += 1;
		}

?>
<h2>This person is about to be deleted!</h2>
  <div class="container">
  <form action="../ctl/people_delete.php" method="post">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Person name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $full_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Account No:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $account_no; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="30%">Occupation:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $occupation; ?></td>
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

   <div class="form-actions">
<?php
	if ($error == 0) {
		echo "<input type='submit' value='Delete' class='w3-button w3-red' />";
	}
	else {
		echo $message . "<br>";
	}
?>
	  	<a href='../ctl/people.php' class='w3-button w3-green'>Back to people</a>
   </div>
  </div>
</form>