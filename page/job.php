<?php
/**
 * Program: task.php
 * 
 * Prepares to execute task listing.
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
 // configuration
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
        $_SESSION["dept_id"] = 0;
    }
    if (isset($_POST["project_id"])) {
        $_SESSION["project_id"] =  $_POST["project_id"];
    } elseif (!isset($_SESSION["project_id"])) {
        $_SESSION["project_id"] = 0;
    }
    if (isset($_POST["asset_id"])) {
        $_SESSION["asset_id"] =  $_POST["asset_id"];
    } elseif (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = 0;
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
    if (!empty($_POST["req_task_no"])) {
        $_SESSION["rec_id"] = $_POST["req_task_no"];
        $rows = query("select * from tasks where id=?", $_SESSION["rec_id"]);
        if (count($rows) > 0) {
            render(
                "../page/task_update_form.php", ["title" => "Update a task", 
                "message" => "Task " . $_SESSION["rec_id"] . " selected"]
            );
        } else {
            $message = "Task " .     $_SESSION["rec_id"] . " does not exist.";
        }
    }
    $dept_id = $_SESSION["dept_id"];
    $sql = "select count(*) as kount from tasks ";
    $sql .= "where dept_id=? and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= " Open = " . $rows[0]["kount"];
    $sql = 'select count(*) as kount from tasks where dept_id=? and ';
    $sql .= 'due_date < date(now()) and closed = "0000-00-00 00:00:00"';
    $rows = query($sql, $dept_id);
    $message .= ",  Late = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02' and severity like '08%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Critical = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02' and severity like '06%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Urgent = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "read_date < '1900-01-02' and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not read = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "assigned_to = 0 and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not assigned = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed > '1900-01-01'";
    $rows = query($sql, $dept_id);
    $message .= ",  Closed = " . $rows[0]["kount"];
    render(
        "../page/task_form.php", ["title" => "Tasks Report", "message" => $message]
    );

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
        $rows = query("SELECT id, dept_name FROM dept order by dept_name desc");
        foreach ($rows as $row) {
            if (check_dept($row["dept_name"])) {
                $_SESSION["dept_id"] = $row["id"];
            }
        }
    }
    if (isset($_POST["asset_id"])) {
        $_SESSION["asset_id"] =  $_POST["asset_id"];
    } elseif (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = 0;
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
    if (!isset($_SESSION["project_id"])) {
        $_SESSION["project_id"] = 0;
    }
    if (!isset($_SESSION["asset_id"])) {
        $_SESSION["asset_id"] = 0;
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
    $sql = "select count(*) as kount from tasks ";
    $sql .= "where dept_id=? and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= " Open = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "due_date < date(now()) and closed < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Late = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02' and severity like '08%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Critical = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02' and severity like '06%'";
    $rows = query($sql, $dept_id);
    $message .= ",  Urgent = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02'  and read_date < '1900-01-02'";
    $rows = query($sql, $dept_id);
    $message .= ",  Not read = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed < '1900-01-02'  and assigned_to =0";
    $rows = query($sql, $dept_id);
    $message .= ",  Not assigned = " . $rows[0]["kount"];
    // -------------------
    $sql = "select count(*) as kount from tasks where dept_id=? and ";
    $sql .= "closed > '1900-01-01'";
    $rows = query($sql, $dept_id);
    $message .= ",  Closed = " . $rows[0]["kount"];
    render("../page/task_form.php", ["title" => "Open Tasks", 'message' => $message]);
}
?>
