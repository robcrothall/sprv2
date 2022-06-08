
<?php
/**
 * Program proj_add
 * 
 * Maintain the Projects table
 * 
 * PHP version 7.1
 * 
 * @category Template
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
    ?>
<h1>Add a project</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Project</b></td>
    <td><input size="80" maxlength="80" type="text" 
        name="proj_name" required autofocus></td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/proj_list.php">
            Return to Project List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Add a project</h1>';
    $errorList = array();
    $proj_name = test_input($_POST["proj_name"]);
    $user_id = $_SESSION["id"];
    if (trim($proj_name) == '') {
        $errorList[] = "Please enter a project name.";
    }
    include "../inc/db_open.php";
    $sql = 'select count(*) as kount from projects where proj_name = "';
    $sql .= $proj_name . '"';
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "A project with that name is already registered.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "insert into projects (proj_name, ";
        $sql .= "user_id) values ('";
        $sql .= $proj_name . "'," . $user_id . ")";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Project added successfully.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/proj_list.php">';
    echo 'Back to Project List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
