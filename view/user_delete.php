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
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../view/menu.php";
require "../assets/inc/msg.php";
echo '<h1>Expire a user</h1>';
$errorList = [];
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    $yesterday = date('Y-m-d', strtotime("-1 days"));
    include "../assets/inc/db_open.php";
    $sql = "update users set member_exp = '" . $yesterday . "' where id = ";
    $sql .= $req_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $message = "User-ID is now expired.  ";
}
require "../assets/inc/msg.php";
echo '<br><br><a class="w3-button w3-green" ';
echo 'href="../view/user_list.php">Back to user list</a>';
require "../assets/inc/footer.php";
?>
