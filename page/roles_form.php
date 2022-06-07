<?php
	$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">List of People and Roles</h2>
<a href="../page/roles_read.php" class="w3-button w3-green">Edit roles</a>&nbsp;
<?php
//	echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
?>
<div class="row">
	<table class="w3-table-all">
		<thead>
			<tr>
				<th>User</th>
				<th>Roles</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			$cmd1  = "SELECT id, surname, first_name, user_role "; 
			$cmd2  = " from users ";
			$cmd3  = " order by surname, first_name ";
         $cmd   = $cmd1 . $cmd2 . $cmd3;
			$users  = query($cmd);
			if (count($users) > 0) {
				foreach ($users as $u)
				{
					echo "<tr>";
					echo "<td>" . $u["surname"] . ", " . $u["first_name"] . "</td>";
					echo "<td>";
					$sql  = "select a.role_name, b.role_expiry from roles a, user_roles b where b.user_id = ? and b.role_id = a.id order by role_name";
					$roles = query($sql,$u["id"]);
					$comma = "";
					if(count($roles) > 0) {
						foreach ($roles as $r)
						{
							echo $comma . " " . $r["role_name"];
							if(strtotime($r["role_expiry"]) < strtotime("+1 Months")) {
								echo " expires on " . date("Y-m-d",strtotime($r["role_expiry"]));
							}
							$comma = ",";
						}
					}
					echo "</td>";
               echo "<td>";
           		if ($u['id'] > 0) {
						echo '<a class="w3-button w3-green" href="../page/roles_edit.php?id=' . $u['id'] . '">Edit</a>';
               }
               echo "</td>";
               echo "</tr>\n\r";
				}
			}
		?>
		</tbody>
	</table>
</div>
<a href="../page/roles_read.php" class="w3-button w3-green">Edit roles</a>&nbsp;
