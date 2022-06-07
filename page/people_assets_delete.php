<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
	$rows = query("DELETE from people_asset where id = ?", $_SESSION["rec_id"]);
        $message = "The link has been deleted.";
       	render("../page/people_assets_form.php", ["message" => $message]);
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
        render("../page/people_assets_delete_form.php", ["title" => "Delete a link",
            "form_id" => "$id"]);
         }
    }

?>
