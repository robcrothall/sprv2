<?php
    $_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2>Hibiscus Room billing for current month</h2>
<h3>Options selected are:</h3>
<form action="../page/hroom.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
   $mnth        = $_SESSION["mnth"];
   $accperiod   = "0" . $_SESSION["accperiod"];
   $readingdate = $_SESSION["readingdate"];
   $mnth_c      = $_SESSION["mnth_c"];
   $yr          = $_SESSION["yr"];
   $yr_c        = $_SESSION["yr_c"];
   $hroom_file  = "../data/hroom_file.txt";
   $trans_file  = $_SESSION["trans_file"];
   move_uploaded_file($_FILES["hroom_file"]["tmp_name"], $hroom_file);
   $contra_normal = "3510010";
   $contra_care   = "4500050";
   $contra = $contra_normal;
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
            <td><label for=readingdate>Transaction date:</label></td>
            <td><?php echo $readingdate; ?></td>
        </tr>
        <tr>
            <td><label for="trans_file">Hibiscus Room transaction file: </label></td>
            <td><?php echo"$trans_file" ?></td>
        </tr>
    </table>
<br>
<hr>
<h3>Finance Hibiscus Room Interface - v2.0</h3>
    <?php
    $line_count = 0;
    $rebate = 0;
    $tariff = 0;
    $totused = 0;
    $ignore = false;
    echo '<a href="../data/' . $trans_file . '" class="w3-button w3-green">Download</a>&nbsp;' . "\n";
    echo "<br>";
    if (file_exists("../data/$trans_file")) {
        unlink("../data/$trans_file");
    }
    $fp = fopen("../data/$trans_file", 'w');
    $handle = fopen($hroom_file, "r");
    $row_count = 0;
    $error_count = 0;
    if ($handle) {
        while (!feof($handle) and $line_count < 5000) {
             $customer = "none";
             $surname = "none";
             $first_name = "none";
             $account_no = "none";
             $old_account_no = "none";
             $status = "none";
             $cottage_id = 0;
             $contra = $contra_normal;
             $id = 0;
             $line_count += 1;
             $line = fgets($handle);
             $field = explode("\t", $line);
            if ($field[0] === "RESIDENT") {
                continue;
            }
            if (count($field) === 0) {
                continue;
            }
            $row_count += 1;
            $cottage_id = 0;
            $customer = trim($field[0]);
            if (empty($customer)) {
                continue;
            }
            if ($customer === "Residents") {
                continue;
            };
                $acc = trim($field[1]);
                $amount = trim(str_replace('R', '', $field[2]));
                $amount = str_replace(",", ".", $amount);
                $amount = str_replace(" ", "", $amount);
            //  echo "<br>Customer = $customer, Account = $acc, Amount = $amount";
            //  var_dump($amount);
                $sql = "select b.id, b.surname, b.first_name, b.account_no, b.old_account_no, cottage_id from people b ";
                $sql .= "where b.account_no=?"; // or b.old_account_no=?";
            //  $rows = query($sql, $acc, $acc);
                $rows = query($sql, $acc);
            //    var_dump($rows);
            if (count($rows) == 1) {
                $id = $rows[0]["id"];
                $surname = $rows[0]["surname"];
                $first_name = $rows[0]["first_name"];
                $account_no = $rows[0]["account_no"];
                $old_account_no = $rows[0]["old_account_no"];
                $cottage_id = $rows[0]["cottage_id"];
            }
            $amount_c = number_format($amount, 2, '.', '');
            if($cottage_id > 0) {
            	$sql = "select asset_type from asset where id=?";
            	$rows = query($sql, $cottage_id);
            	if(count($rows) == 1) {
            		if($rows[0]["asset_type"] == 2) {
            			$contra = $contra_care;
            			echo "<br>_____ " . $first_name . " " . $surname . " assumed to be in Care Centre - " . $amount_c;
            		}
            	}
            }
            if ($account_no == "none") {
                echo "<br>Customer = $customer, Account = $acc, Amount = $amount - Account number not found.";
                $error_count += 1;
                continue;
            }
            $trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"H/Room\",\"Hibiscus Room\",$amount_c,\"02\",0,\" \",\"    \",\"$contra\",1,1,0,0,0,$amount_c\r\n";    
        //    echo "<br>$trans";
            fwrite($fp, $trans);
        }
    } else {
        echo "<br><br>Cannot open Hibiscus Room file\n";
    } 
    fclose($handle);
    fclose($fp);
    ?>
</table>
</div>
