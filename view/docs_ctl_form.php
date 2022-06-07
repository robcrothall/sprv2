<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">Phone account for current month</h2>
<h3 align="left">Options selected are:</h3>
<form action="../page/phone.php" method="post">
   <table cellspacing=0 cellpadding=4>
<?php
   $mnth        = $_SESSION["mnth"];
   $accperiod   = $_SESSION["accperiod"];
   $readingdate = $_SESSION["readingdate"];
   $readingdate = "21/08/2020";
   $mnth_c      = $_SESSION["mnth_c"];
   $yr          = $_SESSION["yr"];
   $yr_c        = $_SESSION["yr_c"];
   $phone_file  = "../data/phone_file.txt";
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
	echo '<a href="../data/' . $trans_file . '" class="w3-button w3-green">Download</a>&nbsp;' . "\n";
	echo "<br>";
	if (file_exists("../data/$trans_file")) {unlink("../data/$trans_file");}
   $fp = fopen("../data/$trans_file", 'w');
   $handle = fopen($phone_file,"r");
   if ($handle) {
		while(!feof($handle) and $line_count < 500) {
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
//			var_dump( $field );
			if (is_numeric($field[0])) {
				if (strlen($field[0]) == 3) {
//					echo "Extension $field[0] found";
					$ext_count = 0;
					$ext = trim($field[0]);
					$name = trim($field[2]);
					$amount = trim(str_replace(',','.',$field[11]));
					$sql = "select id, surname, first_name, account_no, old_account_no, home_phone, status from people ";
					$sql .= "where (right(home_phone,3) = ? and company_id=1) or (right(work_phone,3) = ? and company_id = 2) ";
					$sql .= "order by acc_pref";
					$rows = query($sql,$ext,$ext);
					if(count($rows) > 0) {
//						var_dump($rows);
						foreach($rows as $row) {
						$ext_count = count($rows);
						$id = $row["id"];
						$surname = $row["surname"];
						$first_name = $row["first_name"];
						$account_no = $row["account_no"];
						$old_account_no = $row["old_account_no"];
						$home_phone = $row["home_phone"];
						$status = $row["status"];
//						echo "<br>Count=$ext_count Home phone=$home_phone Ext=$ext Amount=$amount Name=$name Status=$status Surname=$surname First name=$first_name Account No=$account_no Old Acc=$old_account_no<br>\n";
						}
					}
//					echo $line . "<br>\n";
					$readingdate = '21/08/2020';
					if ($account_no == "none") {	
//						echo "<br>Count=$ext_count Home phone=$home_phone Ext=$ext Amount=$amount Name=$name Status=$status Surname=$surname First name=$first_name Account No=$account_no Old Acc=$old_account_no<br>\n";
						echo "<br>Ext=$ext Amount=$amount \tName=$name \t - No account number found\n";
					} else {
						$trans = "$accperiod,\"$readingdate\",\"D\",\"$account_no\",\"Phone\",\"Phone calls X$ext\",$amount,\"02\",0,\" \",\"    \",\"9540010\",1,1,0,0,0,$amount\r\n";	
//						echo "<br>$trans";
						fwrite($fp,$trans);
					}
				}			
			}
		}   
   } else {
   	echo "Cannot open phone file\n";
   }
	fclose($handle);
	fclose($fp);
			?>
</table>
</div>
