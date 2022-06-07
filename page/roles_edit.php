<?php
    require("../inc/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $my_id = $_SESSION["rec_id"];
      $errMsg = "";
		$sql = "Select id, role_name, role_days from roles order by role_name";
		$roles = query($sql);
		foreach ($roles as $r) {
//			$errMsg .= "| Role_id=" . $r["id"] . " Name=" . $r["role_name"];
			$expiry = date("Y-m-d",strtotime("+" . $r["role_days"] . " Days"));
			$sql = "select * from user_roles where user_id = ? and role_id = ?";
			$rows = query($sql,$my_id,$r["id"]);
			if(count($rows) == 1) {
				if(!empty($_POST[$r["id"]])) {
					// The role was already there, so change the expiry date
					$errMsg .= "| Role=" . $r["role_name"] . " - expiry updated; ";
					$sql = "update user_roles set role_expiry = ?, changed_id = ? where user_id = ? and role_id = ?";
					$result = query($sql,$expiry,$_SESSION["id"],$my_id, $r["id"]);
				} else {
					// The role should be removed
					$errMsg .= "| Role=" . $r["role_name"] . " - role removed; ";
					$sql = "delete from user_roles where user_id = ? and role_id = ?";
					$result = query($sql,$my_id, $r["id"]);
				}
			} else {
				// Role was not granted
				if(!empty($_POST[$r["id"]])) {
					$errMsg .= "| Role=" . $r["role_name"] . " - role added; ";
					$sql = "insert into user_roles (user_id, role_id, role_expiry, changed_id) values (?, ?, ?, ?)";
					$result = query($sql,$my_id, $r["id"],$expiry,$_SESSION["id"]);
				}
			}
		}
		render("../page/roles_edit_form.php", ["title" => "Edit Roles for a User", "form_id" => "$my_id", "message" => "$errMsg"]);        
    }
    else
    {
      $id = htmlspecialchars(strip_tags($_GET['id']));
		$_SESSION["rec_id"] = $id;
		if(!check_role("ADMIN")) {
			apologize("Only an Administrator can change roles.");
		}
      render("../page/roles_edit_form.php", ["title" => "Edit Roles for a User",
            "form_id" => "$id", "message" => ""]);
    }

?>
