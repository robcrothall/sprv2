<?php
/**
 * Program: assphone_edit
 * 
 * Display details about unattended phones in assets.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2>Phone account for current month</h2>
<h3 align="left">Options selected are:</h3>
<form action="../page/phone.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
$mnth        = $_SESSION["mnth"];
$accperiod   = substr("0" . $_SESSION["accperiod"], -2);
$readingdate = $_SESSION["readingdate"];
$_SESSION["year_n"]      = date("Y", $_SESSION["reading_date"]);
$_SESSION["mnth_n"]      = date("m", $_SESSION["reading_date"]);
$_SESSION["day_n"]       = date("d", $_SESSION["reading_date"]);
$txt         = "";
$message     = "";
$mnth_c      = $_SESSION["mnth_c"];
$yr          = $_SESSION["yr"];
$yr_c        = $_SESSION["yr_c"];
$phone_file  = "../data/phone_file" . $_SESSION["year_n"];
$phone_file .= $_SESSION["mnth_n"] . ".txt";
$trans_file  = $_SESSION["trans_file"];
move_uploaded_file($_FILES["phone_file"]["tmp_name"], $phone_file);
?>
        <tr>
            <td><label for=mnth>Month number (1 to 12):</label></td>
            <td><?php echo $mnth; ?></td>
        </tr>
        <tr>
            <td><label for="accperiod">Accounting period</label></td>
            <td><?php echo $accperiod; ?></td>
        </tr>
        <tr>
            <td><label for=readingdate>Reading date:</label></td>
            <td><?php echo $readingdate; ?></td>
        </tr>
        <tr>
            <td><label for="trans_file">CSV Phone transaction file: </label></td>
            <td><?php echo"$trans_file" ?></td>
        </tr>
    </table>
<br>
<hr>
<h3>Finance Telephone Interface - v2.0</h3>
<?php
$line_count = 0;
$tot_normal = 0.0;
$tot_manual = 0.0;
$tot_overhead = 0.0;
echo '<a href="../data/' . $trans_file . '" class="w3-button w3-green">Download</a>';
echo '&nbsp;' . "\n";
echo "<br>";
if (file_exists("../data/$trans_file")) { 
    unlink("../data/$trans_file"); 
}
$fp = fopen("../data/$trans_file", 'w');
$handle = fopen($phone_file, "r");
if ($handle) {
    while (!feof($handle) and $line_count < 10000) {
        $surname = "none";
        $first_name = "none";
        $account_no = "none";
        $old_account_no = "none";
        $status = "none";
        $home_phone = "none";
        $id = 0;
        $line_count += 1;
        $line = fgets($handle);
        $field = explode("\t", $line);
        if (is_numeric($field[0])) {
            if (strlen($field[0]) == 3) {
                $ext_count = 0;
                $ext = trim($field[0]);
                $name = trim($field[2]);
                $amount = ltrim($field[11], '"\n\r ');
                $amount = trim($amount, '"\n\r ');
                $amount = str_replace(',', '.', $amount);
                $amount = str_replace('"', '', $amount);
                $amount = str_replace("\r", "", $amount);
                $amount = str_replace("\n", "", $amount);
                //echo "<br>Field_11 =$field[11] Amount =$amount Ext =$ext\n";
                $sql = "select c.asset_name, b.id, b.surname, b.first_name, ";
                $sql .= "b.account_no, b.old_account_no, b.cottage ";
                $sql .= "from people_asset a, people b, asset c ";
                $sql .= "where c.asset_name = ? ";
                $sql .= "and a.asset_id = c.id and a.people_id = b.id ";
                $sql .= "and b.status = 'Resident'";
                $rows = query($sql, "046 604 0" . $ext);
                if (count($rows) == 1) {
                    $id = $rows[0]["id"];
                    $surname = $rows[0]["surname"];
                    $first_name = $rows[0]["first_name"];
                    $account_no = $rows[0]["account_no"];
                    $old_account_no = $rows[0]["old_account_no"];
                    $cottage = $rows[0]["cottage"];
                }
                if ($account_no == "none") {
                    $sql = "select id, surname, first_name, account_no, ";
                    $sql .= "old_account_no, home_phone, status from people ";
                    $sql .= "where (right(home_phone,3) = ? and company_id=1) ";
                    $sql .= "and status = 'RESIDENT' ";
                    $sql .= "order by acc_pref";
                    $rows = query($sql, $ext);
                    if (count($rows) > 0) {
                        foreach ($rows as $row) {
                            $ext_count = count($rows);
                            $id = $row["id"];
                            $surname = $row["surname"];
                            $first_name = $row["first_name"];
                            $account_no = $row["account_no"];
                            $old_account_no = $row["old_account_no"];
                            $home_phone = $row["home_phone"];
                            $status = $row["status"];
                        }
                    }
                }
                if ($account_no == "none") {
                    $sql  = "select id, surname, first_name, account_no ";
                    $sql .= "from people ";
                    $sql .= "where right(work_phone,3) = ? and company_id = 2 ";
                    $sql .= "and status = 'Staff'";
                    $rows = query($sql, $ext);
                    if (count($rows) > 0) {
                        $account_no = "overhead";
                        $surname = $rows[0]["surname"];
                        $first_name = $rows[0]["first_name"];            
                    }
                }
                if ($account_no == "none") {
                    $sql  = "select asset_name, account_no ";
                    $sql .= "from asset_phone, asset ";
                    $sql .= "where right(phone,3) = ? and asset_id = asset.id";
                    $rows = query($sql, $ext);
                    if (count($rows) > 0) {
                        if ($rows[0]["account_no"] == '') {
                            $account_no = "overhead";
                        } else {
                            $account_no = $rows[0]["account_no"];
                        }
                        $surname = $rows[0]["asset_name"];
                        $first_name = " (" . $rows[0]["account_no"] . ") ";
                    }
                }
                if ($account_no == "none") {
                    echo "<br>Ext=$ext Amount=$amount Name=$name \t - ";
                    echo "No account number found\n";
                    $txt .= "<br>Ext=$ext Amount=$amount Name=$name \t - ";
                    $txt .= "No account number found\n";
                    $tot_manual += (float)$amount;
                } elseif ($account_no == "overhead") {
                    echo "<br>Ext=$ext Amount=$amount ";
                    echo "Name=$first_name $surname - Overhead cost\n";
                    $txt .= "<br>Ext=$ext Amount=$amount ";
                    $txt .= "Name=$first_name $surname - Overhead cost\n";
                    $tot_overhead += (float)$amount;
                } else {
                    $readingdate_c = $_SESSION["day_n"] . "/" . $_SESSION["mnth_n"];
                    $readingdate_c .= "/" . $_SESSION["year_n"];
                    $trans = "$accperiod,\"$readingdate_c\",\"D\",\"$account_no\",";
                    $trans .= "\"Phone\",\"Phone calls X$ext\",$amount,\"02\",0,";
                    $trans .= "\" \",\"    \",\"9540010\",1,1,0,0,0,$amount\r\n";    
                    $tot_normal += (float)$amount;
                    //echo "<br>$trans";
                    fwrite($fp, $trans);
                }
            }
        }
    }
    
} else {
    echo "Cannot open phone file\n";
}
fclose($handle);
fclose($fp);
echo "<br>Total cost incurred__ = R";
echo number_format($tot_normal + $tot_manual + $tot_overhead, 2, '.', ' ');
echo " This should be close to the Telkom invoice value\n";
echo "<br>To be billed normally = R" . number_format($tot_normal, 2, '.', ' ');
echo "\n";
echo "<br>To be billed manually = R" . number_format($tot_manual, 2, '.', ' ');
echo "\n";
echo "<br>Total billed________ = R";
echo number_format($tot_normal + $tot_manual, 2, '.', ' ') . "\n<br>";
echo "<br>Total overhead_____ = R" . number_format($tot_overhead, 2, '.', ' ');
echo "\n";
$to    = "gm@settlerspark.co.za";
$mail_subject = "Phone Overheads - " . $_SESSION["year_n"] . "-";
$mail_subject .= $_SESSION["mnth_n"];
$top     = "<html><head><title>Phone Overheads - " . $_SESSION["year_n"] . "-";
$top    .= $_SESSION["mnth_n"] . "</title></head><body>";
$top    .= "<h2>Phone overheads for the month</h2>\r\n";
$foot    = "<br><br><br>Regards...\r\n ";
$foot   .= "<br>Finance Department\r\n";
$foot   .= "</body></html>";
$txt     = $top . $txt . $foot;
$header  = "From:" . "info@settlerspark.co.za" . " \r\n";
$header .= "CC:" . "rob@crothall.co.za" . " \r\n";
$header .= "BCC:" . "rob@robcrothall.co.za" . " \r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html\r\n";
$retval = mail($to, $mail_subject, $txt, $header);

if ($retval == true ) {
    $message .= " Email message sent successfully..."; // . $txt . $header;
} else {
      $message .= " Email message could not be sent..."; // . $txt . $header;
}

?>
</table>
</div>
