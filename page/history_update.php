<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $event_date=trim(substr(htmlspecialchars(strip_tags($_POST['event_date']), ENT_COMPAT),0,50));
            $place_id=trim(substr(htmlspecialchars(strip_tags($_POST['place_id']), ENT_COMPAT),0,50));
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($event_date)) {$errMsg .= "The event_date name cannot be empty. ";}
            if (empty($notes)) {$errMsg .= "The notes cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            //$rows = query("update history set event_date=?, people_id = ?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
            //        $event_date, $_SESSION["selected_people_id"], $notes, $user_id, $rec_id);
            $rows = query("update history set event_date=?, place_id = ?, people_id = ?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $event_date, $place_id, $_SESSION["selected_people_id"], $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($event_date);
					print_r($event_id);
					print_r($place_id);
					print_r($notes);
					print_r(strlen($notes));
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../page/history_update_form.php", ["title" => "Update History", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../page/history_update_form.php", ["title" => "Update a History entry",
            "form_id" => "$id", "message" => ""]);
    }

?>
