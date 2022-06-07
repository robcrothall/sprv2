<?php
/**
 * Program: dept_delete
 * 
 * Delete a department.
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
echo '<h1>Delete a Department</h1>';
$errorList = [];
if ((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
    $message = 'Missing record ID - please inform SysAdmin.';
} else {
    $req_id = test_input($_GET['id']);
    include "../assets/inc/db_open.php";
    $sql = "select count(*) as kount from dept_role where dept_id = ";
    $sql .= $req_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "A staff member is still shown as being in this dept.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "delete from dept where id = " . $req_id;
        $result = mysqli_query($handle, $sql);
        if ($result <> false) {
            $message = "Department has been deleted.";
        } else {
            $message = "Unable to delete department - ";
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
echo 'href="../page/dept_list.php">Back to department list</a>';
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
