<?php

    // configuration
    require("../conf/config.php");
    
    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your User Name.");
        }
        if (empty($_POST["password"]))
        {
            apologize("You must provide your password.");
        }
        if (empty($_POST["confirmation"]))
        {
            apologize("You must provide your confirmation password.");
        }
        if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Your password and confirmation password are not identical.");
        }
        if (empty($_POST["surname"]))
        {
            apologize("You must provide your Surname.");
        }
        if (empty($_POST["first_name"]))
        {
            apologize("You must provide your first name.");
        }
        if (empty($_POST["phone"])) 
        {
        		if (empty($_POST["mobile"]))
        		{
            	apologize("You must provide at least one phone number.");
        		}
        }
        if (empty($_POST["email"]))
        {
            apologize("You must provide your email address.");
        }

        // query database for user
        $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);

        // if we found user, tell him he is already registered
        if (count($rows) == 1)
        {
            apologize("Your username has already been registered - please choose another.");
        }
        // insert the new user into the users table
        $rows = query("INSERT INTO users (username, hash, surname, first_name, phone, mobile, email, user_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)", 
            $_POST["username"], crypt($_POST["password"],$_POST["username"]), $_POST["surname"], $_POST["first_name"], 
            $_POST["phone"], $_POST["mobile"], $_POST["email"], "1");
        if ($rows === false)
        {
            apologize("Unable to register your user name - please contact support");
        }
        $rows = query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];

        // remember that user's now logged in by storing user's ID in session
        $_SESSION["id"] = $id;

        // redirect to the search page
        redirect("search");
    }
    else
    {
      render("../page/subscribe_form.php", ["title" => "Subscribe"]);
    } 
?>
