<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$occupation = "";
		$occupation_id = 0;
		$notes = "";
		if (empty($_POST["name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$occupation = substr(htmlspecialchars(strip_tags($_POST['name'])),0,50);}
		//$occupation_id = substr(htmlspecialchars(strip_tags($_POST["occupation_id"])),0,20);
		if (empty($_POST["notes"])) {$notes = ""; $message = "No notes on this occupation?  "; }
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}

		// Check for a duplicate occupation
		$rows = query("select count(*) rowCount from occupation where occupation=?", $occupation);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This occupation already exists in our records."; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$occupation = trim($occupation);
			$notes = trim($notes);
			$rowCount = query("insert into occupation (occupation, notes, user_id, changed) values (?,?,?,CURRENT_TIMESTAMP())", $occupation, $notes, $_SESSION["id"]);
			if($rowCount == false) 
			{
				$message .= "Record inserted successfully.";
			}
			else {$message .= "Failed to add the record - please call support!";}
		}
		
      render("../page/occupation_form.php", ["title" => "List of Occupationss", "message" => "$message"]);
    }
    else
    {
      render("../page/occupation_create_form.php", ["title" => "Record Details of a new Occupations"]);
    }

?>
