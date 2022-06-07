<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
	 //print_r($_SERVER["REQUEST_METHOD"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error   = false;
		$message = "";
		$whatsapp= "";
		if (empty($_POST["surname"])) {$message .= "You must provide a surname.  "; $error = true; $surname = "Unknown";}
        else   {$surname=test_input($_POST['surname']);}
		if ($surname == strtoupper($surname) | $surname == strtolower($surname)) {
			$surname = ucwords(strtolower($surname));
		}
   	$_SESSION["search_name_start"] = $surname;
		if (empty($_POST["first_name"])) {$message .= "You must provide a first name.  "; $error = true; $first_name = "Unknown";}
        else   {$first_name=test_input($_POST['first_name']);}
		if ($first_name == strtoupper($first_name) | $first_name == strtolower($first_name)) {
			$first_name = ucwords(strtolower($first_name));
		}
		if (empty($_POST["other_name"])) {$other_name = "";}
        else   {$other_name=test_input($_POST['other_name']);}
		if ($other_name == strtoupper($other_name) | $other_name == strtolower($other_name)) {
			$other_name = ucwords(strtolower($other_name));
		}
		if (empty($_POST["given_name"])) {$given_name = "";}
		else   {$given_name = test_input($_POST['given_name']);}
		if ($given_name == strtoupper($given_name) | $given_name == strtolower($given_name)) {
			$given_name = ucwords(strtolower($given_name));
		}
		if (empty($_POST["title"])) {$title = "";}
		else   {$title = test_input($_POST['title']);}
		if ($title == strtoupper($title) | $title == strtolower($title)) {
			$title = ucwords(strtolower($title));
		}
		if (empty($_POST["account_no"])) {$account_no = "";}
		else   {$account_no = test_input($_POST['account_no']);}
		if (empty($_POST["old_account_no"])) {$old_account_no = "";}
		else   {$old_account_no = test_input($_POST['old_account_no']);}
		if (empty($_POST["status"])) {$status = "Associate";}
		else   {$status = test_input($_POST['status']);}
		if (empty($_POST["status_date"])) {$status_date = date("Y-m-d");}
		else   {$status_date = test_input($_POST['status_date']);}
		if (empty($_POST["company_id"])) {$company_id = 0;}
		else   {$company_id = test_input($_POST['company_id']);}
		if (empty($_POST["id_no"])) {$id_no = "";}
		else   {$id_no = test_input($_POST['id_no']);}
		if (empty($_POST["driver_lic"])) {$driver_lic = "";}
		else   {$driver_lic = test_input($_POST['driver_lic']);}
		if (empty($_POST["birth_date"])) {$birth_date = "1900/01/01";}
		else   {$birth_date = test_input($_POST['birth_date']);}
		if (empty($_POST["bd_disclose"])) {$bd_disclose = 'Y';}
      else 	 {$bd_disclose = test_input($_POST['bd_disclose']);}
		if (empty($_POST["home_phone"])) {$home_phone = "";}
		else   {$home_phone = test_input($_POST['home_phone']);}
		if (strlen($home_phone) == 10) {$home_phone=substr($home_phone,0,3) . " " . substr($home_phone,3,3) . " " . substr($home_phone, 6);}
		if (empty($_POST["hp_disclose"])) {$hp_disclose = 'Y';}
      else 	 {$hp_disclose = test_input($_POST['hp_disclose']);}
		if (empty($_POST["work_phone"])) {$work_phone = "";}
		else	$work_phone      = test_input($_POST['work_phone']);
		if (strlen($work_phone) == 10) {$work_phone=substr($work_phone,0,3) . " " . substr($work_phone,3,3) . " " . substr($work_phone, 6);}
		if (empty($_POST["wp_disclose"])) {$wp_disclose = 'Y';}
      else 	 {$wp_disclose = test_input($_POST['wp_disclose']);}
		if (empty($_POST["mobile_phone"])) {$mobile_phone = "";}
		else	$mobile_phone = test_input($_POST['mobile_phone']);
		if (strlen($mobile_phone) == 10) {$mobile_phone=substr($mobile_phone,0,3) . " " . substr($mobile_phone,3,3) . " " . substr($mobile_phone, 6);}
		if (empty($_POST["mp_disclose"])) {$mp_disclose = 'Y';}
      else 	 {$mp_disclose = test_input($_POST['mp_disclose']);}
      $whatsapp        = test_input($_POST['whatsapp']);
		if (empty($_POST["home_email"])) {$home_email = "";}
		else	{$home_email = test_input($_POST['home_email']);}
		if (empty($_POST["he_disclose"])) {$he_disclose = 'Y';}
      else 	 {$he_disclose = test_input($_POST['he_disclose']);}
		if (empty($_POST["work_email"])) {$work_email = "";}
		else	{$work_email = test_input($_POST['work_email']);}
      $sex             = test_input($_POST['sex']);
      $cottage         = test_input($_POST['cottage']);
      if (empty($_POST["cottage_id"])) {$cottage_id = 0;}
      else {$cottage_id      = test_input($_POST["cottage_id"]);}
		if (empty($_POST["occupation_id"])) {$occupation_id = 0;}
		else   {$occupation_id   = test_input($_POST['occupation_id']);}
		$race = test_input($_POST["race"]);
		if (empty($_POST["notes"])) {$notes = "";}
		else   {$notes = test_input($_POST['notes']);}
      $user_id = $_SESSION['id'];
        // Do some validation
		$rows = query("select count(*) rowCount from people where surname=? and first_name=?", $surname, $first_name);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "Warning: This name already exists in our records.  ";}
		if (strlen($account_no) != 6) {
			if (strpos($surname, ' ') === false) {
				$account_no = substr(strtoupper($surname) . '@@@', 0, 3);
				}
			else {
				$last_word_start = strrpos ( $surname , " ") + 1;
				$account_no = substr(strtoupper($surname) .'@@@', $last_word_start, 3);
				}
			if (strlen($first_name) > 0) {$account_no .= substr(strtoupper($first_name), 0, 1);}
			else {$account_no .= '@';}
			for ($x = 1; $x <= 99; $x++) {
				$y = $account_no . sprintf("%'.02d", $x);
				$rows = query("select count(*) rowCount from people where account_no =?", $y);
				$row = $rows[0];
				if ($row["rowCount"] == 0) {
					$account_no = $y;
					break;
				}
			}
			$message .= "Account number allocated is: " . $account_no . ".  ";
		}
		else {
			$rows = query("select count(*) rowCount from people where account_no =?", $account_no);
			$row = $rows[0];
			if ($row["rowCount"] > 0) {
				$message .= "This accont code (" . $account_no . " is already in use.  ";
				$error = True;
				}
		}
		if($status == "Resident") {
			if(empty($id_no)) {$message .= "The ID Number is required for Residents. ";}
			if(empty($surname)) {$message .= "There must be a surname for Residents. ";}
			if(empty($first_name)) {$message .= "There must be a first name for Residents. ";}
			if(empty($sex)) {$message .= "Please indicate the sex of the Resident. ";}
			if(empty($occupation_id)) {$message .= "Please indicate the previous occupation for Residents. ";}
			if(empty($mobile_phone)) {$message .= "Please provide the mobile phone number for Residents. ";}
			if(empty($home_email)) {$message .= "Please provide the home email address for Residents. ";}
		} else {
			if(empty($surname)) {$message .= "There must be a surname. ";}
			if(empty($first_name)) {$message .= "There must be a first name. ";}
			if(empty($mobile_phone)) {$message .= "Please provide the mobile phone number. ";}
			if(empty($home_email)) {$message .= "Please provide the home email address. ";}
		}
      if ($error === true) {apologize($message);}
		$rows = true;
		$rows = query("insert into people (surname, first_name, other_name, given_name, title, account_no, " .
		"old_account_no, status, status_date, company_id, id_no, driver_lic, " .
		"birth_date, bd_disclose, home_phone, hp_disclose, work_phone, wp_disclose, mobile_phone, " .
		"mp_disclose, whatsapp, home_email, he_disclose, work_email, sex, " .
		"cottage, cottage_id, occupation_id, race, notes, user_id) values (?,?,?,?,?,?," . 
		"?,?,?,?,?,?," . 
		"?,?,?,?,?,?,?," .
		"?,?,?,?,?,?," .
		"?,?,?,?,?,?)",
		$surname, $first_name, $other_name, $given_name, $title, $account_no, 
		$old_account_no, $status, $status_date, $company_id, $id_no, $driver_lic, 
		$birth_date, $bd_disclose, $home_phone, $hp_disclose, $work_phone, $wp_disclose, $mobile_phone, 
		$mp_disclose, $whatsapp, $home_email, $he_disclose, $work_email, $sex, 
		$cottage, $cottage_id, $occupation_id, $race, $notes, $user_id);
		if($rows !== false) 
			{
				 $message .= "Record inserted successfully.";
				 $_SESSION["search_name_start"] = $surname;
			}
			else {$message .= "Failed to add the record - please call support!";}
			
      render("../page/people_form.php", ["title" => "List of Peoples", "message" => "$message"]);
    }
    else
    {
    	$_SESSION["occupation_id_select"] = 0;
		render("../page/people_create_form.php", ["title" => "Record details of a new Person"]);
    }

?>
