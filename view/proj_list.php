<?php
/**
 * Program: proj_list
 * 
 * Display details about projects.
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
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
require "../inc/db_open.php";
echo '<h1>List of projects</h1>';
if (check_role("STAFF")) {
    echo '<a href="proj_add.php" class="w3-button w3-green">';
    echo 'Add a Project</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Project</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "select a.id, a.proj_name ";
$sql .= "from projects a ";
$sql .= "order by a.proj_name";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['proj_name'] . '</td>';
    echo '  <td>';
    if (check_role("STAFF")) {
        echo '<a class="w3-button w3-green" href="../page/proj_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../page/proj_delete.php?id=';
        echo $row['id'] . '">Delete</a>';
    }
    echo '  </td>';
    echo '</tr>';
}
?>
  </tbody>
</table>
<?php
require "../inc/msg.php";
require "../inc/footer.php";
?>
