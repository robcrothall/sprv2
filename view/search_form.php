<?php
/**
 * Search form
 * 
 * Display Search form
 * 
 * PHP version 7.1
 * 
 * @category Template
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
?>
<h2>Search for people</h2>
<form action="../ctl/search.php" method="post">
        <input type='submit' value='Search' class='w3-button w3-green' />
        <table border="0" cellpadding="0" cellspacing="10" width="100%">
          <tr>
                <td align="right" width="30%">Surname</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=surname 
                size="50" autofocus placeholder="Any surname"></td>
          </tr>
          <tr>
                <td align="right" width="30%">First name</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=first_name 
                size="50" placeholder="Any first or given name"></td>
          </tr>
                <!-- <tr>
                <td align="right" width="30%">Other name</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=other_name 
                size="50" placeholder="Any other name"></td>
          </tr>  -->
          <tr>
                <td align="right" width="30%">Cottage</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=cottage 
                size="10" placeholder="Cottage No"></td>
          </tr>
<?php
if (check_role("STAFF")) {
    echo '<tr>';
    echo '<td align="right" width="30%">Account No</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%"><input type=search name=account_no ';
    echo 'size="20" placeholder="Account number"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" width="30%">Email address</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%"><input type=search name=email ';
    echo 'size="50" placeholder="someone@domain.co.za"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" width="30%">Title</td>';
    echo '<td width="2%"></td>';
    echo '<!--    <td align="left" width="70%"><input type=search name=title ';
    echo 'size="50" placeholder="Any title"></td> -->';
    echo '<td align="left" width="70%">';
    echo '<select name="title">';
    echo '<option value="any">Any title</option>';
    //echo '<?php
    $rows = query("SELECT distinct title FROM `people` order by title");
    foreach ($rows as $row) {
        echo "<option value=" . $row['title'] . ">";
        echo $row['title'] . "</option>";
    }
    //? >
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" width="30%">Status</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">';
    echo '<select name="status">';
    echo '<option value="any">Any status</option>';
    $sql = "SELECT distinct status FROM `people` ";
    $sql .= "where status is not null order by status";
    $rows = query($sql);
    foreach ($rows as $row) {
        echo "<option value=" . $row['status'] . ">";
        echo $row['status'] . "</option>";
    }
    echo '</select>';
    echo '&nbsp;From:';
    echo '<input type=date name=date_from placeholder="YYYY-MM-DD">';
    echo '&nbsp;To:';
    echo '<input type=date name=date_to placeholder="YYYY-MM-DD">';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" width="30%">Occupation</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">';
    echo '<select name="occupation_id">';
    echo '<option value="any">Any occupation</option>';
    $rows = query("SELECT * FROM `occupation` order by occupation");
    foreach ($rows as $row) {
        echo "<option value=" . $row['id'] . ">";
        echo $row['occupation'] . "</option>";
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" width="30%">Company</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">';
    echo '<select name="company_id">';
    echo '<option value="any">Any company</option>';
    $rows = query("SELECT * FROM company order by co_name");
    foreach ($rows as $row) {
        echo "<option value=" . $row['id'] . ">";
        echo $row['co_name'] . "</option>";
    }
    echo '</select>';
    echo '</td>';
    echo '</tr>';
    echo "<tr>";
    echo '<td align="right" width="30%">Checked status</td>';
    echo '<td width="2%">&nbsp</td>';
    echo '<td align="left" width="70%">';
    echo '<select name="checked">';
    echo '<option value="any" selected>Any status</option>';
    $checked_status = ["N","Y","Query"];
    foreach ($checked_status as $status) {
        echo "<option value=$status>$status</option>";
    }
    echo "</tr>";
    echo "<tr>";
    echo '<td align="right" width="30%">Phone No</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%"><input type=search name=phone '; 
    echo 'size="20" placeholder="Phone number"></td>';
    echo '</tr>';
}
?>
 <!--          <tr>
                <td align="right" width="30%">Keywords (or)</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=keywords_or
                size="50" placeholder="Find at least ONE in a history record"></td>
           </tr>
           <tr>
                <td align="right" width="30%">Keywords (and)</td>
                <td width="2%"></td>
                <td align="left" width="70%"><input type=search name=keywords_and 
                size="50" placeholder="Find ALL in a history record"></td>
           </tr>   -->
          </table>
      <br>
      <div align=center>
        You can use <q>%</q> in a text field to indicate <q>any other characters</q>.
      </div>
      <br>
        <input type='submit' value='Search' class='w3-button w3-green' />
</form>
        <br><br>
