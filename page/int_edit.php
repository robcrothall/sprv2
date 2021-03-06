
<?php
   require("../inc/config.php"); 
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
   require("../inc/head.php");
   require("../inc/body.php");
	require("../inc/menu.php");
	require("../inc/msg.php");
	if ($_SERVER["REQUEST_METHOD"] <> "POST")
	{
		require("../inc/db_open.php");
		$id = test_input($_GET["id"]);
		if(trim($id) == '') {die("No ID specified - please inform SysAdmin.");}
		$sql = "select title, content, contact_id from news where id = " . $id;
		$result = mysqli_query($handle, $sql) or die("Error in query: $sql. " . mysqli_error());
		$row = $result->fetch_array();
		if(count($row) == 0) {die( "No result returned from database - please advise SysAdmin.");}
		$title = $row["title"];
		$content = $row["content"];
		$people_id = $row["contact_id"];
?>
<h1>Edit a news item</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<tr>
	<td valign="top"><b>Title</b></td>
	<td><input size="50" maxlength="50" type="text" name="title" value="<?php echo $title; ?>"></td>
</tr>
<tr>
	<td valign="top"><b>Content</b></td>
	<td><textarea name="content" cols="50" rows="10"><?php echo $content; ?></textarea></td>
</tr>
<tr>
	<td valign="top"><b>Contact person</b></td>
	<td>
  		<select name="people_id">
		<?php
			echo '<option value="0" selected>Please choose</option>' . "\n"; 
//			$rows = query("SELECT id, surname, first_name, given_name FROM `people` where status in ('Resident', 'Staff') order by surname, first_name");
			$sql = "SELECT id, surname, first_name, given_name FROM `people` where status in ('Resident', 'Staff') order by surname, first_name";
			foreach ($handle->query($sql) as $row) {
				if($row["id"] == $people_id) {$selected = " selected";}
				else {$selected = "";}
				$name = $row["surname"];
				if(!empty($row["first_name"])) {
  					$name .= ", " . $row["first_name"];
  				}
  				if(!empty($row["given_name"])) {
  					$name .= " (" . $row["given_name"] . ")";
    			}
   			echo '<option value="' . $row["id"] . '"' . $selected . ">" . $name . "</option>\n";
  			}
		?>
  		</select>
	</td>
</tr>
<tr>
	<td colspan=2><input type="submit" name="submit" value="Update" class='w3-button w3-green'/>&nbsp;
   <a class="w3-button w3-green" href="../page/news_list.php">Return to News List</a>&nbsp;
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
	$id = test_input($_POST["id"]);
	$title = test_input($_POST["title"]);
	$content = test_input($_POST["content"]);
	$contact_id = test_input($_POST["people_id"]);
	if(trim($title) == '') {$errorList[] = "Please enter a title.";}
	if(trim($content) == '') {$errorList[] = "Please enter the message content.";}
	if(trim($contact_id) == '') {$errorList[] = "Please select a contact person.";}
	if(sizeof($errorList) == 0) {
		require("../inc/db_open.php");
		$sql = "update news set title='$title', content='$content', contact_id=$contact_id where id = $id";
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
	echo '<a href="../page/news_list.php" class="w3-button w3-green">Back to News List</a>';
	require("../inc/msg.php");
	require("../inc/footer.php");
}
?>
