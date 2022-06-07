<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">List of People and Assets</h2>
      <form action="../page/people_assets.php" method="post">
		<a href="../page/people_assets_create.php" class="w3-button w3-green">Create a new relationship</a>&nbsp;
		<!-- <input type='submit' value='Refresh' class='w3-button w3-green'/>
<br> -->
        </form>
        <div class="row">
            <table class="w3-table">
                <thead>
                    <tr>
                        <th>Person</th>
                        <th>Asset</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cmd1 = "SELECT a.*, b.surname, b.first_name, c.asset_name, c.asset_type_char as description "; 
                    $cmd1 .= " from people_asset a, people b, asset c ";
                    $cmd2 = " where a.people_id = b.id and a.asset_id = c.id ";
                    $cmd3 = " order by surname, first_name";
                    $cmd = $cmd1 . $cmd2 . $cmd3;
                 //   print_r($cmd);
						  $rows = query($cmd);
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo "<tr>";
                              echo "<td>" . $row["surname"] . ", " . $row["first_name"] . "</td>";
										echo "<td>" . $row["asset_name"] . " (" . $row["description"] . ")" . "</td>";
										echo "<td>" . $row["changed"] . "</td>";
                                echo '<td>';
                                   		if ($row['id'] > 0) {
                                   	    echo '<a class="w3-button w3-red" href="../page/people_assets_delete.php?id=' . $row['id'] . '">Delete</a>';
                                   		}
                                echo "</td>";
                            echo "</tr>\n\r";
                       }
                    }
                    ?>
                </tbody>
            </table>
        </div>
