<?php
/**
 * Program: user_list
 * 
 * Display details about Users.
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
echo '<h1>List of Users</h1>';
if (check_role("ADMIN")) {
    echo '<a href="user_add.php" class="w3-button w3-green">Add a user</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Surname</th>
      <th>First Name</th>
      <th>User name</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "select a.id, a.username, a.surname, a.first_name, a.member_exp ";
$sql .= "from users a ";
$sql .= "order by a.surname, a.first_name";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['surname'] . '</td>';
    echo '  <td>' . $row['first_name'] . '</td>';
    echo '  <td>' . $row['username'] . '</td>';
    echo '  <td>';
    if (check_role("ADMIN")) {
        echo '<a class="w3-button w3-green" href="../page/user_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../page/user_delete.php?id=';
        echo $row['id'] . '">Disable</a>';
    }
    echo "  </td>";
    echo "</tr>";
}
?>
  </tbody>
</table>
<?php
require "../inc/msg.php";
require "../inc/footer.php";
?>
