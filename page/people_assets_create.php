<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$user_id = $_SESSION["id"];
		$message = "";
		$notes = "";
		$asset_id = 0;
		$people_id = 0;
		$_SESSION["sql_error"] = "Initialised";
		$user_id = $_SESSION["id"];
		if (empty($_POST["people_id"])) {$message .= "You must provide person detail. "; $error = true;}
		else {$people_id = substr(htmlspecialchars(strip_tags($_POST['people_id'])),0,10);}
		if (empty($_POST["asset_id"])) {$message .= "You must provide asset detail. "; $error = true;}
		else {$asset_id=substr(htmlspecialchars(strip_tags($_POST['asset_id'])),0,10);}
		if($error == false) 
		{
			$rowCount = query("insert into people_asset (people_id, asset_id, user_id) " .
				"values (?,?,?)",
				$people_id, $asset_id, $user_id);
			if(!$rowCount == false) 
			{
				$message .= "Failed to add the record - please call support!  ";
			}
			else 
			{
				$message .= "Asset link inserted successfully.  ";
			}
		}
      render("../page/people_assets_create_form.php", ["title" => "Link People and Assets", "message" => "$message"]);
    }
    else
    {
      render("../page/people_assets_create_form.php", ["title" => "Link People and Assets"]);
    }
?>
