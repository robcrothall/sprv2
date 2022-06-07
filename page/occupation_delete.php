<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
         $rows = query("SELECT * from people where occupation_id = ? order by surname, first_name", $_SESSION["occupation_id"]);
         if (count($rows) > 0)
            {
					apologize("Delete dependent places before deleting the occupation.");
            }
         else 
         	{
					$rows = query("DELETE from occupation where id = ?", $_SESSION["occupation_id"]);
         		$message = $_SESSION["occupation"] . " has been deleted.";
         	}
       render("../page/occupation_form.php", ["message" => $message]);
    }
    else
    {
      	$id = $_REQUEST['id'];
		$_SESSION["occupation_id"] = $id;
		render("../page/occupation_delete_form.php", ["title" => "Delete an occupation",
            "form_id" => "$id"]);
    }

?>
