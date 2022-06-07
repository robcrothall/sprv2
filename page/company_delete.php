<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from people where company_id = ?", $_SESSION["company_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete or update dependent people (e.g. " . $rows[0]['first_name'] . " " .  $rows[0]['surname'] . ") before deleting the company.");
            }
         else 
         	{
					$rows = query("DELETE from company where id = ?", $_SESSION["company_id"]);
         		$message = $_SESSION["co_name"] . " has been deleted.";
         	}
       render("../page/company_form.php", ["message" => $message]);
    }
    else
    {
    	$id = null;
    	if ( !empty($_GET['id'])) {
      	$id = $_REQUEST['id'];
    	}
     
    	if ( null==$id ) {
        header("Location: index.php");
    	} else {
        render("../page/company_delete_form.php", ["title" => "Delete a company",
            "form_id" => "$id"]);
         }
    }

?>
