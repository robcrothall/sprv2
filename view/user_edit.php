<?php
/**
 * Program: user_edit
 * 
 * Edit an asset.
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
    $id = test_input($_GET["id"]);
    if (trim($id) == '') {
        die("No ID specified - please inform SysAdmin.");
    }
    $sql = "select * ";
    $sql .= "from users where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No User result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $username = $row["username"];
    $person_id = $row["person_id"];
    $notes = trim($row["notes"]);
    $sql = "select surname, first_name, given_name ";
    $sql .= "from people where id = " . $person_id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    $name = $row["surname"] . ", " . $row["first_name"];
    if (!empty($row["given_name"])) {
        $name .= " (" . $row["given_name"] . ")";
    }
    ?>
<h1>Edit User</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">User</td>
    <td><?php echo $name; ?></td>
</tr>
<tr>
    <td valign="top">Username</td>
    <td><input size="50" maxlength="50" type="text" name="username"
        required value="<?php echo $username; ?>"></td>
</tr>
<tr>
    <td valign="top"><label for="notes">Notes (Optional):</label></td>
    <td><textarea id="notes" name="notes" rows="4" 
        cols="50"><?php echo $notes; ?></textarea>
    </td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/user_list.php">
            Return to User list</a>
        &nbsp;
    </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit a User</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $username = test_input($_POST["username"]);
    $notes = trim(test_input($_POST["notes"]));
    $user_id = $_SESSION["id"];
    if (trim($username) == '') {
        $errorList[] = "Please enter a User name.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = "update users set username='" . $username . "'";
        $sql .= ", notes='" . $notes . "'";
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
    echo '<a href="../page/user_list.php" class="w3-button w3-green">';
    echo 'Back to asset list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
