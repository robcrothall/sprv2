<?php
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
/*	print_r("accperiod = ");
	print_r($_SESSION["accperiod"]);
	print_r("; readingdate = ");
	print_r($_SESSION["readingdate"]);
	print_r("; mnth = ");
	print_r($_SESSION["mnth"]);
	print_r("; mnth_c = ");
	print_r($_SESSION["mnth_c"]);
	print_r("; yr = ");
	print_r($_SESSION["yr"]);
	print_r("; yr_c = ");
	print_r($_SESSION["yr_c"]);
	print_r("; Request method = ");
	print_r($_SERVER["REQUEST_METHOD"]);
	print_r("; PHP_SELF = ");
	print_r($_SERVER["PHP_SELF"]);  
	print_r("; phone_file = ");
	print_r($_SESSION["phone_file"]);
	print_r("; trans_file = ");
	print_r($_SESSION["trans_file"]);   */
   $atg_file  = $_SESSION["atg_file"];
/*   $trans_file  = $_SESSION["trans_file"]; */
?>
<h2 align="center">AtTheGate data load</h2>
<h3 align="left">Please select:</h3>
<form action="../page/atg.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
   <table cellspacing=0 cellpadding=4>
		<tr>
			<td><label for="atg_file">ATG csv file: </label></td>
			<td><input type="file" id="atg_file" name="atg_file" accept=".csv"></td>
		</tr>
	</table>
	<input type="submit">
</div>
<?php
?>
