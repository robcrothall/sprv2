<?php
/**
 * Program: assphone_list
 * 
 * Display details about an unattended phone in an asset.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 */
require "../conf/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
require "../assets/inc/db_open.php";
echo '<h1>List of unattended phones in assets</h1>';
if (check_role("STAFF")) {
    echo '<a href="assphone_add.php" class="w3-button w3-green">Add a phone</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Phone</th>
      <th>Asset</th>
      <th>Comment</th>
      <th>Account No</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "select a.id, a.asset_id, b.asset_name, a.phone, a.account_no, a.descr ";
$sql .= "from asset_phone a, asset b ";
$sql .= "where a.asset_id = b.id ";
$sql .= "order by a.phone, a.descr";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['phone'] . '</td>';
    echo '  <td>' . $row['asset_name'] . '</td>';
    echo '  <td>' . $row['descr'] . '</td>';
    echo '  <td>' . $row['account_no'] . '</td>';
    echo '  <td>';
    if (check_role("STAFF")) {
        echo '<a class="w3-button w3-green" href="../page/assphone_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../page/assphone_delete.php?id=';
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
