<?php
/**
 * Program elec_ctl_form
 * 
 * Calculate Electricity costs and create journal entries
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
$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">Electricity account for current month</h2>
<h3 align="left">Options selected are:</h3>
<form action="../ctl/elec.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
   $mnth        = $_SESSION["mnth"];
   $accperiod   = substr("0" . $_SESSION["accperiod"], -2);
   $readingdate = $_SESSION["readingdate"];
   $mnth_c      = $_SESSION["mnth_c"];
   $yr          = $_SESSION["yr"];
   $yr_c        = $_SESSION["yr_c"];
   $elec_file  = "../data/elec_file" . $_SESSION["year_n"];
   $elec_file .= $_SESSION["mnth_n"] . ".txt";
   $trans_file  = $_SESSION["trans_file"];
   move_uploaded_file($_FILES["elec_file"]["tmp_name"], $elec_file);
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
            <td><label for="trans_file">Electricity transaction file: </label></td>
            <td><?php echo"$trans_file" ?></td>
        </tr>
    </table>
<br>
<hr>
<h3>Finance Electricity Interface - v2.0</h3>
    <?php
    $line_count = 0;
    $rebate = 0;
    $tariff = 0;
    $totused = 0;
    $tot_overhead = 0;
    $tot_manual = 0;
    $tot_normal = 0;
    $ignore = true;
    echo '<a href="../data/' . $trans_file;
    echo '" class="w3-button w3-green">Download</a>&nbsp;' . "\n";
    echo "<br>";
    if (file_exists("../data/$trans_file")) {
        unlink("../data/$trans_file");
    }
    $fp = fopen("../data/$trans_file", 'w');
    $handle = fopen($elec_file, "r");
    if ($handle) {
        while (!feof($handle) and $line_count < 10000) {
            $surname = "none";
            $first_name = "none";
            $account_no = "none";
            $old_account_no = "none";
            $status = "none";
            $rebate = 0;
            $id = 0;
            $line_count += 1;
            $line = fgets($handle);
            $field = explode("\t", $line);
            if ($ignore == false) {
                $row_count = 0;
                if (empty($field[2])) {
                    continue;
                }
                if ($tariff < 2.0) {
                    echo "<br><span style='color:red'>Meter = '$meter' ";
                    echo "Tariff (" . $tariff . ") is less than R2.00";
                    continue;
                }
                $meter = trim($field[2]);
                if (strlen($field[3]) > 0) {
                    $sqm = trim($field[3]);
                } else {
                    $sqm = 0;
                }
                $opening = trim(str_replace(" ", "", $field[4]));
                if (!is_numeric($opening)) {
                    echo "<br><span style='color:red'>Meter = '$meter' ";
                    echo "Opening reading is invalid";
                    continue;
                }
                $closing = trim(str_replace(" ", "", $field[5]));
                if (!is_numeric($closing)) {
                    echo "<br><span style='color:red'>Meter = '$meter' ";
                    echo "Closing reading is invalid";
                    continue;
                }
                $amount = trim(str_replace('R', ' ', $field[7]));
                $amount = str_replace(",", ".", $amount);
                $amount = str_replace(" ", "", $amount);
                if (!is_numeric($amount)) {
                    echo "<br><span style='color:red'>Meter = '$meter' ";
                    echo "Amount is invalid";
                    continue;
                }
                //$used    = $closing - $opening;
                $used    = trim(str_replace(" ", "", $field[6]));
                if (!is_numeric($used)) {
                    echo "<br><span style='color:red'>Meter = '$meter' ";
                    echo "Used value is invalid";
                    continue;
                }
                if (($closing - $opening) < 0) {
                    echo "<br><span style='color:red'>Meter = '$meter' Usage = ";
                    echo $used . " - Meter was replaced?</span>\n";
                } else {
                    $totused += $used;
                }
                $nett    = $used;
                //$charge  = 0;
                //if ($used > $sqm) {
                    //$nett = $used; // - $sqm;
                $charge = $nett * $tariff;
                    //$rebate += $sqm * $tariff;                
                //}
                if ((abs($amount - $charge) > 0.1) and ($amount > 0)) {
                    echo "<br><span style='color:blue'>Meter = '$meter' Usage = ";
                    echo $used . " - Calculated value (" . $charge;
                    echo ") differs from spreadsheet (" . $amount . ")</span>\n";
                }
                $sql = "select c.asset_name, b.id, b.surname, b.first_name, ";
                $sql .= "b.account_no, b.old_account_no, b.cottage ";
                $sql .= "from people_asset a, people b, asset c ";
                $sql .= "where c.asset_name = ? and a.asset_id = c.id and ";
                $sql .= "a.people_id = b.id and b.status = 'Resident'";
                $rows = query($sql, $meter);
                if (count($rows) == 1) {
                    $id = $rows[0]["id"];
                    $surname = $rows[0]["surname"];
                    $first_name = $rows[0]["first_name"];
                    $account_no = $rows[0]["account_no"];
                    $old_account_no = $rows[0]["old_account_no"];
                    $cottage = $rows[0]["cottage"];
                }
                if ($account_no == "none") {
                    $sql  = "select id, surname, first_name, account_no, ";
                    $sql .= "old_account_no, cottage from people ";
                    $sql .= "where cottage = ? and status = 'RESIDENT' ";
                    $sql .= "order by acc_pref";
                    $rows = query($sql, $meter);
                    if (count($rows) > 0) {
                        foreach ($rows as $row) {
                            $meter_count = count($rows);
                            $id = $row["id"];
                            $surname = $row["surname"];
                            $first_name = $row["first_name"];
                            $account_no = $row["account_no"];
                            $old_account_no = $row["old_account_no"];
                            $cottage = $rows[0]["cottage"];
                        }
                    }
                }
                if ($account_no == "none") {
                    $sql  = "select asset_type from asset ";
                    $sql .= "where asset_name = ? and asset_type = 3";
                    $rows = query($sql, $meter);
                    if (count($rows) == 1) {
                        $account_no = "overhead"; 
                        $tot_overhead += $amount;
                    }
                }
                $readingdate_l = $_SESSION["year_n"] . "-" . $_SESSION["mnth_n"];
                $readingdate_l .= "-" . $_SESSION["day_n"];
                $esql = "REPLACE INTO `electricity` SET cottage=\"$cottage\", ";
                $esql .= "meter=\"$meter\", open_reading=$opening, ";
                $esql .= "close_reading=$closing, ";
                $esql .= "reading_date=\"$readingdate_l\", cost=$amount, user_id=";
                $esql .= $_SESSION["id"];
                $result = query($esql);
                if ($account_no == "none" and $amount > 0) {
                    echo "<br><span style='color:red'>Meter = '$meter' Amount = R";
                    echo number_format($amount, 2, '.', ' ');
                    echo " - No account number found</span>\n";
                    $tot_manual += $amount;
                } elseif ($account_no == "overhead") {
                    echo "<br><span style='color:green'>Meter = '$meter' Amount = R";
                    echo number_format($amount, 2, '.', ' ');
                    echo " - Settlers Park overhead</span>\n";
                } elseif ($amount > 0) {
                    $amount_c = number_format($amount, 2, '.', '');
                    $tot_normal += $amount;
                    $readingdate_c = $_SESSION["day_n"] . "/" . $_SESSION["mnth_n"];
                    $readingdate_c .= "/" . $_SESSION["year_n"];
                    $trans = "$accperiod,\"$readingdate_c\",\"D\",\"$account_no\",";
                    $trans .= "\"ELEC\",\"Previous meter reading $opening\",0,\"00";
                    $trans .= "\",0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";    
                    fwrite($fp, $trans);
                    $trans = "$accperiod,\"$readingdate_c\",\"D\",\"$account_no\",";
                    $trans .= "\"ELEC\",\"Current meter reading  $closing\",0,\"00";
                    $trans .= "\",0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";    
                    fwrite($fp, $trans);
                    //$trans = "$accperiod,\"$readingdate_c\",\"D\",\"$account_no";
                    //$trans .= "\",\"ELEC\",\"Less allowance $sqm units\",0,\"00\",";
                    //$trans .= "0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";    
                    //fwrite($fp, $trans);
                    $trans = "$accperiod,\"$readingdate_c\",\"D\",\"$account_no";
                    $trans .= "\",\"ELEC\",\"Chargeable usage $nett @ $tariff\",";
                    $trans .= "$amount,\"02\",0,\" \",\"    \",\"9500010\",1,1,0,";
                    $trans .= "0,0,$amount_c\r\n";
                    fwrite($fp, $trans);
                    $sql  = "select avg(close_reading - open_reading) as my_avg ";
                    $sql .= "from electricity where meter = ? and reading_date ";
                    $sql .= "BETWEEN DATE_SUB(NOW(), INTERVAL 95 DAY) AND NOW()";
                    $rows = query($sql, $meter);
                    if (($used > $rows[0]["my_avg"] * 1.5) and ($amount > 100)) {
                        echo "<span style='color:blue'><br>Meter = '";
                        echo $meter . "' Amount = R";
                        echo number_format($amount, 2, '.', ' ');
                        echo " - Usage (" . $used;
                        echo ") is unusually high! Average = " . $rows[0]["my_avg"];
                        echo "</span>\n";
                    }
                }
            } elseif (!empty($field[2])) { 
                if ($field[2] == "Date read:") {
                    $tariff_c = trim(str_replace("R", "", $field[7]));
                    $tariff_c = str_replace(",", ".", $tariff_c);
                    $tariff = (float)$tariff_c;
                    if (!is_numeric($tariff_c)) {
                        echo "<br><span style='color:red'>Tariff = '$tariff_c' ";
                        echo " is invalid";
                        continue;
                    }
                    $ignore = false;
                }
            }
        }
    } else {
        echo "Cannot open electricity file\n";
    } 
    fclose($handle);
    fclose($fp);
    echo "<br><br>Total units used = $totused\n";
    echo "<br>Total cost incurred__ = R";
    echo number_format($totused * $tariff, 2, '.', ' ');
    echo " This should be close to the municipal invoice value\n<br>";
    echo "<br>To be billed normally = R" . number_format($tot_normal, 2, '.', ' ');
    echo "\n";
    echo "<br>To be billed manually = R" . number_format($tot_manual, 2, '.', ' ');
    echo "\n";
    echo "<br>Total billed________ = R";
    echo number_format($tot_normal + $tot_manual, 2, '.', ' ') . "\n<br>";
    echo "<br>Total overhead_____ = R" . number_format($tot_overhead, 2, '.', ' ');
    echo "\n";
    echo "<br>Total rebate granted_ = R" . number_format($rebate, 2, '.', ' ');
    echo "\n<br>";
    echo "<br>Recovery variance___ = R";
    echo number_format(
        $tot_normal + $tot_manual + $tot_overhead + $rebate - $totused * 
        $tariff, 2, '.', ' '
    ) . "\n";
    ?>
</table>
</div>
