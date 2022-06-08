<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$rows = query("DELETE from tasks where id = ?", $_SESSION["rec_id"]);
   	$message = "The task has been deleted.";
		$_SESSION["current_task"] = '';
      render("../page/task_form.php", ["message" => $message]);
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
        render("../page/task_delete_form.php", ["title" => "Delete a task entry",
            "form_id" => "$id"]);
         }
    }

?>
