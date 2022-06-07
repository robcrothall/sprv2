<h2>Record a new medical event</h2>

<form action="../page/medhist_create.php" method="post">
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/medhist.php' class='w3-button w3-green'>Back to medical history</a> Person selected: 
	<?php
		$rows = query("SELECT surname, first_name, other_name, given_name from people where ID = ?", $_SESSION["selected_people_id"]);
		$row = $rows[0];
		echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_name"];
		if (!empty($row["given_name"])) {
			echo " (" . $row["given_name"] . ")";
		}
			?>
	<br>
	Date of procedure: 
	<input type="date" name="proc_date" class="form_comtrol">
	<table class='w3-table-all'>
		<tr>
			<td>Procedure:</td>
			<td>
				<select name="proc1">
<?php
$rows = query("SELECT id, description from med_procedures order by description");
foreach ($rows as $row) {
    if ($row['id'] == 1) {
        $selected = " selected";
    } else {
        $selected = "";
    }
    echo "<option value=" . $row["id"] . $selected . ">" . $row["description"] . "</option>";
}
?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Value:</td>
			<td><input type="text" name="value1" class="form_control"></td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td><input type="text" name="comment1" size="50" class="form_control"></td>
		</tr>
	</table>
	<table class='w3-table-all'>
		<tr>
			<td>Procedure:</td>
			<td>
				<select name="proc2">
					<?php
						$rows = query("SELECT id, description from med_procedures order by description");
						foreach ($rows as $row)
						{
							if ($row['id'] == 2)
		  					{$selected = " selected";}
		  					else {$selected = "";}
							echo "<option value=" . $row["id"] . $selected . ">" . $row["description"] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Value:</td>
			<td><input type="text" name="value2" class="form_control"></td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td><input type="text" name="comment2" size="50" class="form_control"></td>
		</tr>
	</table>
	<table class='w3-table-all'>
		<tr>
			<td>Procedure:</td>
			<td>
				<select name="proc3">
					<?php
						$rows = query("SELECT id, description from med_procedures order by description");
						foreach ($rows as $row)
						{
							if ($row['id'] == 3)
		  					{$selected = " selected";}
		  					else {$selected = "";}
							echo "<option value=" . $row["id"] . $selected . ">" . $row["description"] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Value:</td>
			<td><input type="text" name="value3" class="form_control"></td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td><input type="text" name="comment3" size="50" class="form_control"></td>
		</tr>
	</table>
	<table class='w3-table-all'>
		<tr>
			<td>Procedure:</td>
			<td>
				<select name="proc4">
					<?php
						$rows = query("SELECT id, description from med_procedures order by description");
						foreach ($rows as $row)
						{
							if ($row['id'] == 0)
		  					{$selected = " selected";}
		  					else {$selected = "";}
							echo "<option value=" . $row["id"] . $selected . ">" . $row["description"] . "</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Value:</td>
			<td><input type="text" name="value4" class="form_control"></td>
		</tr>
		<tr>
			<td>Comment:</td>
			<td><input type="text" name="comment4" size="50" class="form_control"></td>
		</tr>
	</table>
	<br>
	<input type='submit' value='Save' class='w3-button w3-green' />
	<a href='../page/medhist.php' class='w3-button w3-green'>Back to medical history</a>
</form>
