<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
	 //print_r($_SERVER["REQUEST_METHOD"]);
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$error = false;
		$message = "";
		if (empty($_POST["surname"])) {$message .= "You must provide a surname.  "; $error = true;}
        else   {$surname=trim(substr(htmlspecialchars($_POST['surname'], ENT_COMPAT),0,50));}
		$first_name     =trim(substr(htmlspecialchars(strip_tags($_POST['first_name']), ENT_COMPAT),0,50));
        $other_name     =trim(substr(htmlspecialchars(strip_tags($_POST['other_name']), ENT_COMPAT),0,50));
        $given_name     =trim(substr(htmlspecialchars(strip_tags($_POST['given_name']), ENT_COMPAT),0,50));
        $title          =trim(substr(htmlspecialchars(strip_tags($_POST['title']), ENT_COMPAT),0,50));
        $marital_status =trim(substr(htmlspecialchars(strip_tags($_POST['marital_status']), ENT_COMPAT),0,10));
        $id_no          =trim(substr(htmlspecialchars(strip_tags($_POST['id_no']), ENT_COMPAT),0,10));
        $birth_date     =trim(substr(htmlspecialchars(strip_tags($_POST['birth_date']), ENT_COMPAT),0,50));
        $home_phone     =trim(substr(htmlspecialchars(strip_tags($_POST['home_phone']), ENT_COMPAT),0,50));
        $work_phone     =trim(substr(htmlspecialchars(strip_tags($_POST['work_phone']), ENT_COMPAT),0,50));
        $mobile_phone   =trim(substr(htmlspecialchars(strip_tags($_POST['mobile_phone']), ENT_COMPAT),0,50));
        $whatsapp       =trim(substr(htmlspecialchars(strip_tags($_POST['whatsapp']), ENT_COMPAT),0,50));
        $home_email     =trim(substr(htmlspecialchars(strip_tags($_POST['home_email']), ENT_COMPAT),0,50));
        $work_email     =trim(substr(htmlspecialchars(strip_tags($_POST['work_email']), ENT_COMPAT),0,50));
        $sex            =trim(substr(htmlspecialchars(strip_tags($_POST['sex']), ENT_COMPAT),0,50));
        $passport_no    =trim(substr(htmlspecialchars(strip_tags($_POST['passport_no']), ENT_COMPAT),0,50));
        $passport_expiry=trim(substr(htmlspecialchars(strip_tags($_POST['passport_expiry']), ENT_COMPAT),0,50));
        $driver_lic     =trim(substr(htmlspecialchars(strip_tags($_POST['driver_lic']), ENT_COMPAT),0,50));
        $driver_expiry  =trim(substr(htmlspecialchars(strip_tags($_POST['driver_expiry']), ENT_COMPAT),0,50));
        $company_id     =trim(substr(htmlspecialchars(strip_tags($_POST['company_id']), ENT_COMPAT),0,50));
        $rs_rep_id      =trim(substr(htmlspecialchars(strip_tags($_POST['rs_rep_id']), ENT_COMPAT),0,50));
        $cottage        =trim(substr(htmlspecialchars(strip_tags($_POST['cottage']), ENT_COMPAT),0,50));
        $occupation_id  =trim(substr(htmlspecialchars(strip_tags($_POST['occupation_id']), ENT_COMPAT),0,20));
        $notes          =trim(substr(htmlspecialchars(strip_tags($_POST['notes']), ENT_COMPAT),0,65534));
        $user_id        =htmlspecialchars(strip_tags($_SESSION['id']));
        // Do some validation
        $user_id=htmlspecialchars(strip_tags($_SESSION['id']));
		//print_r($user_id);
		$rows = query("select count(*) rowCount from people where surname=? and first_name=?", $surname, $first_name);
		$row = $rows[0];
		//print_r($row["rowCount"]);
		if($row["rowCount"] > 0) {$message .= "Warning: This name already exists in our records.  ";}
        if ($error == true) {apologize($message);}
		//$rows = query("insert into people (surname, first_name, other_names, given_name, title, marital_status, id_no, birth_date, home_phone, work_phone, mobile_phone, whatsapp, home_email, work_email, sex, passport_no, passport_expiry, " . 
		//"driver_lic, driver_expiry, company_id, occupation_id, rs_rep, cottage, notes, user_id) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
		//$surname, $first_name, $other_names, $given_name, $title, $marital_status, $id_no, $birth_date, $home_phone, $work_phone, $mobile_phone, $whatsapp, $home_email, $work_email, $sex, $passport_no, $passport_expiry, $driver_lic, $driver_expiry, $company_id, $occupation_id, $rs_rep_id,$cottage, $notes, $user_id);
		//$rows = query("insert into people (surname, first_name, other_names, given_name, title, marital_status, id_no, birth_date, home_phone, work_phone, mobile_phone, whatsapp, home_email, work_email, sex, passport_no, passport_expiry, " . 
		//"driver_lic, driver_expiry, company_id, occupation_id, rs_rep, cottage, notes, user_id) values (" .
		//"$surname, $first_name, $other_names, $given_name, $title, $marital_status, $id_no, $birth_date, $home_phone, $work_phone, $mobile_phone, $whatsapp, $home_email, $work_email, $sex, $passport_no, $passport_expiry, $driver_lic, $driver_expiry, $company_id, $occupation_id, $rs_rep_id,$cottage, $notes, $user_id)";
		$rows = true;
		//$rows = query("insert into people (surname, first_name, other_names, given_name, title, marital_status, id_no, birth_date, home_phone, work_phone, mobile_phone) values (?,?,?,?,?,?,?,?,?,?,?)",
		//	$surname, $first_name, $other_names, $given_name, $title, $marital_status, $id_no, $birth_date, $home_phone, $work_phone, $mobile_phone);
		//print_r($rows);
		$rows = query("insert into people (surname, first_name, other_names, given_name, title, marital_status, id_no) values (?,?,?,?,?,?,?)", 
			$surname, $first_name, $other_names, $given_name, $title, $marital_status, $id_no);
		if($rows !== false) 
			{
				 $message .= "Record inserted successfully.";
				 $_SESSION["search_name_start"] = $surname;
			}
			else {$message .= "Failed to add the record - please call support!";}
			
      render("../page/people_form.php", ["title" => "List of Peoples", "message" => "$message"]);
    }
    else
    {
    	$_SESSION["occupation_id_select"] = 0;
		render("../page/people_create_form.php", ["title" => "Record details of a new Person"]);
    }

?>
