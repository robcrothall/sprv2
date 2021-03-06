<?php
/**
 * Program: user_delete
 * 
 * Expire a user - we never delete them.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
echo '<h1>Expire a user</h1>';
$errorList = [];
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    $yesterday = date('Y-m-d', strtotime("-1 days"));
    include "../inc/db_open.php";
    $sql = "update users set member_exp = '" . $yesterday . "' where id = ";
    $sql .= $req_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $message = "User-ID is now expired.  ";
}
require "../inc/msg.php";
echo '<br><br><a class="w3-button w3-green" ';
echo 'href="../page/user_list.php">Back to user list</a>';
require "../inc/footer.php";
?>
