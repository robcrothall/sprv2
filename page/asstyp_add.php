
<?php
/**
 * Program asstyp_add
 * 
 * Maintain the Asset Types table
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
require "../inc/menu.php";
require "../assets/inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    ?>
<h1>Add an asset type</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Asset Type</b></td>
    <td><input size="20" maxlength="20" type="text" name="description" required></td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/asstyp_list.php">
            Return to Asset Type List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Add an Asset Type</h1>';
    $errorList = array();
    $description = test_input($_POST["description"]);
    $user_id = $_SESSION["id"];
    if (trim($description) == '') {
        $errorList[] = "Please enter an asset description.";
    }
    include "../assets/inc/db_open.php";
    $sql = 'select count(*) as kount from asset_type where description = "';
    $sql .= $description . '"';
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "An asset type with that name is already registered.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "insert into asset_type (description, ";
        $sql .= "user_id) values ('";
        $sql .= $description . "'," . $user_id . ")";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Asset type added successfully.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/asstyp_list.php">';
    echo 'Back to Asset Type List</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>