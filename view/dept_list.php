<?php
/**
 * Program: dept_list
 * 
 * Display details about departments.
 * php version 7.2.10
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
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
require "../assets/inc/db_open.php";
echo '<h1>List of Departments</h1>';
if (check_role("STAFF")) {
    echo '<a href="dept_add.php" class="w3-button w3-green">';
    echo 'Add a department</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Department Name</th>
      <th>Manager</th>
      <th>Task Email</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "select a.id, a.dept_name, b.surname, b.first_name, b.given_name, ";
$sql .= "job_email ";
$sql .= "from dept a, people b ";
$sql .= "where a.dept_manager_id = b.id ";
$sql .= "order by a.dept_name";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . trim($row['dept_name']) . '</td>';
    $full_name = trim($row["surname"]) . ", ";
    if (strlen($row["first_name"]) > 0) {
        $full_name .= trim($row["first_name"]);
    }
    if (strlen($row["given_name"]) > 0) {
        $full_name .= "(" . trim($row["given_name"]) . ")";
    }
    echo '  <td>' . $full_name . '</td>';
    echo '  <td>' . trim($row["job_email"]) . '</td>';
    echo '  <td>';
    if (check_role("STAFF")) {
        echo '<a class="w3-button w3-green" href="../page/dept_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../page/dept_delete.php?id=';
        echo $row['id'] . '">Delete</a>';
    }
    echo '  </td>';
    echo '</tr>';
}
?>
  </tbody>
</table>
<?php
require "../assets/inc/msg.php";
require "../assets/inc/footer.php";
?>
