<?php

    /**
     * config.php
     *
     * Configures pages.
     */

    // display errors, warnings, and notices
    ini_set("display_errors", true);
    error_reporting(E_ALL);

    // requirements
	date_default_timezone_set("Africa/Johannesburg");
    //$WEBSITE = "sprvdev.co.za/";
    require_once("../conf/constants.php");
    require_once("../conf/functions.php");

    // enable sessions
    session_start();

    // require authentication for most pages
    if (!preg_match("{(?:login|logout|contact|index)\.php$}", $_SERVER["PHP_SELF"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("../page/login.php");
        }
    }

?>
