<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$event_id = 0;
		$value = 0;
		$price = 0;
		$description = "Initial value";
		if (empty($_POST["proc_date"])) {$proc_date = date("Y-m-d");}
		else {$proc_date = substr(htmlspecialchars(strip_tags($_POST['proc_date'])),0,50);}
		$people_id = $_SESSION["selected_people_id"];
		$med_proc_id1 = substr(htmlspecialchars(strip_tags($_POST['proc1'])),0,50);
		$value1 = substr(htmlspecialchars(strip_tags($_POST['value1'])),0,50);
		$comment1 = substr(htmlspecialchars(strip_tags($_POST['comment1'])),0,50);
		$med_proc_id2 = substr(htmlspecialchars(strip_tags($_POST['proc2'])),0,50);
		$value2 = substr(htmlspecialchars(strip_tags($_POST['value2'])),0,50);
		$comment2 = substr(htmlspecialchars(strip_tags($_POST['comment2'])),0,50);
		$med_proc_id3 = substr(htmlspecialchars(strip_tags($_POST['proc3'])),0,50);
		$value3 = substr(htmlspecialchars(strip_tags($_POST['value3'])),0,50);
		$comment3 = substr(htmlspecialchars(strip_tags($_POST['comment3'])),0,50);
		$med_proc_id4 = substr(htmlspecialchars(strip_tags($_POST['proc4'])),0,50);
		$value4 = substr(htmlspecialchars(strip_tags($_POST['value4'])),0,50);
		$comment4 = substr(htmlspecialchars(strip_tags($_POST['comment4'])),0,50);
		if($error == false) 
		{
			$proc_date = trim($proc_date);
			if ($med_proc_id1 <> 0) 
			{
				$med_proc_id = $med_proc_id1;
				$rows = query("select price, description from med_procedures where id = ?",$med_proc_id);
				$price = $rows[0]["price"];
				$description = $rows[0]["description"];
				$value = $value1;
				$comment = trim($comment1);
				if ($value <> '' OR $comment <> '')
				{
					$rowCount = query("insert into med_history (proc_date, people_id, med_proc_id, price, value, comment, user_id, changed) values (?,?,?,?,?,?,?,CURRENT_TIMESTAMP())",
									$proc_date, $_SESSION["selected_people_id"], $med_proc_id, $price, $value, $comment,$_SESSION["id"]);
					if(!$rowCount == false) 
					{
						$message .= "Failed to add '" . $description . "' - please call support!  ";
					}
					else 
					{
						$message .= "'" . $description . "' inserted successfully.  ";
					}
				}
			}
			if ($med_proc_id2 <> 0) 
			{
				$med_proc_id = $med_proc_id2;
				$rows = query("select price, description from med_procedures where id = ?",$med_proc_id);
				$price = $rows[0]["price"];
				$description = $rows[0]["description"];
				$value = $value2;
				$comment = trim($comment2);
				if ($value <> '' OR $comment <> '')
				{
				$rowCount = query("insert into med_history (proc_date, people_id, med_proc_id, price, value, comment, user_id, changed) values (?,?,?,?,?,?,?,CURRENT_TIMESTAMP())",
									$proc_date, $_SESSION["selected_people_id"], $med_proc_id, $price, $value, $comment,$_SESSION["id"]);
				if(!$rowCount == false) 
				{
					$message .= "Failed to add '" . $description . "' - please call support!  ";
				}
				else 
				{
					$message .= "'" . $description . "' inserted successfully.  ";
				}
				}
			}
			if ($med_proc_id3 <> 0) 
			{
				$med_proc_id = $med_proc_id3;
				$rows = query("select price, description from med_procedures where id = ?",$med_proc_id);
				$price = $rows[0]["price"];
				$description = $rows[0]["description"];
				$value = $value3;
				$comment = trim($comment3);
				if ($value <> '' OR $comment <> '')
				{
				$rowCount = query("insert into med_history (proc_date, people_id, med_proc_id, price, value, comment, user_id, changed) values (?,?,?,?,?,?,?,CURRENT_TIMESTAMP())",
									$proc_date, $_SESSION["selected_people_id"], $med_proc_id, $price, $value, $comment,$_SESSION["id"]);
				if(!$rowCount == false) 
				{
					$message .= "Failed to add '" . $description . "' - please call support!";
				}
				else 
				{
					$message .= "'" . $description . "' inserted successfully.";
				}
				}
			}
			if ($med_proc_id4 <> 0) 
			{
				$med_proc_id = $med_proc_id4;
				$rows = query("select price, description from med_procedures where id = ?",$med_proc_id);
				$price = $rows[0]["price"];
				$description = $rows[0]["description"];
				$value = $value4;
				$comment = trim($comment4);
				if ($value <> '' OR $comment <> '')
				{
				$rowCount = query("insert into med_history (proc_date, people_id, med_proc_id, price, value, comment, user_id, changed) values (?,?,?,?,?,?,?,CURRENT_TIMESTAMP())",
									$proc_date, $_SESSION["selected_people_id"], $med_proc_id, $price, $value, $comment,$_SESSION["id"]);
				if(!$rowCount == false) 
				{
					$message .= "Failed to add '" . $description . "' - please call support!  ";
				}
				else 
				{
					$message .= "'" . $description . "' inserted successfully.  ";
				}
				}
			}
		}
      render("../page/medhist_form.php", ["title" => "Medical events", "message" => "$message"]);
    }
    else
    {
		$_SESSION["event_select"] = 1;
		render("../page/medhist_create_form.php", ["title" => "Record Details of a new medical event"]);
    }

?>
