<h2>Update a Task</h2>
<?php
/**
 * Program: job_update
 * 
 * Update a task.
 * 
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
$_SESSION["module"] = $_SERVER["PHP_SELF"];
$rec_id = $_SESSION["rec_id"];
$data = query("select * from jobs where id = ?", $rec_id); 
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
$create_date = $data[0]["create_date"]; 
$due_date = $data[0]["due_date"]; 
$estimated_hours = $data[0]["estimated_hours"];
$sched_date = $data[0]["sched_date"]; 
$sched_time = $data[0]["sched_time"]; 
$actual_date = $data[0]["actual_date"]; 
$actual_time = $data[0]["actual_time"]; 
$actual_hours = $data[0]["actual_hours"]; 
$date_closed = $data[0]["date_closed"]; 
if ($date_closed == "0000-00-00 00:00:00") {
    $closed = '';
} else {
    $closed = " checked ";
}
?>

<form action="../page/job_update.php" method="post">
   <input type='submit' value='Save' class='w3-button w3-green' />
   <a href='../page/job.php' 
       class='w3-button w3-green'>Back to Tasks (without saving)</a>
   <table class='w3-table-all'>
        <tr>
            <td align="right" valign="top">Task No</td>
            <td><?php echo "$rec_id"; ?></td>
        </tr>
        <tr>
            <td align="right" valign="top">Summary</td>
            <td><input type='text' name='subject' class='form-control' size="80" 
                    value="<?php echo "$subject"; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Detailed description</td>
            <td><textarea name="description" class="form-control" rows="5" 
                    cols="50"><?php echo "$description"; ?></textarea></td>
        </tr>
        <tr>
            <td align="right" valign="top">Completion Criteria</td>
            <td><textarea name="criteria" class="form-control" rows="5" 
                    cols="50"><?php echo "$criteria"; ?></textarea></td>
        </tr>
        <tr>
            <td align="right" valign="top">Originator</td>
            <td>
            <select name="originator_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$sql = "SELECT id, surname, first_name, given_name FROM `people` ";
$sql .= "where status in ('Resident', 'Staff', 'Contractor') ";
$sql .= "order by surname, first_name";
$rows = query($sql);
foreach ($rows as $row) {
    if ($row["id"] == $originator_id) {
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
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $name . "</option>\n";
}
?>
            </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Target Department</td>
            <td>
                  <select name="dept_id">
<?php
$rows = query("SELECT id, dept_name FROM dept order by dept_name");
foreach ($rows as $row) {
    if ($row["id"] == $dept_id) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $row["dept_name"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Severity</td>
            <td>
                  <select name="severity">
<?php
$sql = 'select parm_value from parms_char ';
$sql .= 'where parm_name = "severity" order by parm_value';
$rows = query($sql);
foreach ($rows as $row) {
    if ($row["parm_value"] == $severity) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["parm_value"] . '"';
    echo $selected . ">" . $row["parm_value"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Asset/Cottage</td>
            <td>
                  <select name="asset_id">
<?php
$rows = query("SELECT id, asset_name FROM asset order by asset_seq");
foreach ($rows as $row) {
    if ($row["id"] == $asset_id) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $row["asset_name"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Discipline</td>
            <td>
                  <select name="discipline">
<?php
$sql = 'select parm_value from parms_char ';
$sql .= 'where parm_name = "discipline" order by parm_value';
$rows = query($sql);
foreach ($rows as $row) {
    if ($row["parm_value"] == $discipline) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["parm_value"] . '"' . $selected . ">";
    echo $row["parm_value"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">
                Assigned to:<br>(Select from either list)</td>
            <td>
                  <select name="short_list">
<?php
$sql = "SELECT a.id, a.surname, a.first_name, a.given_name FROM people a " . 
        "where a.id in (select distinct assigned_to from jobs) " . 
        "order by surname, first_name";
$rows = query($sql);
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
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $name . "</option>\n";
}
?>
                  </select>
                  <?php echo " Short list - higher priority"; ?>
                  <br>
                  <select name="assigned_to">
<?php
$sql = "SELECT id, surname, first_name, given_name FROM people ";
$sql .= "where status in ('Resident', 'Staff', 'Contractor', 'Constant') ";
$sql .= "order by surname, first_name";
$rows = query($sql);
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
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $name . "</option>\n";
}
?>
                  </select>
<?php
if ($date_assigned > "0000-00-00 00:00:00") {
    echo " on $date_assigned";
} 
?>

            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Project</td>
            <td>
                  <select name="project_id">
<?php
$rows = query("SELECT id, proj_name FROM projects order by proj_name");
foreach ($rows as $row) {
    if ($row["id"] == $project_id) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["id"] . '"';
    echo $selected . ">" . $row["proj_name"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Task type</td>
            <td>
                  <select name="type">
<?php
$sql = 'select parm_value from parms_char ';
$sql .= 'where parm_name = "job_type" order by parm_value';
$rows = query($sql);
foreach ($rows as $row) {
    if ($row["parm_value"] == $type) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["parm_value"] . '"';
    echo $selected . ">" . $row["parm_value"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Estimated hours</td>
            <td><input type="number" name="estimated_hours" class="form-control" 
                size="10" step="0.25" value="<?php echo "$estimated_hours"; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Scheduled date</td>
            <td><input type="date" name="sched_date" class="form-control" size="20" 
                    value="<?php echo $sched_date; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Scheduled time</td>
            <td><input type="time" name="sched_time" class="form-control" size="20" 
                    value="<?php echo $sched_time; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Actual date on site</td>
            <td><input type="date" name="actual_date" class="form-control" size="20" 
                    value="<?php echo $actual_date; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Actual time on site</td>
            <td><input type="time" name="actual_time" class="form-control" size="20" 
                    value="<?php echo $actual_time; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Actual hours spent</td>
            <td><input type="number" name="actual_hours" class="form-control" 
                size="10" step="0.25" value="<?php echo "$actual_hours"; ?>"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Close Task</td>
            <td>
<?php
echo '<input type="checkbox" id="closed" name="closed" ';
echo 'value="closed"' . $closed . '>';
if (!empty($closed)) {
    echo " on " . $date_closed;
}
?>
            </td>
        </tr>
    </table>
    <input type='submit' value='Save' class='w3-button w3-green' />
    <a href='../page/job.php' 
    class='w3-button w3-green'>Back to Tasks (without saving)</a>
</form>
