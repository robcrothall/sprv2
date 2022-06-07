<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$event_date = "";
		$event_id = 0;
		$notes = "";
		if (empty($_POST["event_date"])) {$message .= "You must provide at least an approximate date.  "; $error = true;}
		else {$event_date = substr(htmlspecialchars(strip_tags($_POST['event_date'])),0,50);}
		if (empty($_POST["notes"])) {$notes = ""; $message = "You must provide an event description.  "; $error = true;}
		else {$notes=substr(htmlspecialchars(strip_tags($_POST['notes'])),0,65534);}
		$place_id = substr(htmlspecialchars(strip_tags($_POST['place_id'])),0,65534);
		
		if($error == false) 
		{
			$event_date = trim($event_date);
			$notes = trim($notes);
			$rowCount = query("insert into history (event_date, people_id, place_id, notes, user_id, changed) values (?,?,?,?,?,CURRENT_TIMESTAMP())",
									$event_date, $_SESSION["selected_people_id"], $place_id, $notes,$_SESSION["id"]);
			if(!$rowCount == false) 
			{
				$message .= "Failed to add the record - please call support!";
			}
			else 
			{
				$message .= "Event inserted successfully.  ";
			}
		}
		
      render("../page/history_form.php", ["title" => "Historical events", "message" => "$message"]);
    }
    else
    {
    	$_SESSION["event_select"] = 1;
      render("../page/history_create_form.php", ["title" => "Record Details of a new event"]);
    }

?>
