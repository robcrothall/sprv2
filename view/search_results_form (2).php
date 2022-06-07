<h2 align="center">List of matching People</h2>
  <div class="container">
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/search.php">Back</a>
   </div>
            <?php echo($search_string); ?>
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>People</th>
                        <th>Occupation</th>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query($search_string);
                    //$rows = query("SELECT a.id, a.surname, a.first_name, a.occupation_id, a.Party_id, b.occupation, c.party_name from people a, occupation b, party c where b.id = occupation_id and c.id = a.party_id order by surname, first_name");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['surname'] . ", " . $row['first_name'] . '</td>';
                                echo '<td>' . $row['occupation'] . '</td>';
                                echo '<td>' . $row['co_name'] . '</td>';
                                echo '<td>';
                                    echo '<a class="w3-button w3-green" href="../page/people_read.php?id=' . $row['id'] . '">Read</a>';
												if (check_role("STAFF" | check_role("ADMIN" ) {
                                    	echo '<a class="w3-button w3-green" href="../page/people_update.php?id=' . $row['id'] . '">Update</a>';
                                    	echo '<a class="w3-button w3-red" href="../page/people_delete.php?id=' . $row['id'] . '">Delete</a>';
                                    }
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
					else
					{
						echo "<tr>";
						echo "<td>No records found - please try again.</td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "</tr>";
					}
                    ?>
                </tbody>
            </table>
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/search.php">Back</a>
   </div>
