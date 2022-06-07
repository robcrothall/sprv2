<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$occupation_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from occupation where id = ?", $occupation_id); 
	$_SESSION["occupation_id"] = $occupation_id;
	$occupation = $data[0]["occupation"]; 
	$_SESSION["occupation"] = $occupation;
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This occupation is about to be deleted!</h2>
  <div class="container">
  <form action="../page/occupation_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $occupation; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed by:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $username; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Changed on:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $changed; ?></td>
	      </tr>
	      <tr>
				<td align="right" width="25%">Notes:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $notes; ?></td>
	      </tr>
	</table> 
	<h3>This Occupations is used by the following People - they need to be changed first!</h3>
   <table class="w3-table-all">         
   	<thead>
         <tr>
            <th>people</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         $rows = query("SELECT * from people where occupation_id = ? order by surname, first_name limit 50", $occupation_id);
         if (count($rows) > 0)
            {
            foreach ($rows as $row)
              {
              echo '<tr>';
              echo '<td>' . $row['surname'] . ", " . $row["first_name"] . '</td>';
              echo '</tr>';
              }
            }
         else 
         	{
         		echo '<tr><td>No dependent people</td></tr>';
         	}
            ?>
      </tbody>
   </table>

   <div class="form-actions">
   	<input type='submit' value='Delete' class='w3-button w3-green' />
      <a class="w3-button w3-green" href="../page/occupation.php">Cancel</a>
   </div>
  </div>
</form>