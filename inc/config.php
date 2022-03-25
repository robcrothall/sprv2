<?php
/**
 * Program: config.php
 * 
 * Standard configuration
 *  
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
// display errors, warnings, and notices
ini_set("display_errors", true);
error_reporting(E_ALL);

// requirements
date_default_timezone_set("Africa/Johannesburg");
//$WEBSITE = "sprvdev.co.za/";
require_once "../inc/constants.php";
require_once "../inc/functions.php";

// enable sessions
session_start();

// require authentication for most pages
if (!preg_match("{(?:login|logout|contact|index)\.php$}", $_SERVER["PHP_SELF"])) {
    if (empty($_SESSION["id"])) {
        redirect("../page/login.php");
    }
}
?>
