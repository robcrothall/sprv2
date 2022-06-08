<?php
/**
 * Program: proj_delete
 * 
 * Delete an Project.
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
echo '<h1>Delete a Project</h1>';
$errorList = [];
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../inc/db_open.php";
    $sql = "select count(*) as kount from tasks where project_id = ";
    $sql .= $req_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "A task still exists that belongs to this project.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "delete from projects where id = " . $req_id;
        $result = mysqli_query($handle, $sql);
        if ($result <> false) {
            $message = "Project deleted.";
        } else {
            $message = "Unable to delete Project - ";
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
echo 'href="../page/proj_list.php">Back to Project list</a>';
require "../inc/msg.php";
require "../inc/footer.php";
?>
