<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// This place table is not normalized. An enhancement is required.
		// Validate fields
		$error = false;
		$message = "";
		$country = "";
		$notes = "";
		if (empty($_POST["name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$country = substr(htmlspecialchars(strip_tags($_POST['name'])),0,50);}
		if (empty($_POST["notes"])) {$notes = ""; $message = "No notes on this country?"; }
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}

		// Check for a duplicate place
		$rows = query("select count(*) rowCount from countries where country=?", $country);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This country already exists in our records."; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$country = trim($country);
			$notes = trim($notes);
			$rowCount = query("insert into countries (country, notes, user_id, changed) values (?,?,?,CURRENT_TIMESTAMP())",$country,$notes,$_SESSION["id"]);
			if($rowCount == false) 
			{
				$message .= "Record inserted successfully.";
			}
			else {$message .= "Failed to add the record - please call support!";}
		}
		
      render("../page/country_form.php", ["title" => "List of Countries", "message" => "$message"]);
    }
    else
    {
      render("../page/country_create_form.php", ["title" => "Record Details of a new Place"]);
    }

?>
