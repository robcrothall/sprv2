<?php
/**
 * Program: task_report_form
 * 
 * Display a list of tasks, depending on selected criteria.
 * PHP version 5.1
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
$no_of_tasks = 0;
?>
<h2 align="center">List of Tasks</h2>
<form action="../page/task.php" method="post">
<input type='submit' value='Show Tasks' class='w3-button w3-green'/>&nbsp;
<input type="button" onclick="myPrint('print-content')" value="Print" 
    class='w3-button w3-green'>
<br>
<div id="print-content" class="row">
<?php
if (!check_role("RESIDENT")) {
    echo '<select name="dept_id">' . "\n";
    $selected = "";
    if ($_SESSION["dept_id"] == 0) {
        $selected = " selected";
    }
    echo '<option value="0"' . $selected . ">Any department</option>\n";
    $rows = query("SELECT id, dept_name FROM dept order by dept_name");
    foreach ($rows as $row) {
        if (check_dept($row["dept_name"])) {
            if ($row["id"] == $_SESSION["dept_id"]) {
                $selected = " selected";
            } else {
                $selected = "";
            }
            echo '<option value="' . $row['id'] . '"' . $selected . ">";
            echo $row["dept_name"] . "</option>\n";
        }
    }
    echo "</select>";
    echo '<select name="discipline">' . "\n";
    $selected = "";
    if ($_SESSION["discipline"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . ">All disciplines</option>\n";
    $rows = query("SELECT distinct discipline FROM tasks order by discipline");
    foreach ($rows as $row) {
        if ($row["discipline"] == $_SESSION["discipline"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["discipline"] . '"' . $selected . ">";
        echo $row["discipline"] . "</option>\n";
    }
    echo "</select>";
    echo '<select name="severity">';
    $selected = "";
    if ($_SESSION["severity"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any severity</option>';
    $rows = query("SELECT distinct severity FROM tasks order by severity");
    foreach ($rows as $row) {
        if ($row["severity"] == $_SESSION["severity"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["severity"] . '"' . $selected . ">";
        echo $row["severity"] . "</option>\n";
    }
    echo "</select>";
    echo '<select name="originator_id">' . "\n";
    $selected = "";
    if ($_SESSION["originator_id"] == 0) {
        $selected = " selected";
    }
    echo '<option value="0"' . $selected . ">Any originator</option>\n";
    $sql = "SELECT distinct b.id, b.surname, b.first_name, b.given_name ";
    $sql .= "FROM tasks a, people b ";
    $sql .= "where a.originator_id = b.id and b.id > 0 ";
    $sql .= "order by b.surname, b.first_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        if ($row["id"] == $_SESSION["originator_id"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["surname"] . ", ";
        if (!empty($row["given_name"])) {
            echo $row["given_name"];
        } else {
            echo $row["first_name"];
        }
        echo "</option>\n";
    }
    $selected = "";
    echo "</select>";
    echo '<select name="project_id">';
    $selected = "";
    if ($_SESSION["project_id"] == 0) {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any project</option>';
    $selected = "";
    $sql = "SELECT distinct j.project_id as project_id, a.proj_name ";
    $sql .= "FROM tasks j, projects a where j.project_id = a.id ";
    $sql .= "order by proj_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        $selected = "";
        //var_dump($row);
        if ($row["project_id"] == $_SESSION["project_id"]) {
            if ($row["project_id"] > 0) {
                $selected = " selected";
            } else {
                $selected = "";
            }
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["project_id"] . '"' . $selected . ">";
        echo  substr($row["proj_name"], 0, 30);
        echo "</option>\r\n";
    }
    echo "</select>";
    echo '<select name="asset_id">';
    $selected = "";
    if ($_SESSION["asset_id"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any asset</option>';
    $sql = "SELECT distinct j.asset_id as asset_id, a.asset_name ";
    $sql .= "FROM tasks j, asset a where j.asset_id = a.id order by asset_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        $selected = "";
        //var_dump($row);
        if ($row["asset_id"] == $_SESSION["asset_id"]) {
            if ($row["asset_id"] > 0) {
                $selected = " selected";
            } else {
                $selected = "";
            }
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["asset_id"] . '"' . $selected . ">";
        echo $row["asset_name"] . "</option>\r\n";
    }
    echo "</select>";
    echo '<select name="assigned_to">' . "\n";
    $selected = "";
    if ($_SESSION["assigned_to"] == 0) {
        $selected = " selected";
    }
    echo '<option value="0"' . $selected . ">Any technician</option>\n";
    $sql = "SELECT distinct b.id, b.surname, b.first_name, b.given_name ";
    $sql .= "FROM tasks a, people b ";
    $sql .= "where a.assigned_to = b.id and b.id > 0 ";
    $sql .= "order by b.surname, b.first_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        if ($row["id"] == $_SESSION["assigned_to"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $row["surname"] . ", ";
        if (!empty($row["given_name"])) {
            echo $row["given_name"];
        } else {
            echo $row["first_name"];
        }
        echo "</option>\n";
    }
    $selected = "";
    echo "</select>";
    echo '<select name="status">' . "\n";
    if ($_SESSION["status"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any Tasks</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "open") {
        $selected = " selected";
    }
    echo '<option value="open"' . $selected . '>Open Tasks</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "not_read") {
        $selected = " selected";
    }
    echo '<option value="not_read"' . $selected . '>Not Read</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "scheduled") {
        $selected = " selected";
    }
    echo '<option value="scheduled"' . $selected . '>Scheduled</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "not_scheduled") {
        $selected = " selected";
    }
    echo '<option value="not_scheduled"' . $selected . '>Not scheduled</option>';
    echo "\n";
    $selected = "";
    if ($_SESSION["status"] == "closed") {
        $selected = " selected";
    }
    echo '<option value="closed"' . $selected . '>Closed</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "not_assigned") {
        $selected = " selected";
    }
    echo '<option value="not_assigned"' . $selected . '>Not assigned</option>';
    echo "\n";
    $selected = "";
    if ($_SESSION["status"] == "late") {
        $selected = " selected";
    }
    echo '<option value="late"' . $selected . '>Late</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "due") {
        $selected = " selected";
    }
    echo '<option value="due"' . $selected . '>Due by today</option>' . "\n";
    echo '</select>';
} else {
    $_SESSION["dept_id"] = "0";
    $_SESSION["discipline"] = "any";
    $_SESSION["severity"] = "any";
    $_SESSION["asset_id"] = "any";
    $sql = "select username from users where id=?";
    $rows = query($sql, $_SESSION["id"]);
    $account_no = $rows[0]["username"];
    $sql = "select * from people where account_no = ?";
    $rows = query($sql, $account_no);
    $_SESSION["originator_id"] = $rows[0]["id"];
    $_SESSION["assigned_to"] = 0;
    echo '<select name="status">' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any Tasks</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "open") {
        $selected = " selected";
    }
    echo '<option value="open"' . $selected . '>Open Tasks</option>' . "\n";
    $selected = "";
    echo '</select>';
    echo "<br>";
}
?>
</form>
<table class="w3-table w3-table-all w3-centered w3-padding w3-small">
  <thead>
    <tr>
      <th>Severity</th>
      <th>Task No</th>
      <th>Created</th>
      <th>Summary</th>
      <th>Asset</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
<?php 
$cmd1 = "SELECT a.*"; 
$cmd1 .= " from tasks a ";
$where = " where ";
$cmd2 = " ";
if (check_role("RESIDENT")) {
    $cmd2 .= $where . " originator_id = '" . $_SESSION["originator_id"] . "' ";
    $where = " and ";
}
if ($_SESSION["dept_id"] != 0) {
    $cmd2 .= $where . " dept_id = '" . $_SESSION["dept_id"] . "' ";
    $where = " and ";
}
if ($_SESSION["discipline"] != "any") {
    $cmd2 .= $where . " discipline = '" . $_SESSION["discipline"] . "' ";
    $where = " and ";
}
if ($_SESSION["severity"] != "any") {
    $cmd2 .= $where . " severity = '" . $_SESSION["severity"] . "' ";
    $where = " and ";
}
if ($_SESSION["asset_id"] != "any") {
    $cmd2 .= $where . " asset_id = " . $_SESSION["asset_id"] . " ";
    $where = " and ";
}
if ($_SESSION["originator_id"] != 0) {
    $cmd2 .= $where . " originator_id = '" . $_SESSION["originator_id"] . "' ";
    $where = " and ";
}
if ($_SESSION["assigned_to"] != 0) {
    $cmd2 .= $where . " assigned_to = '" . $_SESSION["assigned_to"] . "' ";
    $where = " and ";
}
switch($_SESSION["status"]) {
case "open":
    $cmd2 .= $where . " date_closed < '1900-01-02' "; 
    $where = " and ";
    break;
case "not_read":
    $cmd2 .= $where . " read_date < '1900-01-02' ";
    $where = " and ";
    break;
case "scheduled":
    $cmd2 .= $where . " sched_date > '1900-01-01' "; 
    $where = " and ";
    break;
case "not_scheduled":
    $cmd2 .= $where . " sched_date < '1900-01-02' ";
    $where = " and ";
    break;
case "closed":
    $cmd2 .= $where . " date_closed > '1900-01-01' ";
    $where = " and ";
    break;
case "not_assigned":
    $cmd2 .= $where . " date_assigned < '1900-01-02' ";
    $where = " and ";
    break;
case "late":
    $cmd2 .= $where . " due_date < date(now()) and date_closed < '1900-01-02' ";
    $where = " and ";
    break;
case "due":
    $cmd2 .= $where . " due_date = date(now()) and date_closed < '1900-01-02' ";
    $where = " and ";
    break;
}
// }
$cmd3 = " order by severity desc, id desc"; // limit 50";
$cmd = $cmd1 . $cmd2 . $cmd3;
var_dump($cmd);
$rows = query($cmd);
if (count($rows) > 0) {
    $no_of_tasks = count($rows);
    foreach ($rows as $row) {
        $date_closed = $row["date_closed"];
        $read_date = $row["read_date"];
        $sched_date = $row["sched_date"];
        $date_assigned = $row["date_assigned"];
        $create_date = $row["create_date"];
        $due_date = $row["due_date"];
        $assigned_to = $row["assigned_to"];
        $project_id = $row["project_id"];
        $myhours = 0; // Hours until the Task is late
        switch ($row["severity"]) {
        case "02 - Low":
            $myhours = 336;
            break;
        case "04 - Normal":
            $myhours = 48;
            break;
        case "06 - Urgent":
            $myhours = 8;
            break;
        case "08 - Critical":
            $myhours = 2;
            break;
        }
        //$due_date = str_replace('-','/', $create_date);
        //$due_date = date('Y-m-d',strtotime($due_date . "+" . $myhours . " hours"));
        //if ($sched_date > "1900-01-01") {
        // if ($sched_date > $create_date) {
        // $due_date = str_replace('-','/', $sched_date);
        // $due_date = date('Y-m-d',strtotime($due_date . "+" . $myhours . " days"));
        // }
        //}
        echo "<tr>";
        echo '<td>' . $row['severity'] . "<br>" . $myhours . ' hours</td>';
        echo "<td>" . $row["id"];
        echo "</td>";
        echo "<td>" . $row["create_date"] . "&nbsp;&nbsp;</td>";
        echo "<td>";
        $subject = str_replace("''", "'", $row["subject"]);
        echo wordwrap($subject, 20, "<br>\n", false);
        echo "</td>";
        if ($row["asset_id"] > 0 && $row["asset_id"] <> 368) {
            $sql2 = "select asset_name from asset where id = ?";
            $rows2 = query($sql2, $row["asset_id"]);
            echo "<td>" . $rows2[0]["asset_name"] . "</td>"; 
        } else {
            if ($row["project_id"] > 0) {
                $sql2 = "select proj_name from projects where id=?";
                $rows2 = query($sql2, $row["project_id"]);
                echo "<td>";
                echo wordwrap($rows2[0]["proj_name"], 20, "<br>", false);
                echo "</td>";
            } else {
                echo "<td>None</td>";
            }
        }
        $status = "";
        if ($date_closed < '1900-01-02') {
            $status .= "Open:&nbsp;&nbsp;<br>";
        }
        if ($sched_date > '1900-01-01') {
            $status .= "Scheduled: $sched_date &nbsp;&nbsp;<br>";
        }
        if ($sched_date < '1900-01-02') {
            $status .= "Not Scheduled:&nbsp;&nbsp;<br>";
        }
        if ($date_closed > '1900-01-01') {
            $status .= "Closed: $date_closed &nbsp;&nbsp;<br>";
        }
        if ($date_assigned < '1900-01-02' | $assigned_to == 0) {
            $status .= "Not assigned:&nbsp;&nbsp;<br>";
        } else {
            $sql2 = "select surname, first_name, given_name from people ";
            $sql2 .= "where id = ?";
            $resp = query($sql2, $assigned_to);
            $resp_name = $resp[0]["surname"] . ", ";
            if ($resp[0]["given_name"] > "") {
                $resp_name .= $resp[0]["given_name"];
            } else {
                $resp_name .=  $resp[0]["first_name"];
            }
            $status .= "Resp: $resp_name <br>";
        }
        if ($due_date < date("Y-m-d") and $date_closed < '1900-01-02') {
            $status .= "Late - due " . $due_date . ":&nbsp;&nbsp;<br>";
        }
        if ($read_date < '1900-01-01') {
            $status .= "Not Read:&nbsp;&nbsp;<br>";
        }
        echo '<td>' . $status . '</td>';
        echo "</tr>\n\r";
    }
}
?>
</tbody>
</table>
<?php
echo "<br>Number of Tasks selected = " . $no_of_tasks;
?>
</div>
<script>
    function myPrint(myfrm) {
        var printdata = document.getElementById(myfrm);
        newwin = window.open("");
        newwin.document.write(printdata.innerHTML);
        newwin.print();
        newwin.close();
    }
</script>
