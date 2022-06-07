<?php
/**
 * Short description for file
 *
 * Long description for file (if any)...
 *
 * PHP version 5
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     Original Author <author@example.com>
 * @author     Another Author <another@example.com>
 * @copyright  1997-2005 The PHP Group
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://pear.php.net/package/PackageName
 * @see        NetOther, Net_Sample::Net_Sample()
 * @since      File available since Release 1.2.0
 * @deprecated File deprecated in Release 2.0.0
 */

$_SESSION["module"] = $_SERVER["PHP_SELF"];
$company_id = htmlspecialchars(strip_tags($form_id));
$data = query("select * from company where id = ?", $company_id); 
$_SESSION["company_id"] = $company_id;
$co_name = $data[0]["co_name"]; 
$_SESSION["co_name"] = $co_name;
$co_address = $data[0]["co_address"]; 
$notes = $data[0]["notes"];
$user_id = $data[0]["user_id"];
$changed = $data[0]["changed"];
$data = query("select username from users where id = ?", $user_id);
$username = $data[0]["username"];
?>
<h2>This company is about to be deleted!</h2>
<input type='submit' value='Delete' class='w3-button w3-red' />
   <a class="w3-button w3-green" href="../page/company.php">Cancel</a>
  <div class="container">
  <form action="../page/company_delete.php" method="post">
<table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
<tr>
<td align="right" width="30%">Name:</td>
<td width="2%"></td>
<td align="left" width="70%"><?php echo $co_name; ?></td>
</tr>
<tr>
<td align="right" width="30%">Address:</td>
<td width="2%"></td>
<td align="left" width="70%"><?php echo $co_address; ?></td>
</tr>
<tr>
<td align="right" width="25%">Changed by:</td>
<td width="2%"></td>
<td align="left" width="70%"><?php echo $username; ?></td>
</tr>
<tr>
<td align="right" width="25%">Changed on:</td>
<td width="2%"></td>
<td align="left" width="70%"><?php echo $changed; ?></td>
</tr>
<tr>
<td align="right" width="25%">Notes:</td>
<td width="2%"></td>
<td align="left" width="70%"><?php echo $notes; ?></td>
</tr>
</table> 
<h3>This company is used by the following people - 
they need to be updated or deleted first!</h3>
<table class="w3-table-all">         
<thead>
<tr>
<th>Name</th>
</tr>
</thead>
<tbody>
<?php 
$rows = query(
    "SELECT * from people where company_id = ? order by surname", $company_id
);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['first_name'] . ' ' . $row['surname'] . '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr><td>No dependent people</td></tr>';
}
?>
</tbody>
</table>

<div class="form-actions">
<input type='submit' value='Delete' class='w3-button w3-red' />
      <a class="w3-button w3-green" href="../page/company.php">Cancel</a>
   </div>
  </div>
</form>
