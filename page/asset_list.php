<?php
/**
 * Program: asset_list
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
//$encrypted_string = "initialised";
//$encrypted_string = my_encrypt("Hello World!");
//echo $encrypted_string . "<br>";
//$decrypted_string = my_decrypt($encrypted_string);
//echo "Decrypted string: " . $decrypted_string;
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
<?php      
if (check_role("STAFF")) {
    echo "<th>Action</th>";
}
?>
    </tr>
  </thead>
  <tbody>

<?php
$sql = "select a.id, a.asset_name, b.asset_description, a.asset_size ";
$sql .= "from asset a, asset_type b ";
$sql .= "where a.asset_type = b.id ";
$sql .= "order by a.asset_name, b.asset_description";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['asset_name'] . '</td>';
    echo '  <td>' . $row['asset_description'] . '</td>';
    echo '  <td>' . $row['asset_size'] . '</td>';
    if (check_role("STAFF")) {
        echo '  <td>';
        echo '<a class="w3-button w3-green" href="../page/asset_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../page/asset_delete.php?id=';
        echo $row['id'] . '">Delete</a>';
        echo '  </td>';
    }
    echo '</tr>';
}
?>
  </tbody>
</table>
<?php
require "../inc/msg.php";
require "../inc/footer.php";
?>
