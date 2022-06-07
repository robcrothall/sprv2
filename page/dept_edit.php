<?php
/**
 * Program: dept_edit
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
require "../inc/menu.php";
require "../assets/inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select id, dept_name, dept_manager_id, job_email ";
    $sql .= "from dept where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $dept_name = $row["dept_name"];
    $dept_manager_id = $row["dept_manager_id"];
    $job_email = $row["job_email"];
    ?>
<h1>Edit department</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top" align="right">Department name</td>
    <td><input size="50" maxlength="50" type="text" name="dept_name"
        required autofocus value="<?php echo $dept_name; ?>"></td>
</tr>
    <?php
    // include "../assets/inc/html_manager_select.php";
    ?>
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
        if ($row["id"] == $dept_manager_id) {
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
    <td valign="top">Email address for Tasks</td>
    <td><input size="50" maxlength="250" type="email" name="job_email"
        value="<?php echo trim($job_email); ?>"></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/dept_list.php">
            Return to department list</a>
        &nbsp;
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit a Department</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $dept_name = test_input($_POST["dept_name"]);
    $user_id = $_SESSION["id"];
    if (trim($dept_name) == '') {
        $errorList[] = "Please enter a department name.";
    }
    $dept_manager_id = 0;
    if (isset($_POST["dept_manager_id"])) {
        if (is_numeric($_POST["dept_manager_id"])) {
            $dept_manager_id = test_input($_POST["dept_manager_id"]);
        }
    }
    if ($dept_manager_id == 0) {
        $errorList[] = "Please select a manager.";
    } 
    $job_email = "";
    if (isset($_POST["job_email"])) {
        $job_email = test_input($_POST["job_email"]);
    }
    if (strlen($job_email) > 0) {
        if (!filter_var($job_email, FILTER_VALIDATE_EMAIL)) {
            $errorList[] = "Invalid email format.";
        }
    }
    include "../assets/inc/db_open.php";
    $sql = 'select count(*) as kount from dept where dept_name = "';
    $sql .= $dept_name . '" and id <> ' . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    foreach ($handle->query($sql) as $row) {
        if ($row["kount"] > 0) {
            $errorList[] = "A department with that name is already registered.";
        }
    }
    if (sizeof($errorList) == 0) {
        $sql = "update dept set dept_name='" . $dept_name . "'";
        $sql .= ", dept_manager_id=" . $dept_manager_id;
        $sql .= ", job_email='" . $job_email . "'";
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
    echo '<a href="../page/dept_list.php" class="w3-button w3-green">';
    echo 'Back to department list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
