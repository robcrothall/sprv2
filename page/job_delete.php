<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$rows = query("DELETE from jobs where id = ?", $_SESSION["rec_id"]);
   	$message = "The job has been deleted.";
		$_SESSION["current_job"] = '';
      render("../page/job_form.php", ["message" => $message]);
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
        render("../page/job_delete_form.php", ["title" => "Delete a job entry",
            "form_id" => "$id"]);
         }
    }

?>
