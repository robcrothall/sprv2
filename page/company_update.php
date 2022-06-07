<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
            $rec_id = $_SESSION["rec_id"];
            $co_name = test_input($_POST['co_name']);
            $co_address = test_input($_POST['co_address']);
            $notes = test_input($_POST['notes']);
            $user_id = $_SESSION['id'];
            $errMsg = "";
            if (empty($co_name)) {$errMsg .= "The company name cannot be empty. ";}
            if (!empty($errMsg)) {apologize($errMsg);}
            $rows = query("update company set co_name=?, co_address=?, notes=?, user_id=?, changed=CURRENT_TIMESTAMP() where id=?",
                    $co_name, $co_address, $notes, $user_id, $rec_id);
				If ($rows === false)
				{
					print_r($rec_id);
					print_r($co_name);
					print_r($co_address);
					print_r($notes);
					print_r(strlen($notes));
					print_r($user_id);
					print_r($rows);
					apologize("Update failed.  Please call support.");
				}
				else 
				{
					render("../page/company_update_form.php", ["title" => "Update Countries", "form_id" => "$rec_id", "message" => "Update was successful."]);        
        		}
    }
    else
    {
    	$id = null;
    	if (!empty($_GET['id'])) {
      	$id = htmlspecialchars(strip_tags($_GET['id']));
      }
		$_SESSION["rec_id"] = $id;
      render("../page/company_update_form.php", ["title" => "Update a company",
            "form_id" => "$id", "message" => ""]);
    }

?>
