<?php

	// configuration
	require_once "../inc/config.php"; 

   // if form was submitted
   if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$cmd_select = "SELECT distinct a.id, a.surname, a.first_name, a.occupation_id, b.occupation, c.co_name";
		$cmd_tables = " from people a, occupation b, company c";
		$cmd_where = " where b.id = occupation_id and c.id = a.company_id";
		$cmd_order_by = " order by surname, first_name";
		if (check_role("STAFF" | check_role("ADMIN" ) 
			{$cmd_limit = "";}
		else 
			{$cmd_limit = " limit 50";}
		$search_string = " ";
		// build up the search string
		if (!empty($_POST["surname"]))
      	{$search_string .= "and surname like '" . trim(substr(htmlspecialchars(strip_tags($_POST['surname']), ENT_COMPAT),0,50)) . "' ";}
		if (!empty($_POST["first_name"]))
      	{$search_string .= "and first_name like '" . trim(substr(htmlspecialchars(strip_tags($_POST["first_name"]), ENT_COMPAT),0,50)) . "' ";}
		if (!empty($_POST["other_name"]))
      	{$search_string .= "and other_name like '" . trim(substr(htmlspecialchars(strip_tags($_POST["other_name"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["title"]) && trim(substr(htmlspecialchars(strip_tags($_POST["title"]), ENT_COMPAT),0,50)) != "any")
			{$search_string .= "and title = '" . trim(substr(htmlspecialchars(strip_tags($_POST["title"]), ENT_COMPAT),0,50)) . "' ";}
	//	if (!empty($_POST["status"]) && trim(substr(htmlspecialchars(strip_tags($_POST["occupation_id"]), ENT_COMPAT),0,50)) != "any")
	//		{$search_string .= "and status = '" . trim(substr(htmlspecialchars(strip_tags($_POST["status"]), ENT_COMPAT),0,50)) . "' ";}
	//	if (!empty($_POST["date_from"]))
	//		{$search_string .= "and status_date >= '" . trim(substr(htmlspecialchars(strip_tags($_POST["date_from"]), ENT_COMPAT),0,50)) . "' ";}
	//	if (!empty($_POST["date_to"]))
	//		{$search_string .= "and status_date <= '" . trim(substr(htmlspecialchars(strip_tags($_POST["date_to"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["occupation_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["occupation_id"]), ENT_COMPAT),0,50)) != "any")
			{$search_string .= "and occupation_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["occupation_id"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["company_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["company_id"]), ENT_COMPAT),0,50)) != "any")
			{$search_string .= "and company_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["company_id"]), ENT_COMPAT),0,50)) . "' ";}
		if(!empty($_POST["checked"]) && trim(substr(htmlspecialchars(strip_tags($_POST["checked"]), ENT_COMPAT),0,50)) != "any")
			{$search_string .= "and checked = '" . trim(substr(htmlspecialchars(strip_tags($_POST["checked"]), ENT_COMPAT),0,50)) . "' ";}
	//	if(!empty($_POST["place_id"]) && trim(substr(htmlspecialchars(strip_tags($_POST["place_id"]), ENT_COMPAT),0,50)) != "any")
	//		{
	//			$search_string .= "and place_id = '" . trim(substr(htmlspecialchars(strip_tags($_POST["place_id"]), ENT_COMPAT),0,50)) . "' ";
	//			$cmd_tables .= ", history d";
	//			$cmd_where .= " and d.people_id = a.id";
	//		}

		$cmd_full = $cmd_select . $cmd_tables . $cmd_where . $search_string . $cmd_order_by . $cmd_limit;
		//print_r($cmd_full);
		render("../page/search_results_form.php", ["title" => "All Peoples", "search_string" => $cmd_full]);
    }	
    else
    {
    	// else render form
      render("../page/search_form.php", ["title" => "Search for People"]);
    }

?>
