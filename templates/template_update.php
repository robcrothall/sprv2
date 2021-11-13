<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $%name%=trim(substr(htmlspecialchars(strip_tags($_POST['name']), ENT_COMPAT),0,50));
            $%lookupName%_id = substr(htmlspecialchars(strip_tags($_POST['%lookupName%_id']), ENT_COMPAT),0,20);
            $notes=trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($%name%)) {$errMsg .= "The %name% name cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            $rows = query("update %table% set %name%=?, %lookupName%_id=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $%name%, $%lookupName%_id, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($%name%);
					print_r($%lookupName%_id);
					print_r($notes);
					print_r(strlen($notes));
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../view/%name%_update_form.php", ["title" => "Update %title%s", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../view/%name%_update_form.php", ["title" => "Update a %title%",
            "form_id" => "$id", "message" => ""]);
    }

?>
