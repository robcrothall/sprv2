
<?php
/**
 * Program asset_add
 * 
 * Maintain the Asset Table
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
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../view/menu.php";
require "../assets/inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    ?>
<h1>Add an asset</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Asset Name</b></td>
    <td><input size="50" maxlength="50" type="text" name="asset_name" required></td>
</tr>
<tr>
    <td valign="top"><b>Asset Type</b></td>
    <td>
          <select name="asset_type">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n"; 
    $sql = "SELECT id, description FROM `asset_type` ";
    $sql .= "order by description";
    foreach ($handle->query($sql) as $row) {
        echo '<option value="' . $row["id"] . '">';
        echo $row["description"] . "</option>\n";
    }
    ?>
          </select>
    </td>
</tr>
<tr>
    <td valign="top"><b>Asset Size (sq. m.)</b></td>
    <td><input size="5" type="number" min="0" value="0" step="any" 
            name="asset_size"></input></td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../view/asset_list.php">
            Return to Asset List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Add an Asset</h1>';
    $errorList = array();
    $asset_name = test_input($_POST["asset_name"]);
    $asset_size = test_input($_POST["asset_size"]);
    $asset_type = test_input($_POST["asset_type"]);
    $user_id = $_SESSION["id"];
    if (trim($asset_name) == '') {
        $errorList[] = "Please enter a name for the asset.";
    }
    include "../assets/inc/db_open.php";
    $sql = 'select count(*) as kount from asset where asset_name = "';
    $sql .= $asset_name . '"';
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "An asset with that name is already registered.";
        }
    }
    if ((trim($asset_type) == '' || !is_numeric($asset_type)) || $asset_type < 1) {
        $errorList[] = "Asset type is invalid.";
    }
    if (isset($asset_size) && strlen($asset_size) > 0) {
        if (trim($asset_size) == '' 
            || !is_numeric($asset_size) 
            || $asset_size < 0
        ) {
            $errorList[] = "Asset size is invalid.";
        }
    } else {
        $asset_size = 0;
    }
    if (sizeof($errorList) == 0) {
        $sql = "insert into asset (asset_name, asset_type, ";
        $sql .= "asset_size, user_id) values ('";
        $sql .= $asset_name . "'," . $asset_type . ",";
        $sql .= $asset_size . ',' . $user_id . ")";
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
    echo '<a class="w3-button w3-green" href="../view/asset_list.php">';
    echo 'Back to Asset List</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
