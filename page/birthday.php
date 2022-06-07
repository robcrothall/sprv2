<?php
/**
 * Program: birthday_form
 * 
 * Display residents birthdays and anniversaries, and staff birthdays.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */

// configuration
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;
    $message = "";
    if (isset($_POST["mnth"])) {
        $mnth = $_POST["mnth"];
    } else {
        $mnth = $_SESSION["mnth"];
    }
    $age_mnth = $mnth + 1;
    if ($age_mnth > 12) {
        $age_mnth = 1;
    }
    if ($age_mnth < date('m')) {
        $age_yr = date("Y") + 1;
    } else {
        $age_yr = date("Y");
    }
    $_SESSION["mnth"] = $mnth;
    $_SESSION["age_mnth"] = $age_mnth;
    $_SESSION["age_yr"] = $age_yr;
    render("../page/birthday_form.php", ["title" => "Birthdays for current month"]);
} else {
    $error = false;
    $message = "";
    $mnth = (date('m') + 1) % 12;
    if ($mnth == 0) {
        $mnth = 12;
    }
    $age_mnth = $mnth + 1;
    if ($age_mnth > 12) {
        $age_mnth = 1;
    }
    if ($age_mnth < date('m')) {
        $age_yr = date("Y") + 1;
    } else {
        $age_yr = date("Y");
    }
    $_SESSION["mnth"] = $mnth;
    $_SESSION["age_mnth"] = $age_mnth;
    $_SESSION["age_yr"] = $age_yr;
    render("../page/birthday_form.php", ["title" => "Birthdays for current month"]);
}

?>
