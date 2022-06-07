<h2>Record a new Event</h2>

<form action="../page/history_create.php" method="post">
    <table class='w3-table-all'>
	     <tr>
				<td>Person selected</td>
				<td>
		  				<?php
		  					$rows = query("SELECT * FROM `people` where id = ?", $_SESSION["selected_people_id"]);
		  					$row = $rows[0];
		    				echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_name"];
		  				?>
				</td>
	     </tr>
        <tr>
            <td>Date</td>
            <td><input type='date' name='event_date' class='form-control'></td>
        </tr>
		  <tr>
		  		<td>Place</td>
		  		<td>
	  			<select name="place_id">
		  				<?php
		  					$rows = query("SELECT distinct * FROM places order by place");
		  					foreach ($rows as $row) {
		    					echo "<option value=" . $row['id'] . ">" . $row['place'] . "</option>";
		    				}
		  				?>
	  			</select>
	  			</td>
		  </tr>
        <tr>
            <td>Notes on this event</td>
            <td><textarea name='notes' class='form-control' rows="4" cols="50"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Save' class='w3-button w3-green' />
                <a href='../page/history.php' class='w3-button w3-green'>Back to History</a>
            </td>
        </tr>
    </table>
</form>


