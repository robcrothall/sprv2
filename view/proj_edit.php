<?php
/**
 * Program: proj_edit
 * 
 * Edit a Project.
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select id, proj_name ";
    $sql .= "from projects where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $proj_name = $row["proj_name"];
    ?>
<h1>Edit asset type</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Project</td>
    <td><input size="80" maxlength="80" type="text" name="proj_name"
        required autofocus value="<?php echo $proj_name; ?>"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/proj_list.php">
            Return to Project list</a>
        &nbsp;
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit a Project</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $proj_name = test_input($_POST["proj_name"]);
    $user_id = $_SESSION["id"];
    if (trim($proj_name) == '') {
        $errorList[] = "Please enter a Project name.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = "update projects set proj_name='" . $proj_name . "'";
        $sql .= ", user_id='" . $user_id . "'";
        $sql .= " where id = $id";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Update successful.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a href="../page/proj_list.php" class="w3-button w3-green">';
    echo 'Back to Project list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>