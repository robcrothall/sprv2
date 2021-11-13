<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$%name%_id = htmlspecialchars(strip_tags($_SESSION["rec_id"]));
	$data = query("select a.*, b.id, b.%lookupName% from %table% a, %lookupTable% b where a.%lookupName%_id = b.id and a.id = ?", $%name%_id); 
	$%name% = $data[0]["%name%"]; 
	$%lookupName%_id = $data[0]["%lookupName%_id"];
	$%lookupName% = $data[0]["%lookupName%"];
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>Update a %name%</h2>

<form action="../ctl/%name%_update.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td> 
            <input type="hidden" id="rec_id" name="rec_id" value="<?php echo $%name%_id; ?>" /></td>
            <td><input type='text' name='name' class='form-control' value='<?php echo $%name%; ?>' /></td>
        </tr>
        <!--<tr>
        		<td>%lookupTitle%</td>
            <td><input type='text' name='%lookupName%_id' class='form-control' value='<?php echo $%lookupName%_id; ?>' /></td>
        </tr> -->
	     <tr>
				<td>%lookupTitle%</td>
				<td>
		  			<select name="%lookupName%_id">
		    			<!--<option value="any">Any place</option> -->
		  				<?php
		  					$rows = query("SELECT * FROM `%lookupTable%` order by %lookupName%");
		  					foreach ($rows as $row) {
		  						if ($%lookupName%_id == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['%lookupName%'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
        <tr>
            <td>Notes on this %name%</td>
            <td><textarea name='notes' class='form-control'><?php echo $notes; ?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='%name%.php' class='btn btn-primary'>Back to %table%</a>
            </td>
        </tr>
    </table>
</form>


