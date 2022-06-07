<?php
/**
 * Update details of Users
 *
 * Provides for creating a new user or updating details
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Controller
 * @package   SPRV
 * @author    Rob Crothall <rob@crothall.co.za>
 * @copyright 2020 Settlers Park Association
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version   SVN: $Id$
 * @link      http://pear.php.net/package/PackageName
 */
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
$requested = $_SERVER["PHP_SELF"];
if (!check_role($_SERVER["PHP_SELF"])) {
    apologize(
        "You are not authorised to perform this function - " . 
        "please contact SysAdmin"
    );
} 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        apologize("You must provide the UserName to be updated.");
    }
    $rows = query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
    if (count($rows) == 1) {
        // first (and only) row
        $row = $rows[0];
        // compare hash of user's input against hash that's in database
        if (crypt($_POST["old_pwd"], $row["hash"]) == $row["hash"]) {
            // update the password in the users table
            $new_password = crypt($_POST["new_pwd1"], $row["username"]);
            $rows = query("UPDATE users SET hash = ?, changed = CURRENT_TIMESTAMP() WHERE id = ?", $new_password, $row["id"]) ;
            if ($rows === false) {
                apologize("Unable to change password - please contact support");
            }
            $message = "Password change was successful.";
            render(
                "password_confirm_form.php", ["title" => "Password change confirmation",
                    "message" => $message]
            );
        } else {
            apologize("The value entered as current password is incorrect.");
        }
    } else {
        apologize("Username not found - call support!");
    } 
} else {
    // else render form
    render("../page/user_form.php");
}
?>
