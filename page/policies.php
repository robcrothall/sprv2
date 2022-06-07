<!--<div>
<img src="../assets/img/construction.gif" alt="Under construction">
</div> -->
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
        render("../page/policies_form.php", ["title" => "All Policies"]);
    }

?>
