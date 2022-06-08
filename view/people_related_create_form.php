<h2>Create a relationship between two people</h2>
<form action="../page/people_related_create.php" method="post">
   <input type='submit' value='Save' class='w3-button w3-green' />
	<?php
	echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
	?>
			<div class="row">
	        Relationships associated with: 
   	     <?php
				$rows = query("SELECT * FROM `people` where id = ?", $_SESSION["selected_people_id"]);
				$row = $rows[0];
				echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_names"];
				if(!empty($row["given_name"])) {echo " (" . $row["given_name"] . ")";}
      	  ?>
			</div>
    <table class='w3-table-all'>
		<tr>
			<td align="right" valign="top">Related Person</td>
			<td>
		  		<select name="related_id">
		  			<?php
						echo '<option value="0" selected>Please choose</option>' . "\n"; 
		  				$rows = query("SELECT id, surname, first_name FROM `people` order by surname, first_name");
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
        	<td align="right" valign="top">Relationship</td>
         <td>
		  		<select name="relationship">
	  				<?php
						echo '<option value="0" selected>Please choose</option>' . "\n"; 
		  				$rows = query("SELECT distinct parm_value FROM parms_char where parm_name = 'relationship' order by parm_value");
		  				foreach ($rows as $row) {
		    				echo '<option value="' . $row["parm_value"] . '">' . $row["parm_value"] . "</option>\n";
		    			}
	  				?>
		  		</select>
        </td>
      </tr>
		<tr>
        	<td align="right" valign="top">Relationship date</td>
         <td><input type="date" name="relationship_date" class="form-control" size="20" required value="<?php echo date("d/m/Y",$relationship_date); ?>"></td>
      </tr>
		<tr>
        	<td align="right" valign="top">Notes</td>
         <td><input type="text" name="notes" class="form-control" size="100%"></td>
        </tr>
    </table>
    <input type="submit" value="Save" class="w3-button w3-green" />
	<?php
	echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
	?>
</form>


