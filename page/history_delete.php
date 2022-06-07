<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$rows = query("DELETE from history where id = ?", $_SESSION["selected_history_id"]);
        $message = "The event has been deleted.";
       	render("../page/history_form.php", ["message" => $message]);
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
        render("../page/history_delete_form.php", ["title" => "Delete a history entry",
            "form_id" => "$id"]);
         }
    }

?>
