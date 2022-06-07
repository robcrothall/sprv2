<?php

	// configuration
	require("../inc/config.php"); 
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	if (!check_role("ADMIN")) {
		apologize(
        "You are not authorised to perform this function - " . 
        "please contact SysAdmin"
		);
	} 
	// if form was submitted
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
	}
	else
	{
		// else render form
		render("../page/roles_form.php");
	}

?>
