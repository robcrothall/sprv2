<?php
    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		if(isset($_POST["people_id"])) {$_SESSION["people_id"] = $_POST["people_id"];}
		else {$_SESSION["people_id"] = 0;}
		if (isset($_POST["related_id"])) {$_SESSION["related_id"] =  $_POST["related_id"];}
		else {$_SESSION["related_id"] = "0";}
		render("../page/people_related_form.php", ["title" => "People linked to other people"]);
    }
    else
    {
		$error = false;
		$message = "";
		render("../page/people_related_form.php", ["title" => "People linked to other people"]);
    }

?>
