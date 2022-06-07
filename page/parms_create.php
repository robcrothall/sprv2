<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$parm_name = "";
		$parm_value = "";
		if (empty($_POST["parm_name"])) {$message .= "You must provide a name.  "; $error = true;}
		else {$parm_name = substr(htmlspecialchars(strip_tags($_POST['parm_name'])),0,30);}
		if (empty($_POST["parm_value"])) {$message .= "You must provide a value.  "; }
		else {$parm_value=substr(htmlspecialchars(strip_tags($_POST['parm_value'])),0,50);}

		// Check for a duplicate place
		$rows = query("select count(*) rowCount from parms_char where parm_name=? and parm_value=?", $parm_name, $parm_value);
		$row = $rows[0];
		if($row["rowCount"] > 0) {$message .= "This parameter already exists in our records."; $error = true;}
		// If no errors have been detected, try to insert the row after noting some warnings
		if($error == false) 
		{
			$parm_name = trim($parm_name);
			$parm_value = trim($parm_value);
			$rowCount = query("insert into parms_char (parm_name, parm_value, user_id, changed) values (?,?,?,CURRENT_TIMESTAMP())",$parm_name,$parm_value,$_SESSION["id"]);
			if($rowCount == false) 
			{
				$message .= "Record inserted successfully.";
			}
			else {$message .= "Failed to add the parameter record - please call support!";}
		}
		
      render("../page/parms_form.php", ["title" => "List of parameters", "message" => "$message"]);
    }
    else
    {
      render("../page/parms_create_form.php", ["title" => "Record Details of a new parameter"]);
    }

?>
