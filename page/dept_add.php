
<?php
/**
 * Program dept_add
 * 
 * Maintain the department table
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
<h1>Add a department</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top">Department name</td>
    <td><input size="50" maxlength="50" type="text" 
        name="dept_name" required autofocus></td>
</tr>
<tr>
    <td align="right" valign="top">Manager</td>
    <td>
        <select name="dept_manager_id">
    <?php
    $rows = query(
        "SELECT id, surname, first_name, given_name FROM people " . 
        "where status in ('Resident', 'Staff', 'Constant') " . 
        "order by surname, first_name"
    );
    foreach ($rows as $row) {
        if ($row["id"] == $assigned_to) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        $name = $row["surname"];
        if (!empty($row["first_name"])) {
            $name .= ", " . $row["first_name"];
        }
        if (!empty($row["given_name"])) {
            $name .= " (" . $row["given_name"] . ")";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Task email address</td>
    <td><input size="50" maxlength="250" type="text" 
        name="task_email"></td>
</tr>
<tr>
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../page/dept_list.php">
            Return to Department List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Add a Department</h1>';
    $errorList = array();
    $dept_name = test_input($_POST["dept_name"]);
    $user_id = $_SESSION["id"];
    if (trim($dept_name) == '') {
        $errorList[] = "Please enter a department name.";
    }
    include "../inc/db_open.php";
    $sql = 'select count(*) as kount from dept where dept_name = "';
    $sql .= $dept_name . '"';
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "A department with that name is already registered.";
        }
    }
    $dept_manager_id = 0;
    if (isset($_POST["dept_manager_id"])) {
        if (is_numeric($_POST["dept_manager_id"])) {
            $dept_manager_id = $_POST["dept_manager_id"];
        }
    }
    if ($dept_manager_id == 0) {
        $errorList[] = "Please select a manager.";
    } 
    $task_email = "";
    if (isset($_POST["task_email"])) {
        $task_email = $_POST["task_email"];
    }
    if (sizeof($errorList) == 0) {
        $sql = "insert into dept (dept_name, dept_manager_id, task_email, ";
        $sql .= "user_id) values ('";
        $sql .= $dept_name . "'," . $dept_manager_id . ",'" . $task_email . "',";
        $sql .= $user_id . ")";
        echo "<br>" . $sql . "</br>";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Department added successfully.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/dept_list.php">';
    echo 'Back to Department List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
