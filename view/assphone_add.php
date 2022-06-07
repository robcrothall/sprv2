<?php
/**
 * Program: assphone_add
 * 
 * Add an unattended phone.
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    ?>
<h1>Add an unattended phone</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Phone No</td>
    <td><input size="16" maxlength="16" type="tel" 
        required autofocus name="phone"></td>
</tr>
<tr>
    <td valign="top">Asset</td>
    <td>
        <select name="asset_id">
    <?php
    echo '<option value="0" selected>Please choose</option>\n';
    $sql  = "select id, asset_name from asset ";
    $sql .= "where asset_type = 3 ";
    $sql .= "order by asset_name ";
    foreach ($handle->query($sql) as $row) {
        $selected = "";
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["asset_name"] . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Comment</td>
    <td><input size="50" maxlength="50" type="text" name="descr"></td>
</tr>
<tr>
    <td valign="top">Account No</td>
    <td><input size="10" maxlength="10" type="text" name="account_no"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Add" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/assphone_list.php">
            Return to phone list</a>
        &nbsp;
    </td>

</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Add an unattended phone</h1>';
    $errorList = array();
    $asset_id = test_input($_POST["asset_id"]);
    $descr = trim(test_input($_POST["descr"]));
    $phone = trim(test_input($_POST["phone"]));
    $account_no = trim(test_input($_POST["account_no"]));
    if ($asset_id == 0) {
        $errorList[] = "Please select an asset.";
    }
    if ($phone == '') {
        $errorList[] = "Please enter a phone number.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = "insert into asset_phone (asset_id, phone, descr, account_no) ";
        $sql .= "values (";
        $sql .= $asset_id . ", '" . $phone . "', '" . $descr . "', ";
        $sql .= "'" . $account_no . "')";
        //echo "<br>" . $sql . "<br>";
        $result = mysqli_query($handle, $sql)
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Update successful.<br><br>";
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" ';
    echo 'href="../page/assphone_list.php">Back to unattended phone list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
