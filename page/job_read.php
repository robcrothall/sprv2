<?php
/**
 * Program: job_read
 * 
 * Display the detail about a task.
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT : 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../inc/config.php";
$_SESSION["module"] = $_SERVER["PHP_SELF"];
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    render("../page/job_form.php", ["message" => $message]);
} else {
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    if (null==$id) {
        header("Location: index.php");
    } else {
        render(
            "../page/job_read_form.php", ["title" => "Read a job entry",
            "form_id" => "$id"]
        );
    }
}
?>
