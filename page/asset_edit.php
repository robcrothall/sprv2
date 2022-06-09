<?php
/**
 * Program: asset_edit
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
    $sql = "select id, asset_name, asset_type, asset_size ";
    $sql .= "from asset where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $asset_name = $row["asset_name"];
    $asset_type = $row["asset_type"];
    $asset_size = $row["asset_size"];
    ?>
<h1>Edit asset</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Asset Name</td>
    <td><input size="20" maxlength="20" type="text" name="asset_name"
        required value="<?php echo $asset_name; ?>"></td>
</tr>
<tr>
    <td valign="top">Asset type
    </td>
    <td>
        <select name="asset_type">
    <?php
    echo '<option value="0" selected>Please choose</option>\n';
    $sql  = "select id, asset_description from asset_type ";
    $sql .= "order by asset_description ";
    foreach ($handle->query($sql) as $row) {
        if ($row["id"] == $asset_type) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["asset_description"] . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Asset size (sq. m.) (Optional)</td>
    <td><input size="5" type="number" min="0" step="0.1" 
        value=<?php echo $asset_size; ?>
        name="asset_size">
    </td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/asset_list.php">
            Return to asset list</a>
        &nbsp;
    </td>

</tr>
</table>
</form>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Edit an asset</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $asset_name = test_input($_POST["asset_name"]);
    $asset_type = test_input($_POST["asset_type"]);
    $asset_size = test_input($_POST["asset_size"]);
    $user_id = $_SESSION["id"];
    if (trim($asset_name) == '') {
        $errorList[] = "Please enter a name or Cottage number.";
    }
    if (sizeof($errorList) == 0) {
        include "../inc/db_open.php";
        $sql = "update asset set asset_name='" . $asset_name . "'";
        $sql .= ", asset_type=" . $asset_type;
        $sql .= ", asset_size=" . $asset_size;
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
    echo '<a href="../page/asset_list.php" class="w3-button w3-green">';
    echo 'Back to asset list</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
