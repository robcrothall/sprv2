<?php
/**
 * Program: job_read_form
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
 * @PHP      7.1
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;
    $message = "";
    $originator_id = 0;
    $dept_id = 6;
    $severity = "04 - Normal";
    $subject = "";
    $description = "";
    $criteria = "";
    $asset_id = 0;
    $discipline = "";
    $type = "";
    $create_id = $_SESSION["id"];
    $create_date = date("Y-m-d H:i:s");
    $project_id = 0;
    $_SESSION["sql_error"] = "Initialised";
    $user_id = $_SESSION["id"];
    if (empty($_POST["subject"])) {
        $message .= "You must provide a job summary.  "; 
        $error = true;
    } else {
        $subject = test_input($_POST['subject']);
    }
    if (empty($_POST["description"])) {
        $description = $subject;
    } else {
        $description = test_input($_POST['description']);
    }
    if (empty($_POST["criteria"])) {
        $criteria = "";
    } else {
        $criteria = test_input($_POST['criteria']);
    }
    if (!empty($_POST["originator_id"])) {
        $originator_id = test_input($_POST['originator_id']);
    } else {
        $originator_id = 0;
    }
    if (!empty($_POST["dept_id"])) {
        $dept_id = test_input($_POST['dept_id']);
    }
    if (!empty($_POST["severity"])) {
        $severity = test_input($_POST['severity']);
    }
    $sql = 'select parm_num as hours from parms_char ';
    $sql .= 'where parm_name = "severity" and parm_value=?';
    $rows = query($sql, $severity);
    $hours = $rows[0]["hours"];
    if (empty($hours)) {
        $hours = 168; // seven days
    }
    $hours = number_format($hours, 0, '', '');
    $due_date = str_replace('-', '/', $create_date);
    $due_date = date('Y-m-d', strtotime($due_date . "+" . $hours . " hours"));
    if (!empty($_POST["project_id"])) {
        $project_id = test_input($_POST['project_id']);
    }
    if (!empty($_POST["asset_id"])) {
        $asset_id = test_input($_POST['asset_id']);
    }
    if (!empty($_POST["discipline"])) {
        $discipline = test_input($_POST['discipline']);
    }
    if (!empty($_POST["type"])) {
        $type = test_input($_POST['type']);
    }
    if ($error == false) {
        if (strlen($subject) > 80) {
            $subject = substr($subject, 0, 80);
        }
        if (strlen($description) > 750) {
            $description = substr($description, 0, 750);
        }
        if (strlen($criteria) > 750) {
            $criteria = substr($criteria, 0, 750);
        }
        $rowCount = query(
            "insert into jobs (originator_id, dept_id, " .
            "severity, subject, description, criteria, " . 
            "asset_id, discipline, type, " . 
            "due_date, create_id, project_id, user_id) " .
            "values (?,?,?,?,?,?,?,?,?,?,?,?,?)",
            $originator_id, $dept_id,
            $severity, $subject, $description, $criteria, 
            $asset_id, $discipline, $type, 
            $due_date, $create_id, $project_id, $user_id
        );
        if (!$rowCount == false) {
            $message .= "Failed to add the Job record - please call support!  ";
        } else {
            $message .= "Job inserted successfully.  ";
            $job_no = $_SESSION["inserted_row_id"];
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
            $sql = "select first_name, given_name, surname, home_email, ";
            $sql .= "work_email, company_id from people where id=?";
            $rows = query($sql, $originator_id);
            if (!$rowCount == true) {
                $originator_name = $rows[0]["surname"] . ", ";
                $originator_name .= $rows[0]["first_name"];
                if ($rows[0]["company_id"] = 1) {
                    $originator_email = $rows[0]["home_email"];
                } else {
                    $originator_email = $rows[0]["work_email"];
                }
            } else {
                $originator_name = "";
                $originator_email = "";
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
            if (!empty($originator_email)) {
                $originator_email = ", " . $originator_email;
            }
            
            $to = $job_email;
            $mail_subject = "New Task - $job_no : $subject";
         
            $txt  = "<h1>New Task (#" . $job_no . ") has been created</h1>";
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
            $txt .= "<br>Submitter: $user_name\r\n";
            $txt .= "<br>Created: $create_date\r\n";
            $txt .= "<br><br>Regards...\r\n ";
            $txt .= "<br>jobcards@settlerspark.co.za";
             
            $header = "From: " . HELPDESK_EMAIL . " \r\n";
            $header .= "CC: " . $job_email . $originator_email . " \r\n";
            $header .= "BCC: rob@crothall.co.za \r\n";
            $header .= "MIME-Version: 1.0\r\n";
            $header .= "Content-type: text/html\r\n";

            $retval = mail($to, $mail_subject, $txt, $header);
         
            // $message .= $to . $subject . $txt . $header . $retval;

            if ($retval == true ) {
                $message .= " Email message sent successfully...";
            } else {
                $message .= " Email message could not be sent...";
            }

        }
    }
    /* echo "RowCount=";
    var_dump($rowCount);
    echo "Subject=";
    var_dump($subject);
    echo "Originator=";
    var_dump($originator_id);
    echo "Dept=";
    var_dump($dept_id);
    echo "Severity=";
    var_dump($severity);
    echo "Description=";
    var_dump($description);
    echo "Asset ID=";
    var_dump($asset_id);
    echo "Discipline=";
    var_dump($discipline);
    echo "Type=";
    var_dump($type);
    echo "Create ID=";
    var_dump($create_id);
    echo "Project ID=";
    var_dump($project_id);
    echo "User ID=";
    var_dump($user_id);
    echo "Message=";
    var_dump($message);
    echo "SQL Error=";
    var_dump($_SESSION["sql_error"]);
    */
    $_SESSION["current_job"] = $job_no;
    render(
        "../page/job_form.php", 
        ["title" => "List of jobs", "message" => "$message"]
    );
} else {
    if (!isset($_SESSION["originator_id"])) {
        $_SESSION["originator_id"] = 0;
    }
    if (!isset($_SESSION["dept_id"])) {
        $_SESSION["dept_id"] = 6;
    }
    if (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = 0;
    }
    if (!isset($_SESSION["discipline"])) {
        $_SESSION["discipline"] = 0;
    }
    if (!isset($_SESSION["severity"])) {
        $_SESSION["severity"] = "any";
    }
    if (!isset($_SESSION["status"])) {
        $_SESSION["status"] = "open";
    }
    if (!isset($_SESSION["assigned_to"])) {
        $_SESSION["assigned_to"] = 0;
    }
    render(
        "../page/job_create_form.php", 
        ["title" => "Record Details of a new task"]
    );
}
?>
