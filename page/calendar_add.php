<?php
/**
 * Program: calendar_add
 * 
 * Add an unattended phone.
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
    if (!isset($_SESSION["start_date"])) {
        $_SESSION["start_date"] = date("Y-m-d");
    }
    $start_date = $_SESSION["start_date"];
    if (!isset($_SESSION["start_time"])) {
        $_SESSION["start_time"] = "00:00:00";
    }
    $start_time = $_SESSION["start_time"];
    if (!isset($_SESSION["end_time"])) {
        $_SESSION["end_time"] = "00:00:01";
    }
    $end_time = $_SESSION["end_time"];
    if (!isset($_SESSION["end_date"])) {
        $_SESSION["end_date"] = date("Y-m-d");
    }
    $end_date = $_SESSION["end_date"];
    if (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = 0;
    }
    $asset_id = $_SESSION["asset_id"];
    if (!isset($_SESSION["event_name"])) {
        $_SESSION["event_name"] = "";
    }
    $event_name = $_SESSION["event_name"];
    if (!isset($_SESSION["schedule_id"])) {
        $_SESSION["schedule_id"] = 0;
    }
    $schedule_id = $_SESSION["schedule_id"];
    if (!isset($_SESSION["resp_person_id"])) {
        $_SESSION["resp_person_id"] = 0;
    }
    $resp_person_id = $_SESSION["resp_person_id"];
    if (!isset($_SESSION["contact_person_id"])) {
        $_SESSION["contact_person_id"] = 0;
    }
    $contact_person_id = $_SESSION["contact_person_id"];
    if (!isset($_SESSION["private_event"])) {
        $_SESSION["private_event"] = "N";
    }
    $private_event = $_SESSION["private_event"];
    if (!isset($_SESSION["notes"])) {
        $_SESSION["notes"] = "";
    }
    $notes = $_SESSION["notes"];
    ?>
<h1>Add a Calendar Entry</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<table cellspacing="5" cellpadding="5">
<tr>
    <td><label for="start_date">Start Date:</label></td>
    <td><input type="date" required autofocus name="start_date"
    value=<?php echo $start_date; ?>></td>
</tr>
<tr>
    <td><label for="start_time">Start time:</label></td>
    <td><input type="time" id="start_time" name="start_time" 
        required value=<?php echo $start_time; ?>></td>
</tr>
<tr>
    <td><label for="end_time">End time:</label></td>
    <td><input type="time" id="end_time" name="end_time"
        required value=<?php echo $end_time; ?>></td>
</tr>
<tr>
    <td><label for="asset_id">Asset:</label></td>
    <td>
        <select required name="asset_id">
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
        echo '<option value="' . $row["id"] . '"' . $selected . '>';
        echo $row["asset_name"] . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td><label for="event_name">Event Name:</label></td>
    <td><input size="50" type="text" name="event_name"
        required value=<?php echo $event_name; ?>></td>
</tr>
<tr>
    <td><label for="resp_person_id"></label>Responsible Person</td>
    <td>
        <select required name="resp_person_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
    $sql  = 'select id, surname, first_name, given_name  ';
    $sql .= 'from people ';
    $sql .= 'where status in ("Staff", "Resident", "Associate") ';
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
        echo '<option value="' . $row["id"] . '"' . $selected . '>';
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td><label for="contact_person_id"></label>Contact Person</td>
    <td>
        <select required name="contact_person_id">
    <?php
    echo '<option value="0" selected>Please choose</option>' . "\n";
    $sql  = 'select id, surname, first_name, given_name  ';
    $sql .= 'from people ';
    $sql .= 'where status in ("Staff", "Resident", "Associate") ';
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
        echo '<option value="' . $row["id"] . '"' . $selected . '>';
        echo $full_name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
<tr>
    <td><label for="private_event">Private Event:</label></td>
    <td>
        <select name="private_event">
        <option value="N" selected>No</option>
        <option value="Y">Yes</option>
        </select>
    </td>
</tr>
<tr>
    <td><label for="notes">Notes:</label></td>
    <td><textarea name="notes" class="form-control" 
        rows="5" cols="50" value=<?php echo $notes; ?>
        placeholder="Special instructions or notes"></textarea></td>
</tr>
</table>
<table cellspacing="5" cellpadding="5">
<tr>
    <td><label for="end_date">Schedule until:</label></td>
    <td><input type="date" name="end_date" 
    value=<?php echo $end_date; ?>></td>
</tr>
<tr>
    <td style="vertical-align:top"><label for="dow">Days of week:</label></td>
    <td>
        <input type="checkbox" id="mon" name="mon" value="Monday">
        <label for="mon"> Monday</label><br>
        <input type="checkbox" id="tue" name="tue" value="Tuesday">
        <label for="tue"> Tuesday</label><br>
        <input type="checkbox" id="wed" name="wed" value="Wednesday">
        <label for="wed"> Wednesday</label><br>
        <input type="checkbox" id="thu" name="thu" value="Thursday">
        <label for="thu"> Thursday</label><br>
        <input type="checkbox" id="fri" name="fri" value="Friday">
        <label for="fri"> Friday</label><br>
        <input type="checkbox" id="sat" name="sat" value="Saturday">
        <label for="sat"> Saturday</label><br>
        <input type="checkbox" id="sun" name="sun" value="Sunday">
        <label for="sun"> Sunday</label><br>
    </td>
</tr>
<td style="vertical-align:top"><label for="wom">Week of the month:</label></td>
    <td>
        <input type="checkbox" id="first" name="first" value="First">
        <label for="first"> First</label><br>
        <input type="checkbox" id="second" name="second" value="Second">
        <label for="second"> Second</label><br>
        <input type="checkbox" id="third" name="third" value="Third">
        <label for="third"> Third</label><br>
        <input type="checkbox" id="fourth" name="fourth" value="Fourth">
        <label for="fourth"> Fourth</label><br>
        <input type="checkbox" id="fifth" name="fifth" value="Fifth">
        <label for="fifth"> Fifth</label><br>
    </td>
</tr>
<td style="vertical-align:top"><label for="moy">Month of year:</label></td>
    <td>
        <input type="checkbox" id="jan" name="jan" value="January">
        <label for="jan"> January</label><br>
        <input type="checkbox" id="feb" name="feb" value="February">
        <label for="feb"> February</label><br>
        <input type="checkbox" id="mar" name="mar" value="March">
        <label for="mar"> March</label><br>
        <input type="checkbox" id="apr" name="apr" value="April">
        <label for="apr"> April</label><br>
        <input type="checkbox" id="may" name="may" value="May">
        <label for="may"> May</label><br>
        <input type="checkbox" id="jun" name="jun" value="June">
        <label for="jun"> June</label><br>
        <input type="checkbox" id="jul" name="jul" value="July">
        <label for="jul"> July</label><br>
        <input type="checkbox" id="aug" name="aug" value="August">
        <label for="aug"> August</label><br>
        <input type="checkbox" id="sep" name="sep" value="September">
        <label for="sep"> September</label><br>
        <input type="checkbox" id="oct" name="oct" value="October">
        <label for="oct"> October</label><br>
        <input type="checkbox" id="nov" name="nov" value="November">
        <label for="nov"> November</label><br>
        <input type="checkbox" id="dec" name="dec" value="December">
        <label for="dec"> December</label><br>
    </td>
</tr>
</table>
<br><br>
<input type="submit" name="submit" value="Add" 
    class='w3-button w3-green'/>&nbsp;
<a class="w3-button w3-green" href="../page/calendar_list.php">
    Return to calendar list</a>&nbsp;
</form>
    <?php
} else {
    //include "../assets/inc/msg.php";
    echo '<h1>Add a calendar entry</h1>';
    $errorList = array();
    $schedule_id = 0;
    $start_date = test_input($_POST["start_date"]);
    $start_time = trim(test_input($_POST["start_time"]));
    $end_date = trim(test_input($_POST["end_date"]));
    //var_dump($end_date);
    //echo "<br>";
    if (empty($end_date)) {
        $end_date = $start_date;
    } else {
        $end_date = date("Y") . "-12-31";
    }
    var_dump("End date:", $end_date);
    echo "<br>";
    $end_time = trim(test_input($_POST["end_time"]));
    $asset_id = trim(test_input($_POST["asset_id"]));
    $event_name = trim(test_input($_POST["event_name"]));
    $resp_person_id= trim(test_input($_POST["resp_person_id"]));
    $contact_person_id = trim(test_input($_POST["contact_person_id"]));
    $private_event = trim(test_input($_POST["private_event"]));
    $notes = trim(test_input($_POST["notes"]));
    $dow = array();
    if (isset($_POST["mon"])) {
        array_push($dow, trim(test_input($_POST["mon"])));
    }
    if (isset($_POST["tue"])) {
        array_push($dow, trim(test_input($_POST["tue"])));
    }
    if (isset($_POST["wed"])) {
        array_push($dow, trim(test_input($_POST["wed"])));
    }
    if (isset($_POST["thu"])) {
        array_push($dow, trim(test_input($_POST["thu"])));
    }
    if (isset($_POST["fri"])) {
        array_push($dow, trim(test_input($_POST["fri"])));
    }
    if (isset($_POST["sat"])) {
        array_push($dow, trim(test_input($_POST["sat"])));
    }
    if (isset($_POST["sun"])) {
        array_push($dow, trim(test_input($_POST["sun"])));
    }
    var_dump("Day of week:", $dow);
    echo "<br>";
    $wom = array();
    if (isset($_POST["first"])) {
        array_push($wom, trim(test_input($_POST["first"])));
    }
    if (isset($_POST["second"])) {
        array_push($wom, trim(test_input($_POST["second"])));
    }
    if (isset($_POST["third"])) {
        array_push($wom, trim(test_input($_POST["third"])));
    }
    if (isset($_POST["fourth"])) {
        array_push($wom, trim(test_input($_POST["fourth"])));
    }
    if (isset($_POST["fifth"])) {
        array_push($wom, trim(test_input($_POST["fifth"])));
    }
    var_dump("Week of month:", $wom);
    echo "<br>";
    $moy = array();
    if (isset($_POST["jan"])) {
        array_push($moy, trim(test_input($_POST["jan"])));
    }
    var_dump("Month of year:", $moy);
    echo "<br>";
    $_SESSION["start_date"] = $start_date;
    $_SESSION["start_time"] = $start_time;
    $_SESSION["end_time"] = $end_time;
    $_SESSION["end_date"] = $end_date;
    $_SESSION["asset_id"] = $asset_id;
    $_SESSION["event_name"] = $event_name;
    $_SESSION["schedule_id"] = $schedule_id;
    $_SESSION["resp_person_id"] = $resp_person_id;
    $_SESSION["contact_person_id"] = $contact_person_id;
    $_SESSION["private_event"] = $private_event;
    $_SESSION["notes"] = $notes;
    if ($asset_id == 0) {
        $errorList[] = "Please select an asset.";
    }
    if ($event_name == '') {
        $errorList[] = "Please enter an event name.";
    }
    if (sizeof($errorList) == 0) {
        include "../assets/inc/db_open.php";
        echo "<br>Scheduled for the following dates:<br><ul>";
        $date = strtotime($start_date);
        $date_end = strtotime($end_date);
        var_dump("Date:", $date);
        var_dump("Date End:", $date_end);
        while ($date <= $date_end) {
            echo "<li>Date is: " . date("Y-m-d", $date) . "</li>";
            $date = strtotime("+1 day", $date);
        }
        echo "</ul>";
        $sql = "insert into calendar (start_date, start_time, end_date, ";
        $sql .= "end_time, asset_id, event_name, schedule_id, resp_person_id, ";
        $sql .= "contact_person_id, private_event, notes, user_id";
        $sql .= ") values ('";
        $sql .= $start_date . "', '" . $start_time . "', '" . $end_date . "', ";
        $sql .= "'" . $end_time . "', " . $asset_id . ', ' . '"';
        $sql .= $event_name . '", ' . $schedule_id . ", " . $resp_person_id . ', ';
        $sql .= $contact_person_id . ', "' . $private_event . '", "';
        $sql .= $notes . '", ' . $_SESSION["id"] . ')';
        echo "<br>" . $sql . "<br>";
        $result = mysqli_query($handle, $sql)
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Update successful.<br><br>";
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" ';
    echo 'href="../page/calendar_list.php">Back to calendar list</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
