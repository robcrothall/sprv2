<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Validate fields
		$error = false;
		$message = "";
		$subject = "Initial value";
		$originator_id = 0;
		$dept_id = 6;
		$severity = "04 - Normal";
		$subject = "";
		$description = "";
		$asset_id = 0;
		$discipline = "";
		$type = "";
		$create_id = $_SESSION["id"];
		$create_date = date("Y-m-d H:i:s");
		$project_id = 0;
		$_SESSION["sql_error"] = "Initialised";
		$user_id = $_SESSION["id"];
//		$_SESSION["selected_job_id"]
		$assigned_to = test_input($_POST["assigned_to"]);
		if(empty($assigned_to)) {$assigned_to = 0;}
		$short_list = test_input($_POST["short_list"]);






		$budget_hrs = test_input($_POST["budget_hrs"]);
		if(empty($budget_hrs)) {$budget_hrs = 0.00;}
		if($error == false) 
		{
      if ($assigned_to == $rows[0]["assigned_to"]) {
          $date_assigned = $rows[0]["date_assigned"];
      } else {
          $date_assigned = date("Y-m-d H:i:s");
          $email_subject = "re-assigned";
 		}
 		if($short_list != $rows[0]["assigned_to"]) {
			$assigned_to = $short_list;
         $date_assigned = date("Y-m-d H:i:s");
         $email_subject = "re-assigned";
      }
      $new_assigned_to = $assigned_to;
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
		}
      render("../page/job_ass_form.php", ["title" => "Task assignments", "message" => "$message"]);
    }
    else
    {
		$_SESSION["event_select"] = 1;
		render("../page/job_ass_create_form.php", ["title" => "Add a resource to a task"]);
    }

?>
