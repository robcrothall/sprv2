<?php
/**
 * Program: dashboard01.php
 * 
 * Show stats
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */

    // configuration
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    render("../page/construction_form.php");
} else {
    render("../page/dashboard01_form.php", ["title" => "Settlers Park Retirement Village Dashboard"]);
}
?>
