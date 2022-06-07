<h2>List of matching People</h2>
  <div class="container">
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/search.php">Back</a>
   </div>
            <?php //echo($search_string); ?>
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>People</th>
                        <th>Cottage</th>
                        <th>Status</th>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $rows = query($search_string);
                    //$rows = query("SELECT a.id, a.surname, a.first_name, 
                    // a.cottage, a.Party_id, b.occupation, c.party_name 
                    // from people a, occupation b, party c 
                    // where b.id = occupation_id and c.id = a.party_id 
                    //order by surname, first_name");
                    if (count($rows) > 0) {
                        foreach ($rows as $row) {
                            $first_name = ucfirst(strtolower($row["first_name"]));
                            $other_name = ucfirst(strtolower($row["other_name"]));
                            $given_name = ucfirst(strtolower($row["given_name"]));
                            $surname = ucfirst(strtolower($row["surname"]));
                            echo '<tr>';
                            echo '<td>';
                            echo $surname . ", " . $first_name;
                            if (strlen($other_name) > 0) {
                                echo ' ' . $other_name;
                            }
                            if (strlen($given_name) > 0) {
                                echo ' (' . $given_name . ')';
                            }
                            echo '</td>';
                            echo '<td>' . $row['cottage'] . '</td>';
                            echo '<td>' . $row['status'] . '</td>';
                            echo '<td>' . $row['co_name'] . '</td>';
                            echo '<td>';
                            echo '<a class="w3-button w3-green"';
                            echo 'href="../page/people_read.php?id=' . $row['id'];
                            echo '">Read</a>' . '&nbsp;';
                            if ($_SESSION["user_role"] == "STAFF" 
                                or $_SESSION["user_role"] == "ADMIN" 
                            ) {
                                echo '<a class="w3-button w3-green" ';
                                echo 'href="../page/people_update.php?id=';
                                echo $row['id'] . '">Update</a>' . '&nbsp;';
                                if ($_SESSION["user_role"] == "ADMIN" ) {
                                    echo '<a class="w3-button w3-red" ';
                                    echo 'href="../page/people_delete.php?id=';
                                    echo $row['id'] . '">Delete</a>';
                                }
                            }
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
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
