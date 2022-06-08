<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		$_SESSION["doc_id"] 		= $_POST["doc_id"];
		$_SESSION["doc_group"] 	= $_POST["doc_group"];
		$_SESSION["doc_name"] 	= $_POST["doc_name"];
		$_SESSION["doc_file"] 	= $_POST["doc_file"];
		$_SESSION["submitted"] 	= $_POST["submitted"];
		$_SESSION["approved"] 	= $_POST["approved"];
		$_SESSION["review"] 		= $_POST["review"];
/*		if (isset($_POST["accperiod"])) {$_SESSION["accperiod"] = $_POST["accperiod"];}
		else {$_SESSION["accperiod"] = date('m');}
		if (isset($_POST["readingdate"])) {$_SESSION["readingdate"] =  $_POST["readingdate"];}
		else {$_SESSION["readingdate"] = date("Y-m-d");}
		if (isset($_POST["mnth"])) {$_SESSION["mnth"] =  $_POST["mnth"];}
		else {$_SESSION["mnth"] = date("m");}
		if (isset($_POST["mnth_c"])) {$_SESSION["mnth_c"] =  $_POST["mnth_c"];}
		else {$_SESSION["mnth_c"] = date("M");}
		if (isset($_POST["yr_c"])) {$_SESSION["yr_c"] =  $_POST["yr_c"];}
		else {$_SESSION["yr_c"] = date("Y");}
		if (isset($_POST["yr"])) {$_SESSION["yr"] =  $_POST["yr"];}
		else {$_SESSION["yr"] = (int)date("Y");}
		if (isset($_POST["phone_file"])) {$_SESSION["phone_file"] =  $_POST["phone_file"];}
		else {$_SESSION["phone_file"] = "none";}
		if (isset($_POST["trans_file"])) {$_SESSION["trans_file"] =  $_POST["trans_file"];}
		else {$_SESSION["trans_file"] = "none";}
*/
//		$_SESSION["mnth"]        = $_POST["mnth"];
//		$_SESSION["mnth_c"]      = strtoupper(date("M",strtotime($_POST["readingdate"])));
//		$_SESSION["accperiod"]   = $_POST["accperiod"];
//		$_SESSION["accperiod"] = "0" . (string)((int)$_POST["mnth"] + 9) % 12;
//		$_SESSION["readingdate"] = $_POST["readingdate"];
//		$_SESSION["yr_c"]        = $_POST["yr_c"];
//		$_SESSION["yr"]          = $_POST["yr"];
//		$_SESSION["phone_file"]  = $_POST["phone_file"];
//		$_SESSION["trans_file"] = "phone_trans" . $_SESSION["yr_c"] . $_SESSION["mnth"] . ".csv";
		$uploads_dir = "../Docs/";
//		foreach ($_FILES["phone_file")
		render("../page/phone_ctl_form.php", ["title" => "Phone control report for current month"]);
    }
    else
    {
		$error = false;
		$message = "";
		$_SESSION["doc_id"] 		= 0;
		$_SESSION["doc_group"] 	= "";
		$_SESSION["doc_name"] 	= "";
		$_SESSION["doc_file"] 	= "";
		$_SESSION["submitted"] 	= date("YYYY-mm-dd");
		$_SESSION["approved"] 	= date("YYYYY-mm-dd");
		$_SESSION["review"] 		= strtotime(date("Y-m-d") . " +1 year");
		render("../page/docs_form.php", ["title" => "Documents to be shown"]);
    }

?>
