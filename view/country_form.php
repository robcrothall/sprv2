<h2 align="center">List of Countries</h2>
    <div class="container">
        <p><a href="../page/country_create.php" class="w3-button w3-green">Create a new country</a></p>
        <div class="row">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT * from countries order by country");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['country'] . '</td>';
                                echo '<td>';
                                    echo '<a class="w3-button w3-green" href="../page/country_read.php?id=' . $row['id'] . '">Read</a>';
												if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                                    	echo '<a class="w3-button w3-green" href="../page/country_update.php?id=' . $row['id'] . '">Update</a>';
                                    	if ($row['id'] > 0) {
                                    	    echo '<a class="w3-button w3-red" href="../page/country_delete.php?id=' . $row['id'] . '">Delete</a>';
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
