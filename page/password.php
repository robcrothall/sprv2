<?php
/**
 * Program: password.php
 * 
 * Change a password.
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
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errorList = array();
    // validate submission
    if (empty($_POST["old_pwd"])) {
        $errorList[] = "You must provide your current password.";
    } else if (empty($_POST["new_pwd1"])) {
        $errorList[] = "You must provide your new password.";
    } else if (empty($_POST["new_pwd2"])) {
        $errorList[] = "You must provide confirmation of your new password.";
    } else if ($_POST["new_pwd1"] != $_POST["new_pwd2"]) {
        $errorList[] = "Your new password must match your confirmation password.";
    }
    $password = '';
    if (!empty($_POST["new_pwd1"])) {
        $password = $_POST["new_pwd1"];
    }
    $number = preg_match('@[0-9]@', $password);
    $upper = preg_match('@[A-Z]@', $password);
    $lower = preg_match('@[a-z]@', $password);
    $specials = preg_match('@[^\w]@', $password);
    if (strlen($password) < 8 || !$number || !$upper || !$lower || !$specials) {
        $errorList[] = "Password must:";
        $errorList[] = "- be at least eight characters";
        $errorList[] = "- contain at least one numeral";
        $errorList[] = "- contain at least one lower case letter";
        $errorList[] = "- contain at least one upper case letter";
        $errorList[] = "- contain at least one special character";
    }
    if (sizeof($errorList) == 0) {
        // query database for user
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        // if we found user, check password
        if (count($rows) == 1) {
            // first (and only) row
            $row = $rows[0];
            // compare hash of user's input against hash that's in database
            if (crypt($_POST["old_pwd"], $row["hash"]) == $row["hash"]) {
                // update the password in the users table
                $new_password = crypt($_POST["new_pwd1"], $row["username"]);
                $rows = query(
                    "UPDATE users SET hash = ?, changed = CURRENT_TIMESTAMP() " . 
                    "WHERE id = ?", $new_password, $row["id"]
                );
                if ($rows === false) {
                    $errorList[] 
                        = "Unable to change password - please contact support";
                }
                $message = "Password change was successful.";
                render(
                    "../page/password_confirm_form.php", 
                    ["title" => "Password change confirmation",
                    "message" => $message]
                );
            } else {
                $errorList[] = "The value entered as current password is incorrect.";
            }
        } else {
            $errorList[] = "Username not found - call support!";
        }
    } else {
        $message = 'The following errors were encountered:<br>';
        $message .= '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            $message .= "<li>$errorList[$x]</li>";
        }
        $message .= "</ul>";
        render(
            "../page/password_form.php", ["title" => "Change Password",
            "message" => $message]
        );
    }
} else {
    // else render form
    render(
        "../page/password_form.php", ["title" => "Change Password",
        "message" => ""]
    );
}
?>
