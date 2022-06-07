<?php

    // configuration
    require("../conf/config.php"); 
	 $_SESSION["module"] = $_SERVER["PHP_SELF"];
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
      if(check_role("STAFF") | check_role("ADMIN")) {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide the User ID.");
        }
        else if (empty($_POST["new_pwd1"]))
        {
            apologize("You must provide the new password.");
        }
        else if (empty($_POST["new_pwd2"]))
        {
            apologize("You must provide confirmation of the new password.");
        }
        else if ($_POST["new_pwd1"] != $_POST["new_pwd2"])
        {
            apologize("The new password must match the confirmation password.");
        }
        $username = trim(substr(htmlspecialchars(strip_tags($_POST["username"]), ENT_COMPAT),0,50));
        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $username);

        // if we found user, change password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // update the password in the users table
            $new_password = crypt($_POST["new_pwd1"], $row["username"]);
            $rows = query("UPDATE users SET hash = ?, user_id=?, changed = CURRENT_TIMESTAMP() WHERE id = ?", $new_password, $_SESSION["id"], $row["id"]) ;
            if ($rows === false)
            {
                apologize("Unable to change password - please contact support");
            }
            $message = "Password change was successful.";
            render("../page/search_form.php", ["title" => "Password change confirmation",
                "message" => $message]);
        }
        else
        {
            apologize("Username not found - please try again");
        }
      }
      else {apologize("Only Staff of the Settlers Park can force password changes.");}
    }
    else
    {
        // else render form
        render("../page/password_force_form.php", ["title" => "Force change of Password",
            "message" => ""]);
    }

?>
