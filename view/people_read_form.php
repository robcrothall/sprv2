<?php
/**
 * People_read_form
 * 
 * This stops non-staff from seeing draft policies and staff policies
 * PHP Version 7.1
 * 
 * @category WebPage
 * @package  Sample
 * @author   "Rob Crothall" <rob@crothall.co.za>
 * @license  GPL 1.0 or later
 * @version  GIT: <git-id>
 * @link     http://www.sprv.co.za
 */

$_SESSION["module"] = $_SERVER["PHP_SELF"];
$people_id = htmlspecialchars(strip_tags($form_id));
$data = query(
    "select a.surname, a.first_name, a.other_name, a.given_name, a.title, " . 
    "a.account_no, a.acc_pref, a.old_account_no, a.status, a.status_date, " .
    "a.company_id, a.id_no, a.driver_lic, " . 
    "a.birth_date, a.bd_disclose, a.home_phone, a.hp_disclose, a.work_phone, " .
    "a.wp_disclose, a.mobile_phone, a.mp_disclose, a.whatsapp, " . 
    "a.home_email, a.he_disclose, a.work_email, a.sex, a.cottage, " .
    "a.photo_disclose, a.cottage_id, a.occupation_id, a.race, " . 
    "a.checked, a.notes, a.user_id, a.changed from people a where a.id = ?", 
    $people_id
); 
$_SESSION["selected_people_id"] = $people_id;
$_SESSION["search_name_start"]  = $data[0]["surname"];
$_SESSION["selected_cottage"]   = $data[0]["cottage"];
$surname        = $data[0]["surname"];
$first_name     = $data[0]["first_name"];
$other_name     = $data[0]["other_name"];
$given_name     = $data[0]["given_name"];
$title          = $data[0]["title"];
$account_no     = $data[0]["account_no"];
$acc_pref       = $data[0]["acc_pref"];
$old_account_no = $data[0]["old_account_no"];
$status         = $data[0]["status"];
$status_date    = $data[0]["status_date"];
$company_id     = $data[0]["company_id"];
$id_no          = $data[0]["id_no"];
$driver_lic     = $data[0]["driver_lic"];
$birth_date     = $data[0]["birth_date"];
$bd_disclose    = $data[0]["bd_disclose"];
$home_phone     = $data[0]["home_phone"];
$hp_disclose    = $data[0]["hp_disclose"];
$work_phone     = $data[0]["work_phone"];
$wp_disclose    = $data[0]["wp_disclose"];
$mobile_phone   = $data[0]["mobile_phone"]; 
$mp_disclose    = $data[0]["mp_disclose"]; 
$whatsapp       = $data[0]["whatsapp"];
$home_email     = $data[0]["home_email"];
$he_disclose    = $data[0]["he_disclose"];
$work_email     = $data[0]["work_email"];
$sex            = $data[0]["sex"];
$cottage        = $data[0]["cottage"];
$cottage_id     = $data[0]["cottage_id"];
$photo_disclose = $data[0]["photo_disclose"];
$occupation_id  = $data[0]["occupation_id"];
$race           = $data[0]["race"];
$checked        = $data[0]["checked"];
$notes          = $data[0]["notes"];
$user_id        = $data[0]["user_id"];
$changed        = $data[0]["changed"];
$full_name      = $surname . ", " . $first_name;
if (!empty($other_name)) {
    $full_name .= " " . $other_name;
}
if (!empty($given_name)) {
    $full_name .= " (" . $given_name . ")";
}
$data = query("select b.occupation from occupation b where id = ?", $occupation_id);
$occupation  = $data[0]["occupation"];
$data = query("select co_name from company where id = ?", $company_id);
$co_name        = $data[0]["co_name"];
$staff = check_role("STAFF");
$pr = check_role("PR");
if ($cottage_id > 0) {
    $sql = "select asset_name, asset_size from asset where id = ?";
    $data = query($sql, $cottage_id);
    if ($staff) {
        $cottage_name  = $data[0]["asset_name"] . " (" . $data[0]["asset_size"];
        $cottage_name .= " square metres)";
    } else {
        $cottage_name  = $data[0]["asset_name"];
    }
}
$data = query("select * from users where id = ?", $user_id);
$username       = $data[0]["username"];
$user_name_given= $data[0]["surname"] . ", " . $data[0]["first_name"];
?>
<h2>Read about a Person</h2>
    <a class="w3-button w3-green" href="../page/people.php">Back</a>&nbsp;
