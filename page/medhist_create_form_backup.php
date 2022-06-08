<h2>Record a new medical event</h2>

<form action="../page/medhist_create.php" method="post">
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/medhist.php' class='w3-button w3-green'>Back to medical history</a>
	<table class='w3-table-all'>
		<tr>
			<td>Person selected</td>
			<td>
				<?php
	//				$rows = query("SELECT surname, first_name, other_name FROM people where id = ?", $_SESSION["selected_people_id"]);
	//				$row = $rows[0];
	//				echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_names"];
				?>
			</td>
		</tr>
		<tr>
			<td>Date of procedure</td>
			<td><input type='date' name='proc_date' class='form-control'></td>
		</tr>
	</table>
	<br>
	<table class="w3-table-all">
		<tr>
			<th>Procedure</th>
			<th>Value</th>
			<th>Comment</th>
		</tr>
		<tr>
			<td>
				<select name="proc1">
					<?php
	//				$rows = query("SELECT id, description FROM med_procedures order by description");
	//				foreach ($rows as $row) {
	//					if ($row['id'] == 0)
	//						{$selected = " selected";}
	//					else {$selected = "";}
	//					echo "<option value=" . $row['id'] . $selected . ">" . $row["description"] . "</option>";
	//				}
					?>
				</select>
			</td>
			<td><input name="value1" type="number" type="form-control" value="0" /></td>
			<td><input name="comment1" type="text" type="form-control" value="" /></td>
		</tr>
		<tr>
			<td>
				<select name="proc2">
					<?php
	//				$rows = query("SELECT id, description FROM med_procedures order by description");
	//				foreach ($rows as $row) {
	//					if ($row['id'] == 1)
	//						{$selected = " selected";}
	//					else {$selected = "";}
	//					echo "<option value=" . $row['id'] . $selected . ">" . $row["description"] . "</option>";
	//				}
					?>
				</select>
			</td>
			<td><input name="value2" type="number" type="form-control" value="0" /></td>
			<td><input name="comment2" type="text" type="form-control" value="" /></td>
		</tr>
		<tr>
			<td>
				<select name="proc3">
					<?php
	//				$rows = query("SELECT id, description FROM med_procedures order by description");
	//				foreach ($rows as $row) {
	//					if ($row['id'] == 2)
	//						{$selected = " selected";}
	//					else {$selected = "";}
	//					echo "<option value=" . $row['id'] . $selected . ">" . $row["description"] . "</option>";
	//				}
					?>
				</select>
			</td>
			<td><input name="value3" type="number" type="form-control" value="0" /></td>
			<td><input name="comment3" type="text" type="form-control" value="" /></td>
		</tr>
		<tr>
			<td>
				<select name="proc4">
					<?php
	//				$rows = query("SELECT id, description FROM med_procedures order by description");
	//				foreach ($rows as $row) {
	//					if ($row['id'] == 3)
	//						{$selected = " selected";}
	//					else {$selected = "";}
	//					echo "<option value=" . $row['id'] . $selected . ">" . $row["description"] . "</option>";
	//				}
					?>
				</select>
			</td>
			<td><input name="value4" type="number" type="form-control" value="0" /></td>
			<td><input name="comment4" type="text" type="form-control" value="" /></td>
		</tr>
	</table>
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/medhist.php' class='w3-button w3-green'>Back to medical history</a>
</form>
