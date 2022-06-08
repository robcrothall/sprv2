<?php
/**
 * Program: int_add_initial
 * 
 * Display details about an intervention.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 * @PHP      7.1
 */
require "../inc/config.php"; 
$_SESSION["module"] = $_SERVER["PHP_SELF"];
require "../inc/head.php";
require "../inc/body.php";
require "../inc/menu.php";
require "../inc/msg.php";
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
}
?>
<h1>Add an intervention</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<table cellspacing="5" cellpadding="5">
<tr>
  <td valign="top">Department</td>
  <td>
    <select name="dept_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$sql = "SELECT id, dept_name FROM `dept` ";
$sql .= "order by dept_name";
foreach ($handle->query($sql) as $row) {
    $dept_name = $row["dept_name"];
    echo '<option value="' . $row["id"] . '">' . $dept_name . "</option>\n";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td valign="top">Category</td>
  <select name="category_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$sql = "SELECT id, description FROM `int_category` ";
$sql .= "order by description";
foreach ($handle->query($sql) as $row) {
    $description = $row["description"];
    echo '<option value="' . $row["id"] . '">' . $description . "</option>\n";
}
?>
    </select>
</tr>
<tr>
  <td valign="top">Intervention Type</td>
  <select name="int_type_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$sql = "SELECT id, description FROM `int_type` ";
$sql .= "order by description";
foreach ($handle->query($sql) as $row) {
    $description = $row["description"];
    echo '<option value="' . $row["id"] . '">' . $row["description"] . "</option>\n";
}
?>
    </select>
</tr>
<tr>
  <td valign="top">Leader</td>
  <td>
    <select name="leader_id">
<?php
echo '<option value="0" selected>Please choose</option>' . "\n"; 
$sql = "SELECT id, surname, first_name, given_name FROM `people` ";
$sql .= "where status in ('Resident', 'Staff') order by surname, first_name";
foreach ($handle->query($sql) as $row) {
    $name = $row["surname"];
    if (!empty($row["first_name"])) {
        $name .= ", " . $row["first_name"];
    }
    if (!empty($row["given_name"])) {
        $name .= " (" . $row["given_name"] . ")";
    }
    echo '<option value="' . $row["id"] . '">' . $name . "</option>\n";
}
?>
    </select>
  </td>
</tr>
<tr>
  <td colspan=2><input type="submit" name="submit" value="Add" class="w3-button w3-green"/>&nbsp;
   <a class="w3-button w3-green" href="../page/news_list.php">Attendees</a>&nbsp;
  </td>
</tr>
</form>
</table>
<?php
} else {
//   require("../inc/config.php"); 
//	$_SESSION["module"] = $_SERVER["PHP_SELF"];
//   require("../inc/head.php");
//   require("../inc/body.php");
//	require("../inc/menu.php");
	require("../inc/msg.php");
	echo '<h1>Add a news item</h1>';
	$errorList = array();
	$title = test_input($_POST["title"]);
	$content = test_input($_POST["content"]);
	$person_id = test_input($_POST["person_id"]);
	if(trim($title) == '') {$errorList[] = "Please enter a title.";}
	if(trim($content) == '') {$errorList[] = "Please enter the message content.";}
	if(trim($person_id) == '') {$errorList[] = "Please select a contact person.";}
	if(sizeof($errorList) == 0) {
		require("../inc/db_open.php");
		$sql = "insert into news (title, content, contact_id) values ('";
		$sql .= $title . "','" . $content . "'," . $person_id . ")";
		$result = mysqli_query($handle, $sql) or die("Error in query: $sql. " . mysqli_error($handle));
		echo "Update successful.<br><br>";
//		mysqli_free_result($result);
	} else {
		echo 'The following errors were encountered:<br>';
		echo '<ul>';
		for($x=0; $x<sizeof($errorList); $x++) {
			echo "<li>$errorList[$x]";
		}
		echo '</ul>';	
	}
	echo '<a class="w3-button w3-green" href="../page/news_list.php">Back to News List</a>';
	require("../inc/msg.php");
	require("../inc/footer.php");
}
?>
