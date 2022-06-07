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
        if (!empty($_SESSION["selected_people_id"]))
        {
            if ($_SESSION["selected_people_id"] == 0)
            {
                apologize("You must select a person before looking at history.");
            }
        }
        else 
        {
            apologize("You must select a person before looking at history.");
        }
        render("../page/history_form.php", ["title" => "Historical events"]);
    }
?>
