<tr>
    <td align="right" valign="top">Manager</td>
    <td>
        <select name="manager_id">
<?php
/**
 * Program: html_manager_select
 * 
 * Edit an address type.
 * php version 5
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git_id>
 * @link     http://www.sprv.co.za
 */
    $rows = query(
        "SELECT id, surname, first_name, given_name FROM people " . 
        "where status in ('Resident', 'Staff', 'Constant') " . 
        "order by surname, first_name"
    );
    foreach ($rows as $row) {
        if ($row["id"] == $manager_id) {
            $selected = " selected";
        } else {
            $selected = "";
        }
        $name = $row["surname"];
        if (!empty($row["first_name"])) {
            $name .= ", " . $row["first_name"];
        }
        if (!empty($row["given_name"])) {
            $name .= " (" . $row["given_name"] . ")";
        }
        echo '<option value="' . $row["id"] . '"' . $selected . ">";
        echo $name . "</option>\n";
    }
    ?>
        </select>
    </td>
</tr>
