<h2 align="center">List of events in history</h2>
    <div class="container">
        <p>
        		<a href="../page/history_create.php" class="w3-button w3-green">Create a new event</a>&nbsp;
				<?php
				echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
				?>
        </p>
			<div class="row">
	        Events associated with: 
   	     <?php
				$rows = query("SELECT * FROM `people` where id = ?", $_SESSION["selected_people_id"]);
				$row = $rows[0];
				echo $row['surname'] . ", " . $row["first_name"] . " " . $row["other_name"];
				if(!empty($row["given_name"])) {echo " (" . $row["given_name"] . ")";}
      	  ?>
			</div>
        <div class="row">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT a.id, a.event_date, b.place, a.notes from history a, places b where a.place_id = b.id and a.people_id = ? order by a.event_date desc", $_SESSION["selected_people_id"]);
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['event_date'] . '</td>';
                                echo '<td>' . $row['notes'] . '</td>';
                                echo '<td valign="top" style="width:280px">';
                                    echo '<a class="w3-button w3-green" href="../page/history_read.php?id=' . $row['id'] . '">Read</a> &nbsp;'; 
									if (check_role("ADMIN" )) {
                                    	echo '<a class="w3-button w3-green" href="../page/history_update.php?id=' . $row['id'] . '">Update</a> &nbsp;'; 
                                    	echo '<a class="w3-button w3-red" href="../page/history_delete.php?id=' . $row['id'] . '">Delete</a>';
                                    }
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
                    ?>
                </tbody>
            </table>
        	</div>
        	<?php
			echo '<a href="../page/people_read.php?id=' . $_SESSION["selected_people_id"] . '" class="w3-button w3-green">Return</a>&nbsp;';
			?>
    </div>