<?php
if (check_role("CC")) {
    echo '<a class="w3-button w3-green" ';
    echo 'href="../page/medhist.php">Medical History</a>';
}
?>
   <table class="w3-table-all" width="100%">
<?php
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="28%">Record ID:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" w3-padding-small width="70%">' . $people_id . '</td>';
    echo '</tr>';
}
?>
    <tr>
    <td align="right" valign="top" width="28%">Person name:</td>
    <td width="2%"></td>
    <td align="left" width="70%"><?php echo $full_name; ?></td>
    </tr>
    <tr>
    <td align="right" valign="top" width="28%">Title:</td>
    <td width="2%"></td>
    <td align="left" width="70%"><?php echo $title; ?></td>
    </tr>
<?php
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Account number:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $account_no . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Old Account number:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $old_account_no . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Status:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $status . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Status date:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $status_date . '</td>';
    echo '</tr>';
}
echo '<tr>';
echo '<td align="right" valign="top" width="28%">Company:</td>';
echo '<td width="2%"></td>';
echo '<td align="left" width="70%">' . $co_name . '</td>';
echo '</tr>';
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">ID number:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $id_no . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Driver&#039;s license:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $driver_lic . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Birth date:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $birth_date . '</td>';
    echo '</tr>';
}
if ($staff | $hp_disclose == 'Y') {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Home phone:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $home_phone . '</td>';
    echo '</tr>';
}
if ($staff | $wp_disclose == 'Y') {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Work phone:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $work_phone . '</td>';
    echo '</tr>';
}
if ($staff | $mp_disclose == 'Y' ) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Mobile phone:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">';
    echo $mobile_phone;
    echo '</td>';
    echo '</tr>';
}
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">WhatsApp:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $whatsapp . '</td>';
    echo '</tr>';
}
if ($staff | $he_disclose == 'Y' ) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Home email:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $home_email . '</td>';
    echo '</tr>';
}
if (!empty($work_email)) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Work email:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $work_email . '</td>';
    echo '</tr>';
}
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Sex:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $sex . '</td>';
    echo '</tr>';
}
if ($cottage_id > 0) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Cottage (asset):</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $cottage_name . '</td>';
    echo '</tr>';
}
if ($pr) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Photo permitted:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $photo_disclose . '</td>';
    echo '</tr>';
}
if ($staff) {
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Occupation:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $occupation . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="30%">Race:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $race . '</td>';
    echo '</tr>';
    echo "<tr>";
    echo '<td align="right" valign="top" width="30%">Checked status:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $checked . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="25%">Changed by:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $username . ' - ';
    echo $user_name_given . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="25%">Changed on:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $changed . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td align="right" valign="top" width="25%">Notes:</td>';
    echo '<td width="2%"></td>';
    echo '<td align="left" width="70%">' . $notes . '</td>';
    echo '</tr>';
}
?>
    </table> 
