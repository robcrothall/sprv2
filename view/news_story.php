
<?php
    require("../conf/config.php"); 
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
    require("../assets/inc/head.php");
    require("../assets/inc/body.php");
	require("../view/menu.php");
	require("../assets/inc/msg.php");
	echo '<h1>News item</h1>';
	if((!isset($_GET['id'])) || (trim($_GET['id'] == ''))) {
		$message = 'Missing record ID - please inform SysAdmin.';
	}
	$req_id = test_input($_GET['id']);
	require("../assets/inc/db_open.php");
	$sql = "select a.title, a.content, a.effective_date, b.surname, b.first_name, ";
	$sql .= "b.given_name from news a, people b where a.contact_id = b.id and a.id = " . $req_id;
	$result = mysqli_query($handle,$sql) or die("Error in query: $sql. " . mysqli_error($handle));
	$row = $result->fetch_array();
	echo '<h2>' . $row["title"] . '</h2>';
	echo '<font size="-1">' . formatDate($row["effective_date"]) . '</font><p>';
	echo '<p>' . $row["content"] . '</p>';
	echo '<p>This press release was published on ';
	echo formatDate($row["effective_date"]);
	echo '. For more information, please contact your R&S Representative or ';
	if(trim($row["given_name"] == '')) {echo $row["first_name"];}
	else {echo $row["given_name"];}
	echo " " .  $row["surname"] . "."; 
	mysqli_free_result($result);
	$sql = "insert into news_users (news_id, users_id) values (" . $req_id .", " . $_SESSION["id"] . ")";
	$result = mysqli_query($handle, $sql); 
	// or die("Error in query: $sql. " . mysqli_error($handle));
	echo '<br><br><a class="w3-button w3-green" href="../view/news_list.php">Back to News List</a>';
	echo "&nbsp;";
	echo "This item will be removed from your news list.";
	require("../assets/inc/msg.php");
	require("../assets/inc/footer.php");
?>
