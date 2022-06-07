<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$history_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select * from history where id = ?", $history_id); 
	$event_date = $data[0]["event_date"]; 
	$people_id = $data[0]["people_id"];
	$place_id = $data[0]["place_id"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update an event in history</h2>

<form action="../page/history_update.php" method="post">
    <table class='w3-table-all'>
        <tr>
            <td>Date, in the form YYYY-MM-DD</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $history_id; ?>" /></td>
            <td><input type='text' name='event_date' class='form-control' value='<?php echo $event_date; ?>' /></td>
        </tr>
	     <tr>
				<td>Place</td>
				<td>
		  			<select name="place_id">
		  				<?php
		  					$rows = query("SELECT * FROM places order by place");
		  					foreach ($rows as $row) {
		  						if ($place_id == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['place'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
        <tr>
            <td>Notes on this event</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='history.php' class='w3-button w3-green'>Back to history</a>
            </td>
        </tr>
    </table>
</form>


