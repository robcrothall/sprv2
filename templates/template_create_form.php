<h2>Record a new %title%</h2>

<form action="../ctl/%table%_create.php" method="post">
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Name</td>
            <td><input type='text' name='name' class='form-control'></td>
        </tr>
	     <tr>
				<td>%lookupTitle%</td>
				<td>
		  			<select name="%lookupName%_id">
		  				<?php
		  					$rows = query("SELECT * FROM `%lookupTable%` order by %lookupName%");
		  					foreach ($rows as $row) {
		  						if ($_SESSION["%lookupName%_select"] == $row['id'])
		  						{$selected = " selected";}
		  						else {$selected = "";}
		    					echo "<option value=" . $row['id'] . $selected . ">" . $row['%lookupName%'] . "</option>";
		    				}
		  				?>
		  			</select>
				</td>
	     </tr>
        <tr>
            <td>Notes on this %table%</td>
            <td><textarea name='notes' class='form-control'></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='btn btn-primary' />
                <a href='../ctl/%table%.php' class='btn btn-primary'>Back to %title%s</a>
            </td>
        </tr>
    </table>
</form>


