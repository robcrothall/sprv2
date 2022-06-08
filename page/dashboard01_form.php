<h2>SPRV Dashboard</h2>
<?php
/**
 * Program: dashboard01_form.php
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
?>
<table class=b_table>
    <thead>
        <tr>
            <th>People by Company</th>
            <th>People by Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
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
        </td>
        <td>
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
        </td></tr>
<h3>People by Status</h3>
        <table>
            <thead>
                <tr>
                    <th>Tasks by Type</th>
                </tr>
            </thead>
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
        </tbody>
</table>
