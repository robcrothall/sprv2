<h2>Record a new Task</h2>
<?php
/**
 * Program: task_read_form
 * 
 * Display the detail about a task.
 *  
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
?>
<form action="../page/task_create.php" method="post">
    <input type='submit' value='Save' class='w3-button w3-green' />
    <a href='../page/task.php' class='w3-button w3-green'>Back to Tasks</a>
    <table class='w3-table-all'>
        <tr>
            <td align="right" valign="top">Summary</td>
            <td><input type='text' name='subject' 
                class='form-control' size="50"></td>
        </tr>
        <tr>
            <td align="right" valign="top">Target Department</td>
            <td>
                <select name="dept_id">
<?php
$rows = query("SELECT id, dept_name FROM dept order by dept_name");
foreach ($rows as $row) {
    if ($row["dept_name"] == "Facilities") {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo '<option value="' . $row["id"] . '"' . $selected . ">";
    echo $row["dept_name"] . "</option>\n";
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
    echo '<option value="' . $row["parm_value"] . '">';
    echo $row["parm_value"] . "</option>\n";
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
$sql = "select parm_value from parms_char ";
$sql .= "where parm_name = 'task_type' order by parm_value";
$rows = query($sql);
foreach ($rows as $row) {
    echo '<option value="' . $row["parm_value"] . '">';
    echo $row["parm_value"] . "</option>\n";
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
    echo '<option value="' . $row["parm_value"] . '">';
    echo $row["parm_value"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Originator</td>
            <td>
                  <select name="originator_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$selected = '';
$sql = "SELECT id, surname, first_name FROM `people` ";
$sql .= "where status in ('Resident', 'Staff', 'Contractor') ";
$sql .= "order by surname, first_name";
$rows = query($sql);
foreach ($rows as $row) {
    if ($row["first_name"] == "") {
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["surname"] . "</option>\n";
    } else {
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["surname"] . ", " . $row["first_name"] . "</option>\n";
    }
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
$rows = query("SELECT id, asset_name FROM asset order by asset_seq, asset_name");
foreach ($rows as $row) {
    echo '<option value="' . $row["id"] . '">' . $row["asset_name"] . "</option>\n";
}
?>
                  </select>
            </td>
        </tr>
        <tr>
            <td align="right" valign="top">Detailed description</td>
            <td><textarea name="description" class="form-control" 
                rows="5" cols="50"
placeholder="Describe what needs to be done"></textarea></td>
        </tr>
        <tr>
            <td align="right" valign="top">Completion Criteria</td>
            <td><textarea name="criteria" class="form-control" rows="5" cols="50"
placeholder="Enter conditions which must be met before this task is closed.">
</textarea></td>
        </tr>
        <tr>
            <td align="right" valign="top">Project</td>
            <td>
                <select name="project_id">
<?php
$sql = "SELECT id, proj_name FROM projects ";
$sql .= "where proj_name not like '%Refurbish%' ";
$sql .= "order by proj_name ";
$rows = query($sql);
echo '<option value="0" selected>Not applicable</option>';
foreach ($rows as $row) {
    echo '<option value="' . $row["id"] . '">' . $row["proj_name"] . "</option>\n";
}
$sql = "SELECT id, proj_name FROM projects ";
$sql .= "where proj_name like '%Refurbish%' ";
$sql .= "order by proj_name ";
$rows = query($sql);
foreach ($rows as $row) {
    echo '<option value="' . $row["id"] . '">' . $row["proj_name"] . "</option>\n";
}
?>
                </select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Save" class="w3-button w3-green" />
    <a href="../page/task.php" class="w3-button w3-green">Back to Tasks</a>
</form>
