<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from regions where country_id = ? order by region", $_SESSION["country_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete dependent regions before deleting the country.");
            }
         else 
         	{
					$rows = query("DELETE from countries where id = ?", $_SESSION["country_id"]);
         		$message = $_SESSION["country"] . " has been deleted.";
         	}
       render("../page/country_form.php", ["message" => $message]);
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
        render("../page/country_delete_form.php", ["title" => "Delete a country",
            "form_id" => "$id"]);
         }
    }

?>