<?php
if ($staff) {
    echo '<h2>Relationships</h2>';
    //echo '<a href="../page/people_related_create.php" 
    //class="w3-button w3-green">Maintain relationships</a>&nbsp;';
    echo '<a href="../page/people_related.php" ';
    echo 'class="w3-button w3-green">Maintain relationships</a>&nbsp;' . "\n";
    echo '<table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" ';
    echo 'width="100%">' . "\n";
    echo '<thead>' . "\n";
    echo '<tr>';
    echo '<th>Date</th>';
    echo '<th>Relationship</th>';
    echo '<th>Person</th>';
    echo '<th>Notes</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $rsql  = "SELECT a.id, a.related_id, a.relationship, a.relationship_date, ";
    $rsql .= "a.notes, b.surname, b.first_name, b.given_name, 'Primary' as source ";
    $rsql .= " from people_related a, people b ";
    $rsql .= " where a.people_id = ? and a.related_id = b.id ";
    $rsql .= " UNION ";
    $rsql .= " SELECT c.id, c.people_id, c.relationship, c.relationship_date, ";
    $rsql .= " c.notes, d.surname, d.first_name, d.given_name, ";
    $rsql .= " 'Secondary' as source "; 
    $rsql .= " from people_related c, people d ";
    $rsql .= " where c.related_id = ? and c.people_id = d.id "; 
    $rsql .= " order by relationship, surname ";
    $rows = query($rsql, $people_id, $people_id);
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td valign="top" style="width:100px">';
            echo $row['relationship_date'] . '</td>';
            echo '<td>' . $row['relationship'] . '</td>';
            $r_url = '<a href="../page/people_read.php?id=';
            $r_url .= $row['related_id'] . '">' . $row['surname'] . ', ';
            $r_url .= $row['first_name'] . '</a>';
            echo '<td valign="top">' . $r_url . '</td>';
            echo '<td valign="top">' . $row["source"] . ': ' . $row["notes"];
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td></td><td>There are no relationships associated ";
        echo "with this person.</td>";
    }
    echo '</tbody>';
    echo '</table>';
    // -----------------------------------------------------------
    echo '<h2>Memberships</h2>';
    echo '<a href="../page/memberships_add.php" ';
    echo 'class="w3-button w3-green">Add Memberships</a>&nbsp;' . "\n";
    echo '<table class="w3-table-all" border="0" cellpadding="0" cellspacing="10" ';
    echo 'width="100%">' . "\n";
    echo '<thead>' . "\n";
    echo '<tr>';
    echo '<th>Date joined</th>';
    echo '<th>Group</th>';
    echo '<th>Is Leader</th>';
    echo '<th>Expires</th>';
    //echo '<th>Status</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $rsql  = "SELECT a.id, a.join_date, a.expiry_date, a.status, a.is_manager, ";
    $rsql .= "b.group_name, b.fee_reqd, b.start_month, b.duration_in_months ";
    $rsql .= " from memberships a, groups b ";
    $rsql .= " where a.person_id = ? and a.group_id = b.id ";
    $rsql .= " order by group_name ";
    $rows = query($rsql, $people_id);
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            if ($row["expiry_date"] < date("Y-m-d")) {
                $expires =  $row["expiry_date"] . " - expired";
            } else {
                $expires = $row["expiry_date"];
            }
            if ($row["fee_reqd"] == "N") {
                $expires = "N/A";
            }
            echo '<tr>';
            echo '<td valign="top" style="width:100px">';
            echo $row['join_date'] . '</td>';
            echo '<td>' . $row['group_name'] . '</td>';
            echo '<td valign="top">' . $row["is_manager"] . '</td>';
            echo '<td valign="top">' . $expires;
            echo '</td>';
            echo '<td valign="top" style="width:280px">';
            echo '<a class="w3-button w3-green" ';
            //echo 'href="../page/memberships_read.php?id=' . $row['id'];
            //echo '">Read</a>' . '&nbsp;';
            echo '<a class="w3-button w3-green" ';
            echo 'href="../page/memberships_edit.php?id=' . $row['id'];
            echo '">Update</a>' . '&nbsp;';
            if (check_role("ADMIN")) {
                echo '<a class="w3-button w3-red" ';
                echo 'href="../page/memberships_delete.php?id=' . $row['id'];
                echo '">Delete</a>';
            }
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td></td><td>There are no memberships recorded ";
        echo "for this person.</td>";
    }
    echo '</tbody>';
    echo '</table>';
    // -----------------------------------------------------------
    echo '<h2>History</h2>';
    echo '<a href="../page/history.php" ';
    echo 'class="w3-button w3-green">Maintain personal history</a>&nbsp;';
    echo '<table class="w3-table-all" border="0" cellpadding="0" ';
    echo 'cellspacing="10" width="100%">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Event date</th>';
    echo '<th>Event description</th>';
    echo "<th>Action</th>";
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $sql = "SELECT id, event_date, notes from history ";
    $sql .= "where people_id = ? order by event_date desc";
    $rows = query($sql, $people_id);
    if (count($rows) > 0) {
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td valign="top" style="width:100px">' . $row['event_date'];
            echo '</td>';
            echo '<td valign="top">' . $row['notes'] . '</td>';
            if (check_role("ADMIN")) {
                echo '<td valign="top" style="width:280px">';
                echo '<a class="w3-button w3-green" ';
                echo 'href="../page/history_read.php?id=' . $row['id'];
                echo '">Read</a>' . '&nbsp;';
                echo '<a class="w3-button w3-green" ';
                echo 'href="../page/history_update.php?id=' . $row['id'];
                echo '">Update</a>' . '&nbsp;';
                echo '<a class="w3-button w3-red" ';
                echo 'href="../page/history_delete.php?id=' . $row['id'];
                echo '">Delete</a>';
            }
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo "<tr><td></td><td>";
        echo "There are no events associated with this person.</td>";
    }
    echo '</tbody>';
    echo '</table>';
}
?>
   <div class="form-actions">
      <a class="w3-button w3-green" href="../page/people.php">Back to people</a>
   </div>
