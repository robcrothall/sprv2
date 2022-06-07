
<?php
/**
 * Program lib_membership_add
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
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
$message = "";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    ?>
<h1>Add a Member</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Member Name</b></td>
    <td>
        <select name="person_id">
    <?php
    $sql = 'INSERT INTO `memberships`(`person_id`, `group_id`, `is_manager`) ';
    $sql .= 'select id, 2, "N" from people ';
    $sql .= 'where status in ("Associate", "Inactive") ';
    $sql .= 'and id not in (select person_id from memberships where group_id = 2)';
    $result = query($sql);
    $message .= "Result=" . $result . ";";
    echo '<option value="0" selected>Please choose</option>' . "\n"; 
    $sql = "SELECT id, surname, first_name, given_name ";
    $sql .= "FROM people ";
    $sql .= 'where status in ("Associate", "Inactive") ';
    $sql .= "and id not in (select person_id from memberships ";
    $sql .= "where group_id = 1) ";
    $sql .= "order by surname, first_name";
    $message .= $sql . ';';
    //echo $sql;
    foreach ($handle->query($sql) as $row) {
        echo '<option value="' . $row["id"] . '">';
        $full_name = $row["surname"] . ", " . $row["first_name"];
        if (!empty($row["given_name"])) {
            $full_name .= $row["given_name"];
        }
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
    <?php
    /*$sql = "select is_manager ";
    $sql .= "from memberships ";
    $sql .= "where group_id = " . $group_id . " and person_id = ";
    $sql .= "(select person_id from users where id = " . $_SESSION["id"] . ")";
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    //var_dump($row);
    //var_dump($sql);
    if (empty($row)) {
        $user_is_manager = "N";
    } else {
        $user_is_manager = $row["is_manager"];
    }
    if ($is_manager == "Y") {
        echo "<tr>";
        echo '<td valign="top"><b>Library Management?</b></td>';
        echo "<td>";
        echo '<select name="is_manager">';
        echo '<option value="N" selected>No</option>';
        echo '<option value="Y">Yes</option>';
        echo '</select>';
        echo '</td>';
        echo '</tr>';
    }*/
    ?>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/lib_memberships_list.php">
            Return to Membership List</a>&nbsp;
    </td>
</tr>
</form>
</table>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Add a Library Member</h1>';
    $errorList = array();
    $person_id = test_input($_POST["person_id"]);
    //$is_manager = test_input($_POST["is_manager"]);
    $user_id = $_SESSION["id"];
    if ($person_id == 0) {
        $errorList[] = "Please choose a person. ";
    }
    include "../assets/inc/db_open.php";
    if (sizeof($errorList) == 0) {
        $join_date = date("Y-m-d");
        $sql = "insert into memberships (person_id, group_id, ";
        $sql .= "join_date, status, user_id) values (";
        $sql .= $person_id . ", 1, '";
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
    echo '<a class="w3-button w3-green" href="../page/lib_memberships_list.php">';
    echo 'Back to Library Membership List</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
