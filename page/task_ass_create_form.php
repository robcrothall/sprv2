<h2>Add a person to a Task</h2>

<form action="../page/task_ass_create.php" method="post">
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/task_ass.php' class='w3-button w3-green'>Back to task assignments</a> Task selected: 
	<?php
		$rows = query("SELECT subject from tasks where ID = ?", $_SESSION["selected_task_id"]);
		$row = $rows[0];
		echo $_SESSION["selected_task_id"] . " : " . $row['subject'];
	?>
	<br>
	<table class='w3-table-all'>
		<tr>
			<td align="right" valign="top">Assigned to:<br>(Select from either list)</td>
			<td>
		  		<select name="short_list">
		  		<?php
		  			$sql = "SELECT a.id, a.surname, a.first_name, a.given_name ";
					$sql .= "FROM people a where a.id in ";
					$sql .= "(select distinct ass_id from tasks_assigned) order by surname, first_name";
		  			$rows = query($sql);
		  				foreach ($rows as $row) {
		  					if ($row["id"] == $assigned_to) {
		  						$selected = " selected";
		  					} else {
		  						$selected = "";
		  					}
	  						$name = $row["surname"];
							if(!empty($row["first_name"])) {
		    					$name .= ", " . $row["first_name"];
		    				}
		    				if(!empty($row["given_name"])) {
		    					$name .= " (" . $row["given_name"] . ")";
			    			}
			    			echo '<option value="' . $row["id"] . '"' . 
							    $selected . ">" . $name . "</option>\n";
		    			}
		  		?>
		  		</select>
		  		<?php echo " Short list - higher priority"; ?>
		  		<br>
		  		<select name="assigned_to">
		  			<?php
					    $sql = "SELECT id, surname, first_name, given_name ";
						$sql .= "FROM people where status in ('Resident', ";
						$sql .= "'Staff', 'Contractor', 'Constant') ";
						$sql .= "order by surname, first_name";
		  				$rows = query($sql);
		  				foreach ($rows as $row) {
		  					if ($row["id"] == $assigned_to) {
		  						$selected = " selected";
		  					} else {
		  						$selected = "";
		  					}
	  						$name = $row["surname"];
							if(!empty($row["first_name"])) {
		    					$name .= ", " . $row["first_name"];
		    				}
		    				if(!empty($row["given_name"])) {
		    					$name .= " (" . $row["given_name"] . ")";
			    			}
			    			echo '<option value="' . $row["id"] . '"' . $selected . ">" . $name . "</option>\n";
		    			}
		  			?>
		  		</select>
		</tr>
		<tr>
			<td>Budget hours:</td>
			<td><input type="number" name="budget_hrs" class="form-control" size="10" step="0.25" value="0.00"></td>
		</tr>
	</table>
	<br>
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/task_ass.php' class='w3-button w3-green'>Back to task assignments</a>
</form>
