<?php

	$_SESSION["module"] = $_SERVER["PHP_SELF"];
?>
<h2 align="center">List of Related People</h2>
<!--      <form action="../page/people_related.php" method="post">  -->
		<a href="../page/people_related_create.php" class="w3-button w3-green">Create a new relationship</a>&nbsp;
<!--        </form>  -->
				<?php
				echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
				?>
        </p>
			<div class="row">
	        Relationships associated with: 
   	     <?php
				$rows = query("SELECT * FROM `people` where id = ?", $_SESSION["selected_people_id"]);
				$row = $rows[0];
				echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_name"];
				if(!empty($row["given_name"])) {echo " (" . $row["given_name"] . ")";}
      	  ?>
			</div>
        <div class="row">
            <table class="w3-table">
                <thead>
                    <tr>
<!--                        <th>Person</th>  -->
                        <th>Related Person</th>
                        <th>Relationship</th>
                        <th>Date</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $cmd1 = "SELECT a.*, b.surname, b.first_name, c.surname as r_surname, c.first_name as r_first_name "; 
                    $cmd1 .= " from people_related a, people b, people c ";
                    $cmd2 = " where a.people_id = b.id and a.related_id = c.id and a.people_id =? ";
                    $cmd3 = " order by surname, first_name, relationship limit 500";
                    $cmd = $cmd1 . $cmd2 . $cmd3;
                 //   print_r($cmd);
						  $rows = query($cmd,$_SESSION["selected_people_id"]);
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo "<tr>";
//                            echo "<td>" . $row["surname"] . ", " . $row["first_name"] . "</td>";
										echo "<td>" . $row["r_surname"] . ", " . $row["r_first_name"] . "</td>";
										echo "<td>" . $row["relationship"] . "</td>";
										echo "<td>" . $row["relationship_date"] . "</td>";
										echo "<td>" . $row["notes"] . "</td>";
                              echo '<td>';
                          		if ($row['id'] > 0) {
                             	    echo '<a class="w3-button w3-red" href="../page/people_related_delete.php?id=' . $row['id'] . '">Delete</a>';
                          		}
                              echo "</td>";
                            echo "</tr>\n\r";
                       }
                    }
                    ?>
                </tbody>
            </table>
        </div>
		<?php
		echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
		?>
