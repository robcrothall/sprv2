<?php
/**
 * Program: calendar_list
 * 
 * List Calendar entries.
 * php version 7.2.10
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
require "../assets/inc/db_open.php";
//echo '<br>';
//var_dump($_SESSION["module"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["start"] = test_input($_POST["start"]);
    $_SESSION["period"] = test_input($_POST["period"]);
    $_SESSION["venue_id"] = test_input($_POST["venue_id"]);
    $_SESSION["event_name"] = test_input($_POST["event_name"]);
}
if (!isset($_SESSION["start"])) {
    $_SESSION["start"] = date("Y-m-d");
    $start = date("Y-m-d");
} else {
    $start = $_SESSION["start"];
}
if (!isset($_SESSION["period"])) {
    $_SESSION["period"] = 31;
    $period = 31;
} else {
    $period = $_SESSION["period"];
}
if (!isset($_SESSION["venue_id"])) {
    $_SESSION["venue_id"] = "0";
    $venue_id = "any";
} else {
    $venue_id = $_SESSION["venue_id"];
}
if (!isset($_SESSION["event_name"])) {
    $_SESSION["event_name"] = "any";
    $event_name = "any";
} else {
    $event_name = $_SESSION["event_name"];
}

echo '<h1>Calendar Entries</h1>';
echo '<form action="../page/calendar_list.php" method="post">';
if (check_role("CALENDAR")) { 
    echo '<a href="calendar_add.php" ';
    echo 'class="w3-button w3-green">Add a Calendar entry</a>';
    echo '&nbsp;';
}
echo '<label for="start">Start date:</label>';
echo '<input type="date" id="start" name="start" ';
echo 'value="' . $start . '">&nbsp;';
echo '<label for="period">No. of days:</label>';
echo '<input type="number" id="period" name="period" size="5" ';
echo 'value="' . $period . '">&nbsp;';
//---------------------
echo '<label for="venue_id">Venue:</label>';
echo '<select name="venue_id">' . "\n";
$selected = "";
if ($_SESSION["venue_id"] == 0) {
    $selected = " selected";
}
echo '<option value="0"' . $selected . ">All Venues</option>\n";
$selected = "";
$sql = 'SELECT distinct asset_name as venue, id as venue_id FROM calendar_assets ';
$sql .= 'where id in (select distinct asset_id from calendar) ';
$sql .= 'order by asset_name';
//echo '<br>';
//var_dump("SQL at 80", $sql);
$rows = query($sql);
//echo '<br>';
//var_dump("Rows at 83", $rows);
foreach ($rows as $row) {
    if ($row["venue_id"] == $_SESSION["venue_id"]) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["venue_id"] . '"' . $selected . ">";
    echo $row["venue"] . "</option>\n";
}
echo "</select>";
//---------------------
echo "&nbsp;";
echo '<label for="event_name">Event:</label>';
echo '<select name="event_name">' . "\n";
$selected = "";
if ($_SESSION["event_name"] == "any") {
    $selected = " selected";
}
echo '<option value="any"' . $selected . ">All Events</option>\n";
$selected = "";
$rows = query("SELECT distinct event_name FROM calendar order by event_name");
foreach ($rows as $row) {
    if ($row["event_name"] == $_SESSION["event_name"]) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["event_name"] . '"' . $selected . ">";
    echo $row["event_name"] . "</option>\n";
}
echo "</select>";
echo "&nbsp;";
echo '<input type="submit" value="Refresh" class="w3-button w3-green"/>&nbsp;';
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Date</th>
      <th>Venue or Asset</th>
      <th>Time</th>
      <th>Event</th>
<?php
if (check_role("CALENDAR")) { 
    echo "<th>Action</th>";
}
?>
    </tr>
  </thead>
  <tbody>
<?php
$end = date("Y-m-d", strtotime("+$period day", strtotime($start)));
//echo "<br>";
//var_dump("Start", $start);
//echo "<br>";
//var_dump("Period", $period);
//echo "<br>";
//var_dump("End", $end);
$saved_date = "None";
$sql = "select a.id, a.start_date, a.start_time, a.end_time, ";
$sql .= "a.asset_id, a.event_name, ";
$sql .= "a.schedule_id, a.private_event, b.asset_name ";
$sql .= "from calendar a, calendar_assets b ";
$sql .= "where a.asset_id = b.id ";
$sql .= "and a.start_date between '$start' and '$end' ";
if ($_SESSION["event_name"] != "any") {
    $sql .= 'and a.event_name = "' . $event_name . '" ';
}
if ($_SESSION["venue_id"] != 0) {
    $sql .= 'and a.asset_id = ' . $venue_id . ' ';
}
$sql .= "order by a.start_date, b.asset_name, a.start_time";
//echo "<br>";
//var_dump("SQL", $sql);
foreach ($handle->query($sql) as $row) {
    //echo "<br>";
    //var_dump("Row - 71", $row);
    if ($row["private_event"] == "Y") {
        $event_name = "Private Function";
    } else {
        $event_name = $row["event_name"];
    }
    $asset_name = $row["asset_name"];
    //echo "<br>";
    //var_dump("Event Name - 77", $event_name);
    $start_date = date("Y-m-d", strtotime($row["start_date"]));
    //echo "<br>";
    //var_dump($saved_date, $start_date);
    if ($start_date == $saved_date) {
        $start_date = "";  //Only print the date once
    } else {
        $saved_date = $start_date;
    }
    //echo "<br>";
    //var_dump("Start Date - 80", $start_date);
    $asset_name = $row["asset_name"];
    //echo "<br>";
    //var_dump("Asset Name - 83", $asset_name);
    $start_time = $row["start_time"];
    $end_time = $row["end_time"];
    //echo "<br>";
    //var_dump("Start Time - 86", $start_time);
    echo '<tr>';
    echo '  <td>' . $start_date . '</td>';
    echo '  <td>' . $asset_name . '</td>';
    echo '  <td>' . substr($start_time, 0, 5) . ' - ';
    echo substr($end_time, 0, 5) . '</td>';
    echo '  <td>' . $event_name . '</td>';
    echo '  <td>';
    //echo '<a class="w3-button w3-green" href="../page/calendar_detail.php?id=';
    //echo $row['id'] . '">Details</a>&nbsp;';
    if (check_role("CALENDAR")) { 
        echo '<a class="w3-button w3-green" href="../page/calendar_edit.php?id=';
        echo $row['id'] . '">Update</a>&nbsp;';
        if (check_role("ADMIN")) {
            echo '<a class="w3-button w3-red" ';
            echo 'href="../page/calendar_delete.php?id=';
            echo $row['id'] . '">Delete</a>';
        }
    }
    echo '  </td>';
    echo '</tr>';
}
?>
    </form>
  </tbody>
</table>
<?php
require "../assets/inc/msg.php";
echo "<p></p>";
require "../assets/inc/footer.php";
?>
