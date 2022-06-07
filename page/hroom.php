<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$_SESSION["mnth"]        = $_POST["mnth"];
		$_SESSION["mnth_c"]      = strtoupper(date("M",strtotime($_POST["readingdate"])));
		$_SESSION["accperiod"] = ((int)$_POST["mnth"] + 8) % 12 + 1;
		$_SESSION["readingdate"] = date("d/m/Y",strtotime($_POST["readingdate"]));
		$_SESSION["trans_file"] = "hroom_trans" . $_SESSION["yr_c"] . $_SESSION["mnth"] . ".csv";
		$uploads_dir = "../data";
		render("../page/hroom_ctl_form.php", ["title" => "Hibiscus Room control report for current month"]);
    }
    else
    {
		$error = false;
		$message = "";
		$_SESSION["mnth"] = date("m");
		$_SESSION["mnth_c"] = strtoupper(date("M"));
		$_SESSION["accperiod"] = ((int)date('m') + 8) % 12 + 1;
		$_SESSION["readingdate"] = date("d/m/Y");
		$_SESSION["yr_c"] = date("Y");
		$_SESSION["yr"] = (int)date("Y");
		$_SESSION["hroom_file"] = "none";
		$_SESSION["trans_file"] = "hroom_trans" . $_SESSION["yr_c"] . $_SESSION["mnth"] . ".csv";
		render("../page/hroom_form.php", ["title" => "Hibiscus Room charges for current month"]);
    }

?>
