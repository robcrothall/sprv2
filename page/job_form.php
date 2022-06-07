<?php
/**
 * Program: job_form
 * 
 * Display a list of tasks, depending on selected criteria.
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
$no_of_jobs = 0;
if (!isset($_SESSION["dept_id"])) {
    $_SESSION["dept_id"] = 0;
}
if (!isset($_SESSION["discipline"])) {
    $_SESSION["discipline"] = "any";
}
if (!isset($_SESSION["severity"])) {
    $_SESSION["severity"] = "any";
}
if (!isset($_SESSION["originator_id"])) {
    $_SESSION["originator_id"] = 0;
}
if (!isset($_SESSION["project_id"])) {
    $_SESSION["project_id"] = 0;
}
if (!isset($_SESSION["asset_id"])) {
    $_SESSION["asset_id"] = 0;
}
if (!isset($_SESSION["assigned_to"])) {
    $_SESSION["assigned_to"] = 0;
}
if (!isset($_SESSION["status"])) {
    $_SESSION["status"] = "any";
}
?>
<h2 align="center">List of Tasks</h2>
    <form action="../page/job.php" method="post">
    <a href="../page/job_create.php" class="w3-button w3-green">Create a new Task</a>
    &nbsp;
    <input type='submit' value='Refresh' class='w3-button w3-green'/>&nbsp;
<?php
if (check_role("STAFF") | check_role("ADMIN")) {
    if (!empty($_SESSION["current_job"])) {
        echo '<a class="w3-button w3-green" href="../page/job_update.php?id=';
        echo $_SESSION['current_job'] . '">Update Task ' . $_SESSION["current_job"];
        echo '</a>&nbsp;';
        echo '<a class="w3-button w3-green" href="../page/job_read.php?id=';
        echo $_SESSION['current_job'] . '">Read Task ' . $_SESSION["current_job"];
        echo '</a>&nbsp;';
    }
}
?>
    <input type="number" name="req_job_no" class="form-control" size="10" 
    placeholder="Task No">&nbsp;
    <!-- <input type="button" onclick="myPrint('print-content')" 
    value="Print" class='w3-button w3-green'> -->
    <a class="w3-button w3-green" href="../page/job_report.php">Task Report</a>&nbsp;
    <br>
    <div id="print-content" class="row">
<?php
if (check_role("STAFF") | check_role("ADMIN")) {
    echo '<select name="dept_id">' . "\n";
    $selected = "";
    if (check_role("ADMIN")) {
        $selected = " selected";
        echo '<option value="0"' . $selected . ">Any department</option>\n";
    }
    $selected = "";
    $rows = query("SELECT id, dept_name FROM dept order by dept_name");
    foreach ($rows as $row) {
        if (check_dept($row["dept_name"])) {
            //if ($_SESSION["dept_id"] == 0) {
                //$_SESSION["dept_id"] = $row["id"];
            //} 
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
    $selected = "";
    $rows = query("SELECT distinct discipline FROM jobs order by discipline");
    foreach ($rows as $row) {
        if ($row["discipline"] == $_SESSION["discipline"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        echo '<option value="' . $row["discipline"] . '"' . $selected . ">";
        //echo $row["discipline"] . " - " . $selected . 
        //$_SESSION["discipline"] . "</option>\n";
        echo $row["discipline"] . "</option>\n";
    }
    echo "</select>";
    echo '<select name="severity">';
    $selected = "";
    if ($_SESSION["severity"] == "any") {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any severity</option>';
    $selected = "";
    $rows = query("SELECT distinct severity FROM jobs order by severity");
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
    $selected = "";
    $sql = "SELECT distinct b.id, b.surname, b.first_name FROM jobs a, people b ";
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
        echo $row["surname"] . ", " . $row["first_name"] . "</option>\n";
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
    $sql .= "FROM jobs j, projects a where j.project_id = a.id ";
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
    if ($_SESSION["asset_id"] == 0) {
        $selected = " selected";
    }
    echo '<option value="any"' . $selected . '>Any asset</option>';
    $selected = "";
    $sql = "SELECT distinct j.asset_id as asset_id, a.asset_name, a.asset_seq ";
    $sql .= "FROM jobs j, asset a where j.asset_id = a.id order by asset_seq";
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
    $selected = "";
    $sql =  "SELECT distinct b.id, b.surname, b.first_name, b.given_name ";
    $sql .= "FROM jobs a, people b where a.assigned_to = b.id and b.id > 0 ";
    $sql .= "order by b.surname, b.first_name, b.given_name";
    $rows = query($sql);
    foreach ($rows as $row) {
        if ($row["id"] == $_SESSION["assigned_to"]) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        $full_name = $row["surname"] . ", ";
        if (strlen($row["given_name"]) > 0) {
            $full_name .= $row["given_name"];
        } else {
            $full_name .= $row["first_name"];
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo  $full_name . "</option>\n";
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
    //-----------------------------------
    if ($_SESSION["status"] == "late") {
        $selected = " selected";
    }
    echo '<option value="late"' . $selected . '>Late</option>' . "\n";
    $selected = "";
    if ($_SESSION["status"] == "due") {
        $selected = " selected";
    }
    echo '<option value="due"' . $selected . '>Due today</option>' . "\n";
    //----------------------------------
    echo '</select>';
} else {
    //$_SESSION["dept_id"] = "0";
    //$_SESSION["discipline"] = "any";
    //$_SESSION["severity"] = "any";
    //$_SESSION["project_id"] = "any";
    //$_SESSION["asset_id"] = "any";
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
<table class="w3-table">
  <thead>
    <tr>
      <th>Severity</th>
      <th>Task No</th>
      <th>Summary</th>
      <th>Asset/Project</th>
      <th>Created</th>
      <th>Status</th>
      <th class="noprint">Action</th>
    </tr>
  </thead>
  <tbody>
<?php 
$cmd1 = "SELECT a.*"; 
$cmd1 .= " from jobs a ";
$where = " where ";
$cmd2 = " ";
if (!check_role("STAFF") & !check_role("ADMIN")) {
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
if ($_SESSION["project_id"] != "any") {
    $cmd2 .= $where . " project_id = '" . $_SESSION["project_id"] . "' "; 
    $where = " and ";
}
if ($_SESSION["asset_id"] != 0) {
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
// if (!check_role("RESIDENT")) {
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
    $cmd2 .= "and date_closed < '1900-01-02' ";
    $where = " and ";
    break;
//----------------------------------------
case "late":
    $cmd2 .= $where . " due_date < date(now()) and date_closed < '1900-01-02' ";
    $where = " and ";
    break;
case "due":
    $cmd2 .= $where . " due_date = date(now()) and date_closed < '1900-01-02' ";
    $where = " and ";
    break;
//----------------------------------------
}
$cmd3 = " order by severity desc, id desc"; // limit 50";
$cmd = $cmd1 . $cmd2 . $cmd3;
//echo "<br>$cmd<br>";
$rows = query($cmd);
if (count($rows) > 0) {
    $no_of_jobs = count($rows);
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
        echo "<tr>";
        echo '<td>' . $row['severity'] . "<br>" . $myhours . ' hours</td>';
        echo "<td>" . '<a href="../page/job_read.php?id=';
        echo $row['id'] . '">' . $row["id"] . '</a>';        
        echo "</td>";
        echo "<td>";
        $subject = str_replace("''", "'", $row["subject"]);
        echo wordwrap($subject, 20, "<br>\n", false);
        echo "</td>";
        if ($row["asset_id"] > 0 & $row["asset_id"] <> 368) {
            $sql2 = "select asset_name from asset where id = ?";
            $rows2 = query($sql2, $row["asset_id"]);
            //var_dump($rows2);
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
        echo "<td>" . $create_date . "</td>";
        $status = "";
        if ($date_closed < '1900-01-02') {
            $status .= "Open<br>";
        }
        if ($sched_date > '1900-01-01') {
            $status .= "Scheduled: $sched_date<br>";
        }
        if ($sched_date < '1900-01-02') {
            $status .= "Not Scheduled<br>";
        }
        if ($date_closed > '1900-01-01') {
            $status .= "Closed: $date_closed<br>";
        }
        if ($date_assigned < '1900-01-02' | $assigned_to == 0) {
            $status .= "Not assigned<br>";
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
            $status .= "Late - due " . $due_date . "<br>";
        }
        if ($read_date < '1900-01-01') {
            $status .= "Not Read<br>";
        }
        echo '<td>' . $status . '</td>';
        echo '<td class="noprint">';
        echo '<a class="w3-button w3-green noprint" href="../page/job_read.php?id=';
        echo $row['id'] . '">Read</a>' . '&nbsp;';
        if (check_role("STAFF") | check_role("ADMIN")) {
            echo '<a class="w3-button w3-green noprint" '; 
            echo 'href="../page/job_update.php?id=' . $row['id'] . '">Update</a>';
            echo '&nbsp;';
            if (check_role("ADMIN")) {
                if ($row['id'] > 0) {
                    echo '<a class="w3-button w3-red noprint" '; 
                    echo 'href="../page/job_delete.php?id=' . $row['id'];
                    echo '">Delete</a>';
                }
            }
        }
        echo "</td>";
        echo "</tr>\n\r";
    }
}
?>
        </tbody>
    </table>
<?php
echo "<br>Number of Tasks selected = " . $no_of_jobs;
?>
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
