<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $proc_date=trim(substr(htmlspecialchars(strip_tags($_POST['proc_date']), ENT_COMPAT),0,50));
            $proc_id=trim(substr(htmlspecialchars(strip_tags($_POST['proc_id']), ENT_COMPAT),0,50));
            $value=trim(substr(htmlspecialchars(strip_tags($_POST['value']), ENT_COMPAT),0,50));
            $price=trim(substr(htmlspecialchars(strip_tags($_POST['price']), ENT_COMPAT),0,50));
            $comment=trim(substr(htmlspecialchars(strip_tags($_POST['comment']), ENT_COMPAT),0,50));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($proc_date)) {$errMsg .= "The procedure date cannot be empty. ";}
            if (empty($price)) {$errMsg .= "The price cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            //$rows = query("update history set event_date=?, people_id = ?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
            //        $event_date, $_SESSION["selected_people_id"], $notes, $user_id, $rec_id);
            $rows = query("update med_history set proc_date=?, med_proc_id = ?, people_id = ?, value = ?, price = ?, comment=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $proc_date, $proc_id, $_SESSION["selected_people_id"], $value, $price, $comment, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($proc_date);
					print_r($proc_id);
					print_r($value);
					print_r($price);
					print_r($comment);
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../page/medhist_update_form.php", ["title" => "Update Medical History", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../page/medhist_update_form.php", ["title" => "Update a medical history entry",
            "form_id" => "$id", "message" => ""]);
    }

?>
