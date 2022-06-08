<?php
/**
 * Program: int_add
 * 
 * Display details about interventions.
 * php version 5
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../inc/db_open.php";
    ?>
<h1>Add an intervention</h1>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<table cellspacing="5" cellpadding="5">
<tr>
  <td valign="top">Dept</td>
  <td>
    <select name="dept_id">
      <option value="0" selected>Please choose 1</option> 
    <?php
    $sql = "SELECT id, dept_name FROM `dept` ";
    $sql .= "order by dept_name";
    foreach ($handle->query($sql) as $row) {
        $dept_name = $row["dept_name"];
        echo '<option value="' . $row["id"] . '">' . $row["dept_name"];
        echo "</option>\n";
    }
    ?>
    </select>
  </td>
</tr>
<tr>
  <td valign="top">Category</td>
  <td>
    <select name="category_id">
      <option value="0" selected>Please choose 2</option> 
    <?php
    $sql = "SELECT id, description FROM `int_category` ";
    $sql .= "order by description";
    foreach ($handle->query($sql) as $row) {
        echo '<option value="' . $row["id"] . '">' . $row["description"];
        echo "</option>\n";
    }
    ?>
    </select>
  </td>
</tr>
</table>
</form>
    <?php
} else {
    include "../inc/msg.php";
    echo '<h1>Add a news item</h1>';
    $errorList = array();
    $title = test_input($_POST["title"]);
    $content = test_input($_POST["content"]);
    $person_id = test_input($_POST["person_id"]);
    if (trim($title) == '') {
        $errorList[] = "Please enter a title.";
    }
    if (trim($content) == '') {
        $errorList[] = "Please enter the message content.";
    }
    if (trim($person_id) == '') {
        $errorList[] = "Please select a contact person.";
    }
    if (sizeof($errorList) == 0) {
        include "../inc/db_open.php";
        $sql = "insert into news (title, content, contact_id) values ('";
        $sql .= $title . "','" . $content . "'," . $person_id . ")";
        $result = mysqli_query($handle, $sql) 
            or die("Error in query: $sql. " . mysqli_error($handle));
        echo "Update successful.<br><br>";
        // mysqli_free_result($result);
    } else {
        echo 'The following errors were encountered:<br>';
        echo '<ul>';
        for ($x=0; $x<sizeof($errorList); $x++) {
            echo "<li>$errorList[$x]";
        }
        echo '</ul>';    
    }
    echo '<a class="w3-button w3-green" href="../page/news_list.php">Back to News List</a>';
    include "../inc/msg.php";
    include "../inc/footer.php";
}
?>
