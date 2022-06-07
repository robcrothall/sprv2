<?php
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">Electricity account for current month</h2>
<h3 align="left">Options selected are:</h3>
<form action="../page/elec.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
   $mnth        = $_SESSION["mnth"];
   $accperiod   = $_SESSION["accperiod"];
   $readingdate = $_SESSION["readingdate"];
   $mnth_c      = $_SESSION["mnth_c"];
   $yr          = $_SESSION["yr"];
   $yr_c        = $_SESSION["yr_c"];
   $elec_file  = "../data/elec_file.txt";
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
	$ignore = true;
	echo '<a href="../data/' . $trans_file . '" class="w3-button w3-green">Download</a>&nbsp;' . "\n";
	echo "<br>";
	if (file_exists("../data/$trans_file")) {unlink("../data/$trans_file");}
   $fp = fopen("../data/$trans_file", 'w');
   $handle = fopen($elec_file,"r");
   if ($handle) {
		while(!feof($handle) and $line_count < 500) {
			$surname = "none";
			$first_name = "none";
			$account_no = "none";
			$old_account_no = "none";
			$status = "none";
			$id = 0;
			$line_count += 1;
			$line = fgets($handle);
			$field = explode("\t", $line);
			if ($ignore == false) {
//				var_dump( $field );
				$row_count = 0;
				$meter = trim($field[2]);
				if(empty($meter)) {continue;}
				if (strlen($field[3]) > 0) {$sqm = trim($field[3]);}
				else {$sqm = 0;}
				$opening = trim(str_replace(" ","",$field[4]));
				$closing = trim(str_replace(" ","",$field[5]));
//				echo "<br>Cottage=$meter Opening=$opening : Closing=$closing<br>";
				$used    = $closing - $opening;
				$nett    = $used;
				$charge  = 0;
				if ($used > $sqm) {
					$nett = $used - $sqm;
					$charge = $nett * $tariff;
					$rebate += $sqm * $tariff;				
				} else {
					$rebate += $used * $tariff;
				}
				$totused += $used;
				$amount = trim(str_replace('R',' ',$field[8]));
				$amount = str_replace(",",".",$amount);
				$amount = str_replace(" ","",$amount);
//				echo "<br>";
//				var_dump($amount);
				$sql = "select c.asset_name, b.id, b.surname, b.first_name, b.account_no, b.old_account_no, b.cottage from people_asset a, people b, asset c ";
				$sql .= "where c.asset_name = ? and a.asset_id = c.id and a.people_id = b.id and b.status = 'Resident'";
				$rows = query($sql,$meter);
//				var_dump($rows);
				if(count($rows) == 1) {
					$id = $rows[0]["id"];
					$surname = $rows[0]["surname"];
					$first_name = $rows[0]["first_name"];
					$account_no = $rows[0]["account_no"];
					$old_account_no = $rows[0]["old_account_no"];
				}
				if($account_no == "none") {
					$sql  = "select id, surname, first_name, account_no, old_account_no, cottage from people ";
					$sql .= "where cottage = ? and status = 'Resident'";
					$sql .= "order by acc_pref";
					$rows = query($sql,$meter);
					if(count($rows) > 0) {
//						var_dump($rows);
						foreach($rows as $row) {
							$meter_count = count($rows);
							$id = $row["id"];
							$surname = $row["surname"];
							$first_name = $row["first_name"];
							$account_no = $row["account_no"];
							$old_account_no = $row["old_account_no"];
//							echo "<br>Count=$meter_count Amount=$amount Surname=$surname First name=$first_name Account No=$account_no Old Acc=$old_account_no\n";
						}
					}
				}
//					echo $line . "<br>\n";
				if ($account_no == "none" and $amount > 0) {	
//						echo "<br>Count=$ext_count Home phone=$home_phone Ext=$ext Amount=$amount Name=$name Status=$status Surname=$surname First name=$first_name Account No=$account_no Old Acc=$old_account_no<br>\n";
					echo "<br>Meter = '$meter' Amount = R" . number_format($amount,2,'.','') . " - No account number found\n";
					
				} elseif ($amount > 0) {
					$amount_c = number_format($amount,2,'.','');
						$trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"ELEC\",\"Previous meter reading $opening\",0,\"00\",0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";	
//						echo "<br>$trans";
						fwrite($fp,$trans);
						$trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"ELEC\",\"Current meter reading  $closing\",0,\"00\",0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";	
//						echo "<br>$trans";
						fwrite($fp,$trans);
						$trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"ELEC\",\"Less allowance $sqm units\",0,\"00\",0,\" \",\"    \",\"0\",1,1,0,0,0,0\r\n";	
//						echo "<br>$trans";
						fwrite($fp,$trans);
						$trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"ELEC\",\"Chargeable usage $nett @ $tariff\",$amount,\"02\",0,\" \",\"    \",\"9500010\",1,1,0,0,0,$amount_c\r\n";	
//						echo "<br>$trans";
						fwrite($fp,$trans);
					}
				
							
		} elseif (!empty($field[2])) { 
			if ($field[2] == "Date read:") {
				$tariff_c = trim(str_replace("R","",$field[8]));
				$tariff_c = str_replace(",",".",$tariff_c);
				$tariff = (float)$tariff_c;
//				var_dump($tariff);
				$ignore = false;
				}
			}
		}
   } else {
   	echo "Cannot open electricity file\n";
   } 
	fclose($handle);
	fclose($fp);
	?>
</table>
</div>
