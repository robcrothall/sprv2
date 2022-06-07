<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       render("../page/construction_form.php");
    }
    else
    {
      	$id = $_REQUEST['id'];
        render("../page/history_read_form.php", ["title" => "Display details about a person's history",
            "form_id" => "$id"]);
    }

?>
