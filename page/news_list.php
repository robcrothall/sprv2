<?php
/**
 * Program: int_list
 * 
 * Display details about an intervention.
 * PHP version 5
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
require "../inc/db_open.php";
echo '<h1>List of news items</h1>';
if (check_role("PR")) {
    echo '<a href="news_add.php" class="w3-button w3-green">Add News</a>';
}
$unread = 0;
echo '<ol>';
$sql = "select id, title, effective_date from news ";
if (!check_role("PR")) {
    $sql .= " where id not in (select news_id from news_users ";
    $sql .= "where users_id = " . $_SESSION["id"] . ")";
}
$sql .= " order by effective_date desc";
if (!check_role("PR")) {
    $sql .= " limit 0, 20";
}
foreach ($handle->query($sql) as $row) {
    echo '<li><b><a href="news_story.php?id=' . $row["id"] . '">';
    echo $row["title"] . '</a></b>';
    echo ' <font size="-2">[' . formatDate($row["effective_date"]) . ']</font>';
    if (check_role("PR")) {
        echo '<br><a href="news_edit.php?id=' . $row["id"];
        echo '">Edit</a> | <a href="news_delete.php?id=';
        echo $row["id"] . '">Delete</a><p>';
    }
    $unread += 1;
}
echo '</ol>';
if ($unread == 0) {
    echo "You have no unread messages.  Well done!<br><br>";
    var_dump("User first name:", $_SESSION["user_first_name"]);
    var_dump("User surname;", $_SESSION["user_surname"]);
}
require "../inc/msg.php";
require "../inc/footer.php";
// Now check for tasks outstanding for more than three weeks and send to HoD
?>
