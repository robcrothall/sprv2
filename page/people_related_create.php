<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$user_id = $_SESSION["id"];
		$people_id = 0;
		$related_id = 0;
		$relationship = "Spouse";
		$relationship_date = date("Y-m-d");
		$_SESSION["sql_error"] = "Initialised";
		$user_id = $_SESSION["id"];
		$people_id = $_SESSION["selected_people_id"];
//		if (empty($_POST["people_id"])) {$message .= "You must select a person.  "; $error = true;}
//		else {$people_id = substr(htmlspecialchars(strip_tags($_POST["people_id"])),0,20);}
		if (empty($_POST["related_id"])) {$message .= "You must select a related person.  "; $error = true;}
		else {$related_id = substr(htmlspecialchars(strip_tags($_POST["related_id"])),0,20);}
		if (empty($_POST["relationship"]))  {$message .= "You must select a relationship.  "; $error = true;}
		else {$relationship=substr(htmlspecialchars(strip_tags($_POST["relationship"])),0,20);}
		if (empty($_POST["relationship_date"]))  {$message .= "You must select the correct date.  "; $error = true;}
		else {$relationship_date=substr(htmlspecialchars(strip_tags($_POST["relationship_date"])),0,20);}
		$notes=substr(htmlspecialchars(strip_tags($_POST["notes"])),0,255);
		$sql = "select * from people_related where ((people_id = ? and related_id = ?) or (related_id = ? and people_id = ?)) and relationship = ?";
		$result = query($sql, $people_id, $related_id, $people_id, $related_id, $relationship);
		if(!$result == false) {$error = true; $message .= " This relationship already exists.  ";} 
		if($error == false) 
		{
			$rowCount = query("insert into people_related (people_id, related_id, " .
				"relationship, relationship_date, notes, user_id) " .
				"values (?,?,?,?,?,?)",
				$people_id, $related_id,
				$relationship, $relationship_date, $notes, $user_id);
			if(!$rowCount == false) 
			{
				$message .= "Failed to add the relationship record - please call support!  ";
			}
			else 
			{
				$message .= "Relationship inserted successfully.  ";
			}
		}
      render("../page/people_related_create_form.php", ["title" => "Record Details of a relationship", "message" => "$message"]);
	 }
    else
    {
      render("../page/people_related_create_form.php", ["title" => "Record Details of a relationship"]);
    }
?>
