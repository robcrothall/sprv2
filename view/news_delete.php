
<?php
/**
 * Program: news_delete.php
 * 
 * Delete a news item.
 * php version 7.2.10
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
echo '<h1>Delete News Item</h1>';
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../inc/db_open.php";
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
require "../inc/msg.php";
require "../inc/footer.php";
?>
