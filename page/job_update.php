<?php
/**
 * Program: job_update
 * 
 * Update a task.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */

require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rec_id = $_SESSION["rec_id"];
    $job_no = $rec_id;
    $error = false;
    $message = "";
    $email_subject = "updated";
    $date_assigned = strtotime("0000-00-00");
    $sql = "select * from jobs where id=?";
    $rows = query($sql, $rec_id);

    $subject = $rows[0]["subject"];
    $description = $rows[0]["description"];
    $criteria = $rows[0]["criteria"];
    $originator_id = $rows[0]["originator_id"];
    $dept_id = $rows[0]["dept_id"];
    $severity = $rows[0]["severity"];
    $asset_id = $rows[0]["asset_id"];
    $create_date = $rows[0]["create_date"];
    $due_date = $rows[0]["due_date"];
    $discipline = $rows[0]["discipline"];
    $assigned_to = $rows[0]["assigned_to"];
    $read_date = $rows[0]["read_date"];
    $date_assigned = $rows[0]["date_assigned"];
    $project_id = $rows[0]["project_id"];
    $type = $rows[0]["type"];
    $estimated_hours = $rows[0]["estimated_hours"];
    $sched_date = $rows[0]["sched_date"];
    $sched_time = $rows[0]["sched_time"];
    $actual_date = $rows[0]["actual_date"];
    $actual_time = $rows[0]["actual_time"];
    $actual_hours = $rows[0]["actual_hours"];
    $date_closed = $rows[0]["date_closed"];

    if (empty($_POST["subject"])) {
        $message .= "You must provide a job summary.  ";
        $subject="No Subject";
    } else {
        $subject = test_input($_POST["subject"]);
    }
    if (empty($_POST["description"])) {
        $message = "Please provide a problem description.  "; 
        $description="No description";
    } else {
        $description = test_input($_POST["description"]);
    }
    if (empty($_POST["criteria"])) {
        $criteria = "";
    } else {
        $criteria = test_input($_POST["criteria"]);
    }
    $originator_id  = test_input($_POST["originator_id"]);
    if (empty($originator_id)) {
        $originator_id = 0;
    }
    $dept_id  = test_input($_POST["dept_id"]);
    if (empty($dept_id)) {
        $dept_id = 6;
    }
    $severity = test_input($_POST["severity"]);
    if (empty($severity)) {
        $criteria = "04 - Normal";
    }
    $asset_id = test_input($_POST["asset_id"]);
    if (empty($asset_id)) {
        $asset_id = 0;
    }
    $discipline = test_input($_POST["discipline"]);
    $assigned_to = test_input($_POST["assigned_to"]);
    // var_dump($assigned_to);
    if (empty($assigned_to)) {
        $assigned_to = 0;
    }
    // var_dump($assigned_to);
    $short_list = test_input($_POST["short_list"]);
    if (empty($short_list)) {
        $short_list = 0;
    }
    $project_id = test_input($_POST["project_id"]);
    if (empty($project_id)) {
        $project_id = 0;
    }
    $type = test_input($_POST["type"]);
    $estimated_hours = test_input($_POST["estimated_hours"]);
    $sched_date = test_input($_POST["sched_date"]);
    $sched_time = test_input($_POST["sched_time"]);
    $actual_date = test_input($_POST["actual_date"]);
    $actual_time = test_input($_POST["actual_time"]);
    $actual_hours = test_input($_POST["actual_hours"]);
    $closed = '';
    if (!empty($_POST["closed"])) {
        $closed = test_input($_POST["closed"]);
        //$message .= "Closed from screen = " . $closed . ";";
    }
    $user_id = $_SESSION["id"];
    if ($estimated_hours == '') {
        $estimated_hours = 0;
    }
    if ($sched_date == '') {
        $sched_date = '0000-00-00';
    }
    if ($sched_time == '') {
        $sched_time = '00:00:00';
    }
    if (($sched_date > "1900-01-01") or ($due_date == "0000-00-00")) {
        if (($sched_date > $create_date) or ($due_date == "0000-00-00")) {
            $sql = 'select parm_num as hours from parms_char ';
            $sql .= 'where parm_name = "severity" and parm_value=?';
            $rows = query($sql, $severity);
            $hours = $rows[0]["hours"];
            if (empty($hours)) {
                $hours = 168; // seven days
            }
            $hours = number_format($hours, 0, '', '');
            $temp_date = date_create($sched_date . ' ' . $sched_time);
            date_add(
                $temp_date, date_interval_create_from_date_string($hours . ' hours')
            );
            $due_date = date_format($temp_date, 'Y-m-d');
        }
    }
    if ($actual_date == '') {
        $actual_date = '0000-00-00';
    }
    if ($actual_time == '') {
        $actual_time = '00:00:00';
    }
    if ($actual_hours == '') {
        $actual_hours = 0;
    }
    $sql = "select * from jobs where id=?";
    $rows = query($sql, $rec_id);
    $create_date = $rows[0]["create_date"];
    $old_assigned_to = $rows[0]["assigned_to"];
    if ($assigned_to == $rows[0]["assigned_to"]) {
        $date_assigned = $rows[0]["date_assigned"];
    } else {
        $date_assigned = date("Y-m-d H:i:s");
        $email_subject = "re-assigned";
    }
    if ($short_list != $rows[0]["assigned_to"]) {
        $assigned_to = $short_list;
        $date_assigned = date("Y-m-d H:i:s");
        $email_subject = "re-assigned";
    }
    $new_assigned_to = $assigned_to;
    $read_date = $rows[0]["read_date"];
    if ($read_date == "0000-00-00 00:00:00") {
        $read_date = date("Y-m-d H:i:s");
    }
    $date_closed = $rows[0]["date_closed"];
    if ($closed == '') {
        $date_closed = '0000-00-00 00:00:00';
    } elseif ($date_closed == '0000-00-00 00:00:00') {
        $date_closed = date("Y-m-d H:i:s", time());
        $email_subject = "completed";
    }
    //$message = "Date closed = $date_closed";
    // Back up the old record
    $sql = "insert into jobs_history select * from jobs where id=?";
    $rowCount = query($sql, $rec_id);
    // Tidy up old history records
    $sql = "delete from jobs_history where date_closed > '1900-01-01' ";
    $sql .= "and date_closed < NOW() - INTERVAL 180 DAY";
    $rowCount = query($sql);
    // Tidy up some fields
    if (strlen($subject) > 120) {
        $subject = substr($subject, 0, 120);
    }
    if (strlen($description) > 750) {
        $description = substr($description, 0, 750);
    }
    if (strlen($criteria) > 750) {
        $criteria = substr($criteria, 0, 750);
    }
    // Write the updated record
    $sql  = "update jobs set subject='" . $subject . "'";
    $sql .= ", description='" . $description . "'";
    $sql .= ", criteria='" . $criteria . "'";
    $sql .= ", originator_id=" . $originator_id . ", dept_id=" . $dept_id;
    $sql .= ", severity='" . $severity . "', asset_id=" . $asset_id;
    $sql .= ", due_date='" . $due_date . "'";
    $sql .= ", discipline='" . $discipline . "', assigned_to=" . $assigned_to;
    $sql .= ", read_date='" . $read_date . "'";
    $sql .= ", date_assigned='" . $date_assigned . "'";
    $sql .= ", project_id=" . $project_id . ", type='" . $type . "'";
    $sql .= ", estimated_hours=" . $estimated_hours;
    $sql .= ", sched_date='" . $sched_date . "'";
    $sql .= ", sched_time='" . $sched_time . "', actual_date='" . $actual_date . "'";
    $sql .= ", actual_time='" . $actual_time . "', actual_hours=" . $actual_hours;
    $sql .= ", date_closed='" . $date_closed . "', user_id=" . $user_id; 
    $sql .= " where id=?";
    //$message .= "SQL = $sql;";
    $rowCount = query($sql, $rec_id);
    if ($rowCount === false) {
        $message .= "Failed to update the Job record - please call support!";
    } else {
        $message .= "Job $rec_id updated successfully. ";
        $_SESSION["current_job"] = $rec_id;
        $sql = "select dept_name, job_email from dept where id=?";
        $rows = query($sql, $dept_id);
        if (!$rowCount == true) {
            $dept_name = $rows[0]["dept_name"];            
            $job_email = $rows[0]["job_email"];            
        } else {
            $dept_name = "Unknown " . $dept_id;            
            $job_email = "";            
        }
        $originator_name = "unknown " . $originator_id;
        $originator_email = "";
        $sql = "select first_name, surname, home_email, work_email ";
        $sql .= "from people where id=?";
        $rows = query($sql, $originator_id);
        if ($rows !== false) {
            $originator_name = $rows[0]["first_name"] . " " . $rows[0]["surname"];
            if (!empty($rows[0]["home_email"])) {
                $originator_email = ", " . $rows[0]["home_email"];
            }
            if (!empty($rows[0]["work_email"])) {
                $originator_email = ", " . $rows[0]["work_email"];
            }
        }
        $asset_name = "Unknown " . $asset_id;
        $sql = "select asset_name from asset where id=?";
        $rows = query($sql, $asset_id);
        if (!$rowCount == true) {
            $asset_name = $rows[0]["asset_name"];            
        }
        $proj_name = "Unknown " . $project_id;
        $sql = "select proj_name from projects where id=?";
        $rows = query($sql, $project_id);
        if (!$rowCount == true) {
            $proj_name = $rows[0]["proj_name"];            
        }
        $user_name = "Unknown " . $user_id;
        $sql = "select first_name, surname from users where id=?";
        $rows = query($sql, $user_id);
        if (!$rowCount == true) {
            $user_name = $rows[0]["first_name"] . " " . $rows[0]["surname"];
        }
        $assign_name = "Unknown " . $assigned_to;
        $sql = "select first_name, surname from people where id=?";
        $rows = query($sql, $assigned_to);
        if (!$rowCount == true) {
            $assign_name = $rows[0]["surname"] . ", " . $rows[0]["first_name"];
        }
        $old_assigned_to_name = "unknown " . $old_assigned_to;
        $old_assigned_to_email = "";
        $sql = "select first_name, surname, home_email, work_email ";
        $sql .= "from people where id=?";
        $rows = query($sql, $old_assigned_to);
        if (!$rowCount == true) {
            $old_assigned_to_name = $rows[0]["first_name"] . " ";
            $old_assigned_to_name .= $rows[0]["surname"];
            if (!empty($rows[0]["home_email"])) {
                $old_assigned_to_email = $rows[0]["home_email"];
            }
            if (!empty($rows[0]["work_email"])) {
                $old_assigned_to_email = $rows[0]["work_email"];
            }
        }
        $new_assigned_to_name = "unknown " . $new_assigned_to;
        $new_assigned_to_email = "";
        $sql = "select first_name, surname, home_email, work_email ";
        $sql .= "from people where id=?";
        $rows = query($sql, $new_assigned_to);
        if (!$rowCount == true) {
            $new_assigned_to_name = $rows[0]["first_name"] . " ";
            $new_assigned_to_name .= $rows[0]["surname"];
            if (!empty($rows[0]["home_email"])) {
                $new_assigned_to_email = ", " . $rows[0]["home_email"];
            }
            if (!empty($rows[0]["work_email"])) {
                $new_assigned_to_email = ", " . $rows[0]["work_email"];
            }
        }
        if ($sched_date == "0000-00-00") {
            $sched_date = "";
        }
        if ($sched_time == "00:00:00") {
            $sched_time = "";
        }
        if ($date_closed == "0000-00-00 00:00:00") {
            $date_closed = "";
        }
        if ($date_assigned == "0000-00-00 00:00:00") {
            $date_assigned = "";
        }
        $to = $job_email;
        $mail_subject = "Updated Task - $job_no : $subject";
        $txt  = "<html><head><title>Task (#" . $job_no . ") has been ";
        $txt .= $email_subject . "</title></head><body>";
        $txt .= "<h1>Task (#" . $job_no . ") has been " . $email_subject . "</h1>";
        $txt .= "<br>Current status is:";
        $txt .= "<br><br>Assigned to: <strong>$assign_name</strong>\r\n";
        $txt .= "<br>Date assigned: $date_assigned\r\n";
        if ($old_assigned_to > 0) {
            if ($old_assigned_to_email <> $new_assigned_to_email) {
                $txt .= "<br>Previously assigned to: $old_assigned_to_name\r\n";
            }
        }
        $txt .= "<br>Task No: $job_no\r\n ";
        $txt .= "<br>Subject: $subject\r\n ";
        $txt .= "<br>Severity: $severity\r\n ";
        $txt .= "<br>Type: $type\r\n ";
        $txt .= "<br>Dept: $dept_name\r\n";
        $txt .= "<br>Discipline: $discipline\r\n";
        $txt .= "<br>Originator: $originator_name\r\n";
        $txt .= "<br>Description: $description\r\n";
        $txt .= "<br>Completion Criteria: $criteria\r\n";
        $txt .= "<br>Asset: $asset_name\r\n";
        $txt .= "<br>Project: $proj_name\r\n";
        $txt .= "<br>Created: $create_date\r\n";
        $txt .= "<br>Due date: $due_date\r\n";
        $txt .= "<br>Scheduled date: $sched_date\r\n";
        $txt .= "<br>Scheduled time: $sched_time\r\n";
        $txt .= "<br>Date closed: <strong>$date_closed</strong>\r\n";
        $txt .= "<br>Submitter: $user_name\r\n";
        $txt .= "<br><br><br>Regards...\r\n ";
        $txt .= "<br>Jobcards@settlerspark.co.za\r\n";
        $txt .= "</body></html>";
         
        $header = "From: " . HELPDESK_EMAIL . " \r\n";
        $header .= "CC: " . $originator_email . "; ";
        $header .= $new_assigned_to_email . " \r\n";
        $header .= "BCC: " . $old_assigned_to_email . "; rob@crothall.co.za \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

        $retval = mail($to, $mail_subject, $txt, $header);

        if ($retval == true ) {
            $message .= " Email message sent successfully..."; 
            // . $to . $txt . $header;
        } else {
            $message .= " Email message could not be sent...";
        }
        // $message .= $to . $subject . $txt . $header . $retval;

    }
    render(
        "../page/job_update_form.php", 
        ["title" => "Update an existing Task", 
        "message" => $message]
    );
} else {
    $id = null;
    if (!empty($_GET['id'])) {
        $id = test_input($_GET['id']);
    }
    $_SESSION["rec_id"] = $id;
    render(
        "../page/job_update_form.php", ["title" => "Update a Task",
        "message" => ""]
    );
}
?>
