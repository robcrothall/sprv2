<?php
/**
 * Sample File 3, phpDocumentor Quickstart
 * 
 * This file demonstrates the use of the @name tag
 * 
 * @category Template
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT : 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
// configuration
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    render("../view/construction_form.php");
} else {
    render("../view/%table%_form.php", ["title" => "All %title%"]);
}
?>
