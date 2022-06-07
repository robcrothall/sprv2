<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$rows = query("DELETE from med_history where id = ?", $_SESSION["selected_med_history_id"]);
        $message = "The event has been deleted.";
       	render("../page/medhist_form.php", ["message" => $message]);
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
        render("../page/medhist_delete_form.php", ["title" => "Delete a medical history entry",
            "form_id" => "$id"]);
         }
    }

?>
