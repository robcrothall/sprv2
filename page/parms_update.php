<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $parm_name=trim(substr(htmlspecialchars(strip_tags($_POST['parm_name']), ENT_COMPAT),0,30));
            $parm_value=trim(substr(htmlspecialchars(strip_tags($_POST['parm_value']), ENT_COMPAT),0,50));
            $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
            // Do some validation
            $errMsg = "";
            if (empty($parm_name)) {$errMsg .= "The parameter name cannot be empty. ";}
            if (empty($parm_value)) {$errMsg .= "The parameter value cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            //$rows = query("select count(*) rowCount from countries where country = ?",$country);
            //if ($rows[0]["rowCount"] > 0)
            //{apologize("This country is already present in our records.");}
            $rows = query("update parms_char set parm_name=?, parm_value=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $parm_name, $parm_value, $_SESSION["id"], $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($parm_name);
					print_r($parm_value);
					print_r($_SESSION["id"]);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../page/parms_update_form.php", ["title" => "Update parameter pairs", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../page/parms_update_form.php", ["title" => "Update a parameter pair",
            "form_id" => "$id", "message" => ""]);
    }

?>
