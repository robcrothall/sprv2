<?php
/**
 * Program: memberships_edit
 * 
 * Edit a membership.
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
    $sql = "select * ";
    $sql .= "from memberships where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from memberships - please advise SysAdmin.");
    }
    $id = $row["id"];
    $people_id = $row["people_id"];
    $group_id = $row["group_id"];
    $is_manager = $row["is_manager"];
    $join_date = $row["join_date"];
    $status = $row["status"];
    $sql = "select surname, first_name, given_name ";
    $sql .= "from people ";
    $sql .= "where id = " . $people_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from people - please advise SysAdmin.");
    }
    $full_name = $row["surname"] . ", " . $row["first_name"];
    if (!empty($row["given_name"])) {
        $full_name .= " (" . $row["given_name"] . ")";
    }
    $sql = "select group_name ";
    $sql .= "from groups ";
    $sql .= "where id = " . $group_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from groups - please advise SysAdmin.");
    }
    $group_name = $row["group_name"];
    /*$sql = "select is_manager ";
    $sql .= "from memberships ";
    $sql .= "where group_id = " . $group_id . " and people_id = ";
    $sql .= "(select people_id from users where id = " . $_SESSION["id"] . ")";
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    //var_dump($row);
    //var_dump($sql);
    if (empty($row)) {
        $user_is_manager = "N";
    } else {
        $user_is_manager = $row["is_manager"];
    } */
    //var_dump($user_is_manager);
    $user_is_manager = "Y";
    ?>
<h1>Edit Membership</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">&nbsp;&nbsp;
    <?php
    if ($user_is_manager == "Y") {
        echo '<a class="w3-button w3-green" href="../page/lib_people_edit.php?id=';
        echo $people_id . '">Update contact details</a>';
    }
    ?>
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Member Name</td>
    <td><?php echo $full_name; ?></td>
</tr>
<tr>
    <td valign="top">Group Name</td>
    <td><?php echo $group_name; ?></td>
</tr>
<tr>
    <td valign="top">Join date (mm/dd/yyyy)</td>
    <td>
        <input type="date" name="join_date" id="join_date" 
        value=<?php echo $join_date; ?>>
    </td>
</tr>
<tr>
    <td valign="top">Membership Status</td>
    <td>
        <select name="status">
    <?php
    $membership_status = ["Validated","Terminated","Excluded"];
    foreach ($membership_status as $m_status) {
        if ($m_status == $status) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo "<option value=$m_status $selected>$m_status</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" 
            href="../page/lib_memberships_list.php">Return to Memberships List</a>
        &nbsp;
    </td>

</tr>
</table>
</form>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Edit Library Membership</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    //$is_manager = test_input($_POST["is_manager"]);
    $join_date = test_input($_POST["join_date"]);
    $status = test_input($_POST["status"]);
    $user_id = $_SESSION["id"];
    if (sizeof($errorList) == 0) {
        include "../inc/db_open.php";
        $sql = "update memberships set is_manager='N'";
        $sql .= ", join_date='" . $join_date;
        $sql .= "', status='" . $status;
        $sql .= "', user_id='" . $user_id . "'";
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
    echo '<a href="../page/lib_memberships_list.php" class="w3-button w3-green">';
    echo 'Back to Membership List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
