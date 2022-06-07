<?php
/**
 * Program: medhist.php
 * 
 * Invoke medical history
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */

// configuration
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
// if form was submitted
$requested = $_SERVER["PHP_SELF"];
if (!check_role("CC")) {
    apologize(
        "You are not authorised to perform this function - " . 
        "please contact SysAdmin"
    );
} 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    render("../page/construction_form.php");
} else {
    if (!empty($_SESSION["selected_people_id"])) {
        if ($_SESSION["selected_people_id"] == 0) {
            apologize("You must select a person before looking at medical history.");
        }
    } else {
        apologize("You must select a person before looking at history.");
    }
    render("../page/medhist_form.php", ["title" => "Medical events"]);
}
?>
