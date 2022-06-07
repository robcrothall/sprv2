<?php
/**
 * Program: assphone_edit
 * 
 * Display details about unattended phones in assets.
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
require "../inc/menu.php";
require "../assets/inc/msg.php";
echo '<h1>Delete unattended phone</h1>';
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../assets/inc/db_open.php";
    $sql = "delete from news where id = " . $req_id;
    $result = mysqli_query($handle, $sql);
    if ($result <> false) {
        $message = "News item deleted.";
    } else {
        $message = "Unable to delete news item - please inform SysAdmin.";
    }
}
echo '<br><br><a class="w3-button w3-green" ';
echo 'href="../page/news_list.php">Back to News List</a>';
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
