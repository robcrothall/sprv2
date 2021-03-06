<?php
/**
 * Program: task_report_form
 * 
 * Display a list of tasks, depending on selected criteria.
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT : 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $error = false;
    $message = "";
    // var_dump($_SESSION["status"]);
    if (isset($_POST["originator_id"])) {
        $_SESSION["originator_id"] = $_POST["originator_id"];
    } elseif (!isset($_SESSION["originator_id"])) {
        $_SESSION["originator_id"] = 0;
    }
    if (isset($_POST["assigned_to"])) {
        $_SESSION["assigned_to"] = $_POST["assigned_to"];
    } elseif (!isset($_SESSION["assigned_to"])) {
        $_SESSION["assigned_to"] = 0;
    }
    if (isset($_POST["dept_id"])) {
        $_SESSION["dept_id"] =  $_POST["dept_id"];
    } elseif (!isset($_SESSION["dept_id"])) {
        $_SESSION["dept_id"] = "any";
    }
    if (isset($_POST["asset_id"])) {
        $_SESSION["asset_id"] =  $_POST["asset_id"];
    } elseif (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = "any";
    }
    if (isset($_POST["discipline"])) {
        $_SESSION["discipline"] = $_POST["discipline"];
    } elseif (!isset($_SESSION["discipline"])) {
        $_SESSION["discipline"] = "any";
    }
    if (isset($_POST["severity"])) {
        $_SESSION["severity"] = $_POST["severity"];
    } elseif (!isset($_SESSION["severity"])) {
        $_SESSION["severity"] = "any";
    }
    if (isset($_POST["status"])) {
        $_SESSION["status"] = $_POST["status"];
    } elseif (!isset($_SESSION["status"])) {
        $_SESSION["status"] =  "open";
    }
    /*if (!empty($_POST["req_task_no"])) {
    $_SESSION["rec_id"] = $_POST["req_task_no"];
    $rows = query("select * from tasks where id=?", $_SESSION["rec_id"]);
    if (count($rows) > 0) {
    render("../page/task_update_form.php", ["title" => "Update a task", "message" => "Task " . $_SESSION["rec_id"] . " selected"]);
    } else {
    $message = "Task " . $_SESSION["rec_id"] . " does not exist.";
    }
    } */
    //$sql = "select count(*) as kount from tasks where  ((sched_date > '1900-01-01' and sched_date < now()) or create_date + 7 < now()) and closed < '1900-01-02' ";
    //$late = 0;
    //$hours = 0;
    $dept_id = $_SESSION["dept_id"];
    //      $message .= " Status = " . $_SESSION["status"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= " Open = " . $rows[0]["kount"];
    /*
    // -------------------
    $sql = 'select parm_num as hours from parms_char where parm_name = "severity" and parm_value like "02%"';
    $rows = query($sql);
    $hours = $rows[0]["hours"]; 
    //     $message .= " Hours for 02=" . $hours;
    $sql = "select count(*) as kount from tasks where severity like '02%' and closed < '1900-01-02' and DATE_ADD(create_date, INTERVAL ? HOUR) < now()";
    $rows = query($sql, $hours);
    $late += $rows[0]["kount"];
    // -------------------
    $sql = 'select parm_num as hours from parms_char where parm_name = "severity" and parm_value like "04%"';
    $rows = query($sql);
    $hours = $rows[0]["hours"]; 
    //     $message .= " Hours for 04=" . $hours;
    $sql = "select count(*) as kount from tasks where severity like '04%' and closed < '1900-01-02' and DATE_ADD(create_date, INTERVAL ? HOUR) < now()";
    $rows = query($sql, $hours);
    $late += $rows[0]["kount"];
    // -------------------
    $sql = 'select parm_num as hours from parms_char where parm_name = "severity" and parm_value like "06%"';
    $rows = query($sql);
    $hours = $rows[0]["hours"]; 
    //     $message .= " Hours for 06=" . $hours;
    $sql = "select count(*) as kount from tasks where severity like '06%' and closed < '1900-01-02' and DATE_ADD(create_date, INTERVAL ? HOUR) < now()";
    $rows = query($sql, $hours);
    $late += $rows[0]["kount"];
    // -------------------
    $sql = 'select parm_num as hours from parms_char where parm_name = "severity" and parm_value like "08%"';
    $rows = query($sql);
    $hours = $rows[0]["hours"]; 
    //     $message .= " Hours for 08=" . $hours;
    $sql = "select count(*) as kount from tasks where severity like '08%' and closed < '1900-01-02' and DATE_ADD(create_date, INTERVAL ? HOUR) < now()";
    $rows = query($sql, $hours);
    $late += $rows[0]["kount"];
    */
    $sql = 'select count(*) as kount from tasks where dept_id=? and due_date < date(now()) and closed = "0000-00-00 00:00:00"';
    $rows = query($sql, $dept_id);
    $message .= ",  Late = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02' and severity like '08%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Critical = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02' and severity like '06%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Urgent = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and read_date < '1900-01-02' and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not read = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and assigned_to =0 and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not assigned = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed > '1900-01-01'";
    $rows = query($sql, $dept_id);
    $message .= ",  Closed = " . $rows[0]["kount"];
    render("../page/task_report_form.php", ["title" => "Tasks Report", "message" => $message]);

} else {
    $error = false;
    $message = "";
    if (isset($_POST["originator_id"])) {
        $_SESSION["originator_id"] = $_POST["originator_id"];
    } elseif (!isset($_SESSION["originator_id"])) {
        $_SESSION["originator_id"] = 0;
    }
    if (isset($_POST["dept_id"])) {
        $_SESSION["dept_id"] =  $_POST["dept_id"];
    } elseif (!isset($_SESSION["dept_id"])) {
        $_SESSION["dept_id"] = 0;
    }
    if (isset($_POST["asset_id"])) {
        $_SESSION["asset_id"] =  $_POST["asset_id"];
    } elseif (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = "any";
    }
    if (isset($_POST["discipline"])) {
        $_SESSION["discipline"] = $_POST["discipline"];
    } elseif (!isset($_SESSION["discipline"])) {
        $_SESSION["discipline"] = "any";
    }
    if (isset($_POST["severity"])) {
        $_SESSION["severity"] = $_POST["severity"];
    } elseif (!isset($_SESSION["severity"])) {
        $_SESSION["severity"] = "any";
    }
    if (isset($_POST["status"])) {
        $_SESSION["status"] = $_POST["status"];
    } elseif (!isset($_SESSION["status"])) {
        $_SESSION["status"] =  "open";
    }
    if (isset($_POST["assigned_to"])) {
        $_SESSION["assigned_to"] = $_POST["assigned_to"];
    } elseif (!isset($_SESSION["assigned_to"])) {
        $_SESSION["assigned_to"] =  0;
    }
    if (!isset($_SESSION["originator_id"])) {
        $_SESSION["originator_id"] = 0;
    }
    if (!isset($_SESSION["dept_id"])) {
        $_SESSION["dept_id"] = 0;
    }
    if (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = "any";
    }
    if (!isset($_SESSION["discipline"])) {
        $_SESSION["discipline"] = "any";
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
    $dept_id = $_SESSION["dept_id"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= " Open = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and due_date < date(now()) and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Late = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02' and severity like '08%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Critical = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed < '1900-01-02' and severity like '06%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Urgent = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and read_date < '1900-01-02' and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not read = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and assigned_to =0 and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not assigned = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and closed > '1900-01-01'";
    $rows = query($sql, $dept_id);
    $message .= ",  Closed = " . $rows[0]["kount"];
    render("../page/task_report_form.php", ["title" => "Tasks Report", 'message' => $message]);
}
?>
