<?php
/**
 * Program: addtyp_edit
 * 
 * Edit an address type.
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
require "../view/menu.php";
require "../assets/inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select id, addr_type ";
    $sql .= "from address_type where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $addr_type = $row["addr_type"];
    ?>
<h1>Edit asset type</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Address Type</td>
    <td><input size="20" maxlength="20" type="text" name="addr_type"
        required autofocus value="<?php echo $addr_type; ?>"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../view/addtyp_list.php">
            Return to address type list</a>
        &nbsp;
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit an address type</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $addr_type = test_input($_POST["addr_type"]);
    $user_id = $_SESSION["id"];
    if (trim($addr_type) == '') {
        $errorList[] = "Please enter an address type.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = "update address_type set addr_type='" . $addr_type . "'";
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
    echo '<a href="../view/addtyp_list.php" class="w3-button w3-green">';
    echo 'Back to address type list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
