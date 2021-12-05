
<?php
/**
 * Sample File 3, phpDocumentor Quickstart
 * 
 * This file demonstrates the use of the @name tag
 * 
 * PHP version 7.1
 * 
 * @category Template
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
if ($_SERVER["REQUEST_METHOD"] <> "POST") {
    include "../assets/inc/db_open.php";
    ?>
<h1>Add a news item</h1>
<table cellspacing="5" cellpadding="5">
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
<tr>
    <td valign="top"><b>Title</b></td>
    <td><input size="50" maxlength="50" type="text" name="title"></td>
</tr>
<tr>
    <td valign="top"><b>Content</b></td>
    <td><textarea name="content" cols="50" rows="10"></textarea></td>
</tr>
<tr>
    <td valign="top"><b>Contact person</b></td>
    <td>
          <select name="person_id">
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
    <td colspan=2>
        <input type="submit" name="submit" value="Add" 
            class="w3-button w3-green"/>&nbsp;
        <a class="w3-button w3-green" href="../view/news_list.php">
            Return to News List</a>&nbsp;
    </td>

</tr>
</form>
</table>
    <?php
} else {
    //   require("../conf/config.php"); 
    //    $_SESSION["module"] = $_SERVER["PHP_SELF"];
    //   require("../assets/inc/head.php");
    //   require("../assets/inc/body.php");
    //    require("../view/menu.php");
    include "../assets/inc/msg.php";
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
        include "../assets/inc/db_open.php";
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
    echo '<a class="w3-button w3-green" href="../view/news_list.php">';
    echo 'Back to News List</a>';
    include "../assets/inc/msg.php";
    include "../assets/inc/footer.php";
}
?>
