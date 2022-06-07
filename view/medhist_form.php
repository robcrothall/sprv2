<?php
/**
 * Program: medhist_form
 * 
 * List medical history.
 * php version 7.2.10
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id> 
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
?>
<h2 align="center">List of medical events</h2>
  <div class="container">
    <p>
      <a class="w3-button w3-green" 
      href="../page/people_read.php?id=<?php 
        echo $_SESSION["selected_people_id"] ?>">Back</a> &nbsp;
      <a href="../page/medhist_create.php" 
      class="w3-button w3-green">Create a new event</a>
    </p>
    <div class="row">
      <table class="w3-table-all">
        <tbody>
          <tr>
            <td width="20%">Medical events associated with:</td>
            <td width="80%">
<?php
$sql = "SELECT surname, first_name, other_name, given_name ";
$sql .= "FROM `people` where id = ?";
$rows = query($sql, $_SESSION["selected_people_id"]);
$row = $rows[0];
echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_name"];
if (!empty($row["given_name"])) {
    echo " (" . $row["given_name"] . ")";
}
?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row">
      <table class="w3-table-all">
        <thead>
          <tr>
            <th>Date</th>
            <th>Procedure</th>
            <th>Value</th>
            <th>Comment</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
<?php
$sql = "SELECT a.id, a.proc_date, b.description, a.value, a.comment "; 
$sql .= "from med_history a, med_procedures b ";
$sql .= "where a.people_id = ? and a.med_proc_id = b.id order by a.proc_date desc";
$rows = query($sql, $_SESSION["selected_people_id"]);
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['proc_date'] . '</td>';
        echo '<td>' . $row['description'] . '</td>';
        echo '<td>' . $row['value'] . '</td>';
        echo '<td>' . $row['comment'] . '</td>';
        echo '<td valign="top" style="width:280px">';
        echo '<a class="w3-button w3-green" href="../page/medhist_read.php?id=';
        echo $row['id'] . '">Read</a> &nbsp;'; 
        if (check_role("ADMIN")) {
            echo '<a class="w3-button w3-green" href="../page/medhist_update.php?id=';
            echo $row['id'] . '">Update</a> &nbsp;'; 
            echo '<a class="w3-button w3-red" href="../page/medhist_delete.php?id=';
            echo $row['id'] . '">Delete</a>';
        }
        echo '</td>';
        echo '</tr>';
    }
}
?>
                </tbody>
            </table>
        </div>
    </div>
    <p>
      <a class="w3-button w3-green" href="../page/medhist.php">Back</a> &nbsp;
      <a href="../page/medhist_create.php" 
      class="w3-button w3-green">Create a new event</a>
    </p>
