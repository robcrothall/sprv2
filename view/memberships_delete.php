<?php
/**
 * Program: asset_delete
 * 
 * Delete an asset.
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
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
echo '<h1>Delete a Membership</h1>';
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../assets/inc/db_open.php";
    $sql = "delete from memberships where id = " . $req_id;
    $result = mysqli_query($handle, $sql);
    if ($result <> false) {
        $message = "Membership deleted.";
    } else {
        $message = "Unable to delete membership - ";
        $message .= "please inform SysAdmin.";
    }
}
echo '<br><br><a class="w3-button w3-green" ';
echo 'href="../page/people_read.php?id=' . $_SESSION["selected_people_id"];
echo '">Back to person</a>';
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
