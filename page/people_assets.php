<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		if(isset($_POST["people_id"])) {$_SESSION["people_id"] = $_POST["people_id"];}
		else {$_SESSION["people_id"] = 0;}
		if (isset($_POST["asset_id"])) {$_SESSION["asset_id"] =  $_POST["asset_id"];}
		else {$_SESSION["asset_id"] = "0";}
		render("../page/people_assets_form.php", ["title" => "People linked to Assets"]);
    }
    else
    {
		$error = false;
		$message = "";
		render("../page/people_assets_form.php", ["title" => "People linked to Assets"]);
    }

?>
