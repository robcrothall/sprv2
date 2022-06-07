<?php
/**
 * Program: ass_memberships_list
 * 
 * List Associate memberships.
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
echo '<h1>List of Associate Members</h1>';
if (!check_role("FINANCE")) {
    echo "Please ask someone in Administration ";
    echo "to grant you rights to access Associate membership.";
    echo '<a class="w3-button w3-green" href="../page/news_list.php>Return</a>';
}
echo '<a href="ass_memberships_add.php" ';
echo 'class="w3-button w3-green">Add an Associate Member</a>';
echo "&nbsp";
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Member Name</th>
      <th>Expiry</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "select a.id, a.person_id, a.expiry_date, c.status, ";
$sql .= "a.status as member_status, ";
$sql .= "b.group_name, c.surname, c.first_name, c.given_name ";
$sql .= "from memberships a, groups b, people c ";
$sql .= "where a.group_id = b.id and a.person_id = c.id ";
$sql .= "and a.group_id = 2 ";
$sql .= "order by b.group_name, c.surname, c.first_name";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    //echo '  <td>' . $row['group_name'] . '</td>';
    echo '  <td>' . $row['surname'] . ", " . $row["first_name"];
    if (!empty($row["given_name"])) {
        echo " (" . $row["given_name"] . ")";
    }
    echo '  </td>';
    //echo '  <td>' . $row['is_manager'] . '</td>';
    echo "  <td>";
    echo $row["expiry_date"];
    if ($row["expiry_date"] < date("Y-m-d")) {
        echo " - Expired";
    }
    echo "</td>";
    echo '  <td>';
    echo '<a class="w3-button w3-green" href="../page/ass_memberships_edit.php?id=';
    echo $row['id'] . '">Update</a>';
    if (check_role("ADMIN")) {
        echo '<a class="w3-button w3-red" ';
        echo 'href="../page/ass_memberships_delete.php?id=';
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
echo "<p></p>";
require "../assets/inc/footer.php";
?>
