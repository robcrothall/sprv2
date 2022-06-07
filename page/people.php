<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		//$search_name_start=trim(substr(htmlspecialchars(strip_tags($_REQUEST["search_string"]), ENT_COMPAT),0,50));
		$search_name_start=trim(substr(htmlspecialchars(strip_tags($_SESSION["search_name_start"]), ENT_COMPAT),0,50));
		//$search_name_start = $_REQUEST["search_string"];
		//print_r($search_name_start);
		//print_r($_REQUEST);
		if (empty($search_name_start))
		{
			$_SESSION["search_name_start"] = "";
		}
		else 
		{
			$_SESSION["search_name_start"] = $search_name_start;
		}
      render("../page/people_form.php", ["title" => "Next 50 People", "search_name_start" => "$search_name_start"]);
    }
    else
    {
			if (empty($_REQUEST['search_string']))
			{$search_name_start = $_SESSION["search_name_start"];}
			else {$search_name_start = $_REQUEST['search_string'];}
    	    $_SESSION["search_name_start"] = $search_name_start;
		render("../page/people_form.php", ["title" => "Top 50 People", "search_name_start" => "$search_name_start"]);
		//render("../page/people_form.php", ["title" => "Top 50 People");
    }

?>
