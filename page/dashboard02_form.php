<?php
/**
 * Program: dashboard02_form.php
 * 
 * Open the database.
 * PHP version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
require "../inc/db_open.php";
?>
<h1>SPRV Dashboard</h1>
<h2>Companies</h2>
<table class=b_table>
        <table>
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT co_name as description, count(*) as kount FROM people a, company b ";
$sql .= "where a.company_id = b.id group by co_name order by kount desc limit 10";
//echo "<br>";
//var_dump($sql);
$rows = query($sql);
//echo "<br>";
//var_dump($rows);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
        <hr>
        <h2>People Status</h2>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT status as description, count(*) as kount FROM people a group by status order by kount desc limit 10;";
$rows = query($sql);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
        <hr>
        <h2>Tasks, by Type</h2>
        <table>
            <thead>
                <tr>
                    <th>Task Type</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT type as description, count(*) as kount FROM tasks a group by type order by kount desc limit 10";
$rows = query($sql);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
        <hr>
        <h2>Function Usage</h2>
        <table>
            <thead>
                <tr>
                    <th>Function Name</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT function as description, count(*) as kount ";
$sql .= "FROM function_log a group by function order by kount desc limit 20";
$rows = query($sql);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
        <hr>
        <h2>User Activity</h2>
        <table>
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT username as description, count(*) as kount ";
$sql .= "FROM function_log a, users b ";
$sql .= "WHERE a.user_id = b.id ";
$sql .= "group by username order by kount desc limit 20";
$rows = query($sql);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
        <hr>
        <h2>Function Usage, by User</h2>
        <table>
            <thead>
                <tr>
                    <th>Function</th>
                    <th>User Name</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
<?php
$sql = "SELECT username as description, function, count(*) as kount ";
$sql .= "FROM function_log a, users b ";
$sql .= "WHERE a.user_id = b.id ";
$sql .= "group by function, username order by kount desc limit 20";
$rows = query($sql);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['function'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo "<td>" . $row["kount"] . "</td>";
        echo '</tr>';
    }
}
?>
            </tbody>
        </table>
