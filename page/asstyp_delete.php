<?php
/**
 * Program: asstyp_delete
 * 
 * Delete an asset type.
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
echo '<h1>Delete an asset type</h1>';
$errorList = [];
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../assets/inc/db_open.php";
    $sql = "select count(*) as kount from asset where asset_type = ";
    $sql .= $req_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "An asset still exists that is of this type.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "delete from asset_type where id = " . $req_id;
        $result = mysqli_query($handle, $sql);
        if ($result <> false) {
            $message = "Asset type deleted.";
        } else {
            $message = "Unable to delete asset type - ";
            $message .= "please inform SysAdmin.";
        }
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
}
echo '<br><br><a class="w3-button w3-green" ';
echo 'href="../page/asstyp_list.php">Back to asset type list</a>';
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
