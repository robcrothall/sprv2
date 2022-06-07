<?php
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$rows = query("DELETE from people_related where id = ?", $_SESSION["rec_id"]);
		$message = "The relationship has been deleted.";
		render("../page/people_related_form.php", ["message" => $message]);
    }
    else
    {
    	$id = null;
    	if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }
	 if ( null==$id ) {
        header("Location: index.php");
    } else {
        render("../page/people_related_delete_form.php", ["title" => "Delete a relationship",
            "form_id" => "$id"]);
    	}
    }

?>
