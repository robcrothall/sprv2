<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$co_name = "";
		$co_address = "";
		$notes = "";
		if (empty($_POST["co_name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$co_name = test_input($_POST['co_name']);}
		if (empty($_POST["co_address"])) {$message .= "No address for this company?  ";}
		else {$co_address = test_input($_POST['co_address']);}
		if (empty($_POST["notes"])) {$notes = ""; $message = "No notes on this company?"; }
		else {$notes = test_input($_POST['notes']);}

		// Check for a duplicate company
		$rows = query("select count(*) rowCount from company where co_name=?", $co_name);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This company already exists in our records.  "; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$rowCount = query("insert into company (co_name, co_address, notes, user_id, changed) values (?,?,?,?,CURRENT_TIMESTAMP())",$co_name,$co_address,$notes,$_SESSION["id"]);
			if($rowCount == false) 
				{
					$message .= "Record inserted successfully.";
				}
			else {$message .= "Failed to add the record - please call support!";}
		}
		
      render("../page/company_form.php", ["title" => "List of Companies", "message" => "$message"]);
    }
    else
    {
      render("../page/company_create_form.php", ["title" => "Record Details of a new Company"]);
    }

?>
