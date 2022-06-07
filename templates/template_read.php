<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       render("../page/construction_form.php");
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
        render("../page/%name%_read_form.php", ["title" => "Display details about a %title%",
            "form_id" => "$id"]);
         }
    }

?>
