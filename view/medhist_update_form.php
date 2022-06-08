<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$med_history_id 	= htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select * from med_history where id = ?", $med_history_id); 
	$proc_date 			= $data[0]["proc_date"]; 
	$people_id 			= $data[0]["people_id"];
	$med_proc_id 		= $data[0]["med_proc_id"];
	$comment 			= $data[0]["comment"];
	$price 				= $data[0]["price"];
	$value 				= $data[0]["value"];
	$user_id 			= $data[0]["user_id"];
	$changed 			= $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username 			= $data[0]["username"];
	$data = query("select surname, first_name, other_names, given_name, cottage, account_no from people where id = ?", $people_id);
	$surname 			= $data[0]["surname"];
	$first_name			= $data[0]["first_name"];
	$other_name         = $data[0]["other_name"];
	$given_name         = $data[0]["given_name"];
	$cottage 			= $data[0]["cottage"];
	$account_no			= $data[0]["account_no"];
?>
<h2>Update a record in medical history</h2>
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='medhist.php' class='w3-button w3-green'>Back to medical history</a>
Patient: 
<?php 
echo $surname . ", " . $first_name . " " . $other_name; 
if (!empty($data[0]["given_name"])) {
	echo " (" . $data[0]["given_name"] . ") ";
}
?> 
Cottage: <?php echo $cottage; ?> Account No: <?php echo $account_no; ?>
<br>
<form action="../page/medhist_update.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td>Procedure date</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $history_id; ?>" /></td>
            <td><input type='date' name='proc_date' class='form-control' value='<?php echo $proc_date; ?>' /></td>
        </tr>
		<tr>
			<td>Procedure</td>
			<td>
		  	<select name="proc_id">
		  		<?php
		  			$rows = query("SELECT id, description FROM med_procedures order by description");
		  			foreach ($rows as $row) {
		  				if ($med_proc_id == $row['id'])
		  					{$selected = " selected";}
		  				else {$selected = "";}
		    			echo "<option value=" . $row['id'] . $selected . ">" . $row["description"] . "</option>";
		    		}
		  		?>
		  	</select>
			</td>
		</tr>
        <tr>
            <td>Value</td>
            <td><input type="text" name="value" class='form-control' value="<?php echo $value; ?>" /></td>
        </tr>
        <tr>
            <td>Price</td>
            <td><input type="text" name="price" class="form-control" value="<?php echo $price; ?>" /></td>
        </tr>
        <tr>
            <td>Comment</td>
            <td><input type="text" name="comment" class='form-control' value="<?php echo $comment; ?>" /></td>
        </tr>
    </table>
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='medhist.php' class='w3-button w3-green'>Back to medical history</a>
</form>
