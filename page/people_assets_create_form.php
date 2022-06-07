<h2>Link a person to an asset</h2>

<form action="../page/people_assets_create.php" method="post">
    <input type='submit' value='Save' class='w3-button w3-green' />
    <a href='../page/people_assets.php' class='w3-button w3-green'>Back to list</a>
    <table class='w3-table-all'>
		<tr>
			<td align="right" valign="top">Person</td>
			<td>
		  		<select name="people_id">
		  			<?php
						echo '<option value="0" selected>Please choose</option>' . "\n"; 
		  				$rows = query("SELECT id, surname, first_name FROM `people` where status in ('Resident', 'Staff', 'Contractor') order by surname, first_name");
		  				foreach ($rows as $row) {
							if ($row["first_name"] == "")
		    				{echo '<option value="' . $row["id"] . '"' . $selected . ">" . $row["surname"] . "</option>\n";}
		    				else 
							{echo '<option value="' . $row["id"] . '"' . $selected . ">" . $row["surname"] . ", " . $row["first_name"] . "</option>\n";}
		    			}
		  			?>
		  		</select>
			</td>
	   </tr>
		<tr>
        	<td align="right" valign="top">Asset/Cottage</td>
            <td>
		  		<select name="asset_id">
	  				<?php
						echo '<option value="0" selected>Please choose</option>' . "\n"; 
		  				$rows = query("SELECT id, asset_name FROM asset order by asset_seq");
		  				foreach ($rows as $row) {
		    				echo '<option value="' . $row["id"] . '">' . $row["asset_name"] . "</option>\n";
		    			}
	  				?>
		  		</select>
            </td>
        </tr>
    </table>
    <input type="submit" value="Save" class="w3-button w3-green" />
    <a href="../page/people_assets.php" class="w3-button w3-green">Back to list</a>
</form>


