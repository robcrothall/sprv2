<?php
/**
 * Program: addtyp_list
 * 
 * Display details about asset types.
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
require "../view/menu.php";
require "../assets/inc/msg.php";
require "../assets/inc/db_open.php";
echo '<h1>List of address types</h1>';
if (check_role("STAFF")) {
    echo '<a href="addtyp_add.php" class="w3-button w3-green">';
    echo 'Add an address type</a>';
}
?>
<table class="w3-table-all">
  <thead>
    <tr>
      <th>Address Type</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$sql = "select a.id, a.addr_type ";
$sql .= "from address_type a ";
$sql .= "order by a.addr_type";
foreach ($handle->query($sql) as $row) {
    echo '<tr>';
    echo '  <td>' . $row['addr_type'] . '</td>';
    echo '  <td>';
    if (check_role("STAFF")) {
        echo '<a class="w3-button w3-green" href="../view/addtyp_edit.php?id=';
        echo $row['id'] . '">Update</a>';
        echo '<a class="w3-button w3-red" href="../view/addtyp_delete.php?id=';
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
