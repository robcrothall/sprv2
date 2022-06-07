<?php
/**
 * Program: ass_memberships_extract
 * 
 * Prepare mailmerge CSV for membership renewal
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
require "../assets/inc/head.php";
require "../assets/inc/body.php";
require "../inc/menu.php";
require "../assets/inc/msg.php";
require "../assets/inc/db_open.php";
$trans_file  = "associates_as_at_" . date("Ymd") . ".csv";
?>
<h2 align="center">Extract Associate Member details</h2>
<form action=<?php echo $_SERVER["PHP_SELF"]; ?> 
    method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
    Associate Member extract file: <?php echo"$trans_file" ?><br><br>
<?php
$line_count = 0;
$ignore = true;
echo '<a href="../data/' . $trans_file;
echo '" class="w3-button w3-green">Download</a>&nbsp;' . "\n";
echo "<br>";
if (file_exists("../data/$trans_file")) {
    unlink("../data/$trans_file");
}
$fp = fopen("../data/$trans_file", 'w');
$trans = "ID\tSurname\tFirst_Name\tOther_Names\tGiven_Name\t";
$trans .= "Title\tID_No\tAccount_No\tHome_Phone\tWork_phone\t";
$trans .= "Mobile_Phone\tHome_Email\tWork_Email\tEmail\tDriver_Lic\tSkills\r\n";
fwrite($fp, $trans);
$sql = "select * ";
$sql .= "from people ";
//$sql .= "where id in (260, 261, 522) "; // Gwynn = 261, Irene = 522
$sql .= 'where status in ("Associate", "Inactive") ';
$sql .= "order by surname, first_name ";
//$sql .= "limit 5";
foreach ($handle->query($sql) as $row) {
    $id = $row["id"];
    //$surname = str_replace("&amp;", "and", $row["surname"]);
    $surname = htmlspecialchars_decode($row["surname"]);
    $surname = str_replace("&#039;", "'", $surname);
    //$first_name = str_replace("&amp;", "and", $row["first_name"]);
    $first_name = htmlspecialchars_decode($row["first_name"]);
    $first_name = str_replace("&#039;", "'", $first_name);
    //$other_name = str_replace("&amp;", "and", $row["other_name"]);
    $other_name = htmlspecialchars_decode($row["other_name"]);
    $other_name = str_replace("&#039;", "'", $other_name);
    //$given_name = str_replace("&amp;", "and", $row["given_name"]);
    $given_name = htmlspecialchars_decode($row["given_name"]);
    $given_name = str_replace("&#039;", "'", $given_name);
    //$title = str_replace("&amp;", "and", $row["title"]);
    $title = htmlspecialchars_decode($row["title"]);
    $title = str_replace("&#039;", "'", $title);
    $id_no = $row["id_no"];
    $account_no = $row["account_no"];
    $home_phone = "";
    if (!empty($row["home_phone"])) {
        $home_phone = "(H)" . $row["home_phone"];
    }
    $work_phone = "";
    if (!empty($row["work_phone"])) {
        $work_phone = "(W)" . $row["work_phone"];
    }
    $mobile_phone = "";
    if (!empty($row["mobile_phone"])) {
        $mobile_phone = "(M)" . $row["mobile_phone"];
    }
    $home_email = $row["home_email"];
    $work_email = $row["work_email"];
    $email = $home_email; 
    if (empty($email)) {
        $email = $row["work_email"];
    }
    if (empty($email)) {
        echo "<br>$surname, $title $first_name $other_name ";
        if (!empty($given_name)) {
            echo " ($given_name) ";
        }
        echo "- No email address, skipped";
        continue;
    }
    $driver_lic = $row["driver_lic"];
    $skills = " ";
    $trans = "$id\t$surname\t$first_name\t$other_name\t$given_name\t";
    $trans .= "$title\t\"$id_no\"\t$account_no\t\"$home_phone\"\t\"$work_phone\"\t";
    $trans .= "\"$mobile_phone\"\t\"$home_email\"\t\"$work_email\"\t";
    $trans .= "\"$email\"\t\"$driver_lic\"\t";
    $trans .= "\"$skills\"\r\n";
    //var_dump($trans);
    //echo "<br>";
    fwrite($fp, $trans);
}
fclose($fp);
require "../assets/inc/msg.php";
echo "<p></p>";
require "../assets/inc/footer.php";
?>
</div>