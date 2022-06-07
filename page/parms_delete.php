<?php
/**
 * Sample File 3, phpDocumentor Quickstart
 * 
 * This file demonstrates the use of the @name tag
 * 
 * PHP version 7.1
 * 
 * @category Template
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
    $rows = query("DELETE from parms_char where id = ?", $_SESSION["parms_char_id"]);
    $message = "Parameter" . $_SESSION["parms_char_desc"] . " has been deleted.";
    render("../page/parms_form.php", ["message" => $message]);
} else {
    $id = null;
    if (!empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if (null==$id ) {
        header("Location: index.php");
    } else {
        render(
            "../page/parms_delete_form.php", ["title" => "Delete a parameter pair",
            "form_id" => "$id"]
        );
    }
}

?>
