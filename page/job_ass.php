<?php

    // configuration
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
	$requested = $_SERVER["PHP_SELF"];
	if (!check_role("FACILITIES")) {
		apologize(
        "You are not authorised to perform this function - " . 
        "please contact SysAdmin"
		);
	} 
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        render("../page/job_ass_form.php", ["title" => "Job assignments"]);
    }
    else
    {
        if (!empty($_SESSION["selected_job_id"]))
        {
            if ($_SESSION["selected_job_id"] == 0)
            {
                apologize("You must select a job before looking at assignments.");
            }
        }
        else 
        {
            apologize("You must select a job before looking at assignments.");
        }
        render("../page/job_ass_form.php", ["title" => "Job assignments"]);
    }
?>
