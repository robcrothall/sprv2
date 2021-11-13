<h2 align="center">List of %title%s</h2>
    <div class="container">
        <p><a href="../ctl/%name%_create.php" class="btn btn-success">Create a new %name%</a></p>
        <div class="row">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>%title%</th>
                        <th>%lookupTitle%</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query("SELECT a.id, %name%, %lookupName% from %table% a, %lookupTable% b where b.id = %lookupName%_id order by %name%, %lookupName%");
                    if (count($rows) > 0)
                    {
                        foreach ($rows as $row)
                        {
                            echo '<tr>';
                                echo '<td>' . $row['%name%'] . '</td>';
                                echo '<td>' . $row['%lookupName%'] . '</td>';
                                echo '<td>';
                                    echo '<a class="btn btn-success" href="../ctl/%name%_read.php?id=' . $row['id'] . '">Read</a>';
												if ($_SESSION["user_role"] == "STAFF" | $_SESSION["user_role"] == "ADMIN" ) {
                                    	echo '<a class="btn btn-success" href="../ctl/%name%_update.php?id=' . $row['id'] . '">Update</a>';
                                    	echo '<a class="btn btn-danger" href="../ctl/%name%_delete.php?id=' . $row['id'] . '">Delete</a>';
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
