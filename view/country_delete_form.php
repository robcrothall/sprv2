<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
	$country_id = htmlspecialchars(strip_tags($form_id));
	$data = query("select * from countries where id = ?", $country_id); 
	$_SESSION["country_id"] = $country_id;
	$country = $data[0]["country"]; 
	$_SESSION["country"] = $country;
	$notes = $data[0]["notes"];
	$user_id = $data[0]["user_id"];
	$changed = $data[0]["changed"];
	$data = query("select username from users where id = ?", $user_id);
	$username = $data[0]["username"];
?>
<h2>This Country is about to be deleted!</h2>
  <div class="container">
  <form action="../page/country_delete.php" method="post">
   <table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" width="100%">
	      <tr>
				<td align="right" width="30%">Name:</td>
				<td width="2%"></td>
				<td align="left" width="70%"><?php echo $country; ?></td>
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
	<h3>This Country is used by the following Regions - they need to be deleted first!</h3>
   <table class="w3-table-all">         
   	<thead>
         <tr>
            <th>Region</th>
         </tr>
      </thead>
      <tbody>
         <?php 
         $rows = query("SELECT * from regions where country_id = ? order by region", $country_id);
         if (count($rows) > 0)
            {
            foreach ($rows as $row)
              {
              echo '<tr>';
              echo '<td>' . $row['region'] . '</td>';
              echo '</tr>';
              }
            }
         else 
         	{
         		echo '<tr><td>No dependent regions</td></tr>';
         	}
            ?>
      </tbody>
   </table>

   <div class="form-actions">
   	<input type='submit' value='Delete' class='w3-button w3-red' />
      <a class="w3-button w3-green" href="../page/country.php">Cancel</a>
   </div>
  </div>
</form>