<h2 align="center">List of assignments to a Task</h2>
    <div class="container">
        <p><a href="../page/task_ass_create.php" class="w3-button w3-green">Add a new assignment</a></p>
			<div class="row">
				<table class="w3-table-all">
					<tbody>
						<tr>
						<td width="20%">People assigned to Task:</td>
						<td width="80%">
		  				<?php
		  					$selected_task_id = $_SESSION["selected_task_id"];
		  					$rows = query("SELECT subject, description FROM `tasks` where id = ?", $selected_task_id);
		  					$row = $rows[0];
		  					$subject = $row["subject"];
		  					$description = $row["description"];
		    				echo $selected_task_id . ": " . $subject;
		  				?>
						</td>
						</tr>
					</tbody>
				</table>
			</div>
        <div class="row">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Budget Hrs</th>
                        <th>Used Hrs</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = "select surname, first_name, given_name, task_id, ass_id, budget_hrs, actual_hrs from people, tasks_ass where id = ass_id and task_id = ?";
                    $rows = query($sql, $selected_task_id);
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                        	$name = $row["surname"] . ", " . $row["first_name"];
                        	if (!empty($row["given_name"])) {
                                $name .= "[" . $row["given_name"] . "]";
                            }
                            echo '<tr>';
                                echo '<td>' . $name . '</td>';
                                echo '<td>' . $row['budget_hrs'] . '</td>';
                                echo '<td>' . $row['actual_hrs'] . '</td>';
                                echo '<td valign="top" style="width:280px">';
                                echo '<a class="w3-button w3-red" href="../page/task_ass_delete.php?id=' . $row['ass_id'] . '">Delete</a>';
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
