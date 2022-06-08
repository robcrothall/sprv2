<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$people_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select a.surname, a.first_name, a.other_names, a.given_name, a.title, a.marital_status, a.id_no, a.birth_date, a.home_phone, a.work_phone, a.mobile_phone, a.whatsapp, a.work_email, a.home_email, a.sex, a.passport_no, a.passport_expiry, a.driver_lic, a.driver_expiry, a.company_id, a.occupation_id, a.rs_rep, a.cottage, a.checked, a.notes, a.user_id, a.changed from people a where a.id = ?", 
						$people_id); 
	$_SESSION["selected_people_id"] = $people_id;
    $_SESSION["search_name_start"] = $data[0]["surname"];
	$surname        = $data[0]["surname"];
	$first_name     = $data[0]["first_name"];
	$other_name     = $data[0]["other_name"];
	$given_name     = $data[0]["given_name"];
	$title          = $data[0]["title"];
	$marital_status = $data[0]["marital_status"];
	$id_no          = $data[0]["id_no"];
	$birth_date     = $data[0]["birth_date"];
	$home_phone     = $data[0]["home_phone"];
	$work_phone     = $data[0]["work_phone"];
	$mobile_phone   = $data[0]["mobile_phone"]; 
	$whatsapp       = $data[0]["whatsapp"];
	$work_email     = $data[0]["work_email"];
	$home_email     = $data[0]["home_email"];
	$sex            = $data[0]["sex"];
	$passport_no    = $data[0]["passport_no"];
	$passport_expiry= $data[0]["passport_expiry"];
	$driver_lic     = $data[0]["driver_lic"];
	$driver_expiry  = $data[0]["driver_expiry"];
	$company_id     = $data[0]["company_id"];
	$occupation_id  = $data[0]["occupation_id"];
	$rs_rep_id      = $data[0]["rs_rep"];
	$cottage        = $data[0]["cottage"];
	$checked        = $data[0]["checked"];
	$notes          = $data[0]["notes"];
	$user_id        = $data[0]["user_id"];
	$changed        = $data[0]["changed"];
	$full_name      = ucwords(strtolower($surname)) . ", " . ucfirst(strtolower($first_name));
	if (!empty($other_name)) {$full_name = $full_name . " " . ucfirst(strtolower($other_name));}
	if (!empty($given_name)) {$full_name = $full_name . " (" . ucfirst(strtolower($given_name)) . ")";}
	//$full_name      = ucwords(strtolower($full_name));
	$data = query("select b.occupation from occupation b where id = ?", $occupation_id);
	$occupation  = $data[0]["occupation"];
	$data = query("select co_name from company where id = ?", $company_id);
	$co_name        = $data[0]["co_name"];
	$data = query("select surname, first_name, other_names, given_name from people where id = ?", $rs_rep_id);
	$rs_surname     = $data[0]["surname"];
	$rs_first_name  = $data[0]["first_name"];
	$rs_other_name  = $data[0]["other_name"];
	$rs_given_name  = $data[0]["given_name"];
	$rs_name        = ucfirst(strtolower($rs_first_name)) . " " . ucwords(strtolower($rs_surname));
	$data = query("select * from users where id = ?", $user_id);
	$username       = $data[0]["username"];
	$user_name_given= $data[0]["first_name"] . " " . $data[0]["surname"];
?>
<h2>Read about a Person</h2>
	<a class="btn btn-success" href="../page/people.php">Back</a>

  <div class="container">
   <table border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" valign="top" width="30%">Record ID:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $people_id; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Person name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $full_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Title:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $title; ?></td>
	      </tr>
		  <tr>
				<td align="right" valign="top" width="30%">Company:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $co_name; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Cottage:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $cottage; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Occupation:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $occupation; ?></td>
	      </tr>
		  <tr>
				<td align="right" valign="top" width="30%">Home phone:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $home_phone; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Work phone:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $work_phone; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Mobile phone:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $mobile_phone; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">WhatsApp:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $whatsapp; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Home email:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $home_email; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Work email:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $work_email; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="30%">Sex:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $sex; ?></td>
	      </tr>
		<?php
		if (check_role("STAFF") | check_role("ADMIN") ) {
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">R&amp;S Representative:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $rs_name . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Marital status:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $marital_status . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">ID number:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $id_no . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Birth date:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $birth_date . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Passport No:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $passport_no . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Passport expiry:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $passport_expiry . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Driver&#039;s license:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $driver_lic . '</td>';
	      echo '</tr>';
	      echo '<tr>';
				echo '<td align="right" valign="top" width="30%">Driver&#039;s license expiry:</td>';
				echo '<td width="2%"></td>';
				echo '<td align="left" width="70%">' . $driver_expiry . '</td>';
	      echo '</tr>';
                echo "<tr>";
                echo '<td align="right" valign="top" width="30%">Checked status:</td>';
                echo '<td width="2%"></td>';
                echo '<td align="left" width="70%">' . $checked . '</td>';
                echo '</tr>';
            }
          ?>
	      <tr>
				<td align="right" valign="top" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $username . ' - ' . $user_name_given; ?></td>
	      </tr>
	      <tr>
				<td align="right" valign="top" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
          <?php
            if(check_role("STAFF") | check_role("ADMIN")) {
				echo '<tr>';
					echo '<td align="right" valign="top" width="25%">Notes:</td>';
					echo '<td width="2%"></td>';
					echo '<td align="left" width="70%"><?php echo $notes; ?></td>';
				echo '</tr>';
            }
          ?>
	</table> 
   <div class="form-actions">
      <a class="btn btn-success" href="../page/people.php">Back</a>
   </div>
  </div>
