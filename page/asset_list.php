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
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
require "../inc/db_open.php";
echo '<h1>List of assets</h1>';
if (check_role("STAFF")) {
    echo '<a href="asset_add.php" class="w3-button w3-green">Add an asset</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Asset Name</th>
      <th>Asset Type</th>
      <th>Asset Size</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "select a.id, a.asset_name, b.description, a.asset_size ";
$sql .= "from asset a, asset_type b ";
$sql .= "where a.asset_type = b.id ";
$sql .= "order by a.asset_type, a.asset_name";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['description'] . '</td>';
    echo '  <td>' . $row['asset_name'] . '</td>';
    echo '  <td>' . $row['asset_size'] . '</td>';
    echo '  <td>';
    if (check_role("STAFF")) {
        echo '<a class="w3-button w3-green" href="../view/asset_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../view/asset_delete.php?id=';
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