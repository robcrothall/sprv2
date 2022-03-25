<?php
/**
 * Program addtyp_add
 * 
 * Maintain the Address Types table
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
<h1>Add an address type</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Address Type</b></td>
    <td><input size="20" maxlength="20" type="text" 
        name="addr_type" required autofocus></td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/addtyp_list.php">
            Return to Address Type List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Add an Address Type</h1>';
    $errorList = array();
    $addr_type = test_input($_POST["addr_type"]);
    $user_id = $_SESSION["id"];
    if (trim($addr_type) == '') {
        $errorList[] = "Please enter an address type.";
    }
    include "../inc/db_open.php";
    $sql = 'select count(*) as kount from address_type where addr_type = "';
    $sql .= $addr_type . '"';
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "An address type with that name is already registered.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "insert into address_type (addr_type, ";
        $sql .= "user_id) values ('";
        $sql .= $addr_type . "'," . $user_id . ")";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Address type added successfully.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/addtyp_list.php">';
    echo 'Back to Address Type List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
