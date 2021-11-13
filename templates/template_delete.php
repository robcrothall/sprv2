<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$rows = query("DELETE from %table% where id = ?", $_SESSION["selected_%table%_id"]);
        $message = $_SESSION["%name%"] . " has been deleted.";
       	render("../view/%name%_form.php", ["message" => $message]);
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
        render("../view/%table%_delete_form.php", ["title" => "Delete a %table% entry",
            "form_id" => "$id"]);
         }
    }

?>
