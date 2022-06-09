
<?php
/**
 * Program membership_add
 * 
 * Maintain the Memberships Table
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
$message = "";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
    ?>
<h1>Add a Member</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Member Name</b></td>
    <td>
        <select name="people_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n"; 
    $sql = "SELECT id, surname, first_name, given_name ";
    $sql .= "FROM people ";
    $sql .= 'where status in ("Resident", "Associate", "Inactive") ';
    $sql .= "and id not in (select people_id from memberships ";
    $sql .= "where group_id = 1) ";
    $sql .= "order by surname, first_name";
    $message .= $sql . ';';
    echo $sql;
    foreach ($handle->query($sql) as $row) {
        echo '<option value="' . $row["id"] . '">';
        $full_name = $row["surname"] . ", " . $row["first_name"];
        if (!empty($given_name)) {
            $full_name .= $row["given_name"];
        }
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top"><b>Library Management?</b></td>
    <td>
    <select name="is_manager">
        <option value="N" selected>No</option>
        <option value="Y">Yes</option>
    </select>
    </td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/memberships_list.php">
            Return to Membership List</a>&nbsp;
    </td>
</tr>
</form>
</table>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Add a Member</h1>';
    $errorList = array();
    $people_id = test_input($_POST["people_id"]);
    $is_manager = test_input($_POST["is_manager"]);
    $user_id = $_SESSION["id"];
    if ($people_id == 0) {
        $errorList[] = "Please choose a person. ";
    }
    include "../inc/db_open.php";
    if (sizeof($errorList) == 0) {
        $join_date = date("Y-m-d");
        $sql = "insert into memberships (people_id, group_id, is_manager, ";
        $sql .= "join_date, status, user_id) values (";
        $sql .= $people_id . ", 1, '" . $is_manager . "', '";
        $sql .= $join_date . "', 'Validated', " . $user_id . ")";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        $message = "Update successful.";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/memberships_list.php">';
    echo 'Back to Membership List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
