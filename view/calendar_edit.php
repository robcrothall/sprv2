<?php
/**
 * Program: calendar_edit
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
    $sql = "select id, start_date, start_time, end_date, end_time, asset_id, ";
    $sql .= "event_name, resp_person_id, contact_person_id, private_event, notes ";
    $sql .= "from calendar where id = " . $id;
    $result = mysqli_query($handle, $sql)
        or die("Error in query: $sql. " . mysqli_error($handle));
    $row = $result->fetch_array();
    if (count($row) == 0) {
        die("No result returned from database - please advise SysAdmin.");
    }
    $id = $row["id"];
    $start_date = $row["start_date"];
    $start_time = $row["start_time"];
    $end_date = $row["end_date"];
    $end_time = $row["end_time"];
    $asset_id = $row["asset_id"];
    $event_name = $row["event_name"];
    $resp_person_id = $row["resp_person_id"];
    $contact_person_id = $row["contact_person_id"];
    $private_event = $row["private_event"];
    $notes = $row["notes"];
    ?>
<h1>Edit calendar entry</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<table cellspacing="5" cellpadding="5">
<tr>
    <td valign="top">Start date</td>
    <td><input type="date" name="start_date"
        required value="<?php echo $start_date; ?>"></td>
</tr>
<tr>
    <td><label for="start_time">Start time:</label></td>
    <td><input type="time" id="start_time" name="start_time" 
        value="<?php echo $start_time; ?>"></td>
</tr>
<tr>
    <td valign="top">End date</td>
    <td><input type="date" name="end_date"
        required value="<?php echo $end_date; ?>"></td>
</tr>
<tr>
    <td><label for="start_time">End time:</label></td>
    <td><input type="time" id="end_time" name="end_time" 
        value="<?php echo $end_time; ?>"></td>
</tr>
<tr>
    <td valign="top">Calendar Asset</td>
    <td>
        <select name="asset_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
    $sql  = "select id, asset_name from calendar_assets ";
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
    <td valign="top">Event Name:</td>
    <td><input size="50" type="text" name="event_name"
        value="<?php echo $event_name; ?>"></td>
</tr>
<tr>
    <td valign="top">Responsible Person</td>
    <td>
        <select name="resp_person_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
    $sql  = 'select id, surname, first_name, given_name  ';
    $sql .= 'from people ';
    $sql .= 'order by surname, first_name ';
    foreach ($handle->query($sql) as $row) {
        if ($row["id"] == $resp_person_id) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        $full_name = $row["surname"] . ', ' . $row["first_name"];
        if (!empty($row["given_name"])) {
            $full_name .= ' (' . $row["given_name"] . ')';
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Contact Person</td>
    <td>
        <select name="contact_person_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
    $sql  = 'select id, surname, first_name, given_name  ';
    $sql .= 'from people ';
    $sql .= 'order by surname, first_name ';
    foreach ($handle->query($sql) as $row) {
        if ($row["id"] == $contact_person_id) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        $full_name = $row["surname"] . ', ' . $row["first_name"];
        if (!empty($row["given_name"])) {
            $full_name .= ' (' . $row["given_name"] . ')';
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Private Event</td>
    <td>
        <select name="private_event">
    <?php
    if ($private_event == "N") {
        echo '<option value="N" selected>No</option>' . "\n";
    } else {
        echo '<option value="N">No</option>' . "\n";
    }
    if ($private_event == "Y") {
        echo '<option value="Y" selected>Yes</option>' . "\n";
    } else {
        echo '<option value="Y">Yes</option>' . "\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Notes</td>
    <td><textarea name="notes" class="form-control" 
        rows="5" cols="50"
        placeholder="Special instructions or notes"
        ><?php echo $notes; ?></textarea></td>
</tr>
<tr>
    <td colspan=2><input type="submit" name="submit" value="Update" 
        class='w3-button w3-green'/>&nbsp;
        <a class="w3-button w3-green" href="../page/calendar_list.php">
            Return to calendar list</a>
        &nbsp;
    </td>

</tr>
</table>
</form>
    <?php
} else {
    include "../assets/inc/msg.php";
    echo '<h1>Edit a Calendar Entry</h1>';
    $errorList = array();
    $id = test_input($_POST["id"]);
    $start_date = test_input($_POST["start_date"]);
    $start_time = test_input($_POST["start_time"]);
    $end_date = test_input($_POST["end_date"]);
    $end_time = test_input($_POST["end_time"]);
    $asset_id = test_input($_POST["asset_id"]);
    $event_name = test_input($_POST["event_name"]);
    $resp_person_id = test_input($_POST["resp_person_id"]);
    $contact_person_id = test_input($_POST["contact_person_id"]);
    $private_event = test_input($_POST["private_event"]);
    $notes = test_input($_POST["notes"]);
    $user_id = $_SESSION["id"];
    if (trim($event_name) == '') {
        $errorList[] = "Please enter a name for the event.";
    }
    if (trim($resp_person_id) == 0) {
        $errorList[] = "Please select a responsible person";
    }
    if ($start_date > $end_date) {
        $errorlist[] = "Start date is greater than end date";
    }
    if ($start_date == $end_date) {
        if ($start_time > $end_time) {
            $errorList[] = "Start time is greater than end time.";
        }
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        $sql = 'update calendar set start_date="' . $start_date;
        $sql .= '", start_time="' . $start_time;
        $sql .= '", end_date="' . $end_date;
        $sql .= '", end_time="' . $end_time;
        $sql .= '", asset_id=' . $asset_id;
        $sql .= ', event_name="' . $event_name;
        $sql .= '", resp_person_id=' . $resp_person_id;
        $sql .= ', contact_person_id=' . $contact_person_id;
        $sql .= ', private_event="' . $private_event . '"';
        $sql .= ', notes="' . $notes . '"';
        $sql .= ", user_id='" . $user_id . "'";
        $sql .= " where id = $id";
        //echo "<br>";
        //var_dump("Update SQL", $sql);
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
    echo '<a href="../page/calendar_list.php" class="w3-button w3-green">';
    echo 'Back to Calendar list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
