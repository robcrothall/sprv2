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
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate fields
    $error = false;
    $message = "";
    $%name% = "";
    $%lookupName%_id = 0;
    $notes = "";
    if (empty($_POST["name"])) {
        $message .= "You must provide a name.  "; 
        $error = true;
    } else {
        $%name% = substr(htmlspecialchars(strip_tags($_POST['name'])), 0, 50);
    }
    $%lookupName%_id = substr(htmlspecialchars(strip_tags($_POST["%lookupName%_id"])), 0, 20);
    if (empty($_POST["notes"])) {
        $notes = ""; 
        $message = "No notes on this %name%?  "; 
    } else {
        $notes = substr(htmlspecialchars(strip_tags($_POST['notes'])), 0, 65534);
    }
    // Check for a duplicate %name%
    $rows = query("select count(*) rowCount from %table% where %name%=?", $%name%);
    $row = $rows[0];
    if ($row["rowCount"] > 0) {
        $message .= "This %name% already exists in our records."; 
        $error = true;
    }
    // If no errors have been detected, try to insert the row after 
    // noting some warnings
    if ($error == false) {
        $%name% = trim($%name%);
        $notes = trim($notes);
        $rowCount = query("insert into %table% (%name%, %lookupName%_id, notes, user_id, changed) values (?, ?, ?, ?, CURRENT_TIMESTAMP())", $%name%, $%lookupName%_id, $notes, $_SESSION["id"]);
        if ($rowCount == false) {
            $message .= "Record inserted successfully.";
        } else {
            $message .= "Failed to add the record - please call support!";
        }
    }
    render("../page/%table%_form.php", ["title" => "List of %title%s", "message" => "$message"]);
} else {
    $_SESSION["%lookupName%_select"] = 1; // Default to South Africa
    render("../page/%table%_create_form.php", ["title" => "Record Details of a new %title%"]);
}
?>
