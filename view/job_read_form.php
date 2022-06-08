<?php
/**
 * Program: task_read_form
 * 
 * Display the detail about a task.
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */

$_SESSION["module"] = $_SERVER["PHP_SELF"];
$rec_id = htmlspecialchars(strip_tags($form_id));
$data = query("select * from tasks where id = ?", $rec_id); 
$subject = $data[0]["subject"]; 
$subject = str_replace("''", "'", $subject);
$description = $data[0]["description"]; 
$description = str_replace("''", "'", $description);
$criteria = $data[0]["criteria"];
$criteria = str_replace("''", "'", $criteria);
$originator_id = $data[0]["originator_id"]; 
$dept_id = $data[0]["dept_id"]; 
$severity = $data[0]["severity"]; 
$asset_id = $data[0]["asset_id"]; 
$discipline = $data[0]["discipline"]; 
$assigned_to = $data[0]["assigned_to"]; 
$date_assigned = $data[0]["date_assigned"]; 
$project_id = $data[0]["project_id"]; 
$type = $data[0]["type"]; 
$create_id = $data[0]["create_id"];
$create_date = $data[0]["create_date"]; 
$due_date = $data[0]["due_date"]; 
$estimated_hours = $data[0]["estimated_hours"]; 
$sched_date = $data[0]["sched_date"]; 
$sched_time = $data[0]["sched_time"]; 
$actual_date = $data[0]["actual_date"]; 
$actual_time = $data[0]["actual_time"]; 
$actual_hours = $data[0]["actual_hours"]; 
$closed = $data[0]["closed"]; 
$user_id = $data[0]["user_id"];
$changed = $data[0]["changed"];
$message = '';
//$create_id = $data[0]["create_id"]; 
//$read_date = $data[0]["read_date"];
$sql = "select surname, first_name, given_name from people where id = ?";
$rows = query($sql, $assigned_to);
if (!empty($rows[0]["surname"])) {
    $assigned_to_name = $rows[0]["surname"] . ", ";
    if (!empty($rows[0]["given_name"])) {
        $assigned_to_name .= $rows[0]["given_name"];
    } else {
        $assigned_to_name .= $rows[0]["first_name"];
    }
} else {
    $assigned_to_name = "";   
}
$rows = query("select proj_name from projects where id = ?", $project_id);
if (!empty($rows[0]["proj_name"])) {
    $proj_name = $rows[0]["proj_name"];   
} else {
    $proj_name = "";   
}
$rows = query("select dept_name from dept where id=?", $dept_id);
$dept_name = $rows[0]["dept_name"];
$rows = query("select asset_name from asset where id=?", $asset_id);
$asset_name = $rows[0]["asset_name"];
if ($originator_id > 0) {
    $originator_name = "";
    $sql = "select surname, first_name, given_name from people where id = ?";
    //var_dump($rec_id, $originator_id);
    $data = query($sql, $originator_id);
    $surname = $data[0]["surname"];
    $first_name = $data[0]["first_name"];
    $originator_name = $surname . ", ";
    if (!empty($data[0]["given_name"])) {
        $originator_name .= $data[0]["given_name"];
    } else {
        $originator_name .= $first_name;
    }
} else {
    $originator_name = "Not specified";
}
$sql = "select surname, first_name from users where id = ?";
$data = query($sql, $create_id);
if (count($data) > 0) {
    $surname = $data[0]["surname"];
    $first_name = $data[0]["first_name"];
    $given_name = $data[0]["first_name"];
    $create_name = $surname . ", ";
    if (!empty($given_name)) {
        $create_name .= $given_name;
    } else {
        $create_name .= $first_name;
    }
} else {
    $create_name = "Unknown";
}
$data = query("select username from users where id = ?", $user_id);
$username = $data[0]["username"];
if (check_role("STAFF") {
    $sql = "update tasks set read_date = now(), user_id = ? ";
    $sql .= "where id = ? and read_date is null";
    $data = query($sql, $_SESSION["id"], $rec_id);
    $message .= " Read date updated.";
}
?>
<div id="print-content">
<h2>Details of Task</h2>
<div class="container">
<form action="../page/task.php" method="post">
<div class="form-actions">
<input type='submit' value='Return' class='w3-button w3-green'>
<input type="button" onclick="myPrint('print-content')" value="Print" 
    class='w3-button w3-green'>
</div>
<table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
  <tr>
    <td>Target Department:</td>
    <td width="2%"></td>
    <td><?php echo $dept_name; ?></td>
  </tr>
  <tr>
    <td>Task Number:</td>
    <td width="2%"></td>
    <td><?php echo $rec_id; ?></td>
  </tr>
  <tr>
    <td>Summary:</td>
    <td width="2%"></td>
    <td><?php echo $subject; ?></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td width="2%"></td>
    <td><?php echo $description; ?></td>
  </tr>
  <tr>
    <td>Completion Criteria:</td>
    <td width="2%"></td>
    <td><?php echo $criteria; ?></td>
  </tr>
  <tr>
    <td>Reported by:</td>
    <td width="2%"></td>
    <td><?php echo $originator_name; ?></td>
  </tr>
  <tr>
    <td>Date created:</td>
    <td width="2%"></td>
    <td>
<?php 
echo $create_date;
if (!empty($create_name)) {
    echo " by " . $create_name;
}
?>
    </td>
  </tr>
  <tr>
    <td>Due Date:</td>
    <td width="2%"></td>
    <td><?php echo $due_date; ?></td>
  </tr>
  <tr>
    <td>Severity:</td>
    <td width="2%"></td>
    <td><?php echo $severity; ?></td>
  </tr>
  <tr>
    <td>Discipline:</td>
    <td width="2%"></td>
    <td><?php echo $discipline; ?></td>
  </tr>
  <tr>
    <td>Type of Task:</td>
    <td width="2%"></td>
    <td><?php echo $type; ?></td>
  </tr>
  <tr>
    <td>Asset Name/Cottage:</td>
    <td width="2%"></td>
    <td><?php echo $asset_name; ?></td>
  </tr>
  <tr>
    <td>Assigned to:</td>
    <td width="2%"></td>
    <td>
<?php 
echo $assigned_to_name;
if ($date_assigned > "0000-00-00 00:00:00") {
    echo " on " . $date_assigned; 
}
?>
    </td>
  </tr>
  <tr>
    <td>Project:</td>
    <td width="2%"></td>
    <td><?php echo $proj_name; ?></td>
  </tr>
  <tr>
    <td>Estimated hours:</td>
    <td width="2%"></td>
    <td>
<?php
if ($estimated_hours > 0) { 
    echo $estimated_hours; 
}
?>
    </td>
  </tr>
  <tr>
    <td>Scheduled date and time:</td>
    <td width="2%"></td>
    <td>
<?php 
if ($sched_date > "0000-00-00") {
    echo $sched_date . " at " . $sched_time; 
}
?>
    </td>
  </tr>
  <tr>
    <td>Actual date and time:</td>
    <td width="2%"></td>
    <td>
<?php 
if ($actual_date > "0000-00-00") {
    echo $actual_date . " at " . $actual_time; 
}
?>
    </td>
  </tr>
  <tr>
    <td>Actual hours:</td>
    <td width="2%"></td>
    <td>
<?php
if ($actual_hours > 0) {
    echo $actual_hours; 
}
?>
    </td>
  </tr>
  <tr>
    <td>Customer signature:</td>
    <td width="2%"></td>
    <td>______________________________________</td>
  </tr>
  <tr>
  <td>Completed date and time:</td>
    <td width="2%"></td>
    <td>___________________ at ________________</td>
  </tr>
</table> 

<div class="form-actions">
<input type='submit' value='Return' class='w3-button w3-green' />
<input type="button" onclick="myPrint('print-content')" value="Print" 
    class='w3-button w3-green'>
</div>
</div>
</form>
</div>
<script>
function myPrint(myfrm) {
    var printdata = document.getElementById(myfrm);
    newwin = window.open("");
    newwin.document.write(printdata.outerHTML);
    newwin.print();
    newwin.close();
}
</script>
