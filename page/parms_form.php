<h2 align="center">List of Parameters</h2>
    <div class="container">
        <p><a href="../page/parms_create.php" class="w3-button w3-green">Create a new parameter</a></p>
        <div class="row">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Parameter</th>
                        <th>Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT * from parms_char order by parm_name, parm_value");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['parm_name'] . '</td>';
                                echo '<td>' . $row['parm_value'] . '</td>';
                                echo '<td>';
                                    echo '<a class="w3-button w3-green" href="../page/parms_read.php?id=' . $row['id'] . '">Read</a>';
												if (check_role("STAFF") | check_role("ADMIN") ) {
                                    	echo '<a class="w3-button w3-green" href="../page/parms_update.php?id=' . $row['id'] . '">Update</a>';
                                    	if ($row['id'] > 0) {
                                    	    echo '<a class="w3-button w3-red" href="../page/parms_delete.php?id=' . $row['id'] . '">Delete</a>';
                                    	}
                                    }
                                echo '</td>';
                            echo '</tr>';
                       }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
