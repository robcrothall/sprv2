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
        render("../page/company_form.php", ["title" => "All Companies"]);
    }

?>
