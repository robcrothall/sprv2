<?php
/**
 * Program: assphone_edit
 * 
 * Display details about unattended phones in assets.
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
    $sql = "select id, asset_id, phone, descr, account_no ";
    $sql .= "from asset_phone where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $asset_id = $row["asset_id"];
    $phone = $row["phone"];
    $descr = $row["descr"];
    $account_no = $row["account_no"];
    ?>
<h1>Edit asset phones</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Phone No</td>
    <td><input size="16" maxlength="16" type="tel" name="phone"
        value="<?php echo $phone; ?>"></td>
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
        if ($row["id"] == $asset_id) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["asset_name"] . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Comment</td>
    <td><input size="50" maxlength="50" type="text" name="descr"
        value="<?php echo $descr; ?>"></td>
</tr>
<tr>
    <td valign="top">Account No</td>
    <td><input size="10" maxlength="10" type="text" name="account_no"
        value="<?php echo $account_no; ?>"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
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
    echo '<h1>Edit an unattended phone</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $phone = test_input($_POST["phone"]);
    $asset_id = test_input($_POST["asset_id"]);
    $descr = test_input($_POST["descr"]);
    $account_no = test_input($_POST["account_no"]);
    if (trim($phone) == '') {
        $errorList[] = "Please enter a phone number.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = "update asset_phone set phone='" . $phone . "'";
        $sql .= ", asset_id=" . $asset_id;
        $sql .= ", descr='" . $descr . "'";
        $sql .= ", account_no='" . $account_no . "'";
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
    echo '<a href="../page/assphone_list.php" class="w3-button w3-green">';
    echo 'Back to unattended phone list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
