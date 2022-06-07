<h2 align="center">List of Occupations</h2>
        <p><a href="../page/occupation_create.php" class="w3-button w3-green">Create a new occupation</a></p>
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Occupations</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT id, occupation from occupation order by occupation");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['occupation'] . '</td>';
                                echo '<td>';
                                    echo '<a class="w3-button w3-green" href="../page/occupation_read.php?id=' . $row['id'] . '">Read</a>' . '&nbsp;';
												if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                                    	echo '<a class="w3-button w3-green" href="../page/occupation_update.php?id=' . $row['id'] . '">Update</a>' . '&nbsp;';
                                    	if ($row['id'] > 0) {
                                    	    echo '<a class="w3-button w3-red" href="../page/occupation_delete.php?id=' . $row['id'] . '">Delete</a>';
                                    	}
                                    }
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
                    ?>
                </tbody>
            </table>
