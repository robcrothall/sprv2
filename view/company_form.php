<h2 align="center">List of Companies</h2>
    <div class="container">
        <p><a href="../page/company_create.php" 
        class="w3-button w3-green">Create a new company</a></p>
        <div class="row">
            <table class="w3-table-all">
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php 
/**
 * Company list
 * 
 * List company details
 * PHP Version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git-id>
 * @link     http://www.sprv.co.za
 */
$rows = query("SELECT * from company order by co_name");
if (count($rows) > 0) {
    foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>' . $row['co_name'] . '</td>';
        echo '<td>';
        echo '<a class="w3-button w3-green" href="../page/company_read.php?id=';
        echo $row['id'] . '">Read</a>';
        if ($row["id"] <> 6) {
            if (check_role("STAFF") | check_role("ADMIN")) {
                echo '<a class="w3-button w3-green" ';
                echo 'href="../page/company_update.php?id=' . $row['id'];
                echo '">Update</a>';
                if ($row['id'] > 0) {
                    echo '<a class="w3-button w3-red" ';
                    echo 'href="../page/company_delete.php?id=' . $row['id'];
                    echo '">Delete</a>';
                }
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
