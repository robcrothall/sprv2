<?php
/**
 * Program: Register
 * 
 * Register a new User.
 * php version 5
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
    
// if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate submission
    if (empty($_POST["username"])) {
        apologize("You must provide your User Name.");
    }
    if (empty($_POST["password"])) {
        apologize("You must provide your password.");
    }
    if (empty($_POST["confirmation"])) {
        apologize("You must provide your confirmation password.");
    }
    if ($_POST["password"] !== $_POST["confirmation"]) {
        apologize("Your password and confirmation password are not identical.");
    }
    if (empty($_POST["people_id"])) {
        apologize("You must select a person");
    } elseif ($_POST["people_id"] == 0) {
        apologize("You must select a person");
    }
    // query database for username
    $username = test_input(substr($_POST['username'], 0, 50));
    $rows = query("SELECT * FROM users WHERE username = ?", $username);

    // if we found user, tell him he is already registered
    if (count($rows) > 0) {
        apologize(
            "Your username has already been registered - please choose another, " . 
            "or log on.  If you don't remember your password, contact " . 
            "Administration in Settlers Park."
        );
    }
    // if the person is already registered, refuse to register her/him again
    $rows = query(
        "SELECT * FROM users WHERE people_id = ?", $_POST["people_id"]
    );

    // if we found user, tell him he is already registered
    if (count($rows) > 0) {
        apologize(
            "This person has already been registered by User Name = " . $username .
            " - please log on.  If you don't remember your password, " . 
            "contact Administration in Settlers Park."
        );
    }
    $rows = query("select * from people where id = ?", $_POST["people_id"]);
    // insert the new user into the users table
    $people_id = $rows[0]["id"];
    $username = test_input($_POST['username']);
    $surname = $rows[0]["surname"];
    $first_name = $rows[0]["first_name"];
    if (!empty($rows[0]["work_phone"])) {
        $phone = $rows[0]["work_phone"];
    } elseif (!empty($rows[0]["home_phone"])) {
        $phone = $rows[0]["home_phone"];
    } else {
        $phone = "";
    }
    if (!empty($rows[0]["mobile_phone"])) {
        $mobile = $rows[0]["mobile_phone"];
    } else {
        $mobile = "";
    }
    if (!empty($rows[0]["work_email"])) {
        $email = $rows[0]["work_email"];
    } elseif (!empty($rows[0]["home_email"])) {
        $email = $rows[0]["home_email"];
    } else {
        $email = "";
    }
    $mydate = date("Y-m-d");
    $expdate = date("Y-m-d", strtotime("+1 year"));
    $role = strtoupper($rows[0]["status"]);
    $user_id = $_SESSION["id"];
    $sql = "INSERT INTO users (username, hash, people_id, surname, first_name, ";
    $sql .= "phone, mobile, email, member_exp, last_logon, user_role, user_id) ";
    $sql .= "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $rows = query(
        $sql, $username, crypt($_POST["password"], $username), $people_id, 
        $surname, $first_name, $phone, $mobile, $email, $expdate, $mydate, 
        $role, $user_id
    );
    if ($rows === false) {
        apologize("Unable to register your user name - please contact support");
    }
    $rows = query("SELECT LAST_INSERT_ID() AS id");
    $id = $rows[0]["id"];
    $rows = query("SELECT id, role_days FROM roles WHERE role_name = ?", $role);
    if (count($rows) == 1) {
        $role_id = $rows[0]["id"];
        $role_days = $rows[0]["role_days"];
        $role_expiry = date("Y-m-d", strtotime("+" . $role_days . " day"));
        //print_r($role_expiry);
        $sql = "insert into user_roles (user_id, role_id, role_expiry, changed_id)";
        $sql .= " values (?, ?, ?, ?)";
        $rows = query($sql, $id, $role_id, $role_expiry, $user_id);
    }
    // redirect to the search page
    redirect("../ctl/search.php");
} else {
    render("../page/register_form.php", ["title" => "Register"]);
} 
?>
