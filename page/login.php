<?php
/**
 * Process Logon requests.
 * php version 5
 * 
 * @category SPRV
 * @package  Authentication
 * @author   Rob Crothall <rob@crothall.co.za>
 * @license  <a rel="license" 
 * href="http://creativecommons.org/licenses/by/4.0/">
 * <img alt="Creative Commons License" style="border-width:0" 
 * src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a>
 * <br />This work is licensed under a <a rel="license" 
 * href="http://creativecommons.org/licenses/by/4.0/">
 * Creative Commons Attribution 4.0 International License</a>. CC0
 * @version  GIT: 
 * @link     ../page/search.php
 */
// configuration
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
$_SESSION["id"] = "0";
$_SESSION["username"] = "Unknown";
$_SESSION["user_first_name"] = "";
$_SESSION["user_surname"] = "Unknown";
$_SESSION["member_exp"] = "Unknown";
$_SESSION["selected_people_id"] = 0;
$_SESSION["search_name_start"] = "";
require "../inc/header.php";
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate submission
    if (empty($_POST["username"])) {
        apologize("You must provide your username.");
    } else if (empty($_POST["password"])) {
            apologize("You must provide your password.");
    }
    $user_name_given = $_POST["username"];
    $password_given = $_POST["password"];
    // query database for user
    $rows = query("SELECT * FROM users WHERE username = ?", $user_name_given);
    // if we found user, check password
    if (count($rows) == 1) {
        // first (and only) row
        $row = $rows[0];
        // compare hash of user's input against hash that's in database
        if (crypt($_POST["password"], $row["hash"]) == $row["hash"]) {
            // remember that user's now logged in by storing user's ID in session
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["member_exp"] = $row["member_exp"];
            $people_id = $row["people_id"];
            $rows = query("SELECT * FROM people WHERE id = ?", $people_id);
            $row = $rows[0];
            $_SESSION["user_first_name"] = $row["first_name"];
            $_SESSION["user_surname"] = $row["surname"];
            // log it
            $success = true;
            login_log($user_name_given, $password_given, $success);
            $today = date("Y-m-d");
            $rows = query(
                "update users set last_logon = ? where id = ?", 
                $today, $_SESSION["id"]
            );
            // redirect to search
            redirect("../page/news_list.php");
        }
    } else {
        $rows = query(
            "SELECT id, account_no, old_account_no, id_no, surname, first_name 
            FROM people where id_no = ?", $password_given
        );
        if (count($rows) == 1) {
            $row = $rows[0];
            if (strtoupper($row["account_no"]) == strtoupper($user_name_given)) {
                $new_pw = crypt($password_given, $user_name_given);
                $sql = "insert into users (username, hash, surname, first_name, ";
                $sql .= "member_exp, last_logon, user_role, user_id) ";
                $sql .= "values (?,?,?,?,?,?,?,?)";
                $rows = query(
                    $sql, $row["account_no"], $new_pw, 
                    $rows[0]["surname"], $rows[0]["first_name"], 
                    date("Y-m-d", strtotime("+1 year")), date("Y-m-d"), "RESIDENT", 1
                );
                if ($rows === false) {
                    apologize(
                        "Unable to register your user name - please contact support"
                    );
                }
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $row["account_no"];
                $_SESSION["user_first_name"] = $row["first_name"];
                $_SESSION["user_surname"] = $row["surname"];
                // log it
                $success = true;
                login_log($user_name_given, $password_given, $success);
                $today = date("Y-m-d");
                //$rows = query("update users set last_logon = ? where id = ?", 
                //    $today, $_SESSION["id"]);
                // redirect to search
                redirect("../page/news_list.php");
            } else {
                $success = false;
                //print_r(strtoupper($row["account_no"]));
                //print_r(strtoupper($user_name_given));
                login_log($user_name_given, $password_given, $success);
            }
        }
    }
    // log it
    // print_r(strtoupper($row["account_no"]));
    // print_r(strtoupper($user_name_given));
    $success = false;
    login_log($user_name_given, $password_given, $success);
    // else apologize
    apologize("Invalid username and/or password.");
} else {
    echo "<p>Employees should use the User Name and ";
    echo "password assigned to them.</p>\n";
    echo "<p>Residents should use their Account Code ";
    echo "(from their monthly statement)"; 
    echo " as a User Name, and their ID No as a password.</p>";
    echo '<form action="login.php" method="post" width="100%">';
    echo '<fieldset>';
    echo '  <div class="form-group">';
    echo '    <input autofocus class="form-control" name="username"'; 
    echo ' placeholder="User name" type="text"/>';
    echo '  </div>';
    echo '        <div class="form-group">';
    echo '            <input class="form-control" name="password" ';
    echo 'placeholder="Password"'; 
    echo '            type="password"/>';
    echo '        </div>';
    echo '        <div class="form-group">';
    echo '            <button type="submit" class="w3-button w3-green">';
    echo 'Log in</button>';
    echo '        </div>';
    echo '    </fieldset>';
    echo '</form>';
    echo '<h2>Purpose of this site</h2>';
    echo '<p>The Settlers Park Retirement Village site ';
    echo "provides a service where details \n";
    echo '    of Settlers Park Policies and Procedures, ';
    echo "and some other functions, \n";
    echo '    are made available to authorised staff and Residents.</p>';
    echo '<p>';
    echo 'If any information found on the site is thought ';
    echo 'to be inaccurate or inappropriate, ';
    echo 'please send details to';
    echo ' <a href="mailto:gm@settlerspark.co.za?Subject=SPRV%20Website" ';
    echo '   target="_top">the General Manager of Settlers Park</a> .';
    echo '</p>';
    echo '<h2>The Rules...</h2>';
    echo '<p>You are welcome to use these facilities as a ';
    echo 'Resident or member of staff'; 
    echo '    of Settlers Park Retirement Village.</p>';
}
?>
