<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$_SESSION["mnth"]        = $_POST["mnth"];
		$_SESSION["reading_date"]= strtotime($_POST["readingdate"]);
		$_SESSION["year_n"]      = date("Y",$_SESSION["reading_date"]);
		$_SESSION["mnth_n"]      = date("m",$_SESSION["reading_date"]);
		$_SESSION["day_n"]      = date("d",$_SESSION["reading_date"]);
		$_SESSION["mnth_c"]      = strtoupper(date("M",strtotime($_POST["readingdate"])));
		$_SESSION["accperiod"] = ((int)$_POST["mnth"] + 8) % 12 + 1;
		$_SESSION["readingdate"] = date("d/m/Y",strtotime($_POST["readingdate"]));
		$_SESSION["trans_file"] = "phone_trans" . $_SESSION["year_n"] . $_SESSION["mnth"] . ".csv";
		$uploads_dir = "../data";
		render("../page/phone_ctl_form.php", ["title" => "Phone control report for current month"]);
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
		$_SESSION["phone_file"] = "none";
		$_SESSION["trans_file"] = "phone_trans" . $_SESSION["yr_c"] . $_SESSION["mnth"] . ".csv";
		render("../page/phone_form.php", ["title" => "Phone charges for current month"]);
    }

?>
