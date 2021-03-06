<?php
/**
 * Program: asstyp_edit
 * 
 * Edit an asset.
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select id, asset_description ";
    $sql .= "from asset_type where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $description = $row["asset_description"];
    ?>
<h1>Edit asset type</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Asset Type</td>
    <td><input size="20" maxlength="20" type="text" name="asset_description"
        required value="<?php echo $description; ?>"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/asstyp_list.php">
            Return to asset type list</a>
        &nbsp;
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Edit an asset type</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $description = test_input($_POST["asset_description"]);
    $user_id = $_SESSION["id"];
    if (trim($description) == '') {
        $errorList[] = "Please enter an asset description.";
    }
    if (sizeof($errorList) == 0) {
        include "../inc/db_open.php";
        $sql = "update asset_type set asset_description='" . $description . "'";
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
    echo '<a href="../page/asstyp_list.php" class="w3-button w3-green">';
    echo 'Back to asset list</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
